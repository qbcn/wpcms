$(document).ready(function() {
  
$(".cat_nav").mouseenter(function() { $(this).next(".drop_nav").slideToggle(500);});
$(".drop_nav").mouseleave(function() { $(this).slideToggle(500); });
$(".vedio_player,.pic_r_pic,.first_v").mouseenter(function() { $(this).children(".btn_over,.picl_over_li").fadeIn(500);});
$(".vedio_player,.pic_r_pic,.first_v").mouseleave(function() { $(this).children(".btn_over,.picl_over_li").fadeOut(500);}); 
$(".play_vedio").click(function() { $(this).parent(".btn_over").next("iframe ").fadeIn(500);}); 
$(".vedio_in ul li,.pic_l_in ul li").mouseenter(function() { $(this).children(".vedio_over_li").animate({ "bottom": 0},500);});
$(".vedio_in ul li,.pic_l_in ul li").mouseleave(function() { $(this).children(".vedio_over_li").animate({ "bottom": "-100%"}, 500);});

$(".tb_qie").click(function() {
	if($(this).next(".qie_box").hasClass("cusre")){}else{
	 $(this).parent("li").parent("ul").children("li").children(".qie_box").slideUp(300);
	 $(this).next(".qie_box").slideDown(500);
	 $(this).parent("li").parent("ul").children("li").children(".qie_box").removeClass("cusre")
	$(this).next(".qie_box").addClass("cusre")
	}
	 });  
	 

 
$(".ouf_1").click(function() {
	if($(this).hasClass("cues")){}else{
	 $(this).parent(".fourq_title").nextAll("ul").fadeOut(0);
	 $(this).parent(".fourq_title").nextAll(".ulf_1").fadeIn(0);
	 $(this).parent(".fourq_title").children("a").removeClass("cues")
	 $(this).addClass("cues")
	}
	 });  
	 
$(".ouf_2").click(function() {
	if($(this).hasClass("cues")){}else{
	 $(this).parent(".fourq_title").nextAll("ul").fadeOut(0);
	 $(this).parent(".fourq_title").nextAll(".ulf_2").fadeIn(0);
	  $(this).parent(".fourq_title").children("a").removeClass("cues")
	 $(this).addClass("cues")
	}
	 });	 
 $(".ouf_3").click(function() {
	if($(this).hasClass("cues")){}else{
	 $(this).parent(".fourq_title").nextAll("ul").fadeOut(0);
	 $(this).parent(".fourq_title").nextAll(".ulf_3").fadeIn(0);
	  $(this).parent(".fourq_title").children("a").removeClass("cues")
	 $(this).addClass("cues")
	}
	 });
  
    $("#gallery_lightbox").children("li").children("a").mouseenter(function() {
        $(this).children(".hover_lightbox").fadeIn(600);
    });
    $("#gallery_lightbox").children("li").children("a").mouseleave(function() {
        $(this).children(".hover_lightbox").fadeOut(600);
    });
    $("#gallery_xz").mouseenter(function() {
        $(this).children(".flex-direction-nav").children("li").children("a").fadeIn(600);
    });
    $("#gallery_xz").mouseleave(function() {
        $(this).children(".flex-direction-nav").children("li").children("a").fadeOut(600);
    });
    $(".left_p").mouseenter(function() {
        $(this).children("#list_full").animate({
            bottom: "0",
            opacity: 1
        }, 600, "easeOutSine");
    });
    $(".left_p").mouseleave(function() {
        $(this).children("#list_full").animate({
            bottom: "-100px",
            opacity: 0
        }, 600, "easeOutSine");
    });
    $("#gallery_product").children("li").children("a").mouseenter(function() {
        $(this).children(".hover_lightbox").fadeIn(600);
    });
    $("#gallery_product").children("li").children("a").mouseleave(function() {
        $(this).children(".hover_lightbox").fadeOut(600);
    });
 
    $("#nogallery_enter").children(".list-h, #enter_xz").remove();
    $(".header_menu .header_menu_ul li").not(".sub-menu li").append('<div class="hover" id="hover"></div>');
    $(".header_menu .header_menu_ul li .sub-menu li").children("ul").addClass("block");
    $(".header_menu .header_menu_ul li ,.per_drop").hover(function() {
        $(this).children("a").addClass("over_nav");
        $(this).children(".sub-menu,.drop_p,.hover").stop(true, true).fadeIn("200");
    }, function() {
        $(this).children("a").removeClass("over_nav");
        $(this).children(".sub-menu,.drop_p,.hover").stop(true, true).fadeOut("1000");
    });
    $(".kefu_d").stop().mouseenter(function() {
        $(this).children("div").fadeIn(300);
    });
    $(".kefu_d").stop().mouseleave(function() {
        $(this).children("div").fadeOut(300);
    });
    $("#homes").click(function() {
        if ($(this).hasClass("op")) {
            $(".kefu_d").not("#homes").fadeIn(300);
            $(this).removeClass("op");
        } else {
            $(".kefu_d").not("#homes").fadeOut(300);
            $(this).addClass("op");
        }
    });
});



$(".close_order").click(function() {
    $(".shop_form").fadeOut(500);
});

$(".buy_btn .btn").click(function() {
    $(".shop_form").fadeIn(500);
    var a = $(".shop_form").offset().top - 300;
    $("html,body").animate({
        scrollTop: a
    }, 1e3);
});

$("#content_shop_btn").click(function() {
    $(this).addClass("cutyes");
    $("#comment_shop_btn").removeClass("cutyes");
    $("#comment_shop").fadeOut(300);
    $("#content_shop").fadeIn(300);
});

$("#comment_shop_btn").click(function() {
    $(this).addClass("cutyes");
    $("#content_shop_btn").removeClass("cutyes");
    $("#content_shop").fadeOut(300);
    $("#comment_shop").fadeIn(300);
});

$(".lsit_hover  ul#gallery_product li a").stop().mouseover(function() {
    $(".product_pic img").attr("src", $(this).attr("href"));
    $(".product_pic").attr("href", $(this).attr("href"));
    $(".product_pic").attr("title", $(this).attr("title"));
    if ($(".product_pic img").load) {
        $(".product_pic .loading").fadeOut();
    } else {
        $(".product_pic .loading").fadeIn();
    }
    if ($(this).attr("rel") == $(".product_pic img").attr("src")) {
        $(".lsit_hover ul.list-h li").removeClass("bodee");
        $(this).parent("li").addClass("bodee");
    }
});

var sumWidth = 0;

$(".lsit_hover").children("ul").each(function() {
    $(this).css("width", ($(this).children("li").width() + 10) * $(this).children("li").length + "px");
});

$("#product .list .next").click(function() {
    if ($(".lsit_hover").children("ul").width() >= $(".lsit_hover").width() + 30) {
        $(this).prev(".lsit_hover").children("ul").animate({
            "margin-left": -$(".lsit_hover").width()
        }, 600, "easeInOutQuint");
    }
});

$("#product .list .prve").click(function() {
    if ($(".lsit_hover").children("ul").width() >= $(".lsit_hover").width() + 30) {
        $(this).next(".lsit_hover").children("ul").animate({
            "margin-left": 0
        }, 600, "easeInOutQuint");
    }
});

$("#gallery_xz").flexslider({
    animation: "slide",
    controlNav: false,
    slideToStart: 0,
    touch: true,
    easing: "easeOutExpo",
    prevText: "上一张",
    nextText: "下一张",
    animationSpeed: 1500,
    slideshowSpeed: 5e3
});


