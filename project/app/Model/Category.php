<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    // One to Many Relationship
    public function subjects()
    {
        return $this->belongsToMany('App\Model\Subject', 'category_id');
    }
}
