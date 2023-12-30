<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    public function setSlugAttribute($title){
        $this->attributes['slug'] = $this->uniqueSlug($title);
    }

    private function uniqueSlug($title){
        $slug = Str::slug($title, '-');
        $count = BlogPost::where('slug', 'LIKE', "{$slug}%")->count();
        $newCount = $count > 0 ? ++$count : '';
        return $newCount > 0 ? "$slug-$newCount" : $slug;
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function admin(){
        return $this->belongsTo(Admin::class, 'user_id','id');
    }

    public function comments(){
        return $this->hasMany(BlogPostComment::class, 'post_id','id');
    }

    public function likes($id){
        return BlogPostLikeDislike::where('post_id',$id)->where('react','like')->get();
    }
}
