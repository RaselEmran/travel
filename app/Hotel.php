<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Hotel extends Model {
	use SearchableTrait;
	protected $with = ['amenities', 'reviews'];

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
			'hotels.name' => 10,
			'hotels.entire_place' => 9,
			'hotels.room_details' => 8,
			'hotels.allow' => 7,
			'hotels.policy' => 6,
			'hotels.meta_title' => 5,
			'hotels.meta_keywords' => 4,
			'hotels.meta_description' => 3,
		],
	];
	public function amenities() {
		return $this->hasMany('App\AmenityHotel');
	}
	public function reviews() {
		return $this->hasMany('App\HotelReview');
	}
}
