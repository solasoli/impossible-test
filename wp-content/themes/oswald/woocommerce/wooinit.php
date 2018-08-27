<?php

// declare woocommerce custom theme stylesheets and js
function oswald_woo_enqueue_woocommerce_style() {  
    $minify_css = oswald_option('minify_css');
    if ($minify_css) {
        wp_register_style( 'oswald_woo', get_template_directory_uri() . '/woocommerce/css/woocommerce.min.css' );
    }else{
        wp_register_style( 'oswald_woo', get_template_directory_uri() . '/woocommerce/css/woocommerce.css' );
    }
    wp_enqueue_style( 'oswald_woo' );
}
add_action( 'wp_enqueue_scripts', 'oswald_woo_enqueue_woocommerce_style' );

function oswald_css_js_woocomerce() {
    $minify_script = oswald_option('minify_script');
    if ($minify_script) {
        wp_enqueue_script('oswald_main_woo_js', get_template_directory_uri() . '/woocommerce/js/theme-woo.min.js', array(), false, true);
    }else{
        wp_enqueue_script('oswald_main_woo_js', get_template_directory_uri() . '/woocommerce/js/theme-woo.js', array(), false, true);
    }
    
    wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), false, true);
    wp_enqueue_script('easyzoom', get_template_directory_uri() . '/woocommerce/js/easyzoom.js', array('jquery'), false, true);
    if (class_exists( 'WC_List_Grid' )) {
        global $WC_List_Grid;
        add_action( 'wp_enqueue_scripts', array( $WC_List_Grid, 'setup_scripts_styles' ), 20);
    }
}
add_action('wp_enqueue_scripts', 'oswald_css_js_woocomerce');
// end of declare woocommerce custom theme stylesheets and js

// Remove action if ListGrid Plugin is active
if (class_exists('WC_List_Grid')) {
    function oswald_remove_plugin_actions(){
        global $WC_List_Grid;

        // Remove ListGrid plugin defaul wrapper in product
        remove_action( 'woocommerce_after_shop_loop_item', array( $WC_List_Grid, 'gridlist_buttonwrap_open' ), 9);
        remove_action( 'woocommerce_after_shop_loop_item', array( $WC_List_Grid, 'gridlist_buttonwrap_close' ), 11);
        remove_action( 'woocommerce_after_shop_loop_item', array( $WC_List_Grid, 'gridlist_hr' ), 30);

        add_action('woocommerce_shortcode_after_recent_products_loop', 'woocommerce_pagination', 10);
    }
    add_action('woocommerce_archive_description','oswald_remove_plugin_actions');    
}


function oswald_wrapper_product_thumbnail_open () {
	echo '<div class="wpd-product-thumbnail-wrapper">';
}

function oswald_wrapper_product_thumbnail_close () {
	echo '</div>';
}

function oswald_product_title_wrapper () {
    echo '<h3 class="wpd-product-title">'.get_the_title().'</h3>'; 
}

function oswald_product_image_wrap_open () {
    echo '<div class="wpd-product-image-wrapper">';
}

function oswald_product_image_wrap_close () {
    echo '</div>';
}

// Pagination Arrows change to custom
function oswald_change_pagination ($args) {
    $args['prev_text'] = '<i class="fa fa-angle-left"></i>';
    $args['next_text'] = '<i class="fa fa-angle-right"></i>';
    return $args;
}
add_filter('woocommerce_pagination_args', 'oswald_change_pagination', 30, 1);

function oswald_add_label_outofstock () {
    global $product;
    if (!($product->is_in_stock())) {
        echo '<div class="wpd-product-outofstock">'.esc_html__('Out Of Stock', 'oswald').'</div>';
    }
}
add_action('woocommerce_before_shop_loop_item_title', 'oswald_add_label_outofstock', 6);
add_action( 'woocommerce_product_thumbnails', 'oswald_add_label_outofstock', 29 );

// Remove woocommerce breadcrumb
remove_action('woocommerce_before_main_content','woocommerce_breadcrumb', 20);
//add breadcrumb to single product
if (oswald_option('shop_title_conditional') != '1' && oswald_option('page_title_breadcrumbs_conditional') == '1' && oswald_option('page_title_conditional') == '1' ) {
    add_action('woocommerce_single_product_summary','woocommerce_breadcrumb', 4);
}
if (oswald_option('shop_title_conditional') == '1' && oswald_option('page_title_conditional') == '1') {
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
}


