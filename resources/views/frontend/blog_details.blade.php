@extends('layouts.frontend.app')
@section('title','Blog Post')
{{-- head start --}}

@section('extra-css')


<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/utility.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/navbar.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/portfolio.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/media-queries.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}">
<link rel="canonical" href="https://learnme.live/live/blog/network-engineer?fbclid=IwAR2trvZQCB7whZ83j6FmQaxkP51LEZnaFu3_jGxzoKDELg33QwQuv6vdICA">
<meta property="og:image" content="{{ asset($post->image) }}" />
<meta property="og:title" content="{{ Str::ucfirst($post->title) }}" />
<meta property="og:description"   content="{!!$post->description!!}" />
<meta name="keywords">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:widgets:new-embed-design" content="on">
    <meta name="twitter:widgets:csp" content="on">
<!-- <meta property="og:image"         content="{{ asset($post->image) }}" />
<meta property="og:title"         content="{{ Str::ucfirst($post->title) }}" />
<meta property="og:description"   content="{!!$post->description!!}" /> -->
<style type="text/css">
.elementor-160 .elementor-element.elementor-element-125959e5 .elementor-icon {
    border-radius: 100px 100px 100px 100px;
}

.elementor-160 .elementor-element.elementor-element-125959e5 .elementor-social-icon {
    background-color: rgba(99, 115, 129, 0.5);
    --icon-padding: 1em;
}

.elementor-icon {
    display: inline-block;
    line-height: 1;
    -webkit-transition: all .3s;
    -o-transition: all .3s;
    transition: all .3s;
    color: #818a91;
    font-size: 50px;
    text-align: center;
}

.dropdown-toggle::after {
    display: none;
}

.main_Tite_div {
    width: fin;
}
</style>
@endsection
{{-- head end --}}
<style>
.main_Tite {

    letter-spacing: 4px;
}
.w-fit-content {
    width: fit-content;
}

.hover1:hover {
    transform: translateY(-8px);
    transition: 0.4s linear;
}
.w-10{width:10% !important;}
.w-h-59,.img_commentSection{width: 59px;height: 59px;}
.border-radius-50{border-radius: 50%!important;}
@media only screen and (max-device-width: 768px) {
    .w-10{width:35% !important;}
}
</style>

{{-- content section start --}}

