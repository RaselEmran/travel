<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model {
	protected $with = ['amenities', 'reviews'];
	public function amenities() {
		return $this->hasMany('App\AmenityHotel');
	}
	public function reviews() {
		return $this->hasMany('App\HotelReview');
	}
}
