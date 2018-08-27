<?php 
$login_class = '';
$login_container = '';
$login_button_switcher = oswald_option('login_button_switcher');
if ($login_button_switcher) {
    $login_button_color = oswald_option('login_button_color');
    $login_button_bg_color = oswald_option('login_button_bg_color');
    $login_button_color_hover = oswald_option('login_button_color_hover');
    $login_button_bg_color_hover = oswald_option('login_button_bg_color_hover');
}else{
    $login_button_color = '';
    $login_button_bg_color = '';
    $login_button_color_hover = '';
    $login_button_bg_color_hover = '';
}

if ( oswald_is_lwa() ) {
    if ( ! is_user_logged_in() ) {
        $login_class .= ' lwa-links-modal';
    }
    $login_class .= ' lwa-login-link';
    $login_container .= ' lwa';
}
if (! is_user_logged_in() &&
    !oswald_is_lwa() &&
    !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )) {
    $login_link = esc_url(get_permalink());
    $login_link = $login_link == 0 ? esc_url(home_url()) : $login_link;
    $url = esc_url( wp_login_url( $login_link ) );
}else{
   $url = '';
}

?><div class="wpd_header_builder_component wpd_header_builder_login_component<?php echo esc_attr($login_container);?>"><?php
if (!is_user_logged_in()) {
    echo !empty($url) ?'<a href="'.$url.'" title="'.esc_attr__('Login','oswald').'">' : '';
    if (!$login_button_switcher) {
        echo '<i class="wpd_login_icon'.esc_attr($login_class).'"></i>';
    }   
    ?><span class="wpd_login_button wpd_custom_color<?php echo esc_attr($login_class) ?>"<?php 
    // attributes
    if (!empty($login_button_color) || !empty($login_button_bg_color)) {
        echo ' style="';
        if (!empty($login_button_color)) {
            echo "color:".esc_attr($login_button_color).';';
        }
        if (!empty($login_button_bg_color)) {
            echo "background-color:".esc_attr($login_button_bg_color).';';
            echo "border-color:".esc_attr($login_button_bg_color).';';
        }
        echo '"';
    }
    if (!empty($login_button_color)) {
        echo ' data-color="'.esc_attr($login_button_color).'"';
    }
    if (!empty($login_button_bg_color)) {
        echo ' data-bg-color="'.esc_attr($login_button_bg_color).'"';
        echo ' data-border-color="'.esc_attr($login_button_bg_color).'"';
    }
    if (!empty($login_button_color_hover)) {
        echo ' data-hover-color="'.esc_attr($login_button_color_hover).'"';
        echo ' data-hover-border-color="'.esc_attr($login_button_color_hover).'"';
    }
    if (!empty($login_button_bg_color_hover)) {
        echo ' data-hover-bg-color="'.esc_attr($login_button_bg_color_hover).'"';
    }
    ?>><?php 
        echo esc_html__('Login','oswald'); 
    ?></span><?php
    echo !empty($url) ? "</a>" : "";
}else{
    get_template_part( 'template-parts/header/user-avatar' ); 
}
echo "</div>";