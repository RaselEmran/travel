<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelReview extends Model {
	protected $with = ['user'];
	public function user() {
		return $this->belongsTo('App\User');
	}
}
