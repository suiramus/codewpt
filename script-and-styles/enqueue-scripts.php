<?php

/* 
	Enqueue Scripts JS
*/

if( ! function_exists( 'register_custom_scripts' )) {
	function register_custom_scripts() {
		// Get masonry script for cpt "portofoliu" only
		/* if( is_single() && get_post_type() == 'portofoliu' ){
			wp_enqueue_script( 'masonryjs', get_template_directory_uri() . 'assets/js/masonry.js', array(), '4.2.2', true );
		} */
    	wp_enqueue_script( 'theme-scripts', get_template_directory_uri() . '/assets/js/theme-scripts.js', array(), filemtime( get_template_directory() . '/assets/js/theme-scripts.js' ), true );
	}
}
add_action( 'wp_enqueue_scripts', 'register_custom_scripts' );