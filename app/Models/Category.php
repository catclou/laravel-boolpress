<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function Posts(){

        // realizzo la relazione con il model di Post
        return $this->hasMany('App\Models\Post');
        
    }
}
