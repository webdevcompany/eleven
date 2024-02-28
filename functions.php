<?php

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function eleven_theme_setup() {

	add_theme_support( 'post-thumbnails' );
	add_image_size( 'gallery-thumb-size', 370, 232, true ); // Hard Crop Mode
	add_image_size( 'services-thumb-size', 370, 276, true ); // Hard Crop Mode
	add_image_size( 'testimonial-thumb-size', 68, 68, true ); // Hard Crop Mode

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( [
		'header_menu' => esc_html__( 'Header menu', 'dent-theme' ),
		'footer_menu' => esc_html__( 'Footer menu', 'dent-theme' ),
	] );

}
add_action( 'after_setup_theme', 'eleven_theme_setup' );

/**
 * Enqueue scripts and styles.
 */
function eleven_theme_scripts() {
	/* Styles */
	wp_enqueue_style('dashicons');
    wp_enqueue_style( 'slickcss', get_stylesheet_directory_uri().'/plugins/slickslider/slick/slick.css');
    wp_enqueue_style( 'slick-theme', get_stylesheet_directory_uri().'/plugins/slickslider/slick/slick-theme.css');
	wp_enqueue_style( 'slimselect-css', get_stylesheet_directory_uri().'/plugins/slimselect2/css/slimselect.css');
	wp_enqueue_style( 'jquery-ui-css', get_stylesheet_directory_uri().'/plugins/jquery-ui/jquery-ui.css');
	wp_enqueue_style( 'eleven-theme-styles', get_stylesheet_uri(), array(), filemtime(get_stylesheet_directory() .'/style.css'), 'all');

	/* Scripts */
	wp_enqueue_script( 'slickjs', get_stylesheet_directory_uri() . '/plugins/slickslider/slick/slick.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'slimselect-js', get_stylesheet_directory_uri() . '/plugins/slimselect2/js/slimselect.min.js', array('jquery'), '', true );
	//wp_enqueue_script( 'inputmask-js', get_stylesheet_directory_uri() . '/plugins/inputmask/jquery.inputmask.js', array('jquery'), '', true );
	wp_enqueue_script( 'fromatnumber-js', get_stylesheet_directory_uri() . '/plugins/format-number-master/pcsFormatNumber.jquery.js', array('jquery'), '', true );
	wp_enqueue_script( 'mask-js', get_stylesheet_directory_uri() . '/plugins/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'jquery-ui', get_stylesheet_directory_uri() . '/plugins/jquery-ui/jquery-ui.js', array('jquery'), '', true );
	wp_enqueue_script( 'eleven-theme-functionsJs', get_stylesheet_directory_uri() . '/js/functions.js', array(), filemtime(get_stylesheet_directory('jquery') . '/js/functions.js'), true );
	
}
add_action( 'wp_enqueue_scripts', 'eleven_theme_scripts' );


/**
 * require shortcods
 */
require get_stylesheet_directory() . '/shortcodes/shortcodes.php';

/*
* Custom Excerpt Length
*/
function trim_custom_excerpt($excerpt) {
    if (has_excerpt()) {
        $excerpt = wp_trim_words(get_the_excerpt(), 
		apply_filters("excerpt_length", 8));
    }
    return $excerpt;
}
add_filter("the_excerpt", "trim_custom_excerpt", 999);

/*
 * Remove brackets at the end of each excerpt
 */
function custom_excerpt_more() {
    return '...';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

// Allow SVG through WordPress Media Uploader
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
function add_file_types_to_uploads($file_types){
$new_filetypes = array();
$new_filetypes['svg'] = 'image/svg+xml';
$file_types = array_merge($file_types, $new_filetypes );
return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');


function wpcontent_svg_mime_type( $mimes = array() ) {
    $mimes['svg']  = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
  }
add_filter( 'upload_mimes', 'wpcontent_svg_mime_type' );

