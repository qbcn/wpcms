<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="container" id="single">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1 class="title2"><?php the_title(); ?></h1>
			<div id="content">
				<?php the_content(); ?>
				<ul class="list-inline">
					<li><i class="glyphicon glyphicon-eye-open"></i>浏览：<?php echo getPostViews(get_the_ID()); ?></li>
					<li><i class="glyphicon glyphicon-comment"></i>评论：<?php comments_number('0', '1', '%' );?></li>
				</ul>
			</div>
			<div class="panel panel-default" id="comment-title">
				<div class="panel-heading">
					<h4 class="panel-title">发表新的回复</h4>
				</div>
				<div class="panel-body">
					<div id="comment">
						<?php comments_template(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>