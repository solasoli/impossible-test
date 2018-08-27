<?php
/**
 * General Customizer Section
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	/**
	 * Option: Boxed Style
	 */
	$wp_customize->add_setting( OSWALD_THEME_SETTINGS . '[boxed_style]' , array(
        'default'   => '',
        'transport' => 'refresh',
        'type'              => 'option',
        'sanitize_callback' => 'oswald_sanitize_checkbox',
    ) );

    $wp_customize->add_control( OSWALD_THEME_SETTINGS . '[boxed_style]', array(
        'label'    => esc_html__( 'Boxed Styles', 'oswald' ),
        'section'  => 'general-section',
        'type'     => 'checkbox',
        'priority' => 10,
    ) );


    /**
	 * Option: back to top
	 */
	$wp_customize->add_setting( OSWALD_THEME_SETTINGS . '[back_to_top]' , array(
        'default'   => '',
        'transport' => 'refresh',
        'type'              => 'option',
        'sanitize_callback' => 'oswald_sanitize_checkbox',
    ) );

    $wp_customize->add_control( OSWALD_THEME_SETTINGS . '[back_to_top]', array(
        'label'    => esc_html__( 'Back to Top', 'oswald' ),
        'section'  => 'general-section',
        'type'     => 'checkbox',
        'priority' => 10,
    ) );



    /**
	 * Option: Minify Theme Script
	 */
	$wp_customize->add_setting( OSWALD_THEME_SETTINGS . '[minify_script]' , array(
        'default'   => '1',
        'transport' => 'refresh',
        'type'              => 'option',
        'sanitize_callback' => 'oswald_sanitize_checkbox',
    ) );

    $wp_customize->add_control( OSWALD_THEME_SETTINGS . '[minify_script]', array(
        'label'    => esc_html__( 'Minify Theme Script', 'oswald' ),
        'section'  => 'general-section',
        'type'     => 'checkbox',
        'priority' => 10,
    ) );


    /**
	 * Option: Minify Theme Script
	 */
	$wp_customize->add_setting( OSWALD_THEME_SETTINGS . '[minify_css]' , array(
        'default'   => '1',
        'transport' => 'refresh',
        'type'              => 'option',
        'sanitize_callback' => 'oswald_sanitize_checkbox',
    ) );

    $wp_customize->add_control( OSWALD_THEME_SETTINGS . '[minify_css]', array(
        'label'    => esc_html__( 'Minify Theme Styles', 'oswald' ),
        'section'  => 'general-section',
        'type'     => 'checkbox',
        'priority' => 10,
    ) );



    // Limit for logo
    $wp_customize->add_setting( OSWALD_THEME_SETTINGS . '[logo_height_custom]' , array(
        'default'   => '',
        'transport' => 'refresh',
        'type'              => 'option',
        'sanitize_callback' => 'oswald_sanitize_checkbox',
    ) );

    $wp_customize->add_control( OSWALD_THEME_SETTINGS . '[logo_height_custom]', array(
        'label'    => esc_html__( 'Enable Logo Height', 'oswald' ),
        'section'  => 'title_tagline',
        'type'     => 'checkbox',
        'priority' => 10,
    ) );


    $wp_customize->add_setting( OSWALD_THEME_SETTINGS . '[logo_height][height]' , array(
        'default'   => 21,
        'transport' => 'refresh',
        'type'              => 'option',
        'sanitize_callback' => 'oswald_sanitize_float',
    ) );

    $wp_customize->add_control( OSWALD_THEME_SETTINGS . '[logo_height][height]', array(
        'label'    => esc_html__( 'Set Logo Height', 'oswald' ),
        'section'  => 'title_tagline',
        'type'     => 'number',
        'priority' => 10,
        'input_attrs' => array(
            'min' => '1', 'step' => '1', 'max' => '400',
        ),
    ) );