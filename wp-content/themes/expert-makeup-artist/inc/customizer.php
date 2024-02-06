<?php
/**
 * Expert Makeup Artist: Customizer
 *
 * @subpackage Expert Makeup Artist
 * @since 1.0
 */

use WPTRT\Customize\Section\Expert_Makeup_Artist_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Expert_Makeup_Artist_Button::class );

	$manager->add_section(
		new Expert_Makeup_Artist_Button( $manager, 'expert_makeup_artist_pro', [
			'title' => __( 'Makeup Artist Pro', 'expert-makeup-artist' ),
			'priority' => 0,
			'button_text' => __( 'Go Pro', 'expert-makeup-artist' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/makeup-wordpress-theme/', 'expert-makeup-artist')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'expert-makeup-artist-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'expert-makeup-artist-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function expert_makeup_artist_customize_register( $wp_customize ) {

	$wp_customize->add_setting('expert_makeup_artist_logo_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('expert_makeup_artist_logo_padding',array(
		'label' => __('Logo Margin','expert-makeup-artist'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('expert_makeup_artist_logo_top_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'expert_makeup_artist_sanitize_float'
	));
	$wp_customize->add_control('expert_makeup_artist_logo_top_padding',array(
		'type' => 'number',
		'description' => __('Top','expert-makeup-artist'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('expert_makeup_artist_logo_bottom_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'expert_makeup_artist_sanitize_float'
	));
	$wp_customize->add_control('expert_makeup_artist_logo_bottom_padding',array(
		'type' => 'number',
		'description' => __('Bottom','expert-makeup-artist'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('expert_makeup_artist_logo_left_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'expert_makeup_artist_sanitize_float'
	));
	$wp_customize->add_control('expert_makeup_artist_logo_left_padding',array(
		'type' => 'number',
		'description' => __('Left','expert-makeup-artist'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('expert_makeup_artist_logo_right_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'expert_makeup_artist_sanitize_float'
 	));
 	$wp_customize->add_control('expert_makeup_artist_logo_right_padding',array(
		'type' => 'number',
		'description' => __('Right','expert-makeup-artist'),
		'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('expert_makeup_artist_show_site_title',array(
		'default' => true,
		'sanitize_callback'	=> 'expert_makeup_artist_sanitize_checkbox'
	));
	$wp_customize->add_control('expert_makeup_artist_show_site_title',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Title','expert-makeup-artist'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('expert_makeup_artist_show_tagline',array(
		'default' => true,
		'sanitize_callback'	=> 'expert_makeup_artist_sanitize_checkbox'
	));
	$wp_customize->add_control('expert_makeup_artist_show_tagline',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Tagline','expert-makeup-artist'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_panel( 'expert_makeup_artist_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'expert-makeup-artist' ),
		'description' => __( 'Description of what this panel does.', 'expert-makeup-artist' ),
	) );

	$wp_customize->add_section( 'expert_makeup_artist_theme_options_section', array(
    	'title'      => __( 'General Settings', 'expert-makeup-artist' ),
		'priority'   => 30,
		'panel' => 'expert_makeup_artist_panel_id'
	) );

	$wp_customize->add_setting('expert_makeup_artist_theme_options',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'expert_makeup_artist_sanitize_choices'
	));
	$wp_customize->add_control('expert_makeup_artist_theme_options',array(
		'type' => 'select',
		'label' => __('Blog Page Sidebar Layout','expert-makeup-artist'),
		'section' => 'expert_makeup_artist_theme_options_section',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','expert-makeup-artist'),
		   'Right Sidebar' => __('Right Sidebar','expert-makeup-artist'),
		   'One Column' => __('One Column','expert-makeup-artist'),
		   'Grid Layout' => __('Grid Layout','expert-makeup-artist')
		),
	));

	$wp_customize->add_setting('expert_makeup_artist_single_post_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'expert_makeup_artist_sanitize_choices'
	));
	$wp_customize->add_control('expert_makeup_artist_single_post_sidebar',array(
        'type' => 'select',
        'label' => __('Single Post Sidebar Layout','expert-makeup-artist'),
        'section' => 'expert_makeup_artist_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','expert-makeup-artist'),
            'Right Sidebar' => __('Right Sidebar','expert-makeup-artist'),
            'One Column' => __('One Column','expert-makeup-artist')
        ),
	));

	$wp_customize->add_setting('expert_makeup_artist_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'expert_makeup_artist_sanitize_choices'
	));
	$wp_customize->add_control('expert_makeup_artist_page_sidebar',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','expert-makeup-artist'),
        'section' => 'expert_makeup_artist_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','expert-makeup-artist'),
            'Right Sidebar' => __('Right Sidebar','expert-makeup-artist'),
            'One Column' => __('One Column','expert-makeup-artist')
        ),
	));

	$wp_customize->add_setting('expert_makeup_artist_archive_page_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'expert_makeup_artist_sanitize_choices'
	));
	$wp_customize->add_control('expert_makeup_artist_archive_page_sidebar',array(
        'type' => 'select',
        'label' => __('Archive & Search Page Sidebar Layout','expert-makeup-artist'),
        'section' => 'expert_makeup_artist_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','expert-makeup-artist'),
            'Right Sidebar' => __('Right Sidebar','expert-makeup-artist'),
            'One Column' => __('One Column','expert-makeup-artist'),
            'Grid Layout' => __('Grid Layout','expert-makeup-artist')
        ),
	));

	//Header
	$wp_customize->add_section( 'expert_makeup_artist_header_section' , array(
    	'title'    => __( 'Header', 'expert-makeup-artist' ),
		'priority' => null,
		'panel' => 'expert_makeup_artist_panel_id'
	) );

	$wp_customize->add_setting('expert_makeup_artist_topbar_text',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('expert_makeup_artist_topbar_text',array(
	   	'type' => 'text',
	   	'label' => __('Add Topbar Text','expert-makeup-artist'),
	   	'section' => 'expert_makeup_artist_header_section',
	));

	$wp_customize->add_setting('expert_makeup_artist_facebook_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('expert_makeup_artist_facebook_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Facebook URL','expert-makeup-artist'),
	   	'section' => 'expert_makeup_artist_header_section',
	));

	$wp_customize->add_setting('expert_makeup_artist_instagram_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('expert_makeup_artist_instagram_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Instagram URL','expert-makeup-artist'),
	   	'section' => 'expert_makeup_artist_header_section',
	));

	$wp_customize->add_setting('expert_makeup_artist_twitter_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('expert_makeup_artist_twitter_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Twitter URL','expert-makeup-artist'),
	   	'section' => 'expert_makeup_artist_header_section',
	));

	$wp_customize->add_setting('expert_makeup_artist_linkedin_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('expert_makeup_artist_linkedin_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Linkedin URL','expert-makeup-artist'),
	   	'section' => 'expert_makeup_artist_header_section',
	));

	//home page slider
	$wp_customize->add_section( 'expert_makeup_artist_slider_section' , array(
    	'title'    => __( 'Slider Settings', 'expert-makeup-artist' ),
		'priority' => null,
		'panel' => 'expert_makeup_artist_panel_id'
	) );

	$wp_customize->add_setting('expert_makeup_artist_slider_hide_show',array(
    	'default' => false,
    	'sanitize_callback'	=> 'expert_makeup_artist_sanitize_checkbox'
	));
	$wp_customize->add_control('expert_makeup_artist_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider','expert-makeup-artist'),
	   	'section' => 'expert_makeup_artist_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'expert_makeup_artist_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'expert_makeup_artist_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'expert_makeup_artist_slider' . $count, array(
			'label' => __('Select Slider Image Page', 'expert-makeup-artist' ),
			'description'=> __('Image size (1400px x 600px)','expert-makeup-artist'),
			'section' => 'expert_makeup_artist_slider_section',
			'type' => 'dropdown-pages'
		));
	}

	//About Section
	$wp_customize->add_section('expert_makeup_artist_about_section',array(
		'title'	=> __('About Section','expert-makeup-artist'),
		'description'=> __('This section will appear below the slider.','expert-makeup-artist'),
		'panel' => 'expert_makeup_artist_panel_id',
	));

    $wp_customize->add_setting('expert_makeup_artist_section_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('expert_makeup_artist_section_title',array(
		'label'	=> __('Section Title','expert-makeup-artist'),
		'section' => 'expert_makeup_artist_about_section',
		'type' => 'text'
	));

    $wp_customize->add_setting( 'expert_makeup_artist_about_page', array(
		'default'           => '',
		'sanitize_callback' => 'expert_makeup_artist_sanitize_dropdown_pages'
	));
	$wp_customize->add_control( 'expert_makeup_artist_about_page', array(
		'label' => __('Select About Page', 'expert-makeup-artist' ),
		'section' => 'expert_makeup_artist_about_section',
		'type' => 'dropdown-pages'
	));

	//Footer
    $wp_customize->add_section( 'expert_makeup_artist_footer', array(
    	'title'  => __( 'Footer Text', 'expert-makeup-artist' ),
		'priority' => null,
		'panel' => 'expert_makeup_artist_panel_id'
	) );

	$wp_customize->add_setting('expert_makeup_artist_show_back_totop',array(
       'default' => true,
       'sanitize_callback'	=> 'expert_makeup_artist_sanitize_checkbox'
    ));
    $wp_customize->add_control('expert_makeup_artist_show_back_totop',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Back to Top','expert-makeup-artist'),
       'section' => 'expert_makeup_artist_footer'
    ));

    $wp_customize->add_setting('expert_makeup_artist_footer_copy',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('expert_makeup_artist_footer_copy',array(
		'label'	=> __('Footer Text','expert-makeup-artist'),
		'section' => 'expert_makeup_artist_footer',
		'setting' => 'expert_makeup_artist_footer_copy',
		'type' => 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'expert_makeup_artist_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'expert_makeup_artist_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'expert_makeup_artist_customize_register' );

function expert_makeup_artist_customize_partial_blogname() {
	bloginfo( 'name' );
}

function expert_makeup_artist_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function expert_makeup_artist_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function expert_makeup_artist_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}