<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPackegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_packeges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('packege_id')->nullable()->unsigned();
            $table->integer('user_id')->nullable()->unsigned();
            $table->string('type');
            $table->string('depart_date');
            $table->string('pack_quantity');
            $table->string('price');
            $table->string('total');
            $table->boolean('status')->default(false);
            $table->string('date');
            $table->timestamps();
            $table->foreign('packege_id')->references('id')->on('packeges')->onDelete('cascade');
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
        Schema::dropIfExists('user_packeges');
    }
}
