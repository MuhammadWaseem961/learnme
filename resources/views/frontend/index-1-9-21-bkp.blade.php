@extends('layouts.frontend.app') @section('title','learnme live - Virtual Services Marketplace for Service
Professionals') {{-- head start --}} @section('extra-css')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/index.css') }}" />
<style type="text/css">
.dropdown-toggle::after {
    display: none;
}
</style>
@endsection {{-- head end --}} {{-- content section start --}} @section('content')

<section class="px-5 bg-navbar nav-bg-img pb-5">
    @include('includes.frontend.navbar')

    <div class="text-center"><img src="{{ asset('assets/frontend/images/icon_black.png') }}" width="100"
            class="img-fluid" alt="" /></div>
    <div class="text-center pt-4">
        <p class="m-0 cl-ffffff robotoLight f-26 index_para">Book a virtual appointment with service professionals
            worldwide</p>
    </div>
    <div class="text-center pt-4 pb-4"><img src="{{ asset('assets/frontend/images/curve.png') }}" alt="" /></div>
    <div class="d-flex justify-content-center pb-4">
        <div class="row m-0 pt-3 pb-3 bg-0000006b d-flex w-43 justify-content-center align-items-center">
            <form action="{{ route('search') }}" method="get"
                class="col-md-12 d-flex align-items-center justify-content-center">
                @csrf
                <div class="d-flex bg-ffffff w-81 pt-3 pb-3 borderRadius-5px pl-3">
                    <!-- <div><img src="{{ asset('assets/frontend/images/search.png') }}" class="img-fluid" alt="" /></div> -->
                    <div class="pl-3 w-100">
                        <input type="search"
                            class="bg-transparent outline-none border-0 robotoRegular f-21 w-100 search" name="search"
                            placeholder="Book your services..." />
                    </div>
                </div>
                <div class="pl-3">
                    <button
                        class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-3ac574 pt-3 pb-3 pl-3 pr-3 search-btn"
                        type="submit"><img src="{{ asset('assets/frontend/images/search2.png') }}" alt="" /></button>
                </div>
            </form>
        </div>
    </div>
</section>

@include('includes.frontend.navigations')
@php
    function imageExists($filePath)
    {
        $header_response = get_headers($filePath, 1);
        return strpos($header_response[0], "404") !== false ? false:true;
    }
@endphp
@if($popularServices->count() > 0)

    <section class="main_padding pt-70 text-center">
        <p class="main_title RobotoMedium f-34 cl-000000 fw-600 m-0">Popular Services</p>
        <p class="f-21 m-0 pt-3 cl-616161 robotoRegular">Discover the best services that are offered virtually.</p>
        <img src="{{ asset('assets/frontend/images/greencurve.png') }}" class="img-fluid pt-3" alt="" />
    </section>
    
    <section class="main_padding pt-70">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($popularServices->chunk(4) as $popularServicesCollections)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <section class="d-block w-100">
                            <div class="row m-0 flew_Row_Now_Wrap">
                                @foreach($popularServicesCollections as $popularService)
                                    <div class="col-lg-3 col-md-3 carouSel_Column col-sm-12">
                                        <a href="{{ route('category_specialists',$popularService->id) }}">
                                            <div class="card border-0 text-white borderRadius-12px">
                                                <img class="card-img mh-277"   src="{{ ($popularService->image != null) ? imageExists($popularService->image)?asset($popularService->image):asset('assets/frontend/images/istock-1147195672-1.png'): asset('assets/frontend/images/istock-1147195672-1.png') }}"
                                                    alt="Card image" onerror="this.error=null; this.src='{{asset('assets/frontend/images/istock-1147195672-1.png')}}'"/>
                                                <div
                                                    class="card-img-overlay borderRadius-12px p-0 cl-ffffff bg_gradient_card_footer pl-3 pt-3 pb-3">
                                                    <h5 class="card-title f-21 m-0">{{ $popularService->title }}</h5>
                                                    {{-- <p class="card-text f-18 m-0 pt-1">Customize your site</p> --}}
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                @endforeach
                            </div>
                        </section>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
