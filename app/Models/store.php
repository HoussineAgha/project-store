<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo('App\models\user');
    }

    public function product(){
        return $this->hasMany('App\models\Product');
    }

    public function categury(){
        return $this->hasMany('App\models\Categury');
    }

    public function pages(){
        return $this->hasMany('App\Models\pages');
    }

    public function client(){
        return $this->hasMany('App\Models\Client');
    }
}
