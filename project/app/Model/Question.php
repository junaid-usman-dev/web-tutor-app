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
        'test_id', 'id', 'question', 'option_1', 'option_2','option_3','option_4','answer', 
    ];


    /**
     * Get the question that owns the test.
     */
    public function test()
    {
        return $this->belongsTo('App\Test');
    }
}
