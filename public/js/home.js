$(function(){
	//导航栏序号大于0
	/* if(navsub){
	   $('.navbar').css('background-color','#2B2B37');
	   }*/
	//主页图片
	if($('.home-container').length>0){
	    $('.home-container').height($(window).height()).backstretch("../img/bg-top.jpg");
	    $(window).resize(function() {
	        setTimeout(function(){$('.home-container').backstretch("../img/bg-top.jpg");},500);
	    });
	}
    //导航栏整体风格样式
	var stop = document.documentElement.scrollTop || document.body.scrollTop;
	if(stop>=100){
		$('.navbar').addClass('navbar-white');
		$('.logo').attr('src','../img/jilan-logo-b1-60.png');
	}else{
		$('.navbar').removeClass('navbar-white');
		$('.logo').attr('src','../img/logo-translucent.png');
	}
	//滚动事件
	window.onscroll = function(){
	    var t = document.documentElement.scrollTop || document.body.scrollTop;
		//整体导航栏样式切换
		if(t>=100){
			$('.navbar').addClass('navbar-white');
		}else{
			$('.navbar').removeClass('navbar-white');
		}
	}
	if($('#home-news-container')){
		$('#home-news-container').masonry({
		   itemSelector : '.item'
		});
	}
	//图片轮播
	if($('#owl-example').length>0){
		$("#owl-example").owlCarousel({
			autoPlay: 4000, //Set AutoPlay to 4 seconds
			items : 6,
			itemsDesktop : [1199,3],
			itemsDesktopSmall : [979,3],
			stopOnHover:false
	  });
	}

})
