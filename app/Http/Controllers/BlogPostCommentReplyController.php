<?php

namespace App\Http\Controllers;

use App\BlogPostComment;
use App\BlogPostCommentReply;
use App\BlogPostCommentReplyLikeDislike;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class BlogPostCommentReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->reply !=''){
            $reply = new BlogPostCommentReply();
            $reply->user_id = Auth::user()->id;
            $reply->comment_id = $request->comment_id;
            $reply->reply = $request->reply;
            if($reply->save()){
                $comment = BlogPostComment::find($reply->comment_id);
                $comment->is_new=1;
                $comment->save();
                return response()->json(['html'=>view('partials.frontend.reply_content',compact('reply'))->render()]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogPostCommentReply  $blogPostCommentReply
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPostCommentReply $blogPostCommentReply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogPostCommentReply  $blogPostCommentReply
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPostCommentReply $blogPostCommentReply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogPostCommentReply  $blogPostCommentReply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPostCommentReply $blogPostCommentReply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogPostCommentReply  $blogPostCommentReply
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPostCommentReply $blogPostCommentReply)
    {
        //
    }

    // like and dislike reply
    public function replyLikeDislike(Request $request){
        $check = BlogPostCommentReplyLikeDislike::where('user_id',Auth::user()->id)->where('reply_id',$request->resource_id)->first();
        if($check!=null){$rec = $check; }else{ $rec = new BlogPostCommentReplyLikeDislike();}
        $rec->user_id = Auth::user()->id;
        $rec->reply_id = $request->resource_id;
        $rec->react = $request->react;
        if($rec->save()){
            $comment = BlogPostComment::find(BlogPostCommentReply::find($request->resource_id)->comment->id);
            $comment->is_new=1;
            $comment->save();
            $likeCount = BlogPostCommentReplyLikeDislike::where('reply_id',$request->resource_id)->where('react','like')->get()->count();
            $dislikeCount = BlogPostCommentReplyLikeDislike::where('reply_id',$request->resource_id)->where('react','dislike')->get()->count();
            return response()->json(['likeClass'=>'.replyLikeCount'.$rec->reply_id,'dislikeClass'=>'.replyDislikeCount'.$rec->reply_id,'likeCount'=>$likeCount,'dislikeCount'=>$dislikeCount]);
        }
    }
}
