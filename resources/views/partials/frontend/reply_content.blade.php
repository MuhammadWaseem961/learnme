@if($reply !=null)   
    <div class="d-flex flex-directionSmall my-5">
        <div class="img_commentSection w-10"><img src="{{ asset($reply->user->picture) }}" class="w-h-59 border-radius-50" onerror="this.error=null; this.src='{{asset('uploadfiles/userphoto/default.jpg')}}'"></div>
        <div class="content_commentSection pl-0 w-100 pl-lg-4 pl-md-4 pl-sm-0">
            <div>
                <div class="d-flex flex-directionSmall paddding-top-20">
                    <div class="f-26 RobotoRegular cl-616161 border-right border-left pl-3 pr-3 comment_SectionName">{{ $reply->user->username }}</div>
                    <div class="f-21 RobotoRegular cl-616161  ml-auto comment_SectionDate">{{date('F d, Y',strtotime($reply->created_at))}}
                    </div>
                </div>
            </div>
            <div class="w-75 f-26 RobotoRegular cl-616161 pt-3 text-justify Comment">{{$reply->reply}}</div>
            <div class="d-flex f-21 robotoMedium pt-3">
                <div><span class="replyLikeCount{{$reply->id}}">{{$reply->likes($reply->id)}}</span>&nbsp;<i class="fa fa-thumbs-up curserPointer fa-lg colorList replyLike{{$reply->id}}" aria-hidden="true" onclick="likeDislike('.replyLike{{$reply->id}}','.replyDislike{{$reply->id}}',{{$reply->id}},'{{route('replyLikeDislike')}}','like')"></i></div>
                <div class="px-3"><span class="replyDislikeCount{{$reply->id}}">{{$reply->dislikes($reply->id)}}</span>&nbsp;<i class="fa fa-thumbs-down curserPointer colorList fa-lg replyDislike{{$reply->id}}" onclick="likeDislike('.replyLike{{$reply->id}}','.replyDislike{{$reply->id}}',{{$reply->id}},'{{route('replyLikeDislike')}}','dislike')" aria-hidden="true"></i></div>
            </div>
        </div>
    </div>
@endif