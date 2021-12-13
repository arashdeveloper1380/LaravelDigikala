<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('option_name')->nullable();
            $table->string('option_value')->nullable();
        });

        DB::table('setting')->insert([
           'option_name'=>'TerminalId',
           'option_value'=>''
        ]);
        DB::table('setting')->insert([
            'option_name'=>'Username',
            'option_value'=>''
        ]);
        DB::table('setting')->insert([
            'option_name'=>'Password',
            'option_value'=>''
        ]);
        DB::table('setting')->insert([
            'option_name'=>'MerchantID',
            'option_value'=>''
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting');
    }
}
