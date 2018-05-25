<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Diaries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('diaries', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->string('title');
          $table->string('description')->nullable();
          $table->timestamps();
      });
      Schema::table('diaries', function (Blueprint $table) {
        $table->foreign('user_id')
                 ->references('id')
                 ->on('users')
                 ->onDelete('cascade')
                 ->onUpdate('cascade');
               });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diaries');
    }
}
