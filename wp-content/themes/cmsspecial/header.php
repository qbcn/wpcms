<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta id="viewport" name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <?php 
ob_start();
?>
    <?php if (get_option('mytheme_eso_jr') == ""){ ?>
   
<meta name="keywords" content=" <?php if(is_front_page() || is_home()) { 
	echo get_option('mytheme_keywords');} else if( is_page()) {
        if(get_post_meta($post->ID, "关键字",true)){
		echo get_post_meta($post->ID, "关键字",true);}
		else{
		echo get_post_meta($post->ID, "关键字",true);
		}
	} else if(is_single()) {
  if(get_post_meta($post->ID, "关键字",true)){
		 if(get_post_meta($post->ID, "关键字",true)){
		echo get_post_meta($post->ID, "关键字",true);}
		else{
			echo get_option('mytheme_keywords');
		}
		}
	// 如果是类目页面, 显示类目表述
	}  else {
		echo get_option('mytheme_keywords');
	}?>   " />
<meta name="description" content="<?php if(is_front_page() || is_home()) { 
	echo get_option('mytheme_description');
 
	// 如果是文章详细页面和独立页面
	}
 else if(is_page() ) {
		if(get_post_meta($post->ID, "描述",true)){
		echo get_post_meta($post->ID, "描述",true);}
		else{
			echo  substr(strip_tags($post->post_content), 0, 420);
		}
	// 如果是类目页面, 显示类目表述
	} 
	 else if(is_single() ) {
		 if(get_post_meta($post->ID, "描述",true)){
		echo get_post_meta($post->ID, "描述",true);}
		else{
			echo  substr(strip_tags($post->post_content), 0, 420);
		}
	
	// 如果是类目页面, 显示类目表述
	}  else {
		echo   get_option('mytheme_description');
	}
?>" />

	<?php if (is_search()) { ?>
<meta name="robots" content="noindex, nofollow" /> 
	<?php } };?>

