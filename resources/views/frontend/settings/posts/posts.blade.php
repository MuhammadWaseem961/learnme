@extends('layouts.frontend.setting') @section('title','Posts') {{-- head start --}} @section('extra-css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/dashboard.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/login_register_common.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
{{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
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


<p class="border-bottom pl-3 f-21 cl-616161">My Blog Posts</p>
<a href="{{ route('posts.create') }}" title="Click to Add Post" class="mr-3 btn btn-sm bg-3AC574 text-white m-2 add_service"
    style="float: right;">Add Blog Post</a>
<div class="table-responsive ServiceTableData px-3 mb-3" id="ServiceTableData">
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
            @if($posts->count()>0)
                @foreach($posts as $key=>$post)
                    <tr>
                        <td class="h5 m-0 va-middle">{{++$key}}</td>
                        <td class="va-middle">{{ $post->title }}</td>
                        <td class="va-middle"><img src="{{ asset($post->image) }}" width="100" height="100"></td>
                        {{-- <td class="va-middle">{{Str::limit($post->desciption, 50,'...')}}</td> --}}
                        <td class="va-middle">
                            <div class="d-flex">
                                <a class="btn btn-info btn-sm ml-1" href="{{route('posts.show',$post->id)}}" title="View Blog Post">View</a>
                                <a class="btn btn-success btn-sm ml-1" href="{{route('posts.edit',$post->id)}}" title="Edit Blog Post">Edit</a>
                                <button class="btn btn-danger btn-sm ml-1" title="Delete Blog Post" onclick="deleteResource('{{ route('posts.destroy',$post->id) }}','{{ route('posts.index') }}')">Delete</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            

        </tbody>
    </table>
</div>

@endsection
{{-- footer section start --}} 
@section('extra-script')


@endsection {{-- footer section end --}}