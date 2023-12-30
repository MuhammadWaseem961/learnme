@extends('layouts.frontend.setting') @section('title','Services') {{-- head start --}} @section('extra-css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/dashboard.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/login_register_common.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

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


<p class="border-bottom pl-3 f-21 cl-616161">Posts</p>
<!-- <button title="Click to Add Service" data-toggle="modal" data-target="#addServiceModal"
    class="btn btn-sm bg-3AC574 text-white m-2 add_service" style="float: right;">Add Posts</button> -->
<div class="px-3 py-3">
<form>
  <div class="form-group mb-1">
    <label for="exampleInputEmail1">Titles</label>
    <input type="email" class="form-control" id="Titles" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted invisible">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group mb-1">
    <label for="exampleInputPassword1">Summary</label>
    <textarea class="form-control border" id="exampleFormControlTextarea1" rows="3"></textarea>
    <small id="emailHelp" class="form-text text-muted invisible">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group mb-1">
    <label for="exampleInputPassword1">Description</label>
    <textarea class="form-control border" id="description" rows="3"></textarea>
    <small id="emailHelp" class="form-text text-muted invisible">We'll never share your email with anyone else.</small>
  </div>
 
  <div class="text-right">
  <button type="submit" class="btn bg-3AC574 px-5 text-white">Save</button>
  </div>
</form>
</div>
<!-- Modal For Deleting Service-->
<div class="modal fade deleteServiceModal" id="deleteServiceModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabelServicedelete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelServicedelete" style="font-size: 18px !important;">
                    Delete Confirmation !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure, you want to delete this Service?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-md btn-danger" data-dismiss="modal">No, Cancel</button>
                <button type="button" class="btn btn-md btn-primary deleteServiceBtn" id="deleteServiceBtn"
                    data-dismiss="modal">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>

@endsection
{{-- footer section start --}} @section('extra-script')


<script>
    CKEDITOR.replace('description');
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

function getCategoryTitle(sel, inpt) {
    $('#' + inpt).val($('#' + sel + ' option:selected').text());
}

if (window.location.href == "{{ url('services') }}?add_new") {
    $('.add_service').click()
}

function getSubCategoriesForServices(ele) {
    let id = $(ele).val();
    $.ajax({
        url: "{{ url('sub_categories') }}",
        type: "get",
        data: {
            id: id
        },
        success: function(data) {
            $(".sub_categories").empty();
            $(".sub_categories").html(data);
        },
    });
}
</script>
@endsection {{-- footer section end --}}