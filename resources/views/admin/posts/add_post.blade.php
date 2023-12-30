@extends('layouts.admin.admin') @section('title','Add Post') {{-- head start --}} @section('extra-css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/dashboard.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/login_register_common.css') }}" />
{{-- <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script> --}}
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

@section('navbar')
    <section class="px-5 pt-2 pb-2 nav-bg-img robotoRegular">@include('includes.frontend.admin_navbar')</section>
@endsection
@section('content')


    <p class="border-bottom pl-3 f-21 cl-616161">Add Post</p>

    <div class="px-3 py-3">
        <form method="POST" enctype="multipart/form-data" id="create-form">
            <input type="hidden" name="add_by" value="admin">
            <input type="hidden" name="status" value="1">
            <div class="form-group mb-1">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" name="title" id="Titles" aria-describedby="emailHelp">
            </div>
            {{-- <div class="form-group mb-1">
                <label for="exampleInputPassword1">Summary</label>
                <textarea class="form-control border" name="summery" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div> --}}
            <div class="form-group mb-1">
                <label for="exampleInputPassword1">Description</label>
                <textarea class="form-control border tinymce-editor" id="description" rows="3"></textarea>
            </div>

            <div class="form-group mb-3">
                <label for="exampleInputPassword1">Image</label>
                <div class="input-group">
                <div class="custom-file">
                    <input type="hidden" id="uploaded-file" name="image" value="">
                    <input type="file" class="form-control-file" id="upload-file" accept=".jpg,.jpeg,.png,.gif">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="progress d-none">
                    <div class="progress-bar progress-bar-success myprogress" role="progressbar" style="width:0%">0%</div>
                </div>
                <div class="msg"></div>
            </div>

            <div class="text-right">
                <button type="button" class="btn bg-3AC574 px-5 text-white submit disabled" onclick="create_resource();">Submit</button>
            </div>
        </form>
    </div>

@endsection
{{-- footer section start --}} @section('extra-script')


<script>

    var upload = document.querySelector("#upload-file");
    upload.onchange = function()
    {
            var url = URL.createObjectURL(this.files[0]);
            var img = new Image();
            img.src = url;
            img.onload = function()
            {
                if(this.width <790 || this.height<425){
                    swal("warning", "Image width or height is to small (790x425) ", "warning");
                    upload.value="";
                }else{
                    uploadFile($('#upload-file'));
                }
            }
            img.remove();
    }

    // CKEDITOR.replace('description');
    function create_resource() {
        var myform = document.getElementById("create-form");
        var fd = new FormData(myform);
        fd.append("_token", "{{ csrf_token() }}");
        fd.append('description',tinymce.get('description').getContent());
        $.ajax({
            url: "{{ route('storePost') }}",
            type: "post",
            processData: false,
            contentType: false,
            data: fd,
            success: function(data) {
                if (data.success == true) {
                    swal("success", data.message, "success").then((value) => {

                        window.location = "{{ route('adminPosts') }}";
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
                    }
                }
            },
        });
    }

</script>
@endsection {{-- footer section end --}}