<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackegeItinariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packege_itinaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('packege_option_id')->nullable()->unsigned();
            $table->string('itinary_date')->nullable();
            $table->string('itinary_name')->nullable();
            $table->timestamps();
            $table->foreign('packege_option_id')->references('id')->on('packege_options')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packege_itinaries');
    }
}
