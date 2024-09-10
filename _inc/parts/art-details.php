<div class="caption">
	<h3><?php the_title(); ?><a href="<?php the_permalink(); ?>" title="Open in new tab" target="_blank"><i class="fas fa-link"></i></a></h3>
	<h4><?php the_time('Y'); ?></h4>
	
	<?php the_field('na_art_credits'); ?>

	<?php
	$l = get_field('na_art_links');
	if ($l) :

		echo '<div class="links colorLinks">';

		if ($l['process']) echo '<a href="https://www.youtube.com/embed/'.$l['process'].'" class="cbVideo" title="Watch the process video">Process <i class="fab fa-youtube"></i></a>';
		if ($l['download']) echo '<a href="'.$l['download']['url'].'" title="Download the .psd file" target="_blank">.PSD <i class="fas fa-file-archive"></i></a>';
		if ($l['buy']) echo '<a href="'.$l['buy']['url'].'" title="Purchase a print" target="_blank">Purchase Print <i class="fas fa-portrait"></i></a>';

		echo '</div>';

	endif; ?>

	<?php
	$d = get_field('na_art_details');
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