<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\advertise;

class training extends Model
{
    protected $fillable = [
    'online_type','website','mager','gender'
    ];
    public function advertise(){
        return $this->belongsTo(advertise::class);
    }
}
