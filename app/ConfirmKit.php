<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfirmKit extends Model
{
	protected $with =['user','kits'];
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function kits()
    {
    	return $this->hasMany('App\bookingKit');
    }
}
