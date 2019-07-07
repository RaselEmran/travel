<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packege extends Model
{
	protected $with=['destination'];
    public function destination()
    {
    	return $this->belongsTo('App\Destination');
    }
    public function packege_option()
    {
    	return $this->hasMany('App\PackegeOption');
    }
}
