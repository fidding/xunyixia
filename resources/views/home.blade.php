@extends('layouts.home')
@section('title')
寻一下首页
@stop
@section('homecss')
<style>
	#owl-example{
		width:90%;
		margin:0 auto;
	}
	.owl-carousel .owl-item {
		height:110px;
    	padding: 10px;
	}
	.owl-carousel .owl-item>div{
		border-radius: 10px;
	}
	.owl-carousel .owl-item>div a{
		text-decoration: none;
		width:100%;
		height:100%;
	}
	.owl-carousel .owl-item>div img{
		width:100%;
		height:100px;
		border-radius: 5px;
	}
	.owl-carousel .owl-item>div span{
		display:block;
		margin:-60px auto; 
		text-align:center;
		color:#fff;
		font-size:18px
	}	
	.recommend-line{
		width:90%;
		margin-left:5%;
		position: relative;
		padding: 20px 0;
		text-align: center;
	}
	.recommend-line:before{
		display: block;
		position: absolute;
		top: 28px;
		width: 44%;
		content: "";
		border-top: 1px solid #ededed;
	}
	.recommend-line:after{
		right: 0;
		display: block;
		position: absolute;
		top: 28px;
		width: 44%;
		content: "";
		border-top: 1px solid #ededed;
	}
	.recommend-line a{
		text-decoration: none;
		font-size: 16px;
		color:#999;
	}
	
</style>
@stop
@section('homejs')
{!! HTML::script('js/jquery-backstretch.min.js') !!}
@stop
@section('homebody')
@include('layouts.nav')
<div class="home-container">
<div class="home-wrapper">
    <h1>“寻一下”</h1>
    <h1>致力于打造国内最专业的招领网站</h1>
    <h3>我们坚信 , 您的需求便是我们的需求</h3>
    <a class="btn jh-btn-green issue" href="{{ url('news/create') }}">发布信息</a>
</div>
</div>
<div class="recommend-line">
	<a>寻一下专区</a>
</div>
<div id="owl-example" class="owl-carousel">
	<div>
		<a href="#"><img src="{{ url('img/home-type.png') }}"/><span>钱包</span></a>
	</div>
	<div>
		<a href="#"><img src="{{ url('img/home-type-2.jpg') }}"/><span>手机</span></a>
	</div>
	<div>
		<a href="#"><img src="{{ url('img/home-type-2.jpg') }}"/><span>电脑</span></a>
	</div>
	<div>
		<a href="#"><img src="{{ url('img/home-type-2.jpg') }}"/><span>服装</span></a>
	</div>
	<div>
		<a href="#"><img src="{{ url('img/home-type-2.jpg') }}"/><span>车辆</span></a>
		</div>
	<div>
		<a href="#"><img src="{{ url('img/home-type-2.jpg') }}"/><span>眼镜</span></a>
	</div>
	<div>
		<a href="#"><img src="{{ url('img/home-type-2.jpg') }}"/><span>书籍</span></a>
	</div>
</div>
<div class="recommend-line">
	<a>或许您感兴趣</a>
</div>
<div id="home-news-container">
    <div class="item col-md-3  col-sm-4 col-xs-12" >
    	<div>
    		<div>
	    		<img src="{{ url('img/bg-top.jpg') }}" />
	    		<div class="home-news-propose">申请</div>
	    		<div class="home-news-collect"><i class="icon-heart"></i></div>
	    		<div class="home-news-reward">报酬￥100.00元</div>
    		</div>
    		<div class="home-news-description"><p>百度识图通过图像识别和检索技术,为你提供全网海量、实时的图片信息;你可以通过上传,粘贴图片网址等方式寻找目标图片的高清大图,相似美图;通过猜词了解和认知图片内容...
    		</p>
    		<p>点击量：1000&nbsp;<span class="pull-right">2015-5-10</span></p>
    		<p class="home-news-contact"><i class="icon-user">&nbsp;李维嘉</i><span class="pull-right">北京市人民广场</span></p>

    		</div>
    	</div>
    </div>  
    <div class="item col-md-3 col-sm-4 col-xs-12">
    	<div>
    		<div>
		    	<img src="{{ url('img/faces.png') }}" />
				<div class="home-news-propose">申请</div>
				<div class="home-news-collect"><i class="icon-heart"></i></div>
				<div class="home-news-reward">报酬￥100.00元</div>
    		</div>
    		<div class="home-news-description"><p>百度识图通过图像识别和检索技术,为你提供全网海量、实时的图片信息;你可以通过上传,粘贴图片网址等方式寻找目标图片的高清大图,相似美图;通过猜词了解和认知图片内容...
    		</p>
    		<p>点击量：1000&nbsp;<span class="pull-right">2015-5-10</span></p>
    		<p class="home-news-contact"><i class="icon-user">&nbsp;洪家黄</i><span class="pull-right">北京市人民广场</span></p>
			</div>
		</div>
    </div>  
    <div class="item col-md-3 col-sm-4 col-xs-12">
    	<div><img src="{{ url('img/home-bg2.jpg') }}" /></div>
    </div>  
    <div class="item col-md-3 col-sm-4 col-xs-12">
    	<div><img src="{{ url('img/faces.png') }}" /></div> 	
    </div>  
    <div class="item col-md-3 col-sm-4 col-xs-12">
    	<div><img src="{{ url('img/bg-top.jpg') }}" /></div> 
    </div>  
    <div class="item col-md-3 col-sm-4 col-xs-12">
    	<div><img src="{{ url('img/bg-top.jpg') }}" /></div> 
    </div>  
    <div class="item col-md-3  col-sm-4 col-xs-12" >
    	<div><img src="{{ url('img/bg-top.jpg') }}" /></div>
    </div>  
    <div class="item col-md-3 col-sm-4 col-xs-12">
    	<div><img src="{{ url('img/faces.png') }}" /></div>
    </div>  
    <div class="item col-md-3 col-sm-4 col-xs-12">
    	<div><img src="{{ url('img/home-bg2.jpg') }}" /></div>
    </div>  
    <div class="item col-md-3 col-sm-4 col-xs-12">
    	<div><img src="{{ url('img/faces.png') }}" /></div> 	
    </div>  
    <div class="item col-md-3 col-sm-4 col-xs-12">
    	<div><img src="{{ url('img/bg-top.jpg') }}" /></div> 
    </div>  
    <div class="item col-md-3 col-sm-4 col-xs-12">
    	<div><img src="{{ url('img/bg-top.jpg') }}" /></div> 
    </div>      
</div>
@stop




