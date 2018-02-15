<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'program_id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /** Find Program for Teacher **/
    function programs()
    {
        return $this->hasOne('App\Programs', 'id', 'program_id');
    }

    /** Find Locations for Teacher **/
    function locations()
    {
        return $this->hasMany('App\Locations', 'user_id');
    }

    /** Find Groups for Teacher **/
    function groups()
    {
        return $this->hasMany('App\Groups', 'user_id');
    }
}
