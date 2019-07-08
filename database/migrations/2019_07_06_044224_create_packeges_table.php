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
            $table->string('one_way_price');
            $table->string('two_way_price');
            $table->integer('destination_id')->nullable()->unsigned();
            $table->text('description')->nullable();
            $table->text('inclusive_of')->nullable();
            $table->text('not_inclusive_of')->nullable();
            $table->text('booking_info')->nullable();
            $table->text('location')->nullable();
            $table->text('policy')->nullable();
            $table->string('banner')->nullable();
            $table->string('photo')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
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
