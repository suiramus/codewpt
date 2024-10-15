<?php



/* 
	Testat: OK Oct 2024

	Remove some capabilities for "editor"
	IMPORTANT!!! After cap removed, must add capabilities to default
	OR USE Plugin: https://wordpress.org/plugins/reset-roles-and-capabilities/
	https://wp-kama.com/function/remove_cap
	List of capabilities: https://wp-kama.com/note/wp-capabilities-list
 */

function remove_some_capabilities_for_editor_users() {
	// get the role object.
	$editor = get_role( 'editor' );
	//List of features to be removed from the editor
	$caps = array(
		// 'moderate_comments',
		// 'manage_categories',
		// 'manage_links',
		// 'delete_posts',
		// 'edit_others_pages',
		// 'edit_others_posts',
		// 'delete_others_pages',
		// 'delete_others_posts',
	);
	foreach ( $caps as $cap ) {
		$editor->remove_cap( $cap );
	}
}
add_action('init', 'remove_some_capabilities_for_editor_users');