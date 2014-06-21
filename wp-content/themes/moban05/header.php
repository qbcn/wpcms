<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="keywords" content="
    
    <?php
	

		
 // 如果是首页和文章列表页面
	if(is_front_page() || is_home()) { 
	echo get_option('mytheme_keywords');
 
	// 如果是文章详细页面和独立页面
		} else if( is_page()) {

		echo   get_option('mytheme_keywords');
	
 
	} else if(is_single()) {
	
	$tags = wp_get_post_tags($post->ID);

foreach ($tags as $tag ) {

echo $keywords . $tag->name . ",";}
	
	// 如果是类目页面, 显示类目表述
	} else if(is_category()) {

	echo get_option('mytheme_keywords');
	
 
	// 如果是搜索页面, 显示搜索表述
	} else if(is_search()) {
		echo get_option('mytheme_keywords');
 
	// 如果是标签页面, 显示标签表述
	} else if(is_tag()) {
		echo get_option('mytheme_keywords');
 
	// 如果是日期页面, 显示日期范围描述
	} else if(is_date()) {
	echo get_option('mytheme_keywords');
 
	// 其他页面显示博客标题
	} else {
		echo get_option('mytheme_keywords');
	}
?>
    
    
    
    
    
    " />
 
<meta name="description" content="

<?php
	

		
 // 如果是首页和文章列表页面
	if(is_front_page() || is_home()) { 
	echo get_option('mytheme_description');
 
	// 如果是文章详细页面和独立页面
	} else if(is_single() ) {
		if($post->post_excerpt) {
		echo  $post->post_excerpt;
	} else {
	
		echo  substr(strip_tags($post->post_content), 0, 220);
	}
 
	
	
	// 如果是类目页面, 显示类目表述
	} else if(is_category()) {

		echo   get_option('mytheme_description');
	
 
	// 如果是搜索页面, 显示搜索表述
	} else if(is_search()) {
		echo   get_option('mytheme_description');
 
	// 如果是标签页面, 显示标签表述
	} else if(is_tag()) {
		echo   get_option('mytheme_description');
 
	// 如果是日期页面, 显示日期范围描述
	} else if(is_date()) {
	echo   get_option('mytheme_description');
 
	// 其他页面显示博客标题
	} else {
		echo   get_option('mytheme_description');
	}
?>




" />


	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
	
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/zdy1.css" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/zdy2.css" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" />
    
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?><?php wp_head(); ?>
    <!--ָ---->
     <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/alixixi_jquery.min.js"></script>
     <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.4.4.min.js"></script>
    
	<script src="<?php bloginfo('template_url'); ?>/png/pngtm.js" type="text/javascript"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('div, ul, img, li, input , a , textarea , ol , p , span , h1');
    </script>

    
    
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
<div id="page-wrap">
  <div id="header">
       <div class="logo">
            <?php if (get_option('mytheme_logo')!=""): ?>                                <!--判断语句-->
                  <img src="<?php echo get_option('mytheme_logo'); ?>" />                       <!--输出语句-->
            <?php else : ?>                                                                 <!--否定语句-->
                  <img src="<?php bloginfo('template_url'); ?>/images/logo.png" />
            <?php endif; ?>
       </div>
       <div id="navigation" ><?php wp_nav_menu(array( 'theme_location' => 'header-menu' ) ); ?></div>
  </div>
</div>
