<?php 
// media post template

$quote_author = rwmb_meta('post_format_qoute_author');
$quote_author_image = rwmb_meta('post_format_qoute_author_image');
$quote_text = rwmb_meta('post_format_qoute_text');
$parameters = !empty($parameters) ? $parameters : '';
if (!empty($quote_author_image)) {
    $quote_author_image = array_values($quote_author_image);
    $quote_author_image = $quote_author_image[0];
    $quote_author_image_ID = $quote_author_image['ID'];
}else{
    $quote_author_image = '';
}

$show_categories = (!empty($show_categories) || ( isset($show_categories) && $show_categories == '0')) ? $show_categories : '1';
if (is_array($parameters)) {
    $parameters['show_categories'] = $show_categories;
}else{
    $parameters = array();
    $parameters['show_categories'] = $show_categories;
}

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

?>
<div class="wpd_blog_list__media post_format_qoute">
	<div class="wpd_blog_list__media_qoute">		
		<?php if (has_post_thumbnail()) {?>
			<div class="wpd_qoute_wrapper__thumb" style="background-image: url(<?php echo esc_url($thumb); ?>)">
			</div>
		<?php }?>
		<?php
		$current_categories = get_the_category($post->ID);
		if (!empty($parameters['show_categories']) && $parameters['show_categories'] && (!empty($current_categories) && is_array($current_categories) && (count($current_categories) < 3) )) {
			get_template_part( 'template-parts/post/partials/post-categories');
		};?>
		<div class='wpd_qoute__wrapper'>
			<div class="wpd_qoute__text"><?php echo esc_html($quote_text); ?></div>
			<?php if (!empty($quote_author_image) || !empty($quote_author)) {
				?><div class="wpd_qoute__author_wrapper">
					<?php if (!empty($quote_author_image)) {
						echo wp_get_attachment_image( $quote_author_image_ID, array('34','34') );
					}
					if (!empty($quote_author)) {
						?><div class="wpd_qoute__author_name"><?php echo esc_html($quote_author); ?></div><?php
					}
					?>
				</div><?php
			} ?>
		</div>
	</div>
</div>
