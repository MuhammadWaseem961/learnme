<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Bid;
use App\User;
use App\Event;
use App\Payment;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;
use App\Booking;
use DB;
use App\Transaction;
use App\EventTicket;

class StripePaymentController extends Controller
{
    // get view for payment interface for client
    public function stripe(Request $request)
    {
        $specialist = User::findOrFail($request->specialist_id);
        $amount = $request->amount;
        $appointment_id = $request->appointment;
        $payment_for = $request->payment_for;
        $admin = Admin::first();
        $admin_stripe_publick_key = $admin->stripe_public_key;
        if(!empty( $admin->stripe_public_key) && !empty( $admin->stripe_secret_key)){
            return response()->json(['success' => true, 'message' => view('stripe',compact('specialist', 'amount', 'appointment_id', 'payment_for','admin_stripe_publick_key'))->render()]);
        }else{
            return response()->json(['success' => false, 'message' => ['Stripe integration does not work properly please contact with administrator']]);
        }
    }

    // store payment
    public function stripePost(Request $request)
    {
        $admin = Admin::first();
        if($request->payment_for == 'appointment'){
            $updateBooking = Booking::find($request->id);
            $description = "Paid from ". $updateBooking->user->username." to ".$updateBooking->specialist->username.", Booking ID:".$updateBooking->id.", Buyer Email:".$updateBooking->user->email;
        }

        if($request->payment_for == 'bid'){
            $bid = Bid::findOrFail($request->id);
            $description = "Paid from ". $bid->serviceRequest->user->username." to ".$bid->specialist->username.", Bid ID:".$bid->id.", Buyer Email:".$bid->serviceRequest->user->email;
        }

        Stripe\Stripe::setApiKey($admin->stripe_secret_key);
        $charge = Stripe\Charge::create([
                "amount" => 100 * $request->amount,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => $description
            ]);
        if($charge->amount >0 && $charge->status=='succeeded'){
            $amount = $charge->amount/100;
            $payment = new Payment();
            $payment->user_id = Auth::user()->id;
            $payment->received_amount = $amount;
            if($request->payment_for == 'appointment'){
                $updateBooking->paystate = '1';
                $updateBooking->state = '2';
                $updateBooking->save();
                $payment->specialist_id = $updateBooking->seller_id;
                $payment->appointment_id = $updateBooking->id;
                $payment_from = 'appointments';
            }

            if($request->payment_for == 'bid'){
                $bid->payment_amount =  $bid->payment_amount + $amount;
                if ($bid->budget > $bid->payment_amount + $amount) {
                    $bid->payment_status = '1';
                } else {
                    $bid->payment_status = '2';
                }

                $bid->save();
                $payment_from = 'bids';
                $payment->specialist_id = $bid->specialist_id;
                $payment->bid_id = $bid->id;
            }
            $payment->payment_method = "stripe";
            $payment->payment_from = $payment_from;
            $payment->save();
            $transaction = new Transaction();
            $transaction->transaction_id = $charge->id;
            $transaction->booking_id = $request->payment_for == 'appointment'?$updateBooking->id:$bid->id;
            $transaction->buyer_id = $payment->user_id;
            $transaction->seller_id = $payment->specialist_id;
            $transaction->amount = $amount;
            $transaction->email = $payment->user->email;
            $transaction->payment_method = "stripe";
            $transaction->payment_from = $payment_from;
            $transaction->save();
            // if($transaction->save()){
            //     return response()->json(['success' =>true, 'message' =>"Payment submitted successfully"]);
            // }
            if($request->payment_for == 'appointment'){
                return back()->with('success','Your all set! Please go your upcoming appointments for further details regarding.');
            }
            if($request->payment_for == 'bid'){
                return back()->with('success','Payment submitted successfully.');
            }
        }else{
            // return response()->json(['success' =>false, 'message' =>"Payment transaction has failed due network issues and other issues"]);
            return back()->with('error','Payment transaction has failed due network issues and other issues');
        }
    }

    // store payment for event ticket
    public function stripePaymentForEventTicket(Request $request)
    {
        $admin = Admin::first();
        $event = Event::find($request->id);
        $description = "Paid from ". Auth::user()->username." to ".$event->user->username.", Buyer Email:".Auth::user()->email;

        Stripe\Stripe::setApiKey($admin->stripe_secret_key);
        $charge = Stripe\Charge::create([
                "amount" => 100 * $request->payable_amount,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => $description
            ]);
        if($charge->amount >0 && $charge->status=='succeeded'){
            $amount = $charge->amount/100;
            $payment = new Payment();
            $payment->user_id = Auth::user()->id;
            $payment->received_amount = $amount;
            $payment->specialist_id = $event->user->id;
            $payment->event_id = $event->id;
            $payment->payment_from ="events";
            $payment->payment_method = "stripe";
            $payment->save();
            $transaction = new Transaction();
            $transaction->transaction_id = $charge->id;
            $transaction->booking_id = $event->id;
            $transaction->buyer_id = $payment->user_id;
            $transaction->seller_id = $payment->specialist_id;
            $transaction->amount = $amount;
            $transaction->email = $payment->user->email;
            $transaction->payment_method = "stripe";
            $transaction->payment_from ="events";
            if($transaction->save()){
                $ticket = new EventTicket();
                $ticket->event_id = $event->id;
                $ticket->user_id = Auth::user()->id;
                $ticket->payment_method = "stripe";
                $ticket->amount = $amount;
                $ticket->save();
                $event->total_earning = $event->total_earning + ($amount - ($amount*serviceFee())/100);
                $event->save();
                $event->user->total_balance = (int) $event->user->total_balance + ($amount - ($amount*serviceFee())/100);
                $event->user->save();
                return back()->with('success','Event ticket has been purchased successfully');
            }
        }else{
            return back()->with('error','Payment transaction has failed due network issues and other issues');
        }
    }
}