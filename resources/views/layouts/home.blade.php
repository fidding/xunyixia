@extends('layouts.default')
@section('css')
@yield('homecss')
{!! HTML::style('css/owl.carousel.css') !!}
{!! HTML::style('css/owl.theme.css') !!}
{!! HTML::style('css/home.css') !!}
@stop
@section('body')
@yield('homebody')
@stop
@section('js')
@yield('homejs')
{!! HTML::script('js/masonry.pkgd.min.js') !!}
{!! HTML::script('js/owl.carousel.js') !!}
{!! HTML::script('js/home.js') !!}
@include('layouts.footer')
@stop