<?php echo '<div class="breadcrumb">
';$post = $posts[0];
;echo '  ';if (is_home()) {;echo '		您的位置: &nbsp;&nbsp;<a href="';echo get_settings('home');;echo '">';bloginfo('name');;echo '</a>
  ';}elseif(is_category()) {;echo '		您的位置: &nbsp;<a href="';echo get_settings('home');;echo '">首页</a> > ';$catstr = get_category_parents($cat,TRUE,' > ');
echo substr($catstr,0,strlen($catstr) -3 );;echo '  ';}elseif (is_search()) {;echo '		您的位置: &nbsp;<a href="';echo get_settings('home');;echo '">首页</a> > ';echo $s;;echo '  ';}elseif(is_tag()) {;echo '		您的位置: &nbsp;<a href="';echo get_settings('home');;echo '">首页</a> > ';single_tag_title();;echo '  ';}elseif (is_day()) {;echo '		您的位置: &nbsp;<a href="';echo get_settings('home');;echo '">首页</a> >';the_time('Y, F jS');;echo '  ';}elseif (is_month()) {;echo '		您的位置: &nbsp;<a href="';echo get_settings('home');;echo '">首页</a> >';the_time('Y, F');;echo '  ';}elseif (is_year()) {;echo '		您的位置: &nbsp;<a href="';echo get_settings('home');;echo '">首页</a> >';the_time('Y');;echo '  ';}elseif (is_author()) {;echo '		您的位置: &nbsp;<a href="';echo get_settings('home');;echo '">首页</a> > 作者文章列表
  ';}elseif (is_single()) {;echo '		您的位置: &nbsp;<a href="';echo get_settings('home');;echo '">首页</a> > ';the_category(' > ') ;echo ' > ';the_title();
  ;}elseif (is_page()) {;echo '		您的位置: &nbsp;<a href="';echo get_settings('home');;echo '">首页</a>
		';
$parent_id = $post->post_parent;
$parents_list = array();
while($parent_id){
$parent_page = get_page($parent_id);
$parents_list[] = ' > <a href="'.get_permalink($parent_page->ID).'">'.get_the_title($parent_page->ID).'</a>';
$parent_id  = $parent_page->post_parent;
}
while(count($parents_list) >0){
$parent = array_pop($parents_list);
echo $output .= isset($parent) ?$parent : '';
};echo ' > ';the_title();;echo '  ';}elseif (is_404()) {;echo '		您的位置: &nbsp;<a href="';echo get_settings('home');;echo '">首页</a> > 404 错误页面
  ';}elseif (isset($_GET['paged']) &&!empty($_GET['paged'])) {;echo '		您的位置: &nbsp;<a href="';echo get_settings('home');;echo '">首页</a> > 存档
  ';};echo '';wp_reset_query();;echo '';edit_post_link('编辑','','');;echo '</div>'; ?>