<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model {
	protected $with = ['amenities'];
	public function amenities() {
		return $this->hasMany('App\AmenityHotel');
	}
}
