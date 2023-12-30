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


<p class="border-bottom pl-3 f-21 cl-616161">My Event Tickets</p>
<div class="table-responsive ServiceTableData px-3" id="ServiceTableData">
    <table id="example1" class="table table-hover example1" style="width:100%;">
        <thead>
            <tr class="text-uppercase">
                <th class="wsnw">No #</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            @if($tickets->count()>0)
                @foreach($tickets as $key=>$ticket)
                    <tr>
                        <td class="h5 m-0 va-middle">{{++$key}}</td>
                        <td class="va-middle">{{ $ticket->user->username }}</td>
                        <td class="va-middle">{{ $ticket->user->email }}</td>
                    </tr>
                @endforeach
            @endif
            

        </tbody>
    </table>
</div>

@endsection
{{-- footer section start --}} @section('extra-script')


<script>
function addService() {
    var myform = document.getElementById("addService");
    var fd = new FormData(myform);
    fd.append("_token", "{{ csrf_token() }}");
    $.ajax({
        url: "{{ route('services.store') }}",
        type: "post",
        processData: false,
        contentType: false,
        data: fd,
        success: function(data) {
            if (data.success == true) {
                swal("success", data.message, "success").then((value) => {
                    $(".close");
                    window.location = '{{ route("services.index") }}';
                });
            } else {
                if (data.hasOwnProperty("message")) {
                    var wrapper = document.createElement("div");
                    var err = "";
                    $.each(data.message, function(i, e) {
                        err += "<p>" + e + "</p>";
                    });

                    wrapper.innerHTML = err;
                    swal({
                        icon: "error",
                        text: "{{ __('Please fix following error!') }}",
                        content: wrapper,
                        type: "error",
                    });
                    //setTimeout("pageRedirect()", 3000);
                    //$('.actions  li:first-child a').click();
                }
            }
        },
    });
}

function delete_resource(target_url,return_url){
    swal({
        text: 'Are you sure you want to delete?',
        icon: "warning",
        buttons: {
            cancel: "Cancel",
            confirm: "OK"
            },
    }).then((willDelete) => {
        if (willDelete)
        { 
            $.ajax({
                type: 'post',
                url: target_url,
                data: {
                    _token: '{{ csrf_token() }}',
                    _method:"delete"
                },
                success: function(data) {
                    swal("success", data.message, "success").then((value) => {
                        window.location = return_url;
                    });  
                }
            });
        } 
    });
}
</script>
@endsection {{-- footer section end --}}