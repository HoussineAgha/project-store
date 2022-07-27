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

    public function order(){
        return $this->hasMany('App\models\order');
    }

    public function categury(){
        return $this->hasMany('App\models\categury');
    }

    public function pages(){
        return $this->hasMany('App\Models\pages');
    }

    public function client(){
        return $this->hasMany('App\Models\client');
    }
    public function shipping(){
        return $this->hasMany('App\Models\shipping');
    }
    public function contact(){
        return $this->hasMany('App\Models\contact');
    }
    public function profit(){
        return $this->hasMany('App\Models\Profit');
    }
}