add_action( 'yith_wcqv_product_image', 'oswald_product_image_wrap_open', 9 );
add_action( 'yith_wcqv_product_image', 'oswald_product_image_wrap_close', 21 );



function oswald_add_thumb_wcqv () {
    add_action('woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 25);
}
add_action( 'wp_ajax_yith_load_product_quick_view', "oswald_add_thumb_wcqv", 1);
add_action( 'wp_ajax_nopriv_yith_load_product_quick_view', 'oswald_add_thumb_wcqv',1 );

//Replace Ratings in popup
remove_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_rating', 4 );

remove_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_meta', 30 );
add_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_meta', 17 );


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 25 );

function oswald_remove_stockhtml ($content) {
    return '';
}
add_filter( 'woocommerce_get_stock_html', 'oswald_remove_stockhtml');


/* Woocomerce Template */
add_filter( 'woocommerce_show_page_title', '__return_false' );

// set custom count pro
function oswald_products_per_page () {
    $products_count = oswald_option('products_per_page');
    $products_count = !empty($products_count) ? $products_count : 9;
    return $products_count;
}
add_filter(  'loop_shop_per_page', 'oswald_products_per_page', 20 );

function oswald_woo_page_template () {

    switch (is_single()) {
        case true:
            $layout = oswald_option('product_sidebar_layout');
            $sidebar = oswald_option('product_sidebar_def');
            break;
        case false:
            $layout = oswald_option('products_sidebar_layout');
            $sidebar = oswald_option('products_sidebar_def');
            break;
        default:
            $layout = oswald_option('products_sidebar_layout');
            $sidebar = oswald_option('products_sidebar_def');
    }
    if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0 && !(class_exists('WooCommerce') && is_product_category())) {
        $mb_layout = rwmb_meta('mb_page_sidebar_layout');
        if (!empty($mb_layout) && $mb_layout != 'default') {
            $layout = $mb_layout;
            $sidebar = rwmb_meta('mb_page_sidebar_def');
        }
    }
    $column = 12;
    if ( $layout == 'left' || $layout == 'right' ) {
        $column = 9;
    }else{
        $sidebar = '';
    }
    $row_class = ' sidebar_'.esc_attr($layout);

    $class_columns = '';
    if ( !is_single() && get_post_type() == 'product') {
        global $woocommerce_loop;
        $columns = oswald_option('woocommerce_def_columns');
        $columns = empty($columns) ? 4 : $columns;
        $columns                     = absint( $columns );
        $woocommerce_loop['columns'] = $columns;

        $class_columns = 'class="woocommerce columns-'.esc_attr($columns).'"';
    }

    $container_class = 'container';

    ?>

    <div class="<?php echo esc_attr($container_class) ?>">
        <div class="row<?php echo esc_attr($row_class); ?>">
            <div class="content-container span<?php echo (int)$column; ?>">
                <section id='main_content' <?php echo ''.$class_columns; ?> >
    <?php
}
add_action('woocommerce_before_main_content', 'oswald_woo_page_template', 9);

// add bottom part of page template
function oswald_woo_page_template_close () {
    switch (is_single()) {
        case true:
            $layout = oswald_option('product_sidebar_layout');
            $sidebar = oswald_option('product_sidebar_def');
            break;
        case false:
            $layout = oswald_option('products_sidebar_layout');
            $sidebar = oswald_option('products_sidebar_def');
            break;
        default:
            $layout = oswald_option('products_sidebar_layout');
            $sidebar = oswald_option('products_sidebar_def');
    }
    if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0 && !(class_exists('WooCommerce') && is_product_category())) {
        $mb_layout = rwmb_meta('mb_page_sidebar_layout');
        if (!empty($mb_layout) && $mb_layout != 'default') {
            $layout = $mb_layout;
            $sidebar = rwmb_meta('mb_page_sidebar_def');
        }
    }
    $column = 12;
    if ( $layout == 'left' || $layout == 'right' ) {
        $column = 9;
    }else{
        $sidebar = '';
    }
    ?>
     </section>
            </div>
            <?php
            if ($layout == 'left' || $layout == 'right') {
                echo '<div class="sidebar-container span'.(12 - (int)$column).'">';
                    if (is_active_sidebar( $sidebar )) {
                        echo "<aside class='sidebar'>";
                        dynamic_sidebar( $sidebar );
                        echo "</aside>";
                    }
                echo "</div>";
            }
            ?>           
        </div>
     
    </div>
    <?php
}
add_action('woocommerce_after_main_content', 'oswald_woo_page_template_close', 11);

