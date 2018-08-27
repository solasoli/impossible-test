<?php 
// date info template
//

$compile = '';

$unixTime = get_the_time('U');
$compile = '';
if ((current_time('timestamp') - $unixTime) < DAY_IN_SECONDS) {
	$compile .= human_time_diff($unixTime, current_time('timestamp')) . ' ' . esc_html__("ago", 'oswald');
}else{
	$date_format = get_option( 'date_format' );
	$compile .= get_the_time($date_format);			
}
?>	
<div class="wpd_blog_list__date">
	<span class="wpd_post_date__icon fa fa-clock-o"></span>
	<span class="wpd_post_date__value"><?php echo esc_html($compile); ?></span>
</div>
