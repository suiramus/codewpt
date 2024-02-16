<?php

/* ====================================================== */

// Remove Help Contextual Top Menu from admin screen
function remove_help_tab_from_admin() {
    $screen = get_current_screen();
    $screen->remove_help_tabs();
}
add_action( 'admin_head', 'remove_help_tab_from_admin' );

/* ====================================================== */