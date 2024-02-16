<?php

// Custom login page

function custom_login_page_display() { ?>
    <style type="text/css">
        .login h1 a {
            background-image: url("<?php echo esc_url(get_template_directory_uri() . '/logo.svg'); ?>") !important;
            padding-bottom: 30px; /* Space betwen logo and form */
			background-size: 208px 150px !important;
			width: 100% !important;
			height: auto !important;
			min-height: 150px !important;
        }
    </style>
<?php }

add_action('login_enqueue_scripts', 'custom_login_page_display');

// Redirect Login Logo Link to homepage URL
function redirect_login_logo_to_homepage() {
    // return get_bloginfo('url');
    return esc_url( home_url('/') );
}

add_filter('login_headerurl', 'redirect_login_logo_to_homepage');