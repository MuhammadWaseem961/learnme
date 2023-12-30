<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'tb_transaction';
    
    public function booking(){
        return $this->belongsTo(Transaction::class,'booking_id','id');
    }
}
