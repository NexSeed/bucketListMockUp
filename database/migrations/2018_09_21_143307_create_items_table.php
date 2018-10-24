<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('FK');
            $table->string('item');
            $table->date('limit_date');
            $table->tinyInteger('category_code')->default(1)->comment('1=やりたいこと 2=なりたい自分 3=ほしいモノ');
            $table->tinyInteger('rank_code')->default(0)->comment('0=ランク外 1=Top1, 2~5');
            $table->tinyInteger('status_code')->default(1)->comment('1=current 2=done 3=give up');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('items');
    }
}
