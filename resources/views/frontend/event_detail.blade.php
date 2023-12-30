@extends('layouts.frontend.app')
@section('title','Events')
{{-- head start --}}

@section('extra-css')


<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/utility.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/navbar.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/portfolio.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <section class="px-5 pt-2 pb-2 nav-bg-img robotoRegular">
        @include('includes.frontend.navbar')
    </section>

    @include('includes.frontend.event-navigations')

    <section class="main_padding my-5">
        <section class="bgEventsBanner rounded shadow" style='background-image: linear-gradient(
            to bottom,
            rgb(0 0 0 / 19%),
            rgb(0 0 0 / 33%)
        ),
        url("{{asset($event->image)}}");'>

            <div class="row m-0 px-0 px-lg-5 px-md-2 px-0 w-100">
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="robotoMedium text-white eventsBannerHeading mb-3">{{$event->title}}</div>
                    <h3 class="robotoMedium m-0 text-white">By: {{$event->user->username}}</h3>
                    {{-- <h5 class="robotoRegular text-white m-0 pt-3 text-justify pr-0 pr-lg-0 pr-md-2 pr-sm-0">{{$event->summery}}</h5> --}}
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 ">
                    <div class="bg-white shadow px-3 py-3 textRight">
                        <div class="cl-444444 h4 robotoMedium">Date and time</div>
                        <div class="cl-444444 h6 robotoRegular pt-2">{{ date('D F d Y',strtotime($event->date_time)) }}</div>
                        <div class="cl-444444 h6 robotoRegular">{{ date('h:i A',strtotime($event->date_time)) }}</div>
                        {{-- <a href="" class="h5 cl-003cff robotoRegular">+ Add to calender</a> --}}
                        <div class="pt-3 ">
                            @if($check)
                                <h5 class="robotoMedium mb-2  font-weight-bolder cl-3ac754 m-0">${{$event->price}} USD</h5>
                                <div>
                                    <a type="button" href="{{ route('get_event_ticket',$event->slug) }}" class="btn bg-3ac574 robotoMedium d-flex align-items-center justify-content-center shadow h2 m-0 py-1 text-white w-100 tickets_button">Buy Ticket</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <section class="main_padding  w-100">
        <div class="border"></div>
        <div class="row m-0 py-5">
            <div class="col-lg-9 col-md-8 col-sm-12 pl-0">
                <div class="cl-444444 h5  robotoMedium">{{$event->title}}</div>
                <h5 class="cl-444444  m-0 py-2 robotoMedium">About Event</h5>
                <div class="cl-444444 f-18 py-2 robotoRegular ">
                    {!! $event->description !!}
                </div>
            
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12 pr-0">
                <h5 class="cl-444444 m-0   robotoMedium">About Event</h5>
                <p class="cl-444444 pt-3 robotoRegular mb-0 f-18">{{$event->location}}</p>
                <h5 class="cl-444444 m-0  pt-5  robotoMedium">Refund policy</h5>
                <p class="cl-444444 pt-3 robotoRegular mb-1 f-18 ">
               <div>Contact <a href="support@learnme.live">support@learnme.live</a> for a refund. </div>
                <div>learnme live’s fee is nonrefundable. </div>
                </p>
            </div>
        </div>
    </section>

@endsection

{{-- content section end --}}

{{-- footer section start --}}


@section('extra-script')
    <script>

        @if(Session::has('already'))
            swal(
                'Warning!',
                "{{ Session::get('already') }}",
                'warning'
            );
        @endif

    </script>
@endsection

{{-- footer section end --}}
<script>

</script>