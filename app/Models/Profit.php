<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profit extends Model
{
    use HasFactory;

    public function store(){
        return $this->belongsTo('App\Models\store');
    }
    public function order(){
        return $this->belongsTo('App\Models\Order');
    }
}