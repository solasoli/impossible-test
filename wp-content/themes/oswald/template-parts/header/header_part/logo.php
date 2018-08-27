<?php 
$header_logo_src = oswald_option("header_logo");
$header_logo_src = !empty($header_logo_src) ? $header_logo_src['url'] : '';
$logo_light_src = oswald_option("logo_light");
$logo_light_src = !empty($logo_light_src) ? $logo_light_src['url'] : '';
$logo_dark_src =  oswald_option("logo_dark");
$logo_dark_src =  !empty($logo_dark_src) ? $logo_dark_src['url'] : '';
$logo_sticky_src =  oswald_option("logo_sticky");
$logo_sticky_src =  !empty($logo_sticky_src) ? $logo_sticky_src['url'] : '';
$logo_mobile_src =  oswald_option("logo_mobile");
$logo_mobile_src =  !empty($logo_mobile_src) ? $logo_mobile_src['url'] : '';
$logo_limit_on_mobile = oswald_option("logo_limit_on_mobile"); 

if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0) {
    if (rwmb_meta('mb_customize_logo') == 'custom') {
        $mb_header_logo_src = rwmb_meta("mb_header_logo");
        if (!empty($mb_header_logo_src)) {
            $header_logo_src = array_values($mb_header_logo_src);
            $header_logo_src = $header_logo_src[0]['full_url'];
        }
        $mb_logo_sticky_src = rwmb_meta("mb_logo_sticky");
        if (!empty($mb_logo_sticky_src)) {
            $logo_sticky_src = array_values($mb_logo_sticky_src);
            $logo_sticky_src = $logo_sticky_src[0]['full_url'];
        }
        $mb_logo_mobile_src = rwmb_meta("mb_logo_mobile");
        if (!empty($mb_logo_mobile_src)) {
            $logo_mobile_src = array_values($mb_logo_mobile_src);
            $logo_mobile_src = $logo_mobile_src[0]['full_url'];
        }                
    }
}

$logo_height_custom = oswald_option('logo_height_custom');
$logo_height = oswald_option('logo_height');
$logo_height = !empty($logo_height['height']) ? $logo_height['height'] : '';
$logo_max_height = oswald_option('logo_max_height');
$sticky_logo_height = oswald_option('sticky_logo_height');
$sticky_logo_height = $sticky_logo_height['height'];

// height for logo
$header_height = oswald_option('header_height');
$header_height = $header_height['height'];


if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0) {
    if (rwmb_meta('mb_customize_logo') == 'custom') {
        if (rwmb_meta('mb_logo_height_custom') == '1') {
            $logo_height_custom = rwmb_meta('mb_logo_height_custom');
            $logo_height = rwmb_meta('mb_logo_height');
            $logo_max_height = rwmb_meta('mb_logo_max_height');
            $sticky_logo_height = rwmb_meta('mb_sticky_logo_height');
        }                
    }
    if (rwmb_meta('mb_customize_header_layout') == 'custom') {
        $header_height = rwmb_meta("mb_header_height");
    }
}

if (!empty($header_height) && $logo_max_height != '1') {
    $header_height_css = ' style="max-height:'.esc_attr($header_height*0.9).'px;"';
}else{
    $header_height_css = '';
}

$logo_height_style = '';
if (!empty($logo_height) && $logo_height_custom == '1') {
    $logo_height_style .= 'height:'.(esc_attr($logo_height)).'px;';
}
if (!empty($header_height) && $logo_max_height != '1') {
    $logo_height_style .= 'max-height:'.esc_attr($header_height*0.9).'px;';
}
$logo_height_style = !empty($logo_height_style) ? ' style="'.$logo_height_style.'"' : '';

$sticky_logo_height_style = '';
if (!empty($sticky_logo_height) && $logo_height_custom == '1') {
    $sticky_logo_height_style .= 'height:'.(esc_attr($sticky_logo_height)).'px;';
}elseif(!empty($logo_height) && $logo_height_custom == '1'){
    $sticky_logo_height_style .= 'height:'.(esc_attr($logo_height)).'px;';
}
$sticky_logo_height_style = !empty($sticky_logo_height_style) ? ' style="'.$sticky_logo_height_style.'"' : '';

$logo_class = '';
if ($logo_height_custom == '1' && $logo_max_height == '1' ) {
    $logo_class .= ' no_height_limit';
}

if ($logo_limit_on_mobile == '0') {
    $logo_class .= ' logo_mobile_not_limited';
}

if (empty($header_logo_src) && has_custom_logo()) {
    $header_height_css = ' style="height: 95%";';
}


?><div class='logo_container<?php echo esc_attr($logo_class) . 
(!empty($logo_sticky_src) ? ' sticky_logo_enable' : '').
(!empty($logo_mobile_src) ? ' mobile_logo_enable' : '');?>'>
    <a href='<?php echo esc_url(home_url('/'));?>'<?php echo ''.$header_height_css; ?>><?php
        if (!empty($header_logo_src)) {
           ?><img class="default_logo" src="<?php echo esc_url($header_logo_src); ?>" alt="<?php echo esc_attr_e('logo','oswald') ?>"<?php echo ''.$logo_height_style?>><?php
        }else{
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            if ( has_custom_logo() ) {
                ?><img class="default_logo" src="<?php echo esc_url($logo[0]); ?>" alt="<?php echo esc_attr_e('logo','oswald') ?>"<?php echo !empty($logo_height_style) ? $logo_height_style : ' style="max-height: 95%;"';?>><?php
            } else {
                ?><h1 class="site-title"><?php echo esc_html(get_bloginfo( 'name' )); ?></h1><?php
                $description = get_bloginfo( 'description', 'display' );
                if ( ! empty( $description ) ) :
                ?>
                    <div class="site-description">

                        <?php echo esc_html($description); ?>

                    </div>

                <?php elseif ( is_customize_preview() ) : ?>
                <div class="site-description"></div>
                <?php endif;
            }
            
        }
        if (!empty($logo_sticky_src)) {
            ?><img class="sticky_logo" src="<?php echo esc_url($logo_sticky_src); ?>" alt="<?php echo esc_attr_e('logo','oswald') ?>"<?php echo ''.$sticky_logo_height_style;?>><?php
        }   
        if (!empty($logo_mobile_src)) {
            ?><img class="mobile_logo" src="<?php echo esc_url($logo_mobile_src); ?>" alt="<?php echo esc_attr_e('logo','oswald') ?>"<?php echo ''.$sticky_logo_height_style;?>><?php
        }     
    ?></a>
</div>