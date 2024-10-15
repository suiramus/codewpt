<?php

/* 
    Remove items from Left Top Menu in Admin screen in Wordpress
    * Logo
    * About
    * View Site
    * New Content + Submenu
 */

function remove_items_from_left_top_menu_admin() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo'); // WordPress Logo
    $wp_admin_bar->remove_menu('about'); // About WordPress
    $wp_admin_bar->remove_menu('view-site'); // View Site
    // $wp_admin_bar->remove_menu('site-name'); // Site name
    // $wp_admin_bar->remove_menu('new-content'); // New Content
        // New Content Submenu
        // $wp_admin_bar->remove_menu('new-post'); // New Post
        // $wp_admin_bar->remove_menu('new-page'); // New Page
        // $wp_admin_bar->remove_menu('new-media'); // New Media
        // $wp_admin_bar->remove_menu('new-user'); // New User
}
add_action('wp_before_admin_bar_render', 'remove_items_from_left_top_menu_admin');