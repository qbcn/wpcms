<div id="footer">
	<div class="container">
		Copyright 2011-2014 www.qibaowu.com all right reserved.
	</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/headroom.min.js"></script>
<script>
(function() {
    var header = new Headroom(document.querySelector("#top-nav"), {
        tolerance: 5,
        offset : 205,
        classes: {
          initial: "animated",
          pinned: "slideDown",
          unpinned: "slideUp"
        }
    });
    header.init();
}());
</script>
<script src="<?php bloginfo('template_directory'); ?>/js/cat.js"></script>
<?php if (is_home() || is_archive()) { ?>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.infinitescroll.min.js"></script>
<script type="text/javascript">
					function infinite_scroll_callback() {
					}
					jQuery(document).ready(function($) {
					$('.timeline').infinitescroll({
						debug           : false,
						loading			: {
							img			: "<?php bloginfo('template_directory'); ?>/img/loading.gif",
							msgText		: "时光机启动，正在带你回到过去...",
							finishedMsg	: "你已经走到了时间的尽头！"
							},
						state			: {
							currPage	: "1"
							},
						nextSelector    : "#navigation a",
						navSelector     : "#navigation",
						contentSelector : ".timeline",
						itemSelector    : ".timeline li",
						pathParse		: ["<?php echo home_url(add_query_arg(array(),$wp->request)); ?>/page/", ""]
						}, function() { window.setTimeout(infinite_scroll_callback(), 1); } );
					});	
					</script>
<?php } ?>
</body>
</html>