@endif

<section class="main_padding pt-5 mt-70 bg-light pb-5">
    <div class="row m-0">
        <div class="col-lg-6 col-md-12 col-sm-12 pr-0">
            <!-- <div class="embed-responsive embed-responsive-21by9 h-599">
                                    <video  controls>
                                        <source src="./assets/images/MyVideo4.mp4" type="video/mp4">
                              
                                      </video>
                                  </div> -->
            <img src="{{ asset('assets/frontend/images/tuxpi.com.1621045975.jpg') }}" class="img-fluid w_100" alt=""
                srcset="" />
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 pl-5 pl-0">
            <div class="pl-Col-Text">
                <p class="m-0 f-44 RobotoMedium cl-3ac754 fw-600 sixColumnTilte f-16 paddding-top-20">Engage with a network of global
                    independent specialists right at your fingertips.</p>
                <div class="d-flex">
                    <div class="m-0 d-flex justify-content-center align-items-center pt-1"><img
                            src="{{ asset('assets/frontend/images/tick.png') }}" alt="" srcset="" /></div>

                    <div class="m-0 f-34 fw-600 cl-000000 pl-3 RobotoMedium sixColumnMiniTitle f-16">Post a Job hire a
                        specialist</div>
                </div>
                <p class="m-0 cl-707070 robotoRegular f-21 pt-1 sixColumnMiniPara f-16">Simply post a virtual job you
                    need completed within specific date/times and receive competitive bids from specialists.</p>
                <!-- 2 -->
                <div class="pt-2">
                    <div class="d-flex">
                        <div class="m-0 d-flex justify-content-center align-items-center pt-1"><img
                                src="{{ asset('assets/frontend/images/tick.png') }}" alt="" srcset="" /></div>

                        <div class="m-0 f-34 fw-600 cl-000000 pl-3 RobotoMedium sixColumnMiniTitle f-16">Hire expert
                            specialists without breaking the bank</div>
                    </div>
                    <p class="m-0 cl-707070 robotoRegular f-21 pt-1 sixColumnMiniPara f-16">
                        Keep within your budget with our bidding features. By naming your own price, our premium
                        specialist marketplace will assist in orchestrating your need on your terms.
                    </p>
                </div>
                <!-- 3 -->
                <div class="pt-2">
                    <div class="d-flex">
                        <div class="m-0 d-flex justify-content-center align-items-center pt-1"><img
                                src="{{ asset('assets/frontend/images/tick.png') }}" alt="" srcset="" /></div>

                        <div class="m-0 f-34 fw-600 cl-000000 pl-3 RobotoMedium sixColumnMiniTitle f-16">Pay Safely and
                            Securely</div>
                    </div>
                    <p class="m-0 cl-707070 robotoRegular f-21 pt-1 sixColumnMiniPara f-16">
                        You'll always know what you'll pay upfront. Your payment isn't released until your appointment
                        is completed.
                    </p>
                </div>
                <!-- 4 -->
                <div class="pt-2">
                    <div class="d-flex">
                        <div class="m-0 d-flex justify-content-center align-items-center pt-1"><img
                                src="{{ asset('assets/frontend/images/tick.png') }}" alt="" srcset="" /></div>

                        <div class="m-0 f-34 fw-600 cl-000000 pl-3 RobotoMedium sixColumnMiniTitle f-16">Contact us
                            anytime</div>
                    </div>
                    <p class="m-0 cl-707070 robotoRegular f-21 pt-1 sixColumnMiniPara f-16">
                        Our 24/7 support team is available to assist anytime.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- F I F T H S E C T I O N -->

