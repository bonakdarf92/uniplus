<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class award extends Model
{
    protected $fillable = [
        'title','score','active'
    ];

}