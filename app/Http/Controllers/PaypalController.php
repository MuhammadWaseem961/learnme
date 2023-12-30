<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use Validator;
use URL;
use Redirect;
use Auth;
use App\Models\Bid;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use Illuminate\Support\Facades\Storage;
use App\Mail\SendOrderMailToCustomer;
use App\Mail\OrderTrackingMailToCustomer;
use App\Mail\UpdateOrderTrackingMailToCustomer;
use PayPal\Api\Transaction;
use Illuminate\Support\Facades\Mail;
use App\Admin;
use App\Payment as sysPayment;
use App\Transaction as sysTransaction;
use App\Event;
use App\Booking;
use App\EventTicket;

class PaypalController extends Controller
{
    private $_api_context;
    public function __construct()
    {    
        $paypal_configuration = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
        $this->_api_context->setConfig($paypal_configuration['settings']);
    }

    public function paypalPaymentForAppointment(Request $request){
        Session::put('allInfo',$request->all());
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

    	$item_1 = new Item();

        $item_1->setName('Product 1')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->amount);

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->amount);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Enter Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('appointmentPaymentStatus'))
            ->setCancelUrl(URL::route('appointmentPaymentStatus'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));            
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::flash('error','Connection timeout');
                return back();                
            } else {
                \Session::flash('error','Some error occur, sorry for inconvenient');
                return back();                
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        
        Session::put('paypal_payment_id', $payment->getId());

        if(isset($redirect_url)) {            
            return Redirect::away($redirect_url);
        }

        \Session::flash('error','Unknown error occurred');
    	return back();

    }

    public function appointmentPaymentStatus(Request $request)
    {        
        $payment_id = Session::get('paypal_payment_id');
        Session::forget('paypal_payment_id');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            \Session::flash('error','Your Payment has been failed');
            return "not bad";
        }
        $payment = Payment::get($payment_id, $this->_api_context);        
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));        
        $result = $payment->execute($execution, $this->_api_context);
        
        if ($result->getState() == 'approved') {         
            $admin = Admin::first();            
            $data = Session::get('allInfo');
            $updateBooking = Booking::find($data['id']);
            $payment = new sysPayment();
            $payment->user_id = Auth::user()->id;
            $payment->received_amount = $data['amount'];
            if($data['payment_for'] == 'appointment'){
                $updateBooking->paystate = '1';
                $updateBooking->state = '2';
                $updateBooking->save();
                $payment->specialist_id = $updateBooking->seller_id;
                $payment->appointment_id = $updateBooking->id;
                $payment_from = 'appointments';
            }

            if($data['payment_for'] == 'bid'){
                $bid = Bid::findOrFail($data['id']);
                $bid->payment_amount =  $bid->payment_amount + $data['amount'];
                if ($bid->budget > $bid->payment_amount + $data['amount']) {
                    $bid->payment_status = '1';
                } else {
                    $bid->payment_status = '2';
                }

                $bid->save();
                $payment_from = 'bids';
                $payment->specialist_id = $bid->specialist_id;
                $payment->bid_id = $bid->id;
            }
            $payment->payment_method = "paypal";
            $payment->payment_from = $payment_from;
            $payment->save();
            $transaction = new sysTransaction();
            $transaction->transaction_id = $payment_id;
            $transaction->booking_id = $data['payment_for'] == 'appointment'?$updateBooking->id:$bid->id;
            $transaction->buyer_id = $payment->user_id;
            $transaction->seller_id = $payment->specialist_id;
            $transaction->amount = $data['amount'];
            $transaction->email = $payment->user->email;
            $transaction->payment_method = "paypal";
            $transaction->payment_from = $payment_from;
            $transaction->save();
            if($data['payment_for'] == 'appointment'){
                return back()->with('success','Your all set! Please go your upcoming appointments for further details regarding.');
            }
            if($data['payment_for'] == 'bid'){
                return back()->with('success','Payment submitted successfully.');
            }
        }
        else{
            return back()->with('error','Payment transaction has failed due network issues and other issues');
        }
    }

    public function paypalPaymentForEventTicket(Request $request){
        Session::put('allInfo',$request->all());
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

    	$item_1 = new Item();

        $item_1->setName('Product 1')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->payable_amount);

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->payable_amount);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Enter Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status'))
            ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));            
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::flash('error','Connection timeout');
                return back();                
            } else {
                \Session::flash('error','Some error occur, sorry for inconvenient');
                return back();                
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        
        Session::put('paypal_payment_id', $payment->getId());

        if(isset($redirect_url)) {            
            return Redirect::away($redirect_url);
        }

        \Session::flash('error','Unknown error occurred');
    	return back();

    }

    public function getPaymentStatus(Request $request)
    {        
        $payment_id = Session::get('paypal_payment_id');
        Session::forget('paypal_payment_id');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            \Session::flash('error','Your Payment has been failed');
            return "not bad";
        }
        $payment = Payment::get($payment_id, $this->_api_context);        
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));        
        $result = $payment->execute($execution, $this->_api_context);
        
        if ($result->getState() == 'approved') {         
            $admin = Admin::first();
            $data = Session::get('allInfo');
            $event = Event::find($data['id']);
            $payment = new sysPayment();
            $payment->user_id = Auth::user()->id;
            $payment->received_amount = $data['payable_amount'];
            $payment->specialist_id = $event->user->id;
            $payment->event_id = $event->id;
            $payment->payment_method = "paypal";
            $payment->payment_from ="events";
            $payment->save();
            $transaction = new sysTransaction();
            $transaction->transaction_id = $payment_id;
            $transaction->booking_id = $event->id;
            $transaction->buyer_id = $payment->user_id;
            $transaction->seller_id = $payment->specialist_id;
            $transaction->amount = $data['payable_amount'];
            $transaction->email = $payment->user->email;
            $transaction->payment_method = "paypal";
            $transaction->payment_from ="events";
            if($transaction->save()){
                $ticket = new EventTicket();
                $ticket->event_id = $event->id;
                $ticket->user_id = Auth::user()->id;
                $ticket->payment_method = "paypal";
                $ticket->amount = $data['payable_amount'];
                $ticket->save();
                $event->total_earning = $event->total_earning + ($data['payable_amount'] - ($data['payable_amount']*serviceFee())/100);
                $event->save();
                $event->user->total_balance = (int) $event->user->total_balance + ($data['payable_amount'] - ($data['payable_amount']*serviceFee())/100);
                $event->user->save();
                return back()->with('success','Event ticket has been purchased successfully');
            }
        }
        else{
            return back()->with('error','Payment transaction has failed due network issues and other issues');
        }
    }

}
