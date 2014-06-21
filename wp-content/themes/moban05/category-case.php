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
         <?php
              $cat=get_category_by_slug('cases'); //获取分类别名为 wordpress 的分类数据
			  $cat_links=get_category_link($cat->term_id); // 通过$cat数组里面的分类id获取分类链接
         ?>
            <div class="zz1"><?php echo $cat->name; ?></div>
            <div class="zz2">company case</div>
         </div>
    </div>
    <div class="ym3">
         <div class="ym3_1">
             <div class="al">
                  <div class="al1">
                       <div class="al1_1">company case</div>
                       <div class="al1_2"><?php echo $cat->name; ?></div>
                  </div>
                  <div class="al2">
                  <?php $posts = query_posts($query_string . '&orderby=date'); ?>
                  <?php if( $posts ) : ?>
                   <ul>
                   <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
                       <div class="al2_1">
                            <a href="<?php
                                      global $post;
                                      echo   $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                                      ?>" rel="lightbox[set_3]" class="case_img">
                            <div class="al2_2">
                                 <div class="altp">
                                        <?php the_post_thumbnail('large'); ?>
                                 </div>
                                 <div class="altp2"><img src="<?php bloginfo('template_url'); ?>/images/tubb.png" /></div>
                            </div>
                            <div class="albt">
                                 <div class="albt1"><?php echo mb_strimwidth(get_the_title(), 0, 30,"...") ?></div>
                                 <div class="albt2">TIME:<?php the_time('20y-m-d')?></div>
                            </div>
                            </a>
                       </div>
                   <?php endforeach; ?>
                   <?php else : ?>
                       <div class="al2_1">
                            <a href="<?php bloginfo('template_url'); ?>/images/al1.jpg" rel="lightbox[set_3]" class="case_img">
                            <div class="al2_2">
                                 <div class="altp">
                                        <img src="<?php bloginfo('template_url'); ?>/images/al1.jpg" />
                                 </div>
                                 <div class="altp2"><img src="<?php bloginfo('template_url'); ?>/images/tubb.png" /></div>
                            </div>
                            <div class="albt">
                                 <div class="albt1">调用案例标题</div>
                                 <div class="albt2">TIME:2012-02-02</div>
                            </div>
                            </a>
                       </div>
                       <div class="al2_1">
                            <a href="<?php bloginfo('template_url'); ?>/images/al1.jpg" rel="lightbox[set_3]" class="case_img">
                            <div class="al2_2">
                                 <div class="altp">
                                        <img src="<?php bloginfo('template_url'); ?>/images/al1.jpg" />
                                 </div>
                                 <div class="altp2"><img src="<?php bloginfo('template_url'); ?>/images/tubb.png" /></div>
                            </div>
                            <div class="albt">
                                 <div class="albt1">调用案例标题</div>
                                 <div class="albt2">TIME:2012-02-02</div>
                            </div>
                            </a>
                       </div>
                       <div class="al2_1">
                            <a href="<?php bloginfo('template_url'); ?>/images/al1.jpg" rel="lightbox[set_3]" class="case_img">
                            <div class="al2_2">
                                 <div class="altp">
                                        <img src="<?php bloginfo('template_url'); ?>/images/al1.jpg" />
                                 </div>
                                 <div class="altp2"><img src="<?php bloginfo('template_url'); ?>/images/tubb.png" /></div>
                            </div>
                            <div class="albt">
                                 <div class="albt1">调用案例标题</div>
                                 <div class="albt2">TIME:2012-02-02</div>
                            </div>
                            </a>
                       </div>
                       <div class="al2_1">
                            <a href="<?php bloginfo('template_url'); ?>/images/al1.jpg" rel="lightbox[set_3]" class="case_img">
                            <div class="al2_2">
                                 <div class="altp">
                                        <img src="<?php bloginfo('template_url'); ?>/images/al1.jpg" />
                                 </div>
                                 <div class="altp2"><img src="<?php bloginfo('template_url'); ?>/images/tubb.png" /></div>
                            </div>
                            <div class="albt">
                                 <div class="albt1">调用案例标题</div>
                                 <div class="albt2">TIME:2012-02-02</div>
                            </div>
                            </a>
                       </div>
                       <div class="al2_1">
                            <a href="<?php bloginfo('template_url'); ?>/images/al1.jpg" rel="lightbox[set_3]" class="case_img">
                            <div class="al2_2">
                                 <div class="altp">
                                        <img src="<?php bloginfo('template_url'); ?>/images/al1.jpg" />
                                 </div>
                                 <div class="altp2"><img src="<?php bloginfo('template_url'); ?>/images/tubb.png" /></div>
                            </div>
                            <div class="albt">
                                 <div class="albt1">调用案例标题</div>
                                 <div class="albt2">TIME:2012-02-02</div>
                            </div>
                            </a>
                       </div>
                       <div class="al2_1">
                            <a href="<?php bloginfo('template_url'); ?>/images/al1.jpg" rel="lightbox[set_3]" class="case_img">
                            <div class="al2_2">
                                 <div class="altp">
                                        <img src="<?php bloginfo('template_url'); ?>/images/al1.jpg" />
                                 </div>
                                 <div class="altp2"><img src="<?php bloginfo('template_url'); ?>/images/tubb.png" /></div>
                            </div>
                            <div class="albt">
                                 <div class="albt1">调用案例标题</div>
                                 <div class="albt2">TIME:2012-02-02</div>
                            </div>
                            </a>
                       </div>
                   </ul>
                   <?php endif; ?>
                  </div>
                  <div class="pager">   <?php par_pagenavi(); ?>  </div>
             </div>
         </div>
    </div>
</div>

<?php get_footer(); ?>