@section('content')

    <section class="px-5 pt-2 pb-2 nav-bg-img robotoRegular"> 
        @include('includes.frontend.navbar')
    </section>
    @include('includes.frontend.navigations')
    <section class="main_padding mt-5 mb-5 blogBanner ">
        <div>
            <div class="text-white blogBannerHeading robotoMedium">Blog Details</div>
            {{-- <div class="robotoRegular blogBannerdesc">Home - <span class="cl-3ac754">Blog Posts</span></div> --}}
        </div>
    </section>

    <section class="main_padding" style="margin-bottom: 19rem;">
        @if($post !=null)
            <div class="row m-0">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <img src="{{ asset($post->image) }}" alt="" class="img-fluid w-100 max-height-280" />
                    {{-- <img src="{{ asset('assets/frontend/images/Group-289.png') }}" alt="" class="img-fluid w-100 max-height-280" /> --}}
                    <div class="d-flex align-items-center py-3 justify-content-between flw">
                        <div class="d-flex align-items-center flw">
                            <div class="d-flex align-items-center">
                                <div class="pl-3"><img src="{{ asset('assets/frontend/images/calender.png') }}" class=""
                                        width="" alt="" srcset=""></div>
                                <div class="pl-2 cl-444444 robotoMedium f-18 ">{{date('F d, Y',strtotime($post->created_at))}}</div>
                            </div>
                            <div class="d-flex align-items-center pt-pb-15">
                                <div class="pl-3"><img src="{{ asset('assets/frontend/images/Group-2411.png') }}" class=""
                                        width="" alt="" srcset=""></div>
                                <div class="pl-2 cl-444444 robotoMedium f-18 ">by {{$post->add_by=='admin'?$post->admin->username:$post->user->username}}</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="pl-3"><img src="{{ asset('assets/frontend/images/Group-2420.png') }}" class="" width=""
                                    alt="" srcset=""></div>
                            <div class="pl-2 cl-444444 robotoMedium f-18 total-comments">{{$post->comments->count()}} Comments</div>
                        </div>
                    </div>
                    <div class="cl-444444 h1 py-3  robotoMedium m-0">{{ Str::ucfirst($post->title) }}</div>
                    {{-- <p class="cl-444444 f-18 robotoRegular py-3 m-0 text-justify">{{$post->summery}}</p> --}}
                    <div class="cl-444444 f-18 robotoRegular m-0 text-justify">{!!$post->description!!}</div>
                    
                
                    <div>


                        <!-- Modal -->
                        <div class="comment-section">
                            @if($post->comments->count()>0)
                                @foreach($post->comments as $comment)
                                    <div class="d-flex flex-directionSmall my-5">
                                        <div class="img_commentSection "><img src="{{ asset($comment->user->picture) }}" class="w-h-59 border-radius-50" onerror="this.error=null; this.src='{{asset('uploadfiles/userphoto/default.jpg')}}'"></div>
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
                                                            <div class="img_commentSection "><img src="{{ asset($reply->user->picture) }}" class="w-h-59 border-radius-50" onerror="this.error=null; this.src='{{asset('uploadfiles/userphoto/default.jpg')}}'"></div>
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
                                                        <div class="col-lg-11 pr-0 pl-3"><textarea id="replytextAreaId{{$comment->id}}" oninput="myreplyTextarea(this)" onfocus="myreplyFocus(this)" class="form-control border-bottom  rounded-0"
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
                                @endforeach
                            @endif
                        </div>

                        @if(Auth::check())
                            <div class="row m-0 align-items-center">

                                <div class="col-lg-2 pl-0"><img class="w-h-59 rounded-circle" src="{{ asset(Auth::user()->picture) }}" onerror="this.error=null; this.src='{{asset('uploadfiles/userphoto/default.jpg')}}'"></div>
                                <div class="col-lg-10 p-0"><textarea class="form-control border-bottom  rounded-0"
                                        oninput="myTextarea(this)" onfocus="myFunction(this)" id="addComentTextArea"
                                        rows="1" placeholder="Add a public comment..."></textarea>
                                </div>
                            </div>
                            <div class="text-right d-none" id="addCancelComment" style="margin-top: -10px;">
                                <button type="button" class="btn btn-link text-dark" id="cancelButton"
                                    onclick="clickFunction()">Cancel</button>
                                <button type="button" class="btn bg-717171 text-white" id="commentButton" disabled onclick="addComment(this,{{$post->id}})">Comment</button>
                            </div>
                        @endif
                    </div>


                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="bg-f8f8f8 rounded shadow px-3 py-3 w-75 blogsRightBar  ml-auto">
                        <div class="cl-444444 h5  robotoMedium m-0 pb-3">Share Blog
                        </div>
                        <div class="d-flex">
                            <!-- <div> <a href=""><img src="{{ asset('assets/frontend/images/702264.png') }}" width="34" height="34"
                                        alt="" class="" /></a></div> -->
                                        <div id="fbShare" data-href="" class="fb-share-button " data-layout="button" data-size="large">
                            <a target="_blank" href="" class="fb-xfbml-parse-ignore"></a>
                        </div>
                        <div class="px-1">
                            <a id="twitterShare" class="twitter-share-button" target="_blank" href="https://twitter.com/intent/tweet" data-size="large">
                                Tweet
                            </a>
                        </div>
                        <div class=" whatsapp-btn">
                            <a id="whatsappShare" target="_blank" class="anchertag  text-white">
                                <i class="fa fa-whatsapp text-white" style="color: #fff; font-size: 15px !important;" aria-hidden="true"></i> 
                                Share
                            </a>
                        </div>
                            <!-- <div class="px-3"> <a href=""><img src="{{ asset('assets/frontend/images/702302.png') }}" width="34"
                                        height="34" alt="" class=" " /></a></div> -->
                            <!-- <div> <a href=""><img src="{{ asset('assets/frontend/images/702299.png') }}" width="34" height="34"
                                        alt="" class=" " /></a></div> -->
                            <!-- <div class="pl-3"> <a href=""><img src="{{ asset('assets/frontend/images/702301.png') }}" width="34"
                                        height="34" alt="" class=" " /></a></div> -->
                        </div>
                        <!-- <div class="d-flex pt-3">
                            <div> <a href=""><img src="{{ asset('assets/frontend/images/702281.png') }}" width="34" height="34"
                                        alt="" class=" " /></a></div>
                            <div class="pl-3"> <a href=""><img src="{{ asset('assets/frontend/images/1738777.png') }}"
                                        width="34" height="34" alt="" class=" " /></a></div>
                        </div> -->
                    </div>
                    <div class="bg-f8f8f8 rounded shadow px-3 py-3 my-4 w-75 blogsRightBar ml-auto">
                        <div class="cl-444444 h5  robotoMedium m-0 pb-3">Subscribe Newsletter
                        </div>
                        <form id="subscriberForm">
                            <input type="email" name="email" class="form-control" id="email" >
                            <button type="button" class="btn bg-3ac574 h5 m-0 py-2 mt-3 robotoMedium shadow rounded w-100 text-white" onclick="addSubscriber()">Subscribe</button>
                        </form>

                    </div>
                    <div class="bg-f8f8f8 rounded shadow px-3 py-3 w-75 blogsRightBar ml-auto">
                        @if($otherPosts->count()>0)
                            <div class="cl-444444 h5  robotoMedium m-0 pb-3">Recent Blogs</div>
                            @foreach($otherPosts as $single)
                                <div class="mb-3">
                                    <a href="{{ route('blogDetail',$single->slug) }}" class="cl-8b8b8b">
                                        <div class="row mx-0  align-items-center ">
                                            <div class="col-lg-4 col-md-4 col-sm-3 p-0">
                                                <img src="{{ asset($single->image) }}" class="w-100" height="63"/>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-3 pr-0">
                                                <div class="cl-8b8b8b robotoRegular f-15">{{date('F d, Y',strtotime($single->created_at))}}</div>
                                                <div class="robotoMedium ">{{ Str::ucfirst($single->title) }}</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </section>
    <div id="fb-root"></div>
    <script async crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v10.0"
        nonce="cikbkrXs"></script>
        <script async="" src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

