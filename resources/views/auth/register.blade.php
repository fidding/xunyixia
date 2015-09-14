@extends('layouts.home')
@section('title')
注册 寻一下XunYiXia 
@stop
@section('homecss')
<style>
#lr_error{
    list-style: none;
}
</style>
@stop
@section('homejs')
@stop
@section('homebody')
<div class="container lr-container">
    <div class="lr-wrapper">
        <div class="lr-logo"></div>
        <form class="lr-form" method="POST" action="/auth/register">
            {!! csrf_field() !!}
            @if($errors->any())
            <ul id="lr_error" class="col-xs-12 alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif            
            <div class="form-group">
                <input class="form-control" type="name" name="name"  placeholder="用户名" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <input class="form-control" type="email" name="email"  placeholder="邮箱" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" id="password"  placeholder="密码">
            </div>
            <button class="btn jh-btn-green lr-submit" type="submit">注册</button>
            <p>
                您已阅读并同意'寻一下'的<a href="{{ url('condition') }}">服务条款</a>以及<a href="{{ url('privacy') }}">隐私政策</a><br/>
                已有账号？<a href="{{ url('auth/login') }}">登录</a>
            </p>
        </form>
        <div class="lr-footer">
            <a href="http://www.miitbeian.gov.cn/">闽ICP备15018320号</a>
        </div>
    </div>
</div>
@stop