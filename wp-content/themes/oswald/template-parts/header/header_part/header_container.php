<?php 
extract($options);
$header_sections = array();
$is_burger_sidebar = false;
$is_login = false;
$is_header_menu = false;
ob_start();
?><div class='wpd_header_builder__container'><?php

    foreach ($wpd_header_builder_array as $side => $value) {


        if (!empty($wpd_header_builder_array[$side]['content']) && $side != 'all_item' ) {

            $side_out = '';

            if (count($wpd_header_builder_array[$side]['content']) == 1 && empty($wpd_header_builder_array[$side]['content']['placebo']) || count($wpd_header_builder_array[$side]['content']) > 1) {
                //get level and position of menu part
                $full_position = explode('_', $side, 2);
                $level = !empty($full_position[0]) ? $full_position[0] : '';
                $position = !empty($full_position[1]) ? $full_position[1] : '';

                if ($header_sticky) {
                    if (!empty($preset)) {
                        $enable_section_in_sticky = (bool)oswald_option_presets($preset,"side_".$level."_sticky");
                    }else{
                        $enable_section_in_sticky = (bool)oswald_option("side_".$level."_sticky");
                    }

                }else{
                    $enable_section_in_sticky = true;
                }

                if ($enable_section_in_sticky) {

                    $side_class = '';
                    $side_class .= sanitize_html_class($side);
                    $side_class .= !empty($position) ? ' '.sanitize_html_class($position) : '';

                    if (!empty($preset)) {
                        $side_align = oswald_option_presets($preset,$side."-align");
                    }else{
                        $side_align = oswald_option($side."-align");
                    }

                    if ($side_align != $position) {
                        $side_class .= ' header_side--custom-align header_side--'.$side_align.'-align';
                    }

                        $side_content_out = '';
                        ob_start();
                        foreach ($wpd_header_builder_array[$side]['content'] as $key => $value) {
                            if ($key != 'placebo' && $key != 'undefined') {

                                    switch ($key) {
                                        case 'logo':
                                            get_template_part( 'template-parts/header/header_part/logo' );
                                            break;
                                        case 'menu':
                                            if (!empty($menu_slug)) {
                                                oswald_get_template_part( 'template-parts/header/header_part/menu', '', array('menu_slug' => $menu_slug, 'menu_ative_top_line' => $menu_ative_top_line));
                                                $is_header_menu = true;
                                            }
                                            break;
                                        case 'button':
                                            $button_page = oswald_option('button_select');
                                            $button_icon = oswald_option('icon_select__button');
                                            if (!empty($button_page)) {
                                                echo "<div class='wpd_header_builder_component wpd_header_builder_button_component'><div class='wpd_module_button button_alignment_inline'><a class='button_size_small btn_icon_position_left' href='".esc_url(get_permalink($button_page))."' style='border-width: 1px; border-style: solid; border-radius: 30px;'><div class='btn_icon_container'>".(!empty($button_icon) ? "<span class='wpd_btn_icon ".$button_icon."' style='font-size: 12px; line-height: 14px;'></span>" : "")."</div><span class='wpd_btn_text'>Add Listing</span></a></div></div>";
                                            }
                                            break;
                                        case 'search':
                                            echo '<div class="wpd_header_builder_component wpd_header_builder_search_component">'.do_shortcode('[wpd_search]').'</div>';
                                            break;
                                        case 'login':
                                            $is_login = true;
                                            get_template_part( 'template-parts/header/header_part/login' );
                                            break;
                                        case 'cart':
                                            ///////
                                            if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                                                get_template_part( 'template-parts/header/header_part/cart' );
                                            }
                                            break;
                                        case 'burger_sidebar':
                                            $is_burger_sidebar = true;
                                            ?><div class="wpd_header_builder_component wpd_header_builder_burger_sidebar_component"><i class="burger_sidebar_icon"><span class="first"></span><span class="second"></span><span class="third"></span></i></div><?php
                                            break;
                                        case 'text1':
                                            $text1_out = oswald_get_header_builder_text_component(1);
                                            echo !empty($text1_out) ? $text1_out  : '';
                                            break;
                                        case 'text2':
                                            $text2_out = oswald_get_header_builder_text_component(2);
                                            echo !empty($text2_out) ? $text2_out  : '';
                                            break;
                                        case 'text3':
                                            $text3_out = oswald_get_header_builder_text_component(3);
                                            echo !empty($text3_out) ? $text3_out  : '';
                                            break;
                                        case 'text4':
                                            $text4_out = oswald_get_header_builder_text_component(4);
                                            echo !empty($text4_out) ? $text4_out  : '';
                                            break;
                                        case 'text5':
                                            $text5_out = oswald_get_header_builder_text_component(5);
                                            echo !empty($text5_out) ? $text5_out  : '';
                                            break;
                                        case 'text6':
                                            $text6_out = oswald_get_header_builder_text_component(6);
                                            echo !empty($text6_out) ? $text6_out  : '';
                                            break;
                                        case 'delimiter1':
                                        case 'delimiter2':
                                        case 'delimiter3':
                                        case 'delimiter4':
                                        case 'delimiter5':
                                        case 'delimiter6':
                                            ?><div class="wpd_header_builder_component wpd_header_builder_delimiter_component"></div><?php
                                            break;
                                        case 'empty_space1':
                                        case 'empty_space2':
                                        case 'empty_space3':
                                        case 'empty_space4':
                                        case 'empty_space5':
                                            ?><div class="wpd_header_builder_component wpd_header_builder_empty_space_component"></div><?php
                                            break;
                                    }
                            }
                        }
                        $side_content_out = ob_get_clean();
                        if (!empty($side_content_out)) {
                            $side_out .= "<div class='".$side_class." header_side'>";
                                $side_out .=  "<div class='header_side_container'>";
                                    $side_out .= $side_content_out;
                                $side_out .=  "</div>";//header side container end
                            $side_out .=  "</div>";//header side end
                        }

                    if (!empty($side_out)) {
                        $header_sections[$level][$position] = $side_out;
                    }
                }
            }
        }
    }

    foreach ($header_sections as $header_section => $header_section_content) {
        //count($bottom_header_layout['Center align side']) <= 1 ? ' empty_center_side' : ''
        if (!empty($preset)) {
            $header_mobile_class = !(bool)oswald_option_presets($preset,"side_".$header_section."_mobile") ? ' wpd_header_builder__section--hide_on_mobile' : '';
        }else{
            $header_mobile_class = !(bool)oswald_option("side_".$header_section."_mobile") ? ' wpd_header_builder__section--hide_on_mobile' : '';
        }
        echo "<div class='wpd_header_builder__section wpd_header_builder__section--".esc_attr($header_section).(!empty($header_section_content['center']) ? ' not_empty_center_side' : '' ).$header_mobile_class."'>";
            echo "<div class='wpd_header_builder__section-container".(!$header_full_width ? ' container' : ' container_full')."'>";
                if (empty($header_section_content['left'])) {
                    echo "<div class='" . esc_attr($header_section) . "_left left header_side'></div>";
                }
                foreach ($header_section_content as $side => $side_content) {
                    echo  $side_content;
                }
                if (empty($header_section_content['right'])) {
                    echo "<div class='" . esc_attr($header_section) . "_right right header_side'></div>";
                }
            echo "</div>";
        echo "</div>";
    }
echo "</div>";
$wpd_header_builder__container = ob_get_clean();
$output_array = array();
$output_array['header_out'] = $wpd_header_builder__container;
$output_array['is_login'] = $is_login;
$output_array['is_burger_sidebar'] = $is_burger_sidebar;
$output_array['is_header_menu'] = $is_header_menu;
return $output_array;