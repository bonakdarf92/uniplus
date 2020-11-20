<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\advertise;

class image extends Model
{
    protected $fillable = [
        'image','adver_id'
    ];
    public function advertise(){
        return $this->belongsTo(advertise::class);
    }
}
