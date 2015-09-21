<style>
.footer{
	background-color:#333;
	margin-top:20px;
	padding:50px 0px 0px 0px;
}
.footer-left{
	padding:0px 0px;
	text-align: center;
}
.footer-left h5{
	font-weight: normal;
}
.footer-left span{
	vertical-align:top;
}
.footer-content div h5{
	color:#666;
	font-weight: bold;
}
.footer-content div img{
	height: 60px;
}
.footer-content ul{
	padding:10px 0px;
	margin:0;
	list-style: none;
}
.footer-content ul li{
	padding:5px 0px;
}
.footer-content ul li a{
	color: #666;
	text-decoration: none;
}
.footer-content ul li a:hover{
	color:#ffffff;
}
.footer-copyright{
	border-top:1px solid #c8c8c8;
	padding-top:20px;
	text-align: center;
	color:#666;
	font-size:12px;
}

.bdsharebuttonbox{
	padding:10px 0px;
	text-align: center;
	z-index:100;
}

.bdsharebuttonbox .share-button{
	display: inline-block;
	height: 32px;
	width: 32px;
	vertical-align: middle;	
	margin: 0 9px;
	float:none;
}
.bdsharebuttonbox .bds_qzone{
	background-image: url(../img/footer-share.png);
	background-repeat: no-repeat;
	background-position: -156px -221px;
}
.bdsharebuttonbox .bds_weixin{
	position: relative;
	background-image: url(../img/footer-share.png);
	background-repeat: no-repeat;
	background-position: -52px -221px;
}
.bdsharebuttonbox .bds_tsina{
	background-image: url(../img/footer-share.png);
	background-position: 0 -221px;
	background-repeat: no-repeat;

}
.bdsharebuttonbox .bds_tqq{
	background-image: url(../img/footer-share.png);
	background-position: -104px -221px;
	background-repeat: no-repeat;
}
.bdsharebuttonbox .bds_tsina:hover{
  background-position: 0 -262px;
}

.bdsharebuttonbox .bds_weixin i{
	position: absolute;
	z-index:100;
	display: none;
	width: 176px;
	height: 210px;
	background: url(../img/footer-share.png) no-repeat 0 0;
	left:-72px;
	bottom:40px;
}

.bdsharebuttonbox .bds_weixin:hover{
  background-position: -52px -262px;
}
.bdsharebuttonbox .bds_weixin:hover i{
  display: block;
}

.bdsharebuttonbox .bds_tqq:hover{
  background-position: -104px -262px;
}
.bdsharebuttonbox .bds_qzone:hover{
  background-position: -156px -262px;
}

</style>
<footer class="footer clearfix col-md-12 ">
	<div class="footer-content col-md-8 col-md-offset-2">
		<div class="footer-left col-md-4">	
			{!! HTML::image('img/logo-footer.png') !!}<sup><span>&nbsp;&reg;</span></sup></br>
			<h5><strong>上海基蓝软件有限公司</strong></br></br>
			Shanghai Jilan Software Co. Ltd.</h5>
		</div>
		<div class="footer-right col-md-7 col-md-offset-1">
			<div class="col-md-4">
				<h5>网站相关</h5>
				<ul>
					<li>{!! HTML::link('sitemap','网站地图') !!}</li>
					<li>{!! HTML::link('privacy','隐私政策') !!}</li>
					<li>{!! HTML::link('condition','服务条款') !!}</li>						
				</ul>
			</div>
			<div class="col-md-4">
				<h5>服务支持</h5>
				<ul>
					<li>{!! HTML::link('about','联系我们') !!}</li>
					<li>{!! HTML::link('functions','功能列表') !!}</li>
					<li>{!! HTML::link('manual','使用教程(开发中)') !!}</li>
				</ul>
			</div>
			<div class="col-md-4">
				<h5>招贤纳士</h5>
				<ul>
					<li>{!! HTML::link('career#web','Web全栈工程师') !!}</li>
					<li>{!! HTML::link('career#webgl','WebGL开发工程师') !!}</li>
					<li>{!! HTML::link('career#ui','UI设计师') !!}</li>
				</ul>
			</div>			
		</div>
			
	</div>
	<div class="bdsharebuttonbox footer-share col-md-8 col-md-offset-2" data-tag="share_1">
<!-- 	<a class="bds_mshare" data-cmd="mshare"></a> -->
		<a class="bds_qzone share-button" data-cmd="qzone" href="#"></a>
		<a class="bds_weixin share-button" data-cmd="weixin"><i></i></a>
		<a class="bds_tsina share-button" data-cmd="tsina"></a>
		<a class="bds_tqq share-button" data-cmd="tqq"></a>
		<!-- <a class="bds_baidu" data-cmd="baidu"></a>			
		<a class="bds_renren" data-cmd="renren"></a>
		<a class="bds_tqq" data-cmd="tqq"></a>
		<a class="bds_more" data-cmd="more">&nbsp;更多</a> -->
		<!--<a class="bds_count" data-cmd="count"></a>-->
	</div>			
	<div class="fixed"></div>
	<div class="footer-copyright col-md-10 col-md-offset-1">

		<div class="fixed"></div>
		<p>Copyright &copy; 2015 BaseBlue. All Rights Reserved.<br><br>
		基蓝软件有限公司 版权所有
		
		</p>
	</div>
</footer>
<script>
	window._bd_share_config = {
		common : {
			bdText : '基蓝云矿山官网',	
			bdDesc : '基蓝云矿山官网',	
			bdUrl : 'http://baseblue.cn', 	
			bdPic : 'http://img.mukewang.com/user/5379bf290001590c01800180-160-160.jpg'
		},
		share : [{
			"bdSize" : 16
		}],
/*		slide : [{	   
			bdImg : 0,
			bdPos : "right",
			bdTop : 100
		}],*/
/*		image : [{//图片分享
			viewType : 'list',
			viewPos : 'top',
			viewColor : 'black',
			viewSize : '16',
			viewList : ['qzone','tsina','huaban','tqq','renren']
		}],*/
/*		selectShare : [{//划词分享
			"bdselectMiniList" : ['qzone','tqq','kaixin001','bdxc','tqf']
		}]*/
	}
	with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
</script>