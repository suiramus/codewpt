<?php

/**
 * Clean stuff from head
 */

 // Disable WordPress Version Generator
 // <meta name="generator" content="WordPress 6.4.2" />
remove_action('wp_head', 'wp_generator');

// Disable RSS Feed
function theme_disable_feed() {
	wp_die( 'No feed available, please visit the <a href="'. esc_url( home_url( '/' ) ) .'">'. bloginfo( 'name' ) .'</a>' );
}
   
add_action('do_feed', 'theme_disable_feed', 1);
add_action('do_feed_rdf', 'theme_disable_feed', 1);
add_action('do_feed_rss', 'theme_disable_feed', 1);
add_action('do_feed_rss2', 'theme_disable_feed', 1);
add_action('do_feed_atom', 'theme_disable_feed', 1);
add_action('do_feed_rss2_comments', 'theme_disable_feed', 1);
add_action('do_feed_atom_comments', 'theme_disable_feed', 1);
/* 
<link rel="alternate" type="application/rss+xml" title="Feed" href="https://www.domain.com/feed/" />
<link rel="alternate" type="application/rss+xml" title="Comments Feed" href="https://www.domain.com/comments/feed/" />
*/
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
 
// Remove oEmbed discovery links
// remove_action('wp_head', 'wp_oembed_add_discovery_links');

// Remove oEmbed-specific JavaScript from front-end & back-end
// remove_action('wp_head', 'wp_oembed_add_host_js');

// Disable Really Simple Discovery service endpoint
// <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://www.domain.com/site/xmlrpc.php?rsd" />
remove_action('wp_head', 'rsd_link');

// Disable link to the Windows Live Writer manifest file
// remove_action('wp_head', 'wlwmanifest_link');

// Disable Injects rel=shortlink into the head
remove_action('wp_head', 'wp_shortlink_wp_head');

// Remove dashicons in frontend for unauthenticated users
// https://wordpress.stackexchange.com/questions/161476/how-to-remove-dashicons-min-css-from-frontend
add_action( 'wp_enqueue_scripts', 'dequeue_dashicons_from_frontend' );
function dequeue_dashicons_from_frontend() {
    if ( ! is_user_logged_in() ) {
        wp_deregister_style( 'dashicons' );
    }
}