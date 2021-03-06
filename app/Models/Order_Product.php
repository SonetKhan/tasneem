<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Product extends Model
{
    use HasFactory;

    public function product()
    {

        return $this->belongsTo('App\Models\Proudct', 'id');
    }
    public function order()
    {

        return $this->belongsTo('App\Models\Order');
    }
}
