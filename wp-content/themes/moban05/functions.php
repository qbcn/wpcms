<?php

//增强编辑器开始

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

//增强编辑器结束



/*特色图片*/

register_nav_menus(
array(
'header-menu' => __( '导航自定义菜单' )
)
);


if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}
 
if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'customized-post-thumb', 100, 120 );
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






/*截取第一张图片*/
function catch_that_image() {
global $post, $posts;
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
$first_img = $matches [1] [0];
if(empty($first_img)){ //Defines a default image
$first_img = "这里添加默认图片的路径，文章中没有图片时显示";
}
return $first_img;
}
/*截取第一张图片 over*/	

function remove_open_sans() {
wp_deregister_style( 'open-sans' );
wp_register_style( 'open-sans', false );
wp_enqueue_style('open-sans','');
}
add_action( 'init', 'remove_open_sans' );

	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
	 wp_register_script( 'jquery', get_template_directory_uri() ."/js/jquery-1.4.4.min.js", false);
	   wp_enqueue_script('jquery');
	}
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');



/*分页函数*/
    add_action( 'admin_menu', 'my_page_excerpt_meta_box' );
    function my_page_excerpt_meta_box() {
        add_meta_box( 'postexcerpt', __('Excerpt'), 'post_excerpt_meta_box', 'page', 'normal', 'core' );
    }
	
	function par_pagenavi($range = 10){

global $paged, $wp_query;

if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}

