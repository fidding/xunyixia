@extends('layouts.home')
@section('title')
重置密码 寻一下XunYiXia
@stop
@section('homecss')
@stop
@section('homejs')
@stop
@section('homebody')
<div class="container lr-container">
    <div class="lr-wrapper">
        <div class="lr-logo"></div>
        <form class="lr-form" method="POST" action="/password/reset">
            {!! csrf_field() !!}
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ Session::get('email') }}">
            <div class="form-group">
                <input class="form-control" type="password" name="password" id="password"  placeholder="密码">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password_confirmation"  placeholder="确认密码">
            </div>
            <button class="btn jh-btn-green lr-submit" type="submit">重置密码</button>
            <p>
            </p>
        </form>
        <div class="lr-footer">
            <a>京ICP备13019086号</a>&nbsp; <a>京公网安备11010502024565</a>
        </div>
    </div>
</div>
@stop




