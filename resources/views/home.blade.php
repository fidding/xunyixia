@extends('layouts.home')
@section('title')
寻一下首页
@stop
@section('homecss')
@stop
@section('homejs')
{!! HTML::script('js/jquery-backstretch.min.js') !!}
@stop
@section('homebody')
@include('layouts.nav')
<div class="home-container">
<div class="home-wrapper">
    <h1>“寻一下”</h1>
    <h1>致力于打造国内最专业的招领网站</h1>
    <h3>我们坚信 , 您的需求便是我们的需求</h3>
    <a class="btn jh-btn-green issue" href="{{ url('news/create') }}">发布信息</a>
</div>
</div>
<div style="width:100%;height:500px">
    
</div>
@stop




