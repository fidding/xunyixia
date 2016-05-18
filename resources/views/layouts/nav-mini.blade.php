<style>
/* 黑色初始样式 */
.navbar{
	background-color: rgba(0, 0, 0, 0.8)!important;
	min-height:60px;
	margin: 0px;
	border-color: transparent!important;
	border-radius: 0px;
	z-index:100;
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

.navbar-brand{
	color:#fff!important;
	padding-top: 15px;
	font-size: 18px;
	height: 60px;
	transition: 0.5s all;
	-webkit-transition: 0.5s all;
	-mon-transition:0.5s all;
}
.navbar-brand:hover{
	color:#3498db !important;
}

.navbar-nav{

	padding-left:20px!important;
}
.navbar-nav li{
	height:60px;
}
.navbar-nav li a{
	color: #D0D0D0!important;
	font-size: 16px;
	line-height:35px!important;
	height:60px;
	transition: 0.5s all;
	-webkit-transition: 0.5s all;
	-mon-transition:0.5s all;
}
.navbar-nav li a:hover{
	color:#fff!important;
}
.navbar-inverse .navbar-nav>.active>a{
	color:#FFFFFF!important;
	background-color:transparent!important;
}
.navbar-inverse .navbar-nav>.active>a:hover{
	background-color: transparent;
}

.nav-item:hover{
	cursor:pointer;
}
.logo{
	margin-top:-10px; 
	width:45px;
	height:45px;
}
</style>
	<nav class=" navbar navbar-inverse navbar-default translucent fixed" role="navigation">
		<div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a href="{!!  url('home')  !!}" class="navbar-brand">
			  	<span>{!!  HTML::image('img/logo-translucent.png',null,array("class"=>"logo"))  !!}</span>&nbsp;基蓝云矿山 
			  </a>
		    </div>
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="navbar-collapse">
			    <ul class="nav navbar-nav navbar-nav-left">
						<li class="nav-item">
							{!!  HTML::link('home','主页',array('id'=>''))  !!}
						</li>
						<li class="nav-item">
							{!!  HTML::link('feature','功能',array('id'=>''))  !!}
						</li>
						<li class="nav-item">
							{!!  HTML::link('service','案例',array('id'=>''))  !!}
						</li>						
						<li class="nav-item">
							{!!  HTML::link('news','基蓝动态',array('id'=>''))  !!}
						</li>						
						<li class="nav-item">
							{!!  HTML::link('about','关于我们',array('id'=>''))  !!}
						</li>
						<p class="navbar-nav-slide" style=""></p>
				</ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
	</nav>