<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packege extends Model {
	protected $with = ['destination', 'oneway', 'twoway', 'reviews'];
	public function destination() {
		return $this->belongsTo('App\Destination');
	}
	public function oneway() {
		return $this->hasMany('App\OneWayPack');
	}
	public function twoway() {
		return $this->hasMany('App\TwoWayPack');
	}
	public function reviews() {
		return $this->hasMany('App\PackageReview');
	}
}
