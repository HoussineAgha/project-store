<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public Function store()
    {
        return $this->belongsTo('App\models\store');
    }

    public function categury(){
        return $this->hasMany('App\models\Categury');
    }
}
