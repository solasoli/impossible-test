<?php
 
    if ( !class_exists( 'Redux' ) ) {
        return;
    }

    $theme = wp_get_theme(); 
    $opt_name = 'oswald';

    $args = array(
        'opt_name'             => $opt_name,
        'display_name'         => $theme->get( 'Name' ),
        'display_version'      => $theme->get( 'Version' ),
        'menu_type'            => 'menu',
        'allow_sub_menu'       => true,
        'menu_title'           => esc_html__('Theme Options', 'oswald' ),
        'page_title'           => esc_html__('Theme Options', 'oswald' ),
        'google_api_key'       => '',
        'google_update_weekly' => false,
        'async_typography'     => true,
        'admin_bar'            => true,
        'admin_bar_icon'       => 'dashicons-admin-generic',
        'admin_bar_priority'   => 50,
        'global_variable'      => '',
        'dev_mode'             => false,
        'update_notice'        => true,
        'customizer'           => true,
        'page_priority'        => null,
        'page_parent'          => 'themes.php',
        'page_permissions'     => 'manage_options',
        'menu_icon'            => 'dashicons-admin-generic',
        'last_tab'             => '',
        'page_icon'            => 'icon-themes',
        'page_slug'            => '',
        'save_defaults'        => true,
        'default_show'         => false,
        'default_mark'         => '',
        'show_import_export'   => true,
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        'output_tag'           => true,
        'database'             => '',
        'use_cdn'              => true,
    );


    Redux::setArgs( $opt_name, $args );

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General', 'oswald' ),
        'id'               => 'general',
        'customizer_width' => '400px',
        'icon'             => 'el el-home',
        'customizer'           => true,
        'fields'           => array(
            array(
                'id'       => 'responsive',
                'type'     => 'switch',
                'title'    => esc_html__( 'Responsive', 'oswald' ),
                'default'  => true,
            ),
            array(
                'id'       => 'page_comments',
                'type'     => 'switch',
                'title'    => esc_html__( 'Page Comments', 'oswald' ),
                'default'  => true,
            ),
            array(
                'id'       => 'preloader',
                'type'     => 'switch',
                'title'    => esc_html__( 'Preloader', 'oswald' ),
                'default'  => false,
            ),
            array(
                'id'       => 'preloader_background',
                'type'     => 'color',
                'title'    => esc_html__( 'Preloader Background', 'oswald' ),
                'subtitle' => esc_html__( 'Set Preloader Background', 'oswald' ),
                'default'  => '#ffffff',
                'transparent' => false,
                'required' => array( 'preloader', '=', '1' ),
            ),
            array(
                'id'       => 'preloader_item_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Preloader Item Color', 'oswald' ),
                'subtitle' => esc_html__( 'Set Plreloader Item Color', 'oswald' ),
                'default'  => '#000000',
                'transparent' => false,
                'required' => array( 'preloader', '=', '1' ),
            ),
            array(
                'id'       => 'preloader_item_logo',
                'type'     => 'media',
                'title'    => esc_html__( 'Preloader Logo', 'oswald' ),
                'required' => array( 'preloader', '=', '1' ),
            ),
            array(
                'id'       => 'preloader_full',
                'type'     => 'switch',
                'title'    => esc_html__( 'Preloader Fullscreen', 'oswald' ),
                'default'  => true,
                'required' => array( 'preloader', '=', '1' ),
            ),
            array(
                'id'       => 'back_to_top',
                'type'     => 'switch',
                'title'    => esc_html__( 'Back to Top', 'oswald' ),
                'default'  => true,
            ),
            array(
                'id'       => 'add_default_typography_sapcing',
                'type'     => 'switch',
                'title'    => esc_html__( 'Add Default Typography Spacings', 'oswald' ),
                'default'  => false,
            ),
            array(
                'id'       => 'minify_script',
                'type'     => 'switch',
                'title'    => esc_html__( 'Minify Theme Script', 'oswald' ),
                'default'  => true,
            ),
            array(
                'id'       => 'minify_css',
                'type'     => 'switch',
                'title'    => esc_html__( 'Minify Theme Styles', 'oswald' ),
                'default'  => true,
            ),
            array(
                'id'       => 'boxed_style',
                'type'     => 'switch',
                'title'    => esc_html__( 'Boxed Styles', 'oswald' ),
                'default'  => false,
            ),
            array(
                'id'       => '404_bg',
                'type'     => 'media',
                'title'    => esc_html__( '404 image', 'oswald' ),
            ),
            array(
                'id'       => 'wpd_yith_popup',
                'type'     => 'switch',
                'title'    => esc_html__( 'Activate custom styling for YITH WooCommerce Popup Plugin', 'oswald' ),
                'subtitle' => esc_html__( 'We recommend setting false if you are using the Premium version of this plugin.', 'oswald' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wpd_ajax_search',
                'type'     => 'switch',
                'title'    => esc_html__( 'Activate custom styling for Ajax Search Lite Plugin', 'oswald' ),
                'subtitle' => esc_html__( 'We recommend setting false if you are using the Premium version of this plugin.', 'oswald' ),
                'default'  => true,
            ),
            array(
                'id'       => 'custom_css',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'Custom CSS', 'oswald' ),
                'subtitle' => esc_html__( 'Paste your CSS code here.', 'oswald' ),
                'mode'     => 'css',
                'theme'    => 'monokai',
                'default'  => ""
            ),
            array(
                'id'       => 'custom_js',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'Custom JS', 'oswald' ),
                'subtitle' => esc_html__( 'Paste your JS code here.', 'oswald' ),
                'mode'     => 'javascript',
                'theme'    => 'chrome',
                'default'  => "jQuery(document).ready(function(){\n\n});"
            ),
            array(
                'id'       => 'header_custom_js',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'Custom JS', 'oswald' ),
                'subtitle' => esc_html__( 'Code to be added inside HEAD tag', 'oswald' ),
                'mode'     => 'html',
                'theme'    => 'chrome',
                'default'  => "<script type='text/javascript'>\njQuery(document).ready(function(){\n\n});\n</script>"
            ),
        ),
    ) );


    // HEADER
            if (function_exists('oswald_header_presets')) {
                $presets = oswald_header_presets();
                $header_preset_1 = $presets['header_preset_1'];
                $header_preset_2 = $presets['header_preset_2'];
                $header_preset_3 = $presets['header_preset_3'];
                $header_preset_4 = $presets['header_preset_4'];
            } else{
                $header_preset_1 = '';
                $header_preset_2 = '';
                $header_preset_3 = '';
                $header_preset_4 = '';
            }

            function oswald_getMenuList(){
                $menus = wp_get_nav_menus();
                $menu_list = array();
                
                foreach ($menus as $menu => $menu_obj) {
                    $menu_list[$menu_obj->slug] = $menu_obj->name;
                }
                return $menu_list;
            }      

            $options = array(
                array(
                    'id'   => 'wpdaddy_header_builder_id',
                    'type' => 'wpdaddy_header_builder',
                    'full_width' => true,
                    'options' => array(
                        'all_item' => array(
                            'title' => 'All Item', 
                            'layout' => 'all',
                            'content' => array(
                                'search' => array(
                                    'title' => 'Search', 
                                    'has_settings' => false,
                                ),
                                'login' => array(
                                    'title' => 'Login', 
                                    'has_settings' => true,
                                ),
                                'wpml' => array(
                                    'title' => 'WPML', 
                                    'has_settings' => false,
                                ),
                                'cart' => array(
                                    'title' => 'Cart', 
                                    'has_settings' => false,
                                ),
                                'burger_sidebar' => array(
                                    'title' => 'Burger Sidebar', 
                                    'has_settings' => true,
                                ),
                                'text1' => array(
                                    'title' => 'Text/HTML 1', 
                                    'has_settings' => true,
                                ),
                                'text2' => array(
                                    'title' => 'Text/HTML 2', 
                                    'has_settings' => true,
                                ),
                                
                                'text3' => array(
                                    'title' => 'Text/HTML 3', 
                                    'has_settings' => true,
                                ),
                                'text4' => array(
                                    'title' => 'Text/HTML 4', 
                                    'has_settings' => true,
                                ),
                                
                                'text5' => array(
                                    'title' => 'Text/HTML 5', 
                                    'has_settings' => true,
                                ),
                                'text6' => array(
                                    'title' => 'Text/HTML 6', 
                                    'has_settings' => true,
                                ),
                                'delimiter1' => array(
                                    'title' => '|', 
                                    'has_settings' => false,
                                ),
                                'delimiter2' => array(
                                    'title' => '|', 
                                    'has_settings' => false,
                                ),
                                'delimiter3' => array(
                                    'title' => '|', 
                                    'has_settings' => false,
                                ),
                                'delimiter4' => array(
                                    'title' => '|', 
                                    'has_settings' => false,
                                ),
                                'delimiter5' => array(
                                    'title' => '|', 
                                    'has_settings' => false,
                                ),
                                'delimiter6' => array(
                                    'title' => '|', 
                                    'has_settings' => false,
                                ),
                                'empty_space1' => array(
                                    'title' => '&#8592;&#8594;', 
                                    'has_settings' => false,
                                ),
                                'empty_space2' => array(
                                    'title' => '&#8592;&#8594;', 
                                    'has_settings' => false,
                                ),
                                'empty_space3' => array(
                                    'title' => '&#8592;&#8594;', 
                                    'has_settings' => false,
                                ),
                                'empty_space4' => array(
                                    'title' => '&#8592;&#8594;', 
                                    'has_settings' => false,
                                ),
                                'empty_space5' => array(
                                    'title' => '&#8592;&#8594;',  
                                    'has_settings' => false,
                                ),
                            ),
                        ),
                        'top_left' => array(
                            'title' => 'Top Left', 
                            'has_settings' => true,
                            'layout' => 'one-thirds',
                            'content' => array(
                            ),
                        ),
                        'top_center' => array(
                            'title' => 'Top Center', 
                            'has_settings' => true,
                            'layout' => 'one-thirds',
                            'content' => array(                                    
                            ),
                        ),
                        'top_right' => array(
                            'title' => 'Top Right', 
                            'has_settings' => true,
                            'layout' => 'one-thirds',
                            'content' => array(
                            ),
                        ),
                        'middle_left' => array(
                            'title' => 'Middle Left', 
                            'has_settings' => true,
                            'layout' => 'one-thirds clear-item',
                            'content' => array(
                                'logo' => array(
                                    'title' => 'Logo', 
                                    'has_settings' => true,
                                ),
                            ),
                        ),
                        'middle_center' => array(
                            'title' => 'Middle Center', 
                            'has_settings' => true,
                            'layout' => 'one-thirds',
                            'content' => array(

                            ),
                        ),
                        'middle_right' => array(
                            'title' => 'Middle Right', 
                            'has_settings' => true,
                            'layout' => 'one-thirds',
                            'content' => array(
                                'menu' => array(
                                    'title' => 'Menu', 
                                    'has_settings' => true,
                                ),
                            ),
                        ),
                        'bottom_left' => array(
                            'title' => 'Bottom Left', 
                            'has_settings' => true,
                            'layout' => 'one-thirds clear-item',
                            'content' => array(

                            ),
                        ),
                        'bottom_center' => array(
                            'title' => 'Bottom Center', 
                            'has_settings' => true,
                            'layout' => 'one-thirds',
                            'content' => array(

                            ),
                        ),
                        'bottom_right' => array(
                            'title' => 'Bottom Right', 
                            'has_settings' => true,
                            'layout' => 'one-thirds',
                            'content' => array(

                            ),
                        ),
                    ),
                    'default' => array(
                        'all_item' => array(
                            'title' => 'All Item', 
                            'layout' => 'all',
                            'content' => array(
                                'search' => array(
                                    'title' => 'Search', 
                                    'has_settings' => false,
                                ),
                                'login' => array(
                                    'title' => 'Login', 
                                    'has_settings' => true,
                                ),
                                'wpml' => array(
                                    'title' => 'WPML', 
                                    'has_settings' => false,
                                ),
                                'cart' => array(
                                    'title' => 'Cart', 
                                    'has_settings' => false,
                                ),
                                'burger_sidebar' => array(
                                    'title' => 'Burger Sidebar', 
                                    'has_settings' => true,
                                ),
                                'text1' => array(
                                    'title' => 'Text/HTML 1', 
                                    'has_settings' => true,
                                ),
                                'text2' => array(
                                    'title' => 'Text/HTML 2', 
                                    'has_settings' => true,
                                ),
                                
                                'text3' => array(
                                    'title' => 'Text/HTML 3', 
                                    'has_settings' => true,
                                ),
                                'text4' => array(
                                    'title' => 'Text/HTML 4', 
                                    'has_settings' => true,
                                ),
                                
                                'text5' => array(
                                    'title' => 'Text/HTML 5', 
                                    'has_settings' => true,
                                ),
                                'text6' => array(
                                    'title' => 'Text/HTML 6', 
                                    'has_settings' => true,
                                ),
                                'delimiter1' => array(
                                    'title' => '|', 
                                    'has_settings' => false,
                                ),
                                'delimiter2' => array(
                                    'title' => '|', 
                                    'has_settings' => false,
                                ),
                                'delimiter3' => array(
                                    'title' => '|', 
                                    'has_settings' => false,
                                ),
                                'delimiter4' => array(
                                    'title' => '|', 
                                    'has_settings' => false,
                                ),
                                'delimiter5' => array(
                                    'title' => '|', 
                                    'has_settings' => false,
                                ),
                                'delimiter6' => array(
                                    'title' => '|', 
                                    'has_settings' => false,
                                ),
                                'empty_space1' => array(
                                    'title' => '&#8592;&#8594;', 
                                    'has_settings' => false,
                                ),
                                'empty_space2' => array(
                                    'title' => '&#8592;&#8594;', 
                                    'has_settings' => false,
                                ),
                                'empty_space3' => array(
                                    'title' => '&#8592;&#8594;', 
                                    'has_settings' => false,
                                ),
                                'empty_space4' => array(
                                    'title' => '&#8592;&#8594;', 
                                    'has_settings' => false,
                                ),
                                'empty_space5' => array(
                                    'title' => '&#8592;&#8594;',  
                                    'has_settings' => false,
                                ),
                            ),
                        ),
                        'top_left' => array(
                            'title' => 'Top Left', 
                            'has_settings' => true,
                            'layout' => 'one-thirds',
                            'content' => array(
                            ),
                        ),
                        'top_center' => array(
                            'title' => 'Top Center', 
                            'has_settings' => true,
                            'layout' => 'one-thirds',
                            'content' => array(                                    
                            ),
                        ),
                        'top_right' => array(
                            'title' => 'Top Right', 
                            'has_settings' => true,
                            'layout' => 'one-thirds',
                            'content' => array(
                            ),
                        ),
                        'middle_left' => array(
                            'title' => 'Middle Left', 
                            'has_settings' => true,
                            'layout' => 'one-thirds clear-item',
                            'content' => array(
                                'logo' => array(
                                    'title' => 'Logo', 
                                    'has_settings' => true,
                                ),
                            ),
                        ),
                        'middle_center' => array(
                            'title' => 'Middle Center', 
                            'has_settings' => true,
                            'layout' => 'one-thirds',
                            'content' => array(

                            ),
                        ),
                        'middle_right' => array(
                            'title' => 'Middle Right', 
                            'has_settings' => true,
                            'layout' => 'one-thirds',
                            'content' => array(
                                'menu' => array(
                                    'title' => 'Menu', 
                                    'has_settings' => true,
                                ),
                            ),
                        ),
                        'bottom_left' => array(
                            'title' => 'Bottom Left', 
                            'has_settings' => true,
                            'layout' => 'one-thirds clear-item',
                            'content' => array(

                            ),
                        ),
                        'bottom_center' => array(
                            'title' => 'Bottom Center', 
                            'has_settings' => true,
                            'layout' => 'one-thirds',
                            'content' => array(

                            ),
                        ),
                        'bottom_right' => array(
                            'title' => 'Bottom Right', 
                            'has_settings' => true,
                            'layout' => 'one-thirds',
                            'content' => array(
                            ),
                        ),
                    ),
                ),

                //HEADER TEMPLATES
                // MAIN HEADER SETTINGS
                array(
                    'id'       => 'header_templates-start',
                    'type'     => 'wpdaddy_section',
                    'title'    => esc_html__( 'Header Templates', 'oswald' ),
                    'indent'   => false,
                    'section_role' => 'start'
                ),

                array(
                    'id'         => 'opt-presets',
                    'type'       => 'image_select',
                    'presets'    => true,
                    'full_width' => true,
                    'title'      => esc_html__( 'Preset', 'oswald' ),
                    'subtitle'   => esc_html__( 'This allows you to set default header layout.', 'oswald' ),
                    'default'    => 0,
                    'options'    => array(
                        '1' => array(
                            'alt'     => 'Header 1',
                            'img'     => esc_url(ReduxFramework::$_url) . 'assets/img/header_1.jpg',
                            'presets' => $header_preset_1
                        ),
                        '2' => array(
                            'alt'     => 'Header 2',
                            'img'     => esc_url(ReduxFramework::$_url) . 'assets/img/header_2.jpg',
                            'presets' => $header_preset_2
                        ),
                        '3' => array(
                            'alt'     => 'Header 3',
                            'img'     => esc_url(ReduxFramework::$_url) . 'assets/img/header_3.jpg',
                            'presets' => $header_preset_3
                        ),
                        '4' => array(
                            'alt'     => 'Header 4',
                            'img'     => esc_url(ReduxFramework::$_url) . 'assets/img/header_4.jpg',
                            'presets' => $header_preset_4
                        ),
                    ),
                ),
                array(
                    'id'     => 'header_templates-end',
                    'type'   => 'wpdaddy_section',
                    'indent' => false, 
                    'section_role' => 'end'
                ),



                // MAIN HEADER SETTINGS
                array(
                    'id'       => 'main_header_settings-start',
                    'type'     => 'wpdaddy_section',
                    'title'    => esc_html__( 'Header Main Settings', 'oswald' ),
                    'indent'   => false,
                    'section_role' => 'start'
                ),
                array(
                    'id'       => 'header_full_width',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Full Width Header', 'oswald' ),
                    'subtitle' => esc_html__( 'Set header content in full width layout', 'oswald' ),
                    'default'  => false,
                ),
                array(
                    'id'       => 'header_sticky',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Sticky Header', 'oswald' ),
                    'default'  => true,
                ),
                array(
                    'id'       => 'header_sticky_appearance_style',
                    'type'     => 'select',
                    'title'    => esc_html__( 'Sticky Appearance Style', 'oswald' ),
                    'options'  => array(
                        'classic' => esc_html__( 'Classic', 'oswald' ),
                        'scroll_top' => esc_html__( 'Appearance only on scroll top', 'oswald' ),
                    ),
                    'required' => array( 'header_sticky', '=', '1' ),
                    'default'  => 'classic'
                ),
                array(
                    'id'       => 'header_sticky_appearance_from_top',
                    'type'     => 'select',
                    'title'    => esc_html__( 'Sticky Header Appearance From Top of Page', 'oswald' ),
                    'options'  => array(
                        'auto' => esc_html__( 'Auto', 'oswald' ),
                        'custom' => esc_html__( 'Custom', 'oswald' ),
                    ),
                    'required' => array( 'header_sticky', '=', '1' ),
                    'default'  => 'auto'
                ),
                array(
                    'id'             => 'header_sticky_appearance_number',
                    'type'           => 'dimensions',
                    'units'          => false, 
                    'units_extended' => false,
                    'title'          => esc_html__( 'Set the distance from the top of the page', 'oswald' ),
                    'height'         => true,
                    'width'          => false,
                    'default'        => array(
                        'height' => 300,
                    ),
                    'required' => array( 'header_sticky_appearance_from_top', '=', 'custom' ),
                ),
                array(
                    'id'       => 'header_sticky_shadow',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Sticky Header Bottom Shadow', 'oswald' ),
                    'default'  => true,
                    'required' => array( 'header_sticky', '=', '1' ),
                ),
                array(
                    'id'     => 'main_header_settings-end',
                    'type'   => 'wpdaddy_section',
                    'indent' => false, 
                    'section_role' => 'end'
                ),



                // TOP LEFT SIDE SETTINGS
                array(
                    'id'       => 'top_left-start',
                    'type'     => 'wpdaddy_section',
                    'title'    => esc_html__( 'Top Left Settings', 'oswald' ),
                    'indent'   => false,
                    'section_role' => 'start'
                ),
                array(
                    'id'       => 'top_left-align',
                    'type'     => 'select',
                    'title'    => esc_html__( 'Item Align', 'oswald' ),
                    'options'  => array(
                        'left' => esc_html__( 'Left', 'oswald' ),
                        'center' => esc_html__( 'Center', 'oswald' ),
                        'right' => esc_html__( 'Right', 'oswald' ),
                    ),
                    'default'  => 'left',
                ),
                array(
                    'id'     => 'top_left-end',
                    'type'   => 'wpdaddy_section',
                    'indent' => false, 
                    'section_role' => 'end'
                ),

                // TOP CENTER SIDE SETTINGS
                array(
                    'id'       => 'top_center-start',
                    'type'     => 'wpdaddy_section',
                    'title'    => esc_html__( 'Top Center Settings', 'oswald' ),
                    'indent'   => false,
                    'section_role' => 'start'
                ),
                array(
                    'id'       => 'top_center-align',
                    'type'     => 'select',
                    'title'    => esc_html__( 'Item Align', 'oswald' ),
                    'options'  => array(
                        'left' => esc_html__( 'Left', 'oswald' ),
                        'center' => esc_html__( 'Center', 'oswald' ),
                        'right' => esc_html__( 'Right', 'oswald' ),
                    ),
                    'default'  => 'center',
                ),
                array(
                    'id'     => 'top_center-end',
                    'type'   => 'wpdaddy_section',
                    'indent' => false, 
                    'section_role' => 'end'
                ),

                // TOP RIGHT SIDE SETTINGS
                array(
                    'id'       => 'top_right-start',
                    'type'     => 'wpdaddy_section',
                    'title'    => esc_html__( 'Top Right Settings', 'oswald' ),
                    'indent'   => false,
                    'section_role' => 'start'
                ),
                array(
                    'id'       => 'top_right-align',
                    'type'     => 'select',
                    'title'    => esc_html__( 'Item Align', 'oswald' ),
                    'options'  => array(
                        'left' => esc_html__( 'Left', 'oswald' ),
                        'center' => esc_html__( 'Center', 'oswald' ),
                        'right' => esc_html__( 'Right', 'oswald' ),
                    ),
                    'default'  => 'right',
                ),
                array(
                    'id'     => 'top_right-end',
                    'type'   => 'wpdaddy_section',
                    'indent' => false, 
                    'section_role' => 'end'
                ),

                // MIDDLE LEFT SIDE SETTINGS
                array(
                    'id'       => 'middle_left-start',
                    'type'     => 'wpdaddy_section',
                    'title'    => esc_html__( 'Middle Left Settings', 'oswald' ),
                    'indent'   => false,
                    'section_role' => 'start'
                ),
                array(
                    'id'       => 'middle_left-align',
                    'type'     => 'select',
                    'title'    => esc_html__( 'Item Align', 'oswald' ),
                    'options'  => array(
                        'left' => esc_html__( 'Left', 'oswald' ),
                        'center' => esc_html__( 'Center', 'oswald' ),
                        'right' => esc_html__( 'Right', 'oswald' ),
                    ),
                    'default'  => 'left',
                ),
                array(
                    'id'     => 'middle_left-end',
                    'type'   => 'wpdaddy_section',
                    'indent' => false, 
                    'section_role' => 'end'
                ),

                // MIDDLE CENTER SIDE SETTINGS
                array(
                    'id'       => 'middle_center-start',
                    'type'     => 'wpdaddy_section',
                    'title'    => esc_html__( 'Middle Center Settings', 'oswald' ),
                    'indent'   => false,
                    'section_role' => 'start'
                ),
                array(
                    'id'       => 'middle_center-align',
                    'type'     => 'select',
                    'title'    => esc_html__( 'Item Align', 'oswald' ),
                    'options'  => array(
                        'left' => esc_html__( 'Left', 'oswald' ),
                        'center' => esc_html__( 'Center', 'oswald' ),
                        'right' => esc_html__( 'Right', 'oswald' ),
                    ),
                    'default'  => 'center',
                ),
                array(
                    'id'     => 'middle_center-end',
                    'type'   => 'wpdaddy_section',
                    'indent' => false, 
                    'section_role' => 'end'
                ),

                // MIDDLE RIGHT SIDE SETTINGS
                array(
                    'id'       => 'middle_right-start',
                    'type'     => 'wpdaddy_section',
                    'title'    => esc_html__( 'Top Middle Settings', 'oswald' ),
                    'indent'   => false,
                    'section_role' => 'start'
                ),
                array(
                    'id'       => 'middle_right-align',
                    'type'     => 'select',
                    'title'    => esc_html__( 'Item Align', 'oswald' ),
                    'options'  => array(
                        'left' => esc_html__( 'Left', 'oswald' ),
                        'center' => esc_html__( 'Center', 'oswald' ),
                        'right' => esc_html__( 'Right', 'oswald' ),
                    ),
                    'default'  => 'right',
                ),
                array(
                    'id'     => 'middle_right-end',
                    'type'   => 'wpdaddy_section',
                    'indent' => false, 
                    'section_role' => 'end'
                ),


                // BOTTOM LEFT SIDE SETTINGS
                array(
                    'id'       => 'bottom_left-start',
                    'type'     => 'wpdaddy_section',
                    'title'    => esc_html__( 'Bottom Left Settings', 'oswald' ),
                    'indent'   => false,
                    'section_role' => 'start'
                ),
                array(
                    'id'       => 'bottom_left-align',
                    'type'     => 'select',
                    'title'    => esc_html__( 'Item Align', 'oswald' ),
                    'options'  => array(
                        'left' => esc_html__( 'Left', 'oswald' ),
                        'center' => esc_html__( 'Center', 'oswald' ),
                        'right' => esc_html__( 'Right', 'oswald' ),
                    ),
                    'default'  => 'left',
                ),
                array(
                    'id'     => 'bottom_left-end',
                    'type'   => 'wpdaddy_section',
                    'indent' => false, 
                    'section_role' => 'end'
                ),

                // BOTTOM CENTER SIDE SETTINGS
                array(
                    'id'       => 'bottom_center-start',
                    'type'     => 'wpdaddy_section',
                    'title'    => esc_html__( 'Bottom Center Settings', 'oswald' ),
                    'indent'   => false,
                    'section_role' => 'start'
                ),
                array(
                    'id'       => 'bottom_center-align',
                    'type'     => 'select',
                    'title'    => esc_html__( 'Item Align', 'oswald' ),
                    'options'  => array(
                        'left' => esc_html__( 'Left', 'oswald' ),
                        'center' => esc_html__( 'Center', 'oswald' ),
                        'right' => esc_html__( 'Right', 'oswald' ),
                    ),
                    'default'  => 'center',
                ),
                array(
                    'id'     => 'bottom_center-end',
                    'type'   => 'wpdaddy_section',
                    'indent' => false, 
                    'section_role' => 'end'
                ),

                // BOTTOM RIGHT SIDE SETTINGS
                array(
                    'id'       => 'bottom_right-start',
                    'type'     => 'wpdaddy_section',
                    'title'    => esc_html__( 'Bottom Right Settings', 'oswald' ),
                    'indent'   => false,
                    'section_role' => 'start'
                ),
                array(
                    'id'       => 'bottom_right-align',
                    'type'     => 'select',
                    'title'    => esc_html__( 'Item Align', 'oswald' ),
                    'options'  => array(
                        'left' => esc_html__( 'Left', 'oswald' ),
                        'center' => esc_html__( 'Center', 'oswald' ),
                        'right' => esc_html__( 'Right', 'oswald' ),
                    ),
                    'default'  => 'right',
                ),
                array(
                    'id'     => 'bottom_right-end',
                    'type'   => 'wpdaddy_section',
                    'indent' => false, 
                    'section_role' => 'end'
                ),





                //LOGO SETTINGS
                array(
                    'id'       => 'logo-start',
                    'type'     => 'wpdaddy_section',
                    'title'    => esc_html__( 'Logo Settings', 'oswald' ),
                    'indent'   => false,
                    'section_role' => 'start'
                ),
                array(
                    'id'       => 'header_logo',
                    'type'     => 'media',
                    'title'    => esc_html__( 'Header Logo', 'oswald' ),
                ),
                array(
                    'id'       => 'logo_height_custom',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Enable Logo Height', 'oswald' ),
                    'default'  => false,
                ),
                array(
                    'id'             => 'logo_height',
                    'type'           => 'dimensions',
                    'units'          => false,    
                    'units_extended' => false,
                    'title'          => esc_html__( 'Set Logo Height' , 'oswald' ),
                    'height'         => true,
                    'width'          => false,
                    'default'        => array(
                        'height' => 100,
                    ),
                    'required' => array( 'logo_height_custom', '=', '1' ),
                ),
                array(
                    'id'       => 'logo_max_height',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Don\'t limit maximum height', 'oswald' ),
                    'default'  => false,
                    'required' => array( 'logo_height_custom', '=', '1' ),
                ),
                array(
                    'id'             => 'sticky_logo_height',
                    'type'           => 'dimensions',
                    'units'          => false,    
                    'units_extended' => false,
                    'title'          => esc_html__( 'Set Sticky Logo Height' , 'oswald' ),
                    'height'         => true,
                    'width'          => false,
                    'default'        => array(
                        'height' => '',
                    ),
                    'required' => array(
                        array( 'logo_height_custom', '=', '1' ),
                        array( 'logo_max_height', '=', '1' ),
                    ),
                ),
                array(
                    'id'       => 'logo_sticky',
                    'type'     => 'media',
                    'title'    => esc_html__( 'Sticky Logo', 'oswald' ),
                ),
                array(
                    'id'       => 'logo_mobile',
                    'type'     => 'media',
                    'title'    => esc_html__( 'Mobile Logo', 'oswald' ),
                ),
                array(
                    'id'       => 'logo_limit_on_mobile',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Limit Logo on Mobile', 'oswald' ),
                    'default'  => false,
                ),
                array(
                    'id'             => 'logo_mobile_width',
                    'type'           => 'dimensions',
                    'units'          => false,    
                    'units_extended' => false,
                    'title'          => esc_html__( 'Set Mobile Logo Width' , 'oswald' ),
                    'height'         => false,
                    'width'          => true,
                    'default'        => array(
                        'width' => 90,
                    ),
                    'required' => array( 'logo_limit_on_mobile', '=', '1' ),
                ),
                array(
                    'id'     => 'logo-end', 
                    'type'   => 'wpdaddy_section',
                    'indent' => false, 
                    'section_role' => 'end'
                ),

                // MENU
                array(
                    'id'       => 'menu-start',
                    'type'     => 'wpdaddy_section',
                    'title'    => esc_html__( 'Menu Settings', 'oswald' ),
                    'indent'   => false,
                    'section_role' => 'start'
                ),
                array(
                    'id'       => 'menu_select',
                    'type'     => 'select',
                    'title'    => esc_html__( 'Select Menu', 'oswald' ),
                    'options'  => oswald_getMenuList(),
                    'default'  => 'left',
                ),
                array(
                    'id'       => 'menu_ative_top_line',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Enable Active Menu Item Marker', 'oswald' ),
                    'default'  => false,
                ),
                array(
                    'id'       => 'sub_menu_background',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Sub Menu Background', 'oswald' ),
                    'subtitle' => esc_html__( 'Set sub menu background color', 'oswald' ),
                    'default'  => array(
                        'color' => '#ffffff',
                        'alpha' => '1',
                        'rgba'  => 'rgba(255,255,255,1)'
                    ),
                    'mode'     => 'background',
                ),
                array(
                    'id'       => 'sub_menu_color',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Sub Menu Text Color', 'oswald' ),
                    'subtitle' => esc_html__( 'Set sub menu header text color', 'oswald' ),
                    'default'  => '#222328',
                    'transparent' => false,
                ),
                array(
                    'id'       => 'sub_menu_color_hover',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Sub Menu Text Color on Hover', 'oswald' ),
                    'subtitle' => esc_html__( 'Set sub menu header text color on Hover', 'oswald' ),
                    'default'  => '#3b55e6',
                    'transparent' => false,
                ),
                array(
                    'id'     => 'menu-end', 
                    'type'   => 'wpdaddy_section',
                    'indent' => false, 
                    'section_role' => 'end'
                ),

                // BURGER SIDEBAR
                array(
                    'id'       => 'burger_sidebar-start',
                    'type'     => 'wpdaddy_section',
                    'title'    => esc_html__( 'Burger Sidebar Settings', 'oswald' ),
                    'indent'   => false,
                    'section_role' => 'start'
                ),
                array(
                    'id'       => 'burger_sidebar_select',
                    'type'     => 'select',
                    'title'    => esc_html__( 'Select Sidebar', 'oswald' ),
                    'data'     => 'sidebars',
                ),
                array(
                    'id'       => 'burger_sidebar_position',
                    'type'     => 'select',
                    'title'    => esc_html__( 'Position', 'oswald' ),
                    'options'  => array(
                        'left' => esc_html__( 'Left', 'oswald' ),
                        'right' => esc_html__( 'Right', 'oswald' ),
                    ),
                    'default'  => 'right'
                ),
                array(
                    'id'     => 'burger_sidebar-end', 
                    'type'   => 'wpdaddy_section',
                    'indent' => false, 
                    'section_role' => 'end'
                ),

                // LOGIN
                array(
                    'id'       => 'login-start',
                    'type'     => 'wpdaddy_section',
                    'title'    => esc_html__( 'Login Settings', 'oswald' ),
                    'indent'   => false,
                    'section_role' => 'start'
                ),
                array(
                    'id'       => 'login_button_switcher',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Enable Button View', 'oswald' ),
                    'default'  => true,
                ),
                array(
                    'id'       => 'login_button_color',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Text Color', 'oswald' ),
                    'subtitle' => esc_html__( 'Set text color', 'oswald' ),
                    'default'  => '#ffffff',
                    'transparent' => false,
                    'required' => array( 'login_button_switcher', '=', '1' ),
                ),
                array(
                    'id'       => 'login_button_bg_color',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Background Color', 'oswald' ),
                    'subtitle' => esc_html__( 'Set background color', 'oswald' ),
                    'default'  => '#3b55e6',
                    'transparent' => true,
                    'required' => array( 'login_button_switcher', '=', '1' ),
                ),
                array(
                    'id'       => 'login_button_color_hover',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Hover Text Color', 'oswald' ),
                    'subtitle' => esc_html__( 'Set text color', 'oswald' ),
                    'default'  => '#ffffff',
                    'transparent' => false,
                    'required' => array( 'login_button_switcher', '=', '1' ),
                ),
                array(
                    'id'       => 'login_button_bg_color_hover',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Hover Background Color', 'oswald' ),
                    'subtitle' => esc_html__( 'Set background color', 'oswald' ),
                    'default'  => '#3b55e6',
                    'transparent' => true,
                    'required' => array( 'login_button_switcher', '=', '1' ),
                ),
                array(
                    'id'     => 'login-end', 
                    'type'   => 'wpdaddy_section',
                    'indent' => false, 
                    'section_role' => 'end'
                ),


                //TOP SIDE
                array(
                    'id'       => 'side_top-start',
                    'type'     => 'wpdaddy_section',
                    'title'    => esc_html__( 'Top Header Settings', 'oswald' ),
                    'indent'   => false,
                    'section_role' => 'start'
                ),
                array(
                    'id'       => 'side_top_background',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Background', 'oswald' ),
                    'subtitle' => esc_html__( 'Set background color', 'oswald' ),
                    'default'  => array(
                        'color' => '#222328',
                        'alpha' => '1',
                        'rgba'  => 'rgba(34,35,40,1)'
                    ),
                    'mode'     => 'background',
                ),
                array(
                    'id'       => 'side_top_color',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Text Color', 'oswald' ),
                    'subtitle' => esc_html__( 'Set text color', 'oswald' ),
                    'default'  => '#919194',
                    'transparent' => false,
                ),
                array(
                    'id'       => 'side_top_color_hover',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Text Color on Hover', 'oswald' ),
                    'subtitle' => esc_html__( 'Set hover text color for links, menu ect.', 'oswald' ),
                    'default'  => '#a9aaab',
                    'transparent' => false,
                ),
                array(
                    'id'             => 'side_top_height',
                    'type'           => 'dimensions',
                    'units'          => false, 
                    'units_extended' => false,
                    'title'          => esc_html__( 'Height', 'oswald' ),
                    'height'         => true,
                    'width'          => false,
                    'default'        => array(
                        'height' => 56,
                    )
                ),
                array(
                    'id'       => 'side_top_border',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Set Bottom Border', 'oswald' ),
                    'default'  => true,
                ),
                array(
                    'id'       => 'side_top_border_color',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Border Color', 'oswald' ),
                    'subtitle' => esc_html__( 'Set border color', 'oswald' ),
                    'default'  => array(
                        'color' => '#ffffff',
                        'alpha' => '.05',
                        'rgba'  => 'rgba(255,255,255,0.05)'
                    ),
                    'mode'     => 'background',
                    'required' => array( 'side_top_border', '=', '1' ),
                ),
                array(
                    'id'       => 'side_top_sticky',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Show Section in Sticky Header?', 'oswald' ),
                    'default'  => false,
                    'required' => array( 'header_sticky', '=', '1' ),
                ),
                array(
                    'id'       => 'side_top_background_sticky',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Sticky Header Background', 'oswald' ),
                    'subtitle' => esc_html__( 'Set background color', 'oswald' ),
                    'default'  => array(
                        'color' => '#222328',
                        'alpha' => '1',
                        'rgba'  => 'rgba(34,35,40,1)'
                    ),
                    'mode'     => 'background',
                    'required' => array( 'side_top_sticky', '=', '1' ),
                ),
                array(
                    'id'       => 'side_top_color_sticky',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Sticky Header Text Color', 'oswald' ),
                    'subtitle' => esc_html__( 'Set text color', 'oswald' ),
                    'default'  => '#919194',
                    'transparent' => false,
                    'required' => array( 'side_top_sticky', '=', '1' ),
                ),
                array(
                    'id'       => 'side_top_color_hover_sticky',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Sticky Header Text Color on Hover', 'oswald' ),
                    'subtitle' => esc_html__( 'Set hover text color for links, menu ect.', 'oswald' ),
                    'default'  => '#a9aaab',
                    'transparent' => false,
                    'required' => array( 'side_top_sticky', '=', '1' ),
                ),
                array(
                    'id'             => 'side_top_height_sticky',
                    'type'           => 'dimensions',
                    'units'          => false, 
                    'units_extended' => false,
                    'title'          => esc_html__( 'Sticky Header Height', 'oswald' ),
                    'height'         => true,
                    'width'          => false,
                    'default'        => array(
                        'height' => 38,
                    ),
                    'required' => array( 'side_top_sticky', '=', '1' ),
                ),
                array(
                    'id'       => 'side_top_mobile',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Show Section in Mobile Header?', 'oswald' ),
                    'default'  => false,
                ),
                array(
                    'id'     => 'side_top-end', 
                    'type'   => 'wpdaddy_section',
                    'indent' => false, 
                    'section_role' => 'end'
                ),


                // Middle SIDE
                array(
                    'id'       => 'side_middle-start',
                    'type'     => 'wpdaddy_section',
                    'title'    => esc_html__( 'Middle Header Settings', 'oswald' ),
                    'indent'   => false,
                    'section_role' => 'start'
                ),
                array(
                    'id'       => 'side_middle_background',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Background', 'oswald' ),
                    'subtitle' => esc_html__( 'Set background color', 'oswald' ),
                    'default'  => array(
                        'color' => '#222328',
                        'alpha' => '1',
                        'rgba'  => 'rgba(34,35,40,1)'
                    ),
                    'mode'     => 'background',
                ),
                array(
                    'id'       => 'side_middle_color',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Text Color', 'oswald' ),
                    'subtitle' => esc_html__( 'Set text color', 'oswald' ),
                    'default'  => '#ffffff',
                    'transparent' => false,
                ),
                array(
                    'id'       => 'side_middle_color_hover',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Text Color on Hover', 'oswald' ),
                    'subtitle' => esc_html__( 'Set hover text color for links, menu ect.', 'oswald' ),
                    'default'  => '#a9aaab',
                    'transparent' => false,
                ),
                array(
                    'id'             => 'side_middle_height',
                    'type'           => 'dimensions',
                    'units'          => false, 
                    'units_extended' => false,
                    'title'          => esc_html__( 'Height', 'oswald' ),
                    'height'         => true,
                    'width'          => false,
                    'default'        => array(
                        'height' => 90,
                    )
                ),
                array(
                    'id'       => 'side_middle_border',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Set Bottom Border', 'oswald' ),
                    'default'  => false,
                ),
                array(
                    'id'       => 'side_middle_border_color',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Border Color', 'oswald' ),
                    'subtitle' => esc_html__( 'Set border color', 'oswald' ),
                    'default'  => array(
                        'color' => '#ffffff',
                        'alpha' => '.05',
                        'rgba'  => 'rgba(255,255,255,0.05)'
                    ),
                    'mode'     => 'background',
                    'required' => array( 'side_middle_border', '=', '1' ),
                ),
                array(
                    'id'       => 'side_middle_sticky',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Show Section in Sticky Header?', 'oswald' ),
                    'default'  => true,
                    'required' => array( 'header_sticky', '=', '1' ),
                ),
                array(
                    'id'       => 'side_middle_background_sticky',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Sticky Header Background', 'oswald' ),
                    'subtitle' => esc_html__( 'Set background color', 'oswald' ),
                    'default'  => array(
                        'color' => '#222328',
                        'alpha' => '1',
                        'rgba'  => 'rgba(34,35,40,1)'
                    ),
                    'mode'     => 'background',
                    'required' => array( 'side_middle_sticky', '=', '1' ),
                ),
                array(
                    'id'       => 'side_middle_color_sticky',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Sticky Header Text Color', 'oswald' ),
                    'subtitle' => esc_html__( 'Set text color', 'oswald' ),
                    'default'  => '#ffffff',
                    'transparent' => false,
                    'required' => array( 'side_middle_sticky', '=', '1' ),
                ),
                array(
                    'id'       => 'side_middle_color_hover_sticky',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Sticky Header Text Color on Hover', 'oswald' ),
                    'subtitle' => esc_html__( 'Set hover text color for links, menu ect.', 'oswald' ),
                    'default'  => '#a9aaab',
                    'transparent' => false,
                    'required' => array( 'side_middle_sticky', '=', '1' ),
                ),
                array(
                    'id'             => 'side_middle_height_sticky',
                    'type'           => 'dimensions',
                    'units'          => false, 
                    'units_extended' => false,
                    'title'          => esc_html__( 'Sticky Header Height', 'oswald' ),
                    'height'         => true,
                    'width'          => false,
                    'default'        => array(
                        'height' => 90,
                    ),
                    'required' => array( 'side_middle_sticky', '=', '1' ),
                ),
                array(
                    'id'       => 'side_middle_mobile',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Show Section in Mobile Header?', 'oswald' ),
                    'default'  => true,
                ),
                array(
                    'id'     => 'side_middle-end', 
                    'type'   => 'wpdaddy_section',
                    'indent' => false, 
                    'section_role' => 'end'
                ),


                // Bottom SIDE
                array(
                    'id'       => 'side_bottom-start',
                    'type'     => 'wpdaddy_section',
                    'title'    => esc_html__( 'Bottom Header Settings', 'oswald' ),
                    'indent'   => false,
                    'section_role' => 'start'
                ),
                array(
                    'id'       => 'side_bottom_background',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Background', 'oswald' ),
                    'subtitle' => esc_html__( 'Set background color', 'oswald' ),
                    'default'  => array(
                        'color' => '#222328',
                        'alpha' => '1',
                        'rgba'  => 'rgba(34,35,40,1)'
                    ),
                    'mode'     => 'background',
                ),
                array(
                    'id'       => 'side_bottom_color',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Text Color', 'oswald' ),
                    'subtitle' => esc_html__( 'Set text color', 'oswald' ),
                    'default'  => '#ffffff',
                    'transparent' => false,
                ),
                array(
                    'id'       => 'side_bottom_color_hover',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Text Color on Hover', 'oswald' ),
                    'subtitle' => esc_html__( 'Set hover text color for links, menu ect.', 'oswald' ),
                    'default'  => '#a9aaab',
                    'transparent' => false,
                ),
                array(
                    'id'             => 'side_bottom_height',
                    'type'           => 'dimensions',
                    'units'          => false, 
                    'units_extended' => false,
                    'title'          => esc_html__( 'Height', 'oswald' ),
                    'height'         => true,
                    'width'          => false,
                    'default'        => array(
                        'height' => 48,
                    )
                ),
                array(
                    'id'       => 'side_bottom_border',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Set Bottom Border', 'oswald' ),
                    'default'  => false,
                ),
                array(
                    'id'       => 'side_bottom_border_color',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Border Color', 'oswald' ),
                    'subtitle' => esc_html__( 'Set border color', 'oswald' ),
                    'default'  => array(
                        'color' => '#ffffff',
                        'alpha' => '.15',
                        'rgba'  => 'rgba(255,255,255,0.15)'
                    ),
                    'mode'     => 'background',
                    'required' => array( 'side_bottom_border', '=', '1' ),
                ),
                array(
                    'id'       => 'side_bottom_sticky',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Show Section in Sticky Header?', 'oswald' ),
                    'default'  => false,
                    'required' => array( 'header_sticky', '=', '1' ),
                ),
                array(
                    'id'       => 'side_bottom_background_sticky',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Sticky Header Background', 'oswald' ),
                    'subtitle' => esc_html__( 'Set background color', 'oswald' ),
                    'default'  => array(
                        'color' => '#ffffff',
                        'alpha' => '1',
                        'rgba'  => 'rgba(255,255,255,1)'
                    ),
                    'mode'     => 'background',
                    'required' => array( 'side_bottom_sticky', '=', '1' ),
                ),
                array(
                    'id'       => 'side_bottom_color_sticky',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Sticky Header Text Color', 'oswald' ),
                    'subtitle' => esc_html__( 'Set text color', 'oswald' ),
                    'default'  => '#000000',
                    'transparent' => false,
                    'required' => array( 'side_bottom_sticky', '=', '1' ),
                ),
                array(
                    'id'       => 'side_bottom_color_hover_sticky',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Sticky Header Text Color on Hover', 'oswald' ),
                    'subtitle' => esc_html__( 'Set hover text color for links, menu ect.', 'oswald' ),
                    'default'  => '#a9aaab',
                    'transparent' => false,
                    'required' => array( 'side_bottom_sticky', '=', '1' ),
                ),
                array(
                    'id'             => 'side_bottom_height_sticky',
                    'type'           => 'dimensions',
                    'units'          => false, 
                    'units_extended' => false,
                    'title'          => esc_html__( 'Sticky Header Height', 'oswald' ),
                    'height'         => true,
                    'width'          => false,
                    'default'        => array(
                        'height' => 48,
                    ),
                    'required' => array( 'side_bottom_sticky', '=', '1' ),
                ),
                array(
                    'id'       => 'side_bottom_mobile',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Show Section in Mobile Header?', 'oswald' ),
                    'default'  => false,
                ),
                array(
                    'id'     => 'side_bottom-end', 
                    'type'   => 'wpdaddy_section',
                    'indent' => false, 
                    'section_role' => 'end'
                ),


                //TEXT SETTINGS
                array(
                    'id'       => 'text1-start',
                    'type'     => 'wpdaddy_section',
                    'title'    => esc_html__( 'Text / HTML 1 Settings', 'oswald' ),
                    'indent'   => false,
                    'section_role' => 'start'
                ),
                array(
                    'id'      => 'text1_editor',
                    'type'    => 'editor',
                    'title'   => esc_html__( 'Text Editor', 'oswald' ),
                    'default' => '',
                    'args'    => array(
                        'wpautop'       => false,
                        'media_buttons' => false,
                        'textarea_rows' => 2,
                        'teeny'         => false,
                        'quicktags'     => true,
                    ),
                ),
                array(
                    'id'     => 'text1-end', 
                    'type'   => 'wpdaddy_section',
                    'indent' => false, 
                    'section_role' => 'end'
                ),

                //2
                array(
                    'id'       => 'text2-start',
                    'type'     => 'wpdaddy_section',
                    'title'    => esc_html__( 'Text / HTML 2 Settings', 'oswald' ),
                    'indent'   => false,
                    'section_role' => 'start'
                ),
                array(
                    'id'      => 'text2_editor',
                    'type'    => 'editor',
                    'title'   => esc_html__( 'Text Editor', 'oswald' ),
                    'default' => '',
                    'args'    => array(
                        'wpautop'       => false,
                        'media_buttons' => false,
                        'textarea_rows' => 2,
                        'teeny'         => false,
                        'quicktags'     => true,
                    ),
                ),
                array(
                    'id'     => 'text2-end', 
                    'type'   => 'wpdaddy_section',
                    'indent' => false, 
                    'section_role' => 'end'
                ),

                //3
                array(
                    'id'       => 'text3-start',
                    'type'     => 'wpdaddy_section',
                    'title'    => esc_html__( 'Text / HTML 3 Settings', 'oswald' ),
                    'indent'   => false,
                    'section_role' => 'start'
                ),
                array(
                    'id'      => 'text3_editor',
                    'type'    => 'editor',
                    'title'   => esc_html__( 'Text Editor', 'oswald' ),
                    'default' => '',
                    'args'    => array(
                        'wpautop'       => false,
                        'media_buttons' => false,
                        'textarea_rows' => 2,
                        'teeny'         => false,
                        'quicktags'     => true,
                    ),
                ),
                array(
                    'id'     => 'text3-end', 
                    'type'   => 'wpdaddy_section',
                    'indent' => false, 
                    'section_role' => 'end'
                ),

                //4
                array(
                    'id'       => 'text4-start',
                    'type'     => 'wpdaddy_section',
                    'title'    => esc_html__( 'Text / HTML 4 Settings', 'oswald' ),
                    'indent'   => false,
                    'section_role' => 'start'
                ),
                array(
                    'id'      => 'text4_editor',
                    'type'    => 'editor',
                    'title'   => esc_html__( 'Text Editor', 'oswald' ),
                    'default' => '',
                    'args'    => array(
                        'wpautop'       => false,
                        'media_buttons' => false,
                        'textarea_rows' => 2,
                        'teeny'         => false,
                        'quicktags'     => true,
                    ),
                ),
                array(
                    'id'     => 'text4-end', 
                    'type'   => 'wpdaddy_section',
                    'indent' => false, 
                    'section_role' => 'end'
                ),

                //5
                array(
                    'id'       => 'text5-start',
                    'type'     => 'wpdaddy_section',
                    'title'    => esc_html__( 'Text / HTML 5 Settings', 'oswald' ),
                    'indent'   => false,
                    'section_role' => 'start'
                ),
                array(
                    'id'      => 'text5_editor',
                    'type'    => 'editor',
                    'title'   => esc_html__( 'Text Editor', 'oswald' ),
                    'default' => '',
                    'args'    => array(
                        'wpautop'       => false,
                        'media_buttons' => false,
                        'textarea_rows' => 2,
                        'teeny'         => false,
                        'quicktags'     => true,
                    ),
                ),
                array(
                    'id'     => 'text5-end', 
                    'type'   => 'wpdaddy_section',
                    'indent' => false, 
                    'section_role' => 'end'
                ),

                //6
                array(
                    'id'       => 'text6-start',
                    'type'     => 'wpdaddy_section',
                    'title'    => esc_html__( 'Text / HTML 6 Settings', 'oswald' ),
                    'indent'   => false,
                    'section_role' => 'start'
                ),
                array(
                    'id'      => 'text6_editor',
                    'type'    => 'editor',
                    'title'   => esc_html__( 'Text Editor', 'oswald' ),
                    'default' => '',
                    'args'    => array(
                        'wpautop'       => false,
                        'media_buttons' => false,
                        'textarea_rows' => 2,
                        'teeny'         => false,
                        'quicktags'     => true,
                    ),
                ),
                array(
                    'id'     => 'text6-end', 
                    'type'   => 'wpdaddy_section',
                    'indent' => false, 
                    'section_role' => 'end'
                ),
            );

    Redux::setSection( $opt_name, array(
        'id'     => 'wpdaddy_header_builder_section',
        'title'  =>  esc_html__( 'WPDaddy Header Builder', 'oswald' ),
        'desc'   => esc_html__( 'This is WPDaddy Header Builder', 'oswald' ),
        'icon'   => 'el el-screen',
        'customizer' => false,
        /*'customizer' => false,*/
        'fields' => $options
    ) );
    // END HEADER


    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Page Title', 'oswald' ),
        'id'               => 'page_title',
        'icon'             => 'el-icon-screen',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'page_title_conditional',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Page Title', 'oswald' ),
                'default'  => true,
            ),
            array(
                'id'       => 'blog_title_conditional',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Blog Post Title', 'oswald' ),
                'default'  => false,
                'required' => array( 'page_title_conditional', '=', '1' ),
            ),
            array(
                'id'       => 'portfolio_title_conditional',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Portfolio Post Title', 'oswald' ),
                'default'  => false,
                'required' => array( 'page_title_conditional', '=', '1' ),
            ),
            array(
                'id'       => 'team_title_conditional',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Team Post Title', 'oswald' ),
                'default'  => false,
                'required' => array( 'page_title_conditional', '=', '1' ),
            ),
            array(
                'id'       => 'page_title-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Page Title Settings', 'oswald' ),
                'indent'   => true,
                'required' => array( 'page_title_conditional', '=', '1' ),
            ),
            array(
                'id'       => 'page_title_breadcrumbs_conditional',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Breadcrumbs', 'oswald' ),
                'default'  => true,
            ),
            array(
                'id'       => 'page_title_vert_align',
                'type'     => 'select',
                'title'    => esc_html__( 'Vertical Align', 'oswald' ),
                'options'  => array(
                    'top' => esc_html__( 'Top', 'oswald' ),
                    'middle' => esc_html__( 'Middle', 'oswald' ),
                    'bottom' => esc_html__( 'Bottom', 'oswald' )
                ),
                'default'  => 'middle'
            ),
            array(
                'id'       => 'page_title_horiz_align',
                'type'     => 'select',
                'title'    => esc_html__( 'Page Title Text Align?', 'oswald' ),
                'options'  => array(
                    'left' =>  esc_html__( 'Left', 'oswald' ),
                    'center' => esc_html__( 'Center', 'oswald' ),
                    'right' => esc_html__( 'Right', 'oswald' )
                ),
                'default'  => 'left'
            ),
            array(
                'id'       => 'page_title_font_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Page Title Font Color', 'oswald' ),
                'default'  => '#222328',
                'transparent' => false
            ),
            array(
                'id'       => 'page_title_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Page Title Background Color', 'oswald' ),
                'default'  => '#ffffff',
                'transparent' => false
            ),
            array(
                'id'       => 'page_title_bg_image',
                'type'     => 'media',
                'title'    => esc_html__( 'Page Title Background Image', 'oswald' ),
            ),
            array(
                'id'       => 'page_title_bg_image',
                'type'     => 'background',
                'background-color' => false,
                'preview_media' => true,
                'preview' => false,
                'title'    => esc_html__( 'Page Title Background Image', 'oswald' ),
                'default'  => array(
                    'background-repeat' => 'repeat',
                    'background-size' => 'cover',
                    'background-attachment' => 'scroll',
                    'background-position' => 'center center',
                    'background-color' => '#1e73be',
                )
            ),
            array(
                'id'             => 'page_title_height',
                'type'           => 'dimensions',
                'units'          => false, 
                'units_extended' => false,
                'title'          => esc_html__( 'Page Title Height', 'oswald' ),
                'height'         => true,
                'width'          => false,
                'default'        => array(
                    'height' => 160,
                )
            ),
            array(
                'id'       => 'page_title_top_border',
                'type'     => 'switch',
                'title'    => esc_html__( 'Page Title Top Border', 'oswald' ),
                'default'  => false,
            ),
            array(
                'id'       => 'page_title_top_border_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Page Title Top Border Color', 'oswald' ),
                'default'  => array(
                    'color' => '#eff0ed',
                    'alpha' => '1',
                    'rgba'  => 'rgba(239,240,237,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'page_title_top_border', '=', '1' ),
                ), 
            ),
            array(
                'id'       => 'page_title_bottom_border',
                'type'     => 'switch',
                'title'    => esc_html__( 'Page Title Bottom Border', 'oswald' ),
                'default'  => false,
            ),
            array(
                'id'       => 'page_title_bottom_border_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Page Title Bottom Border Color', 'oswald' ),
                'default'  => array(
                    'color' => '#eff0ed',
                    'alpha' => '1',
                    'rgba'  => 'rgba(239,240,237,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'page_title_bottom_border', '=', '1' ),
                ), 
            ),
            array(
                'id'       => 'page_title_bottom_margin',
                'type'     => 'spacing',
                // An array of CSS selectors to apply this font style to
                'mode'     => 'margin',
                'all'      => false,
                'bottom'   => true,
                'top'   => false,
                'left'   => false,
                'right'   => false,
                'title'    => esc_html__( 'Page Title Bottom Margin', 'oswald' ),
                'default'  => array(
                    'margin-bottom' => '0px',                
                    )
            ),
            array(
                'id'     => 'page_title-end',
                'type'   => 'section',
                'indent' => false, 
                'required' => array( 'page_title_conditional', '=', '1' ),
            ),
            
        )
    ) );

    // -> START Footer Options
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Footer', 'oswald' ),
        'id'               => 'footer-option',
        'customizer_width' => '400px',
        'icon' => 'el-icon-screen',
        'fields'           => array(
            array(
                'id'       => 'footer_full_width',
                'type'     => 'switch',
                'title'    => esc_html__( 'Full Width Footer', 'oswald' ),
                'default'  => false,
            ),
            array(
                'id'       => 'footer_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Background Color', 'oswald' ),
                'default'  => '#222328',
                'transparent' => false
            ),
            array(
                'id'       => 'footer_text_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Text color', 'oswald' ),
                'default'  => '#9d9d9e',
                'transparent' => false
            ),
            array(
                'id'       => 'footer_heading_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Heading color', 'oswald' ),
                'default'  => '#ffffff',
                'transparent' => false
            ),
            array(
                'id'       => 'footer_bg_image',
                'type'     => 'background',
                'background-color' => false,
                'preview_media' => true,
                'preview' => false,
                'title'    => esc_html__( 'Footer Background Image', 'oswald' ),
                'default'  => array(
                    'background-repeat' => 'repeat',
                    'background-size' => 'cover',
                    'background-attachment' => 'scroll',
                    'background-position' => 'center center',
                    'background-color' => '#1e73be',
                )
            ),
            array(
                'id'       => 'footer_bottom_margin',
                'type'     => 'spacing',
                // An array of CSS selectors to apply this font style to
                'mode'     => 'margin',
                'all'      => false,
                'bottom'   => false,
                'top'   => true,
                'left'   => false,
                'right'   => false,
                'title'    => esc_html__( 'Footer Top Margin', 'oswald' ),
                'default'  => array(
                    'margin-top' => '40px',                
                    )
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer Content', 'oswald' ),
        'id'               => 'footer_content',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'footer_switch',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Footer', 'oswald' ),
                'default'  => true,
            ),
            array(
                'id'       => 'footer-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Footer Settings', 'oswald' ),
                'indent'   => true,
                'required' => array( 'footer_switch', '=', '1' ),
            ),
            array(
                'id'       => 'footer_column',
                'type'     => 'select',
                'title'    => esc_html__( 'Footer Column', 'oswald' ),
                'options'  => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5'
                ),
                'default'  => '5'
            ),
            array(
                'id'       => 'footer_column2',
                'type'     => 'select',
                'title'    => esc_html__( 'Footer Column Layout', 'oswald' ),
                'options'  => array(
                    '6-6' => '50% / 50%',
                    '3-9' => '25% / 75%',
                    '9-3' => '25% / 75%',
                    '4-8' => '33% / 66%',
                    '8-3' => '66% / 33%',
                ),
                'default'  => '6-6',
                'required' => array( 'footer_column', '=', '2' ),
            ),
            array(
                'id'       => 'footer_column3',
                'type'     => 'select',
                'title'    => esc_html__( 'Footer Column Layout', 'oswald' ),
                'options'  => array(
                    '4-4-4' => '33% / 33% / 33%',
                    '3-3-6' => '25% / 25% / 50%',
                    '3-6-3' => '25% / 50% / 25%',
                    '6-3-3' => '50% / 25% / 25%',
                ),
                'default'  => '4-4-4',
                'required' => array( 'footer_column', '=', '3' ),
            ),
            array(
                'id'       => 'footer_column5',
                'type'     => 'select',
                'title'    => esc_html__( 'Footer Column Layout', 'oswald' ),
                'options'  => array(
                    '2-3-2-2-3' => '16% / 25% / 16% / 16% / 25%',
                    '3-2-2-2-3' => '25% / 16% / 16% / 16% / 25%',
                    '3-2-3-2-2' => '25% / 16% / 26% / 16% / 16%',
                    '3-2-3-3-2' => '25% / 16% / 16% / 25% / 16%',
                ),
                'default'  => '2-3-2-2-3',
                'required' => array( 'footer_column', '=', '5' ),
            ),
            array(
                'id'       => 'footer_align',
                'type'     => 'select',
                'title'    => esc_html__( 'Footer Title Text Align', 'oswald' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'oswald' ),
                    'center' => esc_html__( 'Center', 'oswald' ),
                    'right' => esc_html__( 'Right', 'oswald' ),
                ),
                'default'  => 'left'
            ),
            array(
                'id'       => 'footer_spacing',
                'type'     => 'spacing',
                // An array of CSS selectors to apply this font style to
                'mode'     => 'padding',
                'all'      => false,
                'title'    => esc_html__( 'Footer Padding (px)', 'oswald' ),
                'default'  => array(
                    'padding-top'    => '70px',
                    'padding-right'  => '0px',
                    'padding-bottom' => '40px',
                    'padding-left'   => '0px'
                )
            ),
            array(
                'id'     => 'footer-end',
                'type'   => 'section',
                'indent' => false, 
                'required' => array( 'footer_switch', '=', '1' ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Copyright', 'oswald' ),
        'id'               => 'copyright',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'copyright_switch',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Copyright', 'oswald' ),
                'default'  => true,
            ),
            array(
                'id'       => 'copyright-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Copyright Settings', 'oswald' ),
                'indent'   => true,
                'required' => array( 'copyright_switch', '=', '1' ),
            ),
            array(
                'id'       => 'copyright_column',
                'type'     => 'select',
                'title'    => esc_html__( 'Copyright Column', 'oswald' ),
                'options'  => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                ),
                'default'  => '3'
            ),
            array(
                'id'       => 'copyright_align',
                'type'     => 'select',
                'title'    => esc_html__( 'Copyright Column 1 Text Align', 'oswald' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'oswald' ),
                    'center' => esc_html__( 'Center', 'oswald' ),
                    'right' => esc_html__( 'Right', 'oswald' ),
                ),
                'default'  => 'left',
            ),
            array(
                'id'       => 'copyright_align_2',
                'type'     => 'select',
                'title'    => esc_html__( 'Copyright Column 2 Text Align', 'oswald' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'oswald' ),
                    'center' => esc_html__( 'Center', 'oswald' ),
                    'right' => esc_html__( 'Right', 'oswald' ),
                ),
                'default'  => 'center',
                'required' => array( 'copyright_column', '!=', '1' ),
            ),
            array(
                'id'       => 'copyright_align_3',
                'type'     => 'select',
                'title'    => esc_html__( 'Copyright Column 3 Text Align', 'oswald' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'oswald' ),
                    'center' => esc_html__( 'Center', 'oswald' ),
                    'right' => esc_html__( 'Right', 'oswald' ),
                ),
                'default'  => 'right',
                'required' => array( 'copyright_column', '=', '3' ),
            ),
            array(
                'id'       => 'copyright_spacing',
                'type'     => 'spacing',
                'mode'     => 'padding',
                'all'      => false,
                'title'    => esc_html__( 'Copyright Padding (px)', 'oswald' ),
                'default'  => array(
                    'padding-top'    => '14px',
                    'padding-right'  => '0px',
                    'padding-bottom' => '14px',
                    'padding-left'   => '0px'
                ),
                'required' => array( 'copyright_switch', '=', '1' ),
            ),
            array(
                'id'       => 'copyright_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Copyright Background Color', 'oswald' ),
                'default'  => '#222328',
                'transparent' => true,
                'required' => array( 'copyright_switch', '=', '1' ),
            ),
            array(
                'id'       => 'copyright_text_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Copyright Text Color', 'oswald' ),
                'default'  => '#898a8e',
                'transparent' => false,
                'required' => array( 'copyright_switch', '=', '1' ),
            ),
            array(
                'id'       => 'copyright_heading_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Copyright Heading color', 'oswald' ),
                'default'  => '#ffffff',
                'transparent' => false,
                'required' => array( 'copyright_switch', '=', '1' ),
            ),
            array(
                'id'       => 'copyright_top_border',
                'type'     => 'switch',
                'title'    => esc_html__( 'Set Copyright Top Border', 'oswald' ),
                'default'  => true,
                'required' => array( 'copyright_switch', '=', '1' ),
            ),
            array(
                'id'       => 'copyright_top_border_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Copyright Border Color', 'oswald' ),
                'default'  => array(
                    'color' => '#39393e',
                    'alpha' => '1',
                    'rgba'  => 'rgba(50,50,50,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'copyright_top_border', '=', '1' ),
                    array( 'copyright_switch', '=', '1' )
                ), 
            ),
            array(
                'id'     => 'copyright-end',
                'type'   => 'section',
                'indent' => false, 
                'required' => array( 'copyright_switch', '=', '1' ),
            ),

        )
    ));

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Pre footer area', 'oswald' ),
        'id'               => 'pre_footer',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'pre_footer_switch',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Pre Footer Area', 'oswald' ),
                'default'  => false,
            ),
            array(
                'id'      => 'pre_footer_editor',
                'type'    => 'editor',
                'title'   => esc_html__( 'Pre Footer Editor', 'oswald' ),
                'default' => '',
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 2,
                    'teeny'         => false,
                    'quicktags'     => true,
                ),
                'required' => array( 'pre_footer_switch', '=', '1' ),
            ),
            array(
                'id'       => 'pre_footer_align',
                'type'     => 'select',
                'title'    => esc_html__( 'Pre Footer Title Text Align', 'oswald' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'oswald' ),
                    'center' => esc_html__( 'Center', 'oswald' ),
                    'right' => esc_html__( 'Right', 'oswald' ),
                ),
                'default'  => 'center',
                'required' => array( 'pre_footer_switch', '=', '1' ),
            ),
            array(
                'id'       => 'pre_footer_spacing',
                'type'     => 'spacing',
                'mode'     => 'padding',
                'all'      => false,
                'title'    => esc_html__( 'Pre Footer Area Padding (px)', 'oswald' ),
                'default'  => array(
                    'padding-top'    => '20px',
                    'padding-right'  => '0px',
                    'padding-bottom' => '20px',
                    'padding-left'   => '0px'
                ),
                'required' => array( 'pre_footer_switch', '=', '1' ),
            ),
            array(
                'id'       => 'pre_footer_bottom_border',
                'type'     => 'switch',
                'title'    => esc_html__( 'Set Pre Footer Border', 'oswald' ),
                'default'  => true,
                'required' => array( 'pre_footer_switch', '=', '1' ),
            ),
            array(
                'id'       => 'pre_footer_bottom_border_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Pre Footer Border Color', 'oswald' ),
                'default'  => array(
                    'color' => '#e0e1dc',
                    'alpha' => '1',
                    'rgba'  => 'rgba(224,225,220,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'pre_footer_bottom_border', '=', '1' ),
                    array( 'pre_footer_switch', '=', '1' )
                ), 
            ),
        )
    ));

    // -> START Blog Options
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Blog', 'oswald' ),
        'id'               => 'blog-option',
        'customizer_width' => '400px',
        'icon' => 'el-icon-th-list',
        'fields'           => array(
            array(
                'id'       => 'related_posts',
                'type'     => 'switch',
                'title'    => esc_html__( 'Related Posts', 'oswald' ),
                'default'  => true,
            ),
            array(
                'id'       => 'author_box',
                'type'     => 'switch',
                'title'    => esc_html__( 'Author Box on Single Post', 'oswald' ),
                'default'  => false,
            ),
            array(
                'id'       => 'post_comments',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post Comments', 'oswald' ),
                'default'  => true,
            ),
            array(
                'id'       => 'post_pingbacks',
                'type'     => 'switch',
                'title'    => esc_html__( 'Trackbacks and Pingbacks', 'oswald' ),
                'default'  => true,
            ),
            array(
                'id'       => 'blog_post_author',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Author Info on Posts', 'oswald' ),
                'default'  => true,
            ),
            array(
                'id'       => 'blog_post_likes',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Likes on Posts', 'oswald' ),
                'default'  => false,
            ),
            array(
                'id'       => 'blog_post_date',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Date on Posts', 'oswald' ),
                'default'  => true,
            ),
            array(
                'id'       => 'blog_post_comment',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Comments Count on Posts', 'oswald' ),
                'default'  => true,
                'required' => array( 'post_comments', '=', '1' ),
            ),
            array(
                'id'       => 'blog_post_share',
                'type'     => 'switch',
                'title'    => esc_html__( 'Share on Posts', 'oswald' ),
                'default'  => false,
            ),
            array(
                'id'       => 'blog_post_listing_content',
                'type'     => 'switch',
                'title'    => esc_html__( 'Cut Off Text in Blog Listing', 'oswald' ),
                'default'  => false,
            ),
        )
    ) );


    // -> START Portfolio Options
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Portfolio', 'oswald' ),
        'id'               => 'portfolio-option',
        'customizer_width' => '400px',
        'icon' => 'el el-picture',
        'fields'           => array(
            array(
                'id'       => 'portfolio_comments',
                'type'     => 'switch',
                'title'    => esc_html__( 'Portfolio Comments', 'oswald' ),
                'default'  => true,
            ),
            array(
                'id'       => 'portfolio_likes',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Likes on Portfolio', 'oswald' ),
                'default'  => true,
            ),
            array(
                'id'       => 'portfolio_post_share',
                'type'     => 'switch',
                'title'    => esc_html__( 'Share on Portfolio', 'oswald' ),
                'default'  => true,
            ),
            array(
                'id' => 'portfolio_slug',
                'type' => 'text',
                'title' => esc_html__('Portfolio Slug', 'oswald' ),
                'default' => 'portfolio'
            ),
            
        )
    ) );

    // -> START Team Options
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Team', 'oswald' ),
        'id'               => 'team-option',
        'customizer_width' => '400px',
        'icon' => 'el el-picture',
        'fields'           => array(
            array(
                'id' => 'team_slug',
                'type' => 'text',
                'title' => esc_html__('Team Slug', 'oswald' ),
                'default' => 'team'
            ),
            
        )
    ) );


    // -> START Layout Options
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Sidebars', 'oswald' ),
        'id'               => 'layout_options',
        'customizer_width' => '400px',
        'icon' => 'el el-website',
        'fields'           => array(
            array(
                'id'       => 'page_sidebar_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Page Sidebar Layout', 'oswald' ),
                'options'  => array(
                    'none' => array(
                        'alt' => 'None',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/1col.png'
                    ),
                    'left' => array(
                        'alt' => 'Left',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/2cl.png'
                    ),
                    'right' => array(
                        'alt' => 'Right',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/2cr.png'
                    )
                ),
                'default'  => 'none'
            ),
            array(
                'id'       => 'page_sidebar_def',
                'type'     => 'select',
                'title'    => esc_html__( 'Page Sidebar', 'oswald' ),
                'data'     => 'sidebars',
                'required' => array( 'page_sidebar_layout', '!=', 'none' ),
            ),
            array(
                'id'       => 'blog_single_sidebar_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Blog Single Sidebar Layout', 'oswald' ),
                'options'  => array(
                    'none' => array(
                        'alt' => 'None',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/1col.png'
                    ),
                    'left' => array(
                        'alt' => 'Left',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/2cl.png'
                    ),
                    'right' => array(
                        'alt' => 'Right',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/2cr.png'
                    )
                ),
                'default'  => 'none'
            ),
            array(
                'id'       => 'blog_single_sidebar_def',
                'type'     => 'select',
                'title'    => esc_html__( 'Blog Single Sidebar', 'oswald' ),
                'data'     => 'sidebars',
                'required' => array( 'blog_single_sidebar_layout', '!=', 'none' ),
            ),
            array(
                'id'       => 'portfolio_single_sidebar_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Portfolio Single Sidebar Layout', 'oswald' ),
                'options'  => array(
                    'none' => array(
                        'alt' => 'None',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/1col.png'
                    ),
                    'left' => array(
                        'alt' => 'Left',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/2cl.png'
                    ),
                    'right' => array(
                        'alt' => 'Right',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/2cr.png'
                    )
                ),
                'default'  => 'none'
            ),
            array(
                'id'       => 'portfolio_single_sidebar_def',
                'type'     => 'select',
                'title'    => esc_html__( 'Portfolio Single Sidebar', 'oswald' ),
                'data'     => 'sidebars',
                'required' => array( 'portfolio_single_sidebar_layout', '!=', 'none' ),
            ),
            array(
                'id'       => 'team_single_sidebar_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Team Single Sidebar Layout', 'oswald' ),
                'options'  => array(
                    'none' => array(
                        'alt' => 'None',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/1col.png'
                    ),
                    'left' => array(
                        'alt' => 'Left',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/2cl.png'
                    ),
                    'right' => array(
                        'alt' => 'Right',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/2cr.png'
                    )
                ),
                'default'  => 'none'
            ),
            array(
                'id'       => 'team_single_sidebar_def',
                'type'     => 'select',
                'title'    => esc_html__( 'Team Single Sidebar', 'oswald' ),
                'data'     => 'sidebars',
                'required' => array( 'team_single_sidebar_layout', '!=', 'none' ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Sidebar Generator', 'oswald' ),
        'id'               => 'sidebars_generator_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'=>'sidebars', 
                'type' => 'multi_text',
                'validate' => 'no_html',
                'add_text' => esc_html__('Add Sidebar', 'oswald' ),
                'title' => esc_html__('Sidebar Generator', 'oswald' ),
                'default' => array('Main Sidebar','Blog','Team'),
            ),
        )
    ) );   


    // -> START Styling Options
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Color Options', 'oswald' ),
        'id'               => 'color_options',
        'customizer_width' => '400px',
        'icon' => 'el-icon-brush'
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Colors', 'oswald' ),
        'id'               => 'color_options_color',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'        => 'theme-custom-color',
                'type'      => 'color',
                'title'     => esc_html__('Theme Color 1', 'oswald' ),
                'transparent' => false,
                'default'   => '#3b55e6',
                'validate'  => 'color',
            ),
            array(
                'id'        => 'theme-custom-color2',
                'type'      => 'color',
                'title'     => esc_html__('Theme Color 2', 'oswald' ),
                'transparent' => false,
                'default'   => '#f75757',
                'validate'  => 'color',
            ),
            array(
                'id'        => 'body-background-color',
                'type'      => 'color',
                'title'     => esc_html__('Body Background Color', 'oswald' ),
                'transparent' => false,
                'default'   => '#ffffff',
                'validate'  => 'color',
            ),
            array(
                'id'        => 'theme-adding-text-color',
                'type'      => 'color',
                'title'     => esc_html__('Adding text color', 'oswald' ),
                'transparent' => false,
                'default'   => '#9ba0b5',
                'validate'  => 'color',
            ),
        )
    ));


    Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Typography', 'oswald' ),
        'id'               => 'typography_options',
        'customizer_width' => '400px',
        'icon' => 'el-icon-font',
        'fields'           => array(
            array(
                'id'          => 'menu-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Menu Font', 'oswald' ),
                'google' => true,
                'font-weight'    => true,
                'color' => false,
                'line-height' => true,
                'font-size' => true,
                'font-backup' => false,
                'text-align' => false,
                'text-transform' => true,
                'default'     => array(
                    'font-weight' => '500',
                    'font-family' => 'Montserrat',
                    'google'      => true,
                    'font-size'   => '12px',
                    'line-height' => '28px',
                    'text-transform' => 'uppercase'
                ),
            ),

            array(
                'id' => 'main-font',
                'type' => 'typography',
                'title' => esc_html__('Main Font', 'oswald' ),
                'google' => true,
                'font-backup' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => true,
                'word-spacing' => false,
                'letter-spacing' => false,
                'text-align' => false,
                'all_styles'  => true,
                'default' => array(
                    'font-size' => '14px',
                    'line-height' => '24px',
                    'color' => '#3a405b',
                    'google' => true,
                    'font-family' => 'Open Sans',
                    'font-weight' => '400',
                ),
            ),
            array(
                'id' => 'header-font',
                'type' => 'typography',
                'title' => esc_html__('Headers Font', 'oswald' ),
                'google' => true,
                'font-backup' => false,
                'font-size' => false,
                'line-height' => false,
                'color' => true,
                'word-spacing' => false,
                'letter-spacing' => false,
                'text-align' => false,
                'text-transform' => false,
                'all_styles'  => true,
                'default' => array(
                    'color' => '#222328',
                    'google' => true,
                    'font-family' => 'Montserrat',
                    'font-weight' => '400',
                ),
            ),
            array(
                'id' => 'h1-font',
                'type' => 'typography',
                'title' => esc_html__('H1', 'oswald' ),
                'google' => true,
                'font-backup' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'word-spacing' => false,
                'letter-spacing' => false,
                'text-align' => false,
                'text-transform' => false,
                'default' => array(
                    'font-size' => '36px',
                    'line-height' => '43px',
                    'google' => true,
                    'font-family' => 'Montserrat',
                    'font-weight' => '900',
                ),
            ),
            array(
                'id' => 'h2-font',
                'type' => 'typography',
                'title' => esc_html__('H2', 'oswald' ),
                'google' => true,
                'font-backup' => false,
                'font-size' => true,
                'font-weight' => true,
                'line-height' => true,
                'color' => false,
                'word-spacing' => false,
                'letter-spacing' => false,
                'text-align' => false,
                'text-transform' => false,
                'default' => array(
                    'font-size' => '30px',
                    'line-height' => '40px',
                    'google' => true,
                    'font-family' => 'Montserrat',
                    'font-weight' => '900',
                ),
            ),
            array(
                'id' => 'h3-font',
                'type' => 'typography',
                'title' => esc_html__('H3', 'oswald' ),
                'google' => true,
                'font-backup' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'word-spacing' => false,
                'letter-spacing' => false,
                'text-align' => false,
                'text-transform' => false,
                'default' => array(
                    'font-size' => '24px',
                    'line-height' => '36px',
                    'google' => true,
                ),
            ),
            array(
                'id' => 'h4-font',
                'type' => 'typography',
                'title' => esc_html__('H4', 'oswald' ),
                'google' => true,
                'font-backup' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'word-spacing' => false,
                'letter-spacing' => false,
                'text-align' => false,
                'text-transform' => false,
                'default' => array(
                    'font-size' => '20px',
                    'line-height' => '33px',
                    'google' => true,
                ),
            ),
            array(
                'id' => 'h5-font',
                'type' => 'typography',
                'title' => esc_html__('H5', 'oswald' ),
                'google' => true,
                'font-backup' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'word-spacing' => false,
                'letter-spacing' => false,
                'text-align' => false,
                'text-transform' => false,
                'default' => array(
                    'font-size' => '16px',
                    'line-height' => '28px',
                    'google' => true,
                ),
            ),
            array(
                'id' => 'h6-font',
                'type' => 'typography',
                'title' => esc_html__('H6', 'oswald' ),
                'google' => true,
                'font-backup' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'word-spacing' => false,
                'letter-spacing' => false,
                'text-align' => false,
                'text-transform' => false,
                'default' => array(
                    'font-size' => '14px',
                    'line-height' => '24px',
                    'google' => true,
                ),
            ),
            array(
                'id' => 'secondary-font',
                'type' => 'typography',
                'title' => esc_html__('Secondary Font', 'oswald' ),
                'google' => true,
                'font-backup' => false,
                'font-size' => false,
                'line-height' => false,
                'color' => false,
                'word-spacing' => false,
                'letter-spacing' => false,
                'text-align' => false,
                'text-transform' => false,
                'default' => array(
                    'google' => true,
                    'font-family' => 'Crimson Text',
                    'font-weight' => '400',
                    'font-style'  => 'italic'
                ),
            ),
            array (
                'type' => 'custom_font',
                'id' => 'custom_font',
                'validate'=>'font_load',
                'title' => esc_html__('Font-face list:', 'oswald'),
                'subtitle' => esc_html__('Upload .zip archive with font-face files.', 'oswald').'<br>(<a target="_blank" href="http://www.fontsquirrel.com/tools/webfont-generator">'.esc_html__('Create your font-face package','oswald').'</a>)',
                'desc' => '<span style="color:#F09191">'.esc_html__('Note','oswald').':</span> '.esc_html__('You have to download the font-face.zip archive.','oswald').' <br>'.__('Pay your attention, that the archive has to contain the font-face files itself, and not the subfolders','oswald').'<br> ('.esc_html__('E.g.: font-face.zip/your-font-face.ttf, font-face.zip/your-font-face.eot, font-face.zip/your-font-face.woff etc','oswald').' ).<br> '.esc_html__('They\'ll be extracted and assigned automatically.', 'oswald').' ).<br> '.esc_html__('Please check the instruction how to create', 'oswald').' '.'.',
                'placeholder' => array (
                    'title' => esc_html__('This is a title', 'oswald'),
                    'description' => esc_html__('Description Here', 'oswald'),
                    'url' => esc_html__('Give us a link!', 'oswald'),
                ),
            ),
        )
    ) );

    /*
     * <--- END SECTIONS
     */
    

    // -> START Layout Options
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Shop', 'oswald' ),
        'id'               => 'woocommerce_layout_options',
        'customizer_width' => '400px',
        'icon' => 'el el-shopping-cart',
        'fields'           => array(
            
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Products Page', 'oswald' ),
        'id'               => 'products_page_settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'products_sidebar_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Products Page Sidebar Layout', 'oswald' ),
                'options'  => array(
                    'none' => array(
                        'alt' => 'None',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/1col.png'
                    ),
                    'left' => array(
                        'alt' => 'Left',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/2cl.png'
                    ),
                    'right' => array(
                        'alt' => 'Right',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/2cr.png'
                    )
                ),
                'default'  => 'left'
            ),
            array(
                'id'       => 'products_sidebar_def',
                'type'     => 'select',
                'title'    => esc_html__( 'Products Page Sidebar', 'oswald' ),
                'data'     => 'sidebars',
                'required' => array( 'products_sidebar_layout', '!=', 'none' ),
            ),
            array(
                'id' => 'products_per_page',
                'type' => 'text',
                'title' => esc_html__('Products Per Page', 'oswald' ),
                'default' => '9'
            ),
            array(
                'id'       => 'woocommerce_def_columns',
                'type'     => 'select',
                'title'    => esc_html__( 'Default Number of Columns', 'oswald' ),
                'desc'  => esc_html__( 'Select the number of columns in products page.', 'oswald' ),
                'options'  => array(
                    '2' => esc_html__( '2', 'oswald' ),
                    '3' => esc_html__( '3', 'oswald' ),
                    '4' => esc_html__( '4', 'oswald' ),
                ),
                'default'  => '3'
            ),
        )
    ) ); 
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Single Product Page', 'oswald' ),
        'id'               => 'product_page_settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'product_sidebar_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Single Product Page Sidebar Layout', 'oswald' ),
                'options'  => array(
                    'none' => array(
                        'alt' => 'None',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/1col.png'
                    ),
                    'left' => array(
                        'alt' => 'Left',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/2cl.png'
                    ),
                    'right' => array(
                        'alt' => 'Right',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/2cr.png'
                    )
                ),
                'default'  => 'none' 
            ),
            array(
                'id'       => 'product_sidebar_def',
                'type'     => 'select',
                'title'    => esc_html__( 'Single Product Page Sidebar', 'oswald' ),
                'data'     => 'sidebars',
                'required' => array( 'product_sidebar_layout', '!=', 'none' ),
            ),
            array(
                'id'       => 'shop_title_conditional',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Single Product Title Area', 'oswald' ),
                'default'  => false,
                'required' => array( 'page_title_conditional', '=', '1' ),
            ),
            array(
                'id'       => 'next_prev_product',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Next and Previous products.', 'oswald' ),
                'default'  => false,
            ),
            array(
                'id'        => 'share_social',
                'type'      => 'switch',
                'title'     => esc_html__( 'Show Social links', 'oswald' ),
                'default'   => false,
                'customizer' => false,
            ),
            array(
                'id'        =>'share_social_select', 
                'type'      => 'select',
                'multi'     => true,
                'customizer' => false,
                'title'     => esc_html__('Select Social links', 'oswald' ),
                'options'   => array(
                    'facebook'      => esc_html__( 'Facebook', 'oswald' ),
                    'twitter'       => esc_html__( 'Twitter', 'oswald' ),
                    'pinterest'     => esc_html__( 'Pinterest', 'oswald' ),
                    'google'        => esc_html__( 'Google plus', 'oswald' ),
                    'tumblr'        => esc_html__( 'Tumblr', 'oswald' ),
                    'mail'          => esc_html__( 'Mail', 'oswald' ),
                    'reddit'        => esc_html__( 'Reddit', 'oswald' ),
                ),
                'required'  => array( 'share_social', '=', true ),
            ),
            array(
                'id'        => 'share_social-facebook',
                'type'      => 'text',
                'title'     => esc_html__('Title for Facebook icon', 'oswald' ),
                'default'   => '',
                'customizer' => false,
                'required'  => array( 'share_social_select', '=', 'facebook' ),
            ),
            array(
                'id'        => 'share_social-twitter',
                'type'      => 'text',
                'title'     => esc_html__('Title for Twitter icon', 'oswald' ),
                'default'   => '',
                'customizer' => false,
                'required'  => array( 'share_social_select', '=', 'twitter' ),
            ),
            array(
                'id'        => 'share_social-pinterest',
                'type'      => 'text',
                'title'     => esc_html__('Title for Pinterest icon', 'oswald' ),
                'default'   => '',
                'customizer' => false,
                'required'  => array( 'share_social_select', '=', 'pinterest' ),
            ),
            array(
                'id'        => 'share_social-google',
                'type'      => 'text',
                'title'     => esc_html__('Title for Google plus icon', 'oswald' ),
                'default'   => '',
                'customizer' => false,
                'required'  => array( 'share_social_select', '=', 'google' ),
            ),
            array(
                'id'        => 'share_social-linkedin',
                'type'      => 'text',
                'title'     => esc_html__('Title for LinkedIn icon', 'oswald' ),
                'default'   => '',
                'customizer' => false,
                'required'  => array( 'share_social_select', '=', 'linkedin' ),
            ),
            array(
                'id'        => 'share_social-vk',
                'type'      => 'text',
                'title'     => esc_html__('Title for VK icon', 'oswald' ),
                'default'   => '',
                'customizer' => false,
                'required'  => array( 'share_social_select', '=', 'vk' ),
            ),
            array(
                'id'        => 'share_social-tumblr',
                'type'      => 'text',
                'title'     => esc_html__('Title for Tumblr icon', 'oswald' ),
                'default'   => '',
                'customizer' => false,
                'required'  => array( 'share_social_select', '=', 'tumblr' ),
            ),
            array(
                'id'        => 'share_social-mail',
                'type'      => 'text',
                'title'     => esc_html__('Title for E-mail icon', 'oswald' ),
                'default'   => '',
                'customizer' => false,
                'required'  => array( 'share_social_select', '=', 'mail' ),
                'subtitle'  => esc_html__( 'Send this article via e-mail to a friend', 'oswald' ),
            ),
            array(
                'id'        => 'share_social-reddit',
                'type'      => 'text',
                'title'     => esc_html__('Title for Reddit icon', 'oswald' ),
                'default'   => '',
                'customizer' => false,
                'required'  => array( 'share_social_select', '=', 'reddit' ),
            ),
        )
    ) );




    // If Redux is running as a plugin, this will remove the demo notice and links
    add_action( 'redux/loaded', 'remove_demo' );


    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

