<!-- 继承layouts下的default模版 -->
@extends('layouts.default') 
@section('title') 
404 
@stop
@section('css')
{!! HTML::style('css/404.css') !!}
@stop
@section('js')
{!! HTML::script('js/jquery-backstretch.min.js') !!}
{!! HTML::script('js/404.js') !!}
@stop
@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="error-v2">
                <span class="error-v2-title">404</span>
                <span>That’s an error!</span>
                <p>The requested URL was not found on this server. <br> That’s all we know.</p>
            </div>
        </div>
    </div>
</div>
@stop
