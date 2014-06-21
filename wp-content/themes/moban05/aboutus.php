<?php  
/* 
Template Name:aboutus
*/  
?> 


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
            <div class="zz1"><?php
                        if($post->post_parent) {
                        $parent_title = get_the_title($post->post_parent);
                        echo $parent_title;
                    } else {
                        wp_title('');
                        }
                    ?></div>
            <div class="zz2">ABOUT US</div>
         </div>
    </div>
    <div class="ym3">
         <div class="ym3_1">
              <div class="zb">
                  <div class="f1">
                      <h1><?php
                        if($post->post_parent) {
                        $parent_title = get_the_title($post->post_parent);
                        echo $parent_title;
                    } else {
                        wp_title('');
                        }
                    ?></h1><b>About us</b>
                  </div>
                  <div class="f2">
                  <?php
                      if($post->post_parent)
                      $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
                      else
                      $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
                      if ($children) {
                      echo '<ul>';
                      echo $children;
                      echo '</ul>';
                  } ?>
                  </div>
                  <div class="f1">
                      <h1>联系方式</h1><b>Contact us</b>
                  </div>
                  <div class="f2">
                       <p><?php if (get_option('mytheme_lianx3')!=""): ?>
                          联系地址：<?php echo get_option('mytheme_lianx3'); ?><br />
                      <?php else : ?>
                          联系地址：这里输入您的联系地址湖南省长沙市等<br />
                      <?php endif; ?>
                      <?php if (get_option('mytheme_lianx1')!=""): ?>
                          联系电话：<?php echo get_option('mytheme_lianx1'); ?><br />
                      <?php else : ?>
                          联系电话：0731-1234567<br />
                      <?php endif; ?>
                      <?php if (get_option('mytheme_lianx2')!=""): ?>
                          联系人：<?php echo get_option('mytheme_lianx2'); ?><br />
                      <?php else : ?>
                          联系人：XXX	（先生）<br />
                      <?php endif; ?>
                      <?php if (get_option('mytheme_lianx4')!=""): ?>
                          Email：<?php echo get_option('mytheme_lianx4'); ?><br />
                      <?php else : ?>
                          Email：asdsa@dssf.com
                      <?php endif; ?></p>
                  </div>
                  <div class="f3">
                       <div class="f3_1"><?php if (get_option('mytheme_lianx1')!=""): ?>
                          <?php echo get_option('mytheme_lianx1'); ?>
                      <?php else : ?>
                          0731-1234567
                      <?php endif; ?></div>
                  </div>
                  <?php 
                   $name = 'contact'; //page别名
                   global $wpdb;
                   $page_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$name'");
                   $page_data = get_page( $page_id )->post_content;?>
                  <div class="f4">
                       <a href="<? echo get_page_link( $page_id ); ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/xb4.png" /></a>
                  </div>
                  <div class="db11"></div>
              </div>
              
              <div class="yb">
                   <div class="g1">
                        <div class="g1_1">
                            <div class="g1_2"><img src="<?php bloginfo('template_url'); ?>/images/xb5.png" /></div>
                            <div class="g1_3">
                                 <h1><?php
                        if($post->post_parent) {
                        $parent_title = get_the_title($post->post_parent);
                        echo $parent_title;
                    } else {
                        wp_title('');
                        }
                    ?></h1>
                                 <b>Aboout us</b>
                            </div>
                        </div>
                        <div class="g1_4"><a href="<?php bloginfo('url'); ?>">← 返回首页</a></div>
                   </div>
                   <div class="g2">
                       <div class="about">
                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		                         <?php the_content(); ?>
                                 <?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
                            <?php endwhile; endif; ?>
                        </div>
                   </div>
                   <div class="g3"></div>
              </div>
              
         </div>
    </div>
</div>


<?php get_footer(); ?>