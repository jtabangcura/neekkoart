<?php

// theme setup
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup(){
	load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form' ) );
}

@ini_set( 'upload_max_size' , '24M' );
@ini_set( 'post_max_size', '24M');
@ini_set( 'max_execution_time', '300' );

// add jQuery
// function blankslate_load_scripts(){
// 	wp_enqueue_script( 'jquery' );
// }
// add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );

// add custom styles
function cstyles(){
	wp_enqueue_style( 'normalize',  get_template_directory_uri() . '/_inc/css/normalize.min.css', false, '3.0.3',false);
	wp_enqueue_style( 'bootstrap',  get_template_directory_uri() . '/_inc/css/bootstrap.min.css', false, '3.3.7',false);
  wp_enqueue_style( 'slick',  get_template_directory_uri() . '/_inc/css/slick.css', false, '',false);
  wp_enqueue_style( 'colorbox',  get_template_directory_uri() . '/_inc/css/colorbox.css', false, '',false);
  wp_enqueue_style( 'animate',  get_template_directory_uri() . '/_inc/css/animate.min.css', false, '',false);
  wp_enqueue_style( 'fontawesome',  get_template_directory_uri() . '/_inc/css/all.min.css', false, '',false);
	wp_enqueue_style( 'build',  get_template_directory_uri() . '/_inc/css/build.css', false, '',false);
}
add_action( 'wp_enqueue_scripts', 'cstyles' );

// add custom scripts
function cscripts() {
	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', false, '2.1.1', true );
  wp_enqueue_script( 'slick',  get_template_directory_uri() . '/_inc/js/slick.min.js', false, '1.6.0', true);
  wp_enqueue_script( 'bootstrap',  'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', false, '3.3.7', true);
  wp_enqueue_script( 'colorbox',  get_template_directory_uri() . '/_inc/js/jquery.colorbox-min.js', false, '1.6.4', true);
  wp_enqueue_script( 'wow',  get_template_directory_uri() . '/_inc/js/wow.min.js', false, '1.1.2', true);
}
add_action( 'wp_enqueue_scripts', 'cscripts' );


//svg support
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


//menus
/*function register_menus() {
  register_nav_menus(
    array(
      'main-nav' => __( 'Main Nav' ),
      'aux-nav' => __( 'Aux Nav' )
    )
  );
}
add_action( 'init', 'register_menus' );*/


//enable excerpt
add_action( 'init', 'enable_excerpts' );
function enable_excerpts() {
   add_post_type_support( 'page', 'excerpt' );
}

// theme adjust comment reply
function blankslate_enqueue_comment_reply_script(){
	if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );

//adjusts comments pings
function blankslate_custom_pings( $comment ){
	$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
	}
add_filter( 'get_comments_number', 'blankslate_comments_number' );


// adjust comments number
function blankslate_comments_number( $count ){
	if ( !is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array('menu_title'=>'Global Options'));
	
}

//scroll to thank you msg
//add_filter( 'gform_confirmation_anchor', '__return_true' );

//current year shortcode for footer
function current_year( $atts ){
	return date('Y');
}
add_shortcode( 'current_year', 'current_year' );

//active class on archive list
function activeYear( $link_html ) {
    $currentYear = get_the_archive_title();
    if ( preg_match('/'.$currentYear.'/i', $link_html ) )
        $link_html = preg_replace('/<li>/i', '<li class="current-year">', $link_html );
    return $link_html;
}
/* 
 * Remove Prefixes from archive title
 */

add_filter( 'get_the_archive_title', function ( $title ) {

    if( is_category() ) {
        $title = single_cat_title( '', false );
    }
  elseif( is_tax() ) {
    $tax = get_taxonomy( get_queried_object()->taxonomy );
    /* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
    $title = sprintf( __( '%2$s' ), $tax->labels->singular_name, single_term_title( '', false ) );
  }
  elseif ( is_year() ) {
      $title = sprintf( __( '%s' ), get_the_date( _x( 'Y', 'yearly archives date format' ) ) );
  } 
  elseif ( is_month() ) {
      $title = sprintf( __( '%s' ), get_the_date( _x( 'F Y', 'monthly archives date format' ) ) );
  }
    return $title;

});

remove_filter ('the_content', 'wpautop');

?>