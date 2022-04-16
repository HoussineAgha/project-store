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
        return $this->belongsTo('App\models\Client','client_id');
    }
    public function shipping(){
        return $this->belongsTo('App\models\Shipping');
    }


    protected $casts = [
        'product'=>'array',
    ];
}
