<?php 
// media post template
$pf_post_content = rwmb_meta('post_format_video_oEmbed', 'type=oembed');
$pf_post_meta = get_post_meta(get_the_ID(), 'post_format_video_oEmbed');
$video_autoplay_string = $video_class = '';
if (is_array($pf_post_meta) && !empty($pf_post_meta[0])) {
	$video_src = $pf_post_meta[0];
	if (strpos($pf_post_meta[0], 'vimeo') !== false) {
		$video_class = ' vimeo_video';
		$video_autoplay_string = '?autoplay=1';
	}elseif(strpos($pf_post_meta[0], 'youtube') !== false){
		$video_class = ' youtube_video';
		$video_autoplay_string = '&autoplay=1';
	}
}
$parameters = !empty($parameters) ? $parameters : '';
$video_class .= !has_post_thumbnail() ? ' has_post_thumb' : '';

$show_categories = (!empty($show_categories) || ( isset($show_categories) && $show_categories == '0')) ? $show_categories : '1';
if (is_array($parameters)) {
    $parameters['show_categories'] = $show_categories;
}else{
    $parameters = array();
    $parameters['show_categories'] = $show_categories;
}
?>
<div class="wpd_blog_list__media<?php echo esc_attr($video_class); ?>">
	<div class='wpd_video__wrapper'>	
		<?php
		 if (has_post_thumbnail()) {?>
			<div class="wpd_video_wrapper__thumb">
				<?php 
					$p_id = get_the_ID();
				    $image_array = image_downsize(get_post_thumbnail_id($p_id), 'full');
				    if (!empty($image_array) && is_array($image_array)) {
				        $wp_get_attachment_url = !empty($image_array[0]) ? $image_array[0] : wp_get_attachment_url(get_post_thumbnail_id($p_id), 'full');
				        if (!empty($image_array[1]) && !empty($image_array[2])) {
				            $ratio = $image_array[2] / $image_array[1];
				        }
				    }else{
				        $wp_get_attachment_url = wp_get_attachment_url(get_post_thumbnail_id($p_id), 'full');
				        $ratio = null;
				    }
				    oswald_get_template_part( 
						'template-parts/post/partials/image_out', 
						'',
						array(
							'wp_get_attachment_url' => $wp_get_attachment_url,
							'natural_ratio' => $ratio,
			                'parameters' => $parameters
			            )
					);
		 		?>
				<div class="wpd_video__play_button" data-video-autoplay="<?php echo ''.$video_autoplay_string; ?>"><i class="wpd_video__play_icon fa fa-play"></i></div>
			</div>
		<?php }
		if (!empty($pf_post_content) && strlen ($pf_post_content) > 30) {
			?><div class="wpd_video_wrapper__iframe"><?php echo ''.$pf_post_content; ?></div><?php
		}
		?>
	</div>
	<?php
	$current_categories = get_the_category($post->ID);
	if (has_post_thumbnail() || (!empty($pf_post_content) && strlen ($pf_post_content) > 30)) {
		if (!empty($parameters['show_categories']) && $parameters['show_categories'] && (!empty($current_categories) && is_array($current_categories) && (count($current_categories) < 3) )) {
			get_template_part( 'template-parts/post/partials/post-categories');
		};
	}
	?>
</div><?php
if (!has_post_thumbnail() || (!empty($pf_post_content) && strlen ($pf_post_content) < 30)) {
	if (!empty($parameters['show_categories']) && $parameters['show_categories'] && (!empty($current_categories) && is_array($current_categories) && (count($current_categories) < 3) )) {
		get_template_part( 'template-parts/post/partials/post-categories');
	};
}