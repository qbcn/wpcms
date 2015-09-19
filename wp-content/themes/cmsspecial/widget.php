<?php
if (function_exists('register_sidebar')) {
  
		register_sidebar(array(
    		'name' => '首页排版70%宽度',
    		'id'   => 'sidebar-widgets2',
    		'description'   => '首页排版70%宽度',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    
	
		register_sidebar(array(
    		'name' => '首页排版27%宽度',
    		'id'   => 'sidebar-widgets3',
    		'description'   => '首页排版27%宽度',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
		
	
		register_sidebar(array(
    		'name' => '默认侧边栏',
    		'id'   => 'sidebar-widgets4',
    		'description'   => '首页排版27%宽度',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
		
		
	
		
		
	
		
		
    }
function unregister_default_wp_widgets() {
	unregister_widget('WP_Widget_Pages');
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Links');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Tag_Cloud');
	unregister_widget('WP_Widget_Text'); 
	unregister_widget('WP_Nav_Menu_Widget'); 
	
}

 

include_once("widget/fourq.php");
include_once("widget/pic_r.php");
include_once("widget/pic_l.php");
include_once("widget/pic_text.php");
include_once("widget/nav.php");
include_once("widget/html.php");
add_action('widgets_init', 'unregister_default_wp_widgets', 1);

function mytheme_move_opion($wp_customize){
	
	  $wp_customize->add_section('mytheme_detects_scheme', array(
        'title'    => __('移动版宽度调整', 'mytheme'),
        'description' => ' 移动版宽度调整，你可以选择平板电脑、手机的宽度，查看网站在移动设备上的表现</br><strong>注意，这里的预览可能和正真的表现有所不同，由于预览的脚本有冲突，所以导航目前无法开启，你可以在设置完成之后用你的移动设备查看</strong></br>  <a href="http://www.themepark.com.cn" target="_blank">WEB主题公园开发提供</a>  </br>',
        'priority' => 79,
    ));
	
	 
	   $wp_customize->add_setting('mytheme_detects', array(
        'default'        => 'value1',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_detects', array(
        'label'      => __('设备宽度选择，选择你所需要的宽度进行查看', 'mytheme_detects'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_detects',
		'type'    => 'select',
		 'choices'    => array(
            'value1' => '平板电脑（768）',
            'value2' => 'ipone4(640)',
            'value3' => '其他手机（480)',
        ),
    )); 
};
add_action('customize_register', 'mytheme_move_opion');		
class check_walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
	 
	  if($item->object == 'post_tag'){
		  $tags = get_term_by( 'id', $item->object_id, 'post_tag');
		   	$attributes .= ' id="' . $tags->slug.'"';
		 	$attributes .= ' rel="' . $tags->slug.'"';
	 
		  }else{
			   	$attributes .= ' id="' . $item->object_id.'"';
		$attributes .= ' rel="' . esc_attr( $item->object_id).'"';
		  }

		$item_output = $args->before;
		$item_output .= '<a'. $attributes . ' title="'.  apply_filters( 'the_title', $item->title, $item->ID ) .'">';
		 $item_output .=   apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= $args->link_before . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'check_walker_start_el', $item_output, $item, $depth, $args );
	}
};



 function wptuts_add_color_picker( $hook ) {
        if( is_admin() ) { 
            wp_enqueue_style( 'wp-color-picker' ); 
            wp_enqueue_script( 'custom-script-handle', get_template_directory_uri().'/js/custom-script.js', array( 'wp-color-picker' ), false, true ); 

        }

    }
add_action( 'admin_enqueue_scripts', 'wptuts_add_color_picker' );
add_action( 'category_edit_form_fields', 'wptuts_add_color_picker' );
add_action('edited_category','wptuts_add_color_picker');  	
?>