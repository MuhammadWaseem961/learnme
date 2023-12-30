@extends('layouts.frontend.app') @section('title','Appointment Request') {{-- head start --}} @section('extra-css')

<style type="text/css">
    .dropdown-toggle::after {
        display: none;
    }

    input[type='radio']:after {
    width: 20px;
    height: 20px;
    border-radius: 15px;
    top: -4px;
    left: -1px;
    position: relative;
    background-color: #d1d3d1;
    content: '';
    display: inline-block;
    visibility: visible;
    border: 2px solid white;
}


</style>
@endsection {{-- head end --}} {{-- content section start --}} 
@section('content')
    <section class="px-5 pt-2 pb-2 nav-bg-img robotoRegular">
        @include('includes.frontend.navbar')
    </section>

    @include('includes.frontend.navigations')

    <section class="main_padding pt-70">

        <div class="container-fluid error-message-div ml-1" style="display:none;">
            <div class="row">
                <div class="col-12 px-0">
                    <div class="alert alert-danger alert-block" role="alert">
                        {{-- <button type="button" class="close" data-dismiss="alert">×</button> --}}
                        <strong class="error-message-text"></strong>
                    </div>
                </div>
            </div>
        </div>

        @foreach(['mon','tue','wed','thr','fri','sat','sun'] as $d)
            @if($d=='mon')@php $cDay='monday'@endphp
            @elseif($d=='tue')@php $cDay='tuesday'@endphp
            @elseif($d=='wed')@php $cDay='wednesday'@endphp
            @elseif($d=='thr')@php $cDay='thursday'@endphp
            @elseif($d=='fri')@php $cDay='friday'@endphp
            @elseif($d=='sat')@php $cDay='saturday'@endphp
            @elseif($d=='sun')@php $cDay='sunday'@endphp
            @endif
            
            @if($specialist->availableTime!=null && $specialist->availableTime->$d !="Closed")
                @php $arr = explode(' ~ ',$specialist->availableTime->$d); @endphp
                <input type="hidden" name="sDays[]" id="sDays" value="{{ucfirst($cDay)}}">
                <input type="hidden" name="{{ucfirst($cDay)}}_from"  value="{{ $arr[0]/1000 }}">
                <input type="hidden" name="{{ucfirst($cDay)}}_to"  value="{{ $arr[1]/1000 }}">
            @endif
            
        @endforeach
        
        <form id="create-form" method="POST">
            @csrf
            @php $tRate = 't_'.$time @endphp
            <input type="hidden" name="rate" id="rate" value="{{ $service->$tRate }}" />
            <input type="hidden" name="service_id" id="service_id" value="{{ $service->id }}" />
            <input type="hidden" name="service_time" id="time" value="{{ $time }}" />
            <input type="hidden" name="specialist_id" id="specialist_id" value="{{ $specialist->id }}" />
            <input type="hidden" name="appointment_date" id="date" value="" />
            <div class="row m-0 justify-content-between flex-nowrap flex-directionSmall">
                <div class="col-lg-3 col-md-3 col-sm-12 light mw-33 p-0">
                    <div class="calendar robotoRegular calender_Shadow pl-2 pr-2 pt-3 pb-3">
                        <div class="calendar__month">
                            <div class="cal-month__previous"><</div>
                            <div class="cal-month__current"></div>
                            <div class="cal-month__next">></div>
                        </div>
                        <div class="calendar__head border-bottom">
                            <div class="cal-head__day"></div>
                            <div class="cal-head__day"></div>
                            <div class="cal-head__day"></div>
                            <div class="cal-head__day"></div>
                            <div class="cal-head__day"></div>
                            <div class="cal-head__day"></div>
                            <div class="cal-head__day"></div>
                        </div>
                        <div class="calendar__body pt-3">
                            <div class="cal-body__week">
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                            </div>
                            <div class="cal-body__week">
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                            </div>
                            <div class="cal-body__week">
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                            </div>
                            <div class="cal-body__week">
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                            </div>
                            <div class="cal-body__week">
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                            </div>
                            <div class="cal-body__week">
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                                <div class="cal-body__day"></div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-9 col-md-9 mw-67 pl-3 pb-4 pr-3 calender_Shadow borderRadius-12px padding-top">

                    @foreach(['mon','tue','wed','thr','fri','sat','sun'] as $d)
                        @if($specialist->availableTime!=null && $specialist->availableTime->$d !="Closed")
                            @php $arr = explode(' ~ ',$specialist->availableTime->$d); @endphp
                            @if($d=='mon')@php $cDay='monday'@endphp
                            @elseif($d=='tue')@php $cDay='tuesday'@endphp
                            @elseif($d=='wed')@php $cDay='wednesday'@endphp
                            @elseif($d=='thr')@php $cDay='thursday'@endphp
                            @elseif($d=='fri')@php $cDay='friday'@endphp
                            @elseif($d=='sat')@php $cDay='saturday'@endphp
                            @elseif($d=='sun')@php $cDay='sunday'@endphp
                            @endif
                            <div class="all-day {{ucfirst($cDay)}}" style="display: none;">
                                
                                @php
                                    date_default_timezone_set(Auth::user()->timezone);
                                    $f_time = date('g:i A',$arr[0]/1000); 
                                    $t_time = date('g:i A',$arr[1]/1000); 
                                    $start    = new DateTime($f_time);
                                    $end      = new DateTime($t_time);
                                    $interval = new DateInterval('PT30M');
                                    $period   = new DatePeriod($start, $interval, $end);
                                @endphp

                                <div class="row m-0 pt-4">
                                    <div class="col-md-6 col-lg-6 p-0">
                                        <div class="d-flex">
                                            <div><img src="{{ asset('assets/frontend/images/Group198.png') }}" alt="" class="img-fluid w-75" /></div>
                                            <div class="f-21 robotoRegular cl-000000 pl-3">
                                                Available Time
                                                <div class="f-16 cl-878787">{{ $f_time }} ~ {{ $t_time }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="row pt-4 ml-1 mr-1">
                                    @foreach ($period as $time)

                                        <div class="ml-4 robotoRegular cl-878787 col-md-2 text-center p-0">
                                            <label class="border pt-2 rounded w-100 pb-2 d-flex justify-content-center align-items-center">
                                                
                                                <input type="radio" name="appointment_time" class="bg-success btnclass" value="{{$time->format('g:i A')}}"/>
                                                <span class="checkmark pl-2">{{$time->format('g:i A')}}</span>
                                            </label>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="border w-100 mt-5"></div>
                                
                                <div class="row m-0 pt-3">
                                    <div class="col-md-6 p-0">
                                        
                                    </div>
                                    <div class="col-md-6 pl-0 ml-auto text-end pr-0">
                                        <button type="button" onclick="createAppointment(this)" class="btn btn-outline-success my-2 d-flex justify-content-end my-sm-0 cl-ffffff bg-3ac574 pl-2 pr-2 login_button ml-auto">Get Appointment</button>
                                    </div>
                                </div>

                            </div>

                        @endif
                        
                    @endforeach
                    
                </div>
            </div>
        </form>
    </section>

    @if($specialist->serviceCategories->count() >0)
        <section class="main_padding pt-5">
            <div class="row m-0 p-0">
                <div class="robotoMedium cl-000000 f-34 pt-2 d-flex align-items-end">Services:</div>
                <div class="col-md-3 ml-auto p-0">
                    <div class="d-flex m-0 align-items-center">
                        <div class="pt-4 w-100">
                            <input type="text" placeholder="Search for services"
                                class="service_inpt robotoRegular h-44 cl-6b6b6b bg-transparent footer_input pt-2 pb-2 pl-3 w-100 rounded">
                        </div>
                        <div class="pt-4 pl-2">
                            <button
                                class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-3ac574  pt-2 pb-2 pl-2 pr-2 service_inpt_btn"
                                type="button" onclick="inputSearchServices();"><img
                                    src="{{ asset('assets/frontend/images/Group 188.png ') }}" alt=""></button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive tableFixHead table_scroll mt-5 border robotoRegular ">
                    <table id="boxes-list" class="table m-0 header-fixed">

                        <thead class="sticky-top bg-white cl-3ac754 ">
                            <tr class="bg-white robotoRegular ">
                                <th scope="col">Service</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Rate</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table_scroll services-table-body">
                            @foreach($specialist->serviceCategories as $serviceCategory)

                                @if($specialist->serviceCategory->t_15!=null)

                                    <tr class="border-bottom">
                                        <td>{{ ucwords($serviceCategory->name) }}</td>
                                        <td>15 Minutes</td>
                                        <td> ${{number_format(intval($serviceCategory->t_15)) }} (USD)</td>
                                        <td><a href="{{ route('appointment_request',encrypt($serviceCategory->id)) }}?time=15"
                                                class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-3ac574  pl-5 pr-5 login_button">Book</a>
                                        </td>
                                    </tr>
                                @endif
                                @if($serviceCategory->t_30!=null)

                                    <tr class="border-bottom">
                                        <td>{{ ucwords($serviceCategory->name) }}</td>
                                        <td>30 Minutes</td>
                                        <td> ${{number_format(intval($serviceCategory->t_30)) }} (USD)</td>
                                        <td><a href="{{ route('appointment_request',encrypt($serviceCategory->id)) }}?time=30"
                                                class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-3ac574  pl-5 pr-5 login_button">Book</a>
                                        </td>
                                    </tr>
                                @endif
                                @if($serviceCategory->t_45!=null)

                                    <tr class="border-bottom">
                                        <td>{{ ucwords($serviceCategory->name) }}</td>
                                        <td>45 Minutes</td>
                                        <td> ${{number_format(intval($serviceCategory->t_45)) }} (USD)</td>
                                        <td><a href="{{ route('appointment_request',encrypt($serviceCategory->id)) }}?time=45"
                                                class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-3ac574  pl-5 pr-5 login_button">Book</a>
                                        </td>
                                    </tr>
                                @endif
                                @if($serviceCategory->t_60!=null)

                                    <tr class="border-bottom">
                                        <td>{{ ucwords($serviceCategory->name) }}</td>
                                        <td>60 Minutes</td>
                                        <td> ${{number_format(intval($serviceCategory->t_60)) }} (USD)</td>
                                        <td><a href="{{ route('appointment_request',encrypt($serviceCategory->id)) }}?time=60"
                                                class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-3ac574  pl-5 pr-5 login_button">Book</a>
                                        </td>
                                    </tr>
                                @endif  

                            @endforeach
                            
                        </tbody>
                    </table>
                </div>

            </div>
        </section>
    @endif

    @if($specialist->portfolios->count() >0 )
        <section class=" main_padding pt-70 text-center plr-sm-0">
            <p class="main_title robotoMedium  f-34 cl-000000  m-0">Check out my previous work.</p>
            <!-- <p class="f-21 m-0 pt-3 cl-616161 robotoRegular">The best and highly skilled Performance done previously</p> -->
            <img src="{{ asset('assets/frontend/images/greencurve.png') }}" class="img-fluid pt-3" alt="">
        </section>

        <section class=" main_padding pt-70 ">
            <div class="row m-0">
                @foreach ($specialist->portfolios->take(1) as $portfolio)
                <div class="col-lg-7 col-md-7 col-sm-12 pl-0 pr-0 bg_img_8 d-flex flex-column  justify-content-end"  >
                    <img src="{{ $portfolio->image }}" alt="" class="w-100 h-100 border-10">
                </div>
                @endforeach
                <div class="col-lg-5 col-md-5 col-sm-12 pr-0 d-flex flex-column justify-content-between p_Sm-0">
                    @foreach ($specialist->portfolios->skip(1)->take(2) as $portfolio)
                        <div class="bg_imgcol-5 d-flex flex-column  justify-content-end mt-sm-por">
                            <img src="{{ $portfolio->image }}" alt="" class="w-100 h-100 border-10">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        @if($specialist->portfolios->count() >3)
            <section class=" main_padding pt-5 text-center">
                <a href="{{route('specialist_portfolio',encrypt($specialist->id))}}" class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-3ac574  pl-5 pr-5 " type="submit">See
                    all</a>
            </section>
        @endif
    @endif

@endsection {{-- content section end --}} 
{{-- footer section start --}} 

@section('extra-script')
    <script src="{{ asset('assets/frontend/js/app.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.0.0/moment.min.js"></script> --}}
    <script>

    const convertTime12to24 = (time12h) => {
        const [time, modifier] = time12h.split(' ');

        let [hours, minutes] = time.split(':');

        if (hours === '12') {
            hours = '00';
        }

        if (modifier === 'PM') {
            hours = parseInt(hours, 10) + 12;
        }

        return `${hours}:${minutes}`;
    }

    function inputSearchServices()
    {
        let val = $('.service_inpt').val();
        $.ajax({
            url:"{{ route('getQueryServices') }}",
            type:"get",
            data:{val:val,service_id:'{{ $service->id }}',id:'{{ $service->user_id }}'},
            success:function(data)
            {
            $('.services-table-body').html(data);
            }
        });
    }

    $(document).keydown(function(e)
    {
        if(e.which === 13){
            inputSearchServices();
        }
    });

    $(".appointment-btn").on("click", function () {
        
        if($("input[name='appointment_time']:checked").val() == null){
            swal({
                    icon: "error",
                    text: " Please select any time slot for appointment",
                    type: 'error'
                });
            return false
        }
        var month_year = $(".cal-month__current").text();
        var day = $(".cal-day__day--selected").text();
        $("#date").val(day + " " + month_year);
    });

    // create/add appointment
    function createAppointment() {
        $('.all-loader').removeClass('d-none');
        var month_year = $(".cal-month__current").text();
        var day = $(".cal-day__day--selected").text();
        $("#date").val(day + " " + month_year);
        var myform = document.getElementById("create-form");
        var fd = new FormData(myform);
        fd.append("_token", "{{ csrf_token() }}");
        $.ajax({
            url: "{{ route('store.appointment') }}",
            type: "post",
            processData: false,
            contentType: false,
            data: fd,
            success: function(data) {
                $('.all-loader').addClass('d-none');
                if (data.success == true) {
                    swal("success", data.message, "success").then((value) => {

                        window.location = "{{ route('appointments.index') }}";
                    });
                } else {
                    if (data.hasOwnProperty("message")) {
                        var wrapper = document.createElement("div");
                        var err = "";
                        $.each(data.message, function(i, e) {
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
        var specialistDays = $("input[name='sDays[]']").map(function(){return $(this).val();}).get();
        var month_year = $(".cal-month__current").text();
        var day = $(".cal-day__day--selected").text();
        var d = new Date(day + " " + month_year);
        if(specialistDays.includes(d.toLocaleString('en-us', {weekday: 'long'})))
        {
            $('.all-day').hide();
            $('.'+d.toLocaleString('en-us', {weekday: 'long'})).show();
            $('.error-message-div').hide();
        }
        else
        {
            $('.all-day').hide();
            $('.error-message-div').show();
            $('.error-message-text').html("{{ $specialist->username }} is not available at "+ d.toLocaleString('en-us', {weekday: 'long'})+".");
        }
    },1000);

    </script>
@endsection 
