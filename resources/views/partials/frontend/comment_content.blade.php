@if($comment !=null)   
    <div class="d-flex flex-directionSmall my-5">
        <div class="img_commentSection w-10"><img src="{{ asset($comment->user->picture) }}" class="w-h-59 border-radius-50" onerror="this.error=null; this.src='{{asset('uploadfiles/userphoto/default.jpg')}}'"></div>
        <div class="content_commentSection pl-0 w-100 pl-lg-4 pl-md-4 pl-sm-0">
            <div>
                <div class="d-flex flex-directionSmall paddding-top-20">
                    <div class="f-26 RobotoRegular cl-616161 border-right border-left pl-3 pr-3 comment_SectionName">{{ $comment->user->username }}</div>
                    <div class="f-21 RobotoRegular cl-616161  ml-auto comment_SectionDate">{{date('F d, Y',strtotime($comment->created_at))}}
                    </div>
                </div>
            </div>
            <div class="w-75 f-26 RobotoRegular cl-616161 pt-3 text-justify Comment">{{$comment->comment}}</div>
            <div class="d-flex f-21 robotoMedium pt-3">

                <div><span class="commentLikeCount{{$comment->id}}">{{$comment->likes($comment->id)}}</span>&nbsp;<i class="fa fa-thumbs-up curserPointer fa-lg colorList commentLike{{$comment->id}}" aria-hidden="true" onclick="likeDislike('.commentLike{{$comment->id}}','.commentDislike{{$comment->id}}',{{$comment->id}},'{{route('commentLikeDislike')}}','like')"></i></div>
                <div class="px-3"><span class="commentDisLikeCount{{$comment->id}}">{{$comment->dislikes($comment->id)}}</span>&nbsp;<i class="fa fa-thumbs-down curserPointer colorList fa-lg commentDislike{{$comment->id}}" onclick="likeDislike('.commentLike{{$comment->id}}','.commentDislike{{$comment->id}}',{{$comment->id}},'{{route('commentLikeDislike')}}','dislike')" aria-hidden="true"></i></div>
                <div class="cl-a2a2a2 comment_SectionLRD cursor-pointer" onclick="myReply(this,{{$comment->id}})">Reply</div>
            </div>

            <div class="commentReplySection{{$comment->id}}">
                @if($comment->replies->count()>0)

                    @foreach($comment->replies as $reply)
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
                    @endforeach
                @endif
            </div>
            @if(Auth::check())
                <div id="replyMainDiv{{$comment->id}}" class="{{ $comment->replies->count()>0?'':'d-none' }}">
                    <div class="row m-0 align-items-center">

                        <div class="col-lg-1 p-0"><img class="w-h-59 rounded-circle p-0" src="{{ asset(Auth::user()->picture) }}" onerror="this.error=null; this.src='{{asset('uploadfiles/userphoto/default.jpg')}}'"></div>
                        <div class="col-lg-11 pr-0 pl-3"><textarea id="replytextAreaId{{$comment->id}}" oninput="myreplyTextarea(this)" class="form-control border-bottom  rounded-0"
                                id="" rows="1" placeholder="Add a public reply..."></textarea>
                        </div>
                    </div>
                    <div class="text-right" id="" style="">
                        <button type="button" class="btn btn-link text-dark" onclick="cancelReply(this,{{$comment->id}})">Cancel</button>
                        <button type="button" class="btn bg-717171 text-white " disabled id="replyCommentButton{{$comment->id}}" onclick="addReply({{$comment->id}})">Reply</button>
                    </div>
                </div>
            @endif
        </div>

    </div>
@endif