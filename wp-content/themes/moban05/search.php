<?php get_header(); ?>
<div class="ym">
    <div class="ym4">
         <div class="bb1">
         <?php if (get_option('mytheme_tup3')!=""): ?>
              <img src="<?php echo get_option('mytheme_tup3'); ?>" />
         <?php else : ?>
              <img src="<?php bloginfo('template_url'); ?>/images/bb1.jpg" />
         <?php endif; ?>
         </div>
         <div class="ym4_1"></div>
         <div class="ym4_2">
                <form action="<?php bloginfo('siteurl'); ?>" id="searchform" method="get">
                      <label for="s" class="screen-reader-text"><img src="<?php bloginfo('template_url'); ?>/images/sous.jpg" /></label>
                      <input type="text" id="s" name="s" value="" />
                      <input type="submit" value="" id="searchsubmit" />
                </form>
         </div>
         <div class="ym4_3">
            <div class="zz1">搜索结果</div>
            <div class="zz2">Search results</div>
         </div>
    </div>
    <div class="ym3">
         <div class="ym3_1">
             <div class="al">
                  <div class="al1">
                       <div class="al1_1">Search</div>
                       <div class="al1_2">搜索结果</div>
                  </div>
                  <div class="sos">
                       <?php $posts = query_posts($query_string . '&orderby=date&showposts=5'); ?>
                       <?php if (have_posts()) : ?>
                       <?php while (have_posts()) : the_post(); ?>
                       <div class="sos1">
                            <div class="sos1_1">
                                   <?php if (the_post_thumbnail('')!=""): ?>
                                         <?php the_post_thumbnail('medium'); ?>
                                   <?php else : ?>
                                         <img src="<?php bloginfo('template_url'); ?>/images/cp1.jpg" />
                                   <?php endif; ?>
                                 <div class="sos1_2"><img src="<?php bloginfo('template_url'); ?>/images/cpb.png" /></div>
                            </div>
                            <div class="sos1_3">
                                 <h2><?php echo mb_strimwidth(get_the_title(), 0, 64,"...") ?></h2>
                                 <div class="ss">发布时间:<?php the_time('20y年m月d日 H:i')?>　　　　　发布人：<?php the_author(); ?></div>
                                 <div class="ss2"><?php echo mb_strimwidth(strip_tags($post->post_content), 0,220,"..."); ?></div>
                                 <div class="ss3"><a href="<?php the_permalink() ?>">— 查看详细 —</a></div>
                            </div>
                       </div>
                       <?php endwhile; ?>
                       <?php else : ?>
                       <div class="sos1_4"><img src="<?php bloginfo('template_url'); ?>/images/111.png" /></div>
	                   <?php endif; ?>
                       <div class="pager">   <?php par_pagenavi(); ?>  </div>
                  </div>
             </div>
         </div>
    </div>
</div>

<?php get_footer(); ?>
