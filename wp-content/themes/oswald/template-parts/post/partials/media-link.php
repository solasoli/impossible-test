<?php 
// media post template
$link = rwmb_meta('post_format_link');
$link_text = rwmb_meta('post_format_link_text');
$parameters = !empty($parameters) ? $parameters : '';
if (!empty($parameters['posts_per_line'])) {
	switch ($parameters['posts_per_line']) {
		case '1':
			$image_size = 'oswald_full';
			break;
		case '2':
			$image_size = 'oswald_one_half';
			break;
		case '3':
			$image_size = 'oswald_one_third';
			break;
		case '4':
			$image_size = 'oswald_one_fourth';
			break;		
		default:
			$image_size = 'oswald_full';
			break;
	}
	$thumb = get_the_post_thumbnail_url(get_the_ID(),$image_size);
}else{
	$thumb = get_the_post_thumbnail_url(get_the_ID(),'wpd_post_full');
}

$show_categories = (!empty($show_categories) || ( isset($show_categories) && $show_categories == '0')) ? $show_categories : '1';
if (is_array($parameters)) {
    $parameters['show_categories'] = $show_categories;
}else{
    $parameters = array();
    $parameters['show_categories'] = $show_categories;
}

?>
<div class="wpd_blog_list__media post_format_link">
	<div class="wpd_blog_list__media_link">		
		<?php if (has_post_thumbnail()) {?>
			<div class="wpd_link_wrapper__thumb" style="background-image: url(<?php echo esc_url($thumb); ?>)">
			</div>
		<?php }?>
		<?php
		$current_categories = get_the_category($post->ID);
		if (!empty($parameters['show_categories']) && $parameters['show_categories'] && (!empty($current_categories) && is_array($current_categories) && (count($current_categories) < 3) )) {
			get_template_part( 'template-parts/post/partials/post-categories');
		};?>
		<div class='wpd_link__wrapper'>
			<div class="wpd_link__text"><a href="<?php echo esc_url($link) ?>"><?php echo !empty($link_text) ? esc_html($link_text) : esc_html($link); ?></a></div>
		</div>
	</div>
</div>
