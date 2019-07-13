<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingKitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_kits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('confirm_kit_id')->nullable()->unsigned();
            $table->integer('travel_kit_id')->nullable()->unsigned();
            $table->string('price');
            $table->string('quantity');
            $table->timestamps();
            $table->foreign('confirm_kit_id')->references('id')->on('confirm_kits')->onDelete('cascade');
            $table->foreign('travel_kit_id')->references('id')->on('travel_kits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_kits');
    }
}
