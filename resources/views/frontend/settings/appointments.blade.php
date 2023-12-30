@extends('layouts.frontend.setting') @section('title','Appointments') {{-- head start --}} @section('extra-css')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/dashboard.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/login_register_common.css') }}" /> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
<style type="text/css">
    .dropdown-toggle::after {
        display: none;
    }

    body {
        background-image: none;
    }

    .nav-pills .nav-link.active {
        background-color: #3ac574 !important;
    }

    .nav-tabs .nav-link.active {
        background-color: #3ac574 !important;
        color: #fff!important;
    }

    .px-50 {
        padding-left: 50px !important;
        padding-right: 50px !important;
    }

    input[type='radio'].checked:after {
        width: 20px;
        height: 20px;
        border-radius: 15px;
        top: -4px;
        left: -1px;
        position: relative;
        background-color: #3AC574;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
        cursor: pointer;
    }
    body{
        display: block !important;
    }
</style>
@endsection {{-- head end --}} {{-- content section start --}} @section('navbar')

<section class="px-5 pt-2 pb-2 nav-bg-img robotoRegular">@include('includes.frontend.navbar')</section>
@include('includes.frontend.navigations') @endsection @section('content')

<p class="border-bottom pl-3 f-21 cl-616161">Appointments</p>

<ul class="nav nav-tabs  ml-4 mr-4">

    <li class="nav-item">
      <a class="nav-link active cl-000000" data-toggle="tab" href="#pending">{{Auth::user()->type=='buyer'?'Pending Specialist Approval':'Pending'}}</a>
    </li>

    <li class="nav-item">
      <a class="nav-link cl-000000" data-toggle="tab" href="#approved">Upcoming<sup class="pl-1"><i class="fa fa-bell" aria-hidden="true"></i></sup></a>
    </li>

    <li class="nav-item">
        <a class="nav-link cl-000000" data-toggle="tab" href="#completed">Completed</a>
    </li>
