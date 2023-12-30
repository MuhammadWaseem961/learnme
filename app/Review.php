<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table='tb_review';

    public function specialist(){
        return $this->belongsTo(User::class,'seller_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'buyer_id','id');
    }
}
