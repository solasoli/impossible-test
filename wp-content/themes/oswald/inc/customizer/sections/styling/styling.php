<?php
/**
 * Styling Section
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}	

	
	$theme_custom_color = array();
	$theme_custom_color[] = array(
	    'slug'=> OSWALD_THEME_SETTINGS . '[theme-custom-color]', 
	    'default' => oswald_option('theme-custom-color'),
	    'label' => esc_html__('Theme Color 1', 'oswald' )
	);
	 
	$theme_custom_color[] = array(
	    'slug'=> OSWALD_THEME_SETTINGS . '[theme-custom-color2]', 
	    'default' => oswald_option('theme-custom-color2'),
	    'label' => esc_html__('Theme Color 2', 'oswald' )
	);
	 
	$theme_custom_color[] = array(
	    'slug'=> OSWALD_THEME_SETTINGS . '[theme-adding-text-color]', 
	    'default' => oswald_option('theme-adding-text-color'),
	    'label' => esc_html__('Adding text color', 'oswald' )
	);

	// add the settings and controls for each color
	foreach( $theme_custom_color as $color ) {
	 
	    // SETTINGS
	    $wp_customize->add_setting(
	        $color['slug'], array(
	            'default' => $color['default'],
	            'type' => 'option', 
	            'capability' => 
	            'edit_theme_options',
	            'sanitize_callback' => 'sanitize_hex_color',
	        )
	    );
	    // CONTROLS
	    $wp_customize->add_control(
	        new WP_Customize_Color_Control(
	            $wp_customize,
	            $color['slug'], 
	            array('label' => $color['label'], 
	            'section' => 'colors',
	            'priority' => 20,
	            'settings' => $color['slug'])
	        )
	    );
	}