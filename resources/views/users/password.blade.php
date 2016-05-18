@extends('layouts.user')
@section('title')
密码修改-寻一下
@stop
@section('usercss')
@stop
@section('userjs')
@stop
@section('userbody')
<div class="col-md-12">
	<h2 class="page-header">密码修改<small> Password Change</small></h2>
</div>
<div class='msg'>{{ Session::get('msg') }}</div>
{!! Form::open(['action' => 'UsersController@updatePwd','class'=>'col-md-8']) !!}
	<div class='form-group'>
		{!! Form::password('password',array('class'=>'form-control','placeHolder'=>'请输入原密码')) !!}
	</div>
	<div class='form-group'>
		{!! Form::password('new_password',array('class'=>'form-control','placeHolder'=>'请输入新密码')) !!}
	</div>
	<div class='form-group'>
		{!! Form::password('password_confirmation',array('class'=>'form-control','placeHolder'=>'请再次输入新密码')) !!}
	</div>
	<div class="btn-group">
		{!! Form::submit('重设密码',array('class'=>'btn btn-default')) !!}
	</div>
{!! Form::close() !!}
@stop