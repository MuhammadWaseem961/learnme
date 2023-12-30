<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPostComment extends Model
{
    public function post(){
        return $this->belongsTo(BlogPost::class, 'post_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function replies(){
        return $this->hasMany(BlogPostCommentReply::class, 'comment_id','id');
    }

    public function likes($id){
        return BlogPostCommentLikeDislike::where('comment_id',$id)->where('react','like')->get()->count();
    }

    public function dislikes($id){
        return BlogPostCommentLikeDislike::where('comment_id',$id)->where('react','dislike')->get()->count();
    }
}
