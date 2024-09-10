<?php get_header(); ?>
<?php // Static Front Page template
wp_reset_query(); ?>

<div id="archive-tag">
	<div class="container">
		<div class="row tag">
			<div class="col-md-18 col-md-offset-3 col-sm-24">
				<h1><?php bloginfo('name'); ?>| <em class="colorBars">Illustrations</em></h1>
			</div>
		</div>
	</div>
</div>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php wp_reset_query();

	$args = array(
		'cat' => 'art',
		'posts_per_page' => -1
	);

	$art = new WP_Query( $args );

	if ($art->have_posts()) : ?>

		<section id="gallery">
			<div class="row">
				<?php while ($art->have_posts()) : $art->the_post();  ?>

					<div class="col-lg-4 col-md-6 col-sm-8 col-xs-8 col">
						<?php if (has_tag('nsfw')) echo '<div class="nsfw absolute animate">NSFW!</div>'; ?>
						<?php if (has_tag('gore')) echo '<div class="gore absolute animate">GORE!</div>'; ?>
						<div class="thumb relative">
							<a class="title colorbox gallery" href="#<?php echo $post->post_name; ?>">
								<div class="noise absolute cover animate"></div>
								<div class="overlay absolute cover animate"></div>
								<h2 class="absolute cover animate" style="background-image:url('<?php the_post_thumbnail_url(); ?>')"><?php the_title(); ?></h2>
							</a>
						</div>
						<div id="<?php echo $post->post_name; ?>" class="cbContent<?php if (has_tag('nsfw')||has_tag('gore')) echo ' censored' ?>">
							<div class="row">
								<div class="col-md-16 art">
									<div class="wrap relative">
										<?php if (has_tag('nsfw')) : ?>
											<div class="warning absolute cover">
												<div class="absolute centerCenter textCenter">
													<p>This image contains <strong>mild nudity</strong> or <strong>implied sexual themes</strong>. Proceed at your own discretion.</p>
													<button>Continue?</button>
												</div>
											</div>
											<div class="absolute cover nsfw"></div>
										<?php endif; ?>
										<?php if (has_tag('gore')) : ?>
											<div class="warning absolute cover">
												<div class="absolute centerCenter textCenter">
													<p>This image contains <strong>gore</strong>. Proceed at your own discretion.</p>
													<button>Continue?</button>
												</div>
											</div>
											<div class="absolute cover gore"></div>
										<?php endif; ?>
										<?php the_post_thumbnail(); ?>
									</div>
								</div>
								<div class="col-md-8 cap">
									<?php get_template_part('_inc/parts/art-details'); ?>
								</div>
							</div>
						</div>
					</div>

				<?php endwhile; ?>
			</div>
		</section>

<?php endif; wp_reset_query(); ?>



<?php endwhile; endif; ?>

<?php get_footer(); ?>