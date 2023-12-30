@extends('layouts.frontend.setting') @section('title','Edit Post') {{-- head start --}} @section('extra-css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/dashboard.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/login_register_common.css') }}" />
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
{{-- <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
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
.cke_editable {
    font-size: 16px !important;
}
</style>
@endsection {{-- head end --}} {{-- content section start --}}
@section('navbar')

<section class="px-5 pt-2 pb-2 nav-bg-img robotoRegular">@include('includes.frontend.navbar')</section>
@include('includes.frontend.navigations')
@endsection
@section('content')


    <p class="border-bottom pl-3 f-21 cl-616161">Edit Post</p>

    <div class="px-3 py-3">
        <form method="POST" enctype="multipart/form-data" id="edit-form">
            @csrf
            @method('put')
            <div class="form-group mb-1">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" name="title" id="Titles" aria-describedby="emailHelp" value="{{ $post->title }}">
            </div>
            {{-- <div class="form-group mb-1">
                <label for="exampleInputPassword1">Summary</label>
                <textarea class="form-control border" name="summery" id="exampleFormControlTextarea1" rows="3">{{ $post->summery }}</textarea>
            </div> --}}
            <div class="form-group mb-1">
                <label for="exampleInputPassword1">Description</label>
                <textarea class="form-control border f-18 tinymce-editor" id="description" rows="3">{{ $post->description }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="exampleInputPassword1">Image</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="hidden" id="uploaded-file" name="image" value="{{$post->image}}">
                        <input type="file" class="form-control-file" id="upload-file" accept=".jpg,.jpeg,.png,.gif">
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="progress d-none">
                        <div class="progress-bar progress-bar-success myprogress" role="progressbar" style="width:0%">0%</div>
                    </div>
                    <div class="msg"></div>
                </div>

                <img src="{{ asset($post->image) }}" id="previewImg" class="mt-2" style="width: 100px; height:100px;">
            </div>
            
        
            <div class="text-right">
                <button type="button" class="btn bg-3AC574 px-5 text-white" onclick="edit_resource({{$post->id}});">Update</button>
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
    function edit_resource(id) {
        $('.all-loader').removeClass('d-none');
        var myform = document.getElementById("edit-form");
        var fd = new FormData(myform);
        fd.append("_token", "{{ csrf_token() }}");
        fd.append('description',tinymce.get('description').getContent());
        var c_url = '{{ route("posts.update", ":id") }}';
        c_url = c_url.replace(':id',id);
        $.ajax({
            url: c_url,
            type: "post",
            processData: false,
            contentType: false,
            data: fd,
            success: function(data) {
                $('.all-loader').addClass('d-none');
                if (data.success == true) {
                    swal("success", data.message, "success").then((value) => {
                        window.location = "{{ route('posts.index') }}";
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