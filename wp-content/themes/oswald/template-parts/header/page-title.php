<?php 

$id = get_queried_object_id();
$page_title_top_border = oswald_option("page_title_top_border");
$page_title_top_border_color = oswald_option("page_title_top_border_color");
$page_title_bottom_border = oswald_option("page_title_bottom_border");
$page_title_bottom_border_color = oswald_option("page_title_bottom_border_color");

$page_title_conditional = ((oswald_option('page_title_conditional') == '1' || oswald_option('page_title_conditional') == true)) ? 'yes' : 'no';
$blog_title_conditional = ((oswald_option('blog_title_conditional') == '1' || oswald_option('blog_title_conditional') == true)) ? 'yes' : 'no';
$portfolio_title_conditional = ((oswald_option('portfolio_title_conditional') == '1' || oswald_option('portfolio_title_conditional') == true)) ? 'yes' : 'no';
$team_title_conditional = ((oswald_option('team_title_conditional') == '1' || oswald_option('team_title_conditional') == true)) ? 'yes' : 'no';
if (is_singular('post') && $page_title_conditional == 'yes' && $blog_title_conditional == 'no') {
    $page_title_conditional = 'no';
}
if (is_singular('portfolio') && $page_title_conditional == 'yes' && $portfolio_title_conditional == 'no') {
    $page_title_conditional = 'no';
}
if (is_singular('team') && $page_title_conditional == 'yes' && $team_title_conditional == 'no') {
    $page_title_conditional = 'no';
}
$page_title_bottom_margin = oswald_option("page_title_bottom_margin");
$page_title_bottom_margin = !empty($page_title_bottom_margin['margin-bottom']) ? (int)$page_title_bottom_margin['margin-bottom'] : '';

if ($page_title_conditional == 'yes') {
    $page_title_breadcrumbs_conditional = oswald_option("page_title_breadcrumbs_conditional") == '1' ? 'yes' : 'no';
    $page_title_vert_align = oswald_option("page_title_vert_align");
    $page_title_horiz_align = oswald_option("page_title_horiz_align");
    $page_title_font_color = oswald_option("page_title_font_color");
    $page_title_bg_color = oswald_option("page_title_bg_color");
    $page_title_bg_image_array = oswald_option("page_title_bg_image");
    $page_title_height = oswald_option("page_title_height");
    $page_title_height = $page_title_height['height'];
    $header_height = oswald_option('header_height');
    $header_height = $header_height['height'];

    if (oswald_option('header_on_bg') == '1') {
        if (oswald_option('top_header_bar_left') == '1' || oswald_option('top_header_bar_right') == '1') {
            $top_header_height = 40;
        }else{
            $top_header_height = 0;
        }
        $header_height = oswald_option("header_height");
        $page_title_top_padding = !empty($header_height['height']) ? 20 + (int)$header_height['height'] + (int)$top_header_height : '';
    }else{
        $page_title_top_padding = '';
    }

}

if (class_exists( 'RWMB_Loader' ) && $id !== 0) {
    $page_sub_title = rwmb_meta('mb_page_sub_title');
    $mb_page_title_conditional = rwmb_meta('mb_page_title_conditional');
    if ($mb_page_title_conditional == 'yes') {
        $page_title_conditional = 'yes';
        $page_title_breadcrumbs_conditional = rwmb_meta('mb_show_breadcrumbs') == '1' ? 'yes' : 'no';
        $page_title_vert_align = rwmb_meta('mb_page_title_vertical_align'); 
        $page_title_horiz_align = rwmb_meta('mb_page_title_horizontal_align');
        $page_title_font_color = rwmb_meta('mb_page_title_font_color');
        $page_title_bg_color = rwmb_meta('mb_page_title_bg_color');
        $page_title_height = rwmb_meta('mb_page_title_height');
        $page_title_top_border = rwmb_meta("mb_page_title_top_border");
        $mb_page_title_top_border_color = rwmb_meta("mb_page_title_top_border_color");
        $mb_page_title_top_border_color_opacity = rwmb_meta("mb_page_title_top_border_color_opacity");

        if (!empty($mb_page_title_top_border_color) && $page_title_top_border == '1') {
            $page_title_top_border_color['rgba'] = 'rgba('.(oswald_HexToRGB($mb_page_title_top_border_color)).','.$mb_page_title_top_border_color_opacity.')';
        }else{
            $page_title_top_border_color = '';
        }

        $page_title_bottom_border = rwmb_meta("mb_page_title_bottom_border");
        $mb_page_title_bottom_border_color = rwmb_meta("mb_page_title_bottom_border_color");
        $mb_page_title_bottom_border_color_opacity = rwmb_meta("mb_page_title_bottom_border_color_opacity");

        if (!empty($mb_page_title_bottom_border_color) && $page_title_bottom_border == '1') {
            $page_title_bottom_border_color['rgba'] = 'rgba('.(oswald_HexToRGB($mb_page_title_bottom_border_color)).','.$mb_page_title_bottom_border_color_opacity.')';
        }else{
            $page_title_bottom_border_color = '';
        }

    }elseif($mb_page_title_conditional == 'no'){
        $page_title_conditional = 'no';
    }

    if (rwmb_meta('mb_customize_header_layout') == 'custom' && rwmb_meta('mb_header_on_bg') == '1') {
        if (rwmb_meta('mb_top_header_left_bar') == '1' || rwmb_meta('mb_top_header_right_bar') == '1') {
            $top_header_height = 40;
        }else{
            $top_header_height = 0;
        }
        $header_height = rwmb_meta("mb_header_height");
        $page_title_top_padding = !empty($header_height) ? 20 + (int)$header_height + (int)$top_header_height : '';
    }elseif(rwmb_meta('mb_customize_header_layout') == 'custom'){
        $page_title_top_padding = '';
    }
}

