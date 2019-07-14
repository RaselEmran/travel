<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelReviewsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('hotel_reviews', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('hotel_id')->nullable()->unsigned();
			$table->integer('user_id')->nullable()->unsigned();
			$table->text('review');
			$table->double('rate', 2, 1);
			$table->string('status')->default('pending');
			$table->timestamps();
			$table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('hotel_reviews');
	}
}
