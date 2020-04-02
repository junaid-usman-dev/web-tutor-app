<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email_address', 'password', 'images', 'summary', 'teaching_method', 'price_per_hour'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // One to One Relationship
    public function images()
    {
        return $this->hasOne("App\Image");
    }

    // One to One Relationship
    public function payments()
    {
        return $this->hasOne("App\Payment");
    }

    // One to Many Relationship
    // public function subjects()
    // {
    //     return $this->hasMany("App\Model\Subject");
    // }

    // One to Many Relationship
    public function favorites()
    {
        return $this->hasMany("App\Model\Favorite","user_id");
    }

    //One to Many Relationship
    public function reviews()
    {
        return $this->hasMany("App\Model\Review","tutor_id");
    }

    // Many to Many Relationship
    public function subjects()
    {
        return $this->belongsToMany('App\Model\Subject');
    }

    /**
     * Get all of the categories for the user.
     */
    // public function subjects()
    // {
    //     return $this->hasManyThrough('App\Model\Subject', 'App\Model\Category', 'user_id', 'category_id');
    // }

    // Many to Many Relationship
    public function tests()
    {
        return $this->belongsToMany('App\Model\Test')->withPivot(['score']);
    }

    // One to Many Relationship
    public function messages()
    {
        return $this->hasMany("App\Model\Message","sender_id");
    }

    // One to Many Relationship
    public function education()
    {
        return $this->hasMany("App\Model\Education");
    }

    // One to Many Relationship
    public function availabilities()
    {
        return $this->hasMany("App\Model\Availability");
    }

    // One to Many Relationship
    public function schedules()
    {
        return $this->hasMany("App\Model\Schedule", "student_id");
    }

    // One to Many Relationship
    // public function resutls()
    // {
    //     return $this->hasMany("App\Model\TestUser", "user_id");
    // }

    // One to Many Relationship
    public function notifications()
    {
        return $this->hasMany("App\Model\Notification","sender_id");
    }
    

}
