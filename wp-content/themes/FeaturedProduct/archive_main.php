<?php get_header(); ?>
<!-- Content Begin-->
<div class="content">
    <!-- Breadcrumb begin -->
    <?php include (TEMPLATEPATH . '/breadcrumb.php'); ?>
    <!-- Breadcrumb end -->
    <!-- PostList begin -->
    <?php if (have_posts()) : ?>
    <ul class="postList">
        <?php if ( get_option('wpyou_news_perpage') ) { ?>
            <?php $news_perpage = stripslashes(get_option('wpyou_news_perpage')); ?>
        <?php } else { ?>
            <?php $news_perpage = 20; ?>
        <?php } ?>
        <?php $wp_query = new WP_Query('cat='.$cat.'&orderby=date&caller_get_posts=1&order=DESC&posts_per_page='.$news_perpage.'&paged='.$paged); ?>
        <?php while (have_posts()) : the_post(); ?>
        <li><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a><span><?php the_time('Y-m-d'); ?></span></li>
        <?php endwhile; ?>
    </ul>    
   <?php else : ?>
    <div class="post">
        <p><strong>暂无相关信息</strong><br />
        没有找到您所需的信息.给您带来不便,敬请谅解! 请您<a href="<?php echo get_settings('home'); ?>">返回首页<?php echo $langblog;?></a></p>
    </div>
    <?php endif; ?>
    <!-- PostList end -->
    <div class="clearfix"></div>
    <!-- Navigation begin -->
    <div class="wpagenavi">
        <?php if(function_exists('wpyou_pagenavi')) { wpyou_pagenavi(9); } ?>
    </div>
    <!-- Navigation end -->
</div>
<!-- Content end-->
<!-- Sidebar Begin-->
<?php include (TEMPLATEPATH . '/sidebar.php'); ?>
<!-- Sidebar end-->
<?php get_footer(); ?>