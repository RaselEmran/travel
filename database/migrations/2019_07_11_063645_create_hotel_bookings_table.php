<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelBookingsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('hotel_bookings', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('hotel_id')->nullable()->unsigned();
			$table->integer('user_id')->nullable()->unsigned();
			$table->date('check_in');
			$table->date('check_out');
			$table->integer('guest');
			$table->boolean('status')->default(false);
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
		Schema::dropIfExists('hotel_bookings');
	}
}
