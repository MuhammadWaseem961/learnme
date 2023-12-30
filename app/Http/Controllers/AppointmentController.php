<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use Validator;
use App\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rating;
use App\User;
use App\Booking;
use App\Payment;
use DB;

class AppointmentController extends Controller
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
            $pending = Appointment::where('specialist_id', Auth::user()->id)->orderBy('date', 'ASC')->where('status','0')->get();
            $approved = Appointment::where('specialist_id', Auth::user()->id)->orderBy('date', 'ASC')->where('status','1')->get();
            $cancelled = Appointment::where('specialist_id', Auth::user()->id)->orderBy('date', 'ASC')->where('status','2')->get();
            $completed = Appointment::where('specialist_id', Auth::user()->id)->orderBy('date', 'ASC')->where('status','3')->get();
        } else {
            $pending = Appointment::where('user_id', Auth::user()->id)->orderBy('date', 'ASC')->where('status','0')->get();
            $approved = Appointment::where('user_id', Auth::user()->id)->orderBy('date', 'ASC')->where('status','1')->get();
            $cancelled = Appointment::where('user_id', Auth::user()->id)->orderBy('date', 'ASC')->where('status','2')->get();
            $completed = Appointment::where('user_id', Auth::user()->id)->orderBy('date', 'ASC')->where('status','3')->get();
        }
        return view('frontend.settings.appointment', compact('pending','approved','cancelled','completed'));
        
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
        $appointments = Appointment::where('service_id',$id)->where('status','1')->whereBetween('created_at', [$today, $tomorrow])->get()->pluck('time')->toArray();
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
        $appointment = new Appointment();
        $appointment->user_id = Auth::user()->id;
        $appointment->service_id = $request->service_id;
        $appointment->specialist_id = $request->specialist_id;
        $appointment->date = $request->date;
        $appointment->rate = $request->rate;
        $appointment->time = $request->time;
        $appointment->save();
        return back()->with('success','Appointment Created Successfuly!');

    }

    public function storeAppointment(Request $request)
    {
        date_default_timezone_set(config('app.timezone'));
        $timestamp = strtotime($request->date." ".$request->time)*1000;
        $date = getTimeZoneDate(Auth::user()->timezone,config('app.timezone'),$request->date." ".$request->time);
        $time = getTimeZoneTime(Auth::user()->timezone,config('app.timezone'),$request->date." ".$request->time);
        if(Appointment::where('date',$date)->where('time',$time)->where('service_time',$request->service_time)->first() !=null)
        {
            return back()->with('error',$request->time.' on '.$request->date.' and duration '.$request->service_time.' have been already booked!');
        }
        $appointment = new Appointment();
        $appointment->user_id = Auth::user()->id;
        $appointment->service_id = $request->service_id;
        $appointment->specialist_id = $request->specialist_id;
        $appointment->date = $date;
        $appointment->rate = $request->rate;
        $appointment->time = $time;
        $appointment->service_time = $request->service_time;
        $appointment->timestamp = $timestamp;
        $appointment->save();
        return back()->with('success','Appointment Created Successfuly!');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment = Appointment::where('id',$id)->first();
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
        // return $request->status;
        $appointment = Appointment::findOrFail($id);
        if($request->status == '1'){
            $booking = new Booking();
            $booking->buyer_id =$appointment->user->id; 
            $booking->seller_id =$appointment->specialist->id;
            $booking->buyer_name =$appointment->user->username; 
            $booking->seller_name =$appointment->specialist->username;
            $booking->buyer_picture =$appointment->user->picture!=''?$appointment->user->picture:url('uploads/user/default.jpg'); 
            $booking->seller_picture =$appointment->specialist->picture!=''?$appointment->specialist->picture:url('uploads/user/default.jpg'); 
            $booking->service_name = $appointment->service->name;
            $booking->service_time = $appointment->service_time;
            $booking->service_date = $appointment->timestamp;
            $booking->service_cost = $appointment->rate;
            $booking->specialist_earning = $appointment->rate - ($appointment->rate*$this->deductionPercentage)/100;
            $booking->state = 2;
            $booking->project_type = 'appointments';
            $booking->project_id = $appointment->id;
            $booking->possible = 0;
            $booking->save();
            $appointment->status = $request->status;
        }
        if($request->status == '2'){
            $updateBooking = Booking::where('project_type','appointments')->where('project_id',$id)->first();
            $updateBooking->state = 5;
            $updateBooking->save();
            $appointment->status = $request->status;   
        }
        if($request->status == '3'){
            $updateBooking = Booking::where('project_type','appointments')->where('project_id',$id)->first();
            $updateBooking->state = 3;
            $updateBooking->save();
            $appointment->status = $request->status;
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
        //
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
            $appointments = Appointment::where('user_id',$user->id)->where('notification_status',0)->get();
        }else if($user->type=="seller"){
            $appointments = Appointment::where('specialist_id',$user->id)->where('notification_status',0)->get();
        }

        $arr =[];
        foreach($appointments as $appointment)
        {
            if($appointment->status=="Approved" || $appointment->status=="Cancelled"){
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
                $a['url'] = url('/appointments').'/'.$appointment->id;
                $a['status']=$appointment->status;
                $a['avatar']=$avatar;
                $a['username'] = $username;
                $arr[] = $a;
            }
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
}
