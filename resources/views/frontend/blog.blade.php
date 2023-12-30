@extends('layouts.frontend.app')
@section('title','Blogs')
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

<section class="px-5 pt-2 pb-2 nav-bg-img robotoRegular">
    @include('includes.frontend.navbar')
</section>

@include('includes.frontend.navigations')
@if($posts->count() >0)
<section class="main_padding mt-5 mb-5  ">
    <div>
        <div class="blogBannerHeading robotoMedium h1 mx-0 my-4">learnme live Blogs </div>
        <!-- <div class="robotoRegular blogBannerdesc">Home - <span class="cl-3ac754">Posts</span></div> -->
    </div>
</section>
@endif

<section class="main_padding ">
    <div class="row m-0">
        @if($posts->count() >0)
            @foreach($posts as $post)
                <div class="col-lg-3 col-md-4 col-sm-12 col-12 mb-4 h-100">
                    <div class="shadow">
                        <a href="{{ route('blogDetail',$post->slug) }}" class="text-center">
                            <img src="{{ asset($post->image) }}" class="w-100 blogCardImage" alt=""
                                srcset="">
                            <div class="blog-heading-link robotoLight pt-3">{{ucwords($post->title)}}</div>
                            <div class="paragraph-light  robotoregular">{!! Str::limit($post->description, 100,'...')!!}</div>
                        </a>
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-warning col-lg-12 mb-4 mt-4">Blogs are not available</div>
        @endif
    </div>

</section>
@endsection

{{-- content section end --}}

{{-- footer section start --}}


@section('extra-script')

@endsection

{{-- footer section end --}}
<script>

</script>