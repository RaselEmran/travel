<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packeges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('duration');
            $table->string('per_persion_price');
            $table->integer('destination_id')->nullable()->unsigned();
            $table->text('description');
            $table->text('inclusive_of');
            $table->text('not_inclusive_of');
            $table->text('booking_info');
            $table->text('location');
            $table->text('policy');
            $table->string('banner');
            $table->string('photo');
            $table->string('meta_title');
            $table->string('meta_keywords');
            $table->string('meta_description');
            $table->timestamps();
            $table->foreign('destination_id')->references('id')->on('destinations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packeges');
    }
}
