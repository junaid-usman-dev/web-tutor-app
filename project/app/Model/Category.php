<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    // One to Many Relationship
    public function subjects()
    {
        // return $this->belongsToMany('App\Model\Category');
        return $this->hasMany('App\Model\Subject');
    }

    // One to Many Relationship
    public function users()
    {
        return $this->belongsToMany('App\User', 'category_id');
    }
}
