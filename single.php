<?php get_header(); ?>

<div id="subpage" class="single">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section id="gallery">
	<div id="<?php echo $post->post_name; ?>" class="cbContent show<?php if (has_tag('nsfw')||has_tag('gore')) echo ' censored' ?>">
		<div class="row row-eq-height">
			<div class="col-md-16 art relative">
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
			<div class="col-md-8 cap">
				<?php get_template_part('_inc/parts/art-details'); ?>
			</div>
		</div>
	</div>
</section>

<?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>