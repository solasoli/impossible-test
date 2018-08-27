<?php 
if (empty($avatar_size)) {
    $avatar_size = 80;
}
if (empty($show_email)) {
    $show_email = false;
}
$user_id = get_current_user_id();
$current_user = get_user_by( 'id', $user_id );
?><i class='gtc_login_icon gtc_login_icon--avatar'><?php
    echo get_avatar($user_id,$avatar_size);
?></i>
<span class='gtc_login__user_name'><?php echo esc_html( $current_user->display_name ); ?></span><?php
if ($show_email) {
    ?><span class='gtc_login__user_email'><?php echo esc_html( $current_user->user_email ); ?>"</span><?php
}