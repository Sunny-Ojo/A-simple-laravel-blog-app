<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function like()
    {
        return $this->hasMany('App\Like');
    }
    public function unlike()
    {
        return $this->hasMany('App\Unlike');
    }
    public function comment()
    {
        return $this->hasMany('App\Comment');
    }
    public function replies()
    {
        return $this->belongsTo('App\post');
    }

}