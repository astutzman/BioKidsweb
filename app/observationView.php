<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class observationView extends Model
{
    //
    protected $casts = [
    	'hasSeenMany' => 'int'];
}
