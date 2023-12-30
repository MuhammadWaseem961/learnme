<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
    protected $table='tb_paymentinfo';

    public function user(){
        return $this->belongsTo(User::class);
    }
}
