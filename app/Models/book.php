<?php

namespace App\Models;

use App\Models\advertise;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    protected $fillable = [
        'date','author','publisher'
    ];
        public function advertise(){
           return $this->belongsTo(advertise::class);
        }
}
