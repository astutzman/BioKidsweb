<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    //
    protected $guarded = [];

	public function teacher()
	{
		return $this->hasOne('App\User', 'id', 'user_id');
	}
}
