@extends('layouts.frontend.app')
@section('title','Events')
{{-- head start --}}

@section('extra-css')

<style type="text/css">
.elementor-160 .elementor-element.elementor-element-125959e5 .elementor-icon {
    border-radius: 100px 100px 100px 100px;
}

.elementor-160 .elementor-element.elementor-element-125959e5 .elementor-social-icon {
    background-color: rgba(99, 115, 129, 0.5);
    --icon-padding: 1em;
}

.elementor-icon {
    display: inline-block;
    line-height: 1;
    -webkit-transition: all .3s;
    -o-transition: all .3s;
    transition: all .3s;
    color: #818a91;
    font-size: 50px;
    text-align: center;
}

.dropdown-toggle::after {
    display: none;
}

.main_Tite_div {
    width: fin;
}
</style>
@endsection
{{-- head end --}}
<style>
.main_Tite {

    letter-spacing: 4px;
}

.w-fit-content {
    width: fit-content;
}

.hover1:hover {
    transform: translateY(-8px);
    transition: 0.4s linear;
}
</style>

{{-- content section start --}}

@section('content')
    @php date_default_timezone_set(Auth::check()?Auth::user()->timezone:getCurrentUserTimeZone()); @endphp
    <section class="px-5 bg-navbar nav-bg-img pb-5">
        <nav class="navbar navbar-expand-lg navbar-light pl-0 pr-0 pt-2">
            <a class="navbar-brand w-90" href="{{ route('index') }}"><img
                    src="{{ asset('assets/frontend/images/navlogo.png') }}" alt="navbar logo" class="img-fluid" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <ul class="navbar-nav ml-auto d-flex align-self-center f-20">

                @guest

                <li class="nav-item">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <form class="form-inline my-2 my-lg-0 ml-auto cl-ffffff robotoRegular">
                            <a href="{{route('login')}}"
                                class="btn btn-outline-success border-0 my-2 my-sm-0 pt-2 pb-2 cl-ffffff  login_button"
                                type="submit">Log In</a>
                            <a href="{{route('register')}}"
                                class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-3ac574 mr-3 ml-3 login_button"
                                type="submit">Sign up</a>
                        </form>
                    </div>
                </li>

                @else
            </ul>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto d-flex justify-content-center align-items-center f-20 ">
                    <li class="nav-item  pl-4">
                        <a class="nav-img" data-toggle="dropdown" href="#">
                            @if (Auth::user()->picture != null)
                            <img src="{{ asset(Auth::user()->picture) }}"
                                onerror="this.error=null; this.src='{{asset('uploadfiles/userphoto/default.jpg')}}'"
                                class="img-fluid rounded-circle w-40 h-40"  width="40"  height="40" alt="profile" />
                            @else

                            <img src="{{ asset('uploadfiles/userphoto/default.jpg') }}" class="img-fluid w-40 h-40"
                                alt="profile" width="40"  height="40"/>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            @if (Auth::user()->type == 'buyer')
                            <a href="{{ route('client.index') }}" class="dropdown-item">Dashboard</a>

                            @endif
                            @if (Auth::user()->type == 'seller')
                            <a href="{{ route('specialist.index') }}" class="dropdown-item">Dashboard</a>

                            @endif

                            @if (Auth::user()->type != 'admin')
                            <a href="{{ route('profile.index') }}" class="dropdown-item">Profile</a>

                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>




                    </li>

                    <script src="{{ asset('assets/frontend/js/video-js/jquery.min.js') }}"></script>
                    <script>
                    $(document).ready(function() {
                        setInterval(function() {
                            var username = $('.video-chat').data('caller');
                            $.ajax({
                                type: 'get',
                                url: '{{ url("call-checker") }}',
                                data: {
                                    name: username
                                },
                                success: function(data) {
                                    if (data.status == 'pending' && data.caller !=
                                        '{{Auth::user()->username}}' && data.call_to ==
                                        '{{Auth::user()->username}}') {
                                        $('.calling-div').removeClass('d-none');
                                        $('.incoming-call').html('Incoming call from ' + data
                                            .caller[0].toUpperCase() + data.caller.slice(1));
                                        $('.accpet_call').attr('data-sender', data.sender);
                                        $('.accpet_call').attr('data-reciever', data.reciever);
                                        $('.accpet_call').attr('data-booking-id', data
                                            .booking_id);
                                        $('.accpet_call').attr('data-caller', data.caller);
                                        $('#sender').val(data.sender);
                                        $('#sender_reciever').val(data.sender + "_" + data
                                            .reciever);
                                        $('#reciever_sender').val(data.reciever + "_" + data
                                            .sender);
                                        $('#reciever').val(data.reciever);
                                        $('#username').val(data.caller);
                                        $('#review_item_id').val(data.booking_id);
                                        $('#booking_id').val(data.booking_id);
                                        if (data.check == 'true') {
                                            play();
                                        } else if (data.check == 'false') {
                                            endCall();
                                        }
                                    } else if (data.status == 'success') {
                                        $('#review_item_id').val(data.booking_id);
                                        $('#booking_id').val(data.booking_id);
                                        if (data.caller == '{{Auth::user()->username}}' && data
                                            .call_to != '{{Auth::user()->username}}') {
                                            $('.video-title').text(data.call_to +
                                                " has been joined you");
                                        } else if (data.caller !=
                                            '{{Auth::user()->username}}' && data.call_to ==
                                            '{{Auth::user()->username}}') {
                                            $('.video-title').text(data.caller +
                                                " has been joined you");
                                        }
                                    } else {
                                        @if(Auth::user()->type == 'seller')
                                        $('.video-title').text(
                                            'Call has been either ended or rejected');
                                        @else
                                        $('.video-title').text(
                                            'Call has been either ended or rejected');
                                        // $('.end-call').click();
                                        @endif

                                    }
                                }
                            })
                        }, 5000);
                    });
                    </script>

                    @endguest
                </ul>
            </div>
        </nav>

        <div class="text-center"><img src="{{ asset('assets/frontend/images/icon_black.png') }}" width="100"
                class="img-fluid" alt="" /></div>
        <div class="text-center pt-4">
            <p class="m-0 cl-ffffff robotoLight f-26 index_para">Book a virtual event with service professionals
                worldwide</p>
        </div>
        <div class="text-center pt-4 pb-4"><img src="{{ asset('assets/frontend/images/curve.png') }}" alt="" /></div>
    </section>
    @include('includes.frontend.event-navigations')
    <section class="main_padding py-5">
        
        @if(count($events) >0)
            <div><h4 class="robotoMedium  font-weight-bolder">Upcoming Events</h4></div>
            <div class="row m-0 py-5">
                @foreach($events as $event)

                    <div class="col-lg-3 col-md-4 col-sm-12 col-12 mb-4 px-2">
                        <a href="{{ route('specialist.events',$event->username) }}">
                            <div class="shadow rounded" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                                <img src="{{ asset($event->image) }}" class="w-100 m-height288" alt="...">
                                <div class="px-3 py-3">
                                    <h5 class="card-title m-0 robotoMedium cl-3ac754 pt-2">{{$event->title}}</h5>
                                    <h6 class="card-title text-dark m-0 robotoMedium cl-3ac754 pt-2"><span>By:</span> {{$event->username}}</h6>
                                    <div class="py-1 d-flex align-items-center "> <h6 class="card-title text-dark m-0 robotoMedium cl-3ac754 pt-2"><span>Reviews:</span></h6> <img class="ml-2 pt-2" src="{{ asset('assets/frontend/images/rating/'.explode(".",$event->rating)[0].'.png') }}" width="100" alt="" srcset=""></div>
                                   
                                    <p class="card-text f-15 robotoMedium cl-444444 pt-2 m-0"><i class="fa fa-calendar width14 " aria-hidden="true"></i>&nbsp;
                                        <span> {{ date('M d h:i A',strtotime($event->date_time)) }} </span>
                                        @if($event->singleUserCount >0)
                                            , +{{ $event->singleUserCount }} more events 
                                        @endif
                                    </p>
                                    <p class="card-text f-15 robotoMedium cl-444444 pt-2  m-0"><i class="fa fa-map-marker width14" aria-hidden="true"></i>&nbsp;
                                    {{$event->location}}</p>
                                    <h6 class="card-title text-dark m-0 robotoMedium cl-3ac754 pt-2"><span>Price:</span> ${{$event->price}}</h6>
                                    <div class="pt-3"><a href="{{ route('specialist.events',$event->username) }}" class="learnMoreButton w-100 px-5 py-1 btn robotoRegular" >Learn More</a></div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning">Events are not available</div>
        @endif
    </section>

@endsection

{{-- content section end --}}

{{-- footer section start --}}


@section('extra-script')

@endsection

{{-- footer section end --}}
<script>

</script>