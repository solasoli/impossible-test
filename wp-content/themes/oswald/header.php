<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php 
	$boxed_style = oswald_option('boxed_style');

	if (class_exists( 'RWMB_Loader' )) {
		$mb_boxed_style = rwmb_meta('mb_boxed_style');
		if ($mb_boxed_style == 'yes') {
			$boxed_style = '1';
		}
		if ($mb_boxed_style == 'no') {
			$boxed_style = '0';
		}
	}
	if ($boxed_style == '1') {
		?><div class="wpd_boxed_layout"><?php
	}
	?>


	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'oswald' ); ?></a>

	<?php 
	/** Preloader Template */
	get_template_part( 'template-parts/header/preloader' ); 
	/** Header Template */
	get_template_part( 'template-parts/header/header-builder' );
	/** Page Title Template */
	get_template_part( 'template-parts/header/page-title' ); 
	$show_on_front = get_option( 'show_on_front' );
	?>
	 <?php putRevSlider("hero-image", "homepage"); ?>
	 
	<div class="site_wrapper fadeOnLoad<?php echo ($show_on_front == 'custom' && (is_home() || is_front_page()) ? ' custom_frontpage' : '') ?>">
        <div class="main_wrapper">


