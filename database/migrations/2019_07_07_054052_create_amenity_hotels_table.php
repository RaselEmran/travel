<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmenityHotelsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('amenity_hotels', function (Blueprint $table) {
			$table->integer('amenity_id')->nullable()->unsigned();
			$table->foreign('amenity_id')->references('id')->on('amenities')->onDelete('cascade');
			$table->integer('hotel_id')->nullable()->unsigned();
			$table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('amenity_hotels');
	}
}
