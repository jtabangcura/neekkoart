<?php get_header(); wp_reset_query(); ?>

<div id="single-page">

	<div id="archive-tag">
		<div class="container">
			<div class="row tag">
				<div class="col-md-18 col-md-offset-3 col-sm-24">
					<h1>artwork
						<?php 
							if (is_tag())
								echo 'tagged <em class="colorBars">'.single_tag_title('',false);
							else
								echo 'from <em class="colorBars">'.get_the_archive_title();
						?>
					</em></h1>
				</div>
			</div>
		</div>
	</div>

	<section id="gallery">
		<div class="row">
			<?php if (have_posts()) : while (have_posts()) : the_post();  ?>

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
								<div class="caption">
									<h3><?php the_title(); ?><a href="<?php the_permalink(); ?>" title="Open in new tab" target="_blank"><i class="fas fa-link"></i></a></h3>
									<h4><?php the_time('Y'); ?></h4>
									<?php the_field('na_art_credits'); ?>
									<?php $d = get_field('na_art_details');
									if ($d) : ?>

										<div class="details">

											<h5>Details</h5>
											<ul>
												<?php if ($d['type']) echo '<li class="type">'.$d['type'].'</li>'; ?>
												<?php if ($d['method']) echo '<li class="method">'.implode(', ',$d['method']).'</li>'; ?>
												<?php if ($d['progmat']) echo '<li class="progmat">'.implode(', ',$d['progmat']).'</li>'; ?>
												<?php if ($d['hardware']) echo '<li class="hardware">'.implode(', ',$d['hardware']).'</li>'; ?>
											</ul>

											<h5>Tags</h5>
											<div class="tags">
												<?php the_tags('',', ',''); ?>
											</div>

										</div>
										
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>

			<?php endwhile; endif; ?>
		</div>
	</section>

</div>

<?php get_footer(); ?>


