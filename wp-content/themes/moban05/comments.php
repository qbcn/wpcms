<?php if ( comments_open() ) : ?>

<div id="respond">

	<h2><?php comment_form_title( '在线留言', 'Leave a Reply to %s' ); ?></h2>

	<div class="cancel-comment-reply">
		<?php cancel_comment_reply_link(); ?>
	</div>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

		<?php if ( is_user_logged_in() ) : ?>

			<p>管理员： <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">退出 &raquo;</a></p>

		<?php else : ?>

			<div class="liuy3">
                <div class="liuy2">名　称:</div>
				<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="28" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
				<label for="author">输入名称 <?php if ($req) echo "(必填)"; ?></label>
			</div>

			<div class="liuy3">
                <div class="liuy2">邮　箱:</div>
				<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="28" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
				<label for="email">输入邮箱 <?php if ($req) echo "(必填)"; ?></label>
			</div>

		<?php endif; ?>

		<!--<p>You can use these tags: <code><?php echo allowed_tags(); ?></code></p>-->

		<div class="liuy3">
                <div class="liuy2">留　言:</div>
			<textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea>
		</div>

		<div class="liuy3">
			<input name="submit" type="submit" id="submit" tabindex="5" value="提　交" />
			<?php comment_id_fields(); ?>
		</div>
		
		<?php do_action('comment_form', $post->ID); ?>

	</form>

	<?php endif; // If registration required and not logged in ?>
	
</div>

<?php endif; ?>
