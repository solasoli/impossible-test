<?php 
if ( ! defined( 'ABSPATH' ) ) { exit; }
/*
 * Scripts and stylesheets
 */

if (!function_exists('oswald_theme_scripts')) {
	function oswald_theme_scripts(){
		$template_directory_uri = get_template_directory_uri();

		$minify_script = oswald_option('minify_script');
		$minify_css = oswald_option('minify_css');

		/**
		 * Theme Styles
		 */
		wp_enqueue_style("font_awesome", $template_directory_uri . '/assets/css/font-awesome.min.css');
		wp_deregister_style( 'yith-wcwl-font-awesome' );
		if ($minify_css) {
			wp_enqueue_style('oswald_theme_css', $template_directory_uri . '/assets/css/style.min.css', false, null);
			if ( class_exists( 'LoginWithAjax' ) ) {
		        wp_enqueue_style( 'oswald-login-with-ajax', get_template_directory_uri() . '/assets/css/login-with-ajax.min.css' );
		    }
		}else{
			wp_enqueue_style('oswald_theme_css', $template_directory_uri . '/assets/css/style.css', false, null);
			if ( class_exists( 'LoginWithAjax' ) ) {
		        wp_enqueue_style( 'oswald-login-with-ajax', get_template_directory_uri() . '/assets/css/login-with-ajax.css' );
		    }
		}

		wp_enqueue_script('swipebox', get_template_directory_uri() . '/assets/js/swipebox/js/jquery.swipebox.min.js', array(), false, false);
		wp_enqueue_style('swipebox', get_template_directory_uri() . '/assets/js/swipebox/css/swipebox.min.css');

		wp_enqueue_style('default_style', get_bloginfo('stylesheet_url'));

		wp_register_script('jquery.cookie', get_template_directory_uri() . '/assets/js/jquery.cookie.min.js', array('jquery'), false, true);
		wp_register_script('slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), false, true);	
		wp_enqueue_script('wpdaddy_isotope', get_template_directory_uri() . '/assets/js/jquery.isotope.min.js', array(), false, true);
        wp_enqueue_script('imagesloaded');	
        if ($minify_script) {
        	wp_enqueue_script('oswald_theme_js', $template_directory_uri . '/assets/js/app.min.js', array('jquery'), false, true);
        }else{
        	wp_enqueue_script('oswald_theme_js', $template_directory_uri . '/assets/js/app.js', array('jquery'), false, true);
        }
		
		$translation_array = array(
		    'wpd_ajaxurl' => esc_url(admin_url('admin-ajax.php'))
		);
		wp_localize_script( 'oswald_theme_js', 'object_name', $translation_array );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}