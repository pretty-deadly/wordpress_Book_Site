<?php
/**
 * Custom header implementation
 */

function expert_makeup_artist_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'expert_makeup_artist_custom_header_args', array(
		'default-text-color' => 'fff',
		'header-text' 	     =>	false,
		'width'              => 1200,
		'height'             => 125,
		'flex-width'         => true,
		'flex-height'        => true,
		'wp-head-callback'   => 'expert_makeup_artist_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'expert_makeup_artist_custom_header_setup' );

if ( ! function_exists( 'expert_makeup_artist_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see expert_makeup_artist_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'expert_makeup_artist_header_style' );
function expert_makeup_artist_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        #header {
			background-image:url('".esc_url(get_header_image())."');
			background-position: bottom center;
			background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'expert-makeup-artist-basic-style', $custom_css );
	endif;
}
endif; // expert_makeup_artist_header_style