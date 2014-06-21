<div id="footer">
    <div class="footer1 f_bq">
         Copyright &copy; 20<?php the_time('y') ?> All Rights Reserved 版权所有 &copy; <?php bloginfo('name'); ?> 
		       <?php if (get_option('mytheme_beian')!=""): ?>
                  <?php echo get_option('mytheme_beian'); ?>　
               <?php else : ?>
                  京ICP备（123456）　
               <?php endif; ?>
               <?php if (get_option('mytheme_lianx1')!=""): ?>
                  联系电话：<?php echo get_option('mytheme_lianx1'); ?>　
               <?php else : ?>
                  联系电话：0731-1234567
               <?php endif; ?>
               <?php if (get_option('mytheme_lianx2')!=""): ?>
                  联系人：<?php echo get_option('mytheme_lianx2'); ?>
               <?php else : ?>
                  联系人：XXX
               <?php endif; ?>
    </div>
    <div style=" text-align:center;"><?php echo get_option('mytheme_analytics'); ?></div>
</div>

	<?php wp_footer(); ?>
	
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F5f1e557f97e9d38d20112277b44a619b' type='text/javascript'%3E%3C/script%3E"));
</script>
</body>

</html>
