<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserItinariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_itinaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_packege_id')->nullable()->unsigned();
            $table->integer('user_id')->nullable()->unsigned();
            $table->string('type');
            $table->string('time');
            $table->string('name');
            $table->string('date');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_itinaries');
    }
}
