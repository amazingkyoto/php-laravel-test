<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function libraries()
    {
        // return $this->belongsToMany('App\Library');
    }
}
