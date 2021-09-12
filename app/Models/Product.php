<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [

        'category_id',

        'product_name',

        'product_picture',

        'product_price',

        'product_details',

        'special_price',

        'special_price_start',

        'special_price_end',

        'show_in_home',

        'show_in_home_serial',

        'created_by',

        'updated_by'

    ];



    public function categories()
    {

        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
    public function createdBy()
    {

        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }
    public function updatedBy()
    {

        return $this->belongsTo('App\Models\User', 'updated_by', 'id');
    }
    public function  orderProducts()
    {
        return $this->hasMany('App\Models\OrderProduct', 'product_id');
    }
}
