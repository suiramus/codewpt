<?php

/* ===================================================== */

/* Display ID in Admin, in posts, pages and cpt */

// Show ID Column
function show_id_column($columns) {
    $columns['post_id'] = 'ID';
    return $columns;
}

// Show ID in rows
function show_id_column_content($column_name, $post_id) {
    if ($column_name === 'post_id') {
        // Afișăm ID-ul postului în coloana personalizată
        echo $post_id;
    }
}

// Show ID Column filter
// add_filter('manage_posts_columns', 'show_id_column');
// add_filter('manage_pages_columns', 'show_id_column');

// Show ID in rows
// add_action('manage_posts_custom_column', 'show_id_column_content', 10, 2);
// add_action('manage_pages_custom_column', 'show_id_column_content', 10, 2);

/* ===================================================== */