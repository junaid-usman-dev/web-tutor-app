<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TestUser extends Model
{

    // Defining table in Model
    protected $table = 'test_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'test_id', 'user_id'
    ];

}
