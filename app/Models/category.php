<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
        'id','name'
    ];
    public function category()
    {
        return $this->belongsTo(advertise::class);
    }
}
