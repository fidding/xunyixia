{{ Session::put('urlback', Redirect::getUrlGenerator()->full()) }}
<style>
/* 黑色初始样式 */
.navbar{
	background-color: transparent;
	min-height:60px;
	border-color: transparent;
	transition: 0.5s all;
	-webkit-transition: 0.5s all;
	-mon-transition:0.5s all;
}
.navbar-fixed-top .navbar-collapse, .navbar-fixed-bottom .navbar-collapse {
	max-height: 450px;
}
.navbar-inverse .navbar-toggle {
	margin-top: 15px;
}
.container-fluid{
	min-height:60px;
}

.navbar-header .navbar-brand{
	color:#fff;
	padding-top: 15px;
	font-size: 18px;
	height: 60px;
	transition: 0.5s all;
	-webkit-transition: 0.5s all;
	-mon-transition:0.5s all;
}
.navbar-header .navbar-brand:hover{
	color:#3498db;
}

.navbar-nav{
	padding-left:20px;
}
.navbar-collapse .navbar-nav li{
	height:60px;
}
.navbar-collapse .navbar-nav li a{
	color: #D0D0D0;
	font-size: 16px;
	line-height:35px;
	height:60px;
	transition: 0.5s all;
	-webkit-transition: 0.5s all;
	-mon-transition:0.5s all;
}
.navbar-collapse .navbar-nav li a:hover{
	color:#fff;
}
.navbar-inverse .navbar-nav .active a{
	color:#FFFFFF;
	background-color:transparent;
}
.navbar-inverse .navbar-nav .active a:hover{
	background-color: transparent;
}
.navbar-nav-slide{
	position: relative;
	height: 3px;
	width: 0px;
	background-color: #eee;
	top: 58px;
	transition: all 0.6s;
}
.nav-item:hover{
	cursor:pointer;
}
.logo{
	margin-top:-10px; 
	width:45px;
	height:45px;
}
@media screen and (max-width: 767px) { /*当屏幕尺寸小于600px时，应用下面的CSS样式*/
	.navbar-nav-slide{
		display:none;
	}
}
/* 白色样式 */
.navbar.navbar-white{
	background-color:#fff!important;
}
.navbar.navbar-white>.container-fluid>.navbar-collapse{
	border-color:#b5b5b5;
}
.navbar.navbar-white>.container-fluid>.navbar-collapse ul .navbar-nav-slide{
	background-color:#3875AC;
}
.navbar.navbar-white>.container-fluid>.navbar-collapse ul li a{
	color:#3875AC;
}
.navbar.navbar-white>.container-fluid>.navbar-header a{
	color:#3875AC;
	height: 60px;
}
.navbar.navbar-white .container-fluid .navbar-header .navbar-toggle{
	border-color:#3498DB;
}
.navbar.navbar-white .container-fluid .navbar-header .navbar-toggle:focus,.navbar.navbar-white .container-fluid .navbar-header .navbar-toggle:hover{
	background-color:transparent;
}

.navbar.navbar-white .container-fluid .navbar-header .navbar-toggle .icon-bar{
	background-color:#3498DB;
	color:#3498DB;
}

.navbar.navbar-white .container-fluid .navbar-collapse ul .active a{
	background-color: transparent;
	color:#146CA9;
	font-weight: bold;
}
.navbar.navbar-white .container-fluid .navbar-collapse ul li a:hover{
	color:#1C4E7B;
}
</style>
<script>
	var navsub={{ $navsub }};
</script>
<nav class="navbar navbar-inverse navbar-default navbar-fixed-top fixed" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="{{ url('home') }}" class="navbar-brand">
	  	<span>&nbsp;&nbsp;寻一下</span>
	  </a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar-collapse">
		<ul class="nav navbar-nav navbar-right">
		@if(Auth::check())
		<li class="nav-item">
		<a href="{{ url('users/info') }}" ><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }}</a>
		</li>
		<li class="nav-item">
		<a href="{{ url('auth/logout') }}"><span class="glyphicon glyphicon-off"></span> 退出 </a>
		</li>
		@else
		<li class="nav-item">
		<a id="btn-modal-login" href="{{ url('auth/login') }}"><span class="glyphicon glyphicon-log-in"></span>&nbsp;登录</a>
		</li>
		<li class="nav-item">
		<a id="btn-modal-register" href="{{ url('auth/register') }}"><span class="glyphicon glyphicon-user"></span>&nbsp;注册</a>
		</li>
		@endif
		</ul>
	    <ul class="nav navbar-nav navbar-right">
				<li class="nav-item	@if($navsub=='1') active @endif">
					{!! HTML::link('news/create','信息发布',array('id'=>''))  !!}
				</li>
				<li class="nav-item	@if($navsub=='2') active @endif">
					{!! HTML::link('news/seeksth','寻物启事',array('id'=>''))  !!}
				</li>						
				<li class="nav-item	@if($navsub=='3') active @endif">
					{!! HTML::link('news/loststh','失物招领',array('id'=>''))  !!}
				</li>						
				<li class="nav-item	@if($navsub=='4') active @endif">
					{!! HTML::link('news/people','寻人启事',array('id'=>''))  !!}
				</li>
				<li class="nav-item	@if($navsub=='5') active @endif">
					{!! HTML::link('news/pet','寻宠启事',array('id'=>''))  !!}
				</li>
				<p class="navbar-nav-slide" style=""></p>
		</ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
