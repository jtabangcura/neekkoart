<?php get_header(); ?>

<div id="subpage" class="default">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-24 content colorLinks">
			<h1 class="colorBars"><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
	</div>
</div>

<?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>