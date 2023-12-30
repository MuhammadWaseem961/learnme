@extends('layouts.frontend.setting') @section('title','Password') {{-- head start --}} @section('extra-css')
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
body {
    display: block !important;
}
    

</style>
@endsection {{-- head end --}} {{-- content section start --}} 
@section('navbar')
    
<section class="px-5 pt-2 pb-2  nav-bg-img robotoRegular">@include('includes.frontend.navbar')</section>
@include('includes.frontend.navigations')
@endsection
@section('content')

    <p class="border-bottom pl-3 f-21 cl-616161">Password Setting</p>
    @include('common.messages')
    <form action="{{ url('password') }}" method="POST">
        @csrf
        <div class="px-5 padd-vertical" >
            <div class="form-group">
                <label for="old_password">Old Password*</label>
                <input id="old_password" name="old_password" type="password" class="form-control"
                    value="{{ old('old_password') }}" placeholder="Enter Old Password" />
                @if($errors->has('old_password'))
                    <p class="text-danger mt-1">{{$errors->first('old_password')}}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="new_password">New Password*</label>
                <input id="new_password" name="new_password" type="password" class="form-control"
                    value="{{ old('new_password') }}" placeholder="Enter New Password" />
                @if($errors->has('new_password'))
                    <p class="text-danger mt-1">{{$errors->first('new_password')}}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="password-confirm">Confirm New Password*</label>
                <input id="password-confirm" type="password" class="form-control"
                    name="new_password_confirmation" placeholder="Re-Type New Password"/>
            </div>
            <div class="row justify-content-end">
                <button type="submit" class="btn btn-sm bg-3AC574 text-white">Save Changes</button>
            </div>
        </div>
    </form>
   
@endsection {{-- content section end --}} 