/* Woocommerce Template */


/* Products Page filter bar */
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
add_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10 );

function oswald_woo_header_products_open () {
    echo '<div class="wpd-products-header">';
}
function oswald_woo_header_products_close () {
    echo '</div>';
}
add_action('woocommerce_before_shop_loop', 'oswald_woo_header_products_open', 9);
add_action('woocommerce_before_shop_loop', 'oswald_woo_header_products_close', 35);

/* ! Products Page filter bar */

/* zoom image */
function oswald_wrapper_zoom ($content) {
    global $post, $product;
    $attachment_ids = $product->get_gallery_image_ids();
    $thumb_str = '';
    if ( $attachment_ids ) {
        $loop = 0;
        $columns = 1;
        foreach ( $attachment_ids as $attachment_id ) {

            $classes = array( 'zoom' );

            if ( $loop === 0 || $loop % $columns === 0 ) {
                $classes[] = 'first';
            }

            if ( ( $loop + 1 ) % $columns === 0 ) {
                $classes[] = 'last';
            }

            $image_class = implode( ' ', $classes );
            $props       = wc_get_product_attachment_props( $attachment_id, $post );

            if ( ! $props['url'] ) {
                continue;
            }

            $thumb_str .= sprintf(
                    '<div class="easyzoom"><a href="%s" class="%s" title="%s" data-rel="prettyPhoto[product-gallery]">%s</a></div>',
                    esc_url( $props['url'] ),
                    esc_attr( $image_class ),
                    esc_attr( $props['caption'] ),
                    wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'full' ), 0, $props )
                );

            $loop++;
        }
    }

    return '<div class="wpd-single-woo-slick"><div class="easyzoom">'.$content.'</div>'.$thumb_str.'</div>';
}
add_filter('woocommerce_single_product_image_html', 'oswald_wrapper_zoom', 30, 1);

/* !zoom image */

/* Add image size for masonry product listing */
if( !function_exists( 'oswald_filter_single_product_archive_thumbnail_size' )){
    function oswald_filter_single_product_archive_thumbnail_size( $size ) { 
        global $thumbnail_dim;
        $size = $thumbnail_dim;
        return $size; 
    };
}
/* ! Add image size for masonry product listing */

/**/
/********** AFTER UPDATE WOOO ******************/
/**/
function oswald_wrap_single_product_open () {
    echo '<div class="wpd-single-content-wrapper">';
}
function oswald_wrap_single_product_close () {
    echo '</div>';
}
function oswald_add_sticky_parent_open () {
    echo '<div class="wpd-single-product-sticky">';
}
function oswald_add_sticky_parent_close () {
    echo '</div>';
}
// Add theme support for single product
function oswald_add_single_product_opts () {
    add_image_size( 'wpd_540x600', 540, 600, true );
    add_image_size( 'wpd_442x350', 442, 350, true );
    add_image_size( 'wpd_442x730', 442, 730, true );
    add_image_size( 'wpd_912x730', 912, 730, true );

    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-slider');
    add_theme_support('wc-product-gallery-lightbox');
}
add_action('after_setup_theme','oswald_add_single_product_opts');


// add vertical thumbnails options
function oswald_option_thumbnail_slider () {
    return array(
        'rtl'            => is_rtl(),
        'animation'      => "fade",
        'smoothHeight'   => false,
        'directionNav'   => false,
        'controlNav'     => 'thumbnails',
        'slideshow'      => false,
        'animationSpeed' => 500,
        'animationLoop'  => false, // Breaks photoswipe pagination if true.
    );
}
add_filter('woocommerce_single_product_carousel_options', 'oswald_option_thumbnail_slider');

function oswald_get_template ($tmpl, $extension = NULL) {
    get_template_part( 'woocommerce/wpd-templates/' . $tmpl, $extension );
}

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' );

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
add_action("woocommerce_product_thumbnails", "woocommerce_show_product_sale_flash", 5);

