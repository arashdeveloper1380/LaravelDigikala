<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('code');
            $table->string('title_url');
            $table->string('code_url');
            $table->integer('price')->nullable();
            $table->integer('discounts')->nullable();
            $table->integer('view');
            $table->text('text')->nullable();
            $table->smallInteger('product_status');
            $table->smallInteger('bon')->nullable();
            $table->smallInteger('show_product')->nullable();
            $table->integer('product_number')->nullable();
            $table->integer('order_product');
            $table->text('keywords')->nullable();
            $table->text('description')->nullable();
            $table->smallInteger('special');
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
        Schema::dropIfExists('product');
    }
}
