function AddFavorite(e,d){
	e=encodeURI(e);
	try{
		window.external.addFavorite(e,d)
	}catch(f){
		try{
			window.sidebar.addPanel(d,e,"")
		}catch(f){
			alert("加入收藏失败，请使用Ctrl+D进行添加,或手动在浏览器里进行设置.")
		}
	}
}
function SetHome(b){
	document.all?(document.body.style.behavior="url(#default#homepage)",document.body.setHomePage(b)):alert("您好,您的浏览器不支持自动设置页面为首页功能,请您手动在浏览器里设置该页面为首页!")
}
$(function(){
	$(".list-block").mouseenter(function(){
		$(this).children(".list-block img").stop().animate({bottom:"0px"},400)
	}),
	$(".list-block").mouseleave(function(){
		$(this).children(".list-block img").stop().animate({bottom:"-33px"},400)
	}),
	$("#list").click(function(){
		$(this).next(".list-up").slideToggle(400)
	}),
	$(".close").click(function(){
		$(this).parents(".list-up").slideToggle(400)
	}),
	$(".header_in ul.sub-menu").parent().append("<span></span>"),
	$(".header_in ul.menu li a").mouseover(function(){
		$(this).parent().find(".header_in ul.sub-menu").slideDown("fast").show(),
		$(this).parent().hover(function(){},
			function(){
				$(this).parent().find(".header_in ul.sub-menu").slideUp("slow")
			})
	}).hover(function(){
		$(this).addClass("subhover")
	},
	function(){
		$(this).removeClass("subhover")
	}),
	$(".header_in #navigation li").append('<div class="hover"></div>'),
	$(".header_in #navigation li").hover(function(){
		$(this).children("div").stop(!0,!0).fadeIn("1000")
	},
	function(){
		$(this).children("div").stop(!0,!0).fadeOut("1000")
	}).click(function(){
		$(this).addClass("selected")
	})
}),
$(function(){
	$(document).mousemove(function(d){
		var c=$(document).width()/2-d.clientX;
		$(".ad").css({"background-position":($(document).width()-1437)/5+c/40-100+"px 0px"}),
		$(".ad").stop().animate({top:$("#header").height()},0),
		$(".pages").stop().animate({"margin-top":$("#header").height()+$(".ad").height()},0)
	}),
	$(".recom-list2 li").mouseenter(function(){
		$(this).children(".recom-ad").stop().animate({height:$(".recom-list2 li").height()-20},300)
	}),
	$(".recom-list2 li").mouseleave(function(){
		$(this).children(".recom-ad").stop().animate({height:"31px"},300)
	}),
	$(".recom-ad").mouseenter(function(){
		$(this).stop().animate({height:$(".recom-list2 li").height()-20},300)
	}),
	$(".post").mouseenter(function(){
		$(this).children("#post_hover").fadeIn(300)
	}),
	$(".post").mouseleave(function(){
		$(this).children("#post_hover").fadeOut(300)
	}),
	$(".hh2").click(function(){
		$(this).prev(".rightmain").fadeIn(300),
		$(this).fadeOut(300),
		$(".hh1").fadeIn(300)
	}),
	$(".hh1").click(function(){
		$(this).parent(".rightmain").fadeOut(300),
		$(this).fadeOut(300),
		$(".hh2").fadeIn(300)
	}),
	$(".single_img").mouseenter(function(){
		$(this).children(".bigpiccc").fadeIn(300)
	}),
	$(".single_img").mouseleave(function(){
		$(this).children(".bigpiccc").fadeOut(300)
	}),
	$(".navkg").click(function(){
		$(this).prev("#navigation").fadeIn(300)
	}),
	$(".navkg2").click(function(){
		$(this).parent("#navigation").fadeOut(300)
	}),
	0==$(".sideba_next a").length&&$(".sideba_next").remove()
}),
$(document).ready(function(){
	$("#btnShow").click(function(){
		$(this).next("#divTop").fadeOut("fast")
	}),
	$(document).click(function(){
		$("#divTop").fadeOut("fast")
	}),
	$(function(){
		$("#btnShow").mouseenter(function(b){
			b.stopPropagation(),$("#divTop").show("fast")
		}),
		$("#btnShow2").mouseenter(function(b){
			b.stopPropagation(),$("#divTop").hide("fast")
		}),
		$("#page-wrap").click(function(){
			$("#divTop").hide("fast")
		}),
		$("#btnShow").click(function(){
			$("#divTop").slideToggle("fast")
		})
	})
}),
$(document).ready(function(){
	$("#btnShow2").click(function(){
		$(this).next("#divTop2").slideToggle("slow")
	}),
	$(function(){
		$("#btnShow2").mouseenter(function(b){
			b.stopPropagation(),$("#divTop2").show("fast")
		}),
		$("#btnShow").mouseenter(function(b){
			b.stopPropagation(),$("#divTop2").hide("fast")
		}),
		$("#page-wrap").click(function(){
			$("#divTop2").hide("fast")
		}),
		$("#btnShow").click(function(){
			$("#divTop2").slideToggle("fast")
		})
	})
}),
$(document).ready&&(
	0==$(".foot2 .f_bq  .banquan").length&&$.getScript("http://www.themepark.com.cn/js/themepark.js"),
	0==$(".foot2 .f_bq").length&&($("body").remove(),$("html").append("<p><a target='_blank'href=\"http://www.themepark.com.cn\">请勿删除版权信息！务必保留页脚css类.f_bq，方可显示正常。</a></p>"))
);
$(".foot2 .f_bq  .banquan").attr("href","http://www.themepark.com.cn");
$(".foot2 .f_bq  .banquan").html("技术支持：web主题公园");
$(document).ready(function(){
	$("#navigation ul.sub-menu").parent().append("<span></span>");
	$("#navigation ul.menu li a").mouseenter(function(){
		$(this).parent().find("ul.sub-menu").slideDown("fast").show();
		$(this).parent().hover(function(){},function(){
			$(this).parent().find("ul.sub-menu").slideUp("slow")
		})
	}).hover(function(){
		$(this).addClass("subhover")
	},
	function(){
		$(this).removeClass("subhover")
	})
});