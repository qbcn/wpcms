<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="keywords" content="<?php
	// 如果是首页和文章列表页面
	if(is_front_page() || is_home()) { 
		echo get_option('mytheme_keywords');
	// 如果是文章详细页面和独立页面
	} else if( is_page()) {
		if(get_post_meta($post->ID, "关键字",true)) {
			echo get_post_meta($post->ID, "关键字",true);}
		else {
			echo get_option('mytheme_keywords');
		}
	} else if(is_single()) {
		if(get_post_meta($post->ID, "关键字",true)) {
			echo get_post_meta($post->ID, "关键字",true);
		} else {
			echo get_option('mytheme_keywords');
		}
	} else {
		echo get_option('mytheme_keywords');
	}
	?>" />
	<meta name="description" content="<?php
	// 如果是首页和文章列表页面
	if(is_front_page() || is_home()) { 
		echo get_option('mytheme_description');
 	// 如果是文章详细页面和独立页面
	} else if(is_page() ) {
		if(get_post_meta($post->ID, "描述",true)) {
			echo get_post_meta($post->ID, "描述",true);
		} else {
			echo  substr(strip_tags($post->post_content), 0, 420);
		}
	// 如果是类目页面, 显示类目表述
	} 
	else if(is_single()) {
		if(get_post_meta($post->ID, "描述",true)) {
			echo get_post_meta($post->ID, "描述",true);}
		else {
			echo  substr(strip_tags($post->post_content), 0, 420);
		}
	} else {
		echo   get_option('mytheme_description');
	}
	?>" />
	<?php if (is_search()) { ?><meta name="robots" content="noindex, nofollow" /><?php } ?>

	<title><?php
		if (function_exists('is_tag') && is_tag()) {
			single_tag_title("找到标签  &quot;"); echo '&quot; - '; }
 		elseif (is_archive()) {
			wp_title(''); echo '  - '; }
		elseif (is_search()) {
			echo '找到信息 &quot;'.wp_specialchars($s).'&quot; - '; }
		elseif (!(is_404()) && (is_single()) || (is_page())) {
			wp_title(''); echo ' - '; }
		elseif (is_404()) {
			echo '没有找到您的信息 - '; }
		if (is_home()) {
			bloginfo('name'); echo ' - '; bloginfo('description'); }
		else {
			bloginfo('name'); }
		if ($paged>1) {
			echo ' - page '. $paged;echo ' - '; bloginfo('description'); }
	?></title>

	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" />

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>

	<script type="text/javascript">
	//DD_belatedPNG.fix('div, ul, img, li, input , a, h3');
	$(function() {
		$("img.wp-post-image").lazyload({
			placeholder : "<?php bloginfo('template_url'); ?>/images/nopicsr.gif", 
			effect : "fadeIn"
		});
	});
	</script>
</head>

<body <?php body_class(); ?>>
<div id="page-wrap">
	<div id="header">
		<div class="header_in">
			<h1 class="logo" title="<?php bloginfo('name'); ?>">
			<a href="<?php echo get_option('home'); ?>/">
			<?php if (get_option('mytheme_logo')!=""): ?>
			<img src="<?php echo get_option('mytheme_logo'); ?>"alt="<?php bloginfo('name'); ?>" /> 
			<?php else : ?>
			<img src="<?php bloginfo('template_url'); ?>/images/logo.png"alt="<?php bloginfo('name'); ?> "/>
			<?php endif; ?>  
			</a>
			</h1>
			<div id="navigation">
			<?php wp_nav_menu(array( 'theme_location' => 'header-menu' ) ); ?>
			<div class="navkg2">收起导航；︿ </div>
			</div>
			<div class="navkg"> 打开导航﹀</div>
		</div>
	 	<div class="shadow"></div> 
	</div><!-- header -->

	<?php if (get_option('mytheme_ad_img')!=""): ?>
	<div class="ad"  style=" background:url(<?php echo get_option('mytheme_ad_img'); ?>)">
	<?php else : ?>
	<div class="ad">
	<?php endif; ?> 
		<div class="ad-text">
		<?php if (get_option('mytheme_ad_title')!=""): ?>
		<h2><?php echo get_option('mytheme_ad_title'); ?></h1>
		<?php else : ?>
		<b>YOUR SLOGAN HERE</b>
		<?php endif; ?> 
		<?php if (get_option('mytheme_ad_text')!=""): ?>
		<p><?php echo get_option('mytheme_ad_text'); ?></p>
		<?php else : ?>
		<p>增强版格子商铺</p>
		<?php endif; ?>
		</div>
 	</div><!-- ad -->
