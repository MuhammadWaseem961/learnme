@extends('layouts.frontend.setting') @section('title','Events') {{-- head start --}} @section('extra-css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/dashboard.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/login_register_common.css') }}" />
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

    .nav-tabs .nav-link.active {
        background-color: #3ac574 !important;
        color: #fff!important;
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


<p class="border-bottom pl-3 f-21 cl-616161">My Events</p>
<div class="row">
    <div class="col-md-12 px-4 ">
        <a href="{{ route('events.create') }}" title="Click to Add Post" class="mr-3 btn btn-sm bg-3AC574 text-white m-2 add_service" style="float: right;">Add Event</a>
    </div>
</div>

<ul class="nav nav-tabs mb-3 ml-4 mr-4 ">
    <li class="nav-item"><a class="nav-link active cl-000000" data-toggle="tab" href="#upcoming">Upcoming</a></li>
    <li class="nav-item"><a class="nav-link cl-000000" data-toggle="tab" href="#completed">Completed</a></li>
</ul>

<div class="tab-content">
    <div class="tab-pane active container tabPaneOne" id="upcoming">
        <div class="table-responsive ServiceTableData px-3 mb-3" id="ServiceTableData">
            <table id="example1" class="table table-hover example1" style="width:100%;">
                <thead>
                    <tr class="text-uppercase">
                        <th class="wsnw">No #</th>
                        <th scope="col">Tickets</th>
                        <th scope="col">Earning</th>
                        <th scope="col">Title</th>
                        <th scope="col">Date Time</th>
                        <th scope="col">Image</th>
                        <th scope="col">Ticket Price</th>
                        <th scope="col">Location</th>
                        {{-- <th scope="col">Summary</th> --}}
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($pending->count()>0)
                        @foreach($pending as $key=>$event)
                            <tr>
                                <td class="h5 m-0 va-middle">{{++$key}}</td>
                                <td class="va-middle"><a href="{{route('getEventTicketsUsers',$event->id)}}" class="btn bg-3AC574 text-white">Tickets <span class="badge badge-light">{{$event->tickets->count() }}</span></a></td>
                                <td class="va-middle">{{ $event->total_earning }}</td>
                                <td class="va-middle">{{ $event->title }}</td>
                                <td class="va-middle">{{ date('m/d/Y h:i a',strtotime($event->date_time)) }}</td>
                                <td class="va-middle"><img src="{{ asset($event->image) }}" width="100" height="100"></td>
                                <td class="va-middle">{{ $event->price }}</td>
                                <td class="va-middle">{{ $event->location }}</td>
        
                                {{-- <td class="va-middle">{{Str::limit($event->summery, 50,'...')}}</td> --}}
                                <td class="va-middle">
                                    <div class="d-flex">
                                        {{-- <a class="btn btn-info btn-sm ml-1" href="{{route('events.show',$event->id)}}" title="View Blog Post">View</a> --}}
                                        <a class="btn btn-success btn-sm ml-1" href="{{route('events.edit',$event->id)}}" title="Edit Event">Edit</a>
                                        <button class="btn btn-danger btn-sm ml-1" title="Delete Event" onclick="deleteResource('{{ route('events.destroy',$event->id) }}','{{ route('events.index') }}')">Delete</button> 
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    
        
                </tbody>
            </table>
        </div>
    </div>

    <div class="tab-pane container tabPaneOne" id="completed">
        <div class="table-responsive ServiceTableData px-3 mb-3" id="ServiceTableData">
            <table id="example1" class="table table-hover example1" style="width:100%;">
                <thead>
                    <tr class="text-uppercase">
                        <th class="wsnw">No #</th>
                        <th scope="col">Tickets</th>
                        <th scope="col">Earning</th>
                        <th scope="col">Title</th>
                        <th scope="col">Date Time</th>
                        <th scope="col">Image</th>
                        <th scope="col">Ticket Price</th>
                        <th scope="col">Location</th>
                        {{-- <th scope="col">Summary</th> --}}
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($complete->count()>0)
                        @foreach($complete as $key=>$event)
                            <tr>
                                <td class="h5 m-0 va-middle">{{++$key}}</td>
                                <td class="va-middle"><a href="{{route('getEventTicketsUsers',$event->id)}}" class="btn bg-3AC574 text-white">Tickets <span class="badge badge-light">{{$event->tickets->count() }}</span></a></td>
                                <td class="va-middle">{{ $event->total_earning }}</td>
                                <td class="va-middle">{{ $event->title }}</td>
                                <td class="va-middle">{{ date('m/d/Y h:i a',strtotime($event->date_time)) }}</td>
                                <td class="va-middle"><img src="{{ asset($event->image) }}" width="100" height="100"></td>
                                <td class="va-middle">{{ $event->price }}</td>
                                <td class="va-middle">{{ $event->location }}</td>
        
                                {{-- <td class="va-middle">{{Str::limit($event->summery, 50,'...')}}</td> --}}
                                <td class="va-middle">
                                    <div class="d-flex">
                                        {{-- <a class="btn btn-info btn-sm ml-1" href="{{route('events.show',$event->id)}}" title="View Blog Post">View</a> --}}
                                        <a class="btn btn-success btn-sm ml-1" href="{{route('events.edit',$event->id)}}" title="Edit Event">Edit</a>
                                        <button class="btn btn-danger btn-sm ml-1" title="Delete Event" onclick="deleteResource('{{ route('events.destroy',$event->id) }}','{{ route('events.index') }}')">Delete</button> 
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
{{-- footer section start --}} 
@section('extra-script')

@endsection 
{{-- footer section end --}}