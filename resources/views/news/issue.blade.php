@extends('layouts.home')
@section('title')
发布信息-寻一下 
@stop
@section('homecss')
{!! HTML::style('css/bootstrap-datetimepicker.min.css') !!}
{!! HTML::style('css/fileinput.min.css') !!}
<style>
	body{
		background-color: #eee;
	}
	#issue_container{
		padding: 20px 40px;
		margin-top: 60px;
		margin-bottom: 20px;
		background-color: #fff;		
	}
	#issue_left{
		border-right:1px solid #eee;		
	}	
	#issue_left_type{
		color:#929497;
		margin:0px 10px 30px;
	}
	#issue_left_type span{
		font-size:20px;
		padding-bottom: 10px;
		border-bottom: 2px solid #929497;
	}	
	#description {
		margin-top: 5px;
		min-height:120px;
		overflow: hidden;
	}
	#issue_left_error{
		list-style: none;
	}
	#issue_left_form .input-group.form-date{
		padding-right: 15px;
		padding-left: 15px;
	}
	#issue_left_form #issue_submit{
		display: block;
		margin:0 auto;
		width:130px;
		height:38px;
	}
	#issue_left_form .i-red{
		padding: 0px 5px;
		color:#ff0000;
	}
	#issue_left_form .form-group>div>div{
		padding-left: 0px;
	}
	#issue_right{
		padding:0px 20px;
	}
	#issue_right h4{
		color: #B2B2B2;
		border-bottom:1px solid #eee;
		padding-top:0px;
		padding-bottom:10px;
	}
	#issue_right p{
		line-height: 1.5em;
		color:#8C8C8C;
	}
	#issue_right_notification p{
		text-indent: 2em;
	}
	#issue_right_issue>a{
	    border: 1px solid #1976d2;
	    color: #1976d2;
	    display: block;
	    font-size: 19px;
	    margin: 0 0 12px;
	    padding: 7px 0;
	    text-align: center;
	    text-decoration: none;
	    cursor: pointer;		
	}
	#issue_right_issue>a:hover{
		background-color: #1976d2;
		color:#fff;
	}
	#issue_right_new div{
		padding:5px 0px;
	}
	#issue_right_notification p{
		text-indent: 2em;
	}
	.issue-lookmore{
		cursor:pointer;
		padding: 5px 12px;
		display: inline-block;
		font-size: 12px;
		font-weight: 700;
		line-height: 1;
		color: #3875ac;
		background-color:#fff;
		border:1px solid #3875ac;
		text-align: center;
		white-space: nowrap;
		vertical-align: baseline;
		border-radius: 10px;
	}
	.issue-lookmore:hover{
		background-color:#3875ac;
		color:#fff;
		text-decoration: none;
	}
