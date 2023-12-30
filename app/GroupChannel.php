<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupChannel extends Model
{
    public function event(){
        return $this->belongsTo(Event::class,'event_id','id');
    }
}
