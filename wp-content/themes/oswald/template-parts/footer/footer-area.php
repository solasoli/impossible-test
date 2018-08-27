<?php 
/* footer content template */
$footer_switch 		= oswald_option('footer_switch');
$footer_spacing 	= oswald_option('footer_spacing');
$footer_column 		= oswald_option_compare('footer_column','mb_footer_switch','yes');
$footer_column2 	= oswald_option_compare('footer_column2','mb_footer_switch','yes');
$footer_column3 	= oswald_option_compare('footer_column3','mb_footer_switch','yes');
$footer_column5 	= oswald_option_compare('footer_column5','mb_footer_switch','yes');
$footer_align 		= oswald_option_compare('footer_align','mb_footer_switch','yes');
$footer_full_width 	= oswald_option_compare('footer_full_width','mb_footer_switch','yes');
$footer_bg_color 	= oswald_option_compare('footer_bg_color','mb_footer_switch','yes');
$footer_bottom_margin = oswald_option_compare('footer_bottom_margin','mb_footer_switch','yes');

// copyright option
$copyright_switch = oswald_option('copyright_switch');     
$copyright_column = oswald_option('copyright_column');
$copyright_align_1 = oswald_option_compare('copyright_align','mb_copyright_switch','1','mb_footer_switch','yes');
$copyright_align_2 = oswald_option_compare('copyright_align_2','mb_copyright_switch','1','mb_footer_switch','yes');
$copyright_align_3 = oswald_option_compare('copyright_align_3','mb_copyright_switch','1','mb_footer_switch','yes');

$copyright_spacing = oswald_option('copyright_spacing');

$copyright_bg_color = oswald_option_compare('copyright_bg_color','mb_copyright_switch','1','mb_footer_switch','yes');
$copyright_top_border = oswald_option("copyright_top_border");
$copyright_top_border_color = oswald_option("copyright_top_border_color");

// Pre Footer option
$pre_footer_switch 	= oswald_option('pre_footer_switch');
$pre_footer_spacing = oswald_option('pre_footer_spacing');
$pre_footer_editor 	= oswald_option_compare('pre_footer_editor','mb_pre_footer_switch','1','mb_footer_switch','yes');
$pre_footer_align 	= oswald_option_compare('pre_footer_align','mb_pre_footer_switch','1','mb_footer_switch','yes');
$pre_footer_bottom_border = oswald_option("pre_footer_bottom_border");
$pre_footer_bottom_border_color = oswald_option("pre_footer_bottom_border_color");

