<?php
/**
 * Template for displaying search forms
 */
?>

<form role="search" method="get" class="search_form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" id="<?php echo esc_attr(uniqid('search-form-')); ?>" class="search-field" placeholder="<?php esc_attr_e('Search', 'oswald'); ?>" value="" name="s" />
	<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
</form>
