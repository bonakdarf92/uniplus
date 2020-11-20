<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\advertise;

class outfit extends Model
{
    protected $fillable = [
        'destination','gender','car_type','car_brand', 'number', 'date_hour','date_day'
    ];
    public function advertise(){
        return $this->belongsTo(advertise::class);
    }
}
