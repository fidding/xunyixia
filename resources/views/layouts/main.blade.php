@extends('layouts.default')
@section('css')
@yield('maincss')
{!! HTML::style('css/bootstrap-switch.css') !!}
{!! HTML::style('css/progress.css') !!}
{!! HTML::style('css/joyride-2.1.css') !!}
{!! HTML::style('css/user.css') !!}
@stop
@section('js')
@yield('mainjs')
{!! HTML::script('js/jquery.cookie.js') !!}
{!! HTML::script('js/bootstrap-switch.js') !!}
{!! HTML::script('js/foggy.js') !!}
{!! HTML::script('js/jldialog.js') !!}
{!! HTML::script('js/progress.js') !!}
{!! HTML::script('js/jquery.joyride-2.1.js') !!}
{!! HTML::script('js/user.js') !!}
@stop
@section('body')
@include('layouts.sidebar')
@stop
