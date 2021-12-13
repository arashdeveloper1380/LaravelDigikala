<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmazingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amazing', function (Blueprint $table) {
            $table->increments('id');
            $table->string('m_title');
            $table->string('title');
            $table->text('tozihat');
            $table->integer('price1');
            $table->integer('price2');
            $table->integer('product_id');
            $table->integer('time');
            $table->integer('timestamp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amazing');
    }
}
