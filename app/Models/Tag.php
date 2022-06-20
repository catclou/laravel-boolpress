<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts(){

        // realizzo la relazione con il model di Post
        return $this->belongsToMany('App\Models\Post');

    }
}
