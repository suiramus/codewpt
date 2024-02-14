<?php

/* 
	Attachement redirect to post or home page
	https://www.wpexplorer.com/disable-image-page/
*/

function redirect_attachment_page() {
    if ( is_attachment() ) {
        global $post;
        if ( is_a( $post, 'WP_Post' ) && ! empty( $post->post_parent ) ) {
            $redirect = esc_url( get_permalink( $post->post_parent ) );
        } else {
            $redirect = esc_url( home_url( '/' ) );
        }
        if ( wp_safe_redirect( $redirect, 301 ) ) {
            exit;
        }
    }
}
add_action( 'template_redirect', 'redirect_attachment_page' );