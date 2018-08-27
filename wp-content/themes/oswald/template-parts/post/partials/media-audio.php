<?php 
// media post template
$pf_post_content = rwmb_meta('post_format_audio_oEmbed', 'type=oembed');

?>
<div class="wpd_blog_list__media">
	<?php
	if (!empty($pf_post_content) && strlen ($pf_post_content) > 30) {
		?><div class="wpd_audio_wrapper__iframe"><?php
		echo ''.$pf_post_content;
		?></div><?php
	}
	$current_categories = get_the_category($post->ID);
	?>
</div>

<?php 