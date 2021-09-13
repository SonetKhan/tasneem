<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',

        'shipping_address',

        'mobile',

        'alternative_mobile',

        'total_product',

        'total_price',

        'discount',

        'paid',

        'status',

        'payment_status',

        'payment_details',

        'courier_id',

        'courier_details',

        'special_instruction',

        'comment',

        'updated_by'
    ];

    // protected $guard = [];


    public function updatedBy()
    {

        return $this->belongsTo('App\Models\Order', 'id');
    }
    public function orderProducts()
    {

        return $this->hasMany('App\Models\Order_product');
    }
    public function courier()
    {

        return $this->belongsTo('App\Models\Courier');
    }
}
