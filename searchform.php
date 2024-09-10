<div id="auxSearchForm" class="relative">
	<form role="search" method="get" id="headersearchform" class="searchform floatLeft absolute" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	  <input type="text" placeholder="Search" name="s" id="s" placeholder="Search" class="floatLeft" />
	  <button type="submit" id="searchsubmit" class="aux-search floatLeft"><i class="fas fa-search"></i></button>
	</form>
	<div class="toggle floatRight relative">
		<div class="openSearch icon relative"><span class="absolute"><i class="fas fa-search"></i><span class="font0">Open Search</span></span></div>
		<div class="closeSearch icon relative">&times;<span class="absolute font0">Close Search</span></div>
	</div>
	<div class="clear"></div>
</div>