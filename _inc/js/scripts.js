jQuery(document).ready(function($) {

	// match height if needed
	// $(window).on('load resize', function() {
	//     if ($('.element').length) {
	//	$('.element').matchHeight();
	//     };
	//  });
	//
	//
	///// z5 Base Scripts Examples //////
	// $('.element').some_action(function(){$('.element,.element').toggleActive($classname_optional)});
	// $('.element').centerFloat('.child-element');
	//$('.element').SquareUp('height'); OR $('.element').SquareUp('width');
	//$('.element').animate({height: 'toggle'}, 500, 'swing');
	//
	//
	//

	/*$(window).on('load scroll', function(){
		var h = $('header'),
			hc = $('#header_clear'),
			nvht = h.outerHeight(),
			scht = $(window).scrollTop(),
			//mm = $('#mobile-nav');
			//mm.css('top',nvht)

			if (scht > nvht) {
				hc.height(nvht)
				h.addClass('scrolled');
				hc.addClass('scrolled');
				//mm.addClass('scrolled');
			}else{
				h.removeClass('scrolled');
				hc.removeClass('scrolled');
				//mm.removeClass('scrolled');
			};
	});*/
	
	//hide logo on mobile scroll
	

	// mobile menu toggle
	if ($('#mobile-nav')) {
		var mm = $('#mobile-nav');
		$('#mobile-toggle').click(function(){
			$(this).toggleClass('active');
			mm.animate({height: 'toggle'}, 250, 'swing');
		});
		$('#mobile-nav li.menu-item-has-children .expand').on('click', function() {
			$(this).parent().toggleClass('show-submenu');
		});
	};

	//simulate hover from touch devices
	$('body').bind('touchstart', function() {});

	//mobile search 
	jQuery('#header-search .toggle-search').on('click', function() {
		jQuery('#header-search').toggleClass('active');
	});

});
