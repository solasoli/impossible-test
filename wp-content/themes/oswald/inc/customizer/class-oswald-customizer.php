<?php
/**
 * Oswald Theme Customizer
 */

/**
 * Customizer Loader
 */


if ( ! class_exists( 'Oswald_Customizer' ) ) {

	/**
	 * Customizer Loader
	 *
	 * @since 1.0.0
	 */
	class Oswald_Customizer {

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

			/**
			 * Customizer
			 */
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'controls_scripts' ) );
			add_action( 'customize_preview_init', array( $this, 'customize_preview' ) );
			add_action( 'customize_register', array( $this, 'customize_register_panel' ), 2 );
			add_action( 'customize_register', array( $this, 'customize_register' ) );

			require_once(get_template_directory().'/inc/customizer/dependencies/header-dependencies/dependently-header-custom-text.php');
			require_once(get_template_directory().'/inc/customizer/dependencies/header-dependencies/dependently-header-logo.php');
			require_once(get_template_directory().'/inc/customizer/dependencies/sidebar-dependencies/dependently-sidebar-page-sidebar.php');
			require_once(get_template_directory().'/inc/customizer/dependencies/sidebar-dependencies/dependently-sidebar-blog-single-sidebar.php');
			require_once(get_template_directory().'/inc/customizer/dependencies/sidebar-dependencies/dependently-sidebar-portfolio_single_sidebar.php');
			require_once(get_template_directory().'/inc/customizer/dependencies/sidebar-dependencies/dependently-sidebar-team_single_sidebar.php');
			//shop
			require_once(get_template_directory().'/inc/customizer/dependencies/sidebar-dependencies/dependently-sidebar-shop_profucts_sidebar.php');
			require_once(get_template_directory().'/inc/customizer/dependencies/sidebar-dependencies/dependently-sidebar-shop_single_sidebar.php');
		}



		/**
		 * Register custom section and panel.
		 *
		 * @since 1.0.0
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function customize_register_panel( $wp_customize ) {

			/**
			 * Register Extended Panel
			 */
			$wp_customize->register_panel_type( 'Oswald_WP_Customize_Panel' );
			$wp_customize->register_section_type( 'Oswald_WP_Customize_Section' );

			require OSWALD_THEME_DIR . 'inc/customizer/customizer.php';

			/**
			 * Register controls
			 */

			$wp_customize->register_control_type( 'Oswald_Control_Radio_Image' );
			$wp_customize->register_control_type( 'Oswald_Control_Preset' );
			$wp_customize->register_control_type( 'Oswald_Control_TinyMCE' );
		}

		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @since 1.0.0
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function customize_register( $wp_customize ) {

			$wp_customize->remove_control('woocommerce_catalog_columns');
			$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'custom_logo' )->transport      = 'postMessage';

			if ( isset( $wp_customize->selective_refresh ) ) {
				$wp_customize->selective_refresh->add_partial(
					'custom_logo', array(
						'selector'        => '.wpd_header_builder .logo_container a',
						'settings'        => 'custom_logo',
						'render_callback' => 'oswald_custom_logo_callback',
					)
				);
			}
			
			/**
			 * Oswald Pro Upsell Link
			 */
			
			require OSWALD_THEME_DIR . 'inc/customizer/oswald-pro/class-oswald-pro-customizer.php';
			require OSWALD_THEME_DIR . 'inc/customizer/oswald-pro/oswald-pro-section-register.php';


			/**
			 * Register Sections & Panels
			 */
			require OSWALD_THEME_DIR . 'inc/customizer/register-panels-and-sections.php';

			/**
			 * Sections
			 */
			require OSWALD_THEME_DIR . 'inc/customizer/sections/general/general.php';
			if (  !class_exists( 'wpdaddy_core' ) ) {
				require OSWALD_THEME_DIR . 'inc/customizer/sections/header/header.php';
			}
			require OSWALD_THEME_DIR . 'inc/customizer/sections/blog/blog.php';
			require OSWALD_THEME_DIR . 'inc/customizer/sections/sidebar/sidebar.php';
			require OSWALD_THEME_DIR . 'inc/customizer/sections/styling/styling.php';
			if (  !class_exists( 'wpdaddy_core' ) ) {
				require OSWALD_THEME_DIR . 'inc/customizer/sections/typography/typography.php';
			}
		}

		/**
		 * Customizer Controls
		 *
		 * @since 1.0.0
		 * @return void
		 */
		function controls_scripts() {
			wp_enqueue_script('oswald-controls-scripts', OSWALD_THEME_URI . '/inc/customizer/js/controls_scripts.js',array(),false,true);
		}

		function customize_preview() {
			wp_enqueue_script('oswald-customize-preview', OSWALD_THEME_URI . '/inc/customizer/js/customize_preview.js',array(),false,true);
		}
	}
}// End if().

Oswald_Customizer::get_instance();