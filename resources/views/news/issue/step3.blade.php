@extends('layouts.home')
@section('title')
发布信息-寻一下 
@stop
@section('homecss')
{!! HTML::style('skins/square/blue.css') !!}
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
	.reward-group{
		margin-bottom: 50px;
	}
	#issue_left_form .type-label{
		font-size:18px;
		padding:2px 5px;
		color:#999;
		cursor:pointer;
	}
	#issue_left_form #issue_previous{
		width:130px;
		height:38px;
	}
	#issue_left_form #issue_submit{

		width:130px;
		height:38px;
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
		<li class="col-sm-3 col-xs-12 active">第3步：设置报酬</li>
		<li class="col-sm-3 col-xs-12  hidden-xs">第4步：确认信息并托管报酬</li>
	</ul>
</div>
<div id="issue_container"  class="col-sm-10  col-sm-offset-1 col-xs-12">
	<div id="issue_left" class="col-md-8">
		<div id="issue_left_type">
			<span>
				&nbsp;信息发布
			</span>		
		</div>
		{!! Form::open(array('action' => array('NewsController@store'),'method'=>'post','id'=>'issue_left_form','class'=>'form-horizontal')) !!}
			<input type="hidden" name="step" value="3" />
			<div class="form-group reward-group">
				<label class="col-sm-3 control-label" for="reward">请设置报酬金额￥ </label>
				<div class=" col-sm-6">
					<input type="text" class="form-control" id="reward" name="reward"  value="{{ old('reward') }}"placeholder="请输入报酬金额" autofocus="focus" >
				</div>
			</div>
			<div class="form-group text-right col-sm-12">
				<div class="col-sm-6 text-center">
					<input type="button" id="issue_previous" class="btn jh-btn-gray" value="上一步" />
				</div>
				<div class="col-sm-6 text-center">
					<button type="submit" id="issue_submit" class="btn jh-btn-blue">下一步</button>				
				</div>
			</div>
		{!! Form::close() !!}
	</div>

	<div  id="issue_right" class="col-md-4 col-sm-12"> 
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
	</div>

</div>
@stop
@section('homejs')
{!! HTML::script('js/icheck.js') !!}
<script>
$(function (){
	$('input').iCheck({
	    checkboxClass: 'icheckbox_square-blue',
	    radioClass: 'iradio_square-blue',
	    increaseArea: '20%'
	});
})
</script>
@stop



