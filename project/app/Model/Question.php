<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    /**
     * Get the question that owns the test.
     */
    public function test()
    {
        return $this->belongsTo('App\Test');
    }
}
