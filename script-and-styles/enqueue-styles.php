<?php

/**
 * Enqueue styles.
 */

if ( ! function_exists( 'register_custom_styles' ) ) {
	
	function register_custom_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );
		$version_string = is_string( $theme_version ) ? $theme_version : false;
		
		// Titillium Web Font
		wp_register_style( 'font-titillium-web', get_template_directory_uri() . '/assets/fonts/titillium-web.css', array(), false, 'all' );
		wp_enqueue_style( 'font-titillium-web' );
		
		// Open Sans Font
		wp_register_style( 'font-open-sans', get_template_directory_uri() . '/assets/fonts/open-sans.css', array(), false, 'all' );
		wp_enqueue_style( 'font-open-sans' );
		
		// Roboto Font
		wp_register_style( 'font-roboto', get_template_directory_uri() . '/assets/fonts/roboto.css', array(), false, 'all' );
		wp_enqueue_style( 'font-roboto' );
		
		wp_register_style( 'theme-css', get_template_directory_uri() . '/assets/css/theme.css', array(), filemtime(get_template_directory() . '/assets/css/theme.css'), 'all' );
		wp_enqueue_style( 'theme-css' );
		
		wp_register_style(
			'main-css',
			get_template_directory_uri() . '/style.css',
			array('font-titillium-web', 'font-roboto', 'font-open-sans', 'theme-css'),
			$version_string
		);
		// Enqueue theme stylesheet.
		wp_enqueue_style( 'main-css' );
	}
}
add_action( 'wp_enqueue_scripts', 'register_custom_styles' );
