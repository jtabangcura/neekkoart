<?php get_header();
wp_reset_query(); ?>

<div id="subpage" class="news">

<?php include '_inc/functions/banner.php'; ?>
<?php include '_inc/parts/pages/featNews.php'; ?>
<?php include '_inc/parts/pages/newsFilter.php'; ?>

<?php wp_reset_query(); //Protect against arbitrary paged values
$currCat = get_category(get_query_var('cat'));
$cat_name = $currCat->name;
$cat_id   = get_cat_ID( $cat_name );

$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

$args = array(
	'posts_per_page' => 6,
	'cat' => $cat_id,
	'paged' => $paged,
);

$news = new WP_Query( $args );
if ($news->have_posts()) : ?>
	<div id="news">
		<div class="container">
			<div class="row">
				<?php while ($news->have_posts()) : $news->the_post(); $newsID = $post->ID; $newsCat = get_the_category();  ?>
					<article class="col col-sm-8 <?php echo esc_html($newsCat[0]->slug); ?> relative">
						<img src="<?php bloginfo('template_directory'); ?>/images/newsroom-spacer.png" />
						<div class="absolute content">
							<h5 class="relative">
								<?php echo esc_html($newsCat[0]->name); ?>
								<div class="icon absolute">&nbsp;</div>
							</h5>
							<p>
								<?php 
									$char = 17;
									if ($newsCat[0]->name == 'White Paper' || $newsCat[0]->name == 'Industry News') :
										$newsContent = '<strong>'.get_the_title($newsID).'</strong> &dash; '.get_post($newsID)->post_content;
										echo force_balance_tags(html_entity_decode(wp_trim_words(htmlentities($newsContent),$char)));
									else :
										$newsContent = '<strong>'.get_the_time('m.d.y',$newsID).' &ndash; '.get_the_title($newsID).'</strong>'.get_post($newsID)->post_content;
										echo force_balance_tags(html_entity_decode(wp_trim_words(htmlentities($newsContent),$char)));
									endif;
								?><br />
								<a href="<?php echo get_permalink($newsID); ?>" class="more">
									<?php if ($newsCat[0]->name == 'White Paper') echo 'Download'; else echo 'Read More'; ?>
									<i class="fa fa-caret-right"></i>
								</a>
							</p>
						</div>
					</article>
				<?php endwhile; ?>
			</div>
		</div>
		<?php if (get_category($cat_id)->count > 6) include '_inc/functions/pagination.php'; ?>
	</div>
<?php endif; ?>

</div>

<?php get_footer(); ?>