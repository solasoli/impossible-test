<?php 
// post header template
if ( ! defined( 'ABSPATH' ) ) { exit; }
$pf = get_post_format();
if (empty($pf)) $pf = "standard";
$show_likes = oswald_option('blog_post_likes');
$show_author = oswald_option('blog_post_author');
$show_comments = oswald_option('post_comments') == '1' ? oswald_option('blog_post_comment') : '';
$show_date = oswald_option('blog_post_date');
?>

<?php
$show_cat_outside = false;
switch ($pf) {
	case 'standard':
		if (has_post_thumbnail()) {
			get_template_part( 'template-parts/post/partials/media',$pf);
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
            get_template_part( 'template-parts/post/partials/media',$pf);
		}elseif (has_post_thumbnail()) {
			get_template_part( 'template-parts/post/partials/media','standard');
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
            get_template_part( 'template-parts/post/partials/media',$pf);
		}elseif (has_post_thumbnail()) {
			get_template_part( 'template-parts/post/partials/media','standard');
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
            get_template_part( 'template-parts/post/partials/media',$pf);
		}elseif (has_post_thumbnail()) {
			get_template_part( 'template-parts/post/partials/media','standard');
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
            get_template_part( 'template-parts/post/partials/media',$pf);
		}elseif (has_post_thumbnail()) {
			get_template_part( 'template-parts/post/partials/media','standard');
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
            get_template_part( 'template-parts/post/partials/media',$pf);
            $show_cat_outside = true;
		}elseif (has_post_thumbnail()) {
			get_template_part( 'template-parts/post/partials/media','standard');
		}else{
			$show_cat_outside = true;
		}		
		break;
	default:
		if (has_post_thumbnail()) {
			get_template_part( 'template-parts/post/partials/media','standard');
		}else{
			$show_cat_outside = true;
		}		
		break;
}
$current_categories = get_the_category($post->ID);
if ($show_cat_outside || (!empty($current_categories) && is_array($current_categories) && (count($current_categories) >= 3) )) {
	get_template_part( 'template-parts/post/partials/post-categories');	
}?>
<div class="wpd_blog_list__meta"><?php
    if ($show_author == "1") {
        get_template_part( 'template-parts/post/partials/post-author-info');
    }else{
        ?><div class="wpd_blog_list__empty_right_space"></div><?php
    }
    if ($show_likes == "1") {
        if (function_exists('oswald_post_likes')) {
            oswald_post_likes();
        }
    }
    if ($show_comments == "1") {
        get_template_part( 'template-parts/post/partials/post-comments-info');
    }
    if ($show_date == "1") {
        get_template_part( 'template-parts/post/partials/post-date-info');
    }
?></div>
<h2 class="wpd_blog_list__title"><?php echo esc_html(get_the_title()); ?></h2>