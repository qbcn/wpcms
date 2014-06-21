    <div class="clearfix"></div>
    <!-- FriendLink begin -->
    <?php wp_reset_query(); ?>
    <?php if (get_option('wpyou_if_friendlink') == '2') { ?>
    
    <?php } elseif(get_option('wpyou_if_friendlink') == '1') { ?>
        <?php if ( is_home() ) { ?>
            <div class="friendlink">
                <h3>友情链接</h3>
                <ul>
                    <?php wp_list_bookmarks('title_li=&title_before=&title_after=&categorize=0&orderby=link_id&order=ASC'); ?>
                </ul>
            </div>
        <?php } ?>
    <?php } else { ?>
        <div class="friendlink">
            <h3>友情链接</h3>
            <ul>
                <?php wp_list_bookmarks('title_li=&title_before=&title_after=&categorize=0&orderby=link_id&order=ASC'); ?>
            </ul>
        </div>
    <?php } ?>
    <!-- FriendLink end -->
    <!-- Footer begin -->
    <div class="footer">
        <div class="foot inner">
            <!-- FootPage begin -->
            <?php if ( function_exists('wp_nav_menu') ) { ?>
                <?php wp_nav_menu( array('theme_location' =>'footmenu','container' => '','depth' => 1,'menu_class'  => 'footpage' )); ?>
            <?php } ?>
            <!-- FootPage end -->
            <?php if ( get_option('wpyou_footer') ) { ?>
                <?php echo stripslashes(get_option('wpyou_footer')); ?>
            <?php } else { ?> 
                <p>Copyright &copy; <?php echo date("Y"); ?> <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a> All Rights Reserved.</p>
                <p>网站开发设计: <a href="http://www.wpyou.com" target="_blank">WPYOU</a></p>
            <?php } ?>
        </div>
    </div>
    <!-- Footer end -->
</div></div>
<!-- Wrapper end -->
<?php wp_footer(); ?>
</body>
</html>