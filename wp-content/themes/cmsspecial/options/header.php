<?php
function mytheme_header_options($wp_customize){
		$wp_customize->add_section('mytheme_header_options', array(
        'title'    => __('网站顶部设置', 'mytheme'),
        'description' => '通过这个选项设置顶部的样式和内容</br>  <a href="http://www.themepark.com.cn" target="_blank">WEB主题公园开发提供</a>',
        'priority' => 60,
    ));

	class Ari_Customize_Textarea_Control extends WP_Customize_Control {
  public $type = 'textarea';
  public function render_content() {

 ?>
  <label>
    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
    <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value()); ?></textarea>
  </label>
  <p></p>
<?php 
  }
}


	class Ari_Customize_fengexian_Control extends WP_Customize_Control {
  public $type = 'fengexian';
  public function render_content() {

 ?>
 <div style="width:100%; background:#333; margin:15px 0; height:1px;"></div>
  
<?php 
  }
}


  $wp_customize->add_setting('mytheme_logo', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_logo', array(
        'label'    => __('logo上传[尺寸高度：73px，宽度不要超过200px]', 'mytheme_logo'),
        'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_logo',
     )
    )); 

 $wp_customize->add_setting('mytheme_tell', array(
        'default'        => ' ',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_tell', array(
        'label'      => __('电话号码', 'mytheme_tell'),
        'section'    => 'mytheme_header_options',
        'settings'   => 'mytheme_tell',
    ));
	
	  // mail
    $wp_customize->add_setting('mytheme_mail', array(
        'default'        => ' ',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_mail', array(
        'label'      => __('电子邮箱', 'mytheme_mail'),
        'section'    => 'mytheme_header_options',
        'settings'   => 'mytheme_mail',
    ));
	
	
	  $wp_customize->add_setting('mytheme_search_title', array(
        'default'        => ' ',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_search_title', array(
        'label'      => __('热门搜索的标题', 'mytheme_search_title'),
        'section'    => 'mytheme_header_options',
        'settings'   => 'mytheme_search_title',
    ));
	
	
	   $wp_customize->add_setting('mytheme_searchkey', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control(new Ari_Customize_Textarea_Control($wp_customize, 'mytheme_searchkey', array(
         'label'      => __('热门搜索词关键词填写，填写多个以英文输入法的逗号分隔', 'mytheme_searchkey'),
         'section'    => 'mytheme_header_options',
         'settings'   => 'mytheme_searchkey',
  
      )));
	
	
	 $wp_customize->add_setting('mytheme_nav_pic', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_nav_pic', array(
        'label'    => __('导航的背景图片，若设置了背景图片，颜色将会被覆盖掉', 'mytheme_nav_pic'),
        'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_nav_pic',
     )
    )); 
	
	
	
	
	$wp_customize->add_setting('mytheme_ads_title', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_ads_title', array(
        'label'      => __('下拉菜单的广告标题', 'mytheme_ads_title'),
        'section'    => 'mytheme_header_options',
        'settings'   => 'mytheme_ads_title',
		 'description' => '选项不填写则整个模块不会显示（下拉菜单的左侧是一个菜单，从外观--菜单中建立好一个菜单再选择）',
    ));

	
	
	$wp_customize->add_setting('mytheme_ads_link', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_ads_link', array(
        'label'      => __('下拉菜单的广告链接，填写完成的url', 'mytheme_ads_link'),
        'section'    => 'mytheme_header_options',
        'settings'   => 'mytheme_ads_link',
		
    ));

	
	
	 $wp_customize->add_setting('mytheme_ads_pic', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_ads_pic', array(
        'label'    => __('下拉菜单的广告图片', 'mytheme_ads_pic'),
        'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_ads_pic',
     )
    )); 
	
	  $wp_customize->add_setting('mytheme_ads_text', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control(new Ari_Customize_Textarea_Control($wp_customize, 'mytheme_ads_text', array(
         'label'      => __('下拉菜单广告图片下的文字', 'mytheme_ads_text'),
         'section'    => 'mytheme_header_options',
         'settings'   => 'mytheme_ads_text',
  
      )));
	
	

	 $wp_customize->add_setting('mytheme_nav_color', array(
	    'default'        => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_nav_color', array(
        'label'    => __('导航背景颜色', 'extraordinaryvision'),
        'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_nav_color',
    )));	

	
	
	
 $wp_customize->add_setting('mytheme_top_color', array(
	    'default'        => '#404040',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_top_color', array(
        'label'    => __('最顶部背景颜色', 'extraordinaryvision'),
        'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_top_color',
    )));	
	

	
	 $wp_customize->add_setting('mytheme_text_top_color', array(
	    'default'        => '#666666',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_text_top_color', array(
        'label'    => __('顶部所有的深灰色文字', 'extraordinaryvision'),
        'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_text_top_color',
    )));	
	
	
	 $wp_customize->add_setting('mytheme_text_black_color', array(
	    'default'        => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
	
	
 
     $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_text_black_color', array(
        'label'    => __('顶部所有的黑色文字', 'extraordinaryvision'),
        'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_text_black_color',
    )));	
	
	
		 $wp_customize->add_setting('mytheme_text_white_color', array(
	    'default'        => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
	
	
 
     $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_text_white_color', array(
        'label'    => __('顶部所有的白色文字', 'extraordinaryvision'),
        'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_text_white_color',
    )));	
	
	
		 $wp_customize->add_setting('mytheme_top_blue_color', array(
	    'default'        => '#11a3c2',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
	
	
 
     $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_top_blue_color', array(
        'label'    => __('顶部所有蓝色底色（包括导航选中和搜索按钮底色）', 'extraordinaryvision'),
        'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_top_blue_color',
    )));	
	
	 $wp_customize->add_setting('mytheme_header_color', array(
	    'default'        => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
	
	 $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_header_color', array(
        'label'    => __('整个顶部背景颜色（默认白色）', 'extraordinaryvision'),
        'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_header_color',
    )));	
	

	
	
	
	
   
};
add_action('customize_register', 'mytheme_header_options');
?>