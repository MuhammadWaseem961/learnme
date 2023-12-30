<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Payment;
use App\Booking;
use App\User;
use App\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;
use DB;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment_requests = Payment::where('p_status','specialist_request')->where('release_status','released')->get()->groupBy('specialist_id');
        $fee = DB::table('tb_fee')->first();
        return view('admin.payments.index',compact('payment_requests','fee'));
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(Request $request)
    {
        $specialist = User::findOrFail($request->specialist_id);
        $amount = $request->amount;
        $payment_id= $request->payment;
        if(!empty($specialist->stripe_public_key) && !empty($specialist->stripe_secret_key)){
            return response()->json(['success' => true, 'message' => view('admin.payments.stripe',compact('specialist', 'amount','payment_id'))->render()]);
        }else{
            return response()->json(['success' => false, 'message' => ['Stripe integration does not work properly please contact with specialist']]);
        }
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePayment(Request $request)
    {
        $specialist = User::where('id',$request->user_id)->first();
        Stripe\Stripe::setApiKey($specialist->stripe_secret_key);
        $charge = Stripe\Charge::create([
            "amount" => 100 * $request->amount,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Payment from ". Session::get('admin')->username,
        ]);
        if($charge->amount >0 && $charge->status=='succeeded'){
            $amount = $charge->amount/100;
            $payment = Payment::findOrFail($request->payment_id);
            $payment->p_status = 'paid';
            $payment->save();
            $withdrwa_request = Withdraw::where('payment_id',$request->payment_id)->first();
            $withdrwa_request->status = 'paid';
            $withdrwa_request->save();
            $user = User::findOrFail($specialist->id);
            $user->total_balance = $user->total_balance - $amount;
            $user->total_withdrawl = $user->total_withdrawl + $amount;
            $withdrwa_requests = Withdraw::where('specialist_id',$specialist->id)->pluck('status')->toArray();
            if(!in_array("withdraw",$withdrwa_requests))
            {
                $user->withdraw_status = 'do_request';
            }
            $user->save();
            return response()->json(['success' =>true, 'message' =>"Payment has been paid successfully"]);
        }else{
            return response()->json(['success' =>false, 'message' =>"Payment transaction has failed due network issues and other issues"]);
        }
        
    }

    // get booking payment detail
    public function bookingPaymentDetail(Request $request){
        $bookingPaymentDetail = Booking::where('id',$request->id)->first()->paymentDetails;
        return view('partials.admin.payment_detail',compact('bookingPaymentDetail'));
    }

    // confirm the payment from admin
    public function confirmPayment(Request $request){
        $bookingPaymentDetail = Booking::find($request->id);
        $bookingPaymentDetail->paystate = $request->status;
        $bookingPaymentDetail->save();
        return response()->json(['data'=>$bookingPaymentDetail]);
    }
}
