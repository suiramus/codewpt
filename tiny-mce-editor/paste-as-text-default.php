<?php

/* 
 * Paste as text in Classic Editor
 * Plugin Name: Paste As Plain Text By Default
 * Plugin URI: https://wordpress.org/plugins/paste-as-plain-text-by-default/
 */

add_filter('tiny_mce_before_init', function ($init) {
    $init['paste_as_text'] = true;
    return $init;
});