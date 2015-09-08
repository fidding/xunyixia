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
		margin-bottom:50px;
	}
	#new_left_title span{
		text-align: center;
		font-size:12px;
	}
	#description {
		margin-top: 5px;
		min-height:120px;
		overflow: hidden;
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
	#new_left_info .i-red{
		padding: 0px 5px;
		color:#ff0000;
	}
	#new_left_info .form-group>div>div{
		padding-left: 0px;
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
			{{ $new->title }}
			<p><span>发布日期：{{ $new->created_at }} , 阅读数：{{ $new->click }}</span></p>
		</div>
		<form id="new_left_info">
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
			<div class="form-group">
				<label class="col-sm-3" for="c_name">联系人：</label>
				<div class="col-sm-9">{{ $new->c_name }}
			
				</div>
			</div>	
			<div class="form-group">
				<label class="col-sm-3" for="c_address">联系地址：</label>
				<div class="col-sm-9">{{ $new->c_address }}
				</div>
			</div>		
	
			<div class="form-group">
				<label class="col-sm-3" for="c_mobilephone">手机：</label>
				<div class="col-sm-9">{{ $new->c_mobilephone }}
					
				</div>			
			</div>		
			<div class="form-group">
				<label class="col-sm-3" for="c_phone">座机：</label>
				<div class="col-sm-9">{{ $new->c_phone }}
					
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3" for="c_email">邮箱：</label>
				<div class="col-sm-9">{{ $new->c_email }}
					
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3" for="c_qq">QQ：</label>
				<div class="col-sm-9">{{ $new->c_qq }}
					
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3" for="c_wechat">微信：</label>
				<div class="col-sm-9">{{ $new->c_wechat }}
				</div>
			</div>
			<hr>
			@if(count($photo))
				@foreach($photo as $pho)
					<img class="img-responsive img-thumbnail"  src="{{ url('photos/'.$pho['id']) }}" />
				@endforeach
			@endif
			<hr>
			@if(count($msg))
				@foreach($msg as $m)
					<div class="form-group">
						<label class="col-sm-3 control-label" for="c_wechat">信息者：</label>
						<div class="col-sm-9">{{ $m['user_id'] }}</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="c_wechat">内容：</label>
						<div class="col-sm-9">{{ $m['message'] }}</div>
					</div>
					<div class="form-group">	
						<label class="col-sm-3 control-label" for="c_wechat">日期：</label>
						<div class="col-sm-9">{{ $m['created_at'] }}</div>
					</div>				
				@endforeach
			@else
			@endif
		</form>
		{!! Form::open(array('url' => 'message','method'=>'post','id'=>'message_form')) !!}
            <input type="hidden" name="new_id" value="{{ $new->id }}">
			<div class="form-group">
				<label class="control-label" for="message">回复</label>
				<textarea class="form-control" name="message"></textarea>
			</div>
			<div class="input-group">
				<input type="submit" class="jh-btn-green" value="提交" />
			</div>
		</form>
	</div>
	<div id="new_right" class="col-md-4"> 
		<div id="new_right_user">
			<h4>发布者信息</h4>
			<p>发布者：{{ $user->name }}</p>
		</div>
	</div>

</div>
@stop
@section('homejs')

@stop



