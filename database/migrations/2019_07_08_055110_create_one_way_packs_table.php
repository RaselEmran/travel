<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOneWayPacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('one_way_packs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('packege_id')->nullable()->unsigned();
            $table->string('time1');
            $table->string('itinary_name1');
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
        Schema::dropIfExists('one_way_packs');
    }
}
