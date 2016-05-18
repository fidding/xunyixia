<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->bigincrements('id');
			$table->string('name')->nullable();//不能为空//姓名
			$table->string('password');//密码
			$table->string('email')->unique();//索引不可以重复//邮箱
			$table->string('avatar')->nullable();//头像
			$table->enum('sex',array('0','1'))->nullable();//性别
			$table->string('idnumber')->nullable();//身份证号
			//联系信息
			$table->string('phone')->nullable();//电话
			$table->string('mobilephone')->nullable();//移动电话
			$table->integer('addresscode')->unsigned()->nullable();//地址
			$table->foreign('addresscode')->references('id')->on('ex_cities')->onUpdate('cascade');
			$table->string('address')->nullable();//详细地址
			$table->string('remember_token')->nullable()->index();//索引可以重复
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
		Schema::drop('users');
	}

}
