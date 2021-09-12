<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $fillable = [

        'order_id',

        'product_id',

        'mobile',

        'quantity',

        'rate',

        'total'
    ];
    public function order()
    {

        $this->belongsTo('App\Models\Order');
    }
}
