<?php
/**
 * Register customizer panels & sections
 */


	/**
	 * General Section
	 */
    $wp_customize->add_section(
		new Oswald_WP_Customize_Section(
			$wp_customize, 'general-section',
				array(
					'title'    => __( 'General', 'oswald' ),
        			'priority' => 30
				)
		)
	);  

    /**
	 * Header Section
	 */
	$wp_customize->add_section(
		new Oswald_WP_Customize_Section(
			$wp_customize, 'header-section',
			array(
				'title'    => __( 'Header', 'oswald' ),
    		'priority' => 40
			)
		)
	); 

	/**
	 * Blog Section
	 */
	$wp_customize->add_section(
		new Oswald_WP_Customize_Section(
			$wp_customize, 'blog-section',
			array(
				'title'    => __( 'Blog', 'oswald' ),
    				'priority' => 50
			)
		)
	); 

	/**
	 * Sidebar Section
	 */
	$wp_customize->add_section(
		new Oswald_WP_Customize_Section(
			$wp_customize, 'sidebar-section',
			array(
				'title'    => __( 'Sidebar', 'oswald' ),
    				'priority' => 60
			)
		)
	); 

	/**
	 * Styling Panel
	 */
	$wp_customize->add_panel(
		new Oswald_WP_Customize_Panel(
			$wp_customize, 'oswald-styling-section',
			array(
				'title'    => __( 'Styling Options', 'oswald' ),
    				'priority' => 70
			)
		)
	); 

	$wp_customize->get_section( 'colors' )->panel           = 'oswald-styling-section';
	$wp_customize->get_section( 'background_image' )->panel = 'oswald-styling-section';

	/**
	 * Typography Section
	 */
	if (  !class_exists( 'wpdaddy_core' ) ) {
		$wp_customize->add_section(
			new Oswald_WP_Customize_Section(
				$wp_customize, 'typography-section',
				array(
					'title'    => __( 'Typography', 'oswald' ),
	    				'priority' => 80
				)
			)
		);
	}

	/**
	 * Homepage Panel
	 */
	$wp_customize->add_panel(
		new Oswald_WP_Customize_Panel(
			$wp_customize, 'oswald-homepage_content-panel',
			array(
				'title'    => __( 'Custom Homepage Content', 'oswald' ),
    				'priority' => 130
			)
		)
	); 

	/* About Us section */
	$wp_customize->add_section(
		new Oswald_WP_Customize_Section(
			$wp_customize, 'homepage_header-section',
			array(
				'title'    => __( 'Homepage Header section', 'oswald' ),
    				'priority' => 10,
    				'panel'     => 'oswald-homepage_content-panel',
			)
		)
	);

	/* About Us section */
	$wp_customize->add_section(
		new Oswald_WP_Customize_Section(
			$wp_customize, 'about_us-section',
			array(
				'title'    => __( 'About us section', 'oswald' ),
    				'priority' => 10,
    				'panel'     => 'oswald-homepage_content-panel',
			)
		)
	);

	/* Services section */
	$wp_customize->add_section(
		new Oswald_WP_Customize_Section(
			$wp_customize, 'services-section',
			array(
				'title'    => __( 'Services section', 'oswald' ),
    				'priority' => 20,
    				'panel'     => 'oswald-homepage_content-panel',
			)
		)
	);

	/* call to action section */
	$wp_customize->add_section(
		new Oswald_WP_Customize_Section(
			$wp_customize, 'call_to_action-section',
			array(
				'title'    => __( 'Call to Action section', 'oswald' ),
    				'priority' => 20,
    				'panel'     => 'oswald-homepage_content-panel',
			)
		)
	);

	/* team section */
	$wp_customize->add_section(
		new Oswald_WP_Customize_Section(
			$wp_customize, 'team-section',
			array(
				'title'    => __( 'Team section', 'oswald' ),
    				'priority' => 20,
    				'panel'     => 'oswald-homepage_content-panel',
			)
		)
	);

	/* team section */
	$wp_customize->add_section(
		new Oswald_WP_Customize_Section(
			$wp_customize, 'testimonial-section',
			array(
				'title'    => __( 'Testimonial section', 'oswald' ),
    				'priority' => 20,
    				'panel'     => 'oswald-homepage_content-panel',
			)
		)
	);

	/* blog section */
	$wp_customize->add_section(
		new Oswald_WP_Customize_Section(
			$wp_customize, 'homepage_blog-section',
			array(
				'title'    => __( 'Blog section', 'oswald' ),
    				'priority' => 20,
    				'panel'     => 'oswald-homepage_content-panel',
			)
		)
	);

	/* blog section */
	$wp_customize->add_section(
		new Oswald_WP_Customize_Section(
			$wp_customize, 'partners-section',
			array(
				'title'    => __( 'Partners section', 'oswald' ),
    				'priority' => 20,
    				'panel'     => 'oswald-homepage_content-panel',
			)
		)
	);

	/* contact section */
	$wp_customize->add_section(
		new Oswald_WP_Customize_Section(
			$wp_customize, 'contact-section',
			array(
				'title'    => __( 'Contact section', 'oswald' ),
    				'priority' => 20,
    				'panel'     => 'oswald-homepage_content-panel',
			)
		)
	);

	$footer_column_1 = $wp_customize->get_section( 'sidebar-widgets-footer_column_1' );
	if ( ! empty( $footer_column_1 ) ) {
		$footer_column_1->panel = 'footer-option';
		$footer_column_1->title    = __( 'Footer Column 1', 'oswald' );
		$footer_column_1->priority = 10;
	}

	$footer_column_2 = $wp_customize->get_section( 'sidebar-widgets-footer_column_2' );
	if ( ! empty( $footer_column_2 ) ) {
		$footer_column_2->panel = 'footer-option';
		$footer_column_2->title    = __( 'Footer Column 2', 'oswald' );
		$footer_column_2->priority = 10;
	}

	$footer_column_3 = $wp_customize->get_section( 'sidebar-widgets-footer_column_3' );
	if ( ! empty( $footer_column_3 ) ) {
		$footer_column_3->panel = 'footer-option';
		$footer_column_3->title    = __( 'Footer Column 3', 'oswald' );
		$footer_column_3->priority = 10;
	}

	$footer_column_4 = $wp_customize->get_section( 'sidebar-widgets-footer_column_4' );
	if ( ! empty( $footer_column_4 ) ) {
		$footer_column_4->panel = 'footer-option';
		$footer_column_4->title    = __( 'Footer Column 4', 'oswald' );
		$footer_column_4->priority = 10;
	}


	$copyright_column_1 = $wp_customize->get_section( 'sidebar-widgets-copyright_column_1' );
	if ( ! empty( $copyright_column_1 ) ) {
		$copyright_column_1->panel = 'footer-option';
		$copyright_column_1->title    = __( 'Copyright Column 1', 'oswald' );
		$copyright_column_1->priority = 10;
	}

	$copyright_column_2 = $wp_customize->get_section( 'sidebar-widgets-copyright_column_2' );
	if ( ! empty( $copyright_column_2 ) ) {
		$copyright_column_2->panel = 'footer-option';
		$copyright_column_2->title    = __( 'Copyright Column 2', 'oswald' );
		$copyright_column_2->priority = 10;
	}

	$copyright_column_3 = $wp_customize->get_section( 'sidebar-widgets-copyright_column_3' );
	if ( ! empty( $copyright_column_3 ) ) {
		$copyright_column_3->panel = 'footer-option';
		$copyright_column_3->title    = __( 'Copyright Column 3', 'oswald' );
		$copyright_column_3->priority = 10;
	}