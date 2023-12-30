<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $table = 'tb_servicecategory';
    
    public function user()
    {
    	return $this->belongsTo(User::class,'user_id','id');
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
