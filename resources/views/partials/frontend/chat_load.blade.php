<input type="hidden" id="sender" value="{{ Auth::user()->id }}">
<input type="hidden" id="reciever" value="{{ $id }}">
<input type="hidden" id="username" value="{{ $user->username }}">
<input type="hidden" id="sender_reciever" value="{{ Auth::user()->id.'_'.$id }}">
<input type="hidden" id="reciever_sender" value="{{ $id.'_'.Auth::user()->id }}">
<div class="row m-0 r-Main-P mt-5">
    <div class="col-md-3 ">
        <div class="bg-white pl-3 pr-3">
            <div class="pt-4 pb-4" style="min-height: 702px; max-height: 702px;">
                <div class="pr">
                    <img src="{{$user->picture !=''?asset($user->picture): asset('uploadfiles/userphoto/default.jpg')}}" onerror='this.onerror=null;this.src="{{ asset("uploadfiles/userphoto/default.jpg") }}"' class="rounded-circle img-fluid main-profile" alt="" srcset="">
                    <div class="small-Circle @if($user->last_login >time()) bg-success @else bg-grey @endif  user-staus-{{ $user->id }}"></div>
                </div>
                <div class="text-center f-22 cl-5757575">{{ ucwords($user->username) }}</div>
                <div class="cl-a8a8a8 f-17 text-center">{{ $user->type=='seller'? ucwords($user->serviceCategory->name) :'' }}</div>
                {{-- <div class="row m-0  pt-3 pb-3 border-bottom cl-a8a8a8">
                    <div class="col-md-6 col-md-6 p-0">
                    <div class="f-17">Reviews:</div>
                    </div>
                    <div class="col-md-6 col-md-6 p-0 text-end d-flex justify-content-end">
                    <div class="f-17 text-end">5.0 (21)</div>
                    </div>
                </div> --}}
                <div class="row m-0  pt-3 pb-3 border-bottom cl-a8a8a8">
                    <div class="col-md-6 col-md-6 p-0 ">
                    <div class="f-17">Location:</div>
                    </div>
                    <div class="col-md-6 col-md-6 p-0 text-end d-flex justify-content-end">
                    <div class="f-17 text-end">{{ ucwords($user->country) }}</div>
                    </div>
                </div>
                @if($user->type=='seller')
                    @if($user->languages !=null)
                        @if(json_decode($user->languages))
                            @foreach(json_decode($user->languages) as $lang)
                                <div class="row m-0  pt-3 pb-3 border-bottom cl-a8a8a8">
                                    <div class="col-md-6 col-md-6 p-0 ">
                                        <div class="f-17 text-end" >{{ $lang }}</div>
                                    </div>
                                    <div class="col-md-6 col-md-6 p-0 text-end d-flex justify-content-end">
                                        <div class="f-17 text-end">Primary</div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endif
                @endif
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-3 col-lg-3 col-xs-12 pl-0 pr-0">
        <div class="card" style="min-height: 702px; max-height: 702px;    ">
            <div class="card-header border-0">
                <div class="title border-0 userListCount"></div>
            </div>
            <div class="card-body pl-0 pr-0" style="overflow-y:scroll">
                <div class="d-flex">
                    <ul class="list-group userList" style="width:100%;">
                    </ul>
                </div>
            </div>
            <div class="card-footer border-0" ></div>
        </div>
        
    </div>
    <div class="col-sm-7 col-md-6 col-lg-6 col-xs-12 pl-0">
        <div class="card" style="min-height: 702px; max-height: 702px;">
            <div class="card-header">
                <div class="row m-0 align-items-center border-bottom pb-2">
                    <div class="col-md-7 col-lg-7 p-0"> 
                    <div class="d-flex">
                        <div>  <div class="parent"><img src="{{ $user->picture?asset($user->picture): asset('uploadfiles/userphoto/default.jpg') }}" onerror='this.onerror=null;this.src="{{ asset("uploadfiles/userphoto/default.jpg") }}"' class="rounded-circle img-fluid smallProfile" alt=""
                        srcset="">
                    <div class="parentCircle-Child @if($user->last_login >time()) bg-success @else bg-grey @endif user-staus-{{ $user->id }}" ></div>

                                    </div></div>
                        <div class="pl-2">
                            <div>
                                {{ ucwords($user->username) }} 
                                @if (Auth::user()->type == 'seller')
                                    <img src="{{ asset('assets/frontend/images/video-call-icon.png') }}" onclick="makeCall(this)" class=" img-fluid h-40 video-chat" id="video-chat" data-booking-id="" data-sender="{{ Auth::user()->id }}" data-reciever="{{ $user->id }}" data-toggle="modal" data-target="#video-call-modal" data-caller="{{$user->username}}">
                                @else
                                    <img src="{{ asset('assets/frontend/images/video-call-icon.png') }}" onclick="ClientMakeCall();" class=" img-fluid h-40 video-chat" id="client-video-chat" data-toggle="modal" data-target="#client-video-call-modal" data-caller="{{$user->username}}">
                                @endif
                            </div>
                            <div class="d-flex">
                                <div class="cl-a8a8a8 f-11 user-status">@if($user->last_login >time()) active @else Last seen {{ Carbon\Carbon::parse(intval($user->last_login))->diffForHumans() }} @endif</div>
                                <div class="border-right pl-1 pr-1"></div> <div class="cl-a8a8a8 f-11 ml-1" id="local_time"></div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-5 col-lg-5 d-flex justify-content-between">
                        <!--<span><img src="{{asset('assets/frontend/images/chat/search.png')}}" class="" alt="" srcset=""></span>-->
                        <input class="border rounded f-14 pl-2" style="height:30px;" type="text" onkeyup="searchInput(this);" placeholder="Search Messages...">
                        <button onclick="scrollBodyBottom();" class="my-custom-btn"><i class="fa fa-angle-down" aria-hidden="true"></i></button>
                        <button onclick="scrollBodyTop();" class="my-custom-btn"><i class="fa fa-angle-up" aria-hidden="true"></i></button>
                        <span class="ml-1" id="filter-count"></span>
                    <!--<div></div>-->
                    <!--<span class="pl-3"><img src="{{asset('assets/frontend/images/chat/Path-82.png')}}" class="" alt="" srcset=""></span></div>-->
    
                                </div>
            </div>
            <div class="card-body messag-log" style="max-height: 417px !important;min-height: 417px !important;overflow-y:scroll;" onmouseenter="focusOnInput();">
              
            </div>
            
            <div class="card-footer border-0 pl-3 pr-3" >
                <div id="imagePreview" style="margin-left: -19px !important;height:90px" class="d-flex"></div>
                <div class="users d-flex" style="height: 23px;"></div>
                <form id="chat-form" method="post" class="mt-1 ">
                    <div class="input-group border-top d-flex align-items-center pb-2">
                        <textarea id="message-content" name="content" class="form-control  pl-0" placeholder="Type your message ..." autocomplete="off"></textarea>
                        <div id="emojis" class="d-none" style="position: absolute; bottom: 102%; right: 26%;"></div>
                        <span class="pl-3" onclick="if($('#emojis').hasClass('d-none')){ $('#emojis').removeClass('d-none') }else{ $('#emojis').addClass('d-none') }">	<img src="{{asset('assets/frontend/images/chat/Group-150.png')}}" class="" alt="" srcset="" style="cursor:pointer;" ></span>
                        <input type="file"  name="img" style="display:none;" id="img" onchange="fileValidation();">
                        <img src="{{asset('assets/frontend/images/chat/Path-87.png')}}" class="" onclick="$('#img').click();" alt="" srcset="" style="cursor:pointer;" >
                        
                    
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-primary send-msg bg-3ac754 border-0 " onclick="messageSend();">Send&nbsp; <img src="{{asset('assets/frontend/images/chat/Path-88.png')}}" class="" alt="" srcset=""></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>