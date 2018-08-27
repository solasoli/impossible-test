<?php
    function oswald_get_default_option(){
        $option = get_option( 'oswald_default_options' );
        if (empty($option) ) {
            $standard_options = array( 
                'last_tab' => '', 
                'responsive' => '1', 
                'page_comments' => '1', 
                'preloader' => '', 
                'back_to_top' => '', 
                'add_default_typography_sapcing' => '', 
                'minify_script' => '0', 
                'minify_css' => '0', 
                '404_bg' => array (), 
                'wpd_yith_popup' => '1', 
                'wpd_ajax_search' => '1', 
                'custom_css' => '', 
                'custom_js' => '',  
                'header_custom_js' => '', 
                'wpdaddy_header_builder_id' => array ( 
                    'all_item' => array ( 
                        'layout' => 'all', 
                        'title' => 'All Item', 
                        'content' => array ( 
                            'placebo' => 'placebo', 
                            'burger_sidebar' => array ( 
                                'title' => 'Burger Sidebar', 
                                'has_settings' => '1', 
                                ), 
                            'text3' => array ( 
                                'title' => 'Text/HTML 3', 
                                'has_settings' => '1', 
                                ), 
                            'text4' => array ( 
                                'title' => 'Text/HTML 4', 
                                'has_settings' => '1', 
                                ), 
                            'text5' => array ( 
                                'title' => 'Text/HTML 5', 
                                'has_settings' => '1', 
                                ), 
                            'text6' => array ( 
                                'title' => 'Text/HTML 6', 
                                'has_settings' => '1', 
                                ), 
                            'delimiter1' => array ( 'title' => '|', ), 
                            'delimiter2' => array ( 'title' => '|', ), 
                            'delimiter3' => array ( 'title' => '|', ), 
                            'delimiter4' => array ( 'title' => '|', ), 
                            'delimiter5' => array ( 'title' => '|', ), 
                            'delimiter6' => array ( 'title' => '|', ), 
                            'empty_space2' => array ( 'title' => '&#8592;&#8594;', ), 
                            'empty_space3' => array ( 'title' => '&#8592;&#8594;', ), 
                            'empty_space4' => array ( 'title' => '&#8592;&#8594;', ), 
                        ), 
                    ), 
                    'top_left' => array ( 
                        'layout' => 'one-thirds', 
                        'title' => 'Top Left', 
                        'has_settings' => '1', 
                        'content' => array ( 
                            'placebo' => 'placebo', 
                            ), 
                        ), 
                    'top_center' => array ( 
                        'layout' => 'one-thirds', 
                        'title' => 'Top Center', 
                        'has_settings' => '1', 
                        'content' => array ( 
                            'placebo' => 'placebo', 
                            ), 
                        ), 
                    'top_right' => array ( 
                        'layout' => 'one-thirds', 
                        'title' => 'Top Right', 
                        'has_settings' => '1', 
                        'content' => array ( 
                            'placebo' => 'placebo', 
                            ), 
                        ), 
                    'middle_left' => array ( 
                        'layout' => 'one-thirds clear-item', 
                        'title' => 'Middle Left', 
                        'has_settings' => '1', 
                        'content' => array ( 
                            'placebo' => 'placebo', 
                            'logo' => array ( 
                                'title' => 'Logo', 
                                'has_settings' => '1', 
                                ), 
                            ), 
                        ), 
                    'middle_center' => array ( 
                        'layout' => 'one-thirds', 
                        'title' => 'Middle Center', 
                        'has_settings' => '1', 
                        'content' => array ( 
                            'placebo' => 'placebo', 
                            ), 
                        ), 
                    'middle_right' => array ( 
                        'layout' => 'one-thirds', 
                        'title' => 'Middle Right', 
                        'has_settings' => '1', 
                        'content' => array ( 
                            'placebo' => 'placebo', 
                            'menu' => array ( 
                                'title' => 'Menu', 
                                'has_settings' => '1', 
                            ), 
                            'empty_space5' => array(
                                'title' => '&#8592;&#8594;',  
                                'has_settings' => false,
                            ),
                            'search' => array(
                                'title' => 'Search', 
                                'has_settings' => false,
                            ),
                            'cart' => array(
                                'title' => 'Cart', 
                                'has_settings' => false,
                            ),
                            'text1' => array(
                                'title' => 'Text/HTML 1', 
                                'has_settings' => true,
                            ),
                        ),                             
                    ), 
                    'bottom_left' => array ( 
                        'layout' => 'one-thirds clear-item', 
                        'title' => 'Bottom Left', 
                        'has_settings' => '1', 
                        'content' => array ( 
                            'placebo' => 'placebo', 
                            ), 
                        ), 
                    'bottom_center' => array ( 
                        'layout' => 'one-thirds', 
                        'title' => 'Bottom Center', 
                        'has_settings' => '1', 
                        'content' => array ( 
                            'placebo' => 'placebo', 
                            ), 
                        ), 
                    'bottom_right' => array ( 
                        'layout' => 'one-thirds', 
                        'title' => 'Bottom Right', 
                        'has_settings' => '1', 
                        'content' => array ( 
                            'placebo' => 'placebo', 
                            ), 
                        ), 
                    ), 
                    'header_full_width' => '', 
                    'header_sticky' => '1', 
                    'header_sticky_appearance_style' => 'classic', 
                    'header_sticky_appearance_from_top' => 'auto', 
                    'header_sticky_appearance_number' => array ( 'height' => '300', ), 
                    'header_sticky_shadow' => '1', 
                    'top_left-align' => 'left', 
                    'top_center-align' => 'center', 
                    'top_right-align' => 'right', 
                    'middle_left-align' => 'left', 
                    'middle_center-align' => 'center', 
                    'middle_right-align' => 'right', 
                    'bottom_left-align' => 'left', 
                    'bottom_center-align' => 'center', 
                    'bottom_right-align' => 'right', 
                    'header_logo' => array ( 'url' => '', 'id' => '', 'height' => '', 'width' => '', 'thumbnail' => '', ), 
                    'logo_height_custom' => '1', 'logo_height' => array ( 'height' => '21', ), 
                    'logo_max_height' => '', 
                    'sticky_logo_height' => array ( 'height' => '', ), 
                    'logo_sticky' => array ( 'url' => '', 'id' => '', 'height' => '', 'width' => '', 'thumbnail' => '', ), 
                    'logo_mobile' => array ( 'url' => '', 'id' => '', 'height' => '', 'width' => '', 'thumbnail' => '', ), 
                    'logo_limit_on_mobile' => '', 
                    'logo_mobile_width' => array ( 'width' => '90', ), 
                    'menu_select' => 'main-menu', 
                    'menu_ative_top_line' => '', 
                    'sub_menu_background' => array ( 'color' => '#ffffff', 'alpha' => '1', 'rgba' => 'rgba(255,255,255,1)', ), 
                    'sub_menu_color' => '#222328', 
                    'sub_menu_color_hover' => '#3b55e6', 
                    'burger_sidebar_select' => '', 
                    'login_button_switcher' => '1', 
                    'login_button_color' => '#ffffff', 
                    'login_button_bg_color' => '#3b55e6', 
                    'login_button_color_hover' => '#ffffff', 
                    'login_button_bg_color_hover' => '#3b55e6', 
                    'side_top_background' => array ( 'color' => '#222328', 'alpha' => '1', 'rgba' => 'rgba(34,35,40,1)', ), 
                    'side_top_color' => '#919194', 
                    'side_top_color_hover' => '#ffffff', 
                    'side_top_height' => array ( 'height' => '56', ), 
                    'side_top_border' => '1', 
                    'side_top_border_color' => array ( 'color' => '#ffffff', 'alpha' => '.05', 'rgba' => 'rgba(255,255,255,0.05)', ), 
                    'side_top_sticky' => '', 
                    'side_top_background_sticky' => array ( 'color' => '#222328', 'alpha' => '1', 'rgba' => 'rgba(34,35,40,1)', ), 
                    'side_top_color_sticky' => '#919194', 
                    'side_top_color_hover_sticky' => '#a9aaab', 
                    'side_top_height_sticky' => array ( 'height' => '38', ), 
                    'side_top_mobile' => '', 
                    'side_middle_background' => array ( 'color' => '#222328', 'alpha' => '1', 'rgba' => 'rgba(34,35,40,1)', ), 
                    'side_middle_color' => '#ffffff', 
                    'side_middle_color_hover' => '#a9aaab', 
                    'side_middle_height' => array ( 'height' => '90', ), 
                    'side_middle_border' => '', 
                    'side_middle_border_color' => array ( 'color' => '#ffffff', 'alpha' => '.05', 'rgba' => 'rgba(255,255,255,0.05)', ), 
                    'side_middle_sticky' => '1', 
                    'side_middle_background_sticky' => array ( 'color' => '#222328', 'alpha' => '1', 'rgba' => 'rgba(34,35,40,1)', ), 
                    'side_middle_color_sticky' => '#ffffff', 
                    'side_middle_color_hover_sticky' => '#a9aaab', 
                    'side_middle_height_sticky' => array ( 'height' => '90', ), 
                    'side_middle_mobile' => '1', 
                    'side_bottom_background' => array ( 'color' => '#222328', 'alpha' => '1', 'rgba' => 'rgba(34,35,40,1)', ), 
                    'side_bottom_color' => '#000000', 
                    'side_bottom_color_hover' => '#a9aaab', 
                    'side_bottom_height' => array ( 'height' => '48', ), 
                    'side_bottom_border' => '', 
                    'side_bottom_border_color' => array ( 'color' => '#ffffff', 'alpha' => '.15', 'rgba' => 'rgba(255,255,255,0.15)', ), 
                    'side_bottom_sticky' => '', 
                    'side_bottom_background_sticky' => array ( 'color' => '#222328', 'alpha' => '1', 'rgba' => 'rgba(34,35,40,1)', ), 
                    'side_bottom_color_sticky' => '#000000', 
                    'side_bottom_color_hover_sticky' => '#a9aaab', 
                    'side_bottom_height_sticky' => array ( 'height' => '48', ), 
                    'side_bottom_mobile' => '', 
                    'text1_editor' => '', 
                    'text2_editor' => '', 
                    'text3_editor' => '', 
                    'text4_editor' => '', 
                    'text5_editor' => '', 
                    'text6_editor' => '', 
                    'page_title_conditional' => '1', 
                    'blog_title_conditional' => '',  
                    'page_title_breadcrumbs_conditional' => '1', 
                    'page_title_vert_align' => 'middle', 
                    'page_title_horiz_align' => 'left', 
                    'page_title_font_color' => '#222328', 
                    'page_title_bg_color' => '', 
                    'page_title_bg_image' => array ( 'background-repeat' => 'repeat', 'background-size' => 'cover', 'background-attachment' => 'scroll', 'background-position' => 'center center', 'background-image' => '', 'media' => array ( 'id' => '', 'height' => '', 'width' => '', 'thumbnail' => '', ), ), 
                    'page_title_height' => array ( 'height' => '160', ), 
                    'page_title_top_border' => '', 
                    'page_title_top_border_color' => array ( 'color' => '#eff0ed', 'alpha' => '1', 'rgba' => 'rgba(239,240,237,1)', ), 
                    'page_title_bottom_border' => '', 
                    'page_title_bottom_border_color' => array ( 'color' => '#eff0ed', 'alpha' => '1', 'rgba' => 'rgba(239,240,237,1)', ), 
                    'page_title_bottom_margin' => array ( 'margin-bottom' => '0', ), 
                    'footer_full_width' => '', 
                    'footer_bg_color' => '#222328', 
                    'footer_text_color' => '#9d9d9e', 
                    'footer_heading_color' => '#ffffff', 
                    'footer_bg_image' => array ( 'background-repeat' => 'repeat', 'background-size' => 'cover', 'background-attachment' => 'scroll', 'background-position' => 'center center', 'background-image' => '', 'media' => array ( 'id' => '', 'height' => '', 'width' => '', 'thumbnail' => '', ), ), 
                    'footer_bottom_margin' => array ( 'margin-top' => '40', ), 
                    'footer_switch' => '1', 
                    'footer_column' => '4', 
                    'footer_column2' => '6-6', 
                    'footer_column3' => '4-4-4', 
                    'footer_column5' => '2-3-2-2-3', 
                    'footer_align' => 'left', 
                    'footer_spacing' => array ( 'padding-top' => '70', 'padding-right' => '0', 'padding-bottom' => '40', 'padding-left' => '0', ), 
                    'copyright_switch' => '1', 
                    'copyright_column' => '2', 
                    'copyright_align' => 'left', 
                    'copyright_align_2' => 'right', 
                    'copyright_align_3' => 'right', 
                    'copyright_spacing' => array ( 'padding-top' => '14', 'padding-right' => '0', 'padding-bottom' => '14', 'padding-left' => '0', ), 
                    'copyright_bg_color' => '#222328', 
                    'copyright_text_color' => '#898a8e', 
                    'copyright_heading_color' => '#ffffff', 
                    'copyright_top_border' => '1', 
                    'copyright_top_border_color' => array ( 'color' => '#39393e', 'alpha' => '1', 'rgba' => 'rgba(50,50,50,1)', ), 
                    'pre_footer_switch' => '', 
                    'pre_footer_editor' => '', 
                    'pre_footer_align' => 'center', 
                    'pre_footer_spacing' => array ( 'padding-top' => '20', 'padding-right' => '0', 'padding-bottom' => '20', 'padding-left' => '0', ), 
                    'pre_footer_bottom_border' => '1', 
                    'pre_footer_bottom_border_color' => array ( 'color' => '#e0e1dc', 'alpha' => '1', 'rgba' => 'rgba(224,225,220,1)', ), 
                    'related_posts' => '0', 
                    'author_box' => '1', 
                    'post_comments' => '1', 
                    'post_pingbacks' => '1', 
                    'blog_post_author' => '1', 
                    'blog_post_likes' => '', 
                    'blog_post_date' => '0', 
                    'blog_post_comment' => '1', 
                    'blog_post_share' => '', 
                    'blog_post_listing_content' => '', 
                    'page_sidebar_layout' => 'none', 
                    'page_sidebar_def' => '', 
                    'blog_single_sidebar_layout' => 'right', 
                    'blog_single_sidebar_def' => 'sidebar_blog', 
                    'sidebars' => array ( 0 => 'Main Sidebar', 1 => 'Blog' ), 
                    'theme-custom-color' => '#3b55e6', 
                    'theme-custom-color2' => '#f75757', 
                    'body-background-color' => '#ffffff', 
                    'theme-adding-text-color' => '#9ba0b5', 
                    'menu-font' => array ( 'font-family' => 'Montserrat', 'font-options' => '', 'google' => '1', 'font-weight' => '500', 'font-style' => '', 'subsets' => 'latin', 'text-transform' => 'uppercase', 'font-size' => '12px', 'line-height' => '28px', ), 
                    'main-font' => array ( 'font-family' => 'Open Sans', 'font-options' => '', 'google' => '1', 'font-weight' => '400', 'font-style' => '', 'subsets' => 'latin', 'font-size' => '14px', 'line-height' => '24px', 'color' => '#3a405b', 'all-style' => '["100","200","300","400","500","600","700","800","900","100italic","200italic","300italic","400italic","500italic","600italic","700italic","800italic","900italic"]', ), 
                    'header-font' => array ( 'font-family' => 'Montserrat', 'font-options' => '', 'google' => '1', 'font-weight' => '400', 'font-style' => '', 'subsets' => 'latin', 'color' => '#222328', 'all-style' => '["300","400","500","600","700","800","900","300italic","400italic","500italic","600italic","700italic"]' ), 
                    'h1-font' => array ( 'font-family' => 'Montserrat', 'font-options' => '', 'google' => '1', 'font-weight' => '900', 'font-style' => '', 'subsets' => 'latin', 'font-size' => '36px', 'line-height' => '43px', ), 
                    'h2-font' => array ( 'font-family' => 'Montserrat', 'font-options' => '', 'google' => '1', 'font-weight' => '900', 'font-style' => '', 'subsets' => 'latin', 'font-size' => '30px', 'line-height' => '40px', ), 
                    'h3-font' => array ( 'font-family' => '', 'font-options' => '', 'google' => '1', 'font-weight' => '', 'font-style' => '', 'subsets' => '', 'font-size' => '24px', 'line-height' => '36px', ), 
                    'h4-font' => array ( 'font-family' => '', 'font-options' => '', 'google' => '1', 'font-weight' => '', 'font-style' => '', 'subsets' => '', 'font-size' => '20px', 'line-height' => '33px', ), 
                    'h5-font' => array ( 'font-family' => '', 'font-options' => '', 'google' => '1', 'font-weight' => '', 'font-style' => '', 'subsets' => '', 'font-size' => '16px', 'line-height' => '28px', ), 
                    'h6-font' => array ( 'font-family' => '', 'font-options' => '', 'google' => '1', 'font-weight' => '', 'font-style' => '', 'subsets' => '', 'font-size' => '14px', 'line-height' => '24px', ), 
                    'secondary-font' => array ( 'font-family' => 'Crimson Text', 'font-options' => '', 'google' => '1', 'font-weight' => '400', 'font-style' => 'italic', 'subsets' => 'latin', ),
                    'products_sidebar_layout' => 'none', 
                    'products_sidebar_def' => '', 
                    'products_per_page' => '9', 
                    'woocommerce_def_columns' => '3', 
                    'product_sidebar_layout' => 'none', 
                    'product_sidebar_def' => '', 
                    'shop_title_conditional' => '', 
                    'next_prev_product' => '', 
                    'share_social' => '', 
                    'wpdaddy_auto_update' => '1', 
                    'opt-presets' => 0, 
                    'header_templates-start' => '', 
                    'header_templates-end' => '', 
                    'main_header_settings-start' => '', 
                    'main_header_settings-end' => '', 
                    'top_left-start' => '', 
                    'top_left-end' => '', 
                    'top_center-start' => '', 
                    'top_center-end' => '', 
                    'top_right-start' => '', 
                    'top_right-end' => '', 
                    'middle_left-start' => '', 
                    'middle_left-end' => '', 
                    'middle_center-start' => '', 
                    'middle_center-end' => '', 
                    'middle_right-start' => '', 
                    'middle_right-end' => '', 
                    'bottom_left-start' => '', 
                    'bottom_left-end' => '', 
                    'bottom_center-start' => '', 
                    'bottom_center-end' => '', 
                    'bottom_right-start' => '', 
                    'bottom_right-end' => '', 
                    'logo-start' => '', 
                    'logo-end' => '', 
                    'menu-start' => '', 
                    'menu-end' => '', 
                    'burger_sidebar-start' => '', 
                    'burger_sidebar-end' => '', 
                    'login-start' => '', 
                    'login-end' => '', 
                    'side_top-start' => '', 
                    'side_top-end' => '', 
                    'side_middle-start' => '', 
                    'side_middle-end' => '', 
                    'side_bottom-start' => '', 
                    'side_bottom-end' => '', 
                    'text1-start' => '', 
                    'text1-end' => '', 
                    'text2-start' => '', 
                    'text2-end' => '', 
                    'text3-start' => '', 
                    'text3-end' => '', 
                    'text4-start' => '', 
                    'text4-end' => '', 
                    'text5-start' => '', 
                    'text5-end' => '', 
                    'text6-start' => '', 
                    'text6-end' => '', 
                    'page_title-start' => '', 
                    'page_title-end' => '', 
                    'footer-start' => '', 
                    'footer-end' => '', 
                    'copyright-start' => '', 
                    'copyright-end' => '', 
            );

            $oswald_option = get_option( 'oswald' );
            if (empty($oswald_option)) {
                $oswald_option = array();
            }

            update_option( 'oswald', $oswald_option );
            update_option( 'oswald_default_options', $standard_options );
        }
    }

    oswald_get_default_option();
    if (  !class_exists( 'wpdaddy_core' ) ) {
        function oswald_fonts_url(){
            $font_url = ''; 
            $montserrat = _x( 'on', 'Montserrat font: on or off', 'oswald' );
            if ( 'off' !== $montserrat ) {
                $font_url = add_query_arg( 'family', urlencode('Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i' ), "//fonts.googleapis.com/css" );
            }
            return esc_url_raw( $font_url );
        }
        
        function oswald_font_scripts_styles(){
        $theme_option = get_option( 'oswald' );
        if (empty($theme_option)) {
            wp_enqueue_style( 'oswald-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic%7COpen+Sans:300,400,600,700,800,300italic,400italic,600italic,700italic,800italic%7CCrimson+Text:400italic&amp;subset=latin', array(), null );
            return;
        }
            $google_fonts_out_array = oswald_get_google_font_array();
            $google_fonts_out_string = oswald_google_fonts_array_to_string($google_fonts_out_array);
            $google_fonts_out_subsets = oswald_get_font_subsets($google_fonts_out_array);

            wp_enqueue_style( 'oswald-fonts', 'https://fonts.googleapis.com/css?family='.$google_fonts_out_string, array(), null );
        }
        add_action( 'wp_enqueue_scripts', 'oswald_font_scripts_styles' );
    }

    function oswald_google_fonts_array_to_string($fonts_array){
        $fonts_string = '';
        if (!empty($fonts_array) && is_array($fonts_array)) {
            foreach ($fonts_array as $font => $value) {
                if (!empty($fonts_string)) {
                    $fonts_string .= '%7C';
                }
                $fonts_string .= urlencode($font). ':';                
                if (!empty($value['all-style'])) {
                    $fonts_string .= implode(',',$value['all-style']);
                }
            }
        }
        return $fonts_string;
    }

    function oswald_get_google_font_array(){
        $fonts = array(
            'menu-font',
            'main-font',
            'header-font',
            'h1-font',
            'h2-font',
            'h3-font',
            'h4-font',
            'h5-font',
            'h6-font',
            'secondary-font',
        );

        $google_fonts_out_array = array();

        foreach ($fonts as $font) {
            $font_options = oswald_option($font);
            if (!empty($font_options)) {
                if (!is_array($font_options)) {
                    $font_options = json_decode( $font_options, true );
                }
            }
            if (!empty($font_options['font-family'])) {                    
                if (empty($google_fonts_out_array[$font_options['font-family']])) {
                    $google_fonts_out_array[$font_options['font-family']] = array();
                }

                $font_styles = array();
                if (!empty($font_options['all-style'])) {
                    $font_styles = json_decode( $font_options['all-style'], true );
                }elseif(!empty($font_options['font-weight'])){
                    $font_styles[] = $font_options['font-weight'].(!empty($font_options['font-style']) ? $font_options['font-style'] : '');
                }

                if (!empty($font_options['subsets'])) {
                    if (empty($google_fonts_out_array[$font_options['font-family']]['subsets'])) {
                        $google_fonts_out_array[$font_options['font-family']]['subsets'] = array();
                        $google_fonts_out_array[$font_options['font-family']]['subsets'][] = $font_options['subsets'];
                    }else{
                        $google_fonts_out_array[$font_options['font-family']]['subsets'] = array_unique(
                            array_merge(
                                $google_fonts_out_array[$font_options['font-family']]['subsets'], 
                                array($font_options['subsets']))
                        );
                    } 
                }
           
                if (empty($google_fonts_out_array[$font_options['font-family']]['all-style'])) {
                    $google_fonts_out_array[$font_options['font-family']]['all-style'] = $font_styles;
                }else{
                    $google_fonts_out_array[$font_options['font-family']]['all-style'] = array_unique(array_merge($google_fonts_out_array[$font_options['font-family']]['all-style'], $font_styles));
                }                     

            }
        }
        return $google_fonts_out_array;
    }

    function oswald_get_font_subsets($fonts_array){
        $fonts_string = '';
        if (!empty($fonts_array) && is_array($fonts_array)) {
            foreach ($fonts_array as $font => $value) {       
                if (!empty($value['subsets'])) {
                    $fonts_string .= implode(',',$value['subsets']);
                }
            }
        }
        return $fonts_string;
    }

    function oswald_header_presets(){
        $header_presets = array();
        $header_presets = apply_filters( 'oswald_header_extend_presets', $header_presets );

        // Lite Headers
        $header_presets['header_lite_preset_1'] = '{"all_item":{"layout":"all","title":"All Item","content":{"placebo":"placebo","login":{"title":"Login","has_settings":"1"},"wpml":{"title":"WPML"},"burger_sidebar":{"title":"Burger Sidebar","has_settings":"1"},"text2":{"title":"Text/HTML 2","has_settings":"1"},"empty_space1":{"title":"&#8592;&#8594;"},"text3":{"title":"Text/HTML 3","has_settings":"1"},"text4":{"title":"Text/HTML 4","has_settings":"1"},"text5":{"title":"Text/HTML 5","has_settings":"1"},"text6":{"title":"Text/HTML 6","has_settings":"1"},"delimiter1":{"title":"|"},"delimiter2":{"title":"|"},"delimiter3":{"title":"|"},"delimiter4":{"title":"|"},"delimiter5":{"title":"|"},"delimiter6":{"title":"|"},"empty_space2":{"title":"&#8592;&#8594;"},"empty_space3":{"title":"&#8592;&#8594;"},"empty_space4":{"title":"&#8592;&#8594;"}}},"top_left":{"layout":"one-thirds","title":"Top Left","has_settings":"1","content":{"placebo":"placebo"}},"top_center":{"layout":"one-thirds","title":"Top Center","has_settings":"1","content":{"placebo":"placebo"}},"top_right":{"layout":"one-thirds","title":"Top Right","has_settings":"1","content":{"placebo":"placebo"}},"middle_left":{"layout":"one-thirds clear-item","title":"Middle Left","has_settings":"1","content":{"placebo":"placebo","logo":{"title":"Logo","has_settings":"1"}}},"middle_center":{"layout":"one-thirds","title":"Middle Center","has_settings":"1","content":{"placebo":"placebo"}},"middle_right":{"layout":"one-thirds","title":"Middle Right","has_settings":"1","content":{"placebo":"placebo","menu":{"title":"Menu","has_settings":"1"},"empty_space5":{"title":"&#8592;&#8594;"},"search":{"title":"Search"},"cart":{"title":"Cart"},"text1":{"title":"Text/HTML 1","has_settings":"1"}}},"bottom_left":{"layout":"one-thirds clear-item","title":"Bottom Left","has_settings":"1","content":{"placebo":"placebo"}},"bottom_center":{"layout":"one-thirds","title":"Bottom Center","has_settings":"1","content":{"placebo":"placebo"}},"bottom_right":{"layout":"one-thirds","title":"Bottom Right","has_settings":"1","content":{"placebo":"placebo"}}}';

        $header_presets['header_lite_preset_2'] = '{"all_item":{"layout":"all","title":"All Item","content":{"placebo":"placebo","login":{"title":"Login","has_settings":"1"},"wpml":{"title":"WPML"},"burger_sidebar":{"title":"Burger Sidebar","has_settings":"1"},"text2":{"title":"Text/HTML 2","has_settings":"1"},"empty_space1":{"title":"&#8592;&#8594;"},"text3":{"title":"Text/HTML 3","has_settings":"1"},"text4":{"title":"Text/HTML 4","has_settings":"1"},"text5":{"title":"Text/HTML 5","has_settings":"1"},"text6":{"title":"Text/HTML 6","has_settings":"1"},"delimiter1":{"title":"|"},"delimiter2":{"title":"|"},"delimiter3":{"title":"|"},"delimiter4":{"title":"|"},"delimiter5":{"title":"|"},"delimiter6":{"title":"|"},"empty_space2":{"title":"&#8592;&#8594;"},"empty_space3":{"title":"&#8592;&#8594;"},"empty_space4":{"title":"&#8592;&#8594;"}}},"top_left":{"layout":"one-thirds","title":"Top Left","has_settings":"1","content":{"placebo":"placebo"}},"top_center":{"layout":"one-thirds","title":"Top Center","has_settings":"1","content":{"placebo":"placebo"}},"top_right":{"layout":"one-thirds","title":"Top Right","has_settings":"1","content":{"placebo":"placebo"}},"middle_left":{"layout":"one-thirds clear-item","title":"Middle Left","has_settings":"1","content":{"placebo":"placebo"}},"middle_center":{"layout":"one-thirds","title":"Middle Center","has_settings":"1","content":{"placebo":"placebo","logo":{"title":"Logo","has_settings":"1"}}},"middle_right":{"layout":"one-thirds","title":"Middle Right","has_settings":"1","content":{"placebo":"placebo"}},"bottom_left":{"layout":"one-thirds clear-item","title":"Bottom Left","has_settings":"1","content":{"placebo":"placebo"}},"bottom_center":{"layout":"one-thirds","title":"Bottom Center","has_settings":"1","content":{"placebo":"placebo","menu":{"title":"Menu","has_settings":"1"},"empty_space5":{"title":"&#8592;&#8594;"},"search":{"title":"Search"},"cart":{"title":"Cart"},"text1":{"title":"Text/HTML 1","has_settings":"1"}}},"bottom_right":{"layout":"one-thirds","title":"Bottom Right","has_settings":"1","content":{"placebo":"placebo"}}}';

        $header_presets['header_lite_preset_3'] = '{"all_item":{"layout":"all","title":"All Item","content":{"placebo":"placebo","login":{"title":"Login","has_settings":"1"},"wpml":{"title":"WPML"},"burger_sidebar":{"title":"Burger Sidebar","has_settings":"1"},"text2":{"title":"Text/HTML 2","has_settings":"1"},"empty_space1":{"title":"&#8592;&#8594;"},"text3":{"title":"Text/HTML 3","has_settings":"1"},"text4":{"title":"Text/HTML 4","has_settings":"1"},"text5":{"title":"Text/HTML 5","has_settings":"1"},"text6":{"title":"Text/HTML 6","has_settings":"1"},"delimiter1":{"title":"|"},"delimiter2":{"title":"|"},"delimiter3":{"title":"|"},"delimiter4":{"title":"|"},"delimiter5":{"title":"|"},"delimiter6":{"title":"|"},"empty_space2":{"title":"&#8592;&#8594;"},"empty_space3":{"title":"&#8592;&#8594;"},"empty_space4":{"title":"&#8592;&#8594;"}}},"top_left":{"layout":"one-thirds","title":"Top Left","has_settings":"1","content":{"placebo":"placebo"}},"top_center":{"layout":"one-thirds","title":"Top Center","has_settings":"1","content":{"placebo":"placebo"}},"top_right":{"layout":"one-thirds","title":"Top Right","has_settings":"1","content":{"placebo":"placebo"}},"middle_left":{"layout":"one-thirds clear-item","title":"Middle Left","has_settings":"1","content":{"placebo":"placebo","text1":{"title":"Text/HTML 1","has_settings":"1"},"cart":{"title":"Cart"},"search":{"title":"Search"},"empty_space5":{"title":"&#8592;&#8594;"},"menu":{"title":"Menu","has_settings":"1"}}},"middle_center":{"layout":"one-thirds","title":"Middle Center","has_settings":"1","content":{"placebo":"placebo"}},"middle_right":{"layout":"one-thirds","title":"Middle Right","has_settings":"1","content":{"placebo":"placebo","logo":{"title":"Logo","has_settings":"1"}}},"bottom_left":{"layout":"one-thirds clear-item","title":"Bottom Left","has_settings":"1","content":{"placebo":"placebo"}},"bottom_center":{"layout":"one-thirds","title":"Bottom Center","has_settings":"1","content":{"placebo":"placebo"}},"bottom_right":{"layout":"one-thirds","title":"Bottom Right","has_settings":"1","content":{"placebo":"placebo"}}}';

        return $header_presets;
    }
    