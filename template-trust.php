<?php
/* Template Name: Trust */
 get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php // page top section with page title ?>

<?php include '_inc/parts/banner.php'; ?>

<div id="single-page" class="trust">



<section id="intro" class="textCenter">
	<div class="container">
		<div class="row intro">
			<div class="col-md-16 col-sm-24 col-md-offset-4">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</section>

<?php if (get_field('eb_tru_iframe')||get_field('eb_tru_iframe_ph')) : ?>
<section id="chart">
	<div class="container">
		<?php if (get_field('eb_tru_chart')) :?>
			<div class="row textCenter">
				<div class="col-md-16 col-sm-24 col-md-offset-4">
					<?php the_field('eb_tru_chart'); ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if (get_field('eb_tru_iframe')||get_field('eb_tru_iframe_ph')) :?>
			<div class="row">
				<div class="col-md-18 col-sm-24 col-md-offset-3">
					<div class="chart relative">
						<img src="<?php the_field('eb_tru_iframe_ph'); ?>"<?php if (get_field('eb_tru_iframe')) echo ' class="opacity0"'; ?> />
						<?php if (get_field('eb_tru_iframe')) : ?>
							<iframe src="<?php the_field('eb_tru_iframe'); ?>" border="0" width="100%" height="100%" class="absolute cover"></iframe>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>

<?php if (get_field('eb_tru_sup')) : ?>
<section id="hpR3">
	<?php if (get_field('eb_tru_iframe')||get_field('eb_tru_iframe_ph')) : ?>
		<div class="curve-down absolute hCenter"><img src="<?php bloginfo('template_directory'); ?>/images/curveDown.svg" /></div>
	<?php endif; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-18 col-sm-24 col-md-offset-3">
				<div class="row">
					<div class="col-md-16 col-sm-24">
						<?php the_field('eb_tru_sup'); ?>
					</div>
					<div class="col-md-8 col-sm-24 textRight">
						<?php
							$cta = get_field('eb_tru_sup_cta');
							if ($cta) echo '<a class="cta-btn" href="'.$cta['url'].'" target="'.$cta['target'].'"">'.$cta['title'].'</a>';
							reset($cta);
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if (get_field('eb_tru_res_content')) : ?>
<section id="news" class="textCenter relative">
	<div class="bg absolute cover desktop"><img src="<?php bloginfo('template_directory'); ?>/images/shape-inverse-gradient.svg" /></div>
	<div class="container relative">
		<div class="row intro">
			<div class="col-md-18 col-sm-24 col-md-offset-3">
				<?php the_field('eb_tru_res_content'); ?>
			</div>
		</div>
		<?php if (have_rows('eb_tru_res')) : ?>
			<div class="row row-eq-height">
				<?php while (have_rows('eb_tru_res')) : the_row(); ?>
					<div class="col-sm-8">
						<div class="icon row-eq-height"><img src="<?php the_sub_field('icon'); ?>" /></div>
						<h3><?php the_sub_field('label'); ?></h3>
						<?php
							$cta = get_sub_field('cta');
							echo '<a class="more" href="'.$cta['url'].'" target="'.$cta['target'].'"">'.$cta['title'].'</a>';
							reset($cta);
						?>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>




</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>