// METABOX VAR
if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0) {
    $mb_footer_switch = rwmb_meta('mb_footer_switch');
    if ($mb_footer_switch == 'yes') {
        $footer_switch = true;
        $footer_spacing = array();
        $mb_padding_top = rwmb_meta('mb_padding_top');
        $mb_padding_bottom = rwmb_meta('mb_padding_bottom');
        $mb_padding_left = rwmb_meta('mb_padding_left');
        $mb_padding_right = rwmb_meta('mb_padding_right');
        $footer_spacing['padding-top'] = !empty($mb_padding_top) ? $mb_padding_top : '';
        $footer_spacing['padding-bottom'] = !empty($mb_padding_bottom) ? $mb_padding_bottom : '';
        $footer_spacing['padding-left'] = !empty($mb_padding_left) ? $mb_padding_left : '';
        $footer_spacing['padding-right'] = !empty($mb_padding_right) ? $mb_padding_right : '';
        $mb_footer_sidebar_1 = rwmb_meta('mb_footer_sidebar_1');
        $mb_footer_sidebar_2 = rwmb_meta('mb_footer_sidebar_2');
        $mb_footer_sidebar_3 = rwmb_meta('mb_footer_sidebar_3');
        $mb_footer_sidebar_4 = rwmb_meta('mb_footer_sidebar_4');
    }elseif (rwmb_meta('mb_footer_switch') == 'no') {
        $footer_switch = false;
    }

    if ($mb_footer_switch == 'yes') {
        $mb_copyright_switch = rwmb_meta('mb_copyright_switch');
        if ($mb_copyright_switch == '1') {
            $copyright_switch = true;

            $mb_copyright_sidebar_1 = rwmb_meta('mb_copyright_sidebar_1');
            $mb_copyright_sidebar_2 = rwmb_meta('mb_copyright_sidebar_2');
            $mb_copyright_sidebar_3 = rwmb_meta('mb_copyright_sidebar_3');


            $mb_copyright_padding_top = rwmb_meta('mb_copyright_padding_top');
            $mb_copyright_padding_bottom = rwmb_meta('mb_copyright_padding_bottom');
            $mb_copyright_padding_left = rwmb_meta('mb_copyright_padding_left');
            $mb_copyright_padding_right = rwmb_meta('mb_copyright_padding_right');
            $copyright_spacing['padding-top'] = !empty($mb_copyright_padding_top) ? $mb_copyright_padding_top : '';
            $copyright_spacing['padding-bottom'] = !empty($mb_copyright_padding_bottom) ? $mb_copyright_padding_bottom : '';
            $copyright_spacing['padding-left'] = !empty($mb_copyright_padding_left) ? $mb_copyright_padding_left : '';
            $copyright_spacing['padding-right'] = !empty($mb_copyright_padding_right) ? $mb_copyright_padding_right : '';

            $copyright_top_border = rwmb_meta("mb_copyright_top_border");
            $mb_copyright_top_border_color = rwmb_meta("mb_copyright_top_border_color");
            $mb_copyright_top_border_color_opacity = rwmb_meta("mb_copyright_top_border_color_opacity");

            if (!empty($mb_copyright_top_border_color) && $copyright_top_border == '1') {
                $copyright_top_border_color['rgba'] = 'rgba('.(oswald_HexToRGB($mb_copyright_top_border_color)).','.$mb_copyright_top_border_color_opacity.')';
            }else{
                $copyright_top_border_color = '';
            }

        }else{
            $copyright_switch = false;
            $mb_copyright_switch = false;
        }


    }elseif (rwmb_meta('mb_footer_switch') == 'no') {
        $copyright_switch = false;
        $mb_copyright_switch = false;
    }else{
        $mb_copyright_switch = false;
    }

}else{
    $mb_footer_switch = false;
    $mb_copyright_switch = false;
}

//footer container style
$footer_cont_style = !empty($footer_bg_color) ? ' background-color :'.esc_attr($footer_bg_color).';' : '';
$footer_cont_style .= !empty($footer_bottom_margin) && !empty($footer_bottom_margin['margin-top']) ? 'margin-top :'.(int)esc_attr($footer_bottom_margin['margin-top']).'px;' : '';
$footer_cont_style .= oswald_background_render('footer','mb_footer_switch','yes');

$footer_cont_style = !empty($footer_cont_style) ? ' style="'.$footer_cont_style.'"' : '' ;

//footer container class
$footer_class = '';
$footer_class .= ' align-'.esc_attr($footer_align);

//footer padding
$footer_top_padding = !empty($footer_spacing['padding-top']) ? $footer_spacing['padding-top'] : '';
$footer_bottom_padding = !empty($footer_spacing['padding-bottom']) ? $footer_spacing['padding-bottom'] : '';
$footer_left_padding = !empty($footer_spacing['padding-left']) ? $footer_spacing['padding-left'] : '';
$footer_right_padding = !empty($footer_spacing['padding-right']) ? $footer_spacing['padding-right'] : '';

