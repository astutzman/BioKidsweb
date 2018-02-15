<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{
    //
    protected $guarded = [];


	public function users()
	{
		return $this->hasMany('App\User', 'program_id');
	}

}


