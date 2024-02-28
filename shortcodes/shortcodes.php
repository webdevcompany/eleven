<?php 

/* Menu Hamburger Button*/
function  menu_humburger_btn_( $atts ){
	ob_start();
	get_template_part( 'template-parts/menu-hamburger-button', 'page' );
	return ob_get_clean();

}

add_shortcode( 'menu_humburger_btn', 'menu_humburger_btn_' );

/* Testimonials slider*/
function testimonials_slider_shortcode( $atts ){
    ob_start();
    get_template_part( 'template-parts/testimonials-slider', 'page' );
    return ob_get_clean();
}
add_shortcode( 'testimonials_slider', 'testimonials_slider_shortcode' ); 

/* About us slider*/
function about_us_slider_shortcode( $atts ){
    ob_start();
    get_template_part( 'template-parts/about-us-slider', 'page' );
    return ob_get_clean();
}
add_shortcode( 'about_us_slider', 'about_us_slider_shortcode' ); 
