<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = [
        'user_id', 'card_number', 'expiry_month', 'expiry_year', 'ccv_number'
    ];
}
