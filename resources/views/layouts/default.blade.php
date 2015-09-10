<!DOCTYPE HTML>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>
@yield('title')
</title>
{!! HTML::style('css/bootstrap.min.css') !!}
{!! HTML::style('css/font-awesome.min.css') !!}
@yield('css')
</head>
<body>
@yield('body')
{!! HTML::script('js/jquery-1.11.1.min.js') !!}
{!! HTML::script('js/bootstrap.min.js') !!}
<script type="text/javascript">
$(function(){
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
	});
});	
</script>
@yield('js')
</body>
</html>