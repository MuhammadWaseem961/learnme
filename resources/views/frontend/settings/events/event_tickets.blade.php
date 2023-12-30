@extends('layouts.frontend.setting') @section('title','Event Tickets') {{-- head start --}} @section('extra-css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/dashboard.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/login_register_common.css') }}" />
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> --}}
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

<section class="px-5 pt-2 pb-2 nav-bg-img robotoRegular">@include('includes.frontend.navbar')</section>
@include('includes.frontend.navigations')
@endsection
@section('content')


<p class="border-bottom pl-3 f-21 cl-616161">Event Purchases</p>
<div class="table-responsive ServiceTableData px-3 pt-4" id="ServiceTableData">
    <table id="example1" class="table table-hover example1" style="width:100%;">
        <thead>
            <tr class="text-uppercase">
                <th class="wsnw">No #</th>
                <th scope="col">Username</th>
                <th scope="col">Title</th>
                <th scope="col">Date Time</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Location</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($tickets->count()>0)
                @foreach($tickets as $key=>$ticket)
                    <tr>
                        <td class="h5 m-0 va-middle">{{++$key}}</td>
                        <td class="va-middle">{{$ticket->event->user->username}}</td>
                        <td class="va-middle">{{ $ticket->event->title }}</td>
                        <td class="va-middle">{{ date('m/d/Y h:i a',strtotime($ticket->event->date_time)) }}</td>
                        <td class="va-middle"><img src="{{ asset($ticket->event->image) }}" width="100" height="100"></td>
                        <td class="va-middle">{{ $ticket->event->price }}</td>
                        <td class="va-middle">{{ $ticket->event->location }}</td>
                        <td class="va-middle">
                            <button id="btn{{$ticket->id}}" class="d-none btn bg-transparent border-0" onclick="makeEventCall({{$ticket->event->id}},{{$ticket->event->id.$ticket->event->user->id}})"> <img src="{{asset('assets/frontend/images/enter.png')}}" style="width:60%;" alt="" srcset=""> </button>
                            <span id="span{{$ticket->id}}" class="badge badge-success f-14 p-2 d-none">Event is complete, thank you for joining!</span>
                        </td>
                    </tr>
                @endforeach
            @endif
            

        </tbody>
    </table>
</div>

@endsection

@section('extra-script')

    <script>
        
        setInterval(function(){
            $.ajax({
                type: 'get',
                url : '{{ route("getEventUpdate") }}',
                success:function(data)
                {
                    data.map(event=>{
                        if(event.status==true && event.check=="pending"){
                            $('#btn'+event.id).removeClass('d-none');
                            $('#span'+event.id).addClass('d-none');
                        }else if(event.status==false && event.check=="complete"){
                            $('#btn'+event.id).addClass('d-none');
                            $('#span'+event.id).removeClass('d-none');
                        }
                    });
                }
            });
        },1000);

    </script>

@endsection