/* Add next/prev buttons on single product */
if ( oswald_option('next_prev_product') ) {
    add_action( 'woocommerce_after_single_product_summary', 'oswald_prev_next_product', 17 );
    function oswald_prev_next_product(){
        function ShowLinkToProduct($post_id, $categories_as_array, $label) {
            $orderby = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
            // get post according post id
            $query_args = array( 'orderby' => $orderby, 'post__in' => array($post_id), 'posts_per_page' => 1, 'post_status' => 'publish', 'post_type' => 'product', 'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'id',
                    'terms' => $categories_as_array
                )));
            $r_single = new WP_Query($query_args);
            if ($r_single->have_posts()) {
                $r_single->the_post();
                global $product;
            ?>
                <li>
                    <a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">
                        <?php 
                        echo '<div class="product_list_nav_thumbnail">';
                        if (has_post_thumbnail()){
                            the_post_thumbnail('shop_thumbnail');
                        }  else {
                            $size = wc_get_image_size( 'shop_thumbnail' );
                            echo '<img src="'. woocommerce_placeholder_img_src() .'" alt="Placeholder" width="'.$size['width'].'" height="'.$size['height'].'" />'; 
                        }
                        echo '</div>';
                        echo '<div class="product_list_nav_text">';
                            echo '<span class="nav_title">';
                                if ( get_the_title() ) the_title(); else the_ID(); 
                            echo '</span>';
                            echo '<span class="nav_text">'.$label.'</span>';
                            echo '<span class="nav_price_amount">'.$product->get_price_html().'</span>';
                        echo '</div>';
                        ?>
                    </a>
                </li>
            <?php
                wp_reset_query();
            }
        }

        global $post;
        $orderby = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
        // get categories
        $terms = wp_get_post_terms( $post->ID, 'product_cat' );
        $cats_array[] = '';
        foreach ( $terms as $term ) $cats_array[] = $term->term_id;
        // get all posts in current categories
        $query_args = array( 'posts_per_page' => -1, 'post_status' => 'publish', 'post_type' => 'product', 'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'id',
                'terms' => $cats_array
            )));
        $r = new WP_Query($query_args);
        // show next and prev only if we have 3 or more
        if ($r->post_count > 2) {
            echo "<ul class='wpd_product_list_nav'>";
            $prev_product_id = -1;
            $next_product_id = -1;
            $found_product = false;
            $i = 0;
            $current_product_index = $i;
            $current_product_id = get_the_ID();
            if ($r->have_posts()) {
                while ($r->have_posts()) {
                    $r->the_post();
                    $current_id = get_the_ID();
                    if ($current_id == $current_product_id) {
                        $found_product = true;
                        $current_product_index = $i;
                    }
                    $first_product_index = $i == $r->post_count - 1 ? $i : 0;
                    $is_first = ($current_product_index == $first_product_index);
                    if ($is_first) {
                        $prev_product_id = get_the_ID(); // if product is first then 'prev' = last product
                    } else {
                        if (!$found_product && $current_id != $current_product_id) {
                            $prev_product_id = get_the_ID();
                        }
                    }
                    if ($i == 0) { // if product is last then 'next' = first product
                        $next_product_id = get_the_ID();
                    }
                    if ($found_product && $i == $current_product_index + 1) {
                        $next_product_id = get_the_ID();
                    }
                    $i++;
                }
                if ($prev_product_id != -1) { ShowLinkToProduct($prev_product_id, $cats_array, esc_html__("PREVIOUS","oswald")); }
                if ($next_product_id != -1) { ShowLinkToProduct($next_product_id, $cats_array, esc_html__("NEXT","oswald")); }
            }
            wp_reset_query();
            echo "</ul>";
        }
    }
}

// Wishlist button moving
if ( class_exists( 'YITH_WCWL_Shortcode' ) && get_option('yith_wcwl_enabled') == true && get_option('yith_wcwl_button_position') == 'add-to-cart') {
    function oswald_output_wishlist_button() {
        echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
    }
    add_action('woocommerce_after_add_to_cart_quantity', 'oswald_output_wishlist_button', 5);
}

add_action( 'template_redirect', 'oswald_yith_wcqv_remove_from_wishlist' );
function oswald_yith_wcqv_remove_from_wishlist(){
    if( function_exists( 'YITH_WCQV_Frontend' ) && defined('YITH_WCQV_FREE_INIT') ) {
        remove_action( 'yith_wcwl_table_after_product_name', array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 15 );
    }
}

