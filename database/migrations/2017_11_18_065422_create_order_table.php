<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('address_id');
            $table->integer('user_id');
            $table->integer('time');
            $table->string('date');
            $table->smallInteger('pay_type');
            $table->smallInteger('pay_status');
            $table->smallInteger('order_status');
            $table->integer('total_price');
            $table->integer('price');
            $table->string('code1')->nullable();
            $table->string('code2')->nullable();
            $table->string('order_read');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
