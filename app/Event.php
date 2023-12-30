<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
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

    public function category(){
    	return $this->belongsTo(EventCategory::class,'category_id','id');
    }

    public function user(){
    	return $this->belongsTo(User::class,'user_id','id');
    }

    public function tickets(){
        return $this->hasMany(EventTicket::class,'event_id','id');
    }

    public function channel(){
        return $this->hasOne(GroupChannel::class,'event_id','id');
    }
}
