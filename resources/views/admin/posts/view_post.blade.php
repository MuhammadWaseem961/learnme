@extends('layouts.admin.admin') @section('title','Edit Post') {{-- head start --}} @section('extra-css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/dashboard.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/login_register_common.css') }}" />
<script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>

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

.px-50 {
    padding-left: 50px !important;
    padding-right: 50px !important;
}
</style>
@endsection {{-- head end --}} {{-- content section start --}}
@section('navbar')

@section('navbar')
    <section class="px-5 pt-2 pb-2 nav-bg-img robotoRegular">@include('includes.frontend.admin_navbar')</section>
@endsection
@section('content')


    <p class="border-bottom pl-3 f-21 cl-616161">Edit Post</p>

    <div class="px-3 py-3">
        <form method="POST" enctype="multipart/form-data" id="edit-form">
            <div class="form-group mb-2">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" name="title" readonly id="Titles" aria-describedby="emailHelp" value="{{ $post->title }}">
            </div>
            {{-- <div class="form-group mb-1">
                <label for="exampleInputPassword1">Summary</label>
                <textarea class="form-control border" name="summery" id="exampleFormControlTextarea1" rows="3">{{ $post->summery }}</textarea>
            </div> --}}
            <div class="form-group mb-2">
                <label for="exampleInputPassword1">Description</label>
                <textarea class="form-control border" id="description"  rows="3">{{ $post->description }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="exampleInputPassword1">Image</label>
                <img src="{{ asset($post->image) }}" class="mt-2" style="width: 100%; height:425px;object-position: center;">
            </div>
        </form>
    </div>

@endsection
{{-- footer section start --}} @section('extra-script')


<script>
    CKEDITOR.replace('description');
</script>
@endsection {{-- footer section end --}}