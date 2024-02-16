<?php

/**
 * Disable REST API for non-logged users.
 * https://zerowp.com/disable-rest-api-for-non-logged-users-in-wordpress/
 * <link rel="https://api.w.org/" href="https://www.wpt.sitename.ro/wp-json/" />
 * <link rel="alternate" type="application/json" href="https://www.sitename.ro/wp-json/wp/v2/pages/24" />
 */
function custom_disable_rest_api($access)
{
    if (is_user_logged_in()) {
        return $access;
    }

    $errorMessage = 'REST API is not available!';

    if (!is_wp_error($access)) {
        return new WP_Error(
            'rest_api_disabled',
            $errorMessage, [
            'status' => rest_authorization_required_code(),
        ]);
    }

    $access->add(
        'rest_api_disabled',
        $errorMessage, [
        'status' => rest_authorization_required_code(),
    ]);
    return $access;
}

add_filter('rest_authentication_errors', 'custom_disable_rest_api', 99);

/* 
 * Function to remove REST API output in header
 * https://thomas.vanhoutte.be/miniblog/remove-api-w-org-rest-api-from-wordpress-header/
 * <link rel="alternate" type="application/json+oembed" href="https://www.wpt.sitename.ro/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fwww.sitename.ro%2F" />
 * <link rel="alternate" type="text/xml+oembed" href="https://www.sitename.ro/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fwww.sitename.ro%2F&#038;format=xml" />
 */

function remove_api_from_head () {
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
}
add_action( 'after_setup_theme', 'remove_api_from_head' );