</style>
@stop
@section('homebody')
@include('layouts.nav')
<div id="issue_container"  class="col-sm-10  col-sm-offset-1 col-xs-12">
	<div id="issue_left" class="col-md-8">
		<div id="issue_left_type">
			<span>
				&nbsp;信息发布
			</span>		
		</div>
		@if($errors->any())
        <ul id="issue_left_error" class="col-md-10 col-md-offset-1 col-xs-12 alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
		@endif		
		{!! Form::open(array('url' => 'news','method'=>'post', 'files' => true,'id'=>'issue_left_form','class'=>'form-horizontal')) !!}
			<div class="form-group">
				<label class="col-sm-3 control-label" for="title"><b class="i-red">*</b>信息类型</label>
				{{ old('type_id') }}
				<div class="col-sm-8">
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
				<div class="col-sm-8">
					<input type="text" class="form-control" id="title" value="{{ old('title') }}" name="title" placeholder="标题(必填)">
				</div>
			</div>
			<div class="form-group">
				<label for="time" class="col-sm-3 control-label"><b class="i-red">*</b>丢失日期</label>
				<div class="input-group date form-date col-sm-8" data-date="" data-date-format="dd MM yyyy" data-link-field="time" data-link-format="yyyy-mm-dd">
					<input name="time" id="time"  class="form-control" size="16" type="text" value="{{ old('time') }}" readonly="readonly">
					<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
				</div>
			</div> 	
			<div class="form-group">
				<label for="address" class="col-sm-3 control-label"><b class="i-red">*</b>丢失区域</label>
				<div class="col-sm-8">
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
				<div class="col-sm-8">
					<input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" placeholder="详细地点">
				</div>
			</div>	
			<div class="form-group">
				<label for="description" class="col-sm-3 control-label"><b class="i-red">*</b>详细描述</label>
		    	<div class="col-sm-8">
		   			<textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
		   		</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="image">上传图片</label>
				<div class="col-sm-8">
					<input id="issue_image" name="image[]" type="file" value="{{ old('image[]') }}" class="file" multiple="true">
				</div>				
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="c_name"><b class="i-red">*</b>联系人</label>
				<div class="col-sm-8">
					<input type="text" name="c_name" class="form-control" value="{{ old('c_name') }}" id="c_name" placeholder="联系人姓名(必填)">
				</div>
			</div>	
			<div class="form-group">
				<label class="col-sm-3 control-label" for="c_address"><b class="i-red">*</b>联系地址</label>
				<div class="col-sm-8">
					<input type="text" name="c_address" class="form-control" value="{{ old('c_address') }}"  id="c_address" placeholder="联系地址(必填)">
				</div>
			</div>		
	
			<div class="form-group">
				<label class="col-sm-3 control-label" for="c_mobilephone"><b class="i-red">*</b>手机</label>
				<div class="col-sm-8">
					<input type="text" name="c_mobilephone" class="form-control" value="{{ old('c_mobilephone') }}" id="c_mobilephone" placeholder="联系手机号(必填)">
				</div>			
			</div>		
			<div class="form-group">
				<label class="col-sm-3 control-label" for="c_phone">座机</label>
				<div class="col-sm-8">	
					<input type="text" name="c_phone" class="form-control" value="{{ old('c_phone') }}" id="c_phone" placeholder="联系座机号(可选)">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="c_email">邮箱</label>
				<div class="col-sm-8">
					<input type="text" name="c_email" class="form-control" value="{{ old('c_email') }}" id="c_email" placeholder="联系邮箱地址(可选)">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="c_qq">QQ</label>
				<div class="col-sm-8">
					<input type="text" name="c_qq" class="form-control" value="{{ old('c_qq') }}"  id="c_qq" placeholder="联系QQ号(可选)">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="c_wechat">微信</label>
				<div class="col-sm-8">
					<input type="text" name="c_wechat" class="form-control" value="{{ old('c_wechat') }}"  id="c_wechat" placeholder="联系微信号(可选)">
				</div>
			</div>
			<div class="form-group">
				<button type="submit" id="issue_submit" class="btn jh-btn-green">发布信息</button>
			</div>
		{!! Form::close() !!}
	</div>
	<div  id="issue_right" class="col-md-4"> 
		<div id="issue_right_issue">
			<h4>快捷入口</h4>
			<a  href="{{ url('news/create') }}">信息发布</a>
		</div>
		<div id="issue_right_notification">
			<h4>最新公告<a class="issue-lookmore pull-right" href="{{ url('news/notifications') }}">更多</a></h4>
			<p>"寻一下"致力打造全国最专业的寻物启事及失物招领信息发布平台，不管你是丢失了东西或是捡到了物品，都可以到这里来发布信息，让失主尽快找到失物。 
			</p>
			<p>
			骗子经常利用本网站发布的寻物信息，拨打失主的电话进行诈骗，谎称捡到了失主的物品然后让失主打款，请网友提高警惕，谨防上当受骗！
			</p>
		</div>
		<div id="issue_right_new">
			<h4>最新信息<a class="issue-lookmore pull-right" href="{{ url('news/lastNews') }}">更多</a></h4>
			@if(count($lastNews))
				@foreach($lastNews as $lastNew)
					<div><a href="{{ url('news/'.$lastNew->id) }}">{{ $lastNew->title?$lastNew->title:'该主人很懒,尚未发布标题信息' }}</a><span class="pull-right">{{ Date::parse($lastNew->created_at)->diffForHumans()}}创建</span></div>
				@endforeach
			@endif
		</div>
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



