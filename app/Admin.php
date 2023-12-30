<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = "tb_admin";
    public $timestamps = false; 
    
    public function reply()
    {
        return $this->hasOne(DisputeReply::class,'sender_id','id');
    }

    public function posts(){
        return $this->hasMany(BlogPost::class, 'user_id','id');
    }
}
