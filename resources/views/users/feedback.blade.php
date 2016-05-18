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
	<h2 class="page-header">意见反馈<small> Feedback</small></h2>
</div>
<div class='msg'>
	{{ Session::get('msg') }}
</div>
{!! Form::model($user, array('id'=>'feedbackform','class'=>'col-md-9','method'=>'POST','action' => 'FeedbacksController@store'))  !!}
	<div class='form-group'>
		{!! Form::text('name',null,array('class'=>'form-control','placeHolder'=>'姓名')) !!}
	</div>
	<div class='form-group'>
		{!! Form::text('email',null,array('class'=>'form-control','placeHolder'=>'邮箱')) !!}
	</div>
	<div class='form-group'>
		{!! Form::text('title',null,array('class'=>'form-control','placeHolder'=>'标题')) !!}
	</div>
	<div class='form-group'>
		{!! Form::textarea ('content',null,array('class'=>'form-control','placeHolder'=>'请输入反馈信息')) !!}
	</div>
	<div class="btn-group">
		{!! Form::submit('提交反馈',array('class'=>'btn btn-default')) !!}
	</div>
{!! Form::close() !!}
@stop