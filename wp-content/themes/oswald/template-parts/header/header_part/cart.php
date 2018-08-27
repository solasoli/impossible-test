<?php 
ob_start();
    woocommerce_mini_cart();
$woo_mini_cart = ob_get_clean();
ob_start();
    ?><a class="woo_icon" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'oswald' ); ?>"><i class='woo_mini-count'><?php echo ((WC()->cart->cart_contents_count > 0) ?  '<span>' . esc_html( WC()->cart->cart_contents_count ) .'</span>' : '') ?></i></a><?php
$woo_mini_icon = ob_get_clean();

?><div class="wpd_header_builder_component wpd_header_builder_cart_component"><?php
echo  $woo_mini_icon;
?><div class="wpd_header_builder_cart_component__cart">
    <div class="wpd_header_builder_cart_component__cart-container"><?php
        echo  $woo_mini_cart;
    ?></div>
    </div>
</div>