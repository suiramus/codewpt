<?php

/* ===================================================== */

/* 
    Display Featured Image in Admin
    Funcție pentru adăugarea coloanei personalizate cu imaginea "Featured Image" în listarea posturilor și paginilor
    function afiseaza_featured_image_column($columns) {
        $columns['featured_image'] = 'Featured Image';
        return $columns;
    }
	1. Create column: display_featured_image_column($columns)
	2. Display content in rows: display_featured_image_column_content($column_name, $post_id)
*/

// Create column for Cover Image [Featured Image]
function display_featured_image_column($columns) {
    $new_columns = array();
    foreach ($columns as $key => $value) {
        $new_columns[$key] = $value;
        if ($key === 'title') {
			// Set column order after title
            $new_columns['featured_image'] = 'Cover';
        }
    }
    return $new_columns;
}

// Show "Featured Image" in Column
function display_featured_image_column_content($column_name, $post_id) {
    if ($column_name === 'featured_image') {
        // If post has "Featured Image"
        if (has_post_thumbnail($post_id)) {
            // Get URL for "Featured Image"
            $featured_image_url = get_the_post_thumbnail_url($post_id, 'thumbnail');
            // Show the image in row
            echo '<img src="' . $featured_image_url . '" style="width: 50px; height: 50px; object-fit: cover;" />';
        } else {
            // If "Featured Image" is not set
            echo 'No image';
        }
    }
}

// Display Column for Posts and Pages
add_filter('manage_posts_columns', 'display_featured_image_column');
add_filter('manage_pages_columns', 'display_featured_image_column');

// Content for Posts and Pages
add_action('manage_posts_custom_column', 'display_featured_image_column_content', 10, 2);
add_action('manage_pages_custom_column', 'display_featured_image_column_content', 10, 2);

/* ===================================================== */