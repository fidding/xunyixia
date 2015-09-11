@extends('layouts.home')
@section('title')
忘记密码 寻一下XunYiXia
@stop
@section('homecss')
@stop
@section('homejs')
@stop
@section('homebody')
<div class="container lr-container">
    <div class="lr-wrapper">
        <div class="lr-logo"></div>
        <form class="lr-form" method="POST" action="/password/email">
            {!! csrf_field() !!}
            <div class="form-group">
                <input class="form-control" type="email" name="email"  placeholder="邮箱" value="{{ old('email') }}">
            </div>
            <button class="btn jh-btn-green lr-submit" type="submit">发送邮件</button>
            <p>
            {{ Session::get('status') }}
            {{ Session::get('error') }}
            </p>
        </form>
        <div class="lr-footer">
            <a href="http://www.miitbeian.gov.cn/">闽ICP备15018320号</a>
        </div>
    </div>
</div>
@stop




