<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Packege extends Model {
	use SearchableTrait;

	/**
	 * Searchable rules.
	 *
	 * @var array
	 */
	protected $searchable = [
		/**
		 * Columns and their priority in search results.
		 * Columns with higher values are more important.
		 * Columns with equal values have equal importance.
		 *
		 * @var array
		 */
		'columns' => [
			'packeges.name' => 10,
			'packeges.description' => 9,
			'packeges.inclusive_of' => 8,
			'packeges.not_inclusive_of' => 7,
			'packeges.booking_info' => 6,
			'packeges.policy' => 5,
			'packeges.meta_title' => 4,
			'packeges.meta_keywords' => 3,
			'packeges.meta_description' => 2,
			'destinations.name' => 1,
			'destinations.heading' => 1,
			'destinations.pkg_heading' => 1,
			'destinations.pkg_subheading' => 1,
			'destinations.pkg_detailsheading' => 1,
			'destinations.pkg_details_subheading' => 1,
			'destinations.short_description' => 1,
			'destinations.introduction' => 1,
			'destinations.experience' => 1,
			'destinations.hotel' => 1,
			'destinations.transportation' => 1,
			'destinations.culture' => 1,
		],
		'joins' => [
			'destinations' => ['destinations.id', 'packeges.destination_id'],
		],
	];

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
