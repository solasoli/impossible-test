<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 */

	if (class_exists( 'RWMB_Loader' )) {
		$mb_footer_switch = rwmb_meta('mb_footer_switch');
	} else {
		$mb_footer_switch = '';
	}

?>
        </div><!-- .main_wrapper -->
	</div><!-- .site_wrapper -->

	<?php if(oswald_option('back_to_top') == '1'):?>
	<div class='back_to_top_container'>
		<div class='container'>
			<a href="#" id='back_to_top'><?php esc_html_e( 'Back To Top', 'oswald' ) ?></a>
		</div>
	</div>
	<?php endif; ?>
	<?php if($mb_footer_switch != 'no'){
		get_template_part( 'template-parts/footer/footer-area' ); 
	}?>
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
		?></div><?php
	}
	?>
<?php wp_footer(); ?>
</body>
</html>