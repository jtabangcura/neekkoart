	</main>

	<?php $pages = get_field('na_pages','options');

	if ($pages) : ?>

		<div class="hide">

			<?php foreach ($pages as $p) : ?>

				<?php setup_postdata($p); ?>
				<div id="<?php echo get_post_field('post_name',$p); ?>" class="cb colorLinks">
					<div class="row">
						<div class="col-md-18 col-md-offset-3 col-sm-24">
							<h2 class="colorBars"><?php echo get_the_title($p); ?></h2>
							<?php the_content(); ?>
						</div>
					</div>
				</div>

			<?php endforeach; wp_reset_query(); ?>

			<?php $nc = 164; setup_postdata($nc); //notes & credits ?>
			<div id="<?php echo get_post_field('post_name',$nc); ?>" class="cb colorLinks">
				<div class="row">
					<div class="col-md-18 col-md-offset-3 col-sm-24">
						<h2 class="colorBars"><?php echo get_the_title($nc); ?></h2>
						<?php the_content(); ?>
					</div>
				</div>
			</div><?php wp_reset_query(); ?>

		</div>

	<?php endif; ?>

	<footer id="footer" class="textCenter">
		<div class="container">
			<p class="foot-nav">
				<span class="findMe">find me on</span>
				<?php if (have_rows('na_links','options')) : ?>

					<style type="text/css">
						<?php 
						while (have_rows('na_links','options')) : the_row();
							$sm = get_sub_field('link');
							echo '#sm'.$sm['title'].':hover {color: '.get_sub_field('hover').';}';
						endwhile; ?>
					</style>

					<?php 
					while (have_rows('na_links','options')) : the_row();
						$sm = get_sub_field('link');
						echo '<a rel="me" href="'.$sm['url'].'" target="'.$sm['target'].'"" title="'.$sm['title'].'" alt="'.$sm['title'].'" id="sm'.$sm['title'].'">'.get_sub_field('fa').'</a>';
					endwhile; ?>

				<?php endif; ?>
			</p>
			<p>
				<span>&copy;2008&ndash;<?php echo date('Y'); ?> Neekko.</span>
				<span>All rights reserved.</span>
				<span>Please do not repost content without permission from the&nbsp;artist.</span>
				<span>Web design &amp; development by <a href="https://jtfrontend.com" target="_blank">jtFrontEnd</a>.</span>
				<span><a href="#notes-credits" class="cbFull">Notes &amp; Credits</a></span>
			</p>
			<p>
				<span>Artworks labeled "NSFW" do not contain anything graphic, but are marked so as a precaution.</span>
			</p>
		</div>
	</footer>

</div><?php // end of #main_wrapper ?>

<script type="text/javascript">
	jQuery(document).ready(function($) {

		new WOW().init();

	  jQuery(document).on('click', "a[href^='http:']:not([href*='" + window.location.host + "']),a[href^='https:']:not([href*='" + window.location.host + "'])", function() {
	    jQuery(this).attr("target", "_blank");
	  });

  	jQuery('.colorbox').colorbox({
  		inline: true,
  		maxWidth: '90%',
  		close: '<i class="fas fa-eject"></i>',
  		previous: '<i class="fas fa-backward"></i>',
  		next: '<i class="fas fa-forward"></i>',
  		rel: 'gallery'
  	});

  	jQuery('.cbFull').colorbox({
  		inline: true,
  		width: '100%',
  		maxWidth: '800px',
  		close: '<i class="fas fa-eject"></i>',
  		previous: '<i class="fas fa-backward"></i>',
  		next: '<i class="fas fa-forward"></i>'
  	});

  	jQuery('.cbVideo').colorbox({
  		iframe: true,
  		innerWidth: '1024px',
  		innerHeight: '768px',
  		close: '<i class="fas fa-eject"></i>'
  	});

		jQuery('#header .trigger').on('click', function() {
			jQuery(this).closest('#header').toggleClass('opened');
		});

		jQuery('.colorBars').each(function(){
		       
		  var $el = jQuery(this),
		    text = $el.text(),
		    len = text.length,
		    newCont = '';
		  
		  for (var i=0; i<len; i++){
		    newCont += '<span>'+ text.charAt(i) +'</span>';
		  }
		  
		  $el.html(newCont);
		       
		});

		jQuery('.warning button').on('click', function() {
			jQuery(this).closest('.cbContent').toggleClass('censored');
		});

	});
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-142123813-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-142123813-1');
</script>
	
<?php wp_footer(); ?>

</body>
</html>