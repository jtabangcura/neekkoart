<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>

<?php wp_head(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />

<link rel="shortcut icon" href="<?php bloginfo('template_directory') ?>/images/favicon.png">
<link rel="apple-touch-icon" href="<?php bloginfo('template_directory') ?>/images/favicon.png">

<link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
<!--<link rel="stylesheet" href="https://use.typekit.net/zcj5mrg.css">
<script src="https://kit.fontawesome.com/7531c4e865.js" crossorigin="anonymous"></script>-->

</head>

<body <?php body_class(); ?>>

	<div id="main_wrapper">

		<header id="header" class="animate textRight">

			<div class="trigger textCenter relative animate">
				<div class="open-menu"><i class="fas fa-bars"></i></div>
				<div class="close-menu"><i class="fas fa-times"></i></div>
			</div>

			<?php if (!is_front_page()) : ?>
				<a class="back animate absolute" href="<?php bloginfo('home'); ?>">
					<i class="fas fa-step-backward"></i>
				</a>
			<?php endif; ?>

			<div class="menu absolute animate">
				<ul class="textRight animate">

					<?php $pages = get_field('na_pages','options');

					if ($pages) : 

							foreach ($pages as $p) :

								$pLT = get_post_meta($p->ID, '_links_to', true);

								if ($pLT) :
									echo '<li><a href="'.get_permalink($p).'" title="'.get_the_title($p).'" target="_blank">'.get_the_title($p).'</a></li>';
								else :
									echo '<li><a href="#'.get_post_field('post_name',$p).'" title="'.get_the_title($p).'" class="cbFull">'.get_the_title($p).'</a></li>';
								endif;

							endforeach;

					endif; ?>

					
					<?php if (have_rows('na_links','options')) : ?>

						<li class="sm">
							<span class="findMe">find me on</span>
							<?php
							while (have_rows('na_links','options')) : the_row();
								$sm = get_sub_field('link');
								echo '<a href="'.$sm['url'].'" target="'.$sm['target'].'"" title="'.$sm['title'].'" alt="'.$sm['title'].'">'.get_sub_field('fa').'</a>';
							endwhile; ?>
						</li>

					<?php endif; ?>

				</ul>
			</div>
			
		</header>

		<main>

			<h1 class="hide"><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></h1>