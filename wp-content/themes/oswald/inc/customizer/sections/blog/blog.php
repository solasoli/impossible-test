<?php
/**
 * Blog Customizer Section
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


	/**
	 * Option: Show Comments
	 */
	$wp_customize->add_setting( OSWALD_THEME_SETTINGS . '[blog_post_comment]' , array(
        'default'   => true,
        'transport' => 'refresh',
        'type'              => 'option',
        'sanitize_callback' => 'oswald_sanitize_checkbox',
    ) );

    $wp_customize->add_control( OSWALD_THEME_SETTINGS . '[blog_post_comment]', array(
        'label'    => esc_html__( 'Show Comments Info', 'oswald' ),
        'section'  => 'blog-section',
        'type'     => 'checkbox',
        'priority' => 10,
    ) );


    /**
	 * Option: Show Date
	 */
	$wp_customize->add_setting( OSWALD_THEME_SETTINGS . '[blog_post_date]' , array(
        'default'   => true,
        'transport' => 'refresh',
        'type'              => 'option',
        'sanitize_callback' => 'oswald_sanitize_checkbox',
    ) );

    $wp_customize->add_control( OSWALD_THEME_SETTINGS . '[blog_post_date]', array(
        'label'    => esc_html__( 'Show Date Info', 'oswald' ),
        'section'  => 'blog-section',
        'type'     => 'checkbox',
        'priority' => 10,
    ) );


    /**
	 * Option: Show Author
	 */
	$wp_customize->add_setting( OSWALD_THEME_SETTINGS . '[blog_post_author]' , array(
        'default'   => true,
        'transport' => 'refresh',
        'type'              => 'option',
        'sanitize_callback' => 'oswald_sanitize_checkbox',
    ) );

    $wp_customize->add_control( OSWALD_THEME_SETTINGS . '[blog_post_author]', array(
        'label'    => esc_html__( 'Show Author Info', 'oswald' ),
        'section'  => 'blog-section',
        'type'     => 'checkbox',
        'priority' => 10,
    ) );