<?php

namespace App\Http\Controllers\Specialist;

use App\Category;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\ServiceRequest;
use Illuminate\Http\Request;
use App\Withdraw;
use App\Payment;
use App\User;
use App\Booking;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set(Auth::user()->timezone);
        $agoDate = \Carbon\Carbon::now()->addDays(2)->timezone(Auth::user()->timezone)->format('d F Y');
        $agoDate = strtotime($agoDate)*1000;
        $currentDate = strtotime(date('d F Y',time()))*1000;
        $appointments = Booking::where('seller_id', Auth::user()->id)->whereIn('state', ['1','2'])->where('paystate','1')->whereBetween('service_date', [(string)$currentDate, (string)$agoDate])->orderBy('service_date', 'ASC')->get();
        $service_requests = ServiceRequest::where('status','1')->get();
        $categories = Category::all();
        return view('specialist.dashboard', compact('appointments', 'service_requests', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getServiceRequest($id)
    {
        $service_request = ServiceRequest::findOrFail($id);
        return view('partials.frontend.get_service_request',compact('service_request'));
    }

    // specialist withdraw request
    function widthdrawRequest(Request $request)
    {
        $payments = Payment::where('specialist_id',Auth::user()->id)->where('release_status','released')->where('p_status','released')->get();
        foreach($payments as $payment){
            $payment->p_status = 'specialist_request';
            $payment->save();
            $withdraw_request = new Withdraw();
            $withdraw_request->specialist_id = Auth::user()->id;
            $withdraw_request->payment_id = $payment->id;
            $withdraw_request->save();
        }
        $user = User::findOrFail(Auth::user()->id);
        $user->withdraw_status = 'request_made';
        $user->save();
        return 'Your withdraw Request has been sent to admin money will transfer to your account in next 3 working days Thank You!';

    }
}