<section class="main_padding pt-70 text-center">
    <p class="main_title RobotoMedium f-34 cl-000000 fw-600 m-0">Check Out These Specialists</p>
    <p class="f-21 m-0 pt-3 cl-616161 robotoRegular">Discover some of most talented specialists around the globe.</p>
    <img src="{{ asset('assets/frontend/images/greencurve.png') }}" class="img-fluid pt-3" alt="" />
</section>

<!-- F I F T H     S E C T I O N E N D  -->

<!-- S I X T H     S E C T I O N  S T A R T -->

@if(!Auth::check())
    @php $specialists = App\User::where('type','seller')->where('approve','1')->inRandomOrder()->limit(20)->get(); @endphp
@else
    @php
        if(Auth::user()->type=='seller'){
            $specialists = App\User::where('type','seller')->where('approve','1')->where('id','!=',Auth::user()->id)->inRandomOrder()->limit(20)->get();
        }else{
            $specialists = App\User::where('type','seller')->where('approve','1')->inRandomOrder()->limit(20)->get();
        }
    @endphp
@endif

<section class="main_padding pt-70 " id="specialistDesktopCarouselSection" style="display:none;">
    <div id="specialistCarouselDesktop" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner h-413">

            @foreach($specialists->chunk(4) as $specialistsCollections)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <section class="d-block w-100">
                        <div class="row m-0 flew_Row_Now_Wrap">
                            @foreach($specialistsCollections as $specialist)
                            @if($specialist->serviceCategory !=null)
                            <div class="col-md-3 carouSel_Column col-lg-3 col-sm-12">
                                <a href="{{route('specialist_detail',$specialist->username)}}">
                                    <div class="our-team rounded"
                                        style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                                        <div class="pic">
                                            <img src="{{ ($specialist->picture != null) ? imageExists($specialist->picture)?asset($specialist->picture):asset('uploads/user/default.jpg'): asset('uploads/user/default.jpg') }}"
                                                alt="" onerror="this.error=null; this.src='{{asset('uploadfiles/userphoto/default.jpg')}}'">
                                        </div>

                                        <div class="team-contenT">
                                            <h3 class="title RobotoMedium">{{ $specialist->username }}</h3>
                                            <span
                                                class="post robotoRegular">{{ ucwords($specialist->serviceCategory->name) }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </section>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev mt-27" href="#specialistCarouselDesktop" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next mt-27" href="#specialistCarouselDesktop" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>


<section class="main_padding pt-70 " id="specialistMobileCarouselSection" style="display:none;">
    <div id="speciallistCarouselMobile" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner h-413">
            
            @foreach($specialists as $specialist)
                @if($specialist->serviceCategory !=null)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <section class="d-block w-100">
                            <div class="row m-0">
                                <div class="col-sm-12 col-xs-12">
                                    <a href="{{route('specialist_detail',$specialist->username)}}">
                                        <div class="our-team rounded"
                                            style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                                            <div class="pic">
                                                <img src="{{ ($specialist->picture != null) ? fopen($specialist->picture,'r')?asset($specialist->picture):asset('uploads/user/default.jpg'): asset('uploads/user/default.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="team-contenT">
                                                <h3 class="title RobotoMedium">{{ $specialist->username }}</h3>
                                                <span
                                                    class="post robotoRegular">{{ ucwords($specialist->serviceCategory->name) }}</span>
                                            </div>
                                            <ul class="social">
                                                <div class="text-descoration-none text-white py-1"> View Details</div>
                                            </ul>

                                        </div>
                                    </a>
                                </div>
                            </div>
                        </section>
                    </div>
                @endif
            @endforeach
        </div>
        <a class="carousel-control-prev mt-27" href="#speciallistCarouselMobile" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next mt-27" href="#speciallistCarouselMobile" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>

<!-- S I X T H     S E C T I O N  E N D -->
<!-- S E V E N T H    S E C T I O N  S T A R T -->
<section class="mt-70 py-5" style="background: #F5F5F5;">
    <div class="row m-0 main_padding align-items-center indexMobileReverse">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="d-flex align-items-center flex-nowrap">
                <div><img src="{{ asset('assets/frontend/images/Webp.net-resizeimage (1).png') }}" alt=""></div>
                <div class="d-flex robotoRegular pl-3 h4 learnmeliveiosAndroid">Learnme live <span class="d-flex">
                        <li class="pr-2 pl-2" style="width:25px;"></li>
                    </span> <span>iOS & Android</span></div>
            </div>
            <div class="h5 pt-3 pb-3 ">Download the learnme live app<br /> to book your next virtual appointment anytime,
                anywhere. </div>
            <div>
                <div class="d-inline"><a href="https://apps.apple.com/app/id1522102968"
                        class=" btn-white text-white "><button type="button" class="btn bg-3ac574 text-white">DOWNLOAD
                            FOR IOS</button></a></div>
                <div class="d-inline downloadForAndroid "><a
                        href="https://play.google.com/store/apps/details?id=com.brandon.learnme"><button type="button"
                            class="btn bg-3ac574 text-white">DOWNLOAD FOR ANDROID</button></a></div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div><img src="{{ asset('assets/frontend/images/Mid Page Update_Circle.png') }}" class="w-100" alt=""></div>
        </div>
    </div>
    <!-- <div class="card img-fluid text-center border-0">
        <img class="card-img-top w-100 bg-linear-gradient" src="{{ asset('assets/frontend/images/banner.png') }}" alt="Card image" />
        <div class="banner-content cl-fff d-flex justify-content-center flex-column align-items-center father-day-banner-styling">
            <div class="main_Div">
                <div class="d-flex justify-content-center">
                    <div><img src="{{ asset('assets/frontend/images/Webp.net-resizeimage (1).png') }}" alt="" /></div>
                    <div class="f-21 cl-ffffff robotoRegular pl-3 d-flex align-items-center">
                        <div class="d-flex">
                            <div>learnmelive</div>
                            <div class="pl-4 pr-0">
                                <ul class="p-0">
                                    <li></li>
                                </ul>
                            </div>
                            <div class="">IOS, Android</div>
                        </div>
                    </div>
                </div>
                <div class="robotoMedium cl-ffffff f-35 pt-2 bannerInerrfSize">Download our app to book you next</div>
                <div class="robotoMedium cl-ffffff f-35 pt-1 bannerInerrfSize">appointment anytime, anywhere.</div>
                <div class="d-flex pt-4 linear_flex">
                    <div class="d-flex bg-ffffff align-items-center borderRadius-5px pl-3 w-75">
                        <div><img src="{{ asset('assets/frontend/images/usa.png') }}" class="img-fluid" alt="" /><span class="cl-acacac pl-2">+1</span></div>

                        <div class="pl-3"><input type="search" class="bg-transparent outline-none border-0 robotoRegular f-21" placeholder="Your phone number" /></div>
                    </div>
                    <div class="ml-3 download_btn"><button type="button" class="btn btn-dark bg-transparent pt-3 pb-3 pl-4 pr-4 border-ffffff robotoMedium">Download</button></div>
                </div>
            </div>
        </div>
    </div> -->
</section>
<!-- S E V E N T H    S E C T I O N  E N d -->

@endsection {{-- content section end --}}
{{-- footer section start --}}
@section('extra-script')
<script>
if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    document.getElementById('specialistMobileCarouselSection').style.display = 'block';
    document.getElementById('specialistDesktopCarouselSection').style.display = 'none';
} else {
    document.getElementById('specialistMobileCarouselSection').style.display = 'none';
    document.getElementById('specialistDesktopCarouselSection').style.display = 'block';
}

$('.search-btn').on('click', function() {
    if ($('.search').val() == '') {
        return false
    }
})
</script>
@endsection {{-- footer section end --}}