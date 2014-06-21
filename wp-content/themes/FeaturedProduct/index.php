<?php get_header(); ?>
    <!-- Content Begin-->
    <div class="content features">
        <!-- About begin -->
        <div class="section aboutus">
        	<h2><a href="<?php bloginfo('siteurl');?>/about">关于我们</a> <span><a href="<?php bloginfo('siteurl');?>/about"></a></span></h2>
            <div>
            <?php if ( get_option('wpyou_aboutus') ) {
                $aboutus = get_option('wpyou_aboutus');
                $aboutus = str_replace(" "," ",$aboutus);
                $aboutus = stripslashes($aboutus); 
                echo $aboutus;
            } else { ?>
                请在后台的【 当前主题设置 - 首页设置 】中添加 企业简介 的内容
            <?php } ?>
            </div>
        </div>
        <!-- About end -->
        <!-- News begin -->
        <div class="section news">
            <h2>
			<?php if (get_option('wpyou_news_id')) { $newsid = get_option('wpyou_news_id'); ?>
                <a href="<?php echo get_category_link( $newsid );?>"><?php echo get_cat_name( $newsid ); ?></a>
                <span><?php if (get_option('wpyou_news_id')) { $newsid = get_option('wpyou_news_id'); ?><a href="<?php echo get_category_link( $newsid );?>"></a><?php } ?></span>
            <?php } else { ?>
                 <a href="<?php bloginfo('siteurl');?>/category/news">公司新闻</a>
                 <span><a href="<?php bloginfo('siteurl');?>/category/news"></a></span>
            <?php } ?>
            </h2>
            <ul>
            <?php if (get_option('wpyou_news_id')) { $newsid = get_option('wpyou_news_id'); ?>
                <?php query_posts('caller_get_posts=1&showposts=7&cat='.$newsid); ?>
            <?php } else { ?>
                <?php query_posts('caller_get_posts=1&showposts=7&category_name=news'); ?>
            <?php } ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                 <li><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a><span><?php the_time('Y-m-d') ?></span></li>
                <?php endwhile; endif; ?>
            </ul>
        </div>
        <!-- News end -->
        <div class="dotline"></div>
        <!-- Products begin -->
        <div class="section products">
            <h2>
			<?php if (get_option('wpyou_products_id')) { $productsid = get_option('wpyou_products_id'); ?>
                <a href="<?php echo get_category_link( $productsid );?>"><?php echo get_cat_name( $productsid ); ?></a>
            <?php } else { ?>
                 <a href="<?php bloginfo('siteurl');?>/category/products">产品栏目1</a>
            <?php } ?>
            <span><?php if (get_option('wpyou_products_id')) { $productsid = get_option('wpyou_products_id'); ?>
                <a href="<?php echo get_category_link( $productsid );?>"></a>
            <?php } else { ?>
                 <a href="<?php bloginfo('siteurl');?>/category/products"></a>
            <?php } ?></span>
            </h2>
            <ul>
            <?php if (get_option('wpyou_products_id')) { $productsid = get_option('wpyou_products_id'); ?>
                <?php query_posts('caller_get_posts=1&showposts=3&cat='.$productsid); ?>
            <?php } else { ?>
                <?php query_posts('caller_get_posts=1&showposts=3&category_name=products'); ?>
            <?php } ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                 <li>
                    <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><?php wpyou_post_thumbnail( 100,100 ) ?></a>
                    <h3><a href="<?php the_permalink() ?>"title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                    <div class="describe"><?php if(has_excerpt()) { echo wpyou_strimwidth(strip_tags(apply_filters('the_excerpt()', $post->post_excerpt)), 0, 70," ..."); } else { echo wpyou_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 70," ..."); } ?></div>
                </li>
                <?php endwhile; endif; ?>
            </ul>
        </div>
        <!-- Products end -->
        <!-- Application begin -->
        <div class="section products application">
            <h2>
			<?php if (get_option('wpyou_app_id')) { $appid = get_option('wpyou_app_id'); ?>
                <a href="<?php echo get_category_link( $appid );?>"><?php echo get_cat_name( $appid ); ?></a>
            <?php } else { ?>
                 <a href="<?php bloginfo('siteurl');?>/category/application">产品栏目2</a>
            <?php } ?>
            <span><?php if (get_option('wpyou_app_id')) { $appid = get_option('wpyou_app_id'); ?>
                <a href="<?php echo get_category_link( $appid );?>"></a>
            <?php } else { ?>
                 <a href="<?php bloginfo('siteurl');?>/category/application"></a>
            <?php } ?></span>
            </h2>
            <ul>
            <?php if (get_option('wpyou_app_id')) { $appid = get_option('wpyou_app_id'); ?>
                <?php query_posts('caller_get_posts=1&showposts=3&cat='.$appid); ?>
            <?php } else { ?>
                <?php query_posts('caller_get_posts=1&showposts=3&category_name=application'); ?>
            <?php } ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                 <li>
                    <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" ><?php wpyou_post_thumbnail( 100,100 ) ?></a>
                    <h3><a href="<?php the_permalink() ?>"title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                    <div class="describe"><?php if(has_excerpt()) { echo wpyou_strimwidth(strip_tags(apply_filters('the_excerpt()', $post->post_excerpt)), 0, 70," ..."); } else { echo wpyou_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 70," ..."); } ?></div>
                </li>
                <?php endwhile; endif; ?>
            </ul>
        </div>
        <!-- Application end -->
    </div>
    <!-- Content end -->
	<!-- Sidebar Begin-->
    <?php include (TEMPLATEPATH . '/sidebar.php'); ?>
    <!-- Sidebar end-->
<?php get_footer(); ?>