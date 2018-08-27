<?php 
// comments info template
// 
$user = get_the_author_meta('ID');
$user_name = get_the_author_meta('display_name');
?>
<div class='wpd_blog_list__post_author'><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr($user_name) ?>"><?php 
	echo get_avatar($user,64);
	echo '<span>'.esc_html($user_name).'</span>'; 
	?></a></div>
