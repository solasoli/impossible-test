<?php
/**
 * @package DependentlySidebarPageSidebar
 */

if ( ! class_exists( 'Oswald_DependentlySidebarPortfolioSingleSidebar' ) ) {

	class Oswald_DependentlySidebarPortfolioSingleSidebar {

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
			$controls = array_filter( array(
				$wp_customize->get_control( 'oswald[portfolio_single_sidebar_def]' ),
			) );
			foreach ( $controls as $control ) {
				$control->active_callback = array( $this, 'get_sidebar_page_sidebar_active_state' );
			}
		}

		function get_sidebar_page_sidebar_active_state( $control ) {
			$setting = $control->manager->get_setting( OSWALD_THEME_SETTINGS . '[portfolio_single_sidebar_layout]' );
			if ( ! $setting ) {
				return true;
			}
			/*return $setting->value();*/
			return 'none' !== $setting->value();
		}

		/**
		 * Enqueue scripts.
		 */
		function customize_controls_enqueue_scripts() {
			$handle = 'dependently-sidebar-portfolio_single_sidebar';
			$src = OSWALD_THEME_URI . 'inc/customizer/dependencies/sidebar-dependencies/'.esc_attr($handle).'.js';
			$deps = array( 'customize-controls' );
			$ver = false;
			wp_enqueue_script( $handle, $src, $deps, $ver );
		}
	}
}// End if().

Oswald_DependentlySidebarPortfolioSingleSidebar::get_instance();