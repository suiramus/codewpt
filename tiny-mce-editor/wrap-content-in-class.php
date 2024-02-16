<?php
/* 
	Wrap the_content in class (.content-wrap) for CSS styling
	Just for elements: headings, p, ul, li
	No width, height, etc
*/
add_action('the_content','content_wrap_in_class', 11);
function content_wrap_in_class( $content ){
	if ( ! empty ($content)) {
		return "\n\t\t\t" . '<div class="content-wrap">' . "\n\t\t\t\t" . $content . "\n\t\t\t" . '</div><!-- .content-wrap -->';
	}
}