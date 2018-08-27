<?php 
// post header template
if ( ! defined( 'ABSPATH' ) ) { exit; }
$pf = get_post_format();
if (empty($pf)) $pf = "standard";
$parameters = !empty($parameters) ? $parameters : '';

$show_cat_outside = false;
if (!empty($parameters['blog_type']) && $parameters['blog_type'] == 'type2' ) {
	$show_cat_outside = true;
}else{
	switch ($pf) {
		case 'standard':
			if (has_post_thumbnail()) {
				oswald_get_template_part( 
					'template-parts/post/partials/media', 
					$pf,
					array(
	                    'parameters' => $parameters
	                )
				);
			}else{
				$show_cat_outside = true;
			}		
			break;
		case 'gallery':
			if (class_exists( 'RWMB_Loader' )) {
				$pf_post_content = rwmb_meta('post_format_gallery_images');
			}else{
				$pf_post_content = '';	
			}
			if (count($pf_post_content) > 0) {
	            oswald_get_template_part( 
					'template-parts/post/partials/media', 
					$pf,
					array(
	                    'parameters' => $parameters
	                )
				);
			}elseif (has_post_thumbnail()) {
				oswald_get_template_part( 
					'template-parts/post/partials/media', 
					'standard',
					array(
	                    'parameters' => $parameters
	                )
				);
			}else{
				$show_cat_outside = true;
			}		
			break;
		case 'video':
			if (class_exists( 'RWMB_Loader' )) {
				$pf_post_content = rwmb_meta('post_format_video_oEmbed', 'type=oembed');
			}else{
				$pf_post_content = '';	
			}		
			if (!empty($pf_post_content)) {
	            oswald_get_template_part( 
					'template-parts/post/partials/media', 
					$pf,
					array(
	                    'parameters' => $parameters
	                )
				);
			}elseif (has_post_thumbnail()) {
				oswald_get_template_part( 
					'template-parts/post/partials/media', 
					'standard',
					array(
	                    'parameters' => $parameters
	                )
				);
			}else{
				$show_cat_outside = true;
			}		
			break;
		case 'quote':
			if (class_exists( 'RWMB_Loader' )) {
				$pf_post_content = rwmb_meta('post_format_qoute_text');;
			}else{
				$pf_post_content = '';	
			}		
			if (!empty($pf_post_content)) {
	            oswald_get_template_part( 
					'template-parts/post/partials/media', 
					$pf,
					array(
	                    'parameters' => $parameters
	                )
				);
			}elseif (has_post_thumbnail()) {
				oswald_get_template_part( 
					'template-parts/post/partials/media', 
					'standard',
					array(
	                    'parameters' => $parameters
	                )
				);
			}else{
				$show_cat_outside = true;
			}		
			break;
		case 'link':
			if (class_exists( 'RWMB_Loader' )) {
				$pf_post_content = rwmb_meta('post_format_link');;
			}else{
				$pf_post_content = '';	
			}		
			if (!empty($pf_post_content)) {
	            oswald_get_template_part( 
					'template-parts/post/partials/media', 
					$pf,
					array(
	                    'parameters' => $parameters
	                )
				);
			}elseif (has_post_thumbnail()) {
				oswald_get_template_part( 
					'template-parts/post/partials/media', 
					'standard',
					array(
	                    'parameters' => $parameters
	                )
				);
			}else{
				$show_cat_outside = true;
			}		
			break;
		case 'audio':
			if (class_exists( 'RWMB_Loader' )) {
				$pf_post_content = rwmb_meta('post_format_audio_oEmbed', 'type=oembed');
			}else{
				$pf_post_content = '';	
			}		
			if (!empty($pf_post_content)) {
	            oswald_get_template_part( 
					'template-parts/post/partials/media', 
					$pf,
					array(
	                    'parameters' => $parameters
	                )
				);
	            $show_cat_outside = true;
			}elseif (has_post_thumbnail()) {
				oswald_get_template_part( 
					'template-parts/post/partials/media', 
					'standard',
					array(
	                    'parameters' => $parameters
	                )
				);
			}else{
				$show_cat_outside = true;
			}		
			break;
		default:
			if (has_post_thumbnail()) {
				oswald_get_template_part( 
					'template-parts/post/partials/media', 
					'standard',
					array(
	                    'parameters' => $parameters
	                )
				);
			}else{
				$show_cat_outside = true;
			}		
			break;
	}
}

$current_categories = get_the_category($post->ID);

if ((isset($parameters['show_categories']) && $parameters['show_categories'] && ($show_cat_outside || (!empty($current_categories) && is_array($current_categories) && (count($current_categories) >= 3) )))) {
	get_template_part( 'template-parts/post/partials/post-categories');	
} 
;?>
<h2 class="wpd_blog_list__title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php 
echo is_sticky() ? '<i class="fa fa-thumb-tack wpd_blog_list__title--sticky" aria-hidden="true"></i> ' : '';
echo esc_html(get_the_title()); 
?></a></h2>