<?php 
// media post template
$parameters = !empty($parameters) ? $parameters : '';

$show_categories = (!empty($show_categories) || ( isset($show_categories) && $show_categories == '0')) ? $show_categories : '1';
if (is_array($parameters)) {
    $parameters['show_categories'] = $show_categories;
}else{
    $parameters = array();
    $parameters['show_categories'] = $show_categories;
}

?>
<div class="wpd_blog_list__media">
	<a href="<?php the_permalink();?>">
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
	</a>
	<?php
	$current_categories = get_the_category($post->ID);
	if (!empty($parameters['show_categories']) && $parameters['show_categories'] && (!empty($current_categories) && is_array($current_categories) && (count($current_categories) < 3) )) {
		get_template_part( 'template-parts/post/partials/post-categories');
	};?>
</div>
