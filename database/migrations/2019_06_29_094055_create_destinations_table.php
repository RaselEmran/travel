<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('heading')->nullable();
            $table->string('pkg_heading')->nullable();
            $table->string('pkg_subheading')->nullable();
            $table->string('pkg_detailsheading')->nullable();
            $table->string('pkg_details_subheading')->nullable();
            $table->string('photo')->nullable();
            $table->string('banner')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('introduction')->nullable();
            $table->longText('experience')->nullable();
            $table->longText('hotel')->nullable();
            $table->longText('transportation')->nullable();
            $table->longText('culture')->nullable();
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
    public function down()
    {
        Schema::dropIfExists('destinations');
    }
}
