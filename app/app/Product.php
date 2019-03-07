<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function order_details()
    {
    	return $this->hasMany('App\OrderDetail');
    }
}
