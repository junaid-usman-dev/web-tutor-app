<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // One to Many Relationship
    // public function users()
    // {
    //     return $this->hasMany("App\User","user_id");
    // }

    /**
     * Get the post that owns the message.
     */
    public function users()
    {
        return $this->belongsTo('App\User', 'sender_id');
    }

    /**
     * Get the message that owns the receiver.
     */
    public function receiver()
    {
        return $this->belongsTo('App\User', 'receiver_id');
    }
}
