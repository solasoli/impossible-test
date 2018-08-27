<?php      
if (!is_user_logged_in()) {
    $is_nextend_facebook = in_array( 'nextend-facebook-connect/nextend-facebook-connect.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
    $is_nextend_google = in_array( 'nextend-google-connect/nextend-google-connect.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
    $is_nextend_twitter = in_array( 'nextend-twitter-connect/nextend-twitter-connect.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
    $i = 0;
    if ($is_nextend_facebook) {
        $i++;
    }
    if ($is_nextend_google) {
        $i++;
    }
    if ($is_nextend_twitter) {
        $i++;
    }
    if (($is_nextend_facebook || $is_nextend_google || $is_nextend_twitter) && get_option('users_can_register')) {
        ?><div class='wpd_header_builder__login-modal_footer'>
            <p class='wpd_modal_social_text'><span><?php echo esc_html__( 'or', 'oswald' ); ?></span></p>
            <div class='wpd_social_login_item__wrapper'><?php
                if ($is_nextend_facebook) {
                    echo "<a href='" . wp_login_url() . "?loginFacebook=1&redirect=" . esc_url(get_permalink()) . "' onclick='window.location = \"".wp_login_url()."?loginFacebook=1&redirect=\"+window.location.href; return false;' class='wpd_social_login_item wpd_facebook_login' title='".esc_attr__( 'Login with Facebook', 'oswald' )."'>";
                    ?><i class="fa fa-facebook" aria-hidden="true"></i><?php
                    echo  $i < 3 ? '<span>'.esc_html__( 'Facebook', 'oswald' ).'</span>' : '';
                    echo "</a>";
                }
                if ($is_nextend_google) {
                    echo "<a href='" . wp_login_url() . "?loginGoogle=1&redirect=" . esc_url(get_permalink()) . "' onclick='window.location = \"".wp_login_url()."?loginGoogle=1&redirect=\"+window.location.href; return false;' class='wpd_social_login_item wpd_google_login' title='".esc_attr__( 'Login with Google', 'oswald' )."'>";
                    ?><i class="fa fa-google" aria-hidden="true"></i><?php
                    echo  $i < 3 ?  '<span>'.esc_html__( 'Google', 'oswald' ).'</span>' : '';
                    echo "</a>";
                }
                if ($is_nextend_twitter) {
                    echo "<a href='" . wp_login_url() . "?loginTwitter=1&redirect=" . esc_url(get_permalink()) . "' onclick='window.location = \"".wp_login_url()."?loginTwitter=1&redirect=\"+window.location.href; return false;' class='wpd_social_login_item wpd_twitter_login' title='".esc_attr__( 'Login with Twitter', 'oswald' )."'>";
                    ?><i class="fa fa-twitter" aria-hidden="true"></i><?php
                    echo  $i < 3 ?  '<span>'.esc_html__( 'Twitter', 'oswald' ).'</span>' : '';
                    echo "</a>";
                }
            ?></div>
        </div><?php
    }
}