<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Validator;
use App\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rating;
use App\User;
use App\Booking;
use App\Payment;
use App\Admin;
use DB;

class BookingController extends Controller
{
    // fee deduction for specialist and client

    private $deductionPercentage;
    public function __construct(){
        DB::table('tb_fee')->first()!=null ? $this->deductionPercentage = DB::table('tb_fee')->first()->fee : $this->deductionPercentage = 20;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->type == 'seller') {
            $pending = Booking::where('seller_id', Auth::user()->id)->where('state','0')->orderBy('service_date', 'ASC')->get();
            $approved = Booking::where('seller_id', Auth::user()->id)->whereIn('state',['1','2'])->orderBy('service_date', 'ASC')->get();
            $completed = Booking::where('seller_id', Auth::user()->id)->where('state','3')->orderBy('service_date', 'ASC')->get();
        } else {
            $pending = Booking::where('buyer_id', Auth::user()->id)->where('state','0')->orderBy('service_date', 'ASC')->get();
            $approved = Booking::where('buyer_id', Auth::user()->id)->whereIn('state',['1','2'])->orderBy('service_date', 'ASC')->get();
            $completed = Booking::where('buyer_id', Auth::user()->id)->where('state','3')->orderBy('service_date', 'ASC')->get();
        }
        
        return view('frontend.settings.appointments', compact('pending','approved','completed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id)
    {
        $id =  decrypt($id);
        $time = $request->time;
        $service = ServiceCategory::findOrFail($id);
        $specialist = User::where('id',$service->user_id)->first();
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();
        // $appointments = Appointment::where('service_id',$id)->where('status','1')->whereBetween('created_at', [$today, $tomorrow])->get()->pluck('time')->toArray();
        $appointments = [];
        return view('frontend.appointments',compact('service','specialist','appointments','time'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validations = Validator::make($request->all(),['appointment_date'=>'required','appointment_time'=>'required',],['required' => 'The :attribute is required.']);
        if($validations->fails()){return response()->json(['success' => false, 'message' => $validations->errors()]);}
        date_default_timezone_set(Auth::user()->timezone);
        $timestamp = strtotime($request->appointment_date." ".$request->appointment_time)*1000;
        $service = ServiceCategory::find($request->service_id);
        if(Booking::where('service_name',$service->name)->where('service_date',$timestamp)->where('service_time',$request->service_time)->first() !=null)
        {
            return response()->json(['success' => false, 'message' =>[$request->appointment_time.' on '.$request->appointment_date.' and duration '.$request->service_time.' have been already booked!']]);
        }
        
        $specialist = User::find($request->specialist_id);
        $booking = new Booking();
        $booking->buyer_id =Auth::user()->id; 
        $booking->seller_id =$specialist->id;
        $booking->buyer_name =Auth::user()->username; 
        $booking->seller_name =$specialist->username;
        $booking->buyer_picture =Auth::user()->picture!=''?Auth::user()->picture:url('uploads/user/default.jpg'); 
        $booking->seller_picture =$specialist->picture!=''?$specialist->picture:url('uploads/user/default.jpg'); 
        $booking->service_name = $service->name;
        $booking->service_time =$request->service_time;
        $booking->service_date = (string)$timestamp;
        $booking->service_cost = $request->rate;
        $booking->specialist_earning =  $request->rate - ( $request->rate*$this->deductionPercentage)/100;
        $booking->rating = 0;
        $booking->state = '0';
        $booking->project_type = 'appointments';
        $booking->possible = 0;
        if($booking->save()){return response()->json(['success' => true, 'message' =>'Appointment Created Successfuly!']);}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment = Booking::where('id',$id)->first();
        return view('frontend.settings.appointment_show', compact('appointment'));
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
        $appointment = Booking::findOrFail($id);
        if($request->status == '1'){
            $appointment->state = $request->status;
        }
        if($request->status == '2'){
            $appointment->state = $request->status;   
        }
        if($request->status == '3'){
            $appointment->state = $request->status;
        }
        $appointment->save();
        
        return back()->with('success', 'Appointment updated Successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::where('id',$id)->first();
        if(Booking::where('id',$id)->delete()){
            return response()->json(['message'=>$booking->service_name.' appointment has been deleted permanantly from system']);
        }
    }

    // load payment view
    public function loadPaymentView($id)
    {
        $admin = Admin::first();
        $booking = Booking::find($id);
        return view('frontend.settings.appointment_payment',compact('booking','admin'));
    }

    public function addReview(Request $request)
    {
        $validations = Validator::make($request->all(),[
            'rating'=>'required',
            'description'=>'required',
        ]);

        if($validations->fails())
        {
            return response()->json(['success' => false, 'message' => $validations->errors()]);
        }

        $review = new Rating();
        $review->appointment_id = $request->appointment_id;
        $review->specialist_id = $request->specialist_id;
        $review->user_id = Auth::user()->id;
        $review->rating = $request->rating;
        $review->description = $request->description;
        if($review->save())
        {
            return response()->json(['success' => true, 'message' =>"Review has been added successfully"]);
        }
    }

    public function userAppointmentNotification()
    {
        $user = Auth::user();
        if($user->type=="buyer"){
            $appointments = Booking::where('buyer_id',$user->id)->whereIn('state',['1','2'])->get();
        }else if($user->type=="seller"){
            $appointments = Booking::where('seller_id',$user->id)->whereIn('state',['1','2'])->get();
        }
        $arr =[];
        foreach($appointments as $appointment)
        {
            if($user->type=='buyer')
            {
                if($appointment->specialist->picture!=''){
                    $avatar=$appointment->specialist->picture;
                }else{
                    $avatar=url('/public/uploads/user/default.jpg');
                }
            }elseif($user->type=='seller'){
                if($appointment->user->picture!=''){
                    $avatar=$appointment->user->picture;
                }else{
                    $avatar=url('/public/uploads/user/default.jpg');   
                }
            }
            // ($user->user_type=='client')? ($appointment->specialist->user->avatar!='') ? $avatar=url('/').'/'.$appointment->specialist->user->avatar: $pro=url('/public/uploads/user/default.jpg') : ($appointment->user->avatar!='') ? $avatar=url('/').'/'.$appointment->user->avatar : $avatar=url('/public/uploads/user/default.jpg');
            if($user->type=='buyer'){
                $username=$appointment->specialist->username;
            }
            elseif($user->type=='seller'){
                $username=$appointment->user->username;
            }

            $a = [];
            $a['id']=$appointment->id;
            $a['name']=$appointment->service_name;
            $a['cost']=$appointment->service_cost;
            $a['url'] = url('/appointments').'/'.$appointment->id;
            $a['status']=$appointment->state=='1'?'Approved':'Cancelled';
            $a['avatar']=$avatar;
            $a['username'] = $username;
            $arr[] = $a;
        }
        return response()->json($arr);
    }

    public function notificationStatusUpdate($id)
    {
        $appointment = Appointment::find($id);
        $appointment->notification_status = 1;
        $appointment->save();
        return "fine";
    }

    public function releasePayment($id,Request $request)
    {
        $payment = Payment::findOrFail($id);
        $payment->release_status = 'released';
        $payment->p_status = 'released';
        $payment->save();
        $user = User::where('id',$request->specialist_id)->first();
        $payment = Payment::where('release_status','released')->where('specialist_id',$user->id)->sum('received_amount');
        $deduction = ($payment/100)*$this->deductionPercentage;
        $user->total_balance = ($payment-$deduction);
        $user->deduction = $this->deductionPercentage;
        $user->save();
        return 'Payment released to specialist fromyour side it will be transfer in next 7 working days';
    }

    // get appointment update 
    public function getAppointmentUpdate(){
        date_default_timezone_set(Auth::user()->timezone);
        $agoDate = \Carbon\Carbon::now()->addDays(2)->timezone(Auth::user()->timezone)->format('d F Y');
        $agoDate = strtotime($agoDate)*1000;
        $currentDate = strtotime(date('d F Y',time()))*1000;
        if(Auth::user()->type=='seller'){
            $appointments = Booking::where('seller_id', Auth::user()->id)->whereIn('state', ['1','2'])->where('paystate','1')->whereBetween('service_date', [(string)$currentDate, (string)$agoDate])->orderBy('service_date', 'ASC')->get();
        }else{
            $appointments = Booking::where('buyer_id', Auth::user()->id)->whereIn('state', ['1','2'])->where('paystate','1')->whereBetween('service_date', [(string)$currentDate, (string)$agoDate])->orderBy('service_date', 'ASC')->get(); 
        }
            $arr = [];
        foreach($appointments as $appointment)
        {
            $arrInner = [];
            $arrInner['type']= Auth::user()->type;
            $arrInner['id'] = $appointment->id;
            if(time()>=(($appointment->service_date/1000) - 600) && time()<=(($appointment->service_date/1000) +($appointment->service_time*60 + 300))){
                $arrInner['status'] = true;
            }else{
                $arrInner['status'] = false;
            }
            $arr[] = $arrInner;
        }
        return $arr;
    }

}
