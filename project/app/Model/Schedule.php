<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id', 'tutor_id', 'subject', 'day', 'start_date', 'end_date', 'start_time', 'end_time'
    ];

    /**
     * Get the user that owns the education.
     */
    public function users()
    {
        return $this->belongsTo('App\User', 'student_id');
    }
    /**
     * Get the user that owns the education.
     */
    public function tutor()
    {
        return $this->belongsTo('App\User', 'tutor_id');
    }
}
