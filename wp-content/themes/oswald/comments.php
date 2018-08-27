<?php
/**
 * The template for displaying comments
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				$comments_text = ' ' . esc_html__('Comment', 'oswald') . '';

			} else {
				$comments_text = ' ' . esc_html__('Comments', 'oswald') . '';
			}
			printf( $comments_number . $comments_text );
			?>
		</h3>

		<ol class="comment-list">
			<?php
				if (oswald_option("post_pingbacks") == "1") {
					wp_list_comments('type=all&callback=oswald_theme_comment');
				} else {
					wp_list_comments('type=comment&callback=oswald_theme_comment');
				}
			?>
		</ol>

		<?php the_comments_pagination( array(
			'prev_text' => '<span>' . esc_html__( 'Prev', 'oswald' ) . '</span>',
			'next_text' => '<span>' . esc_html__( 'Next', 'oswald' ) . '</span>',
		));

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?> 
		</br>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'oswald' ); ?></p>
	<?php
	endif;
	$comment_form = array(
		'fields' => apply_filters('comment_form_default_fields', array(
			'author' => '<div class="span4"><label class="label-name">' . esc_html__('Your Name *', 'oswald') . '</label><input type="text" id="author" name="author" class="form_field"></div>',
			'email' => '<div class="span4"><label class="label-email">' . esc_html__('Your E-Mail *', 'oswald') . '</label><input type="text" id="email" name="email" class="form_field"></div>',
			'url' => '<div class="span4"><label class="label-email">' . esc_html__('Website', 'oswald') . '</label><input type="text" id="url" name="url" class="form_field"></div>'
		)),
		'comment_field' => '<div class="span12"><label class="label-message">' . esc_html__('Your Comment', 'oswald') . '</label><textarea name="comment" cols="45" rows="5" id="comment-message" class="form_field"></textarea></div>',
		'comment_form_before' => '',
		'comment_form_after' => '',
		'must_log_in' => esc_html__('You must be logged in to post a comment.', 'oswald'),
		'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
		'title_reply_after' => '</h3>',
		'title_reply' => esc_html__('Leave a Comment', 'oswald'),
		'label_submit' => esc_html__('Post comment', 'oswald'),
		'logged_in_as' => '<p class="logged-in-as">' . esc_html__('Logged in as', 'oswald') . ' <a href="' . esc_url(admin_url('profile.php')) . '">' . $user_identity . '</a>. <a href="' . esc_url(wp_logout_url(apply_filters('the_permalink', esc_url(get_permalink())))) . '">' . esc_html__('Log out?', 'oswald') . '</a></p>',
	);

	add_filter('comment_form_fields', 'oswald_reorder_comment_fields');

	if (!function_exists('oswald_reorder_comment_fields')) {
		function oswald_reorder_comment_fields($fields ) {
			$new_fields = array();

			$myorder = array('author', 'email', 'url', 'comment');

			foreach( $myorder as $key ){
				$new_fields[ $key ] = $fields[ $key ];
				unset( $fields[ $key ] );
			}

			if( $fields ) {
				foreach( $fields as $key => $val ) {
					$new_fields[ $key ] = $val;
				}
			}

			return $new_fields;
		}
	}


	comment_form($comment_form, $post->ID);
	?>

</div><!-- #comments -->
