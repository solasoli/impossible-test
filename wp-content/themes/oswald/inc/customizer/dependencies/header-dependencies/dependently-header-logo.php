<?php

if ( ! class_exists( 'Oswald_DependentlyHeaderLogo' ) ) {

	class Oswald_DependentlyHeaderLogo {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'customize_register', array( $this, 'customize_register' ), 11 );
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'customize_controls_enqueue_scripts' ) );
		}


		function customize_register( $wp_customize ) {
			$header_text_controls = array_filter( array(
				$wp_customize->get_control( 'oswald[logo_height][height]' ),
			) );
			foreach ( $header_text_controls as $header_text_control ) {
				$header_text_control->active_callback = array( $this, 'get_header_text_control_active_state' );
			}
		}

		function get_header_text_control_active_state( $control ) {
			$setting = $control->manager->get_setting( OSWALD_THEME_SETTINGS . '[logo_height_custom]' );
			if ( ! $setting ) {
				return true;
			}
			return 'blank' !== $setting->value();
		}

		/**
		 * Enqueue scripts.
		 */
		function customize_controls_enqueue_scripts() {
			$handle = 'dependently-header-logo';
			$src = OSWALD_THEME_URI . 'inc/customizer/dependencies/header-dependencies/'.esc_attr($handle).'.js';
			$deps = array( 'customize-controls' );
			$ver = false;
			wp_enqueue_script( $handle, $src, $deps, $ver );
		}
	}
}// End if().

Oswald_DependentlyHeaderLogo::get_instance();