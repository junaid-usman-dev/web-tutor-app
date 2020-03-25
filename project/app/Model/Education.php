<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'institute', 'certificate', 'start_date', 'end_date'
    ];

    /**
     * Get the user that owns the education.
     */
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
