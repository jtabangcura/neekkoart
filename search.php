<?php get_header(); ?>

<div id="subpage">

<?php include '_inc/parts/banner.php'; ?>

<section id="Contact">
  <div class="container">
    <div class="row">
      <div class="col-sm-18">
        
      	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<article class="searched">
						<h3>
	            <a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>	&rarr;
							</a>
						</h3>
						<p><?php 
							if (get_the_excerpt())
							 echo wp_trim_words(get_the_excerpt(),25,'...');
							elseif (get_the_content())
							 echo wp_trim_words(get_the_content(),25,'...');
							else
								if (have_rows('im_sub_sections')) : $i = 0; while (have_rows('im_sub_sections')) : the_row();
									$i++;
									if ($i > 1)
										break;
									else
										echo wp_trim_words(get_sub_field('content'),25,'...');
								endwhile; endif;
								if (have_rows('im_sections')) : $i = 0; while (have_rows('im_sections')) : the_row();
									$i++;
									if ($i > 1)
										break;
									else
										echo wp_trim_words(get_sub_field('content'),25,'...');
								endwhile; endif;
						?></p>
					</article>
  			<?php endwhile; else : ?>
	  			<p>Sorry, nothing matched your search. Please try again.</p>
				<?php endif; ?>
        
      </div>
    </div>
  </div>
</section>

</div>

<?php get_footer(); ?>