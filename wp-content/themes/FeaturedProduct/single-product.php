<?php get_header(); ?>
    <!-- Content begin -->
    <div class="content">
        <!-- Board begin -->
        <?php include (TEMPLATEPATH . '/breadcrumb.php'); ?>
        <!-- Board end -->
        <!-- Single begin -->
        <div class="archive">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                <div class="productMeta">
                    <div class="productImg">
                        <a href="<?php if ( get_post_meta($post->ID, 'thumbnail', true) ) { echo $thumbnail = get_post_meta($post->ID, 'thumbnail', true); } elseif ( has_post_thumbnail() ) { $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 2000,1500 ), false); echo $thumbnail[0]; } else { echo catch_post_image(); } ?>" title="<?php the_title(); ?>">
                            <?php wpyou_post_thumbnail( 300,250 ) ?>
                            <span class="zoomIn">点击放大</span>
                        </a>
                    </div>
                    <ul class="metaList">
                        <li><strong>产品名称:</strong><h1><?php the_title(); ?></h1></li>
                        <li><strong>所属分类:</strong><?php the_category(' / ') ?></li>
                        <?php if ( get_post_meta($post->ID, 'ProductType', true) ) {  ?><li><strong>产品型号:</strong><?php echo get_post_meta($post->ID, 'ProductType', true); ?></li><?php } ?>
                        <li><?php if(has_excerpt()) { echo wpyou_strimwidth(strip_tags(apply_filters('the_excerpt()', $post->post_excerpt)), 0, 200," ..."); } else { echo wpyou_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200," ..."); } ?></li>
                        <li class="inquiry">
                    	<a href="#respond" title="Inquiry Now"><img src="<?php bloginfo('template_url'); ?>/images/inquiry.gif" /></a>
                        <?php if ( get_option('wpyou_QQ') ) { ?><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo get_option('wpyou_QQ'); ?>&site=qq&menu=yes" title="QQ在线咨询"><img src="<?php bloginfo('template_url'); ?>/images/qq.gif" /></a><?php } ?>
                        <?php if ( get_option('wpyou_WangWang') ) { ?><a target="_blank" href="http://amos.im.alisoft.com/msg.aw?v=2&uid=<?php echo get_option('wpyou_WangWang'); ?>&site=cnalichn&s=1" alt="阿里旺旺"><img src="<?php bloginfo('template_url'); ?>/images/wangwang.gif" /></a><?php } ?>
                    	<?php if ( get_option('wpyou_MSN') ) { ?><a href="msnim:chat?contact=<?php echo $MSN = get_option('wpyou_MSN'); ?>" title="Chat with MSN"><img src="<?php bloginfo('template_url'); ?>/images/msn.gif" /></a><?php } ?>
                    	<?php if ( get_option('wpyou_Skype') ) { ?><a href="skype:<?php echo $Skype = get_option('wpyou_Skype'); ?>?call" title="Call Us"><img src="<?php bloginfo('template_url'); ?>/images/skype.gif" /></a><?php } ?>
                        </li>
                    </ul>
                </div>
                <div class="single singleProduct">
                    <h2 class="ptitle"><span>产品描述</span></h2>
                    <?php the_content(''); ?>
                </div>
                <?php endwhile; ?>
            <?php else : ?>
                <div class="error">
                    <p>
                        <strong>暂无相关文章</strong><br />
    抱歉, 暂无相关文章! <a href="<?php echo get_settings('home'); ?>">您可以返回首页</a>
                    </p>
                </div>
            <?php endif; ?>
            <div class="clearfix"></div>
            <div class="postnavi">
                <div class="previous_post"><?php previous_post_link('%link', '<strong>&laquo; 上一个产品:</strong> %title', TRUE, ''); ?></div>
                <div class="next_post"><?php next_post_link('%link', '%title <strong>:下一个产品 &raquo;</strong>', TRUE, ''); ?></div>
            </div>
            <!-- PostComment begin -->
            <div class="postComment">
                <?php comments_template(); ?>
            </div>
            <!-- PostComment end -->
        </div>
        <!-- Single end -->
    </div>
    <!-- Content end -->
    <!-- Sidebar Begin-->
    <?php include (TEMPLATEPATH . '/sidebar.php'); ?>
    <!-- Sidebar end-->
<?php get_footer(); ?>