if($max_page > 1){if(!$paged){$paged = 1;}

if($paged != 1){echo "<a href='" . get_pagenum_link(1) . "' class='extend'

title='跳转到首页'> 返回首页 </a>";}

previous_posts_link(' 上一页 ');

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

next_posts_link(' 下一页 ');

if($paged != $max_page){echo "<a href='" . get_pagenum_link($max_page) . "' class='extend'

title='跳转到最后一页'> 最后一页 </a>";}}

}
/*分页函数*/



/*添加主题选项*/
add_action('admin_menu', 'mytheme_page');
 
function mytheme_page (){
 
	if ( count($_POST) > 0 && isset($_POST['mytheme_settings']) ){
 
		$options = array (
		        'keywords',
				'description',
				'analytics',
				
				'logo',
				'logo2',
				'beian',
				
				'banner1',
				'banner2',
				'banner3',
				'banner4',
				'bannerlj1',
				'bannerlj2',
				'bannerlj3',
				'bannerlj4',
				
				'lianx1',
				'lianx2',
				'lianx3',
				'lianx4',
				'ditu',
				
				'tup1',
				'tup2',
				'tup3',
				);
 
		foreach ( $options as $opt ){
 
			delete_option ( 'mytheme_'.$opt, $_POST[$opt] );
 
			add_option ( 'mytheme_'.$opt, $_POST[$opt] );	
 
		}
 
	}
 
	add_theme_page(__('主题选项'), __('主题选项'), 'edit_themes', basename(__FILE__), 'mytheme_settings');
 
}
 
function mytheme_settings(){?>
 
<style>
 
.wrap,textarea,em{font-family:'Century Gothic','Microsoft YaHei',Verdana;}
em{
	float:left;
	width:45%;
	margin-left:15px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 22px;
	color: #666666;
	text-decoration: none;
}
.submit { padding:10px;}
.bbt {
	width:100%;
	height:30px;
	font-size: 12px;
	line-height: 30px;
	color: #0066CC;
	float:left;
	padding-left:10px;
	text-decoration: none;
}
 
fieldset{width:100%;border:1px solid #aaa;padding-bottom:10px;margin-top:10px;-webkit-box-shadow:rgba(0,0,0,.2) 0px 0px 5px;-moz-box-shadow:rgba(0,0,0,.2) 0px 0px 5px;box-shadow:rgba(0,0,0,.2) 0px 0px 5px;}
 
legend{margin-left:5px;padding:0 5px;color:#2481C6;background:#F9F9F9;cursor:pointer;}

textarea{width:45%;font-size:11px; float:left; padding:0; border:1px solid #aaa;background:none;-webkit-box-shadow:rgba(0,0,0,.2) 1px 1px 2px inset;-moz-box-shadow:rgba(0,0,0,.2) 1px 1px 2px inset;box-shadow:rgba(0,0,0,.2) 1px 1px 2px inset;-webkit-transition:all .4s ease-out;-moz-transition:all .4s ease-out;}
 
textarea:focus{-webkit-box-shadow:rgba(0,0,0,.2) 0px 0px 8px;-moz-box-shadow:rgba(0,0,0,.2) 0px 0px 8px;box-shadow:rgba(0,0,0,.2) 0px 0px 8px;outline:none;}
.wrap .box h1{height:35px;background:#ebebeb;font-size: 18px;line-height: 35px; padding-left:15px;
}
 
</style>


<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.3.1.js"></script> 
<script type="text/javascript">
// 收缩展开效果
$(document).ready(function(){

	$(".box h1").click(function(){
		$(this).next(".text").slideToggle("slow");
	})

	
});
</script>	 
<div class="wrap">

  <?php   
	$ct = wp_get_theme();
$screenshot = $ct->get_screenshot();
$class = $screenshot ? 'has-screenshot' : '';

$customize_title = sprintf( __( 'Customize &#8220;%s&#8221;' ), $ct->display('Name') );

 ?>
<h2>主题选项</h2>
<p>主题名称:：<?php echo $ct->display('Name'); ?><br/>
主题版本：<?php echo $ct->display('Version'); ?><br/>

<ul>
<form method="post" action="">
<li class="box"> <h1>SEO统计代码添加</h1>
<div class="text" style="display:none">

 
	<fieldset>
 
	<legend><strong>SEO 代码添加</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
            
                <div class="bbt">关键词:</div>
 
				<textarea name="keywords" id="keywords" rows="1" cols="70"><?php echo get_option('mytheme_keywords'); ?></textarea>
 
				<em>网站关键词（Meta Keywords），中间用半角逗号隔开。如：WordPress,禁止设计工作室,独立博客</em>
 
			</td></tr>
 
			<tr><td>
 
				<div class="bbt">网站描述:</div>
                <textarea name="description" id="description" rows="3" cols="70"><?php echo get_option('mytheme_description'); ?></textarea>
 
				<em>网站描述（Meta Description），针对搜索引擎设置的网页描述。<br />如： 这儿是某某设计公司官方网站</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
 
 
 
	<fieldset>
 
	<legend><strong>统计代码添加</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<div class="bbt">统计代码:</div>
                <textarea name="analytics" id="analytics" rows="5" cols="70"><?php echo stripslashes(get_option('mytheme_analytics')); ?></textarea>
                <em>输入一段统计代码，显示在网站最下方</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
 
 
 
	<p class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</p>
 
 
 

</div>
</li>


<li class="box"> <h1>公共选项设置</h1>
<div class="text" style="display:none">

    <fieldset>
 
	<legend><strong>logo图片</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
            
                <div class="bbt">头部logo:</div>
				<textarea name="logo" id="logo" rows="1" cols="70"><?php echo get_option('mytheme_logo'); ?></textarea>
 
				<em>输入网站头部logo图片地址。（图片宽不超过254px， 高不超过64px,） 如：http://localhost/wordpress/logo.jpg</em>
 
			</td></tr>
            <tr><td>
                <div class="bbt">底部logo:</div>
				<textarea name="logo2" id="logo2" rows="1" cols="70"><?php echo get_option('mytheme_logo2'); ?></textarea>
 
				<em>输入网站底部logo图片地址。（图片高不超过63px,） 如：http://localhost/wordpress/logo.jpg</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
 
	<p class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</p>
    
    <fieldset>
 
	<legend><strong>输入备案号</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<textarea name="beian" id="beian" rows="1" cols="70"><?php echo get_option('mytheme_beian'); ?></textarea>
 
				<em>输入备案号。如：京ICP备123456</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
 
	<p class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</p>
    
 
 
 

</div>
</li>


<li class="box"> <h1>banner图片切换</h1>
<div class="text" style="display:none">

    <fieldset>
 
	<legend><strong>banner图片01设置</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<div class="bbt">焦点图:</div>
                <textarea name="banner1" id="banner1" rows="1" cols="70"><?php echo get_option('mytheme_banner1'); ?></textarea>
 
				<em>输入图片地址。（图片大小宽972px， 高390px,） 如：http://localhost/wordpress/tupian.jpg</em>
 
			</td></tr>
            <tr><td>
 
				<div class="bbt">链接地址:</div>
                <textarea name="bannerlj1" id="bannerlj1" rows="1" cols="70"><?php echo get_option('mytheme_bannerlj1'); ?></textarea>
 
				<em>输入链接地址。如：http://www.xxxx.com/asd/</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
 
	<p class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</p>
    
    <fieldset>
 
	<legend><strong>banner图片02设置</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<div class="bbt">焦点图:</div>
                <textarea name="banner2" id="banner2" rows="1" cols="70"><?php echo get_option('mytheme_banner2'); ?></textarea>
 
				<em>输入图片地址。（图片大小宽972px， 高390px,） 如：http://localhost/wordpress/tupian.jpg</em>
 
			</td></tr>
            <tr><td>
 
				<div class="bbt">链接地址:</div>
                <textarea name="bannerlj2" id="bannerlj2" rows="1" cols="70"><?php echo get_option('mytheme_bannerlj2'); ?></textarea>
 
				<em>输入链接地址。如：http://www.xxxx.com/asd/</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
 
	<p class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</p>
    
    <fieldset>
 
	<legend><strong>banner图片03设置</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<div class="bbt">焦点图:</div>
                <textarea name="banner3" id="banner3" rows="1" cols="70"><?php echo get_option('mytheme_banner3'); ?></textarea>
 
				<em>输入图片地址。（图片大小宽972px， 高390px,） 如：http://localhost/wordpress/tupian.jpg</em>
 
			</td></tr>
            <tr><td>
 
				<div class="bbt">链接地址:</div>
                <textarea name="bannerlj3" id="bannerlj3" rows="1" cols="70"><?php echo get_option('mytheme_bannerlj3'); ?></textarea>
 
				<em>输入链接地址。如：http://www.xxxx.com/asd/</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
 
	<p class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</p>
    
    <fieldset>
 
	<legend><strong>banner图片4设置</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<div class="bbt">焦点图:</div>
                <textarea name="banner4" id="banner4" rows="1" cols="70"><?php echo get_option('mytheme_banner4'); ?></textarea>
 
				<em>输入图片地址。（图片大小宽972px， 高390px,） 如：http://localhost/wordpress/tupian.jpg</em>
 
			</td></tr>
            <tr><td>
 
				<div class="bbt">链接地址:</div>
                <textarea name="bannerlj4" id="bannerlj4" rows="1" cols="70"><?php echo get_option('mytheme_bannerlj4'); ?></textarea>
 
				<em>输入链接地址。如：http://www.xxxx.com/asd/</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
 
	<p class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</p>
    
 
 
 

</div>
</li>

<li class="box"> <h1>联系方式</h1>
<div class="text" style="display:none">


    <fieldset>
 
	<legend><strong>输入联系电话</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<div class="bbt">联系电话:</div>
                <textarea name="lianx1" id="lianx1" rows="1" cols="70"><?php echo get_option('mytheme_lianx1'); ?></textarea>
 
				<em>输入您的电话号码。如：0731-1234567</em>
 
			</td></tr>
            
            <tr><td>
 
				<div class="bbt">联系人:</div>
                <textarea name="lianx2" id="lianx2" rows="1" cols="70"><?php echo get_option('mytheme_lianx2'); ?></textarea>
 
				<em>输入联系人的姓名</em>
 
			</td></tr>
            <tr><td>
 
				<div class="bbt">联系地址:</div>
                <textarea name="lianx3" id="lianx3" rows="1" cols="70"><?php echo get_option('mytheme_lianx3'); ?></textarea>
 
				<em>输入联系地址</em>
 
			</td></tr>
            <tr><td>
 
				<div class="bbt">电子邮箱:</div>
                <textarea name="lianx4" id="lianx4" rows="1" cols="70"><?php echo get_option('mytheme_lianx4'); ?></textarea>
 
				<em>输入电子邮箱</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>

 
	<p class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</p>
    
    <fieldset>
 
	<legend><strong>输入地图搜索地址</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<textarea name="ditu" id="ditu" rows="2" cols="70"><?php echo get_option('mytheme_ditu'); ?></textarea>
 
				<em>输入您的地图搜索详细地址，我们采用百度地图搜索。你可以再百度地图测试一下再将地址输入进来。</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>

 
	<p class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</p>
    
 
 
 

</div>
</li>

<li class="box"> <h1>网站图片设置</h1>
<div class="text" style="display:none">

 
	<fieldset>
    
    <legend><strong>首页图片设置</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<div class="bbt">关于我们图片设置:</div>
                <textarea name="tup1" id="tup1" rows="1" cols="70"><?php echo get_option('mytheme_tup1'); ?></textarea>
 
				<em>输入关于我们小图片地址 （图片大小宽266px 高131px）</em>
 
			</td></tr>
            
            <tr><td>
 
				<div class="bbt">新闻动态图片设置:</div>
                <textarea name="tup2" id="tup2" rows="1" cols="70"><?php echo get_option('mytheme_tup2'); ?></textarea>
 
				<em>输入新闻动态小图片地址 （图片大小宽266px 高131px）</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
 
	<p class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</p>
    
    <fieldset>
 
	<legend><strong>内页图片设置</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<textarea name="tup3" id="tup3" rows="1" cols="70"><?php echo get_option('mytheme_tup3'); ?></textarea>
 
				<em>输入内页大图片地址 （图片大小宽972px 高241px）</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>

 
	<p class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</p>
    
 
 
 

</div>
</li>

</form>


</ul> 


</div>



<?php }

/*添加主题选项over*/
?>