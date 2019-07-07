<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmenityHotel extends Model {
	public $timestamps = false;
	public function amenity() {
		return $this->belongsTo('App\Amenity');
	}
}
