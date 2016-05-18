@extends('layouts.home')
@section('title')
寻一下 信息中心
@stop
@section('homecss')
{!! HTML::style('css/bootstrap-datetimepicker.min.css') !!}
{!! HTML::style('css/fileinput.min.css') !!}
<style>
	body{
		background-color: #eee;
	}
	#new_container{
		padding: 20px 40px;
		margin-top: 60px;
		margin-bottom: 20px;
		background-color: #fff;		
	}
	#new_left{
		border-right:1px solid #eee;		
	}
	#new_left_type{
		color:#929497;
		margin:0px 10px 30px;
	}
	#new_left_type span{
		font-size:20px;
		padding-bottom: 10px;
		border-bottom: 2px solid #929497;
	}
	#new_left_title{
		color:#666;
		font-size:24px;
		text-align:center;
		margin-bottom:35px;
	}
	#new_left_state{
		padding: 6px 10px;
		margin-top:6px;
	}
	.badge-red{
		background-color:#AD5E5E;
	}
	.badge-blue{
		background-color:#3875AC;
	}
	#new_left_title span{
		text-align: center;
		font-size:12px;
	}
	.new_left_block_title{
		padding-left:20px;
		color: #3875AC;
		font-size: 16px;
	}
	.new_left_img{
		margin: 12px auto;
		max-width: 95%;
	}
	#new_left_info .form-group label{
		text-align: right;
	}
	#new_left_info .input-group.form-date{
		padding-right: 15px;
		padding-left: 15px;
	}
	#new_left_info #issue_submit{
		display: block;
		margin:0 auto;
		width:130px;
		height:38px;
	}
	#new_left_info .form-group>div>div{
		padding-left: 0px;
	}
	#new_left_message ul{
		list-style: none;
		margin:0px 0px 5px 0px;
		padding:0px;
	}
	#new_left_message ul li{
		float:left;
		color:#777;
		font-size:12px;
	}
	#new_left_message ul li a{
		cursor: pointer;
		padding-right:10px;
		font-weight: bold;
	}
	#new_left_message ul li p{
		padding:4px 0px;
		color:#666;
		font-size:14px;
		line-height:1.5em;
	}
	.new_left_avatar{
		width:50px;
		height:50px;
	}
	#new_left_message_form{
		margin:10px 0px;
	}
	#new_left_message_form textarea{
		height:100px;
	}
	#new_left_message_form input{
		width: 75px;
		height: 32px;
		border-radius: 4px;	
	}
	#new_right{
		padding:0px 20px;
	}
	#new_right h4{
		color: #B2B2B2;
		border-bottom:1px solid #eee;
		padding-top:0px;
		padding-bottom:10px;
	}
	#new_right p{
		line-height: 1.5em;
		color:#8C8C8C;
	}
	#new_right_notification p{
		text-indent: 2em;
	}
	#new_right_issue>a{
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
	#new_right_issue>a:hover{
		background-color: #1976d2;
		color:#fff;
	}
	#new_right_new div{
		padding:5px 0px;
	}
	#new_right_notification p{
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
<div id="new_container" class="col-sm-10  col-sm-offset-1 col-xs-12">
	<div id="new_left" class="col-md-8 form-horizontal" >
		<div id="new_left_type">
			<span>
				&nbsp;{{ $new->type_id }}
			</span>
		</div>
		<div id="new_left_title">
			{{ $new->title }} <span id="new_left_state" class="badge pull-right @if($new->isfind == '寻找中') badge-red @else badge-blue @endif">{{ $new->isfind }}</span>
			<p><span>发布日期：{{ $new->created_at }} , 阅读数：{{ $new->click }}</span></p>
		</div>
		<form id="new_left_info" class="clearfix">	
			<div class="form-group">
				<label class="col-sm-3" for="description">详细描述：</label>
		    	<div class="col-sm-8">{{ $new->description }}	
		   		</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3" for="time">丢失日期：</label>
				<div class="col-sm-9">{{ $new->time }}
				</div>
			</div> 	
			<div class="form-group">
				<label class="col-sm-3" for="addresscode">丢失区域：</label>
				<div class="col-sm-9">{{ $new->addresscode }}
				</div>
			</div>	
			<div class="form-group">
				<label class="col-sm-3" for="address">详细地点：</label>
				<div class="col-sm-9">{{ $new->address }}
				</div>
			</div>	
			<hr>
			<div class="new_left_block_title form-group">
				<i class="icon-user"></i>&nbsp;联系人信息
			</div>
			<div class="form-group">
				<label class="col-sm-3" for="c_address">地址：</label>
				<div class="col-sm-9">{{ $new->c_address }}</div>
			</div>	
			<div class="form-group">
				<label class="col-sm-3" for="c_name">姓名：</label>
				<div class="col-sm-3">{{ $new->c_name }}</div>
				<label class="col-sm-2" for="c_email">邮箱：</label>
				<div class="col-sm-4">{{ $new->c_email }}</div>		
			</div>
			<div class="form-group">
				<label class="col-sm-3" for="c_mobilephone">手机：</label>
				<div class="col-sm-3">{{ $new->c_mobilephone }}</div>		
				<label class="col-sm-2" for="c_phone">座机：</label>
				<div class="col-sm-4">{{ $new->c_phone }}</div>		
			</div>		
			<div class="form-group">
				<label class="col-sm-3" for="c_wechat">微信：</label>
				<div class="col-sm-3">{{ $new->c_wechat }}</div>
				<label class="col-sm-2" for="c_qq">QQ：</label>
				<div class="col-sm-4">{{ $new->c_qq }}</div>
			</div>
			<hr>
			<div class="new_left_block_title form-group">
				<i class="icon-picture"></i>&nbsp;图片详情
			</div>
			@if(count($photo))
				@foreach($photo as $pho)
					<img class="new_left_img img-responsive img-thumbnail"  src="{{ url('photos/'.$pho->id) }}" />
				@endforeach
			@endif
			<hr>
			<div class="new_left_block_title form-group">
				<i class="icon-comments-alt"></i>&nbsp;评论({{ count($msg)?count($msg):1 }})
			</div>
			<div id="new_left_message">
				<ul class="col-md-12">
					<li class="from-img col-md-2">
						<img class="new_left_avatar" src="http://localhost:9000/photos/2" />
					</li>
					<li class="from-img col-md-10">
						<a>管理员</a>{{ $new->created_at }}
						<p>'寻一下'真心祝愿您及早找回丢失的物品。</p>
					</li>
				</ul>	
				@if(count($msg))
					@foreach($msg as $m)	
						<ul class="col-md-12">
							<li class="from-img col-md-2">
								<img class="new_left_avatar" src="http://localhost:9000/photos/7" />
							</li>
							<li class="from-img col-md-10">
								<a>{{ $m->user_id }}</a>{{ $m->created_at }}
								<p>{{ $m->message }}</p>
							</li>
						</ul>		
					@endforeach
				@endif
			</div>		
		</form>
		{!! Form::open(array('url' => 'message','method'=>'post','id'=>'new_left_message_form','class'=>'col-md-12 clearfix')) !!}
            <input type="hidden" name="new_id" value="{{ $new->id }}">
			<div class="form-group">
				<textarea class="form-control" name="message"></textarea>
			</div>
			<div class="input-group col-md-11">
				<input type="submit" class="jh-btn-green pull-right" value="回复" />
			</div>
		</form>
	</div>
	<div id="new_right" class="col-md-4"> 
		<div id="new_right_user">
			<h4>发布者信息</h4>
			<p>发布者：{{ $user->name }}</p>
		</div>
		<div id="new_right_issue">
			<h4>我有消息</h4>
			<a id="remindPoster" data-id="{{ $new->id }}">我有消息 , 提醒发布者</a>
		</div>
		<div id="new_right_notification">
			<h4>最新公告<a class="issue-lookmore pull-right" href="{{ url('news/notifications') }}">更多</a></h4>
			<p>"寻一下"致力打造全国最专业的寻物启事及失物招领信息发布平台，不管你是丢失了东西或是捡到了物品，都可以到这里来发布信息，让失主尽快找到失物。 
			</p>
			<p>
			骗子经常利用本网站发布的寻物信息，拨打失主的电话进行诈骗，谎称捡到了失主的物品然后让失主打款，请网友提高警惕，谨防上当受骗！
			</p>
		</div>
		<div id="new_right_new">
			<h4>最新信息<a class="issue-lookmore pull-right" href="{{ url('news/lastNews') }}">更多</a></h4>
			@if(count($lastNews))
				@foreach($lastNews as $lastNew)
					<div><a href="{{ url('news/'.$lastNew->id) }}">{{ $lastNew->title?$lastNew->title:'该主人很懒,尚未发布标题信息' }}</a><span class="pull-right">{{ Date::parse($lastNew->created_at)->diffForHumans()}}创建</span></div>
				@endforeach
			@endif
		</div>
	</div>
	<!-- 提醒发布者模态框 -->
	<div id="remindModal" class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">  	
	</div>
</div>
@stop
@section('homejs')
<script type="text/javascript">
$(function(){
	$('#remindPoster').click(function(){
		var id = $(this).data("id");
		$.get("/trades/remindPoster",{ 'id':id },function(data){
			if(data == null||data == ''){
				alert('请先登录！');
				return false;
			}else{
				$("#remindModal").empty().append(data);
				$('#remindModal').modal('show');
			}
		})
	});
});
</script>

@stop



