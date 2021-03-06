<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;

class Observations extends Model
{
        /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['obvType'];

    function getObvTypeAttribute (){

    	if($this->whatSensed === 'liveAnimal' || $this->whatSensed === 'Live Animal') //set animal type
        {
            $x = strrev($this->animalGroup);
            $x = substr($x, 5, strlen($x));
            $x = strrev($x);

            return ucfirst($x);
        }
        else //set plant/grass type
        {
            if(strpos($this->plantKind, 'Herb')) {$this->plantKind = 'Weeds';}
            return ($this->plantKind ? $this->plantKind : $this->grassKind);

        }

        return null;
        
    }

    public function getCreatedAtAttribute($value) {
        $date = new \Carbon\Carbon($value);
        return $date->format('m-d-Y');
    }

    /* get group and teacher info */
    public function groups()
    {
        return $this->hasOne('App\Groups', 'id', 'group_id');
    }
    
    public function pgroups()
    {
        return $this->belongsTo('App\Groups', 'group_id');
    }

}
