<div class='body' id="wrapper">
	<!-- Sidebar -->
	<div id="sidebar-wrapper">
		<ul class="sidebar-nav">
			<li class="sidebar-brand"><a href="{{ url('home') }}">&nbsp;{!! HTML::image('img/logo-translucent.png',null,array("class"=>"logo")) !!}<strong>&nbsp;基蓝云矿山</strong></a></li>
			<li class="user_img "><a href="#">{!! HTML::image('avatar',null,array("class"=>"img-circle","id"=>"edit_avatar","title"=>"点击修改头像","data-url"=>url('avatar/create'))) !!} </br>
					<span>{{ Auth::user()->name }}</span>
			</a>
			</li>
			<li id="side_user"><a @if($navsub=='1')  class="nav-active" @endif href="{{ url('user') }}"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;&nbsp;个人信息</e></a>
			</li>
			<li id="side_psd"><a @if($navsub=='2')  class="nav-active" @endif href="{{ url('editPwd') }}"><span class="glyphicon glyphicon-wrench"></span>&nbsp;&nbsp;&nbsp;&nbsp;修改密码</a>
			</li>
			<li id="side_project"><a  @if($navsub=='5')  class="nav-active" @endif href="{{ url('projects') }}"><span class="glyphicon glyphicon-th-large"></span>&nbsp;&nbsp;&nbsp;&nbsp;项目中心</a>
			</li>
			<li id="side_filecopy"><a @if($navsub=='6')  class="nav-active" @endif href="{{ url('projectfiles') }}"><span class="glyphicon glyphicon-cloud"></span>&nbsp;&nbsp;&nbsp;&nbsp;项目副本</a>
			</li>
<!-- 			<li><a 	@if($navsub=='3')  class="nav-active" @endif href="message"><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;&nbsp;&nbsp;系统消息</a> -->
			</li>
			<li id="side_feedback"><a  @if($navsub=='4')  class="nav-active" @endif href="{{ url('feedback') }}"><span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;&nbsp;&nbsp;意见反馈</a>
			</li>
		</ul>
	</div>
	<!-- /#sidebar-wrapper -->

	<!-- Page Content -->
	<div id="page-content-wrapper">
		<div class='projects-top-nav clearfix'>
			<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><span class="glyphicon glyphicon-list"></span></a>
			<ul class='sidebar_top_nav_btn'>
				<li>
				<a href="{{ url('logout') }}"><span class="glyphicon glyphicon-off"></span> 退出 </a>
				</li>
				<li>
				<a href="{{ url('projects') }}"><span class="glyphicon glyphicon-th-large"></span> 项目 </a>
				</li>
			</ul>
		</div>

		<div class='sidebar_right_main'>
			@section('main')
	        @parent
	   		@show
   		</div>
	</div>
	<!-- /#page-content-wrapper -->
</div>

@if($navsub=='5')
@include('projects.create'){{-- 加载创建项目页  --}}
@endif
<div id='load_edit_avatar'></div>{{-- 头像容器 --}}
<!-- /#wrapper -->
<!-- Menu Toggle Script -->



