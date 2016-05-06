<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tiebaid');
            $table->string('steamnick');
            $table->string('steamid',64);
            $table->string('taobaoid');
            $table->string('alipayaccount');
            $table->string('reason');
            $table->integer('editor')->nullable(false);
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
        Schema::drop('liars');
    }
}
