<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\Admin as Authenticatable;

class Admin extends Authenticatable
{
    // use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'email_address', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //
}
