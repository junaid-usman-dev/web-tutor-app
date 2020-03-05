<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubjectUser extends Model
{
    //
    // Defining table in Model
    protected $table = 'subject_user';

    protected $fillable = [
        'user_id', 'subject_id'
    ];
}
