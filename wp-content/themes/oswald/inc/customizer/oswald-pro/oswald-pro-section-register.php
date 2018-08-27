<?php
/**
 * Register customizer Oswald Pro Section.
 */

// Register custom section types.
$wp_customize->register_section_type( 'Oswald_Pro_Customizer' );

// Register sections.
// if pro plugin not active
if ( !class_exists('wpdaddy_core') ) {
	$wp_customize->add_section(
		new Oswald_Pro_Customizer(
			$wp_customize, 'oswald-pro', array(
				'title'    => esc_html__( 'Need More Options? Get Oswald Pro!', 'oswald' ),
				'pro_url'  => esc_url_raw( 'https://wpdaddy.com/products/oswald/' ),
				'priority' => 1,
			)
		)
	);
}