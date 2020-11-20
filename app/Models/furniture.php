<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\advertise;

class furniture extends Model
{
    protected $fillable = [
        'furniture_type'
    ];
    public function advertise(){
        return $this->belongsTo(advertise::class);
    }
}
