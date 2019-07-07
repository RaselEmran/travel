<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('hotels', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name')->nullable();
			$table->string('entire_place')->nullable();
			$table->double('price', 10, 2)->default(0.00);
			$table->text('room_details')->nullable();
			$table->text('allow')->nullable();
			$table->text('map')->nullable();
			$table->text('policy')->nullable();
			$table->text('banner')->nullable();
			$table->string('photo')->nullable();
			$table->boolean('status')->default(1);
			$table->string('meta_title')->nullable();
			$table->string('meta_keywords')->nullable();
			$table->text('meta_description')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('hotels');
	}
}
