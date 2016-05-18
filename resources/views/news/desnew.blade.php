@extends('layouts.home')
@section('title')
{{ $type }}-寻一下
@stop
@section('homecss')
{!! HTML::style('css/bootstrap-datetimepicker.min.css') !!}
{!! HTML::style('css/fileinput.min.css') !!}
<style>
	body{
		background-color: #eee;
	}
	#desnew_container{
		padding: 20px 40px;
		margin-top: 60px;
		margin-bottom: 20px;
		background-color: #fff;
	}
	#desnew_left{
		border-right:1px solid #eee;
	}
	#desnew_title{
		color:#929497;
		margin:0px 10px 30px;
	}
	#desnew_title span{
		font-size:20px;
		padding-bottom: 10px;
		border-bottom: 2px solid #929497;
	}
	#desnew_title i{
		font-size:20px;
	}
	#desnew_list section{
		padding:12px 0;
		border-bottom:1px dashed #eee;
	}
	.new-header{
		line-height: 1.2;
		padding-right:10px;
	}
	.new-header .answer{
		text-align:center;
		color:#fff;
		display:inline-block;
		padding: 4px 10px;
		background-color: #3875ac;		
	}
	.new-header small{
		display: block;
		font-size:12px;
	}
	.new-header .click{
		display:inline-block;
		text-align: center;
		padding: 4px 10px;
		color:#666;
	}
	.new-summary{
		margin-right:10px;
	}
	.new-summary ul{
		color:#666;
		list-style: none;
		padding:0px;
		margin-bottom: 5px;
	}
	.new-summary ul li{
		float:left;
		padding-right:10px;

	}
	.new-summary h2{
		margin: 0 5px 0 0;
		font-size: 17px;
	}
	.new-summary h2 a{
		font-weight:bold;
		margin: 0 5px 0 0;
		font-size: 16px;	
		color:#222;	
	}
	.new-summary h2 a:hover{
		color:#3875ac;
	}
	#desnew_right{
		padding:0px 20px;
	}
	#desnew_right h4{
		color: #B2B2B2;
		border-bottom:1px solid #eee;
		padding-top:0px;
		padding-bottom:10px;
	}
	#desnew_right p{
		line-height: 1.5em;
		color:#8C8C8C;
	}
	#desnew_right_issue>a{
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
	#desnew_left_issue>a:hover{
		background-color: #1976d2;
		color:#fff;
	}
	#desnew_right_new div{
		padding:5px 0px;
	}
	#desnew_right_notification p{
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
<div id="desnew_container"  class="col-sm-10  col-sm-offset-1 col-xs-12">
	<div id="desnew_left" class="col-md-8 form-horizontal" >
		<div id="desnew_title">
			<span>
				&nbsp;{{ $type }}
			</span>
		</div>	
		<div id="desnew_filter">	
		</div>
		<div id="desnew_list">
			@if(count($news))
				@foreach($news as $new)
					<section class="clearfix">
						<div class="new-header pull-left " >
							<div class="answer ">
								{{ $new->msg_count }}
								<small>回复</small>
							</div>
							<div class="click hidden-xs">
								{{ $new->click }}
								<small>浏览</small>								
							</div>
						</div>
						<div class="new-summary pull-left">
							<ul class="clearfix"><li>{{ $new->user_id }}&nbsp;,</li><li>{{ $new->addresscode }}&nbsp;,</li><li>{{ $new->created_at }}</li></ul>
							<h2><a href="{{ url('news/'.$new->id) }}">{{ $new->title?$new->title:'该主人很懒,尚未发布标题信息' }}</a></h2>
						</div>
					</section>	
				@endforeach
				<div  class="text-center">{!! $news->render() !!}</div>
				
			@else 
				很抱歉,尚无任何关于{{ $type }}的信息。
			@endif
		</div>
	</div>
	<div id="desnew_right"  class="col-md-4 clearfix">
		<div id="desnew_right_issue">
			<h4>快捷入口</h4>
			<a  href="{{ url('news/create') }}">信息发布</a>
		</div>
		<div id="desnew_right_notification">
			<h4>最新公告<a class="issue-lookmore pull-right" href="{{ url('news/notifications') }}">更多</a></h4>
			<p>"寻一下"致力打造全国最专业的寻物启事及失物招领信息发布平台，不管你是丢失了东西或是捡到了物品，都可以到这里来发布信息，让失主尽快找到失物。 
			</p>
			<p>
			骗子经常利用本网站发布的寻物信息，拨打失主的电话进行诈骗，谎称捡到了失主的物品然后让失主打款，请网友提高警惕，谨防上当受骗！
			</p>
		</div>
		<div id="desnew_right_new">
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



