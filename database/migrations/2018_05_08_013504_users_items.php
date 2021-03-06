<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('users_items', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('item_id')->unsigned();
          $table->integer('user_id')->unsigned();
          $table->integer('quantity');
          $table->timestamps();
      });
      Schema::table('users_items', function (Blueprint $table) {
        $table->foreign('user_id')
                 ->references('id')
                 ->on('users')
                 ->onDelete('cascade')
                 ->onUpdate('cascade');
               });
      Schema::table('users_items', function (Blueprint $table) {
       $table->foreign('item_id')
                ->references('id')
                ->on('items')
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
        Schema::table('users_items', function (Blueprint $table) {
            $table->dropForeign('users_items_user_id_foreign');
        });
        Schema::table('users_items', function (Blueprint $table) {
            $table->dropForeign('users_items_item_id_foreign');
        });
        Schema::dropIfExists('users_items');
    }
}
