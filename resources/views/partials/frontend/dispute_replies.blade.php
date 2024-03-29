@if($replies->count() >0)
    @foreach ($replies as $reply)
        <div class="row pt-2 pb-2  ml-0 mr-0 borderRadius-10px justify-content-around">
            <div class="col-md-12 col-lg-12 d-flex justify-content-center align-items-start flex-column">
                <div class="d-flex justify-content-center align-items-center">
                    @if($reply->user_type=='admin')
                        @php  
                            $img = $admin->picture!=null?$admin->picture:"uploadfiles/userphoto/default.jpg";
                            $username = $admin->username;
                        @endphp
                    @else
                        @php  
                            $img = $reply->user->picture!=null?$reply->user->picture:"uploadfiles/userphoto/default.jpg";
                            $username = $reply->user->username;
                        @endphp
                    @endif
                    @php if(empty(Session::get('admin'))){ $tz = Auth::user()->timezone;}else{$tz=config('app.timezone');} @endphp
                    <img src="{{ asset($img) }}" onerror="this.error=null; this.src='{{asset('uploadfiles/userphoto/default.jpg')}}'" class="img-fluid rounded-circle w-40 h-40" alt="">
                    <p class="ml-2 mt-2 cl-575757 f-21 mb-1">{{ $username }}</p>
                    <div class="ml-2 mt-2 mb-1 cl-575757">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $reply->created_at,config('app.timezone'))->timezone($tz)->format('Y-m-d h:i a') }}</div>
                </div>
                <div class="d-flex ml-5">
                    <div class=" d-flex align-items-center cl-a8a8a8 robotoRegular text-justify">
                        {{-- {{ trim($reply->reply) }} --}}
                        {!! html_entity_decode($reply->reply) !!}
                    </div>
                </div>
                <div class="robotoRegular cl-616161 ml-5 mt-1">
                    @if ($reply->file_type=='image')
                        <img src="{{ asset($reply->file_link) }}" style="cursor: pointer;width: 100px;height: 100px;" onclick="imagePopUp(this);"/>
                    @elseif($reply->file_type=='video')
                        <video width="100%" height="240" controls>
                            <source src="{{ asset($reply->file_link) }}">
                        </video>
                    @endif
                </div>
                
            </div>
            <!-- end -->
        </div>
    @endforeach
@endif