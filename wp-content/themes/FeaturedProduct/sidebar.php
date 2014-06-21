<?php wp_reset_query(); ?>
<div class="sidebar">
    <!-- NaviBar begin -->
    <?php /*?><?php wp_nav_menu( array('theme_location' =>'barmenu','container' => '','depth' => 2,'menu_class'  => 'navibar' )); ?><?php */?>
    <!-- NaviBar end -->
    <!-- Widgets begin -->
    <ul>
    	<?php if ( is_home()||is_front_page() ) { ?>
		<?php } elseif ( is_page() ) { ?>
            <!-- SubPageList begin -->
            <?php
                $parent_page = $post->ID;
                while($parent_page) {
                    $page_query = $wpdb->get_row("SELECT ID, post_title, post_status, post_parent FROM $wpdb->posts WHERE ID = '$parent_page'");
                    $parent_page = $page_query->post_parent;
                 }
               $parent_id = $page_query->ID;
               $parent_title = $page_query->post_title;
                if ($wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = '$parent_id' AND post_status != 'attachment'")) { ?>
                    <?php $subpage = wp_list_pages('depth=1&echo=0&child_of='.$parent_id); ?><?php //key ?>
                    <?php if($subpage) { ?>
                        <li>
            				<h3>栏目导航</h3>
                            <ul class="navibar"><?php wp_list_pages('depth=1&sort_column=menu_order&title_li=&child_of='. $parent_id); ?></ul>
                        </li>
                    <?php } ?>
                <?php } ?>
            <!-- SubPageList end -->
        <?php } elseif( is_search() || is_404() ) { ?>
        <?php } else { ?>
            <?php
                $this_category = get_the_category();
                $category_id = $this_category[0]->cat_ID;
                $parent_id = get_category_root_id( $category_id );
                $category_link = get_category_link( $parent_id );
                $childcat = get_categories('child_of='.$parent_id);
                if( $childcat && $parent_id ){
            ?>
            <!-- SubCatList begin -->
            <li>
            	<h3>栏目导航</h3>
                <ul class="navibar">
                    <?php wp_list_categories("use_desc_for_title=0&title_li=0&orderby=id&child_of=" . $parent_id . "&depth=1&hide_empty=0"); ?>
                </ul>
            </li>
            <!-- SubCatList end -->
            <?php } else { ?><?php } ?>
        <?php } ?>
        <?php wp_reset_query(); ?>
    	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
        <!-- Search begin -->
        <li class="widget_search">
            <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
                <input class="searchInput" type="text" value="输入关键字" name="s" id="s" />
                <input id="searchsubmit" class="searchBtn" type="submit" title="搜索" value="搜 索">
            </form>
        </li>
        <!-- Search begin -->
        <?php if (get_option('wpyou_products_id')) { $productsid = get_option('wpyou_products_id'); } ?>
        <!-- ProductCatList begin -->
        <li class="widget widget_nav_menu">
           <h3><?php echo get_cat_name( $productsid ); ?></h3>
            <ul>
                <?php wp_list_cats("orderby=id&child_of=" . $productsid . "&depth=2&hide_empty=0"); ?>
            </ul>
        </li>
        <!-- ProductCatList end -->
        <li id="text-2" class="widget widget_text">
            <div class="textwidget">
            <h4>联系我们</h4>
            索亚特试验设备无锡总公司<br>
            地址：无锡市梅村镇工业集中区<br>
            电话：0510-88155840<br>
            　　　13301539911<br>
            传真：0510-81006835<br>
            Q Q：84198860<br>
            邮箱：wpyou@qq.com<br>
            网址： www.wpyou.com<br>
            <a href="/contact-us/"><img title="联系我们" src="<?php bloginfo('template_directory');?>/images/contact.jpg" alt="" width="154" height="137"></a>
			</div>
		</li>
		<?php endif; ?>
    </ul>
    <!-- Widgets end -->
</div>
<?php wp_reset_query(); ?>