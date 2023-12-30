@extends('layouts.frontend.app')

@section('extra-css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"  />
    <link href="{{ asset('assets/frontend/css/custom.css') }}" />
    <link href="{{ asset('assets/frontend/css/emoji/jquerysctipttop.css') }}" />
    <link href="{{ asset('assets/frontend/css/emoji/emojis.css') }}" />
    <style>
        
        /*.reciever-div{*/
        /*    background:#007bff !important;*/
        /*    color:#FFFFFF !important;*/
        /*}*/
        
        /*.sender-div{*/
        /*    background:#3AC574 !important;*/
        /*    color:#FFFFFF !important;*/
        /*}*/
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
          .smallProfile {
            width: 40px;
            height: 38px;
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
            right: 18%;
            border-radius: 100%;
          }
          .notification-divMain{
            width: 25px;
            height: 25px;
            border-radius: 50%;
          
          }
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
          ::-webkit-scrollbar {
            width: 6px;
                border-radius: 10px;
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
        .modal {
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
        .modal-content {
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
        
    </style>
@endsection

@section('content')
    <section class="px-5 bg-navbar nav-bg-img pb-5">
        @include('includes.frontend.navbar')

    </section>

    @include('includes.frontend.navigations')

	<div class="wrapper">

	    <div class="row m-0 r-Main-P mt-5">
	        <div class="col-sm-12 col-md-3 col-lg-3 col-xs-12 pl-0 pr-0">
	            <div class="card" style="min-height: 702px; max-height: 702px;    ">
        			<div class="card-header border-0">
        				<div class="title border-0 userListCount"></div>
        			</div>
        			<div class="card-body pl-0 pr-0" style="overflow-y: scroll;">
        				<div class="d-flex">
                            <ul class="list-group userList" style="width:100%;">
                            </ul>
        				</div>
        			</div>
        			<div class="card-footer border-0" ></div>
        		</div>
	            
	        </div>
	        <div class="col-sm-9 col-md-9 col-lg-9 col-xs-12 pl-0">
	            <div class="card" style="min-height: 702px; max-height: 702px;">
        			<div class="card-header">
        			   
        			</div>
        			<div class="card-body " style="max-height: 417px !important;min-height: 417px !important;">
        			   
        
        			
        
        				
        			</div>
        			
        			<div class="card-footer border-0 pl-3 pr-3" >
        				
        			</div>
        		</div>
	        </div>
	    </div>
	</div>
@endsection

@section('extra-script')
	{{-- <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-database.js"></script> --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>
	<script>
        function dateDifference(date1,date2)
        {
            const diffTime = Math.abs(date2 - date1);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
            return diffDays;
        }
        
        window.onload = function() {
            $.ajax({
                url:"{{ route('chat.updated.users',Auth::user()->id) }}",
                type:"get",
                success:function(data)
                {
                    $.each(data,function(){
                        if(this.next > this.current)
                        {
                            console.log("if next and current: "+this.next+" : "+this.current);
                            $('.user-staus-'+this.id).addClass('bg-success');
                            $('.user-staus-'+this.id).removeClass('bg-grey');
                            
                            
                        }else{
                            console.log("else next and current: "+this.next+" : "+this.current);
                            $('.user-staus-'+this.id).removeClass('bg-success');
                            $('.user-staus-'+this.id).addClass('bg-grey');
                        
                            
                        }
                    });
                }
            });
        }
        
        setInterval(function(){
            
            $.ajax({
                url:"{{ route('chat.updated.users',Auth::user()->id) }}",
                type:"get",
                success:function(data)
                {
                    $.each(data,function(){
                        if(this.next > this.current)
                        {
                            console.log("if next and current: "+this.next+" : "+this.current);
                            $('.user-staus-'+this.id).addClass('bg-success');
                            $('.user-staus-'+this.id).removeClass('bg-grey');
                            
                            
                        }else{
                            console.log("else next and current: "+this.next+" : "+this.current);
                            $('.user-staus-'+this.id).removeClass('bg-success');
                            $('.user-staus-'+this.id).addClass('bg-grey');
                        
                            
                        }
                    });
                }
            });
        },10000);
        
	</script>
@endsection