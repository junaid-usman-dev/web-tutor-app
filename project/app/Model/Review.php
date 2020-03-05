<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //

    /**
     * Get the User that owns the reviews.
     */
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
