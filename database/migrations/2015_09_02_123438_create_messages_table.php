<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('messages', function(Blueprint $table)
        {
            $table->bigincrements('id');
            $table->bigInteger('user_id')->unsigned();//留言者id
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->bigInteger('new_id')->unsigned();//留言新闻id
            $table->foreign('new_id')->references('id')->on('news')->onUpdate('cascade')->onDelete('cascade');
            $table->string('message');//留言内容
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
        //
        Schema::drop('messages');
    }
}
