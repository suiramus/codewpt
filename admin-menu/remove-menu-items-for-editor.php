<?php

// Remove menu items for Editors ( defaults or plugins menu )
function remove_menu_items_for_editors() {
    if (current_user_can('editor')) {
        // remove_menu_page('activity_log_page'); // Plugin
		remove_menu_page('themes.php'); // Appearance (Complete with submenu)
        remove_menu_page('plugins.php'); // Plugins
        remove_menu_page('users.php'); // Users
		// Submenu -> Settings -> Media
		remove_submenu_page( 'options-general.php', 'options-media.php' );
    }
}
// add_action('admin_init', 'remove_menu_items_for_editors');