<?php 
function extraordinaryvision_customize_css(){
	$top_color= get_option('mytheme_top_color');
	$text_top_color= get_option('mytheme_text_top_color');
	$text_black_color= get_option('mytheme_text_black_color');
	$text_white_color= get_option('mytheme_text_white_color');
    $top_blue_color= get_option('mytheme_top_blue_color');
	$nav_color= get_option('mytheme_nav_color');
	$header_color=get_option('mytheme_header_color');
	$footer_white=get_option('mytheme_footer_white');
	$footer_grel=get_option('mytheme_footer_grel');
	$footer_blue=get_option('mytheme_footer_blue');
	$index_blue=get_option('mytheme_index_blue');
	?>
<style id="extraordinaryvision_customize_css" type="text/css">
	 <?php if($top_color!="#404040"){  echo '#top{background:'.$top_color.' }';};
	       if($text_top_color!="#666666"){echo '#top_hui,#top_hui li .sub-menu li a{ color:'.$text_top_color.';}';}
	       if($text_black_color!="#000000"){echo '#top_black,#top_hui li  a{ color:'.$text_black_color.';}';}
		    if($text_white_color!="#ffffff"){echo '#whites #searchsubmit,ul#header_menu li a,#whites{ color:'.$text_white_color.';}';}
			 if($top_blue_color!="#11a3c2"){echo '#header_menu .header_menu_ul li .hover,#whites #searchsubmit, ul#header_menu li .sub-menu li a:hover,#header_menu .cat_nav:hover{ background-color:'.$top_blue_color.';}
			  ul#header_menu  li .sub-menu li a{ color:'.$top_blue_color.'}
			 ';}
			 if($nav_color!="#ffffff"){echo'div.header_menu{background:'.$nav_color.' }';}
	          if($header_color!="#ffffff"){echo '.header{background:'.$header_color.' }';}
			   if($footer_white!="#ffffff"){echo '#footer_in_box b{color:'.$footer_white.' }';}
			   if($footer_grel!="#999999"){echo '#footer_in_box li a,#footer_in_box .about_text,#footer_bottom_link  li a,#footer_bottom_link p{color:'.$footer_grel.' }';}
			     if($footer_blue!="#11a3c2"){echo '#footer_bottom_link p a,#footer_bottom_link  li a:hover,#footer_in_box li a:hover{color:'.$footer_blue.' }';}
	   if($index_blue!="#11a3c2"){echo '#color_set .m_title a,#color_set a:hover,#color_set .fourq ul li.fourq_first span p a{color:'.$index_blue.' }
	   #color_set .pic ul li .pictext span,#color_set .twox .flex-direction-nav li a:hover,#color_set .fourq_title a.cues, #color_set .vedio_player .btn_over a,#color_set .picl_over_li .btn{background:'.$index_blue.' }
	   ';}
	echo stripslashes(get_option('mytheme_zdycss'));
	
	
		
	  ?>
    </style>
<?php }
add_action( 'wp_head', 'extraordinaryvision_customize_css');
?>              