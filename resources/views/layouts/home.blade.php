@extends('layouts.default')
@section('css')
@yield('homecss')
{!! HTML::style('css/home.css') !!}
@stop
@section('body')
@yield('homebody')
@stop
@section('js')
@yield('homejs')
{!! HTML::script('js/home.js') !!}
@stop