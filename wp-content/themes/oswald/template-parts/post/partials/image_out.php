<?php 
// image out template
$wp_get_attachment_url = !empty($wp_get_attachment_url) ? $wp_get_attachment_url : get_the_post_thumbnail_url('','wpd_post_full');
if (strlen($wp_get_attachment_url)) {
    if (!empty($parameters['image_proportional']) && $parameters['image_proportional'] != 'native') {
        switch ($parameters['image_proportional']) {
            case 'square':
                $ration = 1;
                break;
            case 'horizontal':
                $ration = 0.8;
                break;
            case 'vertical':
                $ration = 1.25;
                break;       
            case '4_3':
                $ration = 3/4;
                break;              
            default:
                $ration = null;
                break;
        }
    }else{
        $ration = null;
    }

    if (empty($parameters['posts_per_line'])) {
        $parameters['posts_per_line'] = '1';
    }
    switch ($parameters['posts_per_line']) {
        case "1":
            if (function_exists('oswald_get_image_srcset')) {
                $responsive_dimensions = array(
                        array('1200','1200'),
                        array('992','992'),
                        array('768','768')
                    );                       
                $wpdaddy_featured_image_url = oswald_get_image_srcset($wp_get_attachment_url,$ration,$responsive_dimensions);
            }else{
                $image_id = attachment_url_to_postid($wp_get_attachment_url);
                $wp_get_attachment_url = wp_get_attachment_image_url($image_id, 'oswald_full');
                $wpdaddy_featured_image_url = 'src="'.esc_url($wp_get_attachment_url).'"'; 
            }
            
            break;
        case "2":
            if (function_exists('oswald_get_image_srcset')) {
                $responsive_dimensions = array(
                    array('1200','585'),
                    array('992','475'),
                    array('768','768')
                );                       
                $wpdaddy_featured_image_url = oswald_get_image_srcset($wp_get_attachment_url,$ration,$responsive_dimensions);
            }else{
                $image_id = attachment_url_to_postid($wp_get_attachment_url);
                $wp_get_attachment_url = wp_get_attachment_image_url($image_id, 'oswald_one_half');
                $wpdaddy_featured_image_url = 'src="'.esc_url($wp_get_attachment_url).'"'; 
            }
            break;
        case "3":
            if (function_exists('oswald_get_image_srcset')) {
                $responsive_dimensions = array(
                    array('1200','390'),
                    array('992','317'),
                    array('768','768')
                ); 
                $wpdaddy_featured_image_url = oswald_get_image_srcset($wp_get_attachment_url,$ration,$responsive_dimensions);
            }else{
                $image_id = attachment_url_to_postid($wp_get_attachment_url);
                $wp_get_attachment_url = wp_get_attachment_image_url($image_id, 'oswald_one_third');
                $wpdaddy_featured_image_url = 'src="'.esc_url($wp_get_attachment_url).'"'; 
            }
            break;
        case "4":
            if (function_exists('oswald_get_image_srcset')) {
                $responsive_dimensions = array(
                    array('1200','293'),
                    array('992','238'),
                    array('768','768')
                );                 
                $wpdaddy_featured_image_url = oswald_get_image_srcset($wp_get_attachment_url,$ration,$responsive_dimensions);
            }else{
                $image_id = attachment_url_to_postid($wp_get_attachment_url);
                $wp_get_attachment_url = wp_get_attachment_image_url($image_id, 'oswald_one_fourth');
                $wpdaddy_featured_image_url = 'src="'.esc_url($wp_get_attachment_url).'"'; 
            }
            break;
        default:
            $image_id = attachment_url_to_postid($wp_get_attachment_url);
            $wp_get_attachment_url = wp_get_attachment_image_url($image_id, 'oswald_full');
            $wpdaddy_featured_image_url = 'src="'.esc_url($wp_get_attachment_url).'"'; 
    }


    if ($ration == null && !empty($natural_ratio)) {
        $ration = $natural_ratio;
    }

    //$mainColor = getSolidColorFromImage($wp_get_attachment_url);
    
    $featured_image = '';
    $featured_image .= '<img ' . $wpdaddy_featured_image_url . ' alt="" />';
} else {
    $featured_image = '';
}
echo ''.$featured_image;