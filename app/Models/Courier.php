<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;
    protected $fillable = [
        'courier_name',

        'created_by',

        'updated_by'
    ];

    public function orders()
    {

        return $this->hasMany('App\Models\Order', 'courier_id');
    }
    public function createdBy()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function updatedBy()
    {

        return $this->belongsTo('App\Models\User', 'updated_by');
    }
}
