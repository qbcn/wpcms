<?php 

class pic_r extends WP_Widget {

	function pic_r()
	{
		$widget_ops = array('classname'=>'pic_r','description' => get_bloginfo('template_url').'/images/xuanxiang/8.gif');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::WP_Widget($id_base="pic_r",$name='图片高亮的图文模块',$widget_ops,$control_ops);  

	}

	function form($instance) { 
	
	    	
		 $cat =esc_attr($instance['cat']);
		 $id =esc_attr($instance['id']);
		 $target = esc_attr($instance['target']);
		  $title = esc_attr($instance['title']);
		   $title2 = esc_attr($instance['title2']);
		 
		  $pic_rs = esc_attr($instance['pic_rs']); 
		   $pic_rs_pic = esc_attr($instance['pic_rs_pic']);
		    $pic_rs_link = esc_attr($instance['pic_rs_link']);
		 $nunber = esc_attr($instance['nunber']);
		 $location = esc_attr($instance['location']);
		 $jcar = esc_attr($instance['jcar']);
         $timess =esc_attr($instance['timess']);
			 $zhiding = esc_attr($instance['zhiding']);
		 $showmove =esc_attr($instance['showmove']);
	?>

<br />




<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_attr_e('标题:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>

<p><label for="<?php echo $this->get_field_id('title2'); ?>"><?php esc_attr_e('副标题:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title2'); ?>" name="<?php echo $this->get_field_name('title2'); ?>" type="text" value="<?php echo $title2; ?>" /></label></p>


<p><br />请选择调用的分类</p>
<label  for="<?php echo $this->get_field_id('cat'); ?>">请选择分类:</label><br />
             <select id="<?php echo $this->get_field_id('cat'); ?>" name="<?php echo $this->get_field_name('cat'); ?>" >
              <option value=''>请选择</option>
<?php 
		$categorys = get_categories(array('hide_empty' => 0));
		
		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if ( $cat == $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select>

<p>


<p><label for="<?php echo $this->get_field_id('nunber'); ?>"><?php esc_attr_e('显示数量(默认6):'); ?> <input class="widefat" id="<?php echo $this->get_field_id('nunber'); ?>" name="<?php echo $this->get_field_name('nunber'); ?>" type="text" value="<?php echo  $nunber; ?>" /></label></p>
 
 


<p>   
    <label  for="<?php echo $this->get_field_id('zhiding'); ?>">文章排序:</label><br />
             <select id="<?php echo $this->get_field_id('zhiding'); ?>" name="<?php echo $this->get_field_name('zhiding'); ?>" >
              <option value=''<?php if ($zhiding == "" ) {echo "selected='selected'";}?> >显示最新文章</option>
	          <option value='1'<?php if ($zhiding == "1" ) {echo "selected='selected'";}?>>只显示置顶的文章</option>
              <option value='2'<?php if ($zhiding == "2" ) {echo "selected='selected'";}?>>显示随机文章</option>
		
	</select>

</p>

<p>   

    <label  for="<?php echo $this->get_field_id('target'); ?>">链接方式:</label><br />
             <select id="<?php echo $this->get_field_id('target'); ?>" name="<?php echo $this->get_field_name('target'); ?>" >
              <option value=''<?php if ($target == "" ) {echo "selected='selected'";}?> >自身页面转换</option>
	          <option value='1'<?php if ($target == "1" ) {echo "selected='selected'";}?>>打开新窗口</option>
		
	</select>

</p>


<p>   

    <label  for="<?php echo $this->get_field_id('showmove'); ?>">移动版是否显示:</label><br />
             <select readonly="true" >
              <option value=''<?php if ($showmove== "" ) {echo "selected='selected'";}?> >只有付费版才能兼容移动设备</option>
	        
		
	</select><br />

<a target="_blank" href="http://www.themepark.com.cn/ffmhwordpressqyzt.html"> 查看付费版详情</a>
</p>


 <script language="javascript">(function(a){a(function(){a(".color-field_w").wpColorPicker();a(".customize-control-widget_form .widget-control-save").fadeIn()})})(jQuery);jQuery(document).ready(function(){var b;var a;jQuery(".upload_button_w").on("click",function(c){a=jQuery(this).prev("input");b=wp.media({title:"选择图片",button:{text:"选择"},multiple:false});if(b){b.open()}b.on("select",function(){attachment=b.state().get("selection").first().toJSON();jQuery(a).val(attachment.url);jQuery(".supports-drag-drop").remove()})})});</script>   
	<?php
    }
	function update($new_instance, $old_instance) { // 更新保存
		return $new_instance;
	}
	function widget($args, $instance) { // 输出显示在页面上
	extract( $args );
	     $id =$instance['id'];
        $before_content = $instance['before_content'];
        $after_content = $instance['after_content'];
		$title= apply_filters('widget_title', empty($instance['title']) ? __('') : $instance['title']);
		$title2= apply_filters('widget_title', empty($instance['title2']) ? __('') : $instance['title2']);
		$cat = apply_filters('widget_title', empty($instance['cat']) ? __('') : $instance['cat']);
		$id = apply_filters('widget_title', empty($instance['id']) ? __('1') : $instance['id']);
	    $pic_rs = apply_filters('widget_title', empty($instance['pic_rs']) ? __('') : $instance['pic_rs']);
		 $pic_rs_pic = apply_filters('widget_title', empty($instance['pic_rs']) ? __('') : $instance['pic_rs_pic']);
	    $zhiding  = apply_filters('widget_title', empty($instance['zhiding']) ? __('') : $instance['zhiding']);
		$jcar = apply_filters('widget_title', empty($instance['jcar']) ? __('2') : $instance['jcar']);
        $target  = apply_filters('widget_title', empty($instance['target']) ? __('2') : $instance['target']);
		$nunber =apply_filters('widget_title', empty($instance['nunber']) ? __('5') : $instance['nunber']);
		 $timess=apply_filters('widget_title', empty($instance['timess']) ? __('7') : $instance['timess']);
 $pic_rs_link=apply_filters('widget_title', empty($instance['pic_rs_link']) ? __('7') : $instance['pic_rs_link']);
		$showmove=apply_filters('widget_title', empty($instance['showmove']) ? __('') : $instance['showmove']);
		$word_t27=get_option('mytheme_word_t27');
	if( $target  =="1" ){ $tagerts = 'target="_blank"';}
if( $zhiding =="1" ){ $post__in = get_option('sticky_posts');}
if( $zhiding =="2" ){ $oder="rand";}else{ $oder="ASC";}
 $args = array( 'cat' =>$cat, 'showposts' => $nunber, 'post__in' =>$post__in,'orderby' => $oder);    
 	
 $query = new WP_Query( $args );  
 	
			
				if(!$query->have_posts()) { get_template_part( 'index/pic_r' ); }else{
	
		?>
 <div class="pic_r  box">
<div class="m_title"><?php if($title){?><a target="_blank" href="<?php echo get_category_link($cat) ?>"><b><?php echo $title ?></b><?php echo $title2 ?></a><?php } ?></div> 

 <div class="pic_r_in">
        

   <?php
    

 $ashu_i=0; while ( $query->have_posts() ) :$query->the_post(); $ashu_i++; 
 
   $id=get_the_ID(); 
  $tit= get_the_title($id);
  $title_images= get_post_meta($id,"title_images", true);
  $linkss=get_post_meta($id,"hoturl", true); 
    $price = get_post_meta($id, 'shop_price', true);
    $original_price=get_post_meta($id,"original_price", true);
 if($ashu_i==1){?>           


     <div class="pic_r_pic">
      <div  class="picl_over_li">
     <b class="title"> <a  <?php echo $tagerts ?> title="<?php the_title(); ?>" href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>">
     <?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,25,"...",'utf8'); ?></a></b>
        <?php if($price!=""){?>
      <b id="price_pic">￥<?php echo $price; ?></b>
      <?php  if ( function_exists( 'shop_comment_stars' ) ) {?> <div class="star"id="stars_<?php echo shop_comment_stars()?>"> </div>
      <?php }} ?>
       <p> <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,200,"...",'utf-8'); ?></p>
      <a <?php echo $tagerts ?> title="<?php the_title(); ?>" href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>" class="btn"><?php if($word_t27!=""){echo $word_t27;}else{echo '查看详细';}  ?></a>
      </div>
     <a class="pic_r_pic_a">  <?php  if (has_post_thumbnail()) { the_post_thumbnail('pic_r' ,array('alt'	=>$tit, 'title'=> $tit ));}
		   else{echo '<img src="'. get_bloginfo('template_url').'/images/demo/vedio.gif" />';} ?></a>
     
     </div>
    <ul>
     
     
   <?php }else{ ?>
   <li class="first_v">
      <div class="picl_over_li"> 
      <b class="title"> <a <?php echo $tagerts ?> title="<?php the_title(); ?>" href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>">
     <?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,25,"...",'utf8'); ?>
     </a></b>
      <?php if($price!=""){?>
      <b id="price_pic">￥<?php echo $price; ?></b>
      <?php  if ( function_exists( 'shop_comment_stars' ) ) {?> <div class="star"id="stars_<?php echo shop_comment_stars()?>"> </div>
      <?php }}else{ ?>
       <p> <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,60,"...",'utf-8'); ?></p>
      <?php } ?>
      <a  <?php echo $tagerts ?> title="<?php the_title(); ?>" href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>" class="btn"><?php if($word_t27!=""){echo $word_t27;}else{echo '查看详细';}  ?></a>
      </div>
      <a class="pic_r_pic_a">
     <?php 
	 
	
	  if (has_post_thumbnail()) { the_post_thumbnail('twox' ,array('alt'	=>$tit, 'title'=> $tit ));}
		   else{echo '<img src="'. get_bloginfo('template_url').'/images/demo/twox.gif" />';} ?>
      
      </a>
        
        
     </li>
   

  <?php }; endwhile; wp_reset_query();     ?>
     
    </ul>
  
  </div>
</div>

 
        <?php
	}}
}
register_widget('pic_r');
?>
  
