<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTwoWayPacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('two_way_packs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('packege_id')->nullable()->unsigned();
            $table->string('time2');
            $table->string('itinary_name2');
            $table->timestamps();
            $table->foreign('packege_id')->references('id')->on('packeges')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('two_way_packs');
    }
}
