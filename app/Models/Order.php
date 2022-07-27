<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    public function store(){
        return $this->belongsTo('App\models\store');
    }

    public function user(){
        return $this->belongsTo('App\models\user');
    }

    public function client(){
        return $this->belongsTo('App\models\client');
    }
    public function shipping(){
        return $this->belongsTo('App\models\shipping');
    }
    public function profit(){
        return $this->belongsTo('App\Models\Profit');
    }


    protected $casts = [
        'product'=>'array',
        'shipping_info'=>'array'
    ];

}
