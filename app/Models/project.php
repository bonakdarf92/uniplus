<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\advertise;
class project extends Model
{
    protected $fillable = [
'mager'
    ];
    public function advertise(){
        return $this->belongsTo(advertise::class);
    }
}
