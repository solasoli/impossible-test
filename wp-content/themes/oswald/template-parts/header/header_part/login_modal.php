<?php if (!oswald_is_lwa() && in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )) {
    if (!is_user_logged_in()) {
        ?><div class='wpd_header_builder__login-modal <?php 
        echo get_option('woocommerce_enable_myaccount_registration') !='yes' ? ' without_register' : ''; 
        echo is_user_logged_in() ? ' user_logged_in' : 'user_logged_out';
        echo in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ? '' : 'not_woo';
        ?>'>
            <div class='wpd_header_builder__login-modal-cover'></div>
            <div class='wpd_header_builder__login-modal_container container'>
                <div class='wpd_header_builder__login-modal-close'></div><?php
                if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                    if (!is_user_logged_in()) {
                        echo do_shortcode('[woocommerce_my_account]');
                    }
                }
                get_template_part( 'template-parts/header/header_part/login_social' );
            ?></div>
        </div><?php
    }
}