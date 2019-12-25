<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    public function message()
    {
        return $this->belongsTo('App\User');
    }
}
