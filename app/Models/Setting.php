<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $casts =[
        'slider'=>'array',
        'social'=>'array',
        'title_accordion'=>'array',
        'disc_accordion'=>'array',
        'image_accordion'=>'array',
    ];

}
