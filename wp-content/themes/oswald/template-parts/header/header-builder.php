<?php
$wpdaddy_header_builder_array = oswald_option("wpdaddy_header_builder_id");
$preset = '';
//check if preset set in metabox
if (class_exists( 'RWMB_Loader' ) && $id !== 0) {
    $mb_header_presets = rwmb_meta('mb_header_presets');          
    if ($mb_header_presets != 'default' && !empty($mb_header_presets)) {
        $presets = oswald_header_presets ();
        $preset = json_decode($presets[$mb_header_presets],true);      
        $wpdaddy_header_builder_array = oswald_option_presets($preset,'wpdaddy_header_builder_id');
    }
}
if (!empty($wpdaddy_header_builder_array)) {

    $header_sections = array();

    /* header builder main settings */
    $header_full_width = (bool)oswald_option('header_full_width');
    $header_sticky = (bool)oswald_option('header_sticky');
    $header_on_bg = false;
    /* end header builder main settings */

    /* header builder component */

    //MENU
    $menu_slug = oswald_option("menu_select");
    if ( !class_exists( 'wpdaddy_core' ) || empty($menu_slug) ) {
        $menu_array = get_nav_menu_locations();
        if (!empty($menu_array) && is_array($menu_array) && !empty($menu_array['main_menu'])) {                    
            $menu_slug = $menu_array['main_menu'];
        }else{
            $menu_slug = '';
        }
    }
    
    $menu_ative_top_line = oswald_option('menu_ative_top_line');

    // Burger sidebar
    $is_burger_sidebar = false;
    $sidebar = oswald_option("burger_sidebar_select");
    $sidebar_position = oswald_option("burger_sidebar_position");
    //login
    $is_login = false;

    /* end header builder component */

    /* sticky */
    if ($header_sticky) {
        $options['header_sticky'] = $header_sticky;
        $header_sticky_appearance_style = oswald_option('header_sticky_appearance_style');
        $header_sticky_appearance_number = oswald_option('header_sticky_appearance_number');
        $header_sticky_appearance_number = (oswald_option('header_sticky_appearance_from_top') == 'custom') && !empty($header_sticky_appearance_number) ? $header_sticky_appearance_number['height'] : '';
        $header_sticky_shadow = oswald_option('header_sticky_shadow');
    }
    /* end sticky */

    // change option by option from metabox
    if (class_exists( 'RWMB_Loader' ) && $id !== 0) {              
        if ($mb_header_presets != 'default' && !empty($mb_header_presets)) {        
            $header_full_width = (bool)oswald_option_presets($preset,'header_full_width');
            $header_sticky = (bool)oswald_option_presets($preset,'header_sticky');
            $menu_slug = oswald_option_presets($preset,"menu_select");
            $menu_ative_top_line = oswald_option_presets($preset,'menu_ative_top_line');
            $sidebar = oswald_option_presets($preset,"burger_sidebar_select");
            $sidebar_position = oswald_option_presets($preset,"burger_sidebar_position");
        }
        
        $mb_customize_header_layout = rwmb_meta('mb_customize_header_layout');
        if ($mb_customize_header_layout == 'none') {
            return false;
        }
        /*if ($mb_customize_header_layout == 'custom') {*/
            $header_on_bg = rwmb_meta('mb_header_on_bg');
        /*}*/
        
    }

    echo "<div class='wpd_header_builder".((bool)$header_on_bg ? ' header_over_bg' : '')."'>";

        $options = array('wpd_header_builder_array' => $wpdaddy_header_builder_array );
        $options['header_full_width'] = $header_full_width;
        $options['menu_slug'] = $menu_slug;
        $options['menu_ative_top_line'] = $menu_ative_top_line;
        $options['header_sticky'] = false;
        if (!empty($preset)) {
            $options['preset'] = $preset;
        }else{
            $options['preset'] = '';
        }
        
        $wpd_header_builder_out_array = oswald_header_builder__container($options);

        $is_burger_sidebar = $wpd_header_builder_out_array['is_burger_sidebar'];
        $is_login = $wpd_header_builder_out_array['is_login'];
        $is_header_menu = $wpd_header_builder_out_array['is_header_menu']; 
        echo ''.$wpd_header_builder_out_array['header_out'];
        if ($header_sticky) {
            $options['header_sticky'] = (bool)$header_sticky;
            echo "<div class='sticky_header".($header_sticky_shadow == '1' ? ' header_sticky_shadow' : '')."'".(!empty($sticky_styles) ? $sticky_styles : '').(!empty($header_sticky_appearance_style) ? ' data-sticky-type="'.esc_attr($header_sticky_appearance_style).'"' : '').(!empty($header_sticky_appearance_number) ? ' data-sticky-number="'.((int)$header_sticky_appearance_number).'"' : '').">";

            $wpd_header_builder_out_array = oswald_header_builder__container($options);
            echo ''.$wpd_header_builder_out_array['header_out'];
            echo "</div>";
        }
        if ($is_header_menu && !empty($menu_slug)) {                                                   
            ob_start();
                oswald_get_template_part( 'template-parts/header/header_part/menu', '', array('menu_slug' => $menu_slug, 'menu_ative_top_line' => $menu_ative_top_line));
            $menu = ob_get_clean();
            if (!empty($menu)) {
                echo "<div class='mobile_menu_container'>";
                    echo ($header_full_width ? "<div class='fullwidth-wrapper'>":"<div class='container'>");
                        echo "<div class='wpd_header_builder_component wpd_header_builder_menu_component'><nav class='main-menu main_menu_container".($menu_ative_top_line == '1' ? ' menu_line_enable' : '')."'>";
                        echo ''.$menu; 
                        echo "</nav>";
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
        }
    echo "</div>";
    if ($is_burger_sidebar) {
        echo '<div class="wpd_header_builder__burger_sidebar '.(!empty($sidebar_position) && $sidebar_position == 'left' ? 'wpd_header_builder__burger_sidebar--left' : 'wpd_header_builder__burger_sidebar--right').'">';
            echo '<div class="wpd_header_builder__burger_sidebar-cover"></div>';
            echo '<div class="wpd_burger_sidebar_container">';
                if (is_active_sidebar( $sidebar )) {
                    echo "<aside class='sidebar'>";
                    dynamic_sidebar( $sidebar );
                    echo "</aside>";
                }
            echo '</div>';
        echo '</div>';
    }
    if ($is_login) {  
        get_template_part( 'template-parts/header/header_part/login_modal' ); 
    }

}