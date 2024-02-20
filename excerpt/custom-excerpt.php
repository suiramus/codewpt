<?php

/* 
	Custom excerpt
	the_excerpt();
 */

function custom_excerpt_length($length) {
    return 25; // Excerpt Lenght
}
add_filter('excerpt_length', 'custom_excerpt_length');

function custom_excerpt($excerpt) {
    global $post;
    if (!empty($excerpt)) {
		// Return the_excerpt if is not empty
        return $excerpt;
    } else {
		// Create the_excerpt from content
        $content = $post->post_content;
        $content = wp_strip_all_tags($content);
        $excerpt = substr($content, 0, 25);
        if (strlen($content) > 25) {
            $excerpt .= '...';
        }
        return $excerpt;
    }
}
add_filter('the_excerpt', 'custom_excerpt');