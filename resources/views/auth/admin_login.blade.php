@extends('layouts.auth.app') @section('title','Admin Login') {{-- head start --}} @section('extra-css') @endsection {{-- head end --}} {{-- content section start --}} @section('content')

<div class="bg-register-img">
    <div class="padding-top-reg main_padding pt-30">
        <div class="row m-0 box-shadow-reg form-radius rounded-right-reg">
            <div class="col-md-5 bg-register-img2 p-0">
                <div class="text-center padding-bottom-reg-1 inner-padding">
                    <a href="{{ route('index') }}"><img src="{{ asset('assets/frontend/images/register_logo.png') }}" alt="" class="img-fluid" /></a>
                    <div class="display-2 font-600 text-white pt-5">Welcome Back!</div>

                    <div class="h3 m-0 text-white pt-3 px-2">
                        To connect with us please login with your registered info.
                    </div>
                </div>
            </div>
            <div class="col-md-7 padding-right-reg padding-left-reg bg-white rounded-right-reg">
                <div class="h1 text-center cl-3AC574 padding-top-reg">Sign in to learnme live</div>
                <div class="pl-5 pr-5">
                    <form action="{{ route('admin.login') }}" method="post">
                        @csrf
                        <div class="input-group mb-3 border-input pt-4">
                            <span><img src="{{ asset('assets/frontend/images/men-8 (1).png') }}" alt="" /></span>
                            {{--
                            <span>
                                --}}
                                <input
                                    type="text"
                                    class="form-control border-0 @error('username') is-invalid @enderror"
                                    name="username"
                                    value="{{ old('username') }}"
                                    placeholder="Username"
                                    aria-label=""
                                    aria-describedby="basic-addon1"
                                    required
                                />
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror {{--
                            </span>
                            --}}
                        </div>
                        <div class="input-group border-input pt-4 mb-5">
                            <span><img src="{{ asset('assets/frontend/images/key-8.png') }}" alt="" /></span>
                            {{--
                            <span>
                                --}}
                                <input type="password" class="form-control border-0 @error('password') is-invalid @enderror" name="password" placeholder="Enter your password" aria-label="" aria-describedby="basic-addon1" required />
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror {{--
                            </span>
                            --}}
                        </div>
                        <button type="submit" class="btn bg-3AC574 w-100 mt-2 pt-2 pb-2 mb-3 text-white">
                            Sign in
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection {{-- content section end --}} {{-- footer section start --}} @section('extra-script') @endsection {{-- footer section end --}}
