@extends('layouts.user')
@section('title')
用户中心-寻一下
@stop
@section('usercss')
<style>
.trade-item{
	margin:10px 20px;
	padding:10px;
	border:1px solid #eee;
}
.trade-item>div{
	padding:5px;
}
.trade-item>div span{
	cursor: pointer;
}
.trade-item>div span:hover{
	color:#666;
}
</style>
@stop
@section('userbody')

<div class="col-md-12">
	<h2 class="page-header">收到的交易<small> Receive Trades</small></h2>
</div>

@foreach($trades as $key=>$trade)
	<div class="trade-item col-sm-10">
		<div class="col-sm-12" style="color:#999">申请时间：{{ $trade->created_at }}<span class="pull-right">&nbsp;取消交易</span><span class="pull-right">查看详情</span></div>
		<div class="col-sm-12">信息：{{ $trade->name }}向您发布的标题为"<a href="{{ url('news/'.$trade->new_id) }}" target="_blank">{{ $trade->new->title }}</a>"的{{ $trade->new->type_id }}提出了申请。</div>
		<div class="col-sm-12" style="color:#666">联系方式：
			<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> 邮箱：{{ $trade->email }}
			<span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> 座机：{{ $trade->phone }}
			<span class="glyphicon glyphicon-phone" aria-hidden="true"></span> 手机：{{ $trade->mobilephone }}
		</div>
	</div>
@endforeach
@stop