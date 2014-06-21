<?php get_header(); ?>
    <!-- Content Begin-->
    <div class="content">
        <!-- Breadcrumb begin -->
        <?php include (TEMPLATEPATH . '/breadcrumb.php'); ?>
        <!-- Breadcrumb end -->
        <!-- PostContent begin -->
		<?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
            <div class="post page">
                <h1><?php the_title() ?></h1>
            	<?php the_content(''); ?>
                <div class="clearfix"></div>
                <!-- JiaThis Button BEGIN -->
                <div id="ckepop">
                    <span class="jiathis_txt">分享到：</span>
                    <a class="jiathis_button_tsina"></a>
                    <a class="jiathis_button_tqq"></a>
                    <a class="jiathis_button_t163"></a>
                    <a class="jiathis_button_tsohu"></a>
                    <a class="jiathis_button_renren"></a>
                    <a class="jiathis_button_msn"></a>
                    <a class="jiathis_button_fav"></a>
                    <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank">更多</a>
                </div>
                <script type="text/javascript" src="http://v2.jiathis.com/code/jia.js" charset="utf-8"></script>
                <!-- JiaThis Button END -->
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