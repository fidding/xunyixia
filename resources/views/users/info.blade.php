@extends('layouts.user')
@section('title')
用户中心-寻一下
@stop
@section('usercss')
{!! HTML::style('css/bootstrap-datetimepicker.min.css') !!}
<style>
#info_form{
	margin-top:110px;
}
.form-control,.radio-inline{
	display:none;
}
.panel-info{
	border-color: #EEEEEE;
}
.panel-info>.panel-heading {
	color: #000;
	background-color: rgba(250, 250, 250, 0.6);
	border-color: #EEEEEE;
}
.edit_info,#add_work{
	float:right;
	cursor: pointer;
	display:block;
}
.cancel{
	float:right;
	cursor: pointer;
	display: none;
	margin-right: 20px;
}
.form_date{
	float: left!important;
}	
</style>
@stop
@section('userjs')
{!! HTML::script('js/jQuery.FillOptions.js') !!}
{!! HTML::script('js/jQuery.CascadingSelect.js') !!}
{!! HTML::script('js/bootstrap-datetimepicker.min.js') !!}
{!! HTML::script('js/locales/bootstrap-datetimepicker.zh-CN.js') !!}
<script>
$(function(){
	$(".edit_info").click(function(){
		if($(this).data('submit')){
			$("#info_form").submit();
		}else{
			$(this).data('submit',true).text('更新').next().show();
			$(this).parent().next('.panel-body').find(".form-control").toggle();
			$(this).parent().next('.panel-body').find(".radio-inline").toggle();
			$(this).parent().next('.panel-body').find(".form-control-static").toggle();
		}
	});
	$(".cancel").click(function(){
		$(this).hide().prev().text('修改').data('submit',false);
		$(this).parent().next('.panel-body').find(".form-control").toggle();
		$(this).parent().next('.panel-body').find(".radio-inline").toggle();
		$(this).parent().next('.panel-body').find(".form-control-static").toggle();

	});
	$("#province").FillOptions(
			"/province",
			{
			datatype:"json",
			textfield:"city",
			valuefiled:"id",
			//selectedindex:0,//填充并选中第1项
			keepold:false//填充并且保留原有项
			}
	);
	$("#city").FillOptions(
			"/city/110000",
			{
			datatype:"json",
			textfield:"city",
			valuefiled:"id",
			//selectedindex:0,//填充并选中第1项
			keepold:false//填充并且保留原有项
			}
	);
	$("#district").FillOptions(
			"/district/110100",
			{
			datatype:"json",
			textfield:"city",
			valuefiled:"id",
			//selectedindex:0,//填充并选中第1项
			keepold:false//填充并且保留原有项
			}
	);
	$("#province").CascadingSelect(
		   $("#city"),//需要联动的下拉列表框，必须
		   "/city",
		   {datatype:"json",textfield:"city",valuefiled:"id"},//通过设置parameter:”p”这个参数会生成一个"handler1.ashx?p=xxx”这样的地址来做ajax请求
		   function(){//完成联动后执行
				$("#district").FillOptions(
						"/district/"+ $("#city").val(),
						{
						datatype:"json",
						textfield:"city",
						valuefiled:"id",
						//selectedindex:0,//填充并选中第1项
						keepold:false//填充并且保留原有项
						}
				);
		   }
	);
	$("#city").CascadingSelect(
		   $("#district"),//需要联动的下拉列表框，必须
		   "/district",
		   {datatype:"json",textfield:"city",valuefiled:"id"},//通过设置parameter:”p”这个参数会生成一个"handler1.ashx?p=xxx”这样的地址来做ajax请求
		   function(){//完成联动后执行
				//alert('a');
		   }
	);	
});	
</script>
@stop
@section('userbody')
<div class="col-md-12">
	<h2 class="page-header">个人信息<small> Personal Information</small></h2>
</div>
{!! Form::model($user, ['method'=>'PUT','id'=>'info_form','class'=>'form-horizontal clearfix','action'=>array('UsersController@update')]) !!}
<div class="panel panel-info">
	<div class="panel-heading">基本信息<div class="edit_info">修改</div><div class="cancel">取消</div></div>
	<div class="panel-body">
		<div class="form-group">
			{!! Form::label('name', '姓名',array('class'=>'col-md-2 control-label')) !!}
			<div class="col-md-10">
				{!! Form::text('name',null,array('class'=>'form-control')) !!}
				<p class="form-control-static">{{ $user->name }}</p>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('addresscode', '所在地',array('class'=>'col-md-2 control-label')) !!}
			<div class="col-md-10">
				<div class="col-md-4 ">
					<select id="province" class="form-control"></select>
				</div>
				<div class="col-md-4">
					<select id="city" class="form-control"></select>
				</div>
				<div class="col-md-4">
					<select id="district" name="addresscode" class="form-control"></select>
				</div>
				<p class="form-control-static">{{ $user->addresscode }}</p>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('created_at', '详细地址',array('class'=>'col-md-2 control-label')) !!}
			<div class="col-md-10">
				{!! Form::text('address',null,array('class'=>'form-control')) !!}
				<p class="form-control-static">{{ $user->address }}</p>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('created_at', '注册时间',array('class'=>'col-md-2 control-label')) !!}
			<div class="col-md-10">
				{!! Form::text('created_at',null,array('class'=>'form-control','disabled'=>'')) !!}
				<p class="form-control-static">{{ $user->created_at }}</p>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('idnumber', '身份证号',array('class'=>'col-md-2 control-label')) !!}
			<div class="col-md-10">
				{!! Form::text('idnumber',null,array('class'=>'form-control')) !!}
				<p class="form-control-static">{{ $user->idnumber }}</p>
			</div>
		</div>
	</div>
</div>
<div class="panel panel-info">
	<div class="panel-heading">联系信息<div class="edit_info">修改</div><div class="cancel">取消</div></div>
	<div class="panel-body">
		<div class="form-group">
			{!! Form::label('phone', '电话',array('class'=>'col-md-2 control-label')) !!}
			<div class="col-md-10">
				{!! Form::text('phone',null,array('class'=>'form-control')) !!}
				<p class="form-control-static">{{ $user->phone }}</p>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('mobilephone', '手机',array('class'=>'col-md-2 control-label')) !!}
			<div class="col-md-10">
				{!! Form::text('mobilephone',null,array('class'=>'form-control')) !!}
				<p class="form-control-static">{{ $user->mobilephone }}</p>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('email', '邮箱',array('class'=>'col-md-2 control-label')) !!}
			<div class="col-md-10">
				{!! Form::text('email',null,array('class'=>'form-control','disabled'=>'')) !!}
				<p class="form-control-static">{{ $user->email }}</p>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('qq', 'QQ',array('class'=>'col-md-2 control-label')) !!}
			<div class="col-md-10">
				{!! Form::text('qq',null,array('class'=>'form-control')) !!}
				<p class="form-control-static">{{ $user->qq }}</p>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('wechat', '微信号',array('class'=>'col-md-2 control-label')) !!}
			<div class="col-md-10">
				{!! Form::text('wechat',null,array('class'=>'form-control')) !!}
				<p class="form-control-static">{{ $user->wechat }}</p>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}

@stop
