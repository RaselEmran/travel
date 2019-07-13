<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelBooking extends Model {
	protected $with = ['hotel', 'user'];
	public function hotel() {
		return $this->belongsTo('App\Hotel');
	}

	public function user() {
		return $this->belongsTo('App\User');
	}
}
