$(function($){
	//导航栏展开事件
	$(".show_more").on("mouseenter",function(){
		$(this).children('ul').slideDown(200).end().on("mouseleave",function(){
			$(this).children('ul').stop().hide();
	})
		$(this).children('a').css({"backgroundColor":"#FFFFFF","color":"#5E068C"})
	}).on('mouseleave',function(){
			$(this).children('a').css({"backgroundColor":"","color":"#FFFFFF"});
	});
	//导航栏最后一个元素展开事件
	$(".show_more_last").on("mouseenter",function(){
		$(this).children('ul').slideDown(200).end().on("mouseleave",function(){
			$(this).children('ul').stop().hide();
	})
	$(this).children('a').css({"backgroundColor":"#FFFFFF","color":"#5E068C"})
	}).on('mouseleave',function(){
			$(this).children('a').css({"backgroundColor":"","color":"#FFFFFF"});
	})
	//
	$("#top-right>div:eq(1)>ul>li").on("mouseenter",function(){
		$(this).css('borderTop',"1.5px solid #D18E59")
	});
	$("#top-right>div:eq(1)>ul>li").on("mouseleave",function(){
		$(this).css('borderTop',"")
	});
	//轮播图控制
    var unslider04 = $('#b04').unslider({
        dots: true
    }),
    data04 = unslider04.data('unslider');
    $('.unslider-arrow04').click(function() {
        var fn = this.className.split(' ')[1];
        data04[fn]();
    });
    //轮播图相邻导航图--鼠标触碰字体变色
    $("#nav-center>div a").on("mouseenter",function(){
    	$(this).find('p').css("color","#d18e59")
    }).on("mouseleave",function(){
    	$(this).find('p').css("color","")
    })
    //校园看点轮播图
	$("#school-nav .slideShow i").on('click',function(){
		index = $(this).index();
		var distance = index * 690;
		// console.log(distance)
		$(this).parent('div').siblings('ul').stop().animate({marginLeft: -distance},400);
		$(this).addClass('active').siblings('i').removeClass('active');
		//小轮播图
		var distance_small = index * 370;
		$(".slideShow_small ul").stop().animate({marginLeft: -distance_small},400);
		}).on("mouseenter",function(){
			$(this).css({cursor:"pointer"});
		});
		//自动下一张
		function autoPlay(){
			var ls_i = $("#school-nav .slideShow i");
			console.log(ls_i);
			for(var i=0;i<ls_i.length;i++){
				if($(ls_i[i]).hasClass('active')){
					i++;
					i>2 ? i=0 : i;
					var distance = i * 690;
					$(ls_i[i]).parent('div').siblings('ul').stop().animate({marginLeft: -distance},400);
					$(ls_i[i]).addClass('active').siblings('i').removeClass('active');
					//小轮播图
					var distance_small = i * 370;
					$(".slideShow_small ul").stop().animate({marginLeft: -distance_small},400);
				}
			}
		}
		setInterval(autoPlay,5000);
		//数据清华轮播图
		$("#data_carouse .content .slideShow i").on('click',function(){
			index = $(this).index();
			var distance = index * 1100;
			// console.log(distance)
			$(this).parent('div').siblings('ul').stop().animate({marginLeft: -distance},400);
			$(this).addClass('active').siblings('i').removeClass('active');
		}).on("mouseenter",function(){
			$(this).css({cursor:"pointer"});
		});
		function autoPlay_data(){
			var ls_i = $("#data_carouse .content .slideShow i");
			console.log(ls_i);
			for(var i=0;i<ls_i.length;i++){
				if($(ls_i[i]).hasClass('active')){
					i++;
					i>2 ? i=0 : i;
					var distance = i * 1100;
					$(ls_i[i]).parent('div').siblings('ul').stop().animate({marginLeft: -distance},400);
					$(ls_i[i]).addClass('active').siblings('i').removeClass('active');
				}
			}
		}
		setInterval(autoPlay_data,6000);
})