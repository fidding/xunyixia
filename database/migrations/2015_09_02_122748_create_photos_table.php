<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('photos', function(Blueprint $table)
        {
            $table->bigincrements('id');
            $table->bigInteger('new_id')->unsigned();
            $table->foreign('new_id')->references('id')->on('news')->onUpdate('cascade')->onDelete('cascade');
            $table->string('filename');//存放文件地址名 md5
            $table->string('oldname');//用户上传文件名
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
        Schema::drop('photos');
    }
}
