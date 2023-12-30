<link rel="stylesheet" href="{{ asset('assets/frontend/css/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/media-queries.css') }}">
<style>
    input[type='radio'].checked:after {
        width: 20px;
        height: 20px;
        border-radius: 15px;
        top: -4px;
        left: -1px;
        position: relative;
        background-color: #3AC574;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
        cursor: pointer;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light pl-0 pr-0 pt-2">
    <a class="navbar-brand w-90" href="{{ route('index') }}"><img src="{{ asset('assets/frontend/images/navlogo.png') }}"
            alt="navbar logo" class="img-fluid" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="navbar-nav ml-auto d-flex align-self-center align-items-center f-20">

        @guest
        <li class="nav-item  robotoRegular">
                <a class="nav-link cl-ffffff" href="{{ route('events') }}">Events <span class="sr-only">(current)</span></a>
            </li>
        <li class="nav-item">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <form class="form-inline my-2 my-lg-0 ml-auto cl-ffffff robotoRegular">
                    <a href="{{route('login')}}"
                        class="btn btn-outline-success border-0 my-2 my-sm-0 pt-2 pb-2 cl-ffffff  login_button"
                        type="submit">Log In</a>
                    <a href="{{route('register')}}"
                        class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-3ac574 mr-3 ml-3 login_button"
                        type="submit">Sign up</a>
                    {{-- <span>Business?</span> --}}
                </form>
            </div>
        </li>

        @else
    </ul>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- <div class="pt-2 pb-2 border-ffffff w-25 d-flex pl-3 pr-3 rounded mar_Sm-Auto w_75 m_sm-pt">
            <div class="w-100 cl-ffffff">
                <form action="{{ route('search') }}" method="get" id="search_form" onsubmit="return submit_function();">
                    @csrf
                    <input type="search" class="bg-transparent border-0 cl-ffffff w-100 robotoRegular "
                        onfocusout="search_function();" id="search" name="search"
                        placeholder="what are you looking for ?" value="@if(session('search')){{ session('search') }}@elseif(@$search){{ $search }}@endif">
                </form>
            </div>

            <div> <img src="{{ asset('assets/frontend/images/search2.png') }}" class="ml-auto" alt=""
                    class="img-fluid p-2 search-img" /></div>

        </div> -->
        <!-- <form class="form-inline d-flex my-lg-0 bg-transparent border rounded w-25">
                    <input class="form-control mr-sm-0 pr-0 w-100 robotoRegular bg-transparent text-white border-0 pt-2 pb-2" type="search"
                        value="what are you looking for ?" aria-label="Search" />
                    <img src="{{ asset('assets/frontend/images/search2.png') }}" class="ml-auto" alt=""
                        class="img-fluid p-2 search-img" />
                </form> -->
        <ul class="navbar-nav ml-auto d-flex justify-content-center align-items-center f-20 ">

            <li class="nav-item  robotoRegular">
                <a class="nav-link cl-ffffff" href="{{ route('events') }}">Events <span class="sr-only">(current)</span></a>
            </li>
            {{-- <li class="nav-item  p-0 robotoRegular pl-4 cl-ffffff">
                <a class="nav-link cl-ffffff" href="#">Appointments

                    <sup class="badge badge-success mt-1 ">{{ appointmentCount()['appointment_count'] }}</sup>
                </a>
            </li> --}}
            <li class="nav-item dropdown  pl-4 robotoRegular">
                <a class="nav-link cl-ffffff cl-ffffff" href="#" id="navbarDropdown" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="">Appointments

                    <sup class="badge badge-success mt-1 rounded-circle">{{ (appointmentCount()['appointment_count'] == 0 )? '':appointmentCount()['appointment_count'] }}</sup>
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="navbarDropdown">
                    @foreach (appointmentCount()['appointments'] as $appointment)
                        
                    <a class="dropdown-item d-flex row m-0 pt-2" href="{{ url('appointments') }}">
                        <div class="col-md-2 p-0">
                            <img src="{{ asset(Auth::user()->type=='seller' ? $appointment->user->picture : $appointment->specialist->picture ) }}"
                                alt="" class="img-fluid rounded-circle w-40 h-40" />
                                <span class="green-dot ml--1 mt-1"></span>
                        </div>
                        <div class="col-md-6 pl-2 pt-1 p-0">
                            <div class="row m-0">
                                <div class="dropdown-heading"style="max-width:200px !important;white-space: normal;">{{Auth::user()->type=='seller' ? $appointment->user->username : $appointment->specialist->username }}</div>
                            </div>
                            <div class="row m-0">
                                <div class="dropdown-contnt"style="max-width:200px !important;white-space: normal;">
                                    {{ $appointment->service_name }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 p-0">
                            <div class="row m-0 justify-content-end mt-1">
                                <span class="   ">${{ $appointment->service_cost }}</span>
                            </div>
                            {{-- <div class="row m-0 justify-content-end mt-2">
                                <span class="dropdown-contnt">{{ $appointment->service_time }}</span>
                            </div> --}}
                        </div>
                    </a>
                    @endforeach
                        
                    
                    <div class="dropdown-footer mt-5">
                        <div class="bg-3ac574 row m-0 pt-2 pb-3">
                           
                            <div class="col-md-12 p-0 pr-3  text-right">
                            <a href="{{ url('appointments') }}" class="text-white">
                                <h6>
                                    See all in appointments
                                </h6>
                            </a>
                            </div>
                        </div>
                    </div>

                </div>
            </li>
            <li class="nav-item dropdown my-nav-item  pl-4 robotoRegular">
                <a class="nav-link cl-ffffff cl-ffffff messageDropdown" href="#" id="navbarMessageDropdown" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="">
                    Messages
                    <span class="mt-1 ml-2"></span>
                </a>
                <div class="dropdown-menu p-0 my-dropdown-menu" aria-labelledby="navbarDropdown">
                    <nav>
                        <div class="nav nav-tabs row m-0" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link col-md-6 text-center my-notifications" id="nav-profile-tab" data-toggle="tab"
                                href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                                Notifications</a>
                            <a class="nav-item nav-link active col-md-6 text-center show my-inbox" id="nav-home-tab" data-toggle="tab"
                                href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Inbox</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            
                        </div>
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="dropdown-footer mt-5 " id="index-nav-home">
                                <div class="bg-3ac574 row m-0 pt-2 pb-3">
                                   <div class="col-md-6 d-flex p-0 pl-4">
                                        <div><i class="fa fa-cog text-white" aria-hidden="true"></i></div>
                                        <div><i class="fa fa-volume-up text-white pl-2" aria-hidden="true"></i></div>
                                   </div>
                                    <div class="col-md-6 p-0 pr-3 text-white text-right">
                                        <a href="{{ route('chat.index') }}" style="color: #ffffff;"><h6>See all in inbox</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="dropdown-footer mt-5">
                            <div class="bg-3ac574 row m-0 pt-2 pb-3">
                                <div class="col-md-6 d-flex p-0 pl-4">
                                    <div><i class="fa fa-cog text-white" aria-hidden="true"></i></div>
                                    <div><i class="fa fa-volume-up text-white pl-2" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="col-md-6 p-0 pr-3 text-white text-right">
                                    <a href="{{ route('chat.index') }}" style="color: #ffffff;"><h6>See all in inbox</h6></a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </li>
            <li class="nav-item  robotoRegular pl-4 cl-ffffff">
                @if (Auth::user()->type == 'seller')
                    <a class="nav-link cl-ffffff" href="{{  url('services')}}?add_new">Add Service</a>
                @elseif(Auth::user()->type == 'buyer')
                    <a class="nav-link cl-ffffff" href="{{ route('client.index')}}#post_job">Post a Request</a>
                @endif
            </li>
            <li class="nav-item  pl-4">
                <a class="nav-img" data-toggle="dropdown" href="#">
                    @if (Auth::user()->picture != null)
                    <img src="{{ asset(Auth::user()->picture) }}" onerror="this.error=null; this.src='{{asset('uploadfiles/userphoto/default.jpg')}}'" class="img-fluid rounded-circle w-40 h-40"
                        alt="profile"  width="40" height="40" />
                    @else

                    <img src="{{ asset('uploadfiles/userphoto/default.jpg') }}"
                        class="img-fluid w-40 h-40" alt="profile" width="40" height="40"/>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    @if (Auth::user()->type == 'buyer')
                    <a href="{{ route('client.index') }}" class="dropdown-item">Dashboard</a>

                    @endif
                    @if (Auth::user()->type == 'seller')
                    <a href="{{ route('specialist.index') }}" class="dropdown-item">Dashboard</a>

                    @endif
                    @if (Auth::user()->type == 'admin')
                    <a href="{{ url('/dashboard/profile') }}" class="dropdown-item">Setting</a>

                    @endif
                    @if (Auth::user()->type != 'admin')
                    <a href="{{ route('profile.index') }}" class="dropdown-item">Profile</a>

                    @endif
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>




            </li>
                <input type="hidden" id="single-event-id">
                <input type="hidden" id="single-event-channel-name">
                <script src="{{ asset('assets/frontend/js/video-js/jquery.min.js') }}"></script>
                <script src="{{ asset('assets/frontend/js/video-js/materialize.min.js') }}"></script>
                <script src="{{ asset('assets/frontend/js/agora/agora-rtc-sdk.js') }}"></script>
                <script src="{{ asset('assets/frontend/js/agora/custom.js') }}"></script>
                <script>
                    $(document).ready(function(){
                        setInterval(function(){ 
                            var username = $('.video-chat').data('caller');
                            $.ajax({
                                type: 'get',
                                url: '{{ url("call-checker") }}',
                                data: { name: username },
                                success: function(data) {
                                    if(data.status == 'pending' && data.caller !='{{Auth::user()->username}}' && data.call_to == '{{Auth::user()->username}}'  ){
                                        $('.calling-div').removeClass('d-none');
                                        $('.incoming-call').html('Incoming call from '+data.caller[0].toUpperCase()+data.caller.slice(1));
                                        $('.accpet_call').attr('data-sender',data.sender);
                                        $('.accpet_call').attr('data-reciever',data.reciever);
                                        $('.accpet_call').attr('data-booking-id',data.booking_id);
                                        $('.accpet_call').attr('data-caller',data.caller);
                                        $('#sender').val(data.sender);
                                        $('#sender_reciever').val(data.sender+"_"+data.reciever);
                                        $('#reciever_sender').val(data.reciever+"_"+data.sender);
                                        $('#reciever').val(data.reciever);
                                        $('#username').val(data.caller);
                                        $('#review_item_id').val(data.booking_id);
                                        $('#booking_id').val(data.booking_id);
                                        if(data.check == 'true'){play();}else if(data.check == 'false'){endCall();}
                                    }
                                    else if(data.status == 'success'){
                                        $('#review_item_id').val(data.booking_id);
                                        $('#booking_id').val(data.booking_id);
                                        if(data.caller =='{{Auth::user()->username}}' && data.call_to != '{{Auth::user()->username}}'){
                                            $('.video-title').text(data.call_to+" has been joined you");
                                        }else if(data.caller !='{{Auth::user()->username}}' && data.call_to == '{{Auth::user()->username}}'){
                                            $('.video-title').text(data.caller+" has been joined you");
                                        }
                                    }
                                    else{
                                        @if(Auth::user()->type=='seller')
                                            $('.video-title').text('Call has been either ended or rejected');
                                        @else
                                            $('.video-title').text('Call has been either ended or rejected');
                                            // $('.end-call').click();
                                        @endif
                                        
                                    }
                                }
                            })

                            $.ajax({
                                type: 'get',
                                url: '{{ url("call-event-checker") }}',
                                data: { name: "{{Auth::user()->username}}" },
                                success: function(data) {
                                    if(data.status == 'pending'){
                                        $('.event-calling-div').removeClass('d-none');
                                        $('#makeSellerEventCallDiv').attr('data-event-id',data.eventID);
                                        if(data.check == 'true'){play();}else if(data.check == 'false'){endCall();}
                                    }
                                }
                            })
                        }, 5000);
                    });

                    function endCall(){
                        play(true);
                        $('#leave').click();
                        $('.end-call-check').click();
                        var username = $('.video-chat').data('caller');
                        $.ajax({
                            type: 'post',
                            url: '{{ url("call-end") }}',
                            data: {_token:'{{ csrf_token() }}', name: username },
                            success: function(data) {
                                $('#video-call-modal').modal('hide');
                                $('.calling-div').addClass('d-none');
                                
                            }
                        })
                    }

                    function makeEventCall(id){
                        $('#single-event-id').val(id);
                        $('.all-loader').removeClass('d-none');
                        $.ajax({
                            type: 'get',
                            url: '{{ url("createEventCallToken") }}',
                            data: {id:id},
                            success: function(data) {
                                let video_model_header = `<div><div class="parent"><img onerror='this.onerror=null;this.src="{{ asset("uploadfiles/userphoto/default.jpg") }}"' src="${JSON.parse(data).picture}" class="rounded-circle img-fluid smallProfile" alt="" srcset=""></div></div><div class="pl-2"><div>${JSON.parse(data).username[0].toUpperCase() + JSON.parse(data).username.slice(1)}</div></div>`;
                                $('.video-model-header').html(video_model_header);
                                $('#token').val(JSON.parse(data).token);
                                $('#role').val(JSON.parse(data).role);
                                $(".checkClass").attr('data-check',true);
                                $(".checkClass").attr('data-type','event');
                                $(".checkClass").attr('data-name',JSON.parse(data).channel);
                                $('#channelName').val(JSON.parse(data).channel);
                                $('#join').click();
                                $('#video-call-modal').modal('show');
                                $('.all-loader').addClass('d-none');
                                $('.event-calling-div').addClass('d-none');

                            }
                        });
                    }

                    function makeSellerEventCall(elem){
                        $('.all-loader').removeClass('d-none');
                        $('.end-event-call').show();
                        $('.video-stream-div').hide();
                        $('.video-title').hide();
                        $('.again-call').hide();
                        $('.end-call').hide();
                        $('.video-div').hide();
                        $('.chat-div').css('width','100%');
                        $.ajax({
                            type: 'get',
                            url: '{{ route("createEventCallToken") }}',
                            data: { id:$(elem).data('event-id')},
                            success: function(data) {
                                var video_model_header = `<div><div class="parent"><img onerror='this.onerror=null;this.src="{{ asset("uploadfiles/userphoto/default.jpg") }}"' src="${JSON.parse(data).picture}" class="rounded-circle img-fluid smallProfile" alt="" srcset=""></div></div><div class="pl-2"><div>${JSON.parse(data).username[0].toUpperCase() + JSON.parse(data).username.slice(1)}</div></div>`;
                                $('.video-model-header').html(video_model_header);
                                $('#token').val(JSON.parse(data).token);
                                $('#role').val(JSON.parse(data).role);
                                $(".checkClass").attr('data-check',true);
                                $(".checkClass").attr('data-type','event');
                                $(".checkClass").attr('data-name',JSON.parse(data).channel);
                                $('#channelName').val(JSON.parse(data).channel);
                                $('#join').click();
                                $('.event-calling-div').addClass('d-none');
                                $('#video-call-modal').modal('show');
                                $('.all-loader').addClass('d-none');
                                $('.end-event-call').attr('data-id',$(elem).data('event-id'));
                                $('#single-event-channel-name').val(JSON.parse(data).name);
                                $('.messag-log').hide();
                                $('.event-messag-log').show();
                                $('.send-msg').hide();
                                $('.send-event-msg').show();
                                firebase.database().ref('event').child(JSON.parse(data).name).on('value',(snapshot) => {
                                    chat_element = '';
                                    if(snapshot.exists()){
                                        $.each(snapshot.val(),function(){
                                            var mt = "mt-0";
                                            // moment(this.time).tz('{{ Auth::user()->timezone }}').format('M-D-Y h:mmA')
                                            chat_element +='<div class="d-flex mt-4">';
                                                chat_element +='<div class="col-lg-1 p-0"><div class="parent"><img onerror="this.onerror=null;this.src='+defaultUserPicture+'" src="'+this.photo+'" class="rounded-circle img-fluid smallProfile" alt="" srcset=""></div></div>';
                                                chat_element +='<div class="col-lg-11 pl-3">';
                                                    chat_element +='<div>'+this.name[0].toUpperCase() + this.name.slice(1)+'<span class="f-12 pl-2">'+moment(this.time,"x").tz('{{ Auth::user()->timezone }}').format('M-D-Y h:mm a')+'</span></div> ';
                                                    
                                                    if(this.message && this.message !='' && this.message!='undefined')
                                                    {
                                                        mt="";
                                                        chat_element += '<div class="cl-a8a8a8 f-12 chat-content-area">';
                                                            chat_element += this.message;
                                                        chat_element += '</div>';
                                                    }

                                                    if (this.file_type=='pdf' && this.other_file !='')
                                                    {
                                                        chat_element += '<div class="d-flex justify-content-left mb-2"><a href="'+this.other_file+'" download="download" style="position: relative;left: 3px;color:#5d616d;"><div class="d-flex flex-column"><i class="fa fa-file-word-o" aria-hidden="true" style="position: relative; top: 13px; font-size: 15px; left: 4px;">&nbsp;'+this.file_name+'</i></div></a>';
                                                        chat_element +='</div>';
                                                    }
                                                    else if ((this.file_type=='docx' || this.file_type=='doc') && this.other_file !='')
                                                    {
                                                        chat_element += '<div class="d-flex justify-content-left mb-2"><a href="'+this.other_file+'" download="download" style="position: relative;color:#5d616d;"><div class="d-flex flex-column"><i class="fa fa-file-word-o" aria-hidden="true" style="position: relative; top: 13px; font-size: 15px; left: 4px;">&nbsp;'+this.file_name+'</i></div></a>';
                                                        chat_element +='</div>';
                                                    }
                                                    else if (((this.file_type!='docx' || this.file_type!='doc' || this.file_type!='pdf') || this.file_type=='') && this.image !='')
                                                    {
                                                        chat_element += '<div class="d-flex justify-content-left mb-2"><a href="'+this.file_link+'" download="download" style="position: relative;left: 17px;"><i class="fa fa-download" aria-hidden="true"></i></a>';
                                                        chat_element +='<img src="' + this.image + '" onclick="imagePopUp(this);" style="height:100px;width:100px;cursor:pointer;"/></div>';
                                                    }
                                                    chat_element +='</div>';
                                                chat_element +='</div>';
                                            chat_element +='</div>';
                                        });
                                    }
                                    $(".event-messag-log").html(chat_element);
                                    scroll_bottom(".event-messag-log");
                                });
                            }
                        });
                    }

                    function endEventCall(elem){
                        play(true);
                        $.ajax({
                            type: 'get',
                            url: '{{ route("endEventCall") }}',
                            data: { id:$(elem).data('id')},
                            success: function(data) {
                                $('#leave').click();
                                $('#video-call-modal').modal('hide');
                            }
                        });

                        // swal({
                        //     text: 'Are you sure you want to end event?',
                        //     icon: "warning",
                        //     buttons: {
                        //         cancel: "Cancel",
                        //         confirm: "OK"
                        //         },
                        // }).then((willDelete) => {
                        //     if (willDelete)
                        //     {
                        //         $.ajax({
                        //             type: 'get',
                        //             url: '{{ route("endEventCall") }}',
                        //             data: { id:$(elem).data('id')},
                        //             success: function(data) {
                        //                 $('#leave').click();
                        //                 // $('#video-call-modal').removeClass('show'); 
                        //                 // $('#video-call-modal').hide();
                        //             }
                        //         });
                        //     } 
                        // });
                    }

                    function fullScreen(elem){
                        var widthPer = ($(".video-stream-div").width()/$('.video-chat-div').width() * 100).toFixed();
                        if(widthPer==55){
                            $(".video-stream-div").css({'width':'100%'});
                            $(".chat-div").hide();
                            $(elem).text("Partial Screen");
                        }else{
                            $(elem).text("Full Screen");
                            $(".video-stream-div").css({'width':'55%'});
                            $(".chat-div").show();
                        }
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
                                    $('#previewImg').attr('src',data.path);
                                    $('.msg').text('Uploading complete');
                                    $('#uploaded-file').val(data.path);
                                }
                            }
                        });
                    }

                    // get call end update
                    setInterval(function(){
                        if(typeof $('.accpet_call').data('booking-id')!='undefined' && $('.accpet_call').data('booking-id')!=''){
                            $('.end-client-call').removeClass('d-none');
                            $('.end-message-call').addClass('d-none');
                        }
                        else if($('.accpet_call').data('booking-id')==''){
                            $('.end-client-call').addClass('d-none');
                            $('.end-message-call').removeClass('d-none');
                        }

                        $.ajax({
                            type: 'get',
                            url: '{{ route("getCallEndUpdate") }}',
                            data: {type:$('.checkClass').attr('data-type'),name:$('.checkClass').attr('data-name')},
                            success: function(data) {
                                if(!data.status){
                                    if($('.checkClass').attr('data-check')){
                                        if($('#video-call-modal').hasClass('show')){
                                            $('#leave').click();
                                            $(".end-call-check").click();
                                            $('#video-call-modal').modal('hide');
                                        }
                                    } 
                                }
                            }
                        });

                    },3000);

                    // play a tone when call comes
                    function play(isPlaying=false) {
                        // var beepsound = new Audio('{{asset("assets/audio/fb_messenger_tone.mp3")}}');
                        // beepsound.play();
                        var myAudio = document.getElementById("playMusic");
                        isPlaying ? myAudio.pause() : myAudio.play();  
                    }

                    // create and update resource function
                    function createUpdateResource(targetUrl,returnUrl,method,formID) {
                        $('.all-loader').removeClass('d-none');
                        var myform = document.getElementById(formID);
                        var fd = new FormData(myform);
                        fd.append("_token", "{{ csrf_token() }}");
                        $.ajax({
                            url: targetUrl,
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
                                            window.location = returnUrl;
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

                    // delete resource function
                    function deleteResource(targetUrl,returnUrl){
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
                                    url: targetUrl,
                                    data: {
                                        _token: '{{ csrf_token() }}',
                                        _method:"delete"
                                    },
                                    success: function(data) {
                                        swal("success", data.message, "success").then((value) => {
                                            window.location = returnUrl;
                                        });  
                                    }
                                });
                            } 
                        });
                    }
                </script>

            @endguest
        </ul>
    </div>