// Add Hot/New label for product
add_action( 'woocommerce_product_options_general_product_data', 'oswald_woo_add_custom_general_field' );
add_action( 'woocommerce_process_product_meta', 'oswald_woo_add_custom_general_fields_save' );
function oswald_woo_add_custom_general_field() {
    global $woocommerce, $post;

    echo '<div class="options_group">';
    woocommerce_wp_checkbox( array( 
        'id'            => '_checkbox_hot',  
        'label'         => esc_html__( 'Hot Product', 'oswald' ),
        'description'   => esc_html__( 'Check for Hot Product', 'oswald' )
    ) );
    woocommerce_wp_checkbox( array( 
        'id'            => '_checkbox_new',  
        'label'         => esc_html__( 'New Product', 'oswald' ),
        'description'   => esc_html__( 'Check for New Product', 'oswald' )
    ) );
    echo '</div>';
}
function oswald_woo_add_custom_general_fields_save( $post_id )
{
    $woocommerce_checkbox = isset($_POST['_checkbox_hot']) ? 'yes' : 'no';
    update_post_meta($post_id, '_checkbox_hot', $woocommerce_checkbox);

    $woocommerce_checkbox = isset($_POST['_checkbox_new']) ? 'yes' : 'no';
    update_post_meta($post_id, '_checkbox_new', $woocommerce_checkbox);
}

add_action('woocommerce_product_thumbnails','oswald_hot_new_product', 30);
add_action('woocommerce_before_shop_loop_item_title','oswald_hot_new_product', 7);
add_action('yith_wcqv_product_image', 'oswald_hot_new_product', 10 );
add_action('oswald_hot_new_label_product','oswald_hot_new_product', 10);
function oswald_hot_new_product(){
    global $product;

    $is_hot = get_post_meta( $product->get_id(), '_checkbox_hot', true );
    if ( 'yes' == $is_hot ) {
        echo '<span class="onsale hot-product">'.esc_html__('Hot','oswald').'</span>';
    }

    $is_new = get_post_meta( $product->get_id(), '_checkbox_new', true );
    if ( 'yes' == $is_new ) {
        echo '<span class="onsale new-product">'.esc_html__('New','oswald').'</span>';
    }
}


remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

//WPD Products Grid Thumb parent wrap
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

function oswald_template_div(){
    echo '<div class="wpd-product_parent_wrapper">';
}
add_action('woocommerce_before_shop_loop_item_title', 'oswald_template_div', 6);

function oswald_template_div_product_links_wrap(){
    echo '<div class="wpd-template_div_product_links_wrap">';
}
function oswald_template_div_product_links_wrap_close(){
    echo '</div>';
}
add_action('woocommerce_before_shop_loop_item_title', 'oswald_template_div_product_links_wrap', 14);

add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 15);
function oswald_template_loop_product_link(){
    esc_html_e('View More','oswald');
}
add_action('woocommerce_before_shop_loop_item_title', 'oswald_template_loop_product_link', 15);
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 15);

add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 16);

function oswald_template_div_close(){
    echo '</div>';
}
add_action('woocommerce_before_shop_loop_item_title', 'oswald_template_div_close', 16);

add_action('woocommerce_before_shop_loop_item_title', 'oswald_output_wishlist_button_listing', 17);

add_action('woocommerce_before_shop_loop_item_title', 'oswald_template_div_product_links_wrap_close', 17);

// Button for list style
function oswald_products_list_buttons_wrap(){
    echo '<div class="wpd-products_list_buttons">';
}
function oswald_products_list_buttons_wrap_close(){
    echo '</div>';
}
add_action('woocommerce_after_shop_loop_item', 'oswald_products_list_buttons_wrap', 11 );

add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_open', 12 );

add_action('woocommerce_after_shop_loop_item', 'oswald_template_loop_product_link', 13 );
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close',13 );

add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 13 );

add_action('woocommerce_after_shop_loop_item', 'oswald_products_list_buttons_wrap_close', 14 );

// wishlist grid
function oswald_output_wishlist_button_listing() {
    if ( class_exists( 'YITH_WCWL_Shortcode' ) && get_option('yith_wcwl_enabled') == true ) {
        echo '<div class="wpd_add_to_wishlist">'.do_shortcode( '[yith_wcwl_add_to_wishlist]' ).'</div>';
    }
}

// Single page thumbnail
add_filter( 'woocommerce_get_image_size_gallery_thumbnail', 'oswald_image_size_gallery_thumbnail');
function oswald_image_size_gallery_thumbnail($size){
    return array(
        'width' => 200,
        'height' => 200,
        'crop' => 1,
    );
}