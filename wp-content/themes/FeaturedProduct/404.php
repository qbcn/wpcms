<?php get_header(); ?>
    <!-- Content Begin-->
    <div class="content">
    	<!-- Breadcrumb begin -->
        <?php include (TEMPLATEPATH . '/breadcrumb.php'); ?>
        <!-- Breadcrumb end -->
        <div class="post">
            <strong>暂无相关文章</strong><br />
            <p>没有找到您所需的信息.给您带来不便,敬请谅解! 请您<a href="<?php echo get_settings('home'); ?>">返回首页<?php echo $langblog;?></a></p>
        </div>
    </div>
    <!-- Content end-->
    <!-- Sidebar Begin-->
    <?php include (TEMPLATEPATH . '/sidebar.php'); ?>
    <!-- Sidebar end-->
<?php get_footer(); ?>