//footer style
$footer_style = '';
$footer_style .= !empty($footer_top_padding) ? 'padding-top:'.esc_attr((int)$footer_top_padding).'px;' : '' ;
$footer_style .= !empty($footer_bottom_padding) ? 'padding-bottom:'.esc_attr((int)$footer_bottom_padding).'px;' : '' ;
$footer_style .= !empty($footer_left_padding) ? 'padding-left:'.esc_attr((int)$footer_left_padding).'px;' : '' ;
$footer_style .= !empty($footer_right_padding) ? 'padding-right:'.esc_attr((int)$footer_right_padding).'px;' : '' ;
$footer_style = !empty($footer_style) ? ' style="'.$footer_style.'"' : '';

/*
*
* copyright code
*/
// copyright class
$copyright_class = '';

// copyright container style
$copyright_cont_style = '';
$copyright_cont_style .= !empty($copyright_bg_color) ? 'background-color:'.esc_attr($copyright_bg_color).';' : '';

if ($copyright_top_border == '1') {            
    $copyright_cont_style .= !empty($copyright_top_border_color['rgba']) ? 'border-top: 1px solid '.esc_attr($copyright_top_border_color['rgba']).';' : '';  
    if ($footer_full_width) {
        $copyright_cont_style .= !empty($copyright_top_border_color['rgba']) ? 'border-top: 1px solid '.esc_attr($copyright_top_border_color['rgba']).';' : '';  
    }
}else{
    $copyright_cont_border_style = '';
}
$copyright_cont_style = !empty($copyright_cont_style) ? ' style="'.$copyright_cont_style.'"' : '';

// copyright padding
$copyright_top_padding = !empty($copyright_spacing['padding-top']) ? $copyright_spacing['padding-top'] : '';
$copyright_bottom_padding = !empty($copyright_spacing['padding-bottom']) ? $copyright_spacing['padding-bottom'] : '';
$copyright_left_padding = !empty($copyright_spacing['padding-left']) ? $copyright_spacing['padding-left'] : '';
$copyright_right_padding = !empty($copyright_spacing['padding-right']) ? $copyright_spacing['padding-right'] : '';
// copyright style
$copyright_style = '';
$copyright_style .= !empty($copyright_top_padding) ? 'padding-top:'.esc_attr((int)$copyright_top_padding).'px;' : '' ;
$copyright_style .= !empty($copyright_bottom_padding) ? 'padding-bottom:'.esc_attr((int)$copyright_bottom_padding).'px;' : '' ;
$copyright_style .= !empty($copyright_left_padding) ? 'padding-left:'.esc_attr((int)$copyright_left_padding).'px;' : '' ;
$copyright_style .= !empty($copyright_right_padding) ? 'padding-right:'.esc_attr((int)$copyright_right_padding).'px;' : '' ;
$copyright_style = !empty($copyright_style) ? ' style="'.$copyright_style.'"' : ''; 


/*
*
* column build
*/
$column_sizes = array();
switch ((int)$footer_column) {
    case 1:
        $column_sizes = array('12');
        break;
    case 2:
        $column_sizes = explode("-", $footer_column2);
        break;
    case 3:
        $column_sizes = explode("-", $footer_column3);
        break;
    case 4:
        $column_sizes = array('3','3','3','3');
        break;
    case 5:
        $column_sizes = explode("-", $footer_column5);
        break;
    default:
        $column_sizes = array('3','3','3','3');
        break;
}

