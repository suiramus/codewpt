<?php

// Remove WP Logo from admin [top-left]
// Remove Submenu from WP Logo
// Remove "View Site"
function remove_wp_logo_and_submenu() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo'); // WordPress Logo
    $wp_admin_bar->remove_menu('about'); // About WordPress
    $wp_admin_bar->remove_menu('view-site'); // View Site
}
add_action('wp_before_admin_bar_render', 'remove_wp_logo_and_submenu');