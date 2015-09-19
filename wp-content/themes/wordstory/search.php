<?php get_header(); ?>
<div class="container">
	<h1 id="arc-title"><?php echo $s; ?></h1>
	<ul class="timeline">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php $num++; ?>
		<li <?php if($num%2==0) echo 'class="timeline-inverted"'; ?>>
			<div class="timeline-badge <?php if(get_post_format()=='link') echo 'primary'; elseif(get_post_format()=='image') echo 'success'; elseif(get_post_format()=='quote') echo 'warning'; elseif(get_post_format()=='video') echo 'danger'; elseif(get_post_format()=='audio') echo 'info'; ?>">
				<?php if(get_post_format()=='link') echo '<i class="glyphicon glyphicon-link"></i>'; elseif(get_post_format()=='image') echo '<i class="glyphicon glyphicon-picture"></i>'; elseif(get_post_format()=='quote') echo '<i class="glyphicon glyphicon-pushpin"></i>'; elseif(get_post_format()=='video') echo '<i class="glyphicon glyphicon-play"></i>'; elseif(get_post_format()=='audio') echo '<i class="glyphicon glyphicon-music"></i>'; else echo '<i class="glyphicon glyphicon-edit"></i>'; ?>
			</div>
			<div class="timeline-panel">
				<div class="timeline-heading">
					<h4 class="timeline-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h4>
					<p>
						<small class="text-muted">
							<i class="glyphicon glyphicon-time"></i>
							<?php the_time('Y-m-d H:i:s'); ?>
						</small>
					</p>
				</div>
				<div class="timeline-body">
					<?php the_content(); ?>
				</div>
			</div>
		</li>
		<?php endwhile; endif; ?>
	</ul>
	<div id="navigation">
		<?php next_posts_link() ?>
	</div>
</div>
<?php get_footer(); ?>