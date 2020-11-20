<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\book;
use App\Models\outfit;
use App\Models\project;
use App\Models\training;
use App\Models\roommate;
use App\Models\category;
use App\Models\furniture;
use App\Models\user;
use App\Models\transaction;
use App\Models\favorite;
use Cviebrock\EloquentSluggable\Sluggable;

class advertise extends Model
{
    protected $fillable = [
        'needtype','title','slug','price','description','counter','id_category','fake_id'
    ];
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function book()
    {
        return $this->hasOne(book::class);
    }
    public function outfit()
    {
        return $this->hasOne(outfit::class);
    }
    public function project()
    {
        return $this->hasOne(project::class);
    }
    public function training()
    {
        return $this->hasOne(training::class);
    }
    public function roommate()
    {
        return $this->hasOne(roommate::class);
    }
    public function furniture()
    {
        return $this->hasOne(furniture::class);
    }
    public function category()
    {
        return $this->hasOne(category::class);
    }
    public function user()
    {
        return $this->belongsTo(user::class);
    }
    public function image()
    {
        return $this->hasMany(image::class);
    }
    public function transaction()
    {
        return $this->hasMany(transaction::class);
    }
    public function favorite()
    {
        return $this->hasMany(favorite::class);
    }

}
