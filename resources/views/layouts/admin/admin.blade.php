<!DOCTYPE html>
<html>

<head>
    @include('includes.frontend.admin-head') @yield('extra-css')
    <style>
        .tox-notifications-container{display:none!important;}
        .all-loader{
            position: fixed;
            width: 100%;
            z-index: +2222;
            height:100vh;
            background:white;
            display:flex;
            justify-content:center; 
            align-items:center;
        }
    </style>
</head>

<body>
    <div class="all-loader d-none"><img src="{{asset('assets/frontend/images/loader.gif')}}"></div>
    @yield('navbar')
   <section class="main_padding pt-70 px-50">
    <div class="row m-0 justify-content-center">
        <div class="col-md-3 col-lg-3 col-sm-12 p-0 box_shadow1 borderRadius-12px pt-4 pb-5">
            <p class="border-bottom text-center f-21 cl-616161">Your Profile</p>
            <div class="d-flex align-items-center flex-column">
                <div class="dashboard_id text-center">
                    <img id="blah" class="rounded-circle blah"
                        src="{{(Session::get('admin')->picture != null)? asset(Session::get('admin')->picture): asset('uploadfiles/userphoto/default.jpg') }}"
                        alt="" style="height: 118px; width: 118px;" onerror='this.onerror=null;this.src="{{ asset("uploadfiles/userphoto/default.jpg") }}"'/>
                    <form action="{{ route('dashboard.profile.picture.update',Session::get('admin')->id) }}" method="post" enctype="multipart/form-data"
                        id="avatar_form">
                        @csrf
                        @method('put')
                        <div class="form-group m-0">
                            <label class="btn img-lbl p-1 mb-0 position-relative" style="top: -34px; left: 43px;">
                                <img src="{{ asset('assets/frontend/images/camera.png') }}" alt="" srcset=""
                                    height="30" />
                                <input type="file" style="display: none;" name="avatar" class="avatar"
                                    onchange="readURL(this);" required accept="image/png, image/jpg, image/jpeg" />
                            </label>
                        </div>
                        {{-- <button class="btn btn-sm bg-3AC574 text-white">Upload Photo</button> --}}
                    </form>
                </div>
                <p class="m-0 f-27 robotoMedium cl-5757575 pt-3">{{ Session::get('admin')->username }}</p>
            </div>

            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link {{ Request::is('admin') ? 'active' : ''  }} cl-000000"  href="{{ url('/admin') }}" >Profile</a>
                <a class="nav-link {{ Request::is('admin/bookings') ? 'active' : ''  }} cl-000000"  href="{{ route('admin.bookings') }}" >Bookings</a>
                <a class="nav-link {{ Request::is('admin/disputes') ? 'active' : ''  }} cl-000000"  href="{{ url('/admin/disputes') }}" >Disputes</a>
                <a class="nav-link {{ Request::is('admin/categories') ? 'active' : ''  }} cl-000000"  href="{{ url('/admin/categories') }}" >Categories</a>
                <a class="nav-link {{ Request::is('admin/eventCategories') ? 'active' : ''  }} cl-000000"  href="{{ url('/admin/eventCategories') }}" >Event Categories</a>
                <a class="nav-link {{ Request::is('admin/users') ? 'active' : ''  }} cl-000000"  href="{{ url('/admin/users') }}" >Users</a>
                <a class="nav-link {{ Request::is('admin/posts') ? 'active' : ''  }} cl-000000"  href="{{ url('/admin/posts') }}" >Create a Blog Post</a>
                <a class="nav-link {{ Request::is('admin/client/postings') ? 'active' : ''  }} cl-000000"  href="{{ url('/admin/client/postings') }}" >Service Requests</a>
                <a class="nav-link cl-000000 {{ Request::is('admin/payments') ? 'active' : ''  }}" href="{{ url('/admin/payments') }}">Payment Requests</a>
                <a class="nav-link {{ Request::is('admin/fee') ? 'active' : ''  }} cl-000000"  href="{{ route('commission.fee') }}" >Commission Fee</a>
                <a class="nav-link cl-000000 {{ Request::is('dashboard/password/*') ? 'active' : ''  }}" href="{{ route('admin.password',encrypt(Session::get('admin')->id)) }}">Password</a>
            </div>
        </div>

        <div class="col-md-8 col-lg-8 col-sm-12 pt-4 p-0 ml-4 box_shadow1 borderRadius-12px">
            @yield('content') 
        </div>
    </div>

   


</section>

@include('includes.admin.footer')

