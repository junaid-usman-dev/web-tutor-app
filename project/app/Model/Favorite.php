<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'user_id', 'favorite_user_id'
    ];
    // One to Many Relationship
    public function users()
    {
        return $this->hasMany("App\User","user_id");
    }
}
