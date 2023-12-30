@extends('layouts.frontend.app') @section('title','Specialists | Services') {{-- head start --}} @section('extra-css')

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
</style>
@endsection {{-- head end --}} {{-- content section start --}} @section('content')

<section class="px-5 pt-2 pb-2 nav-bg-img robotoRegular">
    @include('includes.frontend.navbar')
</section>

@include('includes.frontend.navigations')

@if (count($users)>0 || $services->count() > 0 || count($serviceUsers) >0)

    @if (count($users)>0 || count($serviceUsers) >0)


        <section class=" main_padding pt-70  text-center">
            <p class="main_title RobotoMedium f-34 cl-000000 fw-600 m-0 ">Check Out These Specialists</p>
            <p class="f-21 m-0 pt-3 cl-616161 robotoRegular ">Discover some of most talented specialists around the globe.</p>
            <img src="{{ asset('assets/frontend/images/greencurve.png') }}" class="img-fluid pt-3" alt="">
        </section>


        <!-- F I F T H     S E C T I O N E N D  -->

        <!-- S I X T H     S E C T I O N  S T A R T -->

        <section class="main_padding pt-70">
            <div class="row">
                @if($users->count() >0)
                    @foreach($users as $user)
                        @if($user!=null)
                            <div class="col-md-3 col-lg-3 col-sm-12 mb-3">
                                <a href="{{route('specialist_detail',$user->username)}}">
                                    <div class="our-team rounded" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                                        <div class="pic">
                                            <img src="{{ ($user->picture != null) ? asset($user->picture) : asset('uploads/user/default.jpg') }}"
                                                alt="">
                                        </div>
                                        <div class="team-contenT">
                                            <h3 class="title RobotoMedium">{{ $user->username }}</h3>
                                            <span class="post robotoRegular">{{ ucwords($user->serviceCategory->name) }}</span>
                                        </div>
                                        <ul class="social">
                                            <div class="text-descoration-none text-white py-1"> View Details</div>
                                        </ul>

                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                @elseif(count($serviceUsers) > 0)
                    @foreach($serviceUsers; as $user)
                        @if($user!=null)
                            <div class="col-md-3 col-lg-3 col-sm-12 mb-3">
                                <a href="{{route('specialist_detail',$user->username)}}">
                                    <div class="our-team rounded" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                                        <div class="pic">
                                            <img src="{{ ($user->picture != null) ? asset($user->picture) : asset('uploads/user/default.jpg') }}"
                                                alt="">
                                        </div>
                                        <div class="team-contenT">
                                            <h3 class="title RobotoMedium">{{ $user->username }}</h3>
                                            <span class="post robotoRegular">{{ ucwords($user->serviceCategory->name) }}</span>
                                        </div>
                                        <ul class="social">
                                            <div class="text-descoration-none text-white py-1"> View Details</div>
                                        </ul>

                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>

        </section>

    @endif

    @if($services->count() > 0)
        <section class=" main_padding pt-70  text-center">
            <p class="main_title RobotoMedium f-34 cl-000000 fw-600 m-0 ">Check Out These Services</p>
            <img src="{{ asset('assets/frontend/images/greencurve.png') }}" class="img-fluid pt-3" alt="">
        </section>

        <section class="main_padding pt-5">
            <div class="row m-0 p-0">
                <div class="table-responsive tableFixHead table_scroll mt-5 border robotoRegular">
                    <table id="boxes-list" class="table m-0 header-fixed">

                        <thead class="sticky-top bg-white cl-3ac754 ">
                            <tr class="bg-white robotoRegular ">
                                <th scope="col">#</th>
                                <th scope="col">Service</th>
                                <th scope="col">Service By</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Rate</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table_scroll services-table-body">
                            @foreach($services as $key=>$serviceCategory)
                            {{-- <tr class="border-bottom">
                            <th scope="row">{{ ++$key }}</th>
                            <th scope="row">{{ ucwords($service->specialist->username) }}</th>
                            <td>{{ ucwords($service->name) }}</td>
                            <td>{{ $service->timing }} Minutes</td>
                            <td> ${{number_format(intval($service->rate)) }} (USD)</td>
                            <td>{{ $service->status }}</td>
                            <td><a href="{{ route('appointment_request',encrypt($service->id)) }}"
                                    class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-3ac574  pl-5 pr-5 login_button">Book</a>
                            </td>
                            </tr> --}}

                            @if($serviceCategory->t_15!=null)

                            <tr class="border-bottom">
                                <td>{{ ++$key }}</td>
                                <td>{{ $serviceCategory->user !=null?ucwords($serviceCategory->user->username):'' }}</td>
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
                                <td>{{ ++$key }}</td>
                                <td>{{ $serviceCategory->user !=null?ucwords($serviceCategory->user->username):'' }}</td>
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
                                <td>{{ ++$key }}</td>
                                <td>{{ $serviceCategory->user !=null?ucwords($serviceCategory->user->username):'' }}</td>
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
                                <td>{{ ++$key }}</td>
                                <td>{{ $serviceCategory->user !=null?ucwords($serviceCategory->user->username):'' }}</td>
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
@else
    <section class=" main_padding pt-70  text-center">
        <p class="main_title RobotoMedium f-34 cl-000000 fw-600 m-0 ">OOps nothing found</p>
        <img src="{{ asset('assets/frontend/images/greencurve.png') }}" class="img-fluid pt-3" alt="">
    </section>
@endif
@endsection