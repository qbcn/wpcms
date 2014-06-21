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
              $cat=get_category_by_slug('news'); //获取分类别名为 wordpress 的分类数据
			  $cat_links=get_category_link($cat->term_id); // 通过$cat数组里面的分类id获取分类链接
         ?>
            <div class="zz1"><?php echo $cat->name; ?></div>
            <div class="zz2">News</div>
         </div>
    </div>
    <div class="ym3">
         <div class="ym3_1">
              <div class="zb">
                  <div class="f1">
                      <h1><?php echo $cat->name; ?></h1><b>News</b>
                  </div>
                  <div class="f2">
                  <ul><?php echo wp_list_categories("child_of=".$cat->term_id."&depth=0&hide_empty=0&title_li=");?></ul>
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
                            <div class="g1_2"><img src="<?php bloginfo('template_url'); ?>/images/xb6.png" /></div>
                            <div class="g1_3">
                                 <h1><?php echo $cat->name; ?></h1>
                                 <b>News</b>
                            </div>
                        </div>
                        <div class="g1_4"><a href="<?php bloginfo('url'); ?>">← 返回首页</a></div>
                   </div>
                   <div class="g2">
                      <div class="new1">
                      <?php $posts = query_posts($query_string . '&orderby=date'); ?>
                      <?php if( $posts ) : ?>
                      <ul>
                      <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
                            <div class="new1_1">
                                <div class="j1">
                                     <div class="j1_1"><?php the_time('m')?>月</div>
                                </div>
                                <div class="j2">
                                     <h1><a href="<?php the_permalink() ?>"><?php echo mb_strimwidth(get_the_title(), 0, 40,"...") ?></a></h1>
                                     <b><?php the_time('20y-m-d')?></b>
                                     <p><a href="<?php the_permalink() ?>"><?php echo mb_strimwidth(strip_tags($post->post_content), 0,60,"..."); ?></a></p>
                                </div>
                           </div>
                      <?php endforeach; ?>
                      <?php else : ?>
                           <div class="new1_1">
                                <div class="j1">
                                     <div class="j1_1">07月</div>
                                </div>
                                <div class="j2">
                                     <h1><a href="<?php  bloginfo('url');?>/sample2/">调用组件在此处调用显示新闻标题</a></h1>
                                     <b>2012-01-01</b>
                                     <p><a href="<?php  bloginfo('url');?>/sample2/">这里显示调用新闻前面一小段内容文字，您可以再后台添加新闻…</a></p>
                                </div>
                           </div>
                           <div class="new1_1">
                                <div class="j1">
                                     <div class="j1_1">07月</div>
                                </div>
                                <div class="j2">
                                     <h1><a href="<?php  bloginfo('url');?>/sample2/">调用组件在此处调用显示新闻标题</a></h1>
                                     <b>2012-01-01</b>
                                     <p><a href="<?php  bloginfo('url');?>/sample2/">这里显示调用新闻前面一小段内容文字，您可以再后台添加新闻…</a></p>
                                </div>
                           </div>
                           <div class="new1_1">
                                <div class="j1">
                                     <div class="j1_1">07月</div>
                                </div>
                                <div class="j2">
                                     <h1><a href="<?php  bloginfo('url');?>/sample2/">调用组件在此处调用显示新闻标题</a></h1>
                                     <b>2012-01-01</b>
                                     <p><a href="<?php  bloginfo('url');?>/sample2/">这里显示调用新闻前面一小段内容文字，您可以再后台添加新闻…</a></p>
                                </div>
                           </div>
                           <div class="new1_1">
                                <div class="j1">
                                     <div class="j1_1">07月</div>
                                </div>
                                <div class="j2">
                                     <h1><a href="<?php  bloginfo('url');?>/sample2/">调用组件在此处调用显示新闻标题</a></h1>
                                     <b>2012-01-01</b>
                                     <p><a href="<?php  bloginfo('url');?>/sample2/">这里显示调用新闻前面一小段内容文字，您可以再后台添加新闻…</a></p>
                                </div>
                           </div>
                           <div class="new1_1">
                                <div class="j1">
                                     <div class="j1_1">07月</div>
                                </div>
                                <div class="j2">
                                     <h1><a href="<?php  bloginfo('url');?>/sample2/">调用组件在此处调用显示新闻标题</a></h1>
                                     <b>2012-01-01</b>
                                     <p><a href="<?php  bloginfo('url');?>/sample2/">这里显示调用新闻前面一小段内容文字，您可以再后台添加新闻…</a></p>
                                </div>
                           </div>
                           <div class="new1_1">
                                <div class="j1">
                                     <div class="j1_1">07月</div>
                                </div>
                                <div class="j2">
                                     <h1><a href="<?php  bloginfo('url');?>/sample2/">调用组件在此处调用显示新闻标题</a></h1>
                                     <b>2012-01-01</b>
                                     <p><a href="<?php  bloginfo('url');?>/sample2/">这里显示调用新闻前面一小段内容文字，您可以再后台添加新闻…</a></p>
                                </div>
                           </div>
                      </ul>
                      <?php  endif; ?>
                      <div class="pager">   <?php par_pagenavi(); ?>  </div>
                      </div>
                      <div class="new2">
                           <div class="new2_1"><img src="<?php bloginfo('template_url'); ?>/images/new1.png" /></div>
                           <div class="new2_2"><p>News<br />Company<br />公司最新动态</p></div>
                      </div>
                   </div>
                   <div class="g3"></div>
              </div>
              
         </div>
    </div>
</div>
<?php get_footer(); ?>