<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\advertise;
use App\Models\transaction;
use App\Models\favorite;
use App\Models\action;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone','email','total_score','identify_id'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

///auth
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];

    }

    ///auth
    //otp
    public function getAuthOtp()
    {
        return $this->otp;
    }
        public function advertise()
    {
        return $this->hasMany(advertise::class);
    }
    public function transaction()
    {
        return $this->hasMany(transaction::class);
    }
    public function favorite()
    {
        return $this->hasMany(favorite::class);
    }
    public function actions()
    {
        return $this->belongsToMany(action::class);
    }
}
