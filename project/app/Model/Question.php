<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'test_id', 'id'
    ];


    /**
     * Get the question that owns the test.
     */
    public function test()
    {
        return $this->belongsTo('App\Test');
    }
}