</ul>
@php date_default_timezone_set(Auth::user()->timezone); @endphp
  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane active container tabPaneOne" id="pending">
        <div class="table-responsive ServiceTableData  px-3 mt-1" id="ServiceTableData">
            <table id="example2" class="table example1" style="width: 100%;">
                <thead class="d-none">
                    <tr class="text-uppercase">
                        <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pending as $key => $appointment)
                        <tr class="border-0">
                            <td class="border-0">
                                {{-- <section class="p-100"> --}}
                                <section>
                                    <div class="row flex-directionSmall pt-3 pb-3 align-items-center box_shadow1 ml-0 mr-0 borderRadius-10px justify-content-between">
                                        @if($appointment->specialist !=null && $appointment->user!=null)
                                            @php 
                                                $tz = Auth::user()->type=='seller' ? $appointment->specialist->timezone : $appointment->user->timezone; 
                                                $tzt = Auth::user()->type=='seller' ? $appointment->user->timezone : $appointment->specialist->timezone; 
                                            @endphp
                                        
                                            <div class="col-lg-2 pl-0">
                                                <p class="robotoRegular cl-515151 f-13 m-0">
                                                    
                                                    @if(Auth::user()->type=='buyer')
                                                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d h:i:s',$appointment->service_date/1000))->format('F')}} 
                                                    @else
                                                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d h:i:s',$appointment->service_date/1000))->timezone($appointment->specialist->timezone)->format('F')}} 
                                                    @endif
                                                        
                                                    {{-- {{ date('F', strtotime(getTimeZoneDate($tzt,$tz, date('d F Y h:i A',$appointment->service_date/1000)))) }} --}}
                                                </p>
                                                <p class="f-45 m-0 cl-515151 robotoRegular">
                                                    @if(Auth::user()->type=='buyer')
                                                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d h:i:s',$appointment->service_date/1000))->format('d')}} 
                                                    @else
                                                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d h:i:s',$appointment->service_date/1000))->timezone($appointment->specialist->timezone)->format('d')}} 
                                                    @endif
                                                    {{-- {{ date('d', strtotime(getTimeZoneDate($tzt,$tz, date('d F Y h:i A',$appointment->service_date/1000)))) }} --}}
                                                </p>
                                                <p class="f-12 robotoRegular m-0">
                                                    @if(Auth::user()->type=='buyer')
                                                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d h:i:s',$appointment->service_date/1000))->format('Y')}} 
                                                    @else
                                                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d h:i:s',$appointment->service_date/1000))->timezone($appointment->specialist->timezone)->format('Y')}} 
                                                    @endif
                                                    {{-- {{ date('Y', strtotime(getTimeZoneDate($tzt,$tz, date('d F Y h:i A',$appointment->service_date/1000)))) }} --}}
                                                </p>
                                                <p class="f-8 robotoRegular m-0">
                                                    {{ date('g:i A',$appointment->service_date/1000) }}
                                                    {{--@if(Auth::user()->type=='buyer')
                                                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d h:i:s',$appointment->service_date/1000))->timezone($appointment->user->timezone)->format('g:i A')}} 
                                                    @else
                                                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d h:i:s',$appointment->service_date/1000))->timezone($appointment->specialist->timezone)->format('g:i A')}} 
                                                    @endif--}}
                                                    {{-- {{ getTimeZoneTime($tzt,$tz,date('d F Y h:i A',$appointment->service_date/1000)) }} --}}
                                                </p>
                                            </div>
                                            <div class="height d-sm-none"></div>
            
                                            <!-- 2 -->
                                            <div class="col-md-8  linear_flex  col-lg-5 p-0 d-flex justify-content-center align-items-start flex-column">
                                                <p>{{ Auth::user()->type=='seller' ? $appointment->user->username : $appointment->specialist->username}}</p>
                                                <div class="d-flex">
                                                    <div class="f-18 d-flex align-items-center cl-000000 robotoRegular">
                                                        {{ $appointment->service_name }}
                                                    </div>
                                                    <div class="f-24 pl-2 cl-616161 robotoRegular">${{ $appointment->service_cost }}</div>
                                                </div>
                                                <div class="robotoRegular cl-616161">
                                                    {{ ucfirst($appointment->service_time)  }} Minutes
                                                </div>
                                                {{--
                                                <div class="f-14 cl-9c9c9c pt-1">6656 us 301, Riverview, 33578</div>
                                                --}}
                                            </div>
                                            <!-- end -->
                                            <!-- 3 -->
                                            <div class="text-center col-lg-2 pr-0 d-flex justify-content-center flex-column align-items-center">
                                                @if ($appointment->state != "3") 
                                                    @if (Auth::user()->type=='seller')

                                                        @if ($appointment->state == "0")
                                                            <div class="pt-3">
                                                                <form action="{{ route('appointments.update',$appointment->id) }}" method="post">
                                                                    @csrf @method('put')
                                                                    <input type="hidden" name="status" value="1" />
                                                                    <button type="submit" class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-bbbbbb border-0 buttonBoxShadow pt-2 pb-2 robotoRegular pl-4 pr-4">
                                                                        Accept
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        @endif
                                                    
                                                    @endif 
            
                                                    @if (Auth::user()->type=='buyer' && $appointment->paystate != "1")
                                                        @if ($appointment->state == '0')
                                                            <div class="pt-3">
                                                                <button class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-bbbbbb border-0 buttonBoxShadow pt-2 pb-2 robotoRegular pl-4 pr-4">Pending Specialist Approval</button>
                                                            </div>
                                                        @else
                                                            <div class="pt-3">
                                                                <p class="f-12 robotoRegular m-0">Specialist Accepted <br> pay now to confirm Appointment</p>
                                                                <a href="{{route('appointmentPayment',$appointment->id)}}" class="btn payment_btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-bbbbbb border-0 buttonBoxShadow pt-2 pb-2 robotoRegular pl-4 pr-4">
                                                                    Payment
                                                                </a>
                                                            </div>
                                                        @endif
                                                    @endif

                                                    <div class="pt-3">
                                                    <button type="button" onclick="bookingReject('{{ $appointment->id }}')" class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-bbbbbb border-0 buttonBoxShadow pt-2 pb-2 robotoRegular pl-4 pr-4">Cancel Request</button>
                                                    </div>
                                                @endif
                                            </div>
                                            <!-- end -->
                                        @else
                                            <div class="text-center d-flex justify-content-center flex-column align-items-center">Appointment ID: {{$appointment->id}} and Service Name:{{$appointment->service_name}} has some issue please contact with our support support@learnme.live</div>
                                        @endif
                                    </div>
                                </section>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="tab-pane container tabPaneOne" id="approved">
        <div class="table-responsive ServiceTableData px-3 mt-1" id="ServiceTableData">
            <table id="example2" class="table example1" style="width: 100%;">
                <thead class="d-none">
                    <tr class="text-uppercase">
                        <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($approved as $key => $appointment)
                        <tr class="border-0">
                            <td class=" border-0">
                                {{-- <section class="p-100"> --}}
                                <section>
                                    <div class="row pt-3 pb-3 flex-directionSmall align-items-center  box_shadow1 ml-0 mr-0 borderRadius-10px justify-content-between">
                                        @if($appointment->specialist !=null && $appointment->user!=null)
                                            @php 
                                                $tz = Auth::user()->type=='seller' ? $appointment->specialist->timezone : $appointment->user->timezone; 
                                                $tzt = Auth::user()->type=='seller' ? $appointment->user->timezone : $appointment->specialist->timezone; 
                                            @endphp
                                            <div class=" col-lg-2 pl-0">
                                                <p class="robotoRegular cl-515151 f-13 m-0">
                                                    @if(Auth::user()->type=='buyer')
                                                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d h:i:s',$appointment->service_date/1000))->format('F')}} 
                                                    @else
                                                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d h:i:s',$appointment->service_date/1000))->timezone($appointment->specialist->timezone)->format('F')}} 
                                                    @endif
                                                        
                                                    {{-- {{ date('F', strtotime(getTimeZoneDate($tzt,$tz, date('d F Y h:i A',$appointment->service_date/1000)))) }} --}}
                                                </p>
                                                <p class="f-45 m-0 cl-515151 robotoRegular">
                                                    @if(Auth::user()->type=='buyer')
                                                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d h:i:s',$appointment->service_date/1000))->format('d')}} 
                                                    @else
                                                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d h:i:s',$appointment->service_date/1000))->timezone($appointment->specialist->timezone)->format('d')}} 
                                                    @endif
                                                    {{-- {{ date('d', strtotime(getTimeZoneDate($tzt,$tz, date('d F Y h:i A',$appointment->service_date/1000)))) }} --}}
                                                </p>
                                                <p class="f-12 robotoRegular m-0">
                                                    @if(Auth::user()->type=='buyer')
                                                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d h:i:s',$appointment->service_date/1000))->format('Y')}} 
                                                    @else
                                                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d h:i:s',$appointment->service_date/1000))->timezone($appointment->specialist->timezone)->format('Y')}} 
                                                    @endif
                                                    {{-- {{ date('Y', strtotime(getTimeZoneDate($tzt,$tz, date('d F Y h:i A',$appointment->service_date/1000)))) }} --}}
                                                </p>
                                                <p class="f-8 robotoRegular m-0">
                                                    {{ date('g:i A',$appointment->service_date/1000) }}
                                                    {{-- {{ getTimeZoneTime($tzt,$tz,date('d F Y h:i A',$appointment->service_date/1000)) }} --}}
                                                </p>
                                            </div>
                                            <div class="height d-sm-none"></div>
            
                                            <!-- 2 -->
                                            <div class="col-lg-8 linear_flex col-lg-5 p-0 d-flex justify-content-center align-items-start flex-column">
                                                <p>{{ Auth::user()->type=='seller' ? $appointment->user->username : $appointment->specialist->username}}</p>
                                                <div class="d-flex">
                                                    <div class="f-18 d-flex align-items-center cl-000000 robotoRegular">
                                                        {{ $appointment->service_name }}
                                                    </div>
                                                    <div class="f-24 pl-2 cl-616161 robotoRegular">${{ $appointment->service_cost }}</div>
                                                </div>
                                                <div class="robotoRegular cl-616161">
                                                    {{ ucfirst($appointment->service_time)  }} Minutes
                                                </div>
                                                {{--
                                                <div class="f-14 cl-9c9c9c pt-1">6656 us 301, Riverview, 33578</div>
                                                --}}
                                            </div>
                                            <!-- end -->
                                            <!-- 3 -->
                                            <div class=" col-lg-2 pr-0 d-flex justify-content-center flex-column align-items-center">
                                                @if (Auth::user()->type=='seller')
                                                    @if (($appointment->paystate == "0" || $appointment->paystate==null))
                                                        <div class="pt-3"><button class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-bbbbbb border-0 buttonBoxShadow pt-2 pb-2 robotoRegular pl-4 pr-4">Pending Client Payment</button></div>
                                                    @elseif($appointment->paystate == "1" && $appointment->state=="2")
                                                        @php
                                                            // $currentDate = new DateTime("now");
                                                        //echo $currentDate->format('Y-m-d H:i:s a');
                    
                                                        // $fromDate2 = new DateTime(date('M-d-Y h:i A',$appointment->service_date/1000+300));
                                                        //echo $fromDate2->format('Y-m-d H:i:s a');
                    
                                                        // $interval = $currentDate->diff($fromDate2);
                                                        // $time =$interval->format('%h:%i');
                                                        // $timeh =$interval->format('%h');
                                                        // $timei =$interval->format('%i');
                                                        // print_r($appointment->service_date/1000+300);
                                                        @endphp
                                                        <input type="hidden" id="sender{{ $appointment->id }}" value="{{ $appointment->specialist->id }}">
                                                        <input type="hidden" id="reciever{{ $appointment->id }}" value="{{ $appointment->user->id }}">
                                                        <input type="hidden" id="username{{ $appointment->id }}" value="{{ $appointment->user->username }}">
                                                        <input type="hidden" id="sender_reciever{{ $appointment->id }}" value="{{ $appointment->specialist->id.'_'.$appointment->user->id }}">
                                                        <input type="hidden" id="reciever_sender{{ $appointment->id }}" value="{{ $appointment->user->id.'_'.$appointment->specialist->id }}">
                                                        <div class="pt-3 d-none seller-video-chat-img-{{ $appointment->id }}"><button class="btn btn-success my-2 my-sm-0 cl-ffffff bg-bbbbbb border-0 buttonBoxShadow pt-2 pb-2 robotoRegular pl-4 pr-4 video-chat"  onclick="makeCall(this)" data-booking-id="{{ $appointment->id }}" data-id="{{ $appointment->id }}" data-sender="{{ $appointment->specialist->id }}" data-reciever="{{ $appointment->user->id }}" id="video-chat" data-caller="{{$appointment->user->username}}"><img src="{{asset('assets/frontend/images/enter.png')}}" style="width:62%;" alt="" srcset=""></button></div>
                                                    @else
                                                        <div class="pt-3">
                                                            <button type="button" onclick="bookingReject('{{ $appointment->id }}')" class="btn btn-success my-2 my-sm-0 cl-ffffff bg-bbbbbb border-0 buttonBoxShadow pt-2 pb-2 robotoRegular pl-4 pr-4">Decline</button>
                                                        </div>
                                                    @endif
                                                @endif 

                                                @if (Auth::user()->type=='buyer' && ($appointment->paystate == "0" || $appointment->paystate==null) )
                                                    <div class="pt-3">
                                                        <p class="f-12 robotoRegular m-0">Specialist Accepted <br> pay now to confirm Appointment</p>
                                                        <a href="{{route('appointmentPayment',$appointment->id)}}" class="btn payment_btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-bbbbbb border-0 buttonBoxShadow pt-2 pb-2 robotoRegular pl-4 pr-4">Payment</a>
                                                    </div>
                                                @elseif(Auth::user()->type=='buyer' && $appointment->paystate == "1" && $appointment->state == "2" )
                                                    <input type="hidden" id="sender{{ $appointment->id }}" value="{{ $appointment->user->id }}">
                                                    <input type="hidden" id="reciever{{ $appointment->id }}" value="{{ $appointment->specialist->id }}">
                                                    <input type="hidden" id="username{{ $appointment->id }}" value="{{ $appointment->specialist->username }}">
                                                    <input type="hidden" id="sender_reciever{{ $appointment->id }}" value="{{ $appointment->user->id.'_'.$appointment->specialist->id }}">
                                                    <input type="hidden" id="reciever_sender{{ $appointment->id }}" value="{{ $appointment->specialist->id.'_'.$appointment->user->id }}">
                                                    <div class="pt-3 d-none buyer-video-chat-img-{{ $appointment->id }}"><button class="btn bg-transparent border-0 video-chat"  onclick="makeCall(this);" data-booking-id="{{ $appointment->id }}" data-sender="{{ $appointment->user->id }}" data-reciever="{{ $appointment->specialist->id }}" data-id="{{ $appointment->id }}" id="client-video-chat" data-caller="{{$appointment->specialist->username}}"><img src="{{asset('assets/frontend/images/enter.png')}}" style="width:62%;" alt="" srcset=""></button></div>
                                                    <div class="pt-3">
                                                        <form action="{{ route('appointments.update',$appointment->id) }}" method="post">
                                                            @csrf @method('put')
                                                            <input type="hidden" name="status" value="3" />
                                                            <button type="submit" class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-bbbbbb border-0 buttonBoxShadow pt-2 pb-2 robotoRegular pl-4 pr-4">Complete</button>
                                                        </form>
                                                    </div>
                                                    
                                                @endif
                                                @if ($appointment->paystate != "1" && $appointment->state!="2")
                                                    <div class="pt-3">
                                                        <button type="button" onclick="bookingReject('{{ $appointment->id }}')" class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-bbbbbb border-0 buttonBoxShadow pt-2 pb-2 robotoRegular pl-4 pr-4">Cancel Request</button>
                                                    </div>
                                                @endif
                                                
                                                @if ($appointment->state == "2" && $appointment->paystate == "1")
                                                    <div class="pt-3">
                                                        @if(App\ClientSpecialistDispute::where('project_id',$appointment->id)->first() ==null)
                                                            <a href="{{ route('dispute-araise',['project'=>encrypt($appointment->id),'id'=>Auth::user()->type=="buyer"? encrypt($appointment->specialist->id):encrypt($appointment->user->id)]) }}?project_type=appointments" class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-bbbbbb border-0 buttonBoxShadow pt-2 pb-2 robotoRegular pl-4 pr-4">Raise Dispute</a>
                                                        @else
                                                            <a href="{{ route('disputes.show',encrypt(App\ClientSpecialistDispute::where('project_id',$appointment->id)->first()->id)) }}" target="_blank" class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-bbbbbb border-0 buttonBoxShadow pt-2 pb-2 robotoRegular pl-4 pr-4">View Dispute</a>    
                                                        @endif
                                                    </div>
                                                @endif

                                            </div>
                                            <!-- end -->
                                        @else
                                            <div class="text-center d-flex justify-content-center flex-column align-items-center">Appointment ID: {{$appointment->id}} and Service Name:{{$appointment->service_name}} has some issue please contact with our support support@learnme.live</div>
                                        @endif
                                    </div>
                                </section>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="tab-pane container tabPaneOne" id="completed">
        <div class="table-responsive ServiceTableData px-3 p_Sm-0 mt-1" id="ServiceTableData">
            <table id="example2" class="table example1" style="width: 100%;">
                <thead class="d-none">
                    <tr class="text-uppercase">
                        <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($completed as $key => $appointment)
                        
                        <tr class="border-0">
                            <td class=" border-0">
                                {{-- <section class="p-100"> --}}
                                <section>
                                    <div class="row pt-3 pb-3 flex-directionSmall align-items-center box_shadow1 ml-0 mr-0 borderRadius-10px justify-content-between">
                                        @if($appointment->specialist !=null && $appointment->user!=null) 
                                            @php 
                                                $tz = Auth::user()->type=='seller' ? $appointment->specialist->timezone : $appointment->user->timezone; 
                                                $tzt = Auth::user()->type=='seller' ? $appointment->user->timezone : $appointment->specialist->timezone; 
                                            @endphp
                                            <div class="col-lg-2 pl-0">
                                                <p class="robotoRegular cl-515151 f-13 m-0">
                                                    @if(Auth::user()->type=='buyer')
                                                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d h:i:s',$appointment->service_date/1000))->format('F')}} 
                                                    @else
                                                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d h:i:s',$appointment->service_date/1000))->timezone($appointment->specialist->timezone)->format('F')}} 
                                                    @endif
                                                        
                                                    {{-- {{ date('F', strtotime(getTimeZoneDate($tzt,$tz, date('d F Y h:i A',$appointment->service_date/1000)))) }} --}}
                                                </p>
                                                <p class="f-45 m-0 cl-515151 robotoRegular">
                                                    @if(Auth::user()->type=='buyer')
                                                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d h:i:s',$appointment->service_date/1000))->format('d')}} 
                                                    @else
                                                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d h:i:s',$appointment->service_date/1000))->timezone($appointment->specialist->timezone)->format('d')}} 
                                                    @endif
                                                    {{-- {{ date('d', strtotime(getTimeZoneDate($tzt,$tz, date('d F Y h:i A',$appointment->service_date/1000)))) }} --}}
                                                </p>
                                                <p class="f-12 robotoRegular m-0">
                                                    @if(Auth::user()->type=='buyer')
                                                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d h:i:s',$appointment->service_date/1000))->format('Y')}} 
                                                    @else
                                                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d h:i:s',$appointment->service_date/1000))->timezone($appointment->specialist->timezone)->format('Y')}} 
                                                    @endif
                                                    {{-- {{ date('Y', strtotime(getTimeZoneDate($tzt,$tz, date('d F Y h:i A',$appointment->service_date/1000)))) }} --}}
                                                </p>
                                                <p class="f-8 robotoRegular m-0">
                                                    {{ date('g:i A',$appointment->service_date/1000) }}
                                                    {{-- {{ getTimeZoneTime($tzt,$tz,date('d F Y h:i A',$appointment->service_date/1000)) }} --}}
                                                </p>
                                            </div>
                                            <div class="height d-sm-none"></div>
            
                                            <!-- 2 -->
                                            <div class="col-lg-8  linear_flex col-lg-5 p-0 d-flex justify-content-center align-items-start flex-column">
                                                <p>{{ Auth::user()->type=='seller' ? $appointment->user->username : $appointment->specialist->username}}</p>
                                                <div class="d-flex">
                                                    <div class="f-18 d-flex align-items-center cl-000000 robotoRegular">
                                                        {{ $appointment->service_name }}
                                                    </div>
                                                    <div class="f-24 pl-2 cl-616161 robotoRegular">${{ $appointment->service_cost }}</div>
                                                </div>
                                                <div class="robotoRegular cl-616161">
                                                    {{ ucfirst($appointment->service_time)  }} Minutes
                                                </div>
                                                {{--
                                                <div class="f-14 cl-9c9c9c pt-1">6656 us 301, Riverview, 33578</div>
                                                --}}
                                            </div>
                                            <!-- end -->
                                            <!-- 3 -->
                                            <div class="text-center col-lg-2 pr-0 d-flex justify-content-center flex-column align-items-center">
                                                
                                                @php
                                                    $payment = App\Payment::where('appointment_id',$appointment->id)->first();
                                                @endphp 
                                                
                                                @if ($payment != null && Auth::user()->type=='buyer' && $payment->release_status == 'pending')
                                                    <div class="pt-3">
                                                        <p class="f-12 robotoRegular m-0">Request Admin  <br> To Release Payment</p>
                                                        <button
                                                            class="btn payment_release btn-outline-success my-2 my-sm-0 cl-ffffff bg-bbbbbb border-0 buttonBoxShadow pt-2 pb-2 robotoRegular pl-4 pr-4" data-id="{{ $payment->id }}"
                                                            data-specialist="{{$appointment->specialist->id}}">
                                                            Realease Payment
                                                        </button>
                                                    </div>
                                                @endif
                                                
                                                @if ($appointment->paystate == "1")
                                                    <div class="pt-3">
                                                        @if(App\ClientSpecialistDispute::where('project_id',$appointment->id)->first() ==null)
                                                            <a href="{{ route('dispute-araise',['project'=>encrypt($appointment->id),'id'=>Auth::user()->type=="buyer"? encrypt($appointment->specialist->id):encrypt($appointment->user->id)]) }}?project_type=appointments" class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-bbbbbb border-0 buttonBoxShadow pt-2 pb-2 robotoRegular pl-4 pr-4">Raise Dispute</a>
                                                        @else
                                                            <a href="{{ route('disputes.show',encrypt(App\ClientSpecialistDispute::where('project_id',$appointment->id)->first()->id)) }}" target="_blank" class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-bbbbbb border-0 buttonBoxShadow pt-2 pb-2 robotoRegular pl-4 pr-4">View Dispute</a>    
                                                        @endif
                                                    </div>
                                                @endif

                                                @if (Auth::user()->type=='buyer' && $appointment->paystate == "1" && $appointment->review==null)
                                                    <div class="modal fade" tabindex="-1" role="dialog" id="review_modal{{$appointment->id}}">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title ml-4">Add Review</h5>
                                                                    <button type="button" class="close mr-2 close{{$appointment->id}} review-modal-close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body" style="text-align: start" >
                                                                    <form id="add-review-form-{{$appointment->id}}">
                                                                        <input type="hidden" name="review_from" value="appointments" />
                                                                        <input type="hidden" name="review_item_id" value="{{ $appointment->id }}" />
                                                                        <div class="ml-4 input-group mb-1 pt-2">
                                                                            <div class="w-100"><label>Rating</label></div>
                                                                            <div class="w-100">
                                                                                <fieldset class="rating">
                                                                                    <input type="radio" id="mystar{{ $appointment->id }}1" name="rating" value="1" onchange="ratingChange(this)"/>
                                                                                    <label onclick="labelChange(this);" data-id="1" class="full" for="mystar{{ $appointment->id }}1" title="Sucks big time - 1 star"></label>
                                                                                    <input type="radio" id="mystar{{ $appointment->id }}2" name="rating" value="2" onchange="ratingChange(this)"/>
                                                                                    <label onclick="labelChange(this);" data-id="2" class="full" for="mystar{{ $appointment->id }}2" title="Kinda bad - 2 stars"></label>
                                                                                    <input type="radio" id="mystar{{ $appointment->id }}3" name="rating" value="3" onchange="ratingChange(this)"/>
                                                                                    <label onclick="labelChange(this);" data-id="3" class="full" for="mystar{{ $appointment->id }}3" title="Meh - 3 stars"></label>
                                                                                    <input type="radio" id="mystar{{ $appointment->id }}4" name="rating" value="4" onchange="ratingChange(this)"/>
                                                                                    <label onclick="labelChange(this);" data-id="4" class="full" for="mystar{{ $appointment->id }}4" title="Pretty good - 4 stars"></label>
                                                                                    <input type="radio" id="mystar{{ $appointment->id }}5" name="rating" value="5" onchange="ratingChange(this)"/>
                                                                                    <label onclick="labelChange(this);" data-id="5" class="full" for="mystar{{ $appointment->id }}5" title="Awesome - 5 stars"></label>
                                                                                    
                                                                                </fieldset>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group mb-3 pt-3 ml-4 col-md-11">
                                                                                <label class="mb-2">Review Detail</label>
                                                                                <textarea type="text" class="w-100 form-control border" placeholder="Enter Message Body" name="review"></textarea>
                                                                            </div>
                                                                        </div>
                                
                                                                        <button type="button" class="btn btn-sm btn-success ml-4" onclick="add_review(this,'add-review-form-{{$appointment->id}}');" data-id="{{$appointment->id}}">Add</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-outline-success my-2 cl-ffffff bg-bbbbbb border-0 buttonBoxShadow pt-2 pb-2 robotoRegular pl-4 pr-4" data-toggle="modal" data-target="#review_modal{{$appointment->id}}"
                                                    data-id="{{ $appointment->id }}" data-specialist="{{ $appointment->seller_id }}">Add Review</button>
                                                @endif

                                            </div>
                                            <!-- end -->
                                        @else
                                            <div class="text-center d-flex justify-content-center flex-column align-items-center">Appointment ID: {{$appointment->id}} and Service Name:{{$appointment->service_name}} has some issue please contact with our support support@learnme.live</div>
                                        @endif
                                    </div>
                                </section>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

  </div>

