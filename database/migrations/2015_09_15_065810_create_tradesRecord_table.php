<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTradesRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tradesRecord', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->bigInteger('propose_id')->unsigned();
            $table->foreign('propose_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('receive_id')->unsigned();
            $table->foreign('receive_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');            
            $table->bigInteger('new_id')->unsigned();
            $table->foreign('new_id')->references('id')->on('news')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('state')->unsigned();//状态
            $table->foreign('state')->references('id')->on('trades')->onUpdate('cascade')->onDelete('cascade');            
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobilephone')->nullable();
            $table->enum('iscancel',array('0','1'))->default(0);//是否取消
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
        Schema::drop('tradesRecord');        
    }
}
