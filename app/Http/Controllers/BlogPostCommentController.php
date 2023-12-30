<?php

namespace App\Http\Controllers;

use App\BlogPost;
use App\BlogPostComment;
use App\BlogPostCommentLikeDislike;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class BlogPostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $comments = BlogPostComment::where('post_id',$request->post_id)->get();
        $newComments = BlogPostComment::where('post_id',$request->post_id)->where('is_new',1)->get()->count();
        if(Auth::check()){
            if($newComments>0){ BlogPostComment::where('user_id','!=',Auth::user()->id)->where('post_id',$request->post_id)->update(['is_new'=>0]); }
        }
        return response()->json(['status'=>$newComments>0?$status=true:false,'html'=>view('partials.frontend.comments_content',compact('comments'))->render()]);
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
        if($request->comment !=''){
            $comment = new BlogPostComment();
            $comment->user_id = Auth::user()->id;
            $comment->post_id = $request->post_id;
            $comment->comment = $request->comment;
            $comment->is_new = 1;
            if($comment->save()){
                $totalComments = BlogPost::find($request->post_id)->comments->count();
                return response()->json(['totalComments'=>$totalComments." Comments",'html'=>view('partials.frontend.comment_content',compact('comment'))->render()]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogPostComment  $blogPostComment
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPostComment $blogPostComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogPostComment  $blogPostComment
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPostComment $blogPostComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogPostComment  $blogPostComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPostComment $blogPostComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogPostComment  $blogPostComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPostComment $blogPostComment)
    {
        //
    }

    // like and dislike comment
    public function commentLikeDislike(Request $request){
        $check = BlogPostCommentLikeDislike::where('user_id',Auth::user()->id)->where('comment_id',$request->resource_id)->first();
        if($check!=null){$rec = $check; }else{ $rec = new BlogPostCommentLikeDislike();}
        $rec->user_id = Auth::user()->id;
        $rec->comment_id = $request->resource_id;
        $rec->react = $request->react;
        if($rec->save()){
            $comment = BlogPostComment::find($request->resource_id);
            $comment->is_new=1;
            $comment->save();
            $likeCount = BlogPostCommentLikeDislike::where('comment_id',$request->resource_id)->where('react','like')->get()->count();
            $dislikeCount = BlogPostCommentLikeDislike::where('comment_id',$request->resource_id)->where('react','dislike')->get()->count();
            return response()->json(['likeClass'=>'.commentLikeCount'.$rec->comment_id,'dislikeClass'=>'.commentDislikeCount'.$rec->comment_id,'likeCount'=>$likeCount,'dislikeCount'=>$dislikeCount]);
        }
    }
}
