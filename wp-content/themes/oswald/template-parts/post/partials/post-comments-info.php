<?php 
// comments info template
// 
$comments_num = '' . get_comments_number(get_the_ID()) . '';
if ($comments_num == 1) {
	$comments_text = '' . esc_html__('comment', 'oswald') . '';
} else {
	$comments_text = '' . esc_html__('comments', 'oswald') . '';
}

?>
<div class="wpd_blog_list__comments_link">
	<a href="<?php echo esc_url(get_comments_link()); ?>" title="<?php echo (int)get_comments_number(get_the_ID()) . ' ' . $comments_text;; ?>">
		<span class="wpd_post_comments__icon fa fa-commenting"></span>
		<span class="wpd_post_comments__value"><?php echo esc_html(get_comments_number(get_the_ID())); ?></span>
	</a>
</div>
