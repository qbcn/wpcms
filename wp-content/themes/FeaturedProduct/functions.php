<?php
//移除头部多余信息  
remove_action('wp_head','wp_generator');//禁止在head泄露wordpress版本号  
remove_action('wp_head','rsd_link');//移除head中的rel="EditURI"  
remove_action('wp_head','wlwmanifest_link');//移除head中的rel="wlwmanifest"  
remove_action('wp_head','adjacent_posts_rel_link_wp_head', 10, 0 );//rel=pre  
remove_action('wp_head','wp_shortlink_wp_head', 10, 0 );//rel=shortlink   
remove_action('wp_head','rel_canonical' );  
//Widget
if ( function_exists('register_sidebars') )
{
	register_sidebar(array(
		'name' => '侧边栏',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}
//Thumbnail
if ( function_exists( 'add_theme_support' ) )
	add_theme_support( 'post-thumbnails' );
include_once('options/extra.php');
include_once('options/options.php');
// CustomBackground
if ( function_exists('add_custom_background')) { add_custom_background(); }
// CustomMenus
if ( function_exists('register_nav_menus')) { register_nav_menus(array('primary' => '<b style="font-style:normal; color:#F00;">顶部菜单</b> 设置'));}
if ( function_exists('register_nav_menus')) { register_nav_menus(array('footmenu' => '<b style="font-style:normal; color:#F00;">底部菜单</b> 设置'));}
//if ( function_exists('register_nav_menus')) { register_nav_menus(array('barmenu' => '<b style="font-style:normal; color:#F00;">边栏菜单</b> 设置'));}
// Custom Comment
function custom_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
         <div class="comment-author vcard">
                <?php /*?><?php echo get_avatar($comment,$size='28'); ?><?php */?>
                <div class="author_info">
					<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
                    <em><?php printf(__('%1$s at %2$s'), get_comment_date('Y/m/d '),  get_comment_time(' H:i:s')) ?></em> <?php edit_comment_link(__('(Edit)'),'  ','') ?>
                </div>
                <div class="reply">
			   		<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
              	</div>
          </div>
		  <?php if ($comment->comment_approved == '0') : ?>
             <em><?php _e('Your comment is awaiting moderation.') ?></em>
             <br />
          <?php endif; ?>
      		<?php comment_text() ?>
     </div>
<?php } ?>