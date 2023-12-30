@extends('layouts.admin.admin') @section('title','Posts') {{-- head start --}} @section('extra-css')
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
    <section class="px-5 pt-2 pb-2 nav-bg-img robotoRegular">@include('includes.frontend.admin_navbar')</section>
@endsection
@section('content')


<p class="border-bottom pl-3 f-21 cl-616161">Blog Posts</p>
<div class="row">
    <div class="col-md-12 px-4">
        <a href="{{ route('createPost') }}" title="Click to Add Post" class="mr-3 pull-right btn btn-sm bg-3AC574 text-white m-2 add_service"
    style="float: right;">Add Blog Post</a>
    </div>
</div>


<ul class="nav nav-tabs mb-3 ml-4 mr-4">

    <li class="nav-item">
        <a class="nav-link active cl-000000" data-toggle="tab" href="#pending">Pending</a>
    </li>

    <li class="nav-item">
        <a class="nav-link cl-000000" data-toggle="tab" href="#approved">Approved</a>
    </li>

    <li class="nav-item">
        <a class="nav-link cl-000000" data-toggle="tab" href="#adminPosts">Admin Posts</a>
    </li>

</ul>
@php date_default_timezone_set(getCurrentUserTimeZone()); @endphp

<div class="tab-content">
    <div class="tab-pane active container tabPaneOne" id="pending">
        <div class="table-responsive ServiceTableData pl-3 pr-0 w-100 mb-3" id="ServiceTableData">
            <table id="example1" class="table table-hover example1" style="width:100%;">
                <thead>
                    <tr class="text-uppercase">
                        <th class="wsnw">No #</th>
                        <th scope="col">Username</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($pendingPosts->count()>0)
                        @foreach($pendingPosts as $key=>$post)
                            <tr>
                                <td class="h5 m-0 va-middle">{{++$key}}</td>
                                <td class="va-middle">{{ $post->user->username }}</td>
                                <td class="va-middle">{{ $post->title }}</td>
                                <td class="va-middle"><img src="{{ asset($post->image) }}" width="100" height="100"></td>
                                <td class="va-middle">{{date('d/m/Y h:i a',strtotime($post->created_at))}}</td>
                                <td class="va-middle">
                                    <div class="d-flex">
                                        <a class="btn btn-info btn-sm ml-1" href="{{route('viewPost',$post->id)}}" title="View Blog Post">View</a>
                                        <button class=" btn btn-success border-0 btn-sm ml-1" title="Approve Blog Post" onclick="commonFunction(true,'{{ route('approveAdminPosts',$post->id) }}','{{ route('adminPosts') }}','post',{_token: '{{ csrf_token() }}'},'Are you sure you want to approve?')">Approve</button>
                                        <button class="btn btn-danger btn-sm ml-1" title="Delete Blog Post" onclick="commonFunction(true,'{{ route('deleteAdminPosts',$post->id) }}','{{ route('adminPosts') }}','post',{_token: '{{ csrf_token() }}',_method:'delete'},'Are you sure you want to delete?')">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    
        
                </tbody>
            </table>
        </div>
    </div>

    <div class="tab-pane container tabPaneOne" id="approved">
        <div class="table-responsive ServiceTableData pl-3 pr-0 mb-3" id="ServiceTableData">
            <table id="example1" class="table table-hover example1" style="width:100%;">
                <thead>
                    <tr class="text-uppercase">
                        <th class="wsnw">No #</th>
                        <th scope="col">Username</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($approvedPosts->count()>0)
                        @foreach($approvedPosts as $key=>$post)
                            <tr>
                                <td class="h5 m-0 va-middle">{{++$key}}</td>
                                <td class="va-middle">{{ $post->user->username }}</td>
                                <td class="va-middle">{{ $post->title }}</td>
                                <td class="va-middle"><img src="{{ asset($post->image) }}" width="100" height="100"></td>
                                <td class="va-middle">{{date('d/m/Y h:i a',strtotime($post->created_at))}}</td>
                                <td class="va-middle">
                                    <div class="d-flex">
                                        <a class="btn btn-info btn-sm ml-1" href="{{route('viewPost',$post->id)}}" title="View Blog Post">View</a>
                                        <button class=" btn btn-success border-0 btn-sm ml-1" title="Disapprove Blog Post" onclick="commonFunction(true,'{{ route('disapproveAdminPosts',$post->id) }}','{{ route('adminPosts') }}','post',{_token: '{{ csrf_token() }}'},'Are you sure you want to disapprove?')">Disapprove</button>
                                        <button class="btn btn-danger btn-sm ml-1" title="Delete Blog Post" onclick="commonFunction(true,'{{ route('deleteAdminPosts',$post->id) }}','{{ route('adminPosts') }}','post',{_token: '{{ csrf_token() }}',_method:'delete'},'Are you sure you want to delete?')">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="tab-pane container tabPaneOne" id="adminPosts">
        <div class="table-responsive ServiceTableData pl-3 pr-0 mb-3" id="ServiceTableData">
            <table id="example1" class="table table-hover example1" style="width:100%;">
                <thead>
                    <tr class="text-uppercase">
                        <th class="wsnw">No #</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        {{-- <th scope="col">Summary</th> --}}
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($adminPosts->count()>0)
                        @foreach($adminPosts as $key=>$post)
                            <tr>
                                <td class="h5 m-0 va-middle">{{++$key}}</td>
                                <td class="va-middle">{{ $post->title }}</td>
                                <td class="va-middle"><img src="{{ asset($post->image) }}" width="100" height="100"></td>
                                {{-- <td class="va-middle">{{Str::limit($post->summery, 50,'...')}}</td> --}}
                                <td class="va-middle">
                                    <div class="d-flex">
                                        <a class="btn btn-info btn-sm ml-1" href="{{route('viewPost',$post->id)}}" title="View Blog Post">View</a>
                                        <a class="btn btn-success btn-sm ml-1" href="{{route('editPost',$post->id)}}" title="Edit Blog Post">Edit</a>
                                        <button class="btn btn-danger btn-sm ml-1" title="Delete Blog Post" onclick="commonFunction(true,'{{ route('deleteAdminPosts',$post->id) }}','{{ route('adminPosts') }}','post',{_token: '{{ csrf_token() }}',_method:'delete'},'Are you sure you want to delete?')">Delete</button>
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
{{-- footer section start --}} @section('extra-script')

@endsection {{-- footer section end --}}