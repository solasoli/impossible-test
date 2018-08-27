<?php 
// post categories template
// 
if(isset($post) && !empty($post) && is_object($post)) {
	$current_categories = get_the_category($post->ID);
	?>
	<div class="wpd_blog_list__categories">
		<?php
			if (!empty($current_categories) && is_array($current_categories)) {
				foreach ($current_categories as $category) {
					?>
					<span class="category"><a href="<?php echo get_category_link($category->term_id); ?>"><span class="cat-name"><?php echo esc_html($category->cat_name); ?></span></a></span>
					<?php
				}
			}
		?>
	</div>
	<?php
}
