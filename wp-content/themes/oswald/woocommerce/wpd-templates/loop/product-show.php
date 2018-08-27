<?php
global $products;
$wpd_all_posts = $products->found_posts;
$orderby = isset( $_GET['show_prod'] ) ? wc_clean( $_GET['show_prod'] ) : 'default';
$show_default_orderby    = 'menu_order' === apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
$catalog_orderby_options = array(
	'8' => esc_html__( 'Default', 'oswald' ),
	'6' => esc_html__( '6', 'oswald' ),
	'9' => esc_html__( '9', 'oswald' ),
	'12'     => esc_html__( '12', 'oswald' ),
	$wpd_all_posts       => esc_html__( 'All', 'oswald' ),
);

?>
<form class="woocommerce-ordering products-show" method="get">
	<select name="show_prod" class="orderby">
		<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
			<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
		<?php endforeach; ?>
	</select>
	<?php wc_query_string_form_fields( null, array( 'show_prod', 'submit' ) ); ?>
</form>