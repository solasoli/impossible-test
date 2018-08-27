<?php 
if ( ! defined( 'ABSPATH' ) ) { exit; }
/*
 * List of the files included into theme
 */

require_once get_template_directory().'/inc/assets.php';
require_once get_template_directory().'/inc/blog-functions.php';
require_once get_template_directory().'/inc/header-functions.php';
require_once get_template_directory().'/inc/sidebars-registration.php';
require_once(get_template_directory().'/inc/customizer/class-oswald-customizer.php');


// redux option 
require_once get_template_directory() . "/inc/default-options.php";
require_once get_template_directory().'/inc/redux-config.php';


//custom css styles
require_once get_template_directory().'/inc/custom-css.php';

// LoginWithAjax
if ( class_exists( 'LoginWithAjax' ) ) {
   require get_template_directory() . '/inc/login-with-ajax.php';
}

//tgmpa
require_once get_template_directory().'/inc/tgmpa/oswald-tgm.php';

//widgets
require_once(get_template_directory().'/inc/widgets/posts.php');

// menu walker
require_once(get_template_directory().'/inc/menu_walker.php');