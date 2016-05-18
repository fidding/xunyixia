<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('mailRecord', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->bigInteger('from')->unsigned();
            $table->foreign('from')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('to')->unsigned();
            $table->foreign('to')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');           
            $table->string('content');
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
        Schema::drop('mailRecord'); 
    }
}
