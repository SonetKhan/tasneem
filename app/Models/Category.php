<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [

        'category_name',

        'category_picture',

        'display_in_menu',

        'display_in_meu_order',

        'created_by',

        'updated_by'
    ];
    public function createdBy()
    {

        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }
    public function updatedBy()
    {

        return $this->belongsTo('App\Models\User', 'updated_by', 'id');
    }
    public function products()
    {

        return $this->hasMany('App\Models\Product');
    }
}
