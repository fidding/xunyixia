<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('news', function(Blueprint $table)
        {
            $table->bigincrements('id');
            $table->bigInteger('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('types')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');//标题
            $table->string('description');//详细描述
            $table->integer('addresscode');//丢失、拾取、走失区域
            $table->string('address');//详细丢失、拾取、走失地址
            $table->string('time')->nullable();//丢失、拾取、走失时间
            $table->string('c_address')->nullable();//联系人地址
            $table->string('c_name')->nullable();//联系姓名
            $table->string('c_email')->nullable();//联系邮箱
            $table->string('c_phone')->nullable();//联系电话
            $table->string('c_mobilephone')->nullable();//联系手机
            $table->string('c_qq')->nullable();//联系QQ
            $table->string('c_wechat')->nullable();//联系微信
            $table->integer('click')->default('0');//访问量
            $table->boolean('isfind')->default('0');//是否寻回
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
        Schema::drop('news');
    }
}