<title><?php
		   if(get_option('mytheme_word_t12')==""){$word_t12='找到标签';}else{ $word_t12=get_option('mytheme_word_t12');};
		   if(get_option('mytheme_word_t9')!=""){$word_t9=get_option('mytheme_word_t9');}else{$word_t9='搜索结果：';}  
		     if(get_option('mytheme_word_t10')!=""){$word_t10=get_option('mytheme_word_t10');}else{$word_t9='很遗憾，没有找到你要的信息：';}  
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title($word_t12."&quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo '  - '; }
		      elseif (is_search()) {
		         echo $word_t9.' &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo $word_t10.'- '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged;echo ' - '; bloginfo('description'); }
		   ?></title>
<?php  $logo= get_option('mytheme_logo') ; $ico= get_option('mytheme_ico');?>
<link rel="shortcut icon" href="<?php echo $ico; ?>" type="image/x-icon" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>

<?php 
ob_start();
?>

<body <?php body_class(); ?>>
    <div class="header">
         <div class="top" id="top"> 
           <div class="top_in"> 
              <div class="gonggao">
                  <b id="top_hui"><?php  if(get_option('mytheme_tell')){echo get_option('mytheme_tell');} ?></b>
                  <b id="top_hui"><?php if(get_option('mytheme_mail')){echo get_option('mytheme_mail');} ?></b>
               </div>
               
               <div class="right_top">
                    <?php
				  $language1=get_option('mytheme_language1');
			$language2=get_option('mytheme_language2');
			$language_link1=get_option('mytheme_language_link1');
			$language_link2=get_option('mytheme_language_link2');	
			 $language3=get_option('mytheme_language3');
			$language4=get_option('mytheme_language4');
			$language_link3=get_option('mytheme_language_link3');
			$language_link4=get_option('mytheme_language_link4');		
					
					 $theme_shop_open = get_option('mytheme_theme_shop_open'); 
		 	$shop_login = get_option('shop_login');
		    $shop_register = get_option('shop_register');
	      	$shop_profile = get_option('shop_profile');
			$shop_edit_profile = get_option('shop_edit_profile'); 
			$shop_bbs_open=get_option('shop_bbs_open');
			$bbs_my_page=get_option('bbs_my_page');
			$bbs_post_avatar=get_option('bbs_post_avatar');
		 if($theme_shop_open){
		   if (is_user_logged_in()) {
		    global $current_user;    get_currentuserinfo();
			  $user_ID = $current_user->id ;
		   if( get_usermeta($user_ID ,'qq_user_avatar')){ $avatar_bbs_avatar ='<img width="50"  height="50"src="'. get_usermeta($user_ID ,'qq_user_avatar').'" alt="'.$author_name.'"/>';}else{$avatar_bbs_avatar ='<img width="20"  height="20" src="'.$bbs_post_avatar.'" alt="'.$author_name.'"/>';}
		      ?>
           <div class="login">  
	      <a href="<?php echo get_page_link( $shop_profile );  ?>" class="per_over">
          <?php echo $avatar_bbs_avatar; ?>
         
         </a>
        <a> hello！  <?php echo $current_user->display_name; ?></a>  <a href="<?php echo get_page_link( $shop_profile );  ?>">我的个人中心</a><?php wp_loginout(get_bloginfo('url'));?>
         </div> 
         <?php }else{ ?>
          <div class="login">
          <a id="login" href="<?php echo get_page_link( $shop_login );  ?>">登录</a>
			 <a id="register" href="<?php echo get_page_link($shop_register );  ?>">注册</a>
          
            </div>
         <?php }}else{
			 ?>
             <?php if($language_link1){ ?>
             <a class="language" target="_blank" href="<?php echo $language_link1 ;?>">
             <img src="<?php if($language1){ echo $language1;}else{echo get_bloginfo('template_url').'/images/china.gif';}  ?>" alt="language" />
             </a>
             <?php  }  if($language_link2){ ?>
              <a  class="language" target="_blank" href="<?php echo $language_link2 ;?>">
             <img src="<?php if($language2){ echo $language2;}else{echo get_bloginfo('template_url').'/images/usa.gif';}  ?>" alt="language" />
             </a>
              <?php  }  if($language_link3){ ?>
              <a  class="language" target="_blank" href="<?php echo $language_link3 ;?>">
             <img src="<?php if($language3){ echo $language3;}else{echo get_bloginfo('template_url').'/images/usa.gif';}  ?>" alt="language" />
             </a>
             <?php  }  if($language_link4){ ?>
              <a  class="language" target="_blank" href="<?php echo $language_link4 ;?>">
             <img src="<?php if($language4){ echo $language4;}else{echo get_bloginfo('template_url').'/images/usa.gif';}  ?>" alt="language" />
             </a>
			<?php  
			 }}
		 ?>
               
               </div>
               
               
           </div>
         </div>
    
        <div class="header_in">
        
         <a href="<?php bloginfo('url'); ?>" title="<?php echo  bloginfo('name'); ?>" class="logo">
         <img src="<?php  if(get_option('mytheme_logo')){echo get_option('mytheme_logo');}else{echo get_bloginfo('template_url').'/images/logo.png';}; ?>" alt="<?php echo  bloginfo('name'); ?>" />
         </a>
     
      <div class="search" id="whites">   
       <p><b id="top_black"><?php if(get_option('mytheme_search_title')){echo get_option('mytheme_search_title');}else{echo "热门搜索：";} ?></b>
      <?php 
	  
	        $searchkey= split(",",get_option('mytheme_searchkey')); 
			 for($i=0;$i<count($searchkey);$i++) {
				 echo'<a href="'.get_bloginfo('url').'/?s='.$searchkey[$i].'">'.$searchkey[$i].'</a>';
				 
				 }  
	  ?>
       
       </p>  
   <form action="<?php bloginfo('siteurl'); ?>" id="searchform" method="get"> 
   <input type="text" id="s" name="s" value="" /> 
     <?php $select = wp_dropdown_categories('class=search_select&show_option_all=ALL&orderby=name&hierarchical=1&selected=-1&depth=1');?>
   <input type="submit" value="搜索" id="searchsubmit" />
   </form>
  
   </div>
        
      
        </div>
         <?php $nav_pic=get_option('mytheme_nav_pic');$nav_color=get_option('mytheme_nav_color') ?>
      <div class="header_menu" id="header_menu"<?php if($nav_pic){ echo 'style="background:url('.$nav_pic.');"';} ?> >  
	     <div class="nav_in">
         <a class="cat_nav" id="whites">精彩直达</a>
         <div class="drop_nav" id="top_hui">
         
             <?php 
			$ads_title= get_option('mytheme_ads_title');
			 $ads_pic= get_option('mytheme_ads_pic');
			 $ads_text= get_option('mytheme_ads_text');
			  $ads_link= get_option('mytheme_ads_link');
			  ob_start(); wp_nav_menu(array( 'theme_location' => 'drogz-menu','menu_class'=> 'drop_nav_n','container' => false  ) );
			 if( $ads_title){
			   ?>
             
              <div class="ad">
               <b id="top_black"><?php echo $ads_title ;?></b>
               <a target="_blank" href="<?php echo $ads_link; ?>"> <img src="<?php echo $ads_pic ;?>" alt="<?php echo $ads_title ?>" /></a>
               <p id="top_hui"><?php echo $ads_text ;?></p>
              </div>
         <?php } ?>
         </div>
		 <?php  ob_start(); wp_nav_menu(array( 'container' => false,'theme_location' => 'header-menu','items_wrap' => '<ul id="header_menu" class="header_menu_ul">%3$s</ul>' ) ); ?>
         </div>
      </div>
      
     </div>
    
   
