<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
	protected $guarded = [];
    //
    public function trackers()
    {
    	return $this->hasOne('App\Trackers', 'id', 'tracker_id');
    }

    public function teachers()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function users()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function observations()
    {
        return $this->hasMany('App\Observations', 'group_id');
    }

}
