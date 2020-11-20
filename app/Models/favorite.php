<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\user;
use App\Models\advertise;

class favorite extends Model
{

    public function user(){
        return $this->belongsTo(user::class);
    }
    public function advertise()
    {
        return $this->belongsTo(advertise::class);
    }
}
