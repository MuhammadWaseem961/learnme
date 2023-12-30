<!DOCTYPE html>
<html>

<head>
    @include('includes.frontend.head') 

    <style>
        .swal-button--confirm {background-color: #3ac574; border:none;outline: none;}
        .swal-button:active {background-color: #3ac574; border:none;outline: none;}
        .select-wrapper .dropdown-trigger,.dropdown-content,.caret {
            display: none !important;
        }
        .agora-theme .autoplay-fallback::after{content:'' !important;}
    </style>

    <style>
        
        .modal-min-max-width{
            min-width: 100% !important;
            max-width: 100% !important;
            min-height: 100% !important;
            max-height: 100% !important;
            margin:0px !important;
            padding:0px !important;
        }

        .main-profile {
            width: 180px;
            height: 180px;
            border-radius: 100%;
        }
        @media screen and (min-width:1240px) {
            .r-Main-P{
            padding-left: 140px;
        padding-right: 140px;
        }
            
        }

        .pr {
            position: relative;
            width: fit-content;
            margin: auto;
        }
        
        .small-Circle {
            width: 21px;
            height: 21px;
            position: absolute;
        
            top: 0%;
            right: 17%;
            border-radius: 100%;
        }
        
        .bg-grey {
            background-color: #AAAAAA;
        }
        
        .f-22 {
            font-size: 22px;
        }
        
        .cl-5757575 {
            color: #575757;
        }
        
        .cl-a8a8a8 {
            color: #A8A8A8;
        }
        .cl-a8a8a8{
            color: #A8A8A8;
        }
        .f-17 {
            /*font-size: 17px;*/
            font-size:12px;
        }
        .cl-3ac754{
                color: #3AC574;
        }
        .bg-3ac754{
                background-color: #3AC574 !important;
        }
        .f-21{
            font-size:21px !important;
        }
        .f-11{
            font-size:11px !important;
        }
        .h-85{
                height: 85px;
        }
        .modal-header .close { padding-top:12px i !important;}
                .embed-responsive-21by9::before {
            padding-top: 32px !important;
                }
        .smallProfile {
            width: 40px;
            height: 38px;
        }
        #video-chat {
                cursor: pointer;
        }
        
        .parent {
            position: relative;
            width: fit-content;
        }
        
        .parentCircle-Child {
            width: 12px;
            height: 12px;
            position: absolute;
            top: 0%;
            right: 5%;
            border-radius: 100%;
        }

        .notification-divMain{
            width: 25px;
            height: 25px;
            border-radius: 50%;
        
        }
        .typing-dot{width: 7px; height: 7px;background: green;border-radius: 50%;margin-top: 10px;margin-left: 1px;}
        .cl-9b9461{
            color: #9B9461;
        }
        .cl-green{
            color:#12EF54;
        }
        .f-13{
            font-size:13px;
        }
        .f-10{
                font-size:10px;
        }
        .f-12{
                font-size:12px;
        }
        .card-footer .btn {
            height: 36px;
        }
        .h-36{
                height: 36px;
            
        }
        
        
        .my-custom-btn{
            outline: none !important;
            font-size: 15px;
            border: none;
            border-radius: 50%;
            height: 23px;
            cursor:pointer;
            background:transparent !important;
        }

        svg:not(:root).svg-inline--fa {
            overflow: visible;
            color: #3ac373;
        }

        ::-webkit-scrollbar-track {
        background:#D5D5D5;
            border-radius: 10px;
        
        }
        ::-webkit-scrollbar {
            width: 6px;
                border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            border-radius: 10px;
            /*-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); */
            background:#3AC574 !important;
            height:100px;
        
        }
        
        #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
        }
        
        #myImg:hover {opacity: 0.7;}
        
        /* The Modal (background) */
        .myModal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        }
        
        /* Modal Content (image) */
        .myModalContent {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        }
        
        /* Caption of Modal Image */
        #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
        }
        
        /* Add Animation */
        .modal-content, #caption {  
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
        }
        
        @-webkit-keyframes zoom {
        from {-webkit-transform:scale(0)} 
        to {-webkit-transform:scale(1)}
        }
        
        @keyframes zoom {
        from {transform:scale(0)} 
        to {transform:scale(1)}
        }
        
        /* The Close Button */
        .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
        }
        
        .close:hover,
        .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
        }
        
        span.highlight{
            background-color: yellow;
            /*outline: 1px solid orange;*/
            color:black;
            padding-left: 3px;
            padding-right: 3px;
            border-radius: 4px;
        }

        .cursor-pointer{cursor: pointer;}
        
        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px){
        .modal-content {
            width: 100%;
        }
        }
        
        .emoji-picker {
            background-color: #303841;
            width: 400px;
            /*margin: 50px;*/
            border-radius: 5px;
            height: 400px;
            display: flex;
        }
        
        .emoji-selectables {
            background-color: #212427;
            width: 45px;
            height: 100%;
            padding: 10px 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .emoji-selectables span {
            margin-bottom: 7px;
            cursor: pointer;
        }
        
        .emoji-selectables span.active img {
            filter: none;
        }
        
        .emoji-selectables span img {
            width: 25px;
            display: block;
            display: flex;
            align-items: center;
            filter: grayscale(100%)
        }
        
        .emoji-content div {
            width: 100%;
        
            flex-wrap: wrap;
            justify-content: center;
            padding: 5px;
        }
        
        .emoji-content span {
            display: block;
            padding: 5px;
            cursor: pointer;
        }
        
        .emoji-content span:hover {
            transform: scale(1.1);
            background-color: #3f4953;
            border-radius: 5px;
        }
        
        .picker-emoji-content {
            display: none;
            
        }
        
        .picker-emoji-sel.face {
            color: aliceblue;
            font-size: 10px;
        }
        
        .picker-emoji-content.active {
            display: flex;
            display: flex;
            height: 100%;
            overflow-y: scroll;
        }
        
        .emoji-content span img {
            width: 32px;
            height: 32px;
        }
        
        
        .picker-emoji-content::-webkit-scrollbar-thumb {
            height: 10px;
            background-color: #65B88D;
            border-radius: 100px;
        }
        
        .picker-emoji-content::-webkit-scrollbar-track {
            background-color: #303841;
        }
        
        .picker-emoji-content::-webkit-scrollbar {
            width: 6px;
        }
        .card-header,.card-footer{
            background-color: #fff !important;
            
        }
        .card-header{
            border-bottom:0px !important;
        }
        textarea{
            border:0px !important; 
        }
        .card {
    box-shadow: rgb(99 99 99 / 20%) 0px 2px 8px 0px;
    border:0px !important;
        }
    .card-body{
    padding:0px !important;
    }
    .loader{
        position: relative;
        top: 50%;
        left: 8%;
        transform: translate(-50%, -50%);
        display: flex;
        align-items: center;
            
        }
        /* Creating the dots */
        span.typing{
        height: 10px;
        width: 10px;
        margin-right: 10px;
        border-radius: 50%;
        background-color: #3AC574;
        animation: loading 1s linear infinite;
        }
        /* Creating the loading animation*/
        @keyframes loading {
        0%{
            transform: translateX(0);
        }
        25%{
            transform: translateX(15px);
        }
        50%{
            transform: translateX(-15px);
        }
        100%{
            transform: translateX(0);
        }
            
        }
        span:span.typing:nth-child(1){
        animation-delay: 0.1s;
        }
        span.typing:nth-child(2){
        animation-delay: 0.2s;
        }
        span.typing:nth-child(3){
        animation-delay: 0.3s;
        }
        /* span.typing:nth-child(4){
        animation-delay: 0.4s;
        }
        span.typing:nth-child(5){
        animation-delay: 0.5s;
        } */
        .A_D_div{
            width: fit-content;
            position:absolute;
            z-index: +1;
            top:50%;
            left:50%;
        }

        .left-top-z-index{
            margin-left: 41%;
            margin-top: 5%;
            z-index: 1;
        }

        .messag-log ,.event-messag-log{padding:21px !important;}

    </style>

    @yield('extra-css')
</head>

<body id="body-content" style="display:block !important;">
    <div class="d-none calling-div position-fixed left-top-z-index" ><div class="A_D_div text-center bg-dark p-5 rounded"><h6 class="incoming-call text-white mb-4"></h6><div class="d-flex justify-content-center   rounded "><div class="ringing-bell"> <img class="end-call cursor-pointer faa-ring animated fa-5x" onclick="endCall()"  src="{{ asset('assets/frontend/images/decline.png') }}" alt="image" /></div class="ringing-bell"> <div><img class="faa-ring animated fa-5x cursor-pointer accpet_call" onclick="makeCall(this)" data-toggle="modal" data-target="#video-call-modal" src="{{ asset('assets/frontend/images/accept.png') }}" alt="image" /></div></div> </div></div>
    <div class="d-none event-calling-div position-fixed  left-top-z-index" ><div class="A_D_div text-center bg-dark p-5 rounded"><h6 class="incoming-call text-white mb-4"></h6><div class="d-flex justify-content-center   rounded "><div class="ringing-bell"> <img class="end-call cursor-pointer faa-ring animated fa-5x" onclick="endCall()"  src="{{ asset('assets/frontend/images/decline.png') }}" alt="image" /></div class="ringing-bell"> <div><img class="faa-ring animated fa-5x cursor-pointer" data-event-id="" id="makeSellerEventCallDiv" data-toggle="modal" data-target="#video-call-modal" onclick="makeSellerEventCall(this)" src="{{ asset('assets/frontend/images/accept.png') }}" alt="image" /></div></div> </div></div>
    @php date_default_timezone_set(Auth::check()?Auth::user()->timezone:getCurrentUserTimeZone()); @endphp
    @yield('content')
    @yield('footer')

    <!-- E I G H T    S E C T I O N  S T A R T -->
    <section class="main_padding  w-100" style="margin-top: 30px;">
        <div class="w-100 border-bcbcbc"></div>
    </section>

    <!-- video call Modal -->
    <div class="modal fade" id="client-video-call-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header pl-5 pr-5 bg-3ac574 cl-ffffff p-3">
                    <button type="button" class=" cl-ffffff opacity-1 border-0 bg-transparent end-call"  data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="cl-ffffff f-35 mr-3">&times;</span>
                    </button>
                </div> 
                <div class="modal-body d-flex align-items-center flex-column justify-content-center pt-5">
                    <div class="f-45 robotoMedium cl-3ac754">Unable to make call.</div>
                    <div class="f-24 cl-616161">Specialists can only initiate video calls in messaging.  If you would like to have a call with this specialist, you will need to ask them to initiate the call, or book an appointment.</div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="sender" value="">
    <input type="hidden" id="reciever" value="">
    <input type="hidden" id="username" value="">
    <input type="hidden" id="sender_reciever" value="">
    <input type="hidden" id="reciever_sender" value="">
    <input type="hidden" id="booking_id" value="">

    <div class="modal fade" id="video-call-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-min-max-width" role="document">
            <div class="modal-content">
                <div class="modal-body d-flex align-items-center flex-column justify-content-center pt-2">
                    {{-- <div class="f-45 robotoMedium cl-3ac754 video-title">Thank you for joining.</div> --}}
                    {{-- <div class="f-24 cl-616161">Meeting ID : 121545456484</div> --}}
                    <div class="embed-responsive embed-responsive-21by9">
                        <!DOCTYPE html>
                        <html lang="en">
                            <head>
                                <meta charset="UTF-8">
                                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                                <title>Basic Communication</title>
                                <link rel="stylesheet" href="{{ asset('assets/frontend/css/video.css') }}" />
                                <style>
                                    .embed-responsive-21by9::before{ padding-top:0% !important; }

                                </style>
                            </head>
                            <body class="agora-theme">
                                
                                <div class="row video-chat-div" style="width:100% !important">
                                    <div class="video-div" style="width:55%;">
                                        <form id="form" class="row l12 s12 " >
                                            <div class="row container col l12 s12">
                                                <div class="col  d-none" style="min-width: 433px; max-width: 443px;">
                                                    <div class="card" style="margin-top: 0px; margin-bottom: 0px;">
                                                        <div class="row card-content" style="margin-bottom: 0px;">
                                                            <div class="input-field">
                                                                <label for="appID" class="active">App ID</label>
                                                                <input type="text" placeholder="App ID" name="appID" value="229e3bdfe52e432b86e27f442b1cf04a">
                                                            </div>
                                                            <div class="input-field">
                                                                <label for="channel" class="active">Channel</label>
                                                                <input type="text" placeholder="channel" name="channel" value="" id="channelName">
                                                            </div>
                                                            <div class="input-field">
                                                                <label for="token" class="active">Token</label>
                                                                <input type="text" id="token" placeholder="token" name="token" value="">
                                                                <input type="text" id="role" placeholder="token" name="role" value="">
                                                            </div>
                                                            <div class="row" style="margin: 0">
                                                                <div class="col s12">
                                                                <button class="btn btn-raised btn-primary waves-effect waves-light" id="join">JOIN</button>
                                                                <button class="btn btn-raised btn-primary waves-effect waves-light" id="leave">LEAVE</button>
                                                                <button class="btn btn-raised btn-primary waves-effect waves-light" id="publish">PUBLISH</button>
                                                                <button class="btn btn-raised btn-primary waves-effect waves-light" id="unpublish">UNPUBLISH</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <ul class="collapsible card agora-secondary-border" style="margin-top: .4rem; border: 1px ">
                                                        <li>
                                                            <div class="collapsible-header agora-secondary-bg">
                                                            <h6 class="center-align">ADVANCED SETTINGS</h6>
                                                            </div>
                                                            <div class="collapsible-body card-content">
                                                            <div class="row">
                                                                <div class="col-sm-12 s12">
                                                                <div class="input-field">
                                                                    <label for="UID" class="active">UID</label>
                                                                    <input type="number" placeholder="UID" name="uid">
                                                                </div>
                                                                <div class="input-field">
                                                                    <label for="cameraId" class="active">CAMERA</label>
                                                                    <select name="cameraId" id="cameraId"></select>
                                                                </div>
                                                                <div class="input-field">
                                                                    <label for="microphoneId" class="active">MICROPHONE</label>
                                                                    <select name="microphoneId" id="microphoneId"></select>
                                                                </div>
                                                                <div class="input-field">
                                                                    <label for="cameraResolution" class="active">CAMERA RESOLUTION</label>
                                                                    <select name="cameraResolution" id="cameraResolution"></select>
                                                                </div>
                                                                <div class="row col-sm-12 s12">
                                                                    <div class="row">
                                                                    <label for="mode" class="active">MODE</label>
                                                                    </div>
                                                                    <div class="row">
                                                                    <label>
                                                                        <input type="radio" class="with-gap" name="mode" value="live" checked />
                                                                        <span>live</span>
                                                                    </label>
                
                                                                    <label>
                                                                        <input type="radio" class="with-gap" name="mode" value="rtc" />
                                                                        <span>rtc</span>
                                                                    </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row col-sm-12 s12">
                                                                    <div class="row">
                                                                    <label for="codec" class="active">CODEC</label>
                                                                    </div>
                                                                    <div class="row">
                                                                    <label>
                                                                        <input type="radio" class="with-gap" name="codec" value="h264" checked />
                                                                        <span>h264</span>
                                                                    </label>
                
                                                                    <label>
                                                                        <input type="radio" class="with-gap" name="codec" value="vp8" />
                                                                        <span>vp8</span>
                                                                    </label>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            
                                                <div class="video-grid" id="video" style="width:100% !important">
                                                    <div class="video-view" style="position:absolute;z-index:+1;width:100% !important;">
                                                        <div id="local_stream" class="video-placeholder" style="height:100vh !important;"></div>
                                                        <div id="local_video_info" class="video-profile hide"></div>
                                                        <div id="video_autoplay_local" class="autoplay-fallback hide"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="chat-div" style="width:45%;">
                                        <div class="card">

                                            <div class="card-header">
                                                <div class="row m-0 align-items-center border-bottom pb-2">
                                                    <div class="col-md-7 col-lg-7 p-0"> 
                                                        <div class="d-flex video-model-header">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body messag-log" style="max-height: 417px !important;min-height: 417px !important; overflow-y:scroll;padding: 21px !important;"></div>
                                            <div class="card-body event-messag-log" style="max-height: 417px !important;min-height: 417px !important; overflow-y:scroll;padding: 21px !important"></div>
                                            <div class="card-footer border-0 pl-3 pr-3" >
                                                <div id="imagePreview" style="margin-left: -19px !important;height:90px" class="d-flex"></div>
                                                <div class="users d-flex" style="height: 23px;"></div>
                                                <form id="chat-form" method="post" class="mt-1 ">
                                                    <div class="input-group border-top d-flex align-items-center pb-2">
                                                        <textarea id="video-message-content"  name="content" class="form-control  pl-0" placeholder="Type your message ..." autocomplete="off"></textarea>
                                                        <div id="emojis" class="d-none" style="position: absolute; bottom: 102%; right: 26%;"></div>
                                                        <span class="pl-3" onclick="if($('#emojis').hasClass('d-none')){ $('#emojis').removeClass('d-none') }else{ $('#emojis').addClass('d-none') }">	<img src="{{asset('assets/frontend/images/chat/Group-150.png')}}" class="" alt="" srcset="" style="cursor:pointer;" ></span>
                                                        <input type="file"  name="img" style="display:none;" id="img" onchange="fileValidation();">
                                                        <img src="{{asset('assets/frontend/images/chat/Path-87.png')}}" class="" onclick="$('#img').click();" alt="" srcset="" style="cursor:pointer;" >
                                                        <div class="input-group-btn">
                                                            <button type="button" class="btn btn-primary send-event-msg bg-3ac754 border-0 " onclick="sendEventMessage();">Send&nbsp; <img src="{{asset('assets/frontend/images/chat/Path-88.png')}}" class="" alt="" srcset=""></button>
                                                            <button type="button" class="btn btn-primary send-msg bg-3ac754 border-0 " onclick="messageSend();">Send&nbsp; <img src="{{asset('assets/frontend/images/chat/Path-88.png')}}" class="" alt="" srcset=""></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                
                                <style>
                                    #local_stream > :first-child{
                                                    height:30% !important;
                                                    width:30% !important;
                                                    left:67% !important;
                                                    top:70% !important;
                                                    
                                                }
                                </style>
                            </body>
                        </html>
                    </div>

                    <!-- <div class="f-21 robotoRegular cl-3ac754 w-50 text-center">The host is currently meeting with other client and will let you into the meeting shortly.</div>
                    <div class="f-21 robotoRegular pt-4">Average Wait:<span class="cl-3ac754 pl-3">Approx 5-10 Minutes</span></div> -->
                </div>
                <div class="modal-footer border-0">
                    @if(Auth::check() && Auth::user()->type=="seller")
                        <button type="button" class="btn btn-secondary bg-3ac574 again-call" onclick="againCall()">Again Call</button>
                        <button type="button" class="btn btn-secondary bg-3ac574 end-event-call" data-dismiss="modal" onclick="endEventCall(this)" style="display: none;">End Call</button>
                    @endif
                    <button type="button" class="btn btn-secondary bg-3ac574 " onclick="fullScreen(this)">Full Screen</button>
                    <button type="button" class="btn btn-secondary bg-3ac574 end-call" @if(Auth::check()) @if(Auth::user()->type=='seller')data-dismiss="modal"@endif @endif onclick="@if(Auth::check()) @if(Auth::user()->type=='buyer') clientEndCall()@else endCall() @endif @else endCall() @endif ">End Call</button>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- E I G H T    S E C T I O N  E N D  -->
        @include('includes.frontend.footer')
    <!-- N I N E    S E C T I O N  S T A R T -->
    
    <!-- N I N E    S E C T I O N  E N D  -->

    <!-- T E N    S E C T I O N  S T A R T  -->
    
    <!-- T E N    S E C T I O N  E N D  -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('assets/frontend/js/slim-min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/popper.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstarp.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/frontend/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.validate.js') }}"></script> --}}

    
    <script>
        
        $(document).ready(function(){
            
            $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "{{ asset('assets/frontend/css/google_fonts.css') }}"});
            $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"});
            $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "{{ asset('assets/frontend/css/navbar.css') }}"});
            $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "{{ asset('assets/frontend/css/portfolio.css') }}"});
            $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "{{ asset('assets/frontend/css/app.css') }}"});
        });
        
    </script>
    
    @if(Auth::check())
        <script>
            $(document).ready(function(){
                $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "{{ asset('assets/vendor/sweetalert/sweetalert.css') }}"});
                $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}"});
                $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "{{ asset('assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}"});
                $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "{{ asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}"});
                $('<link>').appendTo('head').attr({type: 'text/css', rel: 'stylesheet',href: "{{ asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}"});
            });
        </script>
        
        <script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('assets/frontend/js/firebase.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/firebase-app.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/firebase-messaging.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/firebase-database.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/moment.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/moment-timezone.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/emoji/jquery.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/emoji/emoji.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/emoji/DisMojiPicker.js') }}"></script>
        <script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>
        <script type="text/javascript">
            tinymce.init({
                
                selector: 'textarea.tinymce-editor',
                height: 300,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | fontsizeselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
                content_css: '{{asset("assets/tinymce.min.css")}}',
                fontsize_formats: "8pt 9pt 10pt 11pt 12pt 14pt 18pt 24pt 30pt 36pt 48pt 60pt 72pt 96pt",
            });
        </script>
        <script>
            // Initialize Firebase
            var config = {
                apiKey: '{{config("services.firebase.api_key")}}',
                authDomain: '{{config("services.firebase.auth_domain")}}',
                databaseURL: "{{config('services.firebase.database_url')}}",
                projectId: "{{config('services.firebase.project_id')}}",
                storageBucket: "{{config('services.firebase.storage_bucket')}}",
                messagingSenderId: "{{config('services.firebase.messaging_sender_id')}}",
                appId: "{{config('services.firebase.appId')}}"
            };
            firebase.initializeApp(config);
        </script>
    @endif
    <script>
        var defaultUserPicture = "'{{ asset('uploadfiles/userphoto/default.jpg') }}'";
        @if(Auth::check())
            $("#emojis").disMojiPicker()
            $("#emojis").picker(emoji =>$('textarea[name="content"]').val($('textarea[name="content"]').val()+emoji));
            twemoji.parse(document.body);
        @endif
        // add user in list of users
        function writeUserListData(recieverId,senderId,name,message,photo,tm,status) {
            // firebase.database().ref('list').child(recieverId).remove();
            var newSenderId = "u"+senderId.toString();
            firebase.database().ref('list').child(recieverId).get().then((snapshot) => {
                if (snapshot.exists()) {
                    let old = snapshot.val();
                    firebase.database().ref('list/' + recieverId).set({...old,[newSenderId]: {id:senderId,message:message,sender_id:senderId,sender_name:name,sender_photo:photo,time:tm,unread:status}});
                } else {
                    firebase.database().ref('list/' + recieverId).set({[newSenderId]: {id:senderId,message:message,sender_id:senderId,sender_name:name,sender_photo:photo,time:tm,unread:status}});
                }
            });
        }

        function imagePopUp(e){
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            modal.style.display = "block";
            modalImg.src = e.src;
            captionText.innerHTML = e.alt;
        }
        
        // var span = document.getElementsByClassName("close")[0];
        // span.onclick = function() { 
        //   modal.style.display = "none";
        // }
	
		var old_users_val = $(".users").html();
        
        function deleteImage(){
            $('#img').val("");
            $('#imagePreview').html("");
        }
        
        function fileValidation() {
            var fileInput = document.getElementById('img');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.JPG|\.JPEG|\.PNG|\.GIF|\.pdf|\.doc|\.docx)$/i;
            if (!allowedExtensions.exec(filePath)) {
                alert('Invalid file type only image/document are allowed');
                fileInput.value = '';
                return false;
            } 
            else 
            {
              
                if (fileInput.files && fileInput.files[0]) {
                    const name = fileInput.files[0].name;
                    const lastDot = name.lastIndexOf('.');
                    const fileName = name.substring(0, lastDot);
                    const ext = name.substring(lastDot + 1).toLowerCase();
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var html = '<span style="position: relative; cursor: pointer; right: -96px; height: 20px; top: 4px; width: 20px; border-radius: 50%; outline: none !important;" onclick="deleteImage();"><i class="fa fa-times" aria-hidden="true" style="position: absolute; color: red; right: 4px; top: 1px; height: 14px; font-size: 12px;"></i></span>';
                        if(ext=='pdf')
                        {
                            html+='<div class="d-flex flex-column"><i class="fa fa-file-pdf-o" aria-hidden="true" style=" position: relative; top: 22px;"></i><div style=" position: relative; top: 25px;">'+name.substring(0,10) + "..."+'</div></div>';
                        }else if(ext=='docx' || ext=='doc'){
                            html += '<div class="d-flex flex-column"><i class="fa fa-file-word-o" aria-hidden="true" style=" position: relative; top: 22px;"></i><div style=" position: relative; top: 25px;">'+name.substring(0, 10) + "..."+'</div></div>';
                        }else{
                            html+='<img src="' + e.target.result+ '" style="height:100px;width:100px;cursor:pointer;" onclick="imagePopUp(this);"/>';
                        }
                        document.getElementById('imagePreview').innerHTML = html;    
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }

        var scroll_bottom = function(cls) {
		    var log = $(cls);
            log.animate({ scrollTop: log.prop('scrollHeight')}, 0);
		}
        var sender_reciever;
        var reciever_sender;
		var sender;
		var reciever;
        var username;
        var booking_id;

        function setValue(){
            sender_reciever = $('#sender_reciever').val();
            reciever_sender = $('#reciever_sender').val();
            sender = $('#sender').val();
            reciever = $('#reciever').val();
            username = $('#username').val();
            booking_id = $('#booking_id').val();
        }
        setValue();
        setInterval(setValue,100);  

        @if(Auth::check())

            function clientEndCall(){
                if(typeof $('.video-chat').data('booking-id')!='undefined' && $('.video-chat').data('booking-id')!=''){
                    swal({
                        text: 'Are you sure you want to end call?',
                        icon: "warning",
                        buttons: {
                            cancel: "Cancel",
                            confirm: "OK"
                            },
                    }).then((willDelete) => {
                        if (willDelete)
                        {
                            $('#leave').click();
                            $('#video-call-modal').removeClass('show'); 
                            $('#video-call-modal').hide(); 
                            var username = $('.video-chat').data('caller');
                            $.ajax({
                                type: 'post',
                                url: '{{ url("call-end") }}',
                                data: {_token:'{{ csrf_token() }}', name: username },
                                success: function(data) {
                                    $('.calling-div').addClass('d-none');  
                                }
                            });
                            $('#review_modal').modal('show'); 
                        } 
                    });

                }else{

                    swal({
                        text: 'Are you sure you want to end call?',
                        icon: "warning",
                        buttons: {
                            cancel: "Cancel",
                            confirm: "OK"
                            },
                    }).then((willDelete) => {
                        if (willDelete)
                        {
                            $('#leave').click();
                            $('#video-call-modal').removeClass('show'); 
                            $('#video-call-modal').hide(); 
                            var username = $('.video-chat').data('caller');
                            $.ajax({
                                type: 'post',
                                url: '{{ url("call-end") }}',
                                data: {_token:'{{ csrf_token() }}', name: username },
                                success: function(data) {
                                    $('.calling-div').addClass('d-none');  
                                }
                            });
                            window.location='';
                        } 
                    });
                    
                }

            }

            function makeCall(e){
                var id = {{Auth::user()->id}};
                if(id==$(e).data('reciever')){id = $(e).data('sender');}
                else if(id==$(e).data('sender')){id = $(e).data('reciever');}
                $(".event-messag-log").hide();
                $('#sender').val($(e).data('sender'));
                $('#sender_reciever').val($(e).data('sender')+"_"+$(e).data('reciever'));
                $('#reciever_sender').val($(e).data('reciever')+"_"+$(e).data('sender'));
                $('#reciever').val($(e).data('reciever'));
                $('#username').val($(e).data('caller'));
                sender_reciever = $(e).data('sender')+"_"+$(e).data('reciever');
                reciever_sender = $(e).data('reciever')+"_"+$(e).data('sender');
                firebase.database().ref('message').child(sender_reciever).on('value',(snapshot) => {
                    chat_element = '';
                    if(snapshot.exists()){
                        $.each(snapshot.val(),function(){
                            var mt = "mt-0";
                            // moment(this.time).tz('{{ Auth::user()->timezone }}').format('M-D-Y h:mmA')
                            chat_element +='<div class="d-flex mt-4">';
                                chat_element +='<div class="col-lg-1 p-0"><div class="parent"><img src="'+this.photo+'" class="rounded-circle img-fluid smallProfile" alt="" srcset=""></div></div>';
                                chat_element +='<div class="col-lg-11 pl-3">';
                                    chat_element +='<div>'+this.name[0].toUpperCase() + this.name.slice(1)+'<span class="f-12 pl-2">'+moment(this.time,"x").tz('{{ Auth::user()->timezone }}').format('M-D-Y h:mm a')+'</span></div> ';
                                    
                                    if(this.message && this.message !='' && this.message!='undefined')
                                    {
                                        mt="";
                                        chat_element += '<div class="cl-a8a8a8 f-12 chat-content-area">';
                                            chat_element += this.message;
                                        chat_element += '</div>';
                                    }

                                    if (this.file_type=='pdf' && this.other_file !='')
                                    {
                                        chat_element += '<div class="d-flex justify-content-left mb-2"><a href="'+this.other_file+'" download="download" style="position: relative;left: 3px;color:#5d616d;"><div class="d-flex flex-column"><i class="fa fa-file-word-o" aria-hidden="true" style="position: relative; top: 13px; font-size: 15px; left: 4px;">&nbsp;'+this.file_name+'</i></div></a>';
                                        chat_element +='</div>';
                                    }
                                    else if ((this.file_type=='docx' || this.file_type=='doc') && this.other_file !='')
                                    {
                                        chat_element += '<div class="d-flex justify-content-left mb-2"><a href="'+this.other_file+'" download="download" style="position: relative;color:#5d616d;"><div class="d-flex flex-column"><i class="fa fa-file-word-o" aria-hidden="true" style="position: relative; top: 13px; font-size: 15px; left: 4px;">&nbsp;'+this.file_name+'</i></div></a>';
                                        chat_element +='</div>';
                                    }
                                    else if (((this.file_type!='docx' || this.file_type!='doc' || this.file_type!='pdf') || this.file_type=='') && this.image !='')
                                    {
                                        chat_element += '<div class="d-flex justify-content-left mb-2"><a href="'+this.file_link+'" download="download" style="position: relative;left: 17px;"><i class="fa fa-download" aria-hidden="true"></i></a>';
                                        chat_element +='<img src="' + this.image + '" onclick="imagePopUp(this);" style="height:100px;width:100px;cursor:pointer;"/></div>';
                                    }
                                    chat_element +='</div>';
                                chat_element +='</div>';
                            chat_element +='</div>';
                        });
                    }
                    $(".messag-log").html(chat_element);
                    scroll_bottom(".messag-log");
                });

                $.ajax({
                    type: 'get',
                    url: '{{ route("getUserInfo") }}',
                    data: {id:id},
                    success: function(data) {
                        let video_model_header = `<div><div class="parent"><img onerror='this.onerror=null;this.src="{{ asset("uploadfiles/userphoto/default.jpg") }}"' src="${data.picture}" class="rounded-circle img-fluid smallProfile" alt="" srcset=""></div></div><div class="pl-2"><div>${data.username[0].toUpperCase() + data.username.slice(1)}</div></div>`;
                        $('.video-model-header').html(video_model_header);
                    }
                });

                $.ajax({
                    type: 'get',
                    url: '{{ url("test-token") }}',
                    data: { sender:$(e).data('sender'),reciever:$(e).data('reciever'),booking_id:$(e).data('booking-id'),name:$(e).data('caller') },
                    success: function(data) {
                        $('#token').val(JSON.parse(data).token);
                        $('#role').val(JSON.parse(data).role);
                        $('#channelName').val(JSON.parse(data).channel);
                        $('#join').click();
                        $('.calling-div').addClass('d-none');

                    }
                })
            }

            function againCall(){
                $.ajax({
                    type: 'get',
                    url: '{{ url("test-token") }}',
                    data: { 'sender':sender,'reciever':reciever,booking_id:booking_id,'name':username},
                    success: function(data) {
                        $('#token').val(JSON.parse(data).token);
                        $('#role').val(JSON.parse(data).role);
                        $('#channelName').val(JSON.parse(data).channel);
                        $('#join').click();
                        $('.calling-div').addClass('d-none');
                    }
                });
            }

            function messageSend() {
                if($('#video-call-modal').hasClass('show')){
                    var chat_content = $('#video-message-content').val();
                }else{
                    var chat_content = $('#message-content').val();
                }
                var img = $('input[name=img]').val();
                var chk = false;
                // var frm = document.getElementById('chat-form');
                // console.log(frm);
                var formData = new FormData($('#chat-form')[0]);
                formData.append('sender',sender);
                formData.append('reciever',reciever);
                formData.append('name','{{ Auth::user()->username }}');
                formData.append("_token","{{ csrf_token() }}");
                if(chat_content !='' && img!=''){ chk = true; }
                else if(chat_content =='' && img!=''){ chk = true; }
                else if(chat_content !='' && img==''){ chk = true; }
                if(img!=''){
                    $.ajax({
                        url: '{{ route("chat.store") }}',
                        method: 'post',
                        cache:false,
                        contentType: false,
                        processData: false,
                        data: formData,
                        success:function(data){
                            firebase.database().ref('message').child(sender_reciever).get().then((snapshot) => {
                                if (snapshot.numChildren() > 0){
                                    let old = snapshot.val();
                                    var newPostKey = firebase.database().ref().child('message').push().key;
                                    if(data.file_type!='pdf' && data.file_type!='doc' && data.file_type!='docx'){
                                        firebase.database().ref('message/' + sender_reciever).set({...old,[newPostKey]: {file_type:data.file_type,file_name:data.file_name,other_file:'',image:data.file,message:"shared a file",name:'{{ Auth::user()->username }}',photo:'{{ Auth::user()->picture!=null?Auth::user()->picture:url("uploads/user/default.jpg") }}',sender_id:sender,time:moment().tz("{{ Auth::user()->timezone }}").format("x")}});
                                    }else
                                    {
                                        firebase.database().ref('message/' + sender_reciever).set({...old,[newPostKey]: {file_type:data.file_type,file_name:data.file_name,other_file:data.file,image:'',message:"shared a file",name:'{{ Auth::user()->username }}',photo:'{{ Auth::user()->picture!=null?Auth::user()->picture:url("uploads/user/default.jpg") }}',sender_id:sender,time:moment().tz("{{ Auth::user()->timezone }}").format("x")}});
                                    }
                                }else{
                                    var newPostKey = firebase.database().ref().child('message').push().key;
                                    if(data.file_type!='pdf' && data.file_type!='doc' && data.file_type!='docx'){
                                        firebase.database().ref('message/' + sender_reciever).set({[newPostKey]: {file_type:data.file_type,file_name:data.file_name,other_file:'',image:data.file,message:"shared a file",name:'{{ Auth::user()->username }}',photo:'{{ Auth::user()->picture!=null?Auth::user()->picture:url("uploads/user/default.jpg") }}',sender_id:sender,time:moment().tz("{{ Auth::user()->timezone }}").format("x")}});
                                    }else
                                    {
                                        firebase.database().ref('message/' + sender_reciever).set({[newPostKey]: {file_type:data.file_type,file_name:data.file_name,other_file:data.file,image:'',message:"shared a file",name:'{{ Auth::user()->username }}',photo:'{{ Auth::user()->picture!=null?Auth::user()->picture:url("uploads/user/default.jpg") }}',sender_id:sender,time:moment().tz("{{ Auth::user()->timezone }}").format("x")}});
                                    }
                                }
                                writeUserListData('u'+reciever.toString(),sender,'{{ Auth::user()->username }}','shared a file','{{ Auth::user()->picture!=null?Auth::user()->picture:url("uploads/user/default.jpg") }}',moment().tz("{{ Auth::user()->timezone }}").format('x'),0)
                            });

                            firebase.database().ref('message').child(reciever_sender).get().then((snapshot) => {
                                if (snapshot.numChildren() > 0){
                                    let old = snapshot.val();
                                    var newPostKey = firebase.database().ref().child('message').push().key;
                                    if(data.file_type!='pdf' && data.file_type!='doc' && data.file_type!='docx'){
                                        firebase.database().ref('message/' + reciever_sender).set({...old,[newPostKey]: {file_type:data.file_type,file_name:data.file_name,other_file:'',image:data.file,message:"shared a file",name:'{{ Auth::user()->username }}',photo:'{{ Auth::user()->picture!=null?Auth::user()->picture:url("uploads/user/default.jpg") }}',sender_id:sender,time:moment().tz("{{ Auth::user()->timezone }}").format("x")}});
                                    }else
                                    {
                                        firebase.database().ref('message/' + reciever_sender).set({...old,[newPostKey]: {file_type:data.file_type,file_name:data.file_name,other_file:data.file,image:'',message:"shared a file",name:'{{ Auth::user()->username }}',photo:'{{ Auth::user()->picture!=null?Auth::user()->picture:url("uploads/user/default.jpg") }}',sender_id:sender,time:moment().tz("{{ Auth::user()->timezone }}").format("x")}});
                                    }
                                }else{
                                    var newPostKey = firebase.database().ref().child('message').push().key;
                                    if(data.file_type!='pdf' && data.file_type!='doc' && data.file_type!='docx'){
                                        firebase.database().ref('message/' + reciever_sender).set({[newPostKey]: {file_type:data.file_type,file_name:data.file_name,other_file:'',image:data.file,message:"shared a file",name:'{{ Auth::user()->username }}',photo:'{{ Auth::user()->picture!=null?Auth::user()->picture:url("uploads/user/default.jpg") }}',sender_id:sender,time:moment().tz("{{ Auth::user()->timezone }}").format("x")}});
                                    }else
                                    {
                                        firebase.database().ref('message/' + reciever_sender).set({[newPostKey]: {file_type:data.file_type,file_name:data.file_name,other_file:data.file,image:'',message:"shared a file",name:'{{ Auth::user()->username }}',photo:'{{ Auth::user()->picture!=null?Auth::user()->picture:url("uploads/user/default.jpg") }}',sender_id:sender,time:moment().tz("{{ Auth::user()->timezone }}").format("x")}});
                                    }
                                }
                                writeUserListData('u'+reciever.toString(),sender,'{{ Auth::user()->username }}','shared a file','{{ Auth::user()->picture!=null?Auth::user()->picture:url("uploads/user/default.jpg") }}',moment().tz("{{ Auth::user()->timezone }}").format('x'),0)
                            });
                        }
                    });
                }else{

                    firebase.database().ref('message').child(sender_reciever).get().then((snapshot) => {
                        if (snapshot.numChildren() > 0){
                            let old = snapshot.val();
                            var newPostKey = firebase.database().ref().child('message').push().key;
                            firebase.database().ref('message/' + sender_reciever).set({...old,[newPostKey]: {file_type:'',file_name:'',other_file:'',image:'',message:chat_content,name:'{{ Auth::user()->username }}',photo:'{{ Auth::user()->picture!=null?Auth::user()->picture:url("uploads/user/default.jpg") }}',sender_id:sender,time:moment().tz("{{ Auth::user()->timezone }}").format("x")}});
                        }else{
                            var newPostKey = firebase.database().ref().child('message').push().key;
                            firebase.database().ref('message/' + sender_reciever).set({[newPostKey]: {file_type:'',file_name:'',other_file:'',image:'',message:chat_content,name:'{{ Auth::user()->username }}',photo:'{{ Auth::user()->picture!=null?Auth::user()->picture:url("uploads/user/default.jpg") }}',sender_id:sender,time:moment().tz("{{ Auth::user()->timezone }}").format("x")}});
                        }
                        writeUserListData('u'+reciever.toString(),sender,'{{ Auth::user()->username }}',chat_content,'{{ Auth::user()->picture!=null?Auth::user()->picture:url("uploads/user/default.jpg") }}',moment().tz("{{ Auth::user()->timezone }}").format('x'),0)

                    });

                    firebase.database().ref('message').child(reciever_sender).get().then((snapshot) => {
                        if (snapshot.numChildren() > 0){
                            let old = snapshot.val();
                            var newPostKey = firebase.database().ref().child('message').push().key;
                            firebase.database().ref('message/' + reciever_sender).set({...old,[newPostKey]: {file_type:'',file_name:'',other_file:'',image:'',message:chat_content,name:'{{ Auth::user()->username }}',photo:'{{ Auth::user()->picture!=null?Auth::user()->picture:url("uploads/user/default.jpg") }}',sender_id:sender,time:moment().tz("{{ Auth::user()->timezone }}").format("x")}});
                        }else{
                            var newPostKey = firebase.database().ref().child('message').push().key;
                            firebase.database().ref('message/' + reciever_sender).set({[newPostKey]: {file_type:'',file_name:'',other_file:'',image:'',message:chat_content,name:'{{ Auth::user()->username }}',photo:'{{ Auth::user()->picture!=null?Auth::user()->picture:url("uploads/user/default.jpg") }}',sender_id:sender,time:moment().tz("{{ Auth::user()->timezone }}").format("x")}});
                        }
                        writeUserListData('u'+reciever.toString(),sender,'{{ Auth::user()->username }}',chat_content,'{{ Auth::user()->picture!=null?Auth::user()->picture:url("uploads/user/default.jpg") }}',moment().tz("{{ Auth::user()->timezone }}").format('x'),0)

                    });
                }
                $('textarea[name=content]').val('');
                $('input[name=img]').val('');
                $('#imagePreview').html("");
                $('#emojis').addClass('d-none');
                scroll_bottom(".messag-log");
            }

            function sendEventMessage() {
                    if($('#video-call-modal').hasClass('show')){
                        var chat_content = $('#video-message-content').val();
                    }else{
                        var chat_content = $('#message-content').val();
                    }
                    var img = $('input[name=img]').val();
                    var chk = false;
                    // var frm = document.getElementById('chat-form');
                    // console.log(frm);
                    var formData = new FormData($('#chat-form')[0]);
                    formData.append('sender',sender);
                    formData.append('reciever',reciever);
                    formData.append('name','{{ Auth::user()->username }}');
                    formData.append("_token","{{ csrf_token() }}");
                    if(chat_content !='' && img!=''){ chk = true; }
                    else if(chat_content =='' && img!=''){ chk = true; }
                    else if(chat_content !='' && img==''){ chk = true; }
                    if(img!=''){
                        $.ajax({
                            url: '{{ route("chat.store") }}',
                            method: 'post',
                            cache:false,
                            contentType: false,
                            processData: false,
                            data: formData,
                            success:function(data){
                                firebase.database().ref('event').child($('#single-event-channel-name').val()).get().then((snapshot) => {
                                    if (snapshot.numChildren() > 0){
                                        let old = snapshot.val();
                                        var newPostKey = firebase.database().ref().child('event').push().key;
                                        if(data.file_type!='pdf' && data.file_type!='doc' && data.file_type!='docx'){
                                            firebase.database().ref('event/' + $('#single-event-channel-name').val()).set({...old,[newPostKey]: {file_type:data.file_type,file_name:data.file_name,other_file:'',image:data.file,message:"shared a file",name:'{{ Auth::user()->username }}',photo:'{{ Auth::user()->picture!=null?Auth::user()->picture:url("uploads/user/default.jpg") }}',sender_id:sender,time:moment().tz("{{ Auth::user()->timezone }}").format("x")}});
                                        }else
                                        {
                                            firebase.database().ref('event/' + $('#single-event-channel-name').val()).set({...old,[newPostKey]: {file_type:data.file_type,file_name:data.file_name,other_file:data.file,image:'',message:"shared a file",name:'{{ Auth::user()->username }}',photo:'{{ Auth::user()->picture!=null?Auth::user()->picture:url("uploads/user/default.jpg") }}',sender_id:sender,time:moment().tz("{{ Auth::user()->timezone }}").format("x")}});
                                        }
                                    }else{
                                        var newPostKey = firebase.database().ref().child('event').push().key;
                                        if(data.file_type!='pdf' && data.file_type!='doc' && data.file_type!='docx'){
                                            firebase.database().ref('event/' + $('#single-event-channel-name').val()).set({[newPostKey]: {file_type:data.file_type,file_name:data.file_name,other_file:'',image:data.file,message:"shared a file",name:'{{ Auth::user()->username }}',photo:'{{ Auth::user()->picture!=null?Auth::user()->picture:url("uploads/user/default.jpg") }}',sender_id:sender,time:moment().tz("{{ Auth::user()->timezone }}").format("x")}});
                                        }else
                                        {
                                            firebase.database().ref('event/' + $('#single-event-channel-name').val()).set({[newPostKey]: {file_type:data.file_type,file_name:data.file_name,other_file:data.file,image:'',message:"shared a file",name:'{{ Auth::user()->username }}',photo:'{{ Auth::user()->picture!=null?Auth::user()->picture:url("uploads/user/default.jpg") }}',sender_id:sender,time:moment().tz("{{ Auth::user()->timezone }}").format("x")}});
                                        }
                                    }
                                });
                            }
                        });
                    }else{

                        firebase.database().ref('event').child($('#single-event-channel-name').val()).get().then((snapshot) => {
                            if (snapshot.numChildren() > 0){
                                let old = snapshot.val();
                                var newPostKey = firebase.database().ref().child('event').push().key;
                                firebase.database().ref('event/' + $('#single-event-channel-name').val()).set({...old,[newPostKey]: {file_type:'',file_name:'',other_file:'',image:'',message:chat_content,name:'{{ Auth::user()->username }}',photo:'{{ Auth::user()->picture!=null?Auth::user()->picture:url("uploads/user/default.jpg") }}',sender_id:sender,time:moment().tz("{{ Auth::user()->timezone }}").format("x")}});
                            }else{
                                var newPostKey = firebase.database().ref().child('event').push().key;
                                firebase.database().ref('event/' + $('#single-event-channel-name').val()).set({[newPostKey]: {file_type:'',file_name:'',other_file:'',image:'',message:chat_content,name:'{{ Auth::user()->username }}',photo:'{{ Auth::user()->picture!=null?Auth::user()->picture:url("uploads/user/default.jpg") }}',sender_id:sender,time:moment().tz("{{ Auth::user()->timezone }}").format("x")}});
                            }
                        });

                    }
                    $('textarea[name=content]').val('');
                    $('input[name=img]').val('');
                    $('#imagePreview').html("");
                    $('#emojis').addClass('d-none');
                    scroll_bottom(".event-messag-log");
                }

            function focusOnInput()
            {
                // firebase.database().ref('list').child('u'+sender.toString()).remove();
                firebase.database().ref('list').child('u'+sender.toString()).once("value", function(ysnapshot) {
                    $.each(ysnapshot.val(),function(i,v){
                        if(v.message){content = v.message;}else{content ='';}
                        firebase.database().ref('/list/u'+sender.toString()+'/'+i).set({id:v.id,message:v.message,sender_id:v.sender_id,sender_name:v.sender_name,sender_photo:v.sender_photo,time:v.time,unread:1})   
                    });
                });
            }

            if(sender_reciever){
                firebase.database().ref('message').child(sender_reciever).on('value',(snapshot) => {
                    chat_element = '';
                    if(snapshot.exists()){
                        $.each(snapshot.val(),function(){
                            var mt = "mt-0";
                            // moment(this.time).tz('{{ Auth::user()->timezone }}').format('M-D-Y h:mmA')
                            chat_element +='<div class="d-flex mt-4">';
                                chat_element +='<div class="col-lg-1 p-0"><div class="parent"><img onerror="this.onerror=null;this.src='+defaultUserPicture+'" src="'+this.photo+'" class="rounded-circle img-fluid smallProfile" alt="" srcset=""></div></div>';
                                chat_element +='<div class="col-lg-11 pl-3">';
                                    chat_element +='<div>'+this.name[0].toUpperCase() + this.name.slice(1)+'<span class="f-12 pl-2">'+moment(this.time,"x").tz('{{ Auth::user()->timezone }}').format('M-D-Y h:mm a')+'</span></div> ';
                                    
                                    if(this.message && this.message !='' && this.message!='undefined')
                                    {
                                        mt="";
                                        chat_element += '<div class="cl-a8a8a8 f-12 chat-content-area">';
                                            chat_element += this.message;
                                        chat_element += '</div>';
                                    }

                                    if (this.file_type=='pdf' && this.other_file !='')
                                    {
                                        chat_element += '<div class="d-flex justify-content-left mb-2"><a href="'+this.other_file+'" download="download" style="position: relative;left: 3px;color:#5d616d;"><div class="d-flex flex-column"><i class="fa fa-file-word-o" aria-hidden="true" style="position: relative; top: 13px; font-size: 15px; left: 4px;">&nbsp;'+this.file_name+'</i></div></a>';
                                        chat_element +='</div>';
                                    }
                                    else if ((this.file_type=='docx' || this.file_type=='doc') && this.other_file !='')
                                    {
                                        chat_element += '<div class="d-flex justify-content-left mb-2"><a href="'+this.other_file+'" download="download" style="position: relative;color:#5d616d;"><div class="d-flex flex-column"><i class="fa fa-file-word-o" aria-hidden="true" style="position: relative; top: 13px; font-size: 15px; left: 4px;">&nbsp;'+this.file_name+'</i></div></a>';
                                        chat_element +='</div>';
                                    }
                                    else if (((this.file_type!='docx' || this.file_type!='doc' || this.file_type!='pdf') || this.file_type=='') && this.image !='')
                                    {
                                        chat_element += '<div class="d-flex justify-content-left mb-2"><a href="'+this.file_link+'" download="download" style="position: relative;left: 17px;"><i class="fa fa-download" aria-hidden="true"></i></a>';
                                        chat_element +='<img src="' + this.image + '" onclick="imagePopUp(this);" style="height:100px;width:100px;cursor:pointer;"/></div>';
                                    }
                                    chat_element +='</div>';
                                chat_element +='</div>';
                            chat_element +='</div>';
                        });
                    }
                    $(".messag-log").html(chat_element);
                    scroll_bottom(".messag-log");
                });
            }

            $.ajax({
                url:"{{ route('setCurrentTimezone') }}",
                type:"get",
                success:function(data){}
            });

            firebase.database().ref('list').child('{{ "u".Auth::user()->id }}').on('value',(gSnapshot) => {
                var chat_html = "";
                var list_html = "";
                var greenChk = false;
                if(gSnapshot.val() !=null){
                    $.each(gSnapshot.val(),function(){
                        gSnapshot.numChildren()>0?$('.userListCount').html("Users List ("+gSnapshot.numChildren()+")"):$('.userListCount').html("Users Lis");
                        if(this.unread==0){ greenChk=true; }
                        var cnt = '';
                        var cls= '';
                        @if(@$user)
                            cls='active';
                        @endif
                        var loginChk = false;
                        var c_url = '{{ route("single.chat", ":id") }}';
                        c_url = c_url.replace(':id',this.sender_id);
                        var s_url = '{{ route("chat.user.status", ":id") }}';
                        s_url = s_url.replace(':id',this.sender_id);
                        if(this.message.length>20 ){ cnt = this.message.substring(0,20)+"..." }else{ cnt=this.message; }
                        chat_html += '<a class="dropdown-item d-flex"'+cls+'" row m-0 pt-2" href="'+c_url+'">';
                            chat_html+='<div class="col-md-2 p-0">';
                                chat_html +='<img onerror="this.onerror=null;this.src='+defaultUserPicture+'" src="'+this.sender_photo+'" alt="" width="44" height="44" class="rounded-circle">';
                                $.ajax({
                                    url:s_url,
                                    type:"get",
                                    async: false, 
                                    success:function(data)
                                    {
                                        if(data.next>data.current)
                                        {
                                            loginChk = true;
                                            chat_html+='<span class="ml--1 green-dot mt-1"></span>';

                                        }else{
                                            chat_html+='<span class="ml--1 grey-dot mt-1"></span>';
                                        }
                                    }
                                });     
                            chat_html+='</div>';
                            
                            chat_html+='<div class="col-md-6 pl-2 pt-1 p-0">';
                                chat_html+='<div class="row m-0"><div class="dropdown-heading">'+this.sender_name[0].toUpperCase() + this.sender_name.slice(1)+'</div></div>';
                                chat_html+='<div class="row m-0"><div class="dropdown-contnt">'+cnt+'</div></div>';
                            chat_html+='</div>';

                            chat_html+='<div class="col-md-4 p-0">';
                                chat_html+='<div class="row m-0 justify-content-end mt-1"><span class="dropdown-contnt">'+moment(this.time,"x").tz('{{ Auth::user()->timezone }}').format('MMM/DD/yy h:mma')+'</span></div>';
                            chat_html+='</div>';
                        chat_html+="</a>";

                        list_html += '<a href="'+c_url+'" class="h-85 border  list-group-item-action   border-left-0 border-right-0 bg-white ">';
                            list_html+='<div class="row m-0  pt-3">';

                                list_html+='<div class="col-md-3">';
                                    list_html+='<div class="parent"><img onerror="this.onerror=null;this.src='+defaultUserPicture+'" src="'+this.sender_photo+'" class="rounded-circle img-fluid smallProfile" alt="" srcset="">';
                                    list_html+='</div>';
                                    var uId = 'user-status-'+this.sender_id;
                                    if(loginChk){
                                        list_html+='<div class="parentCircle-Child bg-success ';
                                        list_html+=uId;
                                        list_html+='"></div>';
                                    }
                                    else{ 
                                        list_html+='<div class="parentCircle-Child bg-grey ';
                                        list_html+=uId;
                                        list_html+='"></div>';
                                    }
                                list_html+='</div>';

                                list_html+='<div class="col-md-7 p-0 f-13 d-flex flex-column justify-content-center">';
                                    list_html+='<div>'+this.sender_name[0].toUpperCase() + this.sender_name.slice(1)+'</div>';
                                    list_html+='<div class="pt-1">'+cnt+'</div>';
                                list_html+='</div>';
                                
                                list_html+='<div class="col-md-2 pl-0 d-flex flex-column justify-content-center align-items-center">';
                                    if(this.unread==0){
                                        list_html+='<div class="notification-divMain bg-3ac754"><span class="cl-9b9461 d-flex justify-content-center align-items-center text-white">1</span></div>';
                                    }
                                    list_html+='<div class="f-10 pt-1">'+moment(this.time, "x").tz('{{ Auth::user()->timezone }}').format('MMM/DD/YY h:mma')+'</div>';
                                list_html+='</div>';

                            list_html+='</div>';
                        list_html+='</a>';                
                    });
                    if(greenChk){ $('.messageDropdown').children('span').addClass('green-dot'); }else{$('.messageDropdown').children('span').removeClass('green-dot');}
                    chat_html+='<div class="dropdown-footer mt-5 " id="index-nav-home">';
                        chat_html+='<div class="bg-3ac574 row m-0 pt-2 pb-3">';
                            chat_html+='<div class="col-md-6 d-flex p-0 pl-4">';
                                chat_html+='<div><i class="fa fa-cog text-white" aria-hidden="true"></i></div>';
                                chat_html+='<div><i class="fa fa-volume-up text-white pl-2" aria-hidden="true"></i></div>';
                            chat_html+='</div>';
                            chat_html+='<div class="col-md-6 p-0 pr-3 text-white text-right">';
                                chat_html+='<a href="{{ route("chat.index") }}" style="color: #ffffff;"><h6>See all in inbox</h6></a>';
                            chat_html+='</div>';
                        chat_html+='</div>';
                    chat_html+='</div>';
                    $('.userList').html(list_html);
                    $("#nav-home").html(chat_html);
                }
            });

            setInterval(function(){
                
                $.ajax({
                    url:"{{ route('user.appointment.notification') }}",
                    type:"get",
                    success:function(data){
                        var html ='';
                        // if(data.length>0){ $('.messageDropdown').children('span').addClass('green-dot'); }else{$('.messageDropdown').children('span').removeClass('green-dot');}
                        data.map(v=>{
                            var element = document.getElementById("nAppointment"+v.id);
                            if(typeof(element) == 'object' && element == null){
                                html += '<a class="dropdown-item d-flex row m-0 pt-2 "  id="nAppointment'+v.id+'" href="'+v.url+'">';
                                    html+='<div class="col-md-2 p-0">';
                                        html +='<img src="'+v.avatar+'" onerror="this.onerror=null;this.src='+defaultUserPicture+'" alt="miss"  width="44" height="44" class="rounded-circle">';
                                    html+='</div>';
                                    html+='<div class="col-md-8 pl-2 pt-1 p-0">';
                                        html+='<div class="row m-0"><div class="dropdown-heading"style="max-width:200px !important;white-space: normal;">'+v.username[0].toUpperCase() + v.username.slice(1)+'</div></div>';
                                        html+='<div class="row m-0 ">';
                                            html+='<div class="dropdown-contnt"style="max-width:200px !important;white-space: normal;">';
                                                if(v.status=="Approved")
                                                {
                                                    html+=v.name+' appointment has been accepted';
                                                }else if(v.status=="Cancelled"){
                                                    html+=v.name+' appointment has been declined';
                                                }
                                            html+='</div>';
                                        html+='</div>';
                                    html+='</div>';

                                    html+='<div class="col-md-1 p-0">';
                                        html+='<div class="row m-0 justify-content-end mt-1"><span class="">$'+v.cost+'</span></div>';
                                    html+='</div>';

                                html+="</a>";
                            }
                        });
                        let oldHtml = $('#nav-profile').html();
                        oldHtml+=html;
                        $('#nav-profile').html(oldHtml);
                    }
                });
                
                $.ajax({
                    url:"{{ route('user.dispute.notification') }}",
                    type:"get",
                    success:function(data){
                        var html ='';
                        // if(data.length>0){ $('.messageDropdown').children('span').addClass('green-dot'); }else{$('.messageDropdown').children('span').removeClass('green-dot');}
                        data.map(v=>{
                            var element = document.getElementById("dispute"+v.id);
                            if(typeof(element) == 'object' && element == null){
                                html += '<a class="dropdown-item d-flex row m-0 pt-2"  id="dispute'+v.id+'" href="'+v.url+'">';
                                    html+='<div class="col-md-2 p-0">';
                                        html +='<img src="'+v.avatar+'" onerror="this.onerror=null;this.src='+defaultUserPicture+'" alt="miss" class="img-fluid">';
                                    html+='</div>';
                                    html+='<div class="col-md-9 pl-2 pt-1 p-0">';
                                        html+='<div class="row m-0"><div class="dropdown-heading"style="max-width:200px !important;white-space: normal;">'+v.username[0].toUpperCase() + v.username.slice(1)+'</div></div>';
                                        html+='<div class="row m-0"><div class="dropdown-contnt" style="max-width:200px !important;white-space: normal;">'+v.subject+'</div></div>';
                                    html+='</div>';
                                html+="</a>";
                            } 
                        });
                        let oldHtml = $('#nav-profile').html();
                        oldHtml+=html;
                        $('#nav-profile').html(oldHtml);
                    }
                });

                $.ajax({
                    url:"{{ route('user.dispute.reply.notification') }}",
                    type:"get",
                    success:function(data){
                        var html ='';
                        if(data.length>0){
                            data.map(v=>{
                                var element = document.getElementById("dispute"+v.id);
                                if(typeof(element) == 'object' && element == null){
                                    html += '<a class="dropdown-item d-flex row m-0 pt-2"  id="dispute'+v.id+'" href="'+v.url+'">';
                                        html+='<div class="col-md-2 p-0">';
                                            html +='<img src="'+v.avatar+'" onerror="this.onerror=null;this.src='+defaultUserPicture+'" alt="miss" width="44" height="44" class="rounded-circle">';
                                        html+='</div>';
                                        html+='<div class="col-md-9 pl-2 pt-1 p-0">';
                                            html+='<div class="row m-0"><div class="dropdown-heading"style="max-width:200px !important;white-space: normal;">'+v.username[0].toUpperCase() + v.username.slice(1)+'</div></div>';
                                            html+='<div class="row m-0"><div class="dropdown-contnt"style="max-width:200px !important;white-space: normal;">'+v.subject+'</div></div>';
                                        html+='</div>';
                                    html+="</a>";
                                }
                            });
                        }
                        let oldHtml = $('#nav-profile').html();
                        oldHtml+=html;
                        $('#nav-profile').html(oldHtml);
                    }
                });

            },1000);

            window.onload = function() {
                $.ajax({
                    url:"{{ route('chat.user.update',Auth::user()->id) }}",
                    type:"get",
                    success:function(data)
                    {
                        console.log(data);
                    }
                });
            }

            setInterval(function(){
                $.ajax({
                    url:"{{ route('chat.user.update',Auth::user()->id) }}",
                    type:"get",
                    success:function(data)
                    {
                        console.log(data);
                    }
                });
            },10000);

        @endif

        // $(function () {
        //     $(".example1")
        //         .DataTable({
        //             responsive: true,
        //             lengthChange: false,
        //             autoWidth: false,
        //             // "scrollX": true,
        //             // buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
        //         })
        //         .buttons()
        //         .container()
        //         .appendTo(".dataTables_wrapper .col-md-6:eq(0)");

        // });

        setInterval(function(){
            @if(Auth::check())
                $.ajax({
                    type: 'get',
                    url : '{{ route("getAppointmentUpdate") }}',
                    success:function(data)
                    {
                        data.map(appointment=>{
                            if(appointment.status==true){
                                $('.video-chat-img-'+appointment.id).removeClass('d-none');
                            }else{
                                $('.video-chat-img-'+appointment.id).addClass('d-none');
                            }
                        });

                    }
                });
            @endif
        },1000);
        @if(Auth::check())
            firebase.database().ref('/typing').on('value', function(snapshot) {
                var user = snapshot.val();
                if(user && user.name == username) {
                    var html = '';
                    html+='<div class="loader"><span class="typing"></span><span class="typing" ></span><span class="typing" ></span></div>';
                    // html+='<div class="typing-dot"></div><div class="typing-dot"></div><div class="typing-dot"></div>';
                    html+='<div class="ml-3">'+user.name+' is typing</div>';
                    $(".users").html(html);
                    
                }else{
                    $(".users").html(' ');
                }

            });
        @endif

    </script>
    @yield('extra-script')
</body>

</html>
