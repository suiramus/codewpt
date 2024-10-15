<?php

/* 
	Remove Screen Options and Help tab-bar from Admin for non-admin users
	Testat: OK Oct 2024
 */

if( ! current_user_can('administrator') ) {
	/* Remove Screen Options */
	add_filter( 'screen_options_show_screen', '__return_false' );
	/* Remove Help tab-bar */
	add_filter( 'contextual_help', 'mytheme_remove_help_tabs', 999, 3 );
	function mytheme_remove_help_tabs($old_help, $screen_id, $screen){
		$screen->remove_help_tabs();
		return $old_help;
	}
}