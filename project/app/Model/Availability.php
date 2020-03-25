<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'start_date', 'end_date', 'start_time', 'end_time'
    ];

    /**
     * Get the user that owns the education.
     */
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
