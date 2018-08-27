<?php
/**
 * Header Customizer Section
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	$wpd_header_presets = oswald_header_presets();


	/**
	 * Option: Header Preset
	 */
	$wp_customize->add_setting(
		OSWALD_THEME_SETTINGS . '[wpdaddy_header_builder_id]', array(
			'default'           => json_decode($wpd_header_presets['header_lite_preset_1'],true),
			'type'              => 'option',
			'sanitize_callback' => 'oswald_sanitize_presets',
		)
	);

	$wp_customize->add_control(
		new Oswald_Control_Preset(
			$wp_customize, OSWALD_THEME_SETTINGS . '[wpdaddy_header_builder_id]', array(
				'section'  => 'header-section',
				'default'   => 'header-layout-1',
				'priority' => 5,
				'label'    => esc_html__( 'Header', 'oswald' ),
				'type'     => 'oswald-preset',
				'choices'  => array(
					'header-layout-1' => array(
						'label' => esc_html__( 'Logo Left', 'oswald' ),
						'path'  => OSWALD_THEME_URI . '/assets/images/logo-left.png',
						'options'  => $wpd_header_presets['header_lite_preset_1'],
					),
					'header-layout-2' => array(
						'label' => esc_html__( 'Logo Center', 'oswald' ),
						'path'  => OSWALD_THEME_URI . '/assets/images/logo-center.png',
						'options'  => $wpd_header_presets['header_lite_preset_2'],
					),
					'header-layout-3' => array(
						'label' => esc_html__( 'Logo Right', 'oswald' ),
						'path'  => OSWALD_THEME_URI . '/assets/images/logo-right.png',
						'options'  => $wpd_header_presets['header_lite_preset_3'],
					),
				),
			)
		)
	);


	/**
	 * Option: Show Search
	 */
	$wp_customize->add_setting( OSWALD_THEME_SETTINGS . '[show_search]' , array(
        'default'   => '',
        'transport' => 'refresh',
        'type'              => 'option',
        'sanitize_callback' => 'oswald_sanitize_checkbox',
    ) );

    $wp_customize->add_control( OSWALD_THEME_SETTINGS . '[show_search]', array(
        'label'    => esc_html__( 'Show Search', 'oswald' ),
        'section'  => 'header-section',
        'type'     => 'checkbox',
        'priority' => 10,
    ) );

    /**
	 * Option: Show Custom Text
	 */
	$wp_customize->add_setting( OSWALD_THEME_SETTINGS . '[show_custom_text]' , array(
        'default'   => '',
        'transport' => 'refresh',
        'type'              => 'option',
        'sanitize_callback' => 'oswald_sanitize_checkbox',
    ) );

    $wp_customize->add_control( OSWALD_THEME_SETTINGS . '[show_custom_text]', array(
        'label'    => esc_html__( 'Show Custom Text / HTML', 'oswald' ),
        'section'  => 'header-section',
        'type'     => 'checkbox',
        'priority' => 10,
    ) );


    /**
	 * Option: Custom header text
	 */
	$wp_customize->add_setting( OSWALD_THEME_SETTINGS . '[text1_editor]',
		array(
			'default' => oswald_option('text1_editor'),
			'transport' => 'refresh',
			'type'              => 'option',
			'sanitize_callback' => 'wp_kses_post'
		)
	);
	$wp_customize->add_control( new Oswald_Control_TinyMCE( $wp_customize, OSWALD_THEME_SETTINGS . '[text1_editor]',
		array(
			'label' => esc_html__( 'Custom Text / HTML', 'oswald' ),
			'section' => 'header-section',
			'input_attrs' => array(
				'toolbar1' => 	'bold,italic,alignleft,aligncenter,alignright,link,unlink',
				'toolbar2' => 	'SocialIcon,LinkStyling,Columns,forecolor,undo,redo',
			)
		)
	) );

	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		/**
		 * Option: Show Cart
		 */
		$wp_customize->add_setting( OSWALD_THEME_SETTINGS . '[show_cart]' , array(
	        'default'   => '',
	        'transport' => 'refresh',
	        'type'              => 'option',
	        'sanitize_callback' => 'oswald_sanitize_checkbox',
	    ) );

	    $wp_customize->add_control( OSWALD_THEME_SETTINGS . '[show_cart]', array(
	        'label'    => esc_html__( 'Show Cart', 'oswald' ),
	        'section'  => 'header-section',
	        'type'     => 'checkbox',
	        'priority' => 10,
	    ) );
	}


	/**
	 * Option: Boxed Style
	 */
	$wp_customize->add_setting( OSWALD_THEME_SETTINGS . '[header_full_width]' , array(
        'default'   => '',
        'transport' => 'refresh',
        'type'              => 'option',
        'sanitize_callback' => 'oswald_sanitize_checkbox',
    ) );

    $wp_customize->add_control( OSWALD_THEME_SETTINGS . '[header_full_width]', array(
        'label'    => esc_html__( 'Full Width Header', 'oswald' ),
        'section'  => 'header-section',
        'type'     => 'checkbox',
        'priority' => 10,
    ) );