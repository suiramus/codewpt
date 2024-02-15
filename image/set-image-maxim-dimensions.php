<?php

/* 
	Image maxim dimensions 
	Change the `-scaled` size (maximum allowable size) of the image by width/height
	https://wp-kama.com/2284/the-scaled-suffix-for-images
*/

add_filter( 'big_image_size_threshold', function( $size, $imagesize, $file, $attachment_id ) {
	return 1920;
}, 10, 4 );