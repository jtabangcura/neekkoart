(function($) {

// Smooth Scrolling
$(function(){$("a[href='#']").click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var e=$(this.hash);if(e=e.length?e:$("[name='"+this.hash.slice(1)+"']"),e.length)return $("html,body").animate({scrollTop:e.offset().top-($("header").outerHeight()+25)},1e3),!1}})});

// ToggleActive
$.fn.toggleActive=function(t){void 0==t?$(this).toggleClass("active"):$(this).toggleClass(t)};
// $('.element').some_action(function(){$('.element,.element').toggleActive($classname_optional)});


// Center Middle
$.fn.centerFloat=function(t){$(this).each(function(){var i=$(this).children(t),n=($(this).outerHeight()-i.outerHeight())/2,e={"margin-top":n,"margin-bottom":n};i.css(e)})};
// $('.element').centerFloat('.child-element');


// SquareUp
$.fn.SquareUp=function(h){"width"==h?$(this).each(function(){$(this).height($(this).width())}):$(this).each(function(){$(this).width($(this).height())})};
//$('.element').SquareUp('height'); OR $('.element').SquareUp('width');


	
})( jQuery );