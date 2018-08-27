<?php
/**
 * @package DependentlyHeaderCustomText
 */

/*namespace DependentlyHeaderCustomText;


function customize_register( \WP_Customize_Manager $wp_customize ) {
	$header_text_controls = array_filter( array(
		$wp_customize->get_control( 'oswald[text1_editor]' ),
	) );
	foreach ( $header_text_controls as $header_text_control ) {
		$header_text_control->active_callback = __NAMESPACE__ . '\\get_header_text_control_active_state';
	}
}

add_action( 'customize_register', __NAMESPACE__ . '\\customize_register', 11 );

function get_header_text_control_active_state( \WP_Customize_Control $control ) {
	$setting = $control->manager->get_setting( OSWALD_THEME_SETTINGS . '[show_custom_text]' );
	if ( ! $setting ) {
		return true;
	}
	return 'blank' !== $setting->value();
}

/**
 * Enqueue scripts.
 
function customize_controls_enqueue_scripts() {
	$handle = 'dependently-header-custom-text';
	$src = OSWALD_THEME_URI . 'inc/customizer/dependencies/header-dependencies/'.esc_attr($handle).'.js';
	$deps = array( 'customize-controls' );
	$ver = false;
	wp_enqueue_script( $handle, $src, $deps, $ver );
}
add_action( 'customize_controls_enqueue_scripts', __NAMESPACE__ . '\\customize_controls_enqueue_scripts' );*/





if ( ! class_exists( 'Oswald_DependentlyHeaderCustomText' ) ) {

	class Oswald_DependentlyHeaderCustomText {

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
				$wp_customize->get_control( 'oswald[text1_editor]' ),
			) );
			foreach ( $header_text_controls as $header_text_control ) {
				$header_text_control->active_callback = array( $this, 'get_header_text_control_active_state' );
			}
		}

		function get_header_text_control_active_state( $control ) {
			$setting = $control->manager->get_setting( OSWALD_THEME_SETTINGS . '[show_custom_text]' );
			if ( ! $setting ) {
				return true;
			}
			return 'blank' !== $setting->value();
		}

		/**
		 * Enqueue scripts.
		 */
		function customize_controls_enqueue_scripts() {
			$handle = 'dependently-header-custom-text';
			$src = OSWALD_THEME_URI . 'inc/customizer/dependencies/header-dependencies/'.esc_attr($handle).'.js';
			$deps = array( 'customize-controls' );
			$ver = false;
			wp_enqueue_script( $handle, $src, $deps, $ver );
		}
	}
}// End if().

Oswald_DependentlyHeaderCustomText::get_instance();