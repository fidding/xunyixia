@extends('layouts.home')
@section('title')
登录 寻一下XunYiXia
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
        <form class="lr-form" method="POST" action="/auth/login">
            {!! csrf_field() !!}
            @if(Session::get('msg'))
                <div class="alert alert-danger"> {{ Session::get('msg') }}</div>
            @endif
            
            @if($errors->any())
            <ul id="lr_error" class="col-xs-12 alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
            <div class="form-group">
                <input class="form-control" type="email" name="email"  placeholder="邮箱" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" id="password"  placeholder="密码(不能小于6位数)">
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" checked="checked"> 记住我
                </label>
            </div>
            <button class="btn jh-btn-green lr-submit" type="submit">登录</button>
            <p>
                <a class="pull-left" href="{{ url('password/email') }}">忘记密码?</a><a href="{{ url('auth/register') }}" class="pull-right">注册</a>
            </p>
        </form>
        <div class="lr-footer">
            <a href="http://www.miitbeian.gov.cn/">闽ICP备15018320号</a>
        </div>
    </div>
</div>
@stop




