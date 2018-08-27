<?php
/**
 * Typography Customizer Section
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}      


    $wp_customize->add_setting( OSWALD_THEME_SETTINGS . '[menu-font]',
       array(
          'default' => json_encode(
             array(
                'font-family' => 'Montserrat',
                'font-weight' => '500',
                'subsets' => 'latin',
                'text-transform' => 'uppercase',
                'font-size' => '12px',
                'line-height' => '28px',
             )
          ),
          'type'              => 'option',
          'sanitize_callback' => 'oswald_google_font_sanitization'
       )
    );
     
    $wp_customize->add_control( new Oswald_Google_Font_Select_Custom_Control( $wp_customize, OSWALD_THEME_SETTINGS . '[menu-font]',
       array(
          'label' => esc_html__( 'Menu Font', 'oswald' ),
          'section'  => 'typography-section',
       )
    ) );


    /* Main Font */

    $wp_customize->add_setting( OSWALD_THEME_SETTINGS . '[main-font]',
       array(
          'default' => json_encode(
             array(
                'font-family' => 'Open Sans',
                'font-weight' => '400',
                'subsets' => 'latin',
                'font-size' => '14px',
                'line-height' => '24px',
                'color' => '#3a405b',
                'all-style' => '["100","200","300","400","500","600","700","800","900","100italic","200italic","300italic","400italic","500italic","600italic","700italic","800italic","900italic"]',
             )
          ),
          'type'              => 'option',
          'sanitize_callback' => 'oswald_google_font_sanitization'
       )
    );
     
    $wp_customize->add_control( new Oswald_Google_Font_Select_Custom_Control( $wp_customize, OSWALD_THEME_SETTINGS . '[main-font]',
       array(
          'label' => esc_html__( 'Main Font', 'oswald' ),
          'section'  => 'typography-section',
       )
    ) );


    /* Headers Font (H1 - H6) */

    $wp_customize->add_setting( OSWALD_THEME_SETTINGS . '[header-font]',
       array(
          'default' => json_encode(
             array(
                'font-family' => 'Montserrat',
                'font-weight' => '900',
                'subsets' => 'latin',
                'color' => '#222328',
                'all-style' => '["300","400","500","600","700","800","900","300italic","400italic","500italic","600italic","700italic"]',
             )
          ),
          'type'              => 'option',
          'sanitize_callback' => 'oswald_google_font_sanitization'
       )
    );
     
    $wp_customize->add_control( new Oswald_Google_Font_Select_Custom_Control( $wp_customize, OSWALD_THEME_SETTINGS . '[header-font]',
       array(
          'label' => esc_html__( 'Headers Font (H1 - H6)', 'oswald' ),
          'section'  => 'typography-section',
       )
    ) );


    /*H1*/

    $wp_customize->add_setting( OSWALD_THEME_SETTINGS . '[h1-font]',
       array(
          'default' => json_encode(
             array(
                'font-family' => 'Montserrat',
                'font-weight' => '900',
                'subsets' => 'latin',
                'font-size' => '36px',
                'line-height' => '43px',
             )
          ),
          'type'              => 'option',
          'sanitize_callback' => 'oswald_google_font_sanitization'
       )
    );
     
    $wp_customize->add_control( new Oswald_Google_Font_Select_Custom_Control( $wp_customize, OSWALD_THEME_SETTINGS . '[h1-font]',
       array(
          'label' => esc_html__( 'H1', 'oswald' ),
          'section'  => 'typography-section',
       )
    ) );


    /* H2 */

    $wp_customize->add_setting( OSWALD_THEME_SETTINGS . '[h2-font]',
       array(
          'default' => json_encode(
             array(
                'font-family' => 'Montserrat',
                'font-weight' => '900',
                'subsets' => 'latin',
                'font-size' => '30px',
                'line-height' => '40px',
             )
          ),
          'type'              => 'option',
          'sanitize_callback' => 'oswald_google_font_sanitization'
       )
    );
     
    $wp_customize->add_control( new Oswald_Google_Font_Select_Custom_Control( $wp_customize, OSWALD_THEME_SETTINGS . '[h2-font]',
       array(
          'label' => esc_html__( 'H2', 'oswald' ),
          'section'  => 'typography-section',
       )
    ) );



    /* H3 */

    $wp_customize->add_setting( OSWALD_THEME_SETTINGS . '[h3-font]',
       array(
          'default' => json_encode(
             array(
                'font-family' => '',
                'font-weight' => '',
                'font-size' => '24px',
                'line-height' => '36px',
             )
          ),
          'type'              => 'option',
          'sanitize_callback' => 'oswald_google_font_sanitization'
       )
    );
     
    $wp_customize->add_control( new Oswald_Google_Font_Select_Custom_Control( $wp_customize, OSWALD_THEME_SETTINGS . '[h3-font]',
       array(
          'label' => esc_html__( 'H3', 'oswald' ),
          'section'  => 'typography-section',
       )
    ) );


    /* H4 */

    $wp_customize->add_setting( OSWALD_THEME_SETTINGS . '[h4-font]',
       array(
          'default' => json_encode(
             array(
                'font-family' => '',
                'font-weight' => '',
                'font-size' => '20px',
                'line-height' => '33px',
             )
          ),
          'type'              => 'option',
          'sanitize_callback' => 'oswald_google_font_sanitization'
       )
    );
     
    $wp_customize->add_control( new Oswald_Google_Font_Select_Custom_Control( $wp_customize, OSWALD_THEME_SETTINGS . '[h4-font]',
       array(
          'label' => esc_html__( 'H4', 'oswald' ),
          'section'  => 'typography-section',
       )
    ) );


    /* H5 */

    $wp_customize->add_setting( OSWALD_THEME_SETTINGS . '[h5-font]',
       array(
          'default' => json_encode(
             array(
                'font-family' => '',
                'font-weight' => '',
                'font-size' => '16px',
                'line-height' => '28px',
             )
          ),
          'type'              => 'option',
          'sanitize_callback' => 'oswald_google_font_sanitization'
       )
    );
     
    $wp_customize->add_control( new Oswald_Google_Font_Select_Custom_Control( $wp_customize, OSWALD_THEME_SETTINGS . '[h5-font]',
       array(
          'label' => esc_html__( 'H5', 'oswald' ),
          'section'  => 'typography-section',
       )
    ) );


    /* H6 */

    $wp_customize->add_setting( OSWALD_THEME_SETTINGS . '[h6-font]',
       array(
          'default' => json_encode(
             array(
                'font-family' => '',
                'font-weight' => '',
                'font-size' => '14px',
                'line-height' => '24px',
             )
          ),
          'type'              => 'option',
          'sanitize_callback' => 'oswald_google_font_sanitization'
       )
    );
     
    $wp_customize->add_control( new Oswald_Google_Font_Select_Custom_Control( $wp_customize, OSWALD_THEME_SETTINGS . '[h6-font]',
       array(
          'label' => esc_html__( 'H6', 'oswald' ),
          'section'  => 'typography-section',
       )
    ) );


    /* Secondary Font */

    $wp_customize->add_setting( OSWALD_THEME_SETTINGS . '[secondary-font]',
       array(
          'default' => json_encode(
             array(
                'font-family' => 'Crimson Text',
                'font-weight' => '400italic',
                'subsets' => 'latin',
             )
          ),
          'type'              => 'option',
          'sanitize_callback' => 'oswald_google_font_sanitization'
       )
    );
     
    $wp_customize->add_control( new Oswald_Google_Font_Select_Custom_Control( $wp_customize, OSWALD_THEME_SETTINGS . '[secondary-font]',
       array(
          'label' => esc_html__( 'Secondary Font', 'oswald' ),
          'section'  => 'typography-section',
       )
    ) );