<?php get_header(); ?>
<section id="content" role="main">
<div class="author_header">
	<?php the_post(); ?>
	<h1 class="entry-title author"><?php _e( 'Author Archives', 'blankslate' ); ?>: <?php the_author_link(); ?></h1>
	<?php if ( '' != get_the_author_meta( 'user_description' ) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . get_the_author_meta( 'user_description' ) . '</div>' ); ?>
	<?php rewind_posts(); ?>
</div>

<?php while ( have_posts() ) : the_post(); ?>

	<?php the_title(); ?>
	<?php the_content(); ?>

<?php endwhile; ?>

</section>

<?php get_footer(); ?>