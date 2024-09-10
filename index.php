<?php get_header(); ?>
	
	<?php $bp = get_option('page_for_posts'); ?>

<div id="single-page">
	<div class="container">
		
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="row">
			<div class="col-xs-24">
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</div>
			<div class="col-xs-24">
				<?php the_excerpt(); ?>
			</div>
		</div>
	<?php endwhile; endif; ?>
		<div class="row">
			<div class="col-xs-12 nav-previous text-left"><?php next_posts_link( 'Older posts' ); ?></div>
			<div class="col-xs-12 nav-next text-right"><?php previous_posts_link( 'Newer posts' ); ?></div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
