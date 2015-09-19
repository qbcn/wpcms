<?php
ob_start();

include_once("load.php");
include_once("widget.php"); 
include_once("xuanxiang.php");
include_once("options/header.php");
include_once("options/footer.php");
include_once("options/initialization.php");
include_once("options/customize_css.php");

remove_action('wp_head','wp_generator');
remove_action('wp_head','rsd_link');
remove_action('wp_head','wlwmanifest_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action('wp_head', 'rel_canonical' );

//增强编辑器结束
 require 'theme-updates/theme-update-checker.php';
	    $example_update_checker = new ThemeUpdateChecker(	
		 'cmsspecial_free', 
         'http://www.themepark.com.cn/free_themes/cmsspecial_free/info.json'  //info.json 的访问地址
);
function custom_excerpt_length( $length ) {
	return 700;    //填写需要截取的字符数，1个汉字=2个字符
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function shoppingbox_theme_support() {
return "您的主题已经支持购物盒子插件，您可以直接使用";
}

function remove_open_sans() {
wp_deregister_style( 'open-sans' );
wp_register_style( 'open-sans', false );
wp_enqueue_style('open-sans','');
}
add_action( 'init', 'remove_open_sans' );
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link',10, 0 );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');
remove_action( 'wp_head', 'rel_canonical' ); 
remove_action ( 'pre_post_update', 'wp_save_post_revision' );
//移除版本号
function themepark_remove_cssjs_ver( $src ) {
	if( strpos( $src, 'ver='. get_bloginfo( 'version' ) ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}
add_filter( 'style_loader_src', 'themepark_remove_cssjs_ver', 999 );
add_filter( 'script_loader_src', 'themepark_remove_cssjs_ver', 999 );


/*特色图片*/

register_nav_menus(
array(
'header-menu' => __( '菜单导航' ),
'drogz-menu' => __( '导航上的下拉菜单（可多层）' ),
'footer-menu' => __( '底部单层' ),
'link-menu2' =>__( '友情链接' ),
'tag-menu2' => __( '多重筛选菜单' ),

)
);

/*特色图片*/
if ( function_exists( 'add_theme_support' ) ) {add_theme_support( 'post-thumbnails' );}
if ( function_exists( 'add_image_size' ) ) {
   
	add_image_size( 'vedio', 150, 103,true );
	
	add_image_size( 'pic_b', 890, 299,true );
	add_image_size( 'twox', 226, 148,true );
	add_image_size( 'case', 310, 207,true );
	add_image_size( 'pic_r', 523, 349,true );

	
	add_image_size( 'gallery_lightbox', 150, 150,true ); 
	add_image_size( 'product-thumb', 624, 400,true );
	
	
	add_image_size( 'gallery-other-thumbb', 610,400); 
    add_image_size( 'gallery-full-thumbb', 930,500,true );
}





function get_category_root_id($cat)
{
$this_category = get_category($cat);   // 取得当前分类
while($this_category->category_parent) // 若当前分类有上级分类时，循环
{
$this_category = get_category($this_category->category_parent); // 将当前分类设为上级分类（往上爬）
}
return $this_category->term_id; // 返回根分类的id号
}



/*分页函数*/
    add_action( 'admin_menu', 'my_page_excerpt_meta_box' );
    function my_page_excerpt_meta_box() {
        add_meta_box( 'postexcerpt', __('Excerpt'), 'post_excerpt_meta_box', 'page', 'normal', 'core' );
    }
	
function par_pagenavi($range = 10){
if(get_option('mytheme_word_t3')==""){$word_t3='返回首页';}else{ $word_t3=get_option('mytheme_word_t3');};
if(get_option('mytheme_word_t4')==""){$word_t4='上一页';}else{ $word_t4=get_option('mytheme_word_t4');};
if(get_option('mytheme_word_t5')==""){$word_t5='下一页';}else{ $word_t5=get_option('mytheme_word_t5');};
if(get_option('mytheme_word_t6')==""){$word_t3='最后一页';}else{ $word_t6=get_option('mytheme_word_t6');};
global $paged, $wp_query;

if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}

if($max_page > 1){if(!$paged){$paged = 1;}

if($paged != 1){echo "<a href='" . get_pagenum_link(1) . "' class='extend'

title=' ".$word_t3."'> ".$word_t3." </a>";}

previous_posts_link($word_t4);

if($max_page > $range){

if($paged < $range){for($i = 1; $i <= ($range + 1); $i++)

{echo "<a href='" . get_pagenum_link($i) ."'";

if($i==$paged)echo " class='current'";echo ">$i</a>";}}

elseif($paged >= ($max_page - ceil(($range/2)))){

for($i = $max_page - $range; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";

if($i==$paged)echo " class='current'";echo ">$i</a>";}}

elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){

for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++)

{echo "<a href='" . get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";}}}

else{for($i = 1; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";

if($i==$paged)echo " class='current'";echo ">$i</a>";}}

next_posts_link($word_t5);

if($paged != $max_page){echo "<a href='" . get_pagenum_link($max_page) . "' class='extend'

title='".$word_t6."'>".$word_t6." </a>";}}

}
/*分页函数*/

//面包屑
function get_breadcrumbs()
{
global $wp_query;
if(get_option('mytheme_word_t7')==""){$word_t7='首页';}else{ $word_t7=get_option('mytheme_word_t7');};
if(get_option('mytheme_word_t8')==""){$word_t12='标签筛选';}else{ $word_t12=get_option('mytheme_word_t12');};
if(get_option('mytheme_word_t9')==""){$word_t9='搜索结果';}else{ $word_t9=get_option('mytheme_word_t9');};
if(get_option('mytheme_word_t10')==""){$word_t10='很遗憾，没有找到你要的信息';}else{ $word_t10=get_option('mytheme_word_t10');};
if ( !is_home() ){
// Start the UL

// Add the Home link
echo '<a href="'. get_settings('home') .'">'. $word_t7 .'</a>';
if ( is_category() )
{
global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo '<a> ></a>'.(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $currentBefore . '<a> ></a><a>';
      single_cat_title();
      echo '' . $currentAfter."</a>";
}
elseif ( is_archive() && !is_category() )
{
echo "<a> > </a><a>".$word_t12."</a>";
}
elseif ( is_search() ) {
echo "<a> > </a> <a>".$word_t9."</a>";
}
elseif ( is_404() )
{
echo "<a> > </a><a>".$word_t10."</a>";
}
elseif ( is_single() )
{
$category = get_the_category();
$category_id = get_cat_ID( $category[0]->cat_name );
echo '<a> > </a> '. get_category_parents( $category_id, TRUE, " <a> > </a> " );
echo " <a> ".the_title('','', FALSE)."</a>";
}
elseif ( is_page() )
{
$post = $wp_query->get_queried_object();
if ( $post->post_parent == 0 ){
echo " <a> > </a><a> ".the_title('','', FALSE)."</a>";
} else {
$title = the_title('','', FALSE);
$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
array_push($ancestors, $post->ID);
foreach ( $ancestors as $ancestor ){
if( $ancestor != end($ancestors) ){
echo ' <a> > </a> <a href="'. get_permalink($ancestor) .'">'. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</a>';
} else {
echo '<a> > </a> <a>'. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</a>';
}
}
}
}
// End the UL

}
}


function get_post_thumbnail_url($post_id){
        $post_id = ( null === $post_id ) ? get_the_ID() : $post_id;
        $thumbnail_id = get_post_thumbnail_id($post->ID);
        if($thumbnail_id ){
                $thumb = wp_get_attachment_image_src($thumbnail_id, 'news-vedio-thumb');
                return $thumb[0];
        }else{
                return false;
        }
}
//增强编辑器开始
add_editor_style('/css/editor-style.css');  
function add_editor_buttons($buttons) {

$buttons[] = 'fontselect';

$buttons[] = 'fontsizeselect';

$buttons[] = 'cleanup';

$buttons[] = 'styleselect';

$buttons[] = 'hr';

$buttons[] = 'del';

$buttons[] = 'sub';

$buttons[] = 'sup';

$buttons[] = 'copy';

$buttons[] = 'paste';

$buttons[] = 'cut';

$buttons[] = 'undo';

$buttons[] = 'image';

$buttons[] = 'anchor';

$buttons[] = 'backcolor';

$buttons[] = 'wp_page';

$buttons[] = 'charmap';

return $buttons;

}

add_filter("mce_buttons_3", "add_editor_buttons");


class Menu_With_Description extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes . 'title="'.  apply_filters( 'the_title', $item->title, $item->ID ) .'">';
		$item_output .= $args->link_before . $args->link_after;
		 if(! empty( $item->description )){$item_output .= '<img src=' .'"' . $item->description .'"'.'alt="'.  apply_filters( 'the_title', $item->title, $item->ID ) . '"/>';}
		 else{ $item_output .=   apply_filters( 'the_title', $item->title, $item->ID );}
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

function get_attachment_id_from_src ($link) {
    global $wpdb;
    $link = preg_replace('/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $link);
    return $wpdb->get_var("SELECT ID FROM {$wpdb->posts} WHERE guid='$link'");
};
	
	function get_category_yes_id($cat)
{
$this_category = get_category($cat);   // 取得当前分类
while($this_category->category_parent) // 若当前分类有上级分类时，循环
{
$this_category = get_category($this_category->category_parent); // 将当前分类设为上级分类（往上爬）
}
return $this_category->term_id; // 返回根分类的id号
}

?>