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
	#issue_header{
		margin-top:120px;
		padding:0; 
	}
	#issue_header ul{
		list-style: none;
		margin:0;
		padding:0;
	}
	#issue_header ul li{
		float:left;
		height:40px;
		text-align: center;
		border-bottom:4px solid #eee;
	}
	#issue_header ul li.active{
		border-bottom:4px solid #3875AC;
	}	
	#issue_container{
		padding: 20px 40px;
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
	#issue_left_form #issue_previous{
		width:130px;
		height:38px;
	}
	#issue_left_form #issue_submit{
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
<div id="issue_header" class="col-sm-10  col-sm-offset-1 col-xs-12">
	<ul>
		<li class="col-sm-3 col-xs-12 hidden-xs">第1步：确定信息类型</li>
		<li class="col-sm-3 col-xs-12 hidden-xs">第2步：填写信息描述</li>
		<li class="col-sm-3 col-xs-12 hidden-xs">第3步：设置报酬</li>
		<li class="col-sm-3 col-xs-12 active">第4步：确认信息并托管报酬</li>
	</ul>
</div>
<div id="issue_container"  class="col-sm-10  col-sm-offset-1 col-xs-12">
	<div id="issue_left" class="col-md-8">
		@if($errors->any())
        <ul id="issue_left_error" class="col-md-10 col-md-offset-1 col-xs-12 alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
		@endif		
		{!! Form::open(array('url' => 'news','method'=>'post', 'files' => true,'id'=>'issue_left_form','class'=>'form-horizontal')) !!}
			<div class="form-group">
				<label class="col-sm-3 control-label" for="title">信息类型</label>
				<div class="col-sm-8">
					<div class="form-control-static">
						@if($type_id == '1') 寻物启事
						@elseif($type_id == '2') 失物招领
						@elseif($type_id == '3') 寻人启事
						@elseif($type_id == '4') 寻宠启事
						@endif
					</div>
					<input type="hidden" name="step" value="4" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="title">信息标题</label>
				<div class="col-sm-8">
					<div class="form-control-static">
						{{ $news->title }}
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="time" class="col-sm-3 control-label">报酬</label>
				<div class="col-sm-8">
					<div class="form-control-static">
						￥{{ $reward }}
					</div>
				</div>
			</div> 			
			<div class="form-group">
				<label for="time" class="col-sm-3 control-label">丢失日期</label>
				<div class="col-sm-8">
					<div class="form-control-static">
						{{ $news->time }}
					</div>
				</div>
			</div> 	
			<div class="form-group">
				<label for="address" class="col-sm-3 control-label">丢失区域</label>
				<div class="col-sm-8">
					<div class="form-control-static">
						{{ $news->addresscode }}
					</div>
				</div>
			</div>	
			<div class="form-group">
				<label class="col-sm-3 control-label" for="address">详细地点</label>
				<div class="col-sm-8">
					<div class="form-control-static">
						{{ $news->address }}
					</div>
				</div>
			</div>	
			<div class="form-group">
				<label for="description" class="col-sm-3 control-label">详细描述</label>
		    	<div class="col-sm-8">					
		    		<div class="form-control-static">
						{{ $news->description }}
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="c_name">联系人</label>
				<div class="col-sm-8">
					<div class="form-control-static">
						{{ $news->c_name }}
					</div>
				</div>
			</div>	
			<div class="form-group">
				<label class="col-sm-3 control-label" for="c_address">联系地址</label>
				<div class="col-sm-8">
					<div class="form-control-static">
						{{ $news->c_address }}
					</div>			
				</div>
			</div>		
	
			<div class="form-group">
				<label class="col-sm-3 control-label" for="c_mobilephone">手机</label>
				<div class="col-sm-8">
					<div class="form-control-static">
						{{ $news->c_mobilephone }}
					</div>
				</div>			
			</div>		
			<div class="form-group">
				<label class="col-sm-3 control-label" for="c_phone">座机</label>
				<div class="col-sm-8">	
					<div class="form-control-static">
						{{ $news->c_phone }}
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="c_email">邮箱</label>
				<div class="col-sm-8">
					<div class="form-control-static">
						{{ $news->c_email }}
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-12 text-center">
					<button type="submit" id="issue_submit" class="btn jh-btn-blue">确认支付</button>
				</div>
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
@stop