</nav>

<audio id="playMusic" class="d-none" controls><source src='{{asset("assets/audio/fb_messenger_tone.mp3")}}' type="audio/mp3"></audio>
<div class="modal fade" tabindex="-1" role="dialog" id="review_modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title ml-4">Add Review</h5>
                <button type="button" class="close mr-2 close review-modal-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align: start" >
                <form id="add-review-form">
                    <input type="hidden" name="review_from" value="appointments" />
                    <input type="hidden" name="review_item_id" id="review_item_id" value="" />
                    <div class="ml-4 input-group mb-1 pt-2">
                        <div class="w-100"><label>Rating</label></div>
                        <div class="w-100">
                            <fieldset class="rating">
                                <input type="radio" id="mystar1" name="rating" value="1" onchange="ratingChange(this)"/>
                                <label onclick="labelChange(this);" data-id="1" class="full" for="mystar1" title="Sucks big time - 1 star"></label>
                                <input type="radio" id="mystar2" name="rating" value="2" onchange="ratingChange(this)"/>
                                <label onclick="labelChange(this);" data-id="2" class="full" for="mystar2" title="Kinda bad - 2 stars"></label>
                                <input type="radio" id="mystar3" name="rating" value="3" onchange="ratingChange(this)"/>
                                <label onclick="labelChange(this);" data-id="3" class="full" for="mystar3" title="Meh - 3 stars"></label>
                                <input type="radio" id="mystar4" name="rating" value="4" onchange="ratingChange(this)"/>
                                <label onclick="labelChange(this);" data-id="4" class="full" for="mystar4" title="Pretty good - 4 stars"></label>
                                <input type="radio" id="mystar5" name="rating" value="5" onchange="ratingChange(this)"/>
                                <label onclick="labelChange(this);" data-id="5" class="full" for="mystar5" title="Awesome - 5 stars"></label>
                                
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-3 pt-3 ml-4 col-md-11">
                            <label class="mb-2">Review Detail</label>
                            <textarea type="text" class="w-100 form-control border" placeholder="Enter Message Body" name="review"></textarea>
                        </div>
                    </div>

                    <button type="button" class="btn btn-sm btn-success ml-4" onclick="add_review(this,'add-review-form');" data-id="">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function search_function() {
        var input = document.getElementById('search').value;
        if (input != '') {
            var form = document.getElementById("search_form");
            form.submit();
        }
    }

    function labelChange(elem) {
        let e = $(elem).data("id");
        console.log("#star" + e);
        $("#star" + e).attr("checked", true);
    }

    function ratingChange(elem) {
        $(elem).addClass("checked");
        $(elem).prevAll().addClass("checked");
        $(elem).nextAll().removeClass("checked");
        $(elem).nextAll().children("input").attr("checked", false);
        $("span.checked").each(function () {
            $(this).children("input").attr("checked", true);
        });
    }

    function add_review(e){
        let id = $(e).data("id");
        var myform = document.getElementById("add-review-form");
        var fd = new FormData(myform);
        fd.append("_token", "{{ csrf_token() }}");
        $.ajax({
            url: "{{ route('review.store') }}",
            type: "post",
            processData: false,
            contentType: false,
            data: fd,
            success: function (data) {
                if (data.success == true) {
                    swal("success", data.message, "success").then((value) => {
                        // $(".close" + id).click();
                        // $(".add-review-" + id).hide();
                        window.location='';
                    });
                } else {
                    if (data.hasOwnProperty("message")) {
                        var wrapper = document.createElement("div");
                        var err = "";
                        $.each(data.message, function (i, e) {
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

    document.body.addEventListener('click',function(evt){   

        if(evt.target.id == "nav-profile-tab" || evt.target.id == "nav-home-tab" || evt.target.id == "navbarMessageDropdown"){
            document.querySelector('.my-dropdown-menu').style.display='block';
        }else{
            if($('.my-dropdown-menu').length)
                document.querySelector('.my-dropdown-menu').style.display='none';
        }
    });


    function submit_function() {
        var input = document.forms["search_form"]["search"].value;
        if (input == "") {
            return false;
        }
    }

</script>
