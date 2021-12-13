<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftCart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gift_cart', function (Blueprint $table) {
            $table->increments('id');
            $table->string("code");
            $table->integer("value");
            $table->integer("time");
            $table->integer('user_id');
            $table->string('date');
            $table->integer("value2");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gift_cart');
    }
}