<!-- T E N    S E C T I O N  E N D  -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.validate.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/app.js') }}"></script>
    <script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset('assets/admin/dist/js/custome.js') }}"></script>
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

    function commonFunction(confirmation=false,targetUrl,returnUrl='',method,data,msg=''){
        if(!confirmation){
            $.ajax({
                url: targetUrl,
                type: method,
                processData: false,
                contentType: false,
                data: data,
                success: function(data) {
                    if (data.success == true) {
                        swal("success", data.message, "success").then((value) => {
                            if(value){
                                $(".close");
                                window.location = returnUrl;
                            }
                        });
                    }
                }
            });
        }else if(confirmation){
            swal({
                text: msg,
                icon: "warning",
                buttons: {
                    cancel: "Cancel",
                    confirm: "OK"
                },
            }).then((willDelete) => {
                if (willDelete)
                { 
                    $.ajax({
                        type:method,
                        url: targetUrl,
                        data:data,
                        success: function(data) {
                            if(data.success=true){
                                swal("success", data.message, "success").then((value) => {
                                    window.location = returnUrl;
                                }); 
                            }
                             
                        }
                    });
                } 
            });
        }
        
    }

    function addUpdateResource(target_url,return_url,method,formID) {
        $('.all-loader').removeClass('d-none');
        var myform = document.getElementById(formID);
        var fd = new FormData(myform);
        fd.append("_token", "{{ csrf_token() }}");
        $.ajax({
            url: target_url,
            type: method,
            processData: false,
            contentType: false,
            data: fd,
            success: function(data) {
                $('.all-loader').addClass('d-none');
                if (data.success == true) {
                    swal("success", data.message, "success").then((value) => {
                        if(value){
                            $(".close");
                            window.location = return_url;
                        }
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

    function deleteResource(target_url,return_url){
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
                $('.all-loader').removeClass('d-none');
                $.ajax({
                    type: 'post',
                    url: target_url,
                    data: {_token: '{{ csrf_token() }}',_method:"delete"},
                    success: function(data) {
                        $('.all-loader').addClass('d-none');
                        swal("success", data.message, "success").then((value) => {
                            window.location = return_url;
                        });  
                    }
                });
            } 
        });
    }

    // upload file using ajax with progress bar 
    function uploadFile(id) {
        $('.myprogress').css('width', '0');
        $('.msg').text('');
        var formData = new FormData();
        formData.append('file', id[0].files[0]);
        formData.append('_token', '{{csrf_token()}}');
        $('.msg').text('Uploading in progress...');
        $.ajax({
            url: "{{route('uploadFile')}}",
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            // this part is progress bar
            xhr: function () {
                $('.progress').removeClass('d-none');
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        percentComplete = parseInt(percentComplete * 100);
                        $('.myprogress').text(percentComplete + '%');
                        $('.myprogress').css('width', percentComplete + '%');
                    }
                }, false);
                return xhr;
            },
            success: function (data) {
                if(data.status =true){
                    $('.submit').removeClass('disabled');
                    $('.progress-bar').css('background-color','#3ac574');
                    $('.progress').addClass('d-none');
                    $('#previewImg').attr('src',data.path);
                    $('.msg').text('');
                    $('#uploaded-file').val(data.path);
                }
            }
        });
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(".blah").attr("src", e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
            $("#avatar_form").submit();
        }
    }
    
    setInterval(function(){
        $.ajax({
            url:"{{ route('admin.user.dispute.notification') }}",
            type:"get",
            success:function(data){
                var html ='';
                // if(data.length>0){ $('.messageDropdown').children('span').addClass('green-dot'); }else{$('.messageDropdown').children('span').removeClass('green-dot');}
                data.map(v=>{
                    var element = document.getElementById("dispute"+v.id);
                    if(typeof(element) == 'object' && element == null){
                            html += '<a class="dropdown-item d-flex row m-0 pt-2"  id="dispute'+v.id+'" href="'+v.url+'">';
                            html+='<div class="col-md-2 p-0">';
                                html +='<img src="'+v.avatar+'" alt="miss" class="img-fluid">';
                            html+='</div>';
                            html+='<div class="col-md-9 pl-2 pt-1 p-0">';
                                html+='<div class="row m-0"><div class="dropdown-heading">'+v.username[0].toUpperCase() + v.username.slice(1)+'</div></div>';
                                html+='<div class="row m-0"><div class="dropdown-contnt">'+v.subject+'</div></div>';
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
            url:"{{ route('admin.dispute.reply.notification') }}",
            type:"get",
            success:function(data){
                var html ='';
                // if(data.length>0){ $('.messageDropdown').html('Messages <span class="mt-1 ml-2 green-dot"></span>'); }else{$('.messageDropdown').html('Messages <span class="mt-1 ml-2"></span>');}
                data.map(v=>{
                    var element = document.getElementById("dispute"+v.id);
                    if(typeof(element) == 'object' && element == null){
                        html += '<a class="dropdown-item d-flex row m-0 pt-2"  id="dispute'+v.id+'" href="'+v.url+'">';
                            html+='<div class="col-md-2 p-0">';
                                html +='<img src="'+v.avatar+'" alt="miss" class="img-fluid">';
                            html+='</div>';
                            html+='<div class="col-md-9 pl-2 pt-1 p-0">';
                                html+='<div class="row m-0"><div class="dropdown-heading">'+v.username[0].toUpperCase() + v.username.slice(1)+'</div></div>';
                                html+='<div class="row m-0"><div class="dropdown-contnt">'+v.subject+'</div></div>';
                            html+='</div>';
                        html+="</a>";
                    }
                });
                let oldHtml = $('#nav-profile').html();
                oldHtml+=html;
                $('#nav-profile').html(oldHtml);
            }
        });

    },1000);

</script>
        <script>
            $(function () {
                 $(".select2").select2();
                $(".example1")
                    .DataTable({
                        responsive: true,
                        lengthChange: false,
                        autoWidth: false,
                        "scrollX": true,
                    })
                    .buttons()
                    .container()
                    .appendTo(".dataTables_wrapper .col-md-6:eq(0)");
                
            });
        </script>
    @yield('extra-script')
</body>

</html>
