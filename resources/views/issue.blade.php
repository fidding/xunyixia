@extends('layouts.home')
@section('title')
寻一下 发布信息
@stop
@section('homecss')
{!! HTML::style('css/bootstrap-datetimepicker.min.css') !!}
{!! HTML::style('css/fileinput.min.css') !!}
<style>
	#issue_title{
		padding:30px;
		font-size:30px;
	}
	#issue_title i{
		font-size:30px;
	}
	#description {
		margin-top: 5px;
		min-height:120px;
		overflow: hidden;
	}
	#issue_form .input-group.form-date{
		padding-right: 15px;
		padding-left: 15px;
	}
	#issue_form #issue_submit{
		display: block;
		margin:0 auto;
		width:130px;
		height:38px;
	}
	#issue_form .i-red{
		padding: 0px 5px;
		color:#ff0000;
	}
	#issue_form .form-group>div>div{
		padding-left: 0px;
	}
</style>
@stop
@section('homebody')
@include('layouts.nav')
<div  class="jh-container col-md-10 col-md-offset-1">
	<div id="issue_container" class="col-md-7">
		<div id="issue_title">
			<i class=" icon-file"></i>&nbsp;信息发布中心
		</div>
		{!! Form::open(array('url' => 'news','method'=>'post', 'files' => true,'id'=>'issue_form','class'=>'form-horizontal')) !!}
			<div class="form-group">
				<label class="col-sm-3 control-label" for="title"><b class="i-red">*</b>信息类型</label>
				<div class="col-sm-9">
					<select name="type_id" class="form-control">
					  <option value="1" selected="selected">寻物启事</option>
					  <option value="2">失物招领</option>
					  <option value="3">寻人启事</option>
					  <option value="4">寻宠启事</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="title"><b class="i-red">*</b>信息标题</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="title" name="title" placeholder="标题(必填)">
				</div>
			</div>
			<div class="form-group">
				<label for="time" class="col-sm-3 control-label"><b class="i-red">*</b>丢失日期</label>
				<div class="input-group date form-date col-sm-9" data-date="" data-date-format="dd MM yyyy" data-link-field="time" data-link-format="yyyy-mm-dd">
					<input name="time" id="time"  class="form-control" size="16" type="text" value="" readonly="readonly">
					<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
				</div>
			</div> 	
			<div class="form-group">
				<label for="address" class="col-sm-3 control-label"><b class="i-red">*</b>丢失区域</label>
				<div class="col-sm-9">
					<div class="col-md-4 ">
						<select id="province" class="form-control">
						</select>
					</div>
					<div class="col-md-4">
						<select id="city" class="form-control">
						</select>
					</div>
					<div class="col-md-4">
						<select id="district" name="addresscode" class="form-control">
						</select>
					</div>
				</div>
			</div>	
			<div class="form-group">
				<label class="col-sm-3 control-label" for="address">详细地点</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="address" name="address" placeholder="详细地点">
				</div>
			</div>	
			<div class="form-group">
				<label for="description" class="col-sm-3 control-label"><b class="i-red">*</b>详细描述</label>
		    	<div class="col-sm-9">
		   			<textarea class="form-control" id="description" name="description"></textarea>
		   		</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="image">上传图片</label>
				<div class="col-sm-9">
					<input id="issue_image" name="image[]" type="file" class="file" multiple="true">
				</div>				
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="c_name"><b class="i-red">*</b>联系人</label>
				<div class="col-sm-9">
					<input type="text" name="c_name" class="form-control" id="c_name" placeholder="联系人姓名(必填)">
				</div>
			</div>	
			<div class="form-group">
				<label class="col-sm-3 control-label" for="c_address"><b class="i-red">*</b>联系地址</label>
				<div class="col-sm-9">
					<input type="text" name="c_address" class="form-control" id="c_address" placeholder="联系地址(必填)">
				</div>
			</div>		
	
			<div class="form-group">
				<label class="col-sm-3 control-label" for="c_mobilephone"><b class="i-red">*</b>手机</label>
				<div class="col-sm-9">
					<input type="text" name="c_mobilephone" class="form-control" id="c_mobilephone" placeholder="联系手机号(必填)">
				</div>			
			</div>		
			<div class="form-group">
				<label class="col-sm-3 control-label" for="c_phone">座机</label>
				<div class="col-sm-9">	
					<input type="text" name="c_phone" class="form-control" id="c_phone" placeholder="联系座机号(可选)">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="c_email">邮箱</label>
				<div class="col-sm-9">
					<input type="text" name="c_email" class="form-control" id="c_email" placeholder="联系邮箱地址(可选)">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="c_qq">QQ</label>
				<div class="col-sm-9">
					<input type="text" name="c_qq" class="form-control" id="c_qq" placeholder="联系QQ号(可选)">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="c_wechat">微信</label>
				<div class="col-sm-9">
					<input type="text" name="c_wechat" class="form-control" id="c_wechat" placeholder="联系微信号(可选)">
				</div>
			</div>
			<div class="form-group">
				<button type="submit" id="issue_submit" class="btn jh-btn-green">发布</button>
			</div>
		{!! Form::close() !!}
	</div>
	<div class="col-md-4"> 

	</div>

</div>
@stop
@section('homejs')
{!! HTML::script('js/jQuery.FillOptions.js') !!}
{!! HTML::script('js/jQuery.CascadingSelect.js') !!}

{!! HTML::script('js/bootstrap-datetimepicker.js') !!}
{!! HTML::script('js/locales/bootstrap-datetimepicker.zh-CN.js') !!}

{!! HTML::script('js/fileinput.js') !!}
{!! HTML::script('js/fileinput_locale_zh.js') !!}
<script>
$(function (){
	$("#issue_image").fileinput({
		'language':'zh',
		'showUpload': false,
		'allowedFileTypes': ['image'],
		'allowedFileExtensions':['jpg', 'png', 'gif','jpeg','tiff','bmp','psd'],
		'maxFileSize': 4000,
	    'maxFileCount': 6
	});
	//日期选择器
    $('.form-date').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	//省市联动
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



})
</script>
@stop



