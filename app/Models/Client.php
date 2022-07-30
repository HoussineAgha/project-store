<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasFactory;

    public function store(){
        return $this->hasMany('App\Models\store');
    }
    public function order(){
        return $this->hasMany('App\Models\Order');
    }
    public function shipping(){
        return $this->hasMany('App\Models\Shipping');
    }
}



