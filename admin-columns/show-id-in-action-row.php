<?php

/**
 * 	Show ID in Wordpress
 * 	Add ID in the action row of list tables for pages, posts,
	custom post types, media, taxonomies, custom taxonomies,
	users amd comments
 *	Inspiration:
	https://wordpress.org/plugins/admin-site-enhancements/
	https://www.itsupportguides.com/knowledge-base/wordpress/using-wordpress-post_row_actions-php-filter/
*/

add_filter('post_row_actions', 'add_custom_action_for_specific_post_type', 11, 2);
add_filter('page_row_actions', 'add_custom_action_for_specific_post_type', 11, 2);
add_filter('cat_row_actions', 'add_custom_action_for_specific_post_type', 11, 2);
add_filter('tag_row_actions', 'add_custom_action_for_specific_post_type', 11, 2);
add_filter('media_row_actions', 'add_custom_action_for_specific_post_type', 11, 2);
add_filter('comment_row_actions', 'add_custom_action_for_specific_post_type', 11, 2);
add_filter('user_row_actions', 'add_custom_action_for_specific_post_type', 11, 2);

/* Output the ID in the action row */
function add_custom_action_for_specific_post_type( $actions, $object ) {
        
	if ( current_user_can( 'edit_posts' ) ) {
		// For pages, posts, custom post types, media/attachments, users
		if ( property_exists( $object, 'ID' ) ) {
			$id = $object->ID;
		}
		// For taxonomies
		if ( property_exists( $object, 'term_id' ) ) {
			$id = $object->term_id;
		}
		// For comments
		if ( property_exists( $object, 'comment_ID' ) ) {
			$id = $object->comment_ID;
		}
		$actions['show-id-now'] = '<span style="color: gray;">ID: ' . $id . '</span>';
	}
	return $actions;
}