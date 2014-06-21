<ul id="slideshow" class="slides">
	<?php if ( get_option('wpyou_slideshow') ) {
		$slideshow = get_option('wpyou_slideshow');
		$slideshow = str_replace(" "," ",$slideshow);
		$slideshow = stripslashes($slideshow); 
		echo $slideshow;
	} else { ?>
        <li><a href="#"><img src="<?php bloginfo('template_directory');?>/images/no-slider.jpg" /></a></li>
        <li><a href="#"><img src="<?php bloginfo('template_directory');?>/images/banner01.jpg" /></a></li>
        <li><a href="#"><img src="<?php bloginfo('template_directory');?>/images/banner02.jpg" /></a></li>
	<?php } ?>
</ul>