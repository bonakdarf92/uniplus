<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class action extends Model
{
    protected $fillable = [
        'title','score','active'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
