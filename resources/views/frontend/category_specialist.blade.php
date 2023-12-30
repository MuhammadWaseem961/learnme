@extends('layouts.frontend.app') @section('title',ucwords($category->title).' Services – Book with a
'.ucwords($category->title).' Specialist Today | learnme live ') {{-- head start --}} @section('extra-css')

<style>
    .card_circle {

        border: 5px solid white;
        border-radius: 50px;
        position: absolute;
        bottom: 66px;
        right: 14px;
    }

    .h-60 {
        height: 60px !important;
    }

    .w-60 {
        width: 60px !important;
    }

    .profile-shadow {
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    }

    .pagination .page-item.active .page-link{
        background: #3ac574 !important;
        border-color: #3ac574 !important;
        color:#ffffff !important;
    }
    .pagination .page-item .page-link{
        color: #000000 !important;
    }
</style>
@endsection {{-- head end --}} {{-- content section start --}} @section('content')

<section class="px-5 pt-2 pb-2 nav-bg-img robotoRegular">
    @include('includes.frontend.navbar')
</section>

{{-- @if(count(categories()) > 0)
    <section class=" main_padding pt-5">
        <div>
            <ul class="listStyle-none p-0  d-flex robotoRegular f-18 ul_main_tabs m-0 d-flex justify-content-around">
                @foreach (categories()->take(6) as $cat)
                    @if($category->id !=$cat->id)
                        <li class="pl-3"> <a href="{{ route('category_specialists',$cat->id) }}"
class="cl-3b3b3b3">{{ ucwords($cat->title) }}</a></li>
@endif
@endforeach
@if (count(categories()->skip(6)) > 0)

<li>
    <!-- Example split danger button -->
    <div class="btn-group">
        <a href="" class=" dropdown-toggle dropdown-toggle-split cl-3b3b3b3" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">More...</a>
        <div class="dropdown-menu dropdown-menu-nav height-300 overflow-y">
            @foreach (categories()->skip(8) as $cat)
            @if($category->id !=$cat->id)
            <a class="dropdown-item " href="{{ route('category_specialists',$cat->id) }}">{{ ucwords($cat->title) }}</a>
            @endif
            @endforeach

        </div>
    </div>
</li>
@endif
</ul>
</div>
</section>
@endif --}}

@include('includes.frontend.navigations')
    @if($specialists->count() >0)
        <section class=" main_padding pt-70  text-center">
            <p class="main_title RobotoMedium f-34 cl-000000 fw-600 m-0 ">Check Out These Specialists</p>
            <p class="f-21 m-0 pt-3 cl-616161 robotoRegular ">Discover some of most talented specialists around the globe.</p>
            <img src="{{ asset('assets/frontend/images/greencurve.png') }}" class="img-fluid pt-3" alt="">
        </section>
    @endif

<!-- F I F T H     S E C T I O N E N D  -->

<!-- S I X T H     S E C T I O N  S T A R T -->

    <section class="main_padding pt-70">
        <div class="row">

            @foreach($specialists as $specialist)
                <div class="col-md-3 col-lg-3 col-sm-12 mb-3">
                    <a href="{{route('specialist_detail',$specialist->username)}}">
                        <div class="our-team rounded" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                            <div class="pic">
                                <img onerror="this.error=null; this.src='{{asset('uploads/user/default.jpg')}}'" src="{{ ($specialist->picture != null) ? asset($specialist->picture) : asset('uploads/user/default.jpg') }}"
                                    alt="">
                            </div>
                            <div class="team-contenT">
                                <h3 class="title RobotoMedium">{{ ucwords($specialist->name) }}</h3>
                                <span class="post robotoRegular">{{ $specialist->username }}</span>
                            </div>
                            <ul class="social">
                                <div class="text-descoration-none text-white py-1"> View Details</div>
                            </ul>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        {{ $specialists->links() }}
    </section>

@endsection