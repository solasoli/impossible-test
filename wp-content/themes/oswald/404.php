<?php get_header();
	$image_404 = oswald_option('404_bg');
	$h1_styles = '';
	if (!empty($image_404)) {
		$image_404_url = $image_404['url'];
		$h1_styles = ' style="background-image: -webkit-linear-gradient(transparent, transparent), url('.esc_url($image_404['url']).');"';
	}
?>
	<div class="wrapper_404 height_100percent">
		<div class="container_vertical_wrapper">
			<div class="container a-center">
				<h1 class="number_404"<?php echo ''.$h1_styles; ?>><?php esc_html_e('404', 'oswald'); ?></h1>
				<h1><?php esc_html_e('OOPS! Page Not Found!', 'oswald'); ?></h1>
				<p><?php esc_html_e('Either Something Get Wrong or the Page Doesn\'t Exist Anymore.', 'oswald'); ?></p>
				<div class="wpd_404_search">
					<?php get_search_form(); ?>
				</div>
				<div class="wpd_module_button  button_alignment_inline">
					<a class="button_size_normal text-uppercase" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Take me home', 'oswald'); ?></a>
				</div>				
			</div>
		</div>
	</div>
<?php 
get_footer();