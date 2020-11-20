<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\advertise;
class roomMate extends Model
{
    protected $fillable = [
       'gender','address','room_count','measure','need_count','real_count','daily_payment','max_prepayment'
    ];
    public function advertise(){
        return $this->belongsTo(advertise::class);
    }
}
