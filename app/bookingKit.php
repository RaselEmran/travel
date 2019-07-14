<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bookingKit extends Model
{
    protected $with =['tarvelkit'];
    public function tarvelkit()
    {
    	return $this->belongsTo('App\TravelKit','travel_kit_id');
    }
}