@endsection

{{-- content section end --}}

{{-- footer section start --}}


@section('extra-script')
<script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
<script>
    const myFunction = () => {
        addCancelComment.classList.remove('d-none');
    }
    const clickFunction = () => {
        addCancelComment.classList.add('d-none');
        commentButton.setAttribute("disabled",'');
        addComentTextArea.value = '';
        commentButton.classList.add('bg-717171')
        commentButton.classList.remove('bg-primary')
    }

    const myTextarea = (e) => {

        commentButton.classList.remove('bg-717171')
        commentButton.classList.add('bg-primary')
        commentButton.removeAttribute("disabled")

        if (e.value == '') {
            commentButton.classList.add('bg-717171')
            commentButton.classList.remove('bg-primary')
        }
    }
    // reply js
    const myReply = (e,commentID) => {
        $('#replyMainDiv'+commentID).removeClass('d-none');
    }
    const cancelReply = (e,commentID) => {
        $('#replyMainDiv'+commentID).addClass('d-none');
        $('#replytextAreaId'+commentID).val('');
        $('#replyCommentButton'+commentID).attr('disabled','');
        $('#replyCommentButton'+commentID).addClass('bg-717171');
        $('#replyCommentButton'+commentID).removeClass('bg-primary');
    }
    const myreplyTextarea = (e) => {
        e.parentNode.parentNode.nextElementSibling.children[1].classList.remove('bg-717171')
        e.parentNode.parentNode.nextElementSibling.children[1].classList.add('bg-primary')
        e.parentNode.parentNode.nextElementSibling.children[1].removeAttribute("disabled");
    
        if (e.value == '') {
            e.parentNode.parentNode.nextElementSibling.children[1].classList.add('bg-717171')
            e.parentNode.parentNode.nextElementSibling.children[1].classList.remove('bg-primary')
        }
    }

    // get all comments and replies 
    function getAllCommentsReplies(postID){
        $.ajax({
            url:"{{route('getAllCommentsReplies')}}",
            type:"get",
            data:{post_id:postID,_token:"{{csrf_token()}}"},
            success:function(data){
                if(data.status){
                    $('.comment-section').html(data.html);
                }
            }
        });
    }

    setInterval(function(){
        getAllCommentsReplies("{{$post->id}}");
    },10000);

    // add comment function
    function addComment(elem,postID){
        let commentTxt = $('#addComentTextArea').val();
        $.ajax({
            url:"{{route('comments.store')}}",
            type:"post",
            data:{post_id:postID,comment:commentTxt,_token:"{{csrf_token()}}"},
            success:function(data){
                $('#addComentTextArea').val('');
                $('.total-comments').html(data.totalComments)
                $('.comment-section').append(data.html);
            }
        });
    }

    // add reply to comment function
    function addReply(commentID){
        let replyTxt = $('#replytextAreaId'+commentID).val();
        $.ajax({
            url:"{{route('replies.store')}}",
            type:"post",
            data:{comment_id:commentID,reply:replyTxt,_token:"{{csrf_token()}}"},
            success:function(data){
                $('#replytextAreaId'+commentID).val('');
                $('.commentReplySection'+commentID).append(data.html);
            }
        });
    }

    // like and dislike the comment and reply
    function likeDislike(likeCls,dislikeCls,resourceID,url,react){

        @if(Auth::check())
            if(react=='like'){
                $(likeCls).addClass('text-primary');
                $(dislikeCls).removeClass('text-danger');
            }else{
                $(likeCls).removeClass('text-primary');
                $(dislikeCls).addClass('text-danger');
            }
            $.ajax({
                url:url,
                type:"post",
                data:{resource_id:resourceID,react:react,_token:"{{csrf_token()}}"},
                success:function(data){
                   $(data.likeClass).html(data.likeCount);                   
                   $(data.dislikeClass).html(data.dislikeCount);

                }
            });
        @else
            
        swal({
            text: 'Please login first do like and dislike',
            icon: "warning",
            buttons: {
                cancel: "Cancel",
                confirm: "OK"
                },
        }).then((willDelete) => {
                if (willDelete)
                { 
                   window.location = "{{route('login')}}";
                } 
            });

        @endif
    }
    $(document).ready(function () {
        // Facebook share set url
        fbShare.setAttribute("data-href", window.location.href);
        fbShare.children[0].setAttribute("href", window.location.href);
        whatsappShare.setAttribute("href", `https://wa.me/send/?text=${window.location.href}`);
    });

    function addSubscriber() {
        var myform = document.getElementById('subscriberForm');
        var fd = new FormData(myform);
        fd.append("_token", "{{ csrf_token() }}");
        $.ajax({
            url: "{{route('subscriber.store')}}",
            type: 'post',
            processData: false,
            contentType: false,
            data: fd,
            success: function(data) {
                if (data.success == true) {
                    swal("success", data.message, "success").then((value) => {
                        if(value){
                            $('#email').val('');
                            // window.location = return_url;
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

</script>
@endsection

{{-- footer section end --}}