<?php
/**
 * Sidebar Customizer Section
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}      

    $sidebars_choices = array();
    foreach ($GLOBALS['wp_registered_sidebars'] as $sidebar) {
        $sidebars_choices[$sidebar['id']] = ucwords( $sidebar['name'] );
    }   
    

    /**
     * Option: Page Sidebar
     */
    $wp_customize->add_setting(
        OSWALD_THEME_SETTINGS . '[page_sidebar_layout]', array(
            'default'           => 'right',
            'type'              => 'option',
            'sanitize_callback' => 'oswald_sanitize_choices',
        )
    );

    $wp_customize->add_control(
        new Oswald_Control_Radio_Image(
            $wp_customize, OSWALD_THEME_SETTINGS . '[page_sidebar_layout]', array(
                'section'  => 'sidebar-section',
                'default'   => 'right',
                'priority' => 5,
                'label'    => esc_html__( 'Page Sidebar Layout', 'oswald' ),
                'type'     => 'oswald-radio-image',
                'choices'  => array(
                    'none' => array(
                        'label' => esc_html__( 'None', 'oswald' ),
                        'path'  => OSWALD_THEME_URI . '/assets/images/col-full.png',
                    ),
                    'left' => array(
                        'label' => esc_html__( 'Left', 'oswald' ),
                        'path'  => OSWALD_THEME_URI . '/assets/images/col-left.png',
                    ),
                    'right' => array(
                        'label' => esc_html__( 'Right', 'oswald' ),
                        'path'  => OSWALD_THEME_URI . '/assets/images/col-right.png',
                    ),
                ),
            )
        )
    );    

    /**
     * Option: Page Sidebar Select
     */
    $wp_customize->add_setting( OSWALD_THEME_SETTINGS . '[page_sidebar_def]', array(
        'type'              => 'option',
        'sanitize_callback' => 'oswald_sanitize_choices',
        'default' => 'sidebar_main-sidebar',
    ) );

    $wp_customize->add_control( OSWALD_THEME_SETTINGS . '[page_sidebar_def]', array(
        'type' => 'select',
        'priority' => 6,
        'section' => 'sidebar-section',
        'label' => esc_html__( 'Page Sidebar', 'oswald' ),
        'choices' => $sidebars_choices,
    ) );

    
    /**
     * Option: Blog Single Sidebar Layout
     */
    $wp_customize->add_setting(
        OSWALD_THEME_SETTINGS . '[blog_single_sidebar_layout]', array(
            'default'           => 'right',
            'type'              => 'option',
            'sanitize_callback' => 'oswald_sanitize_choices',
        )
    );

    $wp_customize->add_control(
        new Oswald_Control_Radio_Image(
            $wp_customize, OSWALD_THEME_SETTINGS . '[blog_single_sidebar_layout]', array(
                'section'  => 'sidebar-section',
                'default'   => 'right',
                'priority' => 7,
                'label'    => esc_html__( 'Blog Single Sidebar Layout', 'oswald' ),
                'type'     => 'oswald-radio-image',
                'choices'  => array(
                    'none' => array(
                        'label' => esc_html__( 'None', 'oswald' ),
                        'path'  => OSWALD_THEME_URI . '/assets/images/col-full.png',
                    ),
                    'left' => array(
                        'label' => esc_html__( 'Left', 'oswald' ),
                        'path'  => OSWALD_THEME_URI . '/assets/images/col-left.png',
                    ),
                    'right' => array(
                        'label' => esc_html__( 'Right', 'oswald' ),
                        'path'  => OSWALD_THEME_URI . '/assets/images/col-right.png',
                    ),
                ),
            )
        )
    );

    /**
     * Option: Blog Single Sidebar Select
     */
    $wp_customize->add_setting( OSWALD_THEME_SETTINGS . '[blog_single_sidebar_def]', array(
        'type'              => 'option',
        'sanitize_callback' => 'oswald_sanitize_choices',
        'default' => 'sidebar_main-sidebar',
    ) );

    $wp_customize->add_control( OSWALD_THEME_SETTINGS . '[blog_single_sidebar_def]', array(
        'type' => 'select',
        'priority' => 8,
        'section' => 'sidebar-section',
        'label' => esc_html__( 'Blog Single Sidebar' , 'oswald' ),
        'choices' => $sidebars_choices,
    ) );