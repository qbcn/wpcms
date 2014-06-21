<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
<?php if ( get_option('wpyou_if_seo') == '0') { ?>
<title><?php if ( is_home() ) { ?><?php if( get_option('wpyou_homepage_title') ) { echo get_option('wpyou_homepage_title'); } else { bloginfo('description'); } ?><?php } ?>
<?php if ( is_search() ) { ?>有关“<?php echo $s; ?>”的搜索结果 <?php if( get_option('wpyou_homepage_keywords_separater') ){ echo get_option('wpyou_homepage_keywords_separater'); } else { echo " - ";} ?> <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_404() ) { ?>404页面 <?php if( get_option('wpyou_homepage_keywords_separater') ){ echo get_option('wpyou_homepage_keywords_separater'); } else { echo " - ";} ?> <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_author() ) { ?>作者文章列表 <?php if( get_option('wpyou_homepage_keywords_separater') ){ echo get_option('wpyou_homepage_keywords_separater'); } else { echo " - ";} ?> <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_single() ) { ?><?php single_post_title(''); ?> <?php if( get_option('wpyou_homepage_keywords_separater') ){ echo get_option('wpyou_homepage_keywords_separater'); } else { echo " - ";} ?> <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_page() ) { ?><?php single_post_title(''); ?> <?php if( get_option('wpyou_homepage_keywords_separater') ){ echo get_option('wpyou_homepage_keywords_separater'); } else { echo " - ";} ?> <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_category() ) { ?><?php single_cat_title(); ?> <?php if( get_option('wpyou_homepage_keywords_separater') ){ echo get_option('wpyou_homepage_keywords_separater'); } else { echo " - ";} ?> <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_tag() ) { ?><?php single_tag_title(''); ?> <?php if( get_option('wpyou_homepage_keywords_separater') ){ echo get_option('wpyou_homepage_keywords_separater'); } else { echo " - ";} ?> <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_year() ) { ?>“<?php the_time('Y'); ?>” <?php if( get_option('wpyou_homepage_keywords_separater') ){ echo get_option('wpyou_homepage_keywords_separater'); } else { echo " - ";} ?> <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_month() ) { ?>“<?php the_time('F, Y'); ?>” <?php if( get_option('wpyou_homepage_keywords_separater') ){ echo get_option('wpyou_homepage_keywords_separater'); } else { echo " - ";} ?> <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_day() ) { ?>“<?php the_time('F j, Y'); ?>” <?php if( get_option('wpyou_homepage_keywords_separater') ){ echo get_option('wpyou_homepage_keywords_separater'); } else { echo " - ";} ?> <?php bloginfo('name'); ?><?php } ?>
</title>
<?php
if (is_home()) { 
	if( get_option('wpyou_homepage_description') ){ $homepage_description = get_option('wpyou_homepage_description'); }
	if( get_option('wpyou_homepage_keywords') ){ $homepage_keywords = get_option('wpyou_homepage_keywords'); }
	$description = htmlentities(strip_tags(trim( $homepage_description )),ENT_QUOTES,'UTF-8');
	$keywords = htmlentities(strip_tags(trim( $homepage_keywords )),ENT_QUOTES,'UTF-8');
} elseif (is_single()) {
	if ( get_post_meta($post->ID, "description", $single = true) != "" )
	{
		$description = get_post_meta($post->ID, "description", $single = true);
	} else {
		$description = wpyou_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 130,"...");
	}
	if ( get_post_meta($post->ID, "keywords", $single = true) != "" )
	{
		$keywords = get_post_meta($post->ID, "keywords", $single = true);
	} else {	
		$tags = wp_get_post_tags($post->ID);
		foreach ($tags as $tag ) {
			$tagnames = $tagnames . $tag->name . ",";
			$keywords = rtrim($tagnames,',');
		}
	}
} else if (is_page()) {
	if ( get_post_meta($post->ID, "description", $single = true) != "" )
	{
		$description = get_post_meta($post->ID, "description", $single = true);
	}
	if ( get_post_meta($post->ID, "keywords", $single = true) != "" )
	{
		$keywords = get_post_meta($post->ID, "keywords", $single = true);
	}
} else if (is_category()) {
	$description = htmlentities(strip_tags(trim(category_description())),ENT_QUOTES,'UTF-8');
	$category = get_the_category();
	$keywords = $category[0]->cat_name;
	
} else if (is_tag()) {
	$description = single_tag_title("", false);
	$keywords = single_tag_title("", false);
	
}
?>
<meta name="keywords" content="<?php echo $keywords; ?>" />
<meta name="description" content="<?php echo $description; ?>" />
<?php } else { ?>
<title><?php if ( is_home() ) { ?><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?><?php } ?>
<?php if ( is_category() ) { ?><?php single_cat_title(); ?> - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_search() ) { ?>Search for <?php echo $s; ?><?php } ?>
<?php if ( is_tag() ) { ?><?php single_tag_title(''); ?> - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_single() ) { ?><?php wp_title(''); ?> - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_page() ) { ?><?php wp_title(''); ?> - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_month() ) { ?>Archive - <?php the_time('F, Y'); ?> - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_day() ) { ?>Archive - <?php the_time('F j, Y'); ?> - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_author() ) { ?>Author Archives - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_404() ) { ?>404 Nothing Found - <?php bloginfo('name'); ?><?php } ?>
</title>
<?php } ?>
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/jquery.bxSlider.min.js"></script>
<?php if (is_page() || is_single()) { include (TEMPLATEPATH . '/js/jquery-lightbox.php'); } ?>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/wpyou.js"></script>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body>
<!-- Header begin -->
<div class="header inner">
    <!-- Logo begin -->
    <?php if (is_page() || is_single() || is_404()) { ?>
        <div class="logo"><a href="<?php bloginfo('siteurl');?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name');?></a></div>
    <?php } else { ?>
        <h1 class="logo"> <a href="<?php bloginfo('siteurl');?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name');?></a></h1>
    <?php } ?>
    <!-- Logo end -->
    <!-- HeaderRight begin -->
    <div class="headerR">
        <!-- Language Begin-->
        <div class="language">
            <a href="<?php if ( get_option('wpyou_cnsite_url')) { echo stripslashes(get_option('wpyou_cnsite_url')); } else { bloginfo('url'); } ?>" title="中文版" target="_blank" class="chinese">中文</a>
            <a href="<?php if ( get_option('wpyou_ensite_url')) { echo stripslashes(get_option('wpyou_ensite_url')); } else { bloginfo('url'); } ?>" title="English" target="_blank" class="english">EN</a>
        </div>
        <!-- Language end-->
        <div class="clearfix"></div>
        <!-- Search Begin-->
        <?php include (TEMPLATEPATH . '/searchform.php'); ?>
        <!-- Search end-->
    </div>
    <!-- HeaderRight end -->
</div>
<!-- Header end -->
<!-- Main Menu begin -->
<div class="inner mainmenu">
    <?php wp_nav_menu( array('theme_location' =>'primary','container' => '','depth' => 2,'menu_class'  => 'navi' )); ?>
</div>
<!-- Main Menu end -->
<!-- Wrapper begin -->
<div class="wrapper">
	<!-- Slideshow begin -->
    <?php include (TEMPLATEPATH . '/slideshow.php'); ?>
    <!-- Slideshow end -->
	<div class="inner container">