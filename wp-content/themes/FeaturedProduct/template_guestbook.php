<?php
/*
Template Name: 留言板 - 模板
*/
?>
<?php get_header(); ?>
    <!-- Content Begin-->
    <div class="content">
        <!-- Breadcrumb begin -->
        <?php include (TEMPLATEPATH . '/breadcrumb.php'); ?>
        <!-- Breadcrumb end -->
        <!-- PostContent begin -->
		<?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
            <div class="post">
                <h1><?php the_title() ?></h1>
                <?php the_content(''); ?>
                <div class="clearfix"></div>
                <div class="postComment">
					<?php comments_template(); ?>
                </div>
            </div>
            <?php endwhile; ?>
        <?php else : ?>
            <div class="post">
                <strong>暂无相关文章</strong><br />
                <p>没有找到您所需的信息.给您带来不便,敬请谅解! 请您<a href="<?php echo get_settings('home'); ?>">返回首页<?php echo $langblog;?></a></p>
            </div>
        <?php endif; ?>
        <!-- PostContent end -->
    </div>
    <!-- Content end-->
    <!-- Sidebar Begin-->
    <?php include (TEMPLATEPATH . '/sidebar.php'); ?>
    <!-- Sidebar end-->
<?php get_footer(); ?>