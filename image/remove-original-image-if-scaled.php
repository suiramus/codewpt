<?php

/* ====================================================== */

/**
 * Removes original image file from disk if `-scaled` size has been created.
 * https://wp-kama.com/2284/the-scaled-suffix-for-images
 * Function for hook `wp_generate_attachment_metadata`.
 * @param array  $image_meta
 * @param int    $attachment_id
 * @param string $context       Exists from WP 5.3+.
 * @return array
 */

add_filter( 'wp_generate_attachment_metadata', 'remove_scaled_original_image_file', 10, 3 );

function remove_scaled_original_image_file( $image_meta, $attachment_id, $context = '' ) {
	if( $context !== 'create' || empty( $image_meta['original_image'] ) ){
		return $image_meta;
	}
	// Remove original image file from disk
	$image_file = get_attached_file( $attachment_id );
	$original_file = path_join( dirname( $image_file ), $image_meta['original_image'] );
	$removed = unlink( $original_file );
	if( $removed ) {
		unset( $image_meta['original_image'] );
	}
	else {
		trigger_error( 'Couldn`t remove original_image file.' );
	}
	return $image_meta;
}

/* ====================================================== */