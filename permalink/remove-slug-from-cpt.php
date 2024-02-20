<?php

/* 
	Remove slug from permalinks for custom post type
	mysite.com/services/service-one/ -> mysite.com/service-one/
	Example: cpt name = services
	Replace "services" with your custom post type
	
	Adaptation from:
	https://youtu.be/5mVtY3kdKpw?si=K6Ptc87igeFCM_IW
	Joshua Herbison - Enhance WordPress URLs: Remove Post Type Prefix for Better SEO
*/



function remove_services_slug($post_link, $post) {
    if ($post->post_type == "services" && $post->post_status == "publish") {
        $post_link = str_replace('/' . $post->post_type . '/', '/', $post_link);
    }
    return $post_link;
}
add_filter('post_type_link', 'remove_services_slug', 10, 2);

function parse_services_post_types($query) {
    if (!$query->is_main_query() || 2 != count($query->query) || !isset($query->query['page'])) {
        return;
    }

    if (!empty($query->query['name'])) {
        $args = array(
            'public' => true,
            '_builtin' => false
        );
        $post_types = get_post_types($args);
        $post_types['page'] = 'page';
        $post_types['post'] = 'post';

        $query->set('post_type', $post_types);
    }
}
add_action('pre_get_posts', 'parse_services_post_types'); */

/* ====================================================== */

/**
 * Variant with cpt in variable
 * mysite.com/services/service-one/ -> mysite.com/service-one/
*/

// CPT Name


/* 

$post_type_name = 'services';

// Remove slug from permalinks
function remove_custom_post_type_slug($post_link, $post) {
    global $post_type_name;
    if ($post->post_type == $post_type_name && $post->post_status == "publish") {
        $post_link = str_replace('/' . $post->post_type . '/', '/', $post_link);
    }
    return $post_link;
}
add_filter('post_type_link', 'remove_custom_post_type_slug', 10, 2);

// Query Manipulation
function parse_custom_post_type_query($query) {
    global $post_type_name;
    if (!$query->is_main_query() || 2 != count($query->query) || !isset($query->query['page'])) {
        return;
    }

    if (!empty($query->query['name'])) {
        $args = array(
            'public' => true,
            '_builtin' => false
        );
        $post_types = get_post_types($args);
        $post_types['page'] = 'page';
        $post_types['post'] = 'post';
        $post_types[$post_type_name] = $post_type_name; // Adaugă custom post type-ul actual în lista de tipuri de posturi

        $query->set('post_type', $post_types);
    }
}
add_action('pre_get_posts', 'parse_custom_post_type_query');

*/


/* ====================================================== */