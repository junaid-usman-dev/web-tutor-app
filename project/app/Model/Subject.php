<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    // Many to Many Relationship
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    // One To One Relationship
    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }
}
