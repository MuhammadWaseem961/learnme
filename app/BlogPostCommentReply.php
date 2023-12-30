<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPostCommentReply extends Model
{
    public function user(){
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function comment(){
        return $this->belongsTo(BlogPostComment::class, 'comment_id','id');
    }

    public function likes($id){
        return BlogPostCommentReplyLikeDislike::where('reply_id',$id)->where('react','like')->get()->count();
    }

    public function dislikes($id){
        return BlogPostCommentReplyLikeDislike::where('reply_id',$id)->where('react','dislike')->get()->count();
    }
}
