<?php get_header(); ?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="">
		</li>
		<li data-target="#myCarousel" data-slide-to="1" class="active">
		</li>
		<li data-target="#myCarousel" data-slide-to="2">
		</li>
	</ol>
	<div class="carousel-inner">
		<div class="item active">
			<img src="<?php echo get_option('mao10_homeimg_a_1'); ?>" alt="<?php echo get_option('mao10_homeimg_b_1'); ?>">
			<div class="container">
				<div class="carousel-caption">
					<h1>
						<?php echo get_option('mao10_homeimg_b_1'); ?>
					</h1>
					<p>
						<?php echo get_option('mao10_homeimg_c_1'); ?>
					</p>
					<p>
						<a class="btn btn-lg btn-primary" href="<?php echo get_option('mao10_homeimg_e_1'); ?>" role="button">
							<?php echo get_option('mao10_homeimg_d_1'); ?>
						</a>
					</p>
				</div>
			</div>
		</div>
		<div class="item">
			<img src="<?php echo get_option('mao10_homeimg_a_2'); ?>" alt="<?php echo get_option('mao10_homeimg_b_2'); ?>">
			<div class="container">
				<div class="carousel-caption">
					<h1>
						<?php echo get_option('mao10_homeimg_b_2'); ?>
					</h1>
					<p>
						<?php echo get_option('mao10_homeimg_c_2'); ?>
					</p>
					<p>
						<a class="btn btn-lg btn-primary" href="<?php echo get_option('mao10_homeimg_e_2'); ?>" role="button">
							<?php echo get_option('mao10_homeimg_d_2'); ?>
						</a>
					</p>
				</div>
			</div>
		</div>
		<div class="item">
			<img src="<?php echo get_option('mao10_homeimg_a_3'); ?>" alt="<?php echo get_option('mao10_homeimg_b_3'); ?>">
			<div class="container">
				<div class="carousel-caption">
					<h1>
						<?php echo get_option('mao10_homeimg_b_3'); ?>
					</h1>
					<p>
						<?php echo get_option('mao10_homeimg_c_3'); ?>
					</p>
					<p>
						<a class="btn btn-lg btn-primary" href="<?php echo get_option('mao10_homeimg_e_3'); ?>" role="button">
							<?php echo get_option('mao10_homeimg_d_3'); ?>
						</a>
					</p>
				</div>
			</div>
		</div>
	</div>
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left">
		</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right">
		</span>
	</a>
</div>
<div class="container">
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