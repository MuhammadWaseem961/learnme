<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'tb_booking';

    public function user(){
        return $this->belongsTo(User::class,'buyer_id','id');
    }

    public function specialist(){
        return $this->belongsTo(User::class,'seller_id','id');
    }

    public function paymentDetails(){
        return $this->hasMany(Transaction::class,'booking_id','id');
    }

    public function dispute()
    {
        return $this->hasOne(ClientSpecialistDispute::class,'project_id','id');
    }

}