$page_title_classes = !empty($page_title_horiz_align) ? ' wpd-page-title_horiz_align_'.esc_attr($page_title_horiz_align) : 'wpd-page-title_horiz_align_left';
$page_title_classes .= !empty($page_title_vert_align) ? ' wpd-page-title_vert_align_'.esc_attr($page_title_vert_align) : 'wpd-page-title_vert_align_middle';
$page_title_classes .= !empty($page_title_height) && (int)$page_title_height < 80 ? ' wpd-page-title_small_header' : '';

$page_title_styles = !empty($page_title_bg_color) ? 'background-color:'.esc_attr($page_title_bg_color).';' : '';
$page_title_styles .= !empty($page_title_top_padding) ? 'padding-top:'.esc_attr($page_title_top_padding).'px;' : '';
$page_title_styles .= !empty($page_title_height) ? 'height:'.esc_attr($page_title_height).'px;' : '';
$page_title_styles .= !empty($page_title_font_color) ? 'color:'.esc_attr($page_title_font_color).';' : '';
$page_title_styles .= !empty($page_title_bottom_margin) ? 'margin-bottom:'.esc_attr($page_title_bottom_margin).'px;' : '';


if ($page_title_top_border == '1') {            
    $page_title_styles .= !empty($page_title_top_border_color['rgba']) ? 'border-top: 1px solid '.esc_attr($page_title_top_border_color['rgba']).';' : '';  
}

if ($page_title_bottom_border == '1') {            
    $page_title_styles .= !empty($page_title_bottom_border_color['rgba']) ? 'border-bottom: 1px solid '.esc_attr($page_title_bottom_border_color['rgba']).';' : '';  
}




$page_title_styles .= oswald_background_render('page_title','mb_page_title_conditional','yes');

$wpd_page_title = oswald_page_title();

if ($page_title_conditional == 'yes' && !is_404() && !empty($wpd_page_title)) {
    ?>
    <div class="wpd-page-title<?php echo !empty($page_title_classes) ? esc_attr($page_title_classes) : ''; ?>"<?php echo !empty($page_title_styles) ? ' style="'.esc_attr($page_title_styles).'"' : '' ?>>
        <div class='wpd-page-title__inner'>
            <div class='container'>
                <div class='wpd-page-title__content'>
                    <div class='page_title'>
                        <h1><?php echo esc_html($wpd_page_title); ?></h1>
                        <?php if(!empty($page_sub_title) && $page_title_horiz_align != 'center'): ?>
                            <div class='page_sub_title'><div><?php echo esc_attr( $page_sub_title ); ?></div></div>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($page_sub_title) && $page_title_horiz_align == 'center'): ?>
                        <div class='page_sub_title'><div><?php echo esc_attr( $page_sub_title ); ?></div></div>
                    <?php endif; ?>
                    <?php if ($page_title_breadcrumbs_conditional == 'yes'): ?>
                        <div class='wpd_breadcrumb'><?php 
                            /** Breadcrumb Template */
                            get_template_part( 'template-parts/header/partials/breadcrumb' ); 
                        ?></div>
                    <?php endif; ?>
                </div>
                
            </div>
        </div>    
    </div>
    <?php
}
