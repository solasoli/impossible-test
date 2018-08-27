<?php 
// Blog function

add_action('wp_ajax_wpdaddy_get_blog_item_from_ajax', 'wpdaddy_get_blog_item_from_ajax');
add_action('wp_ajax_nopriv_wpdaddy_get_blog_item_from_ajax', 'wpdaddy_get_blog_item_from_ajax');
function oswald_get_blog_item_from_ajax() {

	$data_ajax_atts = $_POST['data_ajax_atts'];
	$data_page_item = $_POST['data_page_item'];


	$data_ajax_atts['show_likes'] = !empty($data_ajax_atts['show_likes']) && $data_ajax_atts['show_likes'] == 'true' ? (bool)$data_ajax_atts['show_likes'] : false;
	$data_ajax_atts['show_categories'] = !empty($data_ajax_atts['show_categories']) && $data_ajax_atts['show_categories'] == 'true' ? (bool)$data_ajax_atts['show_categories'] : false;
	$data_ajax_atts['show_author'] = !empty($data_ajax_atts['show_author']) && $data_ajax_atts['show_author'] == 'true' ? (bool)$data_ajax_atts['show_author'] : false;
	$data_ajax_atts['show_comments'] = !empty($data_ajax_atts['show_comments']) && $data_ajax_atts['show_comments'] == 'true' ? (bool)$data_ajax_atts['show_comments'] : false;
	$data_ajax_atts['show_share'] = !empty($data_ajax_atts['show_share']) && $data_ajax_atts['show_share'] == 'true' ? (bool)$data_ajax_atts['show_share'] : false;
	$data_ajax_atts['show_date'] = !empty($data_ajax_atts['show_date']) && $data_ajax_atts['show_date'] == 'true' ? (bool)$data_ajax_atts['show_date'] : false;
	$data_ajax_atts['blog_post_listing_content'] = !empty($data_ajax_atts['blog_post_listing_content']) && $data_ajax_atts['blog_post_listing_content'] == 'true' ? (bool)$data_ajax_atts['blog_post_listing_content'] : '';

	if (!empty($data_ajax_atts['parameters'])) {
		$parameters = $data_ajax_atts['parameters'];
		$parameters['posts_per_line'];
	}

	$build_query = $data_ajax_atts['build_query'];
	list($query_args) = vc_build_loop_query($build_query);
	$query_args['paged'] = $data_page_item;


    $query_results = new WP_Query($query_args);
    $out = '';
    if($query_results->have_posts()):
        while ( $query_results->have_posts() ) : $query_results->the_post(); 
            //$out .= wpdaddy_get_practice_item($parameters, $item_class,$count_id);
			ob_start();
            oswald_get_template_part( 'template-parts/post/content', '', $data_ajax_atts);
            $out .= ob_get_clean();
        endwhile;
    else:
        wp_reset_postdata();
        echo json_encode( array(
            'html' => '',
            'max_num_pages' => $query_results->max_num_pages,
        ));
        wp_die();
    endif; 
    wp_reset_postdata();
    echo json_encode( array(
        'html' => $out,
        'max_num_pages' => $query_results->max_num_pages,
    ));
    wp_die();
}