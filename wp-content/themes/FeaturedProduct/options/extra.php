<?php 
function catch_post_image() {
global $post,$posts;
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i',$post->post_content,$matches);
$first_img = $matches [1] [0];
if(empty($first_img)){
$site_url = bloginfo('template_url');
$first_img = "$site_url/images/no-thumbnail.jpg";
}
return $first_img;
}
function catch_slider_image() {
global $post,$posts;
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i',$post->post_content,$matches);
$first_img = $matches [1] [0];
if(empty($first_img)){
$site_url = bloginfo('template_url');
$first_img = "$site_url/images/no-slider.jpg";
}
return $first_img;
}
function get_category_root_id($cat)
{
$this_category = get_category($cat);
while($this_category->category_parent)
{
$this_category = get_category($this_category->category_parent);
}
return $this_category->term_id;
}
function post_is_in_descendant_category( $cats,$_post = null )
{
foreach ( (array) $cats as $cat ) {
$descendants = get_term_children( (int) $cat,'category');
if ( $descendants &&in_category( $descendants,$_post ) )
return true;
}
return false;
}
function wpyou_post_thumbnail( $width = 100,$height = 100 ){
global $post;
$site_url = get_bloginfo('template_url');
if ( get_post_meta($post->ID,'thumbnail',true) ) {$thumbnail_src = get_post_meta($post->ID,'thumbnail',true);}
elseif( has_post_thumbnail() ) {$thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),array( $width,$height ),false);$thumbnail_src = $thumbnail_src[0];}
else {
$thumbnail_src = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i',$post->post_content,$matches);
$thumbnail_src = $matches [1] [0];
if( !empty($thumbnail_src) ){
$thumbnail_src = $matches [1] [0];
}else {$thumbnail_src = "$site_url/images/no-thumbnail.jpg";}
}
echo $post_timthumb = '<img src="'.$thumbnail_src.'" alt="'.$post->post_title.'" class="thumb" />';
}
function wpyou_strimwidth($str ,$start ,$width ,$trimmarker ){
$output = preg_replace('/^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$start.'}((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$width.'}).*/s','\1',$str);
return $output.$trimmarker;
}
function wpyou_pagenavi($range = 9){
global $paged,$wp_query;
if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}
if($max_page >1){if(!$paged){$paged = 1;}
previous_posts_link('上一页');
if($max_page >$range){
if($paged <$range){for($i = 1;$i <= ($range +1);$i++){echo "<a href='".get_pagenum_link($i) ."'";
if($i==$paged)echo " class='current'";echo ">$i</a>";}}
elseif($paged >= ($max_page -ceil(($range/2)))){
for($i = $max_page -$range;$i <= $max_page;$i++){echo "<a href='".get_pagenum_link($i) ."'";
if($i==$paged)echo " class='current'";echo ">$i</a>";}}
elseif($paged >= $range &&$paged <($max_page -ceil(($range/2)))){
for($i = ($paged -ceil($range/2));$i <= ($paged +ceil(($range/2)));$i++){echo "<a href='".get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";}}}
else{for($i = 1;$i <= $max_page;$i++){echo "<a href='".get_pagenum_link($i) ."'";
if($i==$paged)echo " class='current'";echo ">$i</a>";}}
next_posts_link('下一页');
}
}
class wpyou_widget_SpecialCatPosts extends WP_Widget {
function wpyou_widget_SpecialCatPosts() {
$widget_ops = array('classname'=>'wpyou_widget_SpecialCatPosts','description'=>__( "显示指定分类的文章列表") );
$this->WP_Widget('SpecialCatPosts',__('WPYOU指定分类文章'),$widget_ops);
}
function widget($args,$instance) {
extract($args);
$args['postcounts'] = empty($instance['postcounts']) ?'10': $instance['postcounts'];
$args['catid'] = empty($instance['catid']) ?'1': $instance['catid'];
SpecialCatPosts($args);
}
function update($new_instance,$old_instance) {
$instance = $old_instance;
$instance['postcounts'] = strip_tags(stripslashes($new_instance['postcounts']));
$instance['catid'] = strip_tags(stripslashes($new_instance['catid']));
return $new_instance;
}
function form($instance) {
$instance = wp_parse_args( (array) $instance,array('title'=>'','postcounts'=>'10') );
$postcounts = htmlspecialchars($instance['postcounts']);
$catid = htmlspecialchars($instance['catid']);
;echo '        <p>
        	<label for="';echo $this->get_field_id('catid');;echo '">';_e('指定分类ID:');;echo '</label>
        	<select name="';echo $this->get_field_name('catid');;echo '" id="';echo $this->get_field_id('catid');;echo '" class="postform">
				';
$categories = get_categories('hide_empty=0&orderby=id');
$wp_cats = array();
foreach ($categories as $category_list ) {
$wp_cats[$category_list->cat_ID] = $category_list->cat_name;
;echo '                    <option value="';echo $category_list->cat_ID;;echo '" ';if ($catid == $category_list->cat_ID)  echo 'selected="selected"';;echo '>';echo $wp_cats[$category_list->cat_ID];;echo '</option>
                ';};echo '            </select>
        </p>
        <p><label for="';echo $this->get_field_id('postcounts');;echo '">';_e('显示文章数量:');;echo '</label> <input size="3" id="';echo $this->get_field_id('postcounts');;echo '" name="';echo $this->get_field_name('postcounts');;echo '" type="text" value="';echo $postcounts;;echo '" /></p>
';
}
}
function SpecialCatPosts($args = array()) {
global $wpdb;
$postcounts = $args['postcounts'];
$catid = $args['catid'];
echo $args['before_widget'];
;echo '	<h3><a href="';echo get_category_link($catid);;echo '" title="';echo get_cat_name( $catid );;echo '">';echo get_cat_name( $catid );;echo '</a></h3>
    <ul>
		';
global $post;
$recentposts = get_posts('category='.$catid .'&numberposts='.$postcounts);
foreach($recentposts as $post) :
;echo '            <li><a href="';the_permalink();;echo '" title="';the_title();;echo '">';the_title();;echo '</a></li>
         ';endforeach;;echo '    </ul> 
';echo $args['after_widget'];;echo '';};echo '';register_widget('wpyou_widget_SpecialCatPosts'); ?>