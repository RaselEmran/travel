<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfirmKitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirm_kits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->unsigned();
            $table->string('pick_up_date');
            $table->string('pick_up_time');
            $table->string('location');
            $table->string('location_name');
            $table->string('total_amt');
            $table->string('paid_amt')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('payment_date')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('status')->nullable();
            $table->string('token')->nullable();
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
        Schema::dropIfExists('confirm_kits');
    }
}
