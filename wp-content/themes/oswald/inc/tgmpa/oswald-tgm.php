<?php

require_once get_template_directory() . '/inc/tgmpa/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'wpd_register_required_plugins');
function wpd_register_required_plugins()
{

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $path =  get_template_directory();

    $plugins = array(
        array(
            'name'               => esc_html__('Contact Form 7', 'oswald' ),
            'slug'               => 'contact-form-7',
            'required'           => false,
        ),
        array(
            'name'               => esc_html__('oAuth Twitter Feed for Developers', 'oswald' ),
            'slug'               => 'oauth-twitter-feed-for-developers',
            'required'           => false,
        ),
        array(
            'name'               => esc_html__('Instagram Feed', 'oswald' ),
            'slug'               => 'instagram-feed',
            'required'           => false,
        ),
        array(
            'name'         => esc_html__('GT3 Photo & Video Gallery', 'oswald' ),
            'slug'         => 'gt3-photo-video-gallery',
            'required'       => false,
        ),
        array(
            'name'         => esc_html__('WooCommerce', 'oswald' ),
            'slug'         => 'woocommerce',
            'required'       => false,
        ),
        array(
            'name'         => esc_html__('WooCommerce Grid / List toggle', 'oswald' ),
            'slug'         => 'woocommerce-grid-list-toggle',
            'required'       => false,
        ),
        array(
            'name'         => esc_html__('YITH WooCommerce Wishlist', 'oswald' ),
            'slug'         => 'yith-woocommerce-wishlist',
            'required'       => false,
        ),
        array(
            'name'         => esc_html__('Variation Swatches for WooCommerce', 'oswald' ),
            'slug'         => 'variation-swatches-for-woocommerce',
            'required'       => false,
        ),
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                       // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins',  // Menu slug.
        'has_notices'  => true,                     // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                       // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                     // Automatically activate plugins after installation or not.
        'message'      => '',                       // Message to output right before the plugins table.
        'strings'      => array(
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}