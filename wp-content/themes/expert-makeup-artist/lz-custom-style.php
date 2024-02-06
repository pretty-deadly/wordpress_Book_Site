<?php 

	$expert_makeup_artist_custom_style = '';

	// Logo Size
	$expert_makeup_artist_logo_top_padding = get_theme_mod('expert_makeup_artist_logo_top_padding');
	$expert_makeup_artist_logo_bottom_padding = get_theme_mod('expert_makeup_artist_logo_bottom_padding');
	$expert_makeup_artist_logo_left_padding = get_theme_mod('expert_makeup_artist_logo_left_padding');
	$expert_makeup_artist_logo_right_padding = get_theme_mod('expert_makeup_artist_logo_right_padding');

	if( $expert_makeup_artist_logo_top_padding != '' || $expert_makeup_artist_logo_bottom_padding != '' || $expert_makeup_artist_logo_left_padding != '' || $expert_makeup_artist_logo_right_padding != ''){
		$expert_makeup_artist_custom_style .=' .logo {';
			$expert_makeup_artist_custom_style .=' margin-top: '.esc_attr($expert_makeup_artist_logo_top_padding).'px; margin-bottom: '.esc_attr($expert_makeup_artist_logo_bottom_padding).'px; margin-left: '.esc_attr($expert_makeup_artist_logo_left_padding).'px; margin-right: '.esc_attr($expert_makeup_artist_logo_right_padding).'px;';
		$expert_makeup_artist_custom_style .=' }';
	}

	// Header Image
	$header_image_url = expert_makeup_artist_banner_image( $image_url = '' );
	if( $header_image_url != ''){
		$expert_makeup_artist_custom_style .=' #inner-pages-header {';
			$expert_makeup_artist_custom_style .=' background-image: url('. esc_url( $header_image_url ).'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;';
		$expert_makeup_artist_custom_style .=' }';
		$expert_makeup_artist_custom_style .=' .header-overlay {';
			$expert_makeup_artist_custom_style .=' position: absolute; 	width: 100%; height: 100%; 	top: 0; left: 0; background: #000; opacity: 0.3;';
		$expert_makeup_artist_custom_style .=' }';
	} else {
		$expert_makeup_artist_custom_style .=' #inner-pages-header {';
			$expert_makeup_artist_custom_style .=' background:linear-gradient(0deg,#ccc,#0a0607 80%) no-repeat; ';
		$expert_makeup_artist_custom_style .=' }';
	}

	$expert_makeup_artist_slider_hide_show = get_theme_mod('expert_makeup_artist_slider_hide_show',false);
	if( $expert_makeup_artist_slider_hide_show == true){
		$expert_makeup_artist_custom_style .=' .page-template-custom-home-page #inner-pages-header {';
			$expert_makeup_artist_custom_style .=' display:none;';
		$expert_makeup_artist_custom_style .=' }';
	}