{{-- Modal for payment --}}
<div class="modal fade" tabindex="-1" role="dialog" id="payment_modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enter Detail for Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="payment_request"></div>
            </div>
        </div>
    </div>
</div>

@endsection {{-- footer section start --}} @section('extra-script')
<script>
    // release payment
    $(".payment_release").on("click", function () {
        var payment_id = $(this).data("id");
        var specialist = $(this).data("specialist");
        $.ajax({
            type: "post",
            url: "{{ url('release_payment') }}"+"/"+payment_id,
            data: {
                _token: "{{ csrf_token() }}",
                specialist_id :specialist,
            },
            success: function (data) {
                swal({
                    icon: "success",
                    text: data,
                    icon: 'success'
                });
                setInterval(function(){
                    window.location = '';
                },2000);
            },
        });
    });

    function labelChange(elem) {
        let e = $(elem).data("id");
        console.log("#star" + e);
        $("#star" + e).attr("checked", true);
    }

    function ratingChange(elem) {
        $(elem).addClass("checked");
        $(elem).prevAll().addClass("checked");
        $(elem).nextAll().removeClass("checked");
        $(elem).nextAll().children("input").attr("checked", false);
        $("span.checked").each(function () {
            $(this).children("input").attr("checked", true);
        });
    }
    // ajax for payment
    $(".payment_btn").on("click", function () {
        var specialist_id = $(this).data("specialist");
        var amount = $(this).data("amount");
        var appointment = $(this).data("id");
        var payment_for = $(this).data("payment_for");
        console.log(specialist_id, appointment, amount, payment_for);
        $("#payment_request").empty();
        $.ajax({
            type: "get",
            url: "{{ url('stripe') }}",
            data: {
                _token: "{{ csrf_token() }}",
                specialist_id: specialist_id,
                amount: amount,
                appointment: appointment,
                payment_for: payment_for,
            },
            success: function (data){

                if (data.success == true) 
                {
                    $("#payment_request").html(data.message);
                } 
                else {
                    if (data.hasOwnProperty('message')) {
                        var wrapper = document.createElement('div');
                        var err = '';
                        $.each(data.message, function (i, e) {
                            err += '<p>' + e + '</p>';
                        })

                        wrapper.innerHTML = err;
                        swal({
                            icon: "error",
                            text: "{{ __('Please fix following error!') }}",
                            content: wrapper,
                            type: 'error'
                        });
                    }
                }
            },
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(".blah").attr("src", e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
            $("#avatar_form").submit();
        }
    }
    
    $(".work_status").on("click", function () {
        var bid = $(this);
        var bid_id = $(this).data("bid");
        var work_status = $(this).attr("data-work_status");
        $.ajax({
            type: "post",
            url: "{{ route('bid_work_status') }}",
            data: {
                _token: "{{ csrf_token() }}",
                bid_id: bid_id,
                work_status: work_status,
            },
            success: function (data) {
                if (data == "Completed") {
                    bid.removeClass("btn-success").addClass("btn-danger");
                    bid.text("Mark Un-Complete");
                    bid.attr("data-work_status", "0");
                }
                if (data == "Un-Complete") {
                    bid.attr("data-work_status", "1");
                    bid.removeClass("btn-danger").addClass("btn-success");
                    bid.text("Mark Completed");
                }
            },
        });
    });

    function add_review(e,formID){
        let id = $(e).data("id");
        var myform = document.getElementById(formID);
        var fd = new FormData(myform);
        fd.append("_token", "{{ csrf_token() }}");
        $.ajax({
            url: "{{ route('review.store') }}",
            type: "post",
            processData: false,
            contentType: false,
            data: fd,
            success: function (data) {
                if (data.success == true) {
                    swal("success", data.message, "success").then((value) => {
                        $(".review-modal-close").click();
                        $(".add-review-" + id).hide();
                        window.location='';
                    });
                } else {
                    if (data.hasOwnProperty("message")) {
                        var wrapper = document.createElement("div");
                        var err = "";
                        $.each(data.message, function (i, e) {
                            err += "<p>" + e + "</p>";
                        });

                        wrapper.innerHTML = err;
                        swal({
                            icon: "error",
                            text: "{{ __('Please fix following error!') }}",
                            content: wrapper,
                            type: "error",
                        });
                    }
                }
            },
        });
    }

    setInterval(function(){
        $.ajax({
            type: 'get',
            url : '{{ route("getAppointmentUpdate") }}',
            success:function(data)
            {
                data.map(appointment=>{
                    if(appointment.status==true){
                        if(appointment.type=='seller')
                        {
                            $('.seller-video-chat-img-'+appointment.id).removeClass('d-none');
                        }else{
                            $('.buyer-video-chat-img-'+appointment.id).removeClass('d-none');
                        }
                    }else{
                        if(appointment.type=='seller')
                        {
                            $('.seller-video-chat-img-'+appointment.id).addClass('d-none');
                        }else{
                            $('.buyer-video-chat-img-'+appointment.id).addClass('d-none');
                        }
                    }
                });

            }
        });
    },1000);

</script>
@endsection {{-- footer section end --}}
