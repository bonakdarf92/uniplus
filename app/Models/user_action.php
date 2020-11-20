<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class user_action extends Model
{
    protected $fillable = [
        'user_id','action_id'
    ];

}
