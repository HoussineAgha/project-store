<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categury extends Model
{
    use HasFactory;

    public function product(){
        return $this->hasMany('App\models\Product');
    }
    public function store(){
        return $this->belongsTo('App\models\store');
    }
}
