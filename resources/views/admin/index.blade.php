@extends('layouts.admin.admin') @section('title','Profile') {{-- head start --}} @section('extra-css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/dashboard.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/login_register_common.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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

<section class="main_padding pt-2 pb-2 nav-bg-img robotoRegular">@include('includes.frontend.admin_navbar')</section>

@endsection
@section('content')


<p class="border-bottom pl-3 f-21 cl-616161">Edit Your Personal Settings</p>

<p class="pl-3 f-21 cl-000000">Personal Info</p>

<form action="{{ route('dashboard.profile.update',Session::get('admin')->id) }}" method="post" id="client_profile_form">
    @csrf @method('PUT')
    <div class="pl-5 pr-5 first-step-html-change">
        <div class="row justify-content-between">
            <div
                class="input-group mb-3 border-input pt-4 d-flex flex-nowrap col-md-12 border border-top-0 border-left-0 border-right-0">
                <div class="d-flex"><em class="fa fa-user d-flex justify-content-center align-items-center"></em>
                </div>
                <div class="w-100">
                    <input type="text" class="w-100 form-control border-0" placeholder="Enter username" name="username"
                        id="username" aria-label=""
                        aria-describedby="basic-addon1" value="{{ Session::get('admin')->username }}" />
                </div>
            </div>
        </div>

        <div class="row justify-content-between">
            <div
                class="input-group mb-3 border-input pt-4 d-flex flex-nowrap col-md-12 border border-top-0 border-left-0 border-right-0">
                <div class="d-flex"><em class="fa fa-key d-flex justify-content-center align-items-center"></em>
                </div>
                <div class="w-100">
                    <input type="text" class="w-100 form-control border-0" placeholder="Enter Stripe Public Key" name="stripe_public_key"
                        id="username" aria-label=""
                        aria-describedby="basic-addon1" value="{{ Session::get('admin')->stripe_public_key }}" />
                </div>
            </div>
        </div>

        <div class="row justify-content-between">
            <div
                class="input-group mb-3 border-input pt-4 d-flex flex-nowrap col-md-12 border border-top-0 border-left-0 border-right-0">
                <div class="d-flex"><em class="fa fa-key d-flex justify-content-center align-items-center"></em>
                </div>
                <div class="w-100">
                    <input type="text" class="w-100 form-control border-0" placeholder="Enter Secret Public Key" name="stripe_secret_key"
                        id="username" aria-label=""
                        aria-describedby="basic-addon1" value="{{ Session::get('admin')->stripe_secret_key }}" />
                </div>
            </div>
        </div>

        <div class="row justify-content-end">
            <button type="submit" class="btn btn-sm bg-3AC574 text-white">Save Changes</button>
        </div>
    </div>
</form>




@endsection {{-- content section end --}} {{-- footer section start --}} @section('extra-script')

<script>
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

</script>
@endsection {{-- footer section end --}}
