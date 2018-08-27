<?php
$user_id = get_current_user_id();
$current_user = get_user_by( 'id', $user_id );
$logout_link = esc_url(get_permalink());
$logout_link = $logout_link == 0 ? esc_url(home_url()) : $logout_link;
if (empty($avatar_size)) {
	$avatar_size = 70;
}
if (empty($show_email )) {
	$show_email = false;
}
?><i class='wpd_login_icon wpd_login_icon--avatar'><?php
    echo get_avatar($user_id,$avatar_size);
?></i><span class='wpd_login__user_name'><?php echo esc_html( $current_user->display_name ); ?></span><?php
if ($show_email) { ?><span class='wpd_login__user_email'><?php echo esc_html( $current_user->user_email ); ?></span><?php } ?>
<a href='<?php echo esc_url(wp_logout_url( $logout_link )) ?>' class="wpd_login__logout"><i class="fa fa-sign-out"></i><span class="wpd_login__logout_tooltip"><?php echo esc_html__('Logout' ,'oswald'); ?></span></a>
