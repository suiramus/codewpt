<?php

// Add Media Library Column: File Size + Dimensions + ID
// https://bloggerpilot.com/snippet-media-filesize/
// How to Add Dimensions Column to WordPress Media Library
// https://www.isitwp.com/add-media-library-column-with-image-width-and-height-wp_get_attachment_metadata/

add_filter('manage_upload_columns', 'wpt_custom_media_columns');
add_action('manage_media_custom_column', 'wpt_display_custom_media_columns', 10, 2);

// Create the column
function wpt_custom_media_columns($columns) {
	$columns['wptFilesize'] = __('File Info'); // Add File size column
	// unset( $columns['author'] ); // Remove Author
	// unset( $columns['date'] ); // Remove Date
	
	return $columns;
}

/* ====================================================== */

// Display the file size and dimensions
function wpt_display_custom_media_columns( $column_name, $media_item ) {
	
	if ('wptFilesize' != $column_name || !wp_attachment_is_image( $media_item )) {
		return;
	}
	// Display filesize: [ 281.83 KB ]
	$wptFilesize = filesize( get_attached_file($media_item) );
	$wptFilesize = size_format( $wptFilesize, 2 );
	echo "<strong>" . $wptFilesize . "</strong>";
	
	// Display image dimensions [1920 x 1280 px]
	$meta = wp_get_attachment_metadata($media_item);
	if ( isset($meta['width']) ) {
		echo "<br>" . $meta['width'] .' x '. $meta['height'] . " px";
	}
	// ID: 81
	echo "<br><strong>ID:</strong> " . $media_item;
}

/* ====================================================== */

// Reorder Columns in Media Library
// https://stackoverflow.com/questions/64054417/how-to-specify-the-order-of-custom-column-and-existing-column

function custom_order_image_columns($defaults){
    return array(
		'cb' => '<input type="checkbox" />',
		'title' => __('Name', 'text_domain'),
		'wptFilesize' => __('File Info'),
		'parent' => __('Uploaded to', 'text_domain'),
		'date' => __('Date', 'text_domain'),
		'author' => __('Author', 'text_domain'),
		'resmushit_status' => __('Resmushit', 'text_domain'),
		'resmushit_disable' => __('Resmushit Disable', 'text_domain'),
	);
}
add_filter('manage_upload_columns', 'custom_order_image_columns', 5);

/* ====================================================== */

// Custom Styles for Media Library Columns
add_action('admin_head', 'custom_media_columns_styles');
function custom_media_columns_styles() {
	echo '
	<style>
		.column-wptFilesize {width: 100px; background: rgba(0,0,250,.05);}
	</style>
	';
}

/* ====================================================== */