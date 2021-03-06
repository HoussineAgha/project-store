<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    public function store(){
        return $this->hasMany('App\Models\Store');
    }

    public function client(){
        return $this->belonsTo('App\Models\Client');
    }


}