/*
*
* footer out
*/
if ($footer_switch || $copyright_switch || $pre_footer_switch) {
	?><footer class='main_footer fadeOnLoad clearfix'<?php echo ''.$footer_cont_style; ?> id='footer'><?php

        if ($pre_footer_switch && !empty($pre_footer_editor)) {
        	?><div class='pre_footer'<?php 
        	echo ($footer_full_width ? $pre_footer_cont_style : ''); 
        	?>><?php
                echo ($footer_full_width ? "" : "<div class='container'".$pre_footer_cont_style.">");
                ?>
                   <div class='row'<?php echo ''.$pre_footer_style; ?>>;
                       <div class='span12'>
                       <?php echo do_shortcode( $pre_footer_editor ); ?>
                       </div>
                   </div>;
                <?php
                echo ($footer_full_width ? "" : "</div>");
            ?></div><?php //end pre_footer
        }

        if ($footer_switch) {
            $is_any_footer_widget = false;
            for ($i=0; $i < (int)$footer_column; $i++) {
                if ($mb_footer_switch == 'yes') {
                    if (is_active_sidebar( ${'mb_footer_sidebar_'.($i+1)} )) {
                        $is_any_footer_widget = is_dynamic_sidebar( ${'mb_footer_sidebar_'.($i+1)} );
                    }
                }else{
                    if (is_active_sidebar( 'footer_column_' . ($i+1) )) {
                        $is_any_footer_widget = is_dynamic_sidebar( 'footer_column_' . ($i+1) );
                    }
                }
            }
            if ($is_any_footer_widget) {
            	?><div class='top_footer column_<?php echo (int)$footer_column.$footer_class?>'><?php
                    echo (bool)$footer_full_width ? "" : "<div class='container'>";
                    ?><div class='row'<?php echo ''.$footer_style; ?>><?php
                        for ($i=0; $i < (int)$footer_column; $i++) { 
                            ?><div class='span<?php echo esc_attr($column_sizes[$i]); ?>'><?php
                                if ($mb_footer_switch == 'yes') {
                                    if (is_active_sidebar( ${'mb_footer_sidebar_'.($i+1)} )) {
                                        dynamic_sidebar( ${'mb_footer_sidebar_'.($i+1)} );
                                    }
                                }else{
                                    if (is_active_sidebar( 'footer_column_' . ($i+1) )) {
                                        dynamic_sidebar( 'footer_column_' . ($i+1) );
                                    }
                                }
                                
                            ?></div><?php //end span
                        }
                    ?></div><?php //end row
                    echo ($footer_full_width ? "" : "</div>");
                ?></div><?php //end top_footer
            }
        }

        if ($copyright_switch) {
            $is_any_copyright_widget = false;
            for ($i=0; $i < (int)$copyright_column; $i++) {
                if ($mb_copyright_switch == 'yes') {
                    if (is_active_sidebar( ${'mb_copyright_sidebar_'.($i+1)} )) {
                        $is_any_copyright_widget = is_dynamic_sidebar( ${'mb_copyright_sidebar_'.($i+1)} );
                    }
                }else{
                    if (is_active_sidebar( 'copyright_column_' . ($i+1) )) {
                        $is_any_copyright_widget = is_dynamic_sidebar( 'copyright_column_' . ($i+1) );
                    }
                }
            }
            if ($is_any_copyright_widget) {
                ?><div class='copyright<?php echo esc_attr($copyright_class);?>'<?php echo  $copyright_cont_style?>><?php
                    echo (bool)$footer_full_width ? "" : "<div class='container'>";
                        ?><div class='row'<?php echo ''.$copyright_style; ?>><?php
                           for ($i=0; $i < (int)$copyright_column; $i++) { 
                                ?><div class='span<?php echo (12/(int)$copyright_column).(' align-'.esc_attr(${'copyright_align_'.($i+1)}));?>'><?php
                                    if ($mb_copyright_switch == 'yes') {
                                        if (is_active_sidebar( ${'mb_copyright_sidebar_'.($i+1)} )) {
                                            dynamic_sidebar( ${'mb_copyright_sidebar_'.($i+1)} );
                                        }
                                    }else{
                                        if (is_active_sidebar( 'copyright_column_' . ($i+1) )) {
                                            dynamic_sidebar( 'copyright_column_' . ($i+1) );
                                        }
                                    }
                                    
                                ?></div><?php //end span
                            }
                       ?></div><?php //end row
                    echo ($footer_full_width ? "" : "</div>");
                ?></div><?php
            }
        }
        
    ?></footer><?php //end footer
}
?>