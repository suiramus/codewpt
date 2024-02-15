<?php
/**
 * Get information about all registered image sizes.
 * https://wp-kama.com/2003/disabling-wp-images-copies
 * @global $_wp_additional_image_sizes
 * @uses   get_intermediate_image_sizes()
 * @param  boolean [$unset_disabled = true] Remove from list sizes with 0 width and height?
 * @return array Data of all sizes.
 */

/* 
	Put this in header.php or footer.php
 */

function get_image_sizes( $unset_disabled = true ) {
	$wais = & $GLOBALS['_wp_additional_image_sizes'];
	$sizes = array();
	foreach ( get_intermediate_image_sizes() as $_size ) {
		if ( in_array( $_size, array('thumbnail', 'medium', 'medium_large', 'large') ) ) {
			$sizes[ $_size ] = array(
				'width'  => get_option( "{$_size}_size_w" ),
				'height' => get_option( "{$_size}_size_h" ),
				'crop'   => (bool) get_option( "{$_size}_crop" ),
			);
		}
		elseif ( isset( $wais[$_size] ) ) {
			$sizes[ $_size ] = array(
				'width'  => $wais[ $_size ]['width'],
				'height' => $wais[ $_size ]['height'],
				'crop'   => $wais[ $_size ]['crop'],
			);
		}
		// size registered, but has 0 width and height
		if( $unset_disabled && ($sizes[ $_size ]['width'] == 0) && ($sizes[ $_size ]['height'] == 0) )
			unset( $sizes[ $_size ] );
	}
	return $sizes;
}

echo '<pre>';
	var_dump(get_image_sizes());
echo '</pre>';
// die();
?>