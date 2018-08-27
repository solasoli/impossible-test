<?php
/**
 * Oswald Theme Customizer
 *
 * @package oswald
 */

/* Custom panel type - used for multiple levels of panels */
if ( class_exists( 'WP_Customize_Panel' ) ) {

	/**
	 * Class Oswald_WP_Customize_Panel
	 */
	class Oswald_WP_Customize_Panel extends WP_Customize_Panel {

		public $panel;

		/**
		 * Panel type
		 *
		 * @var $type string Panel type.
		 */
		public $type = 'oswald_panel';

		/**
		 * Form the json
		 */
		public function json() {

			$array                   = wp_array_slice_assoc(
				(array) $this, array(
					'id',
					'description',
					'priority',
					'type',
					'panel',
				)
			);
			$array['title']          = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content']        = $this->get_content();
			$array['active']         = $this->active();
			$array['instanceNumber'] = $this->instance_number;

			return $array;

		}

	}

}

if ( class_exists( 'WP_Customize_Section' ) ) {

	/**
	 * Class Oswald_WP_Customize_Section
	 */
	class Oswald_WP_Customize_Section extends WP_Customize_Section {

		public $section;

		public $type = 'oswald_section';

		public function json() {
			$array                   = wp_array_slice_assoc( (array) $this, array( 
				'id', 
				'description', 
				'priority', 
				'panel', 
				'type', 
				'description_hidden', 
				'section' 
			) );
			$array['title']          = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content']        = $this->get_content();
			$array['active']         = $this->active();
			$array['instanceNumber'] = $this->instance_number;

			if ( $this->panel ) {
				$array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
			} else {
				$array['customizeAction'] = 'Customizing';
			}

			return $array;
		}
	}
}


if ( ! function_exists( 'oswald_sanitize_checkbox' ) ) {
	function oswald_sanitize_checkbox( $input ) {
		return ( isset( $input ) && true == $input ? true : false );
	}
}

if ( ! function_exists( 'oswald_sanitize_choices' ) ) {
	function oswald_sanitize_choices( $input, $setting ) {
		$input = sanitize_key( $input );
		$choices = $setting->manager->get_control( $setting->id )->choices;
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
}

if ( ! function_exists( 'oswald_sanitize_presets' ) ) {
	function oswald_sanitize_presets( $input, $setting ) {
		return ( is_array( $input ) ? $input : $setting->default );
	}
}

if ( ! function_exists( 'oswald_google_font_sanitization' ) ) {
	function oswald_google_font_sanitization( $input ) {
		$val =  json_decode( $input, true );
		if( is_array( $val ) ) {
			foreach ( $val as $key => $value ) {
				$val[$key] = sanitize_text_field( $value );
			}
			$input = $val;
		}
		else {
			$input = sanitize_text_field( $val );
		}
		return $input;
	}
}

function oswald_custom_logo_callback() {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

    if ( has_custom_logo() ) {
        ?><img class="default_logo callback" src="<?php echo esc_url($logo[0]); ?>" alt="<?php echo esc_attr_e('logo','oswald') ?>"<?php echo ' style="max-height: 95%;"';?>><?php
    } else {
        ?><h1 class="site-title"><?php echo esc_html(get_bloginfo( 'name' )); ?></h1><?php
        $description = get_bloginfo( 'description', 'display' );
        if ( ! empty( $description ) ) :
        ?>
            <div class="site-description">

                <?php echo esc_html($description); ?>

            </div>

        <?php elseif ( is_customize_preview() ) : ?>
        <div class="site-description"></div>
        <?php endif;
    }

	return $logo;
}

function oswald_sanitize_float( $input ) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}


function oswald_homepage_header_pre_title_render_callback(){
	return wp_kses_post( oswald_option( 'homepage_header_pre_title' ) );
}
function oswald_homepage_header_title_render_callback(){
	return wp_kses_post( oswald_option( 'homepage_header_title' ) );
}
function oswald_homepage_header_text_render_callback(){
	return wp_kses_post( oswald_option( 'homepage_header_text' ) );
}

function oswald_homepage_header_button_label_render_callback_1(){
	return wp_kses_post( oswald_option( 'homepage_header_button_label_1' ) );
}
function oswald_homepage_header_button_bg_color_render_callback_1(){
	return wp_kses_post( oswald_option( 'homepage_header_button_bg_color_1' ) );
}
function oswald_homepage_header_button_color_render_callback_1(){
	return wp_kses_post( oswald_option( 'homepage_header_button_color_1' ) );
}
function oswald_homepage_header_button_label_render_callback_2(){
	return wp_kses_post( oswald_option( 'homepage_header_button_label_2' ) );
}
function oswald_homepage_header_button_bg_color_render_callback_2(){
	return wp_kses_post( oswald_option( 'homepage_header_button_bg_color_2' ) );
}
function oswald_homepage_header_button_color_render_callback_2(){
	return wp_kses_post( oswald_option( 'homepage_header_button_color_2' ) );
}

function oswald_pre_title_render_callback(){
	return wp_kses_post( oswald_option( 'about_pre_title' ) );
}

function oswald_title_render_callback(){
	return wp_kses_post( oswald_option( 'about_title' ) );
}

function oswald_text_render_callback(){
	return wp_kses_post( oswald_option( 'about_text' ) );
}
function oswald_about_button_label_render_callback(){
	return wp_kses_post( oswald_option( 'about_button_label' ) );
}
function oswald_about_button_bg_color_render_callback(){
	return wp_kses_post( oswald_option( 'about_button_bg_color' ) );
}
function oswald_about_button_color_render_callback(){
	return wp_kses_post( oswald_option( 'about_button_color' ) );
}

function oswald_about_image_render_callback(){
	$wpdaddy_about_image_url = oswald_option( 'about_image' );
	$image_id = attachment_url_to_postid($wpdaddy_about_image_url);
	$wpdaddy_about_image_url = wp_get_attachment_image_url($image_id, 'oswald_one_half');

	if (!empty($wpdaddy_about_image_url)) {
		return '<img src="'. esc_url($wpdaddy_about_image_url) . '" alt="' . wp_kses_post( oswald_option( 'about_title' ) ) . '">';
	}else{
		return;
	}
}

function oswald_services_pre_title_render_callback(){
	return wp_kses_post( oswald_option( 'services_pre_title' ) );
}

function oswald_services_title_render_callback(){
	return wp_kses_post( oswald_option( 'services_title' ) );
}

function oswald_services_text_render_callback(){
	return wp_kses_post( oswald_option( 'services_text' ) );
}

/** services */
/* 1 */
function oswald_service_image_1_render_callback(){
	$image_url = oswald_option( 'service_image_1' );
	$image_id = attachment_url_to_postid($image_url);
	$image_url = wp_get_attachment_image_url($image_id, 'oswald_icon');

	if (!empty($image_url)) {
		return '<img src="'. esc_url($image_url) . '" alt="' . wp_kses_post( oswald_option( 'about_title' ) ) . '">';
	}else{
		return;
	}
}
function oswald_services_service_title_1_render_callback(){
	return wp_kses_post( oswald_option( 'service_title_1' ) );
}
function oswald_services_service_text_1_render_callback(){
	return wp_kses_post( oswald_option( 'service_text_1' ) );
}
/* 2 */
function oswald_service_image_2_render_callback(){
	$image_url = oswald_option( 'service_image_2' );
	$image_id = attachment_url_to_postid($image_url);
	$image_url = wp_get_attachment_image_url($image_id, 'oswald_icon');
	if (!empty($image_url)) {
		return '<img src="'. esc_url($image_url) . '" alt="' . wp_kses_post( oswald_option( 'about_title' ) ) . '">';
	}else{
		return;
	}
}
function oswald_services_service_title_2_render_callback(){
	return wp_kses_post( oswald_option( 'service_title_2' ) );
}
function oswald_services_service_text_2_render_callback(){
	return wp_kses_post( oswald_option( 'service_text_2' ) );
}
/* 3 */
function oswald_service_image_3_render_callback(){
	$image_url = oswald_option( 'service_image_3' );
	$image_id = attachment_url_to_postid($image_url);
	$image_url = wp_get_attachment_image_url($image_id, 'oswald_icon');
	if (!empty($image_url)) {
		return '<img src="'. esc_url($image_url) . '" alt="' . wp_kses_post( oswald_option( 'about_title' ) ) . '">';
	}else{
		return;
	}
}
function oswald_services_service_title_3_render_callback(){
	return wp_kses_post( oswald_option( 'service_title_3' ) );
}
function oswald_services_service_text_3_render_callback(){
	return wp_kses_post( oswald_option( 'service_text_3' ) );
}
/* 4 */
function oswald_service_image_4_render_callback(){
	$image_url = oswald_option( 'service_image_4' );
	$image_id = attachment_url_to_postid($image_url);
	$image_url = wp_get_attachment_image_url($image_id, 'oswald_icon');
	if (!empty($image_url)) {
		return '<img src="'. esc_url($image_url) . '" alt="' . wp_kses_post( oswald_option( 'about_title' ) ) . '">';
	}else{
		return;
	}
}
function oswald_services_service_title_4_render_callback(){
	return wp_kses_post( oswald_option( 'service_title_4' ) );
}
function oswald_services_service_text_4_render_callback(){
	return wp_kses_post( oswald_option( 'service_text_4' ) );
}
/* 5 */
function oswald_service_image_5_render_callback(){
	$image_url = oswald_option( 'service_image_5' );
	$image_id = attachment_url_to_postid($image_url);
	$image_url = wp_get_attachment_image_url($image_id, 'oswald_icon');
	if (!empty($image_url)) {
		return '<img src="'. esc_url($image_url) . '" alt="' . wp_kses_post( oswald_option( 'about_title' ) ) . '">';
	}else{
		return;
	}
}
function oswald_services_service_title_5_render_callback(){
	return wp_kses_post( oswald_option( 'service_title_5' ) );
}
function oswald_services_service_text_5_render_callback(){
	return wp_kses_post( oswald_option( 'service_text_5' ) );
}
/* 6 */
function oswald_service_image_6_render_callback(){
	$image_url = oswald_option( 'service_image_6' );
	$image_id = attachment_url_to_postid($image_url);
	$image_url = wp_get_attachment_image_url($image_id, 'oswald_icon');
	if (!empty($image_url)) {
		return '<img src="'. esc_url($image_url) . '" alt="' . wp_kses_post( oswald_option( 'about_title' ) ) . '">';
	}else{
		return;
	}
}
function oswald_services_service_title_6_render_callback(){
	return wp_kses_post( oswald_option( 'service_title_6' ) );
}
function oswald_services_service_text_6_render_callback(){
	return wp_kses_post( oswald_option( 'service_text_6' ) );
}

function oswald_call_to_action_title_render_callback(){
	return wp_kses_post( oswald_option( 'call_to_action_title' ) );
}
function oswald_call_to_action_text_render_callback(){
	return wp_kses_post( oswald_option( 'call_to_action_text' ) );
}
function oswald_call_to_action_button_label_render_callback(){
	return wp_kses_post( oswald_option( 'call_to_action_button_label' ) );
}

/** Team */
function oswald_team_pre_title_render_callback(){
	return wp_kses_post( oswald_option( 'team_pre_title' ) );
}
function oswald_team_title_render_callback(){
	return wp_kses_post( oswald_option( 'team_title' ) );
}
function oswald_team_text_render_callback(){
	return wp_kses_post( oswald_option( 'team_text' ) );
}

/* team 1*/
function oswald_team_image_1_render_callback(){
	$image_url = oswald_option( 'team_image_1' );
	$image_id = attachment_url_to_postid($image_url);
	$image_url = wp_get_attachment_image_url($image_id, 'oswald_one_third');
	if (!empty($image_url)) {
		return '<img src="'. esc_url($image_url) . '" alt="' . wp_kses_post( oswald_option( 'team_title_1' ) ) . '">';
	}else{
		return;
	}
}
function oswald_team_title_1_render_callback(){
	return wp_kses_post( oswald_option( 'team_title_1' ) );
}
function oswald_team_position_1_render_callback(){
	return wp_kses_post( oswald_option( 'team_position_1' ) );
}
function oswald_team_social_1_render_callback(){
	return wp_kses_post( oswald_option( 'team_social_1' ) );
}
/* team 2*/
function oswald_team_image_2_render_callback(){
	$image_url = oswald_option( 'team_image_2' );
	$image_id = attachment_url_to_postid($image_url);
	$image_url = wp_get_attachment_image_url($image_id, 'oswald_one_third');
	if (!empty($image_url)) {
		return '<img src="'. esc_url($image_url) . '" alt="' . wp_kses_post( oswald_option( 'team_title_2' ) ) . '">';
	}else{
		return;
	}
}
function oswald_team_title_2_render_callback(){
	return wp_kses_post( oswald_option( 'team_title_2' ) );
}
function oswald_team_position_2_render_callback(){
	return wp_kses_post( oswald_option( 'team_position_2' ) );
}
function oswald_team_social_2_render_callback(){
	return wp_kses_post( oswald_option( 'team_social_2' ) );
}
/* team 3*/
function oswald_team_image_3_render_callback(){
	$image_url = oswald_option( 'team_image_3' );
	$image_id = attachment_url_to_postid($image_url);
	$image_url = wp_get_attachment_image_url($image_id, 'oswald_one_third');
	if (!empty($image_url)) {
		return '<img src="'. esc_url($image_url) . '" alt="' . wp_kses_post( oswald_option( 'team_title_3' ) ) . '">';
	}else{
		return;
	}
}
function oswald_team_title_3_render_callback(){
	return wp_kses_post( oswald_option( 'team_title_3' ) );
}
function oswald_team_position_3_render_callback(){
	return wp_kses_post( oswald_option( 'team_position_3' ) );
}
function oswald_team_social_3_render_callback(){
	return wp_kses_post( oswald_option( 'team_social_3' ) );
}
/* team 4*/
function oswald_team_image_4_render_callback(){
	$image_url = oswald_option( 'team_image_4' );
	$image_id = attachment_url_to_postid($image_url);
	$image_url = wp_get_attachment_image_url($image_id, 'oswald_one_third');
	if (!empty($image_url)) {
		return '<img src="'. esc_url($image_url) . '" alt="' . wp_kses_post( oswald_option( 'team_title_4' ) ) . '">';
	}else{
		return;
	}
}
function oswald_team_title_4_render_callback(){
	return wp_kses_post( oswald_option( 'team_title_4' ) );
}
function oswald_team_position_4_render_callback(){
	return wp_kses_post( oswald_option( 'team_position_4' ) );
}
function oswald_team_social_4_render_callback(){
	return wp_kses_post( oswald_option( 'team_social_4' ) );
}
/* team 5*/
function oswald_team_image_5_render_callback(){
	$image_url = oswald_option( 'team_image_5' );
	$image_id = attachment_url_to_postid($image_url);
	$image_url = wp_get_attachment_image_url($image_id, 'oswald_one_third');
	if (!empty($image_url)) {
		return '<img src="'. esc_url($image_url) . '" alt="' . wp_kses_post( oswald_option( 'team_title_5' ) ) . '">';
	}else{
		return;
	}
}
function oswald_team_title_5_render_callback(){
	return wp_kses_post( oswald_option( 'team_title_5' ) );
}
function oswald_team_position_5_render_callback(){
	return wp_kses_post( oswald_option( 'team_position_5' ) );
}
function oswald_team_social_5_render_callback(){
	return wp_kses_post( oswald_option( 'team_social_5' ) );
}
/* team 6*/
function oswald_team_image_6_render_callback(){
	$image_url = oswald_option( 'team_image_6' );
	$image_id = attachment_url_to_postid($image_url);
	$image_url = wp_get_attachment_image_url($image_id, 'oswald_one_third');
	if (!empty($image_url)) {
		return '<img src="'. esc_url($image_url) . '" alt="' . wp_kses_post( oswald_option( 'team_title_6' ) ) . '">';
	}else{
		return;
	}
}
function oswald_team_title_6_render_callback(){
	return wp_kses_post( oswald_option( 'team_title_6' ) );
}
function oswald_team_position_6_render_callback(){
	return wp_kses_post( oswald_option( 'team_position_6' ) );
}
function oswald_team_social_6_render_callback(){
	return wp_kses_post( oswald_option( 'team_social_6' ) );
}


/* Testimonial */
function oswald_testimonial_pre_title_render_callback(){
	return wp_kses_post( oswald_option( 'testimonial_pre_title' ) );
}
function oswald_testimonial_title_render_callback(){
	return wp_kses_post( oswald_option( 'testimonial_title' ) );
}
// testimonial 1
function oswald_testimonial_image_1_render_callback(){
	$image_url = oswald_option( 'testimonial_image_1' );
	$image_id = attachment_url_to_postid($image_url);
	$image_url = wp_get_attachment_image_url($image_id, 'oswald_one_third');
	if (!empty($image_url)) {
		return '<img class="testimonials_round_img" src="'. esc_url($image_url) . '" alt="' . wp_kses_post( oswald_option( 'oswald_icon' ) ) . '">';
	}else{
		return;
	}
}
function oswald_testimonial_name_1_render_callback(){
	return wp_kses_post( oswald_option( 'testimonial_name_1' ) );
}
function oswald_testimonial_position_1_render_callback(){
	return wp_kses_post( oswald_option( 'testimonial_position_1' ) );
}
function oswald_testimonial_text_1_render_callback(){
	return wp_kses_post( oswald_option( 'testimonial_text_1' ) );
}
// testimonial 2
function oswald_testimonial_image_2_render_callback(){
	$image_url = oswald_option( 'testimonial_image_2' );
	$image_id = attachment_url_to_postid($image_url);
	$image_url = wp_get_attachment_image_url($image_id, 'oswald_one_third');
	if (!empty($image_url)) {
		return '<img class="testimonials_round_img" src="'. esc_url($image_url) . '" alt="' . wp_kses_post( oswald_option( 'oswald_icon' ) ) . '">';
	}else{
		return;
	}
}
function oswald_testimonial_name_2_render_callback(){
	return wp_kses_post( oswald_option( 'testimonial_name_2' ) );
}
function oswald_testimonial_position_2_render_callback(){
	return wp_kses_post( oswald_option( 'testimonial_position_2' ) );
}
function oswald_testimonial_text_2_render_callback(){
	return wp_kses_post( oswald_option( 'testimonial_text_2' ) );
}


// BLog
function oswald_homepage_blog_pre_title_render_callback(){
	return wp_kses_post( oswald_option( 'homepage_blog_pre_title' ) );
}
function oswald_homepage_blog_title_render_callback(){
	return wp_kses_post( oswald_option( 'homepage_blog_title' ) );
}
function oswald_homepage_blog_text_render_callback(){
	return wp_kses_post( oswald_option( 'homepage_blog_text' ) );
}


// partners 1
function oswald_partners_image_1_render_callback(){
	$image_url = oswald_option( 'partners_image_1' );
	if (!empty($image_url)) {
		return '<img src="'. esc_url($image_url) . '" alt="logo">';
	}else{
		return;
	}
} 
// partners 2
function oswald_partners_image_2_render_callback(){
	$image_url = oswald_option( 'partners_image_2' );
	if (!empty($image_url)) {
		return '<img src="'. esc_url($image_url) . '" alt="logo">';
	}else{
		return;
	}
} 
// partners 3
function oswald_partners_image_3_render_callback(){
	$image_url = oswald_option( 'partners_image_3' );
	if (!empty($image_url)) {
		return '<img src="'. esc_url($image_url) . '" alt="logo">';
	}else{
		return;
	}
}
// partners 4
function oswald_partners_image_4_render_callback(){
	$image_url = oswald_option( 'partners_image_4' );
	if (!empty($image_url)) {
		return '<img src="'. esc_url($image_url) . '" alt="logo">';
	}else{
		return;
	}
}


// Contact
function oswald_contact_pre_title_left_render_callback(){
	return wp_kses_post( oswald_option( 'contact_pre_title_left' ) );
}
function oswald_contact_title_left_render_callback(){
	return wp_kses_post( oswald_option( 'contact_title_left' ) );
}
function oswald_contact_text_left_render_callback(){
	return oswald_sanitize_text( oswald_option( 'contact_text_left' ) );
}

function oswald_contact_pre_title_right_render_callback(){
	return wp_kses_post( oswald_option( 'contact_pre_title_right' ) );
}
function oswald_contact_title_right_render_callback(){
	return wp_kses_post( oswald_option( 'contact_title_right' ) );
}
function oswald_contact_text_right_render_callback(){
	return do_shortcode(oswald_sanitize_text( oswald_option( 'contact_text_right' ) ));
}


/**
 * Custom Controls
 */

/**
 * Radio Image control (modified radio).
 */
class Oswald_Control_Radio_Image extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'oswald-radio-image';

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	public function enqueue() {
		$css_uri = OSWALD_THEME_URI . 'inc/customizer/css/';
		$js_uri  = OSWALD_THEME_URI . 'inc/customizer/js/';

		wp_enqueue_script( 'oswald-radio-image', $js_uri . 'radio-image.js', array( 'jquery', 'customize-base' ), false, true );
		wp_enqueue_style( 'oswald-radio-image', $css_uri . 'radio-image.css', null, false );
	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();

		$this->json['default'] = $this->setting->default;
		if ( isset( $this->default ) ) {
			$this->json['default'] = $this->default;
		}
		$this->json['value'] = $this->value();

		foreach ( $this->choices as $key => $value ) {
			$this->json['choices'][ $key ]        = esc_url( $value['path'] );
			$this->json['choices_titles'][ $key ] = $value['label'];
		}

		$this->json['link'] = $this->get_link();
		$this->json['id']   = $this->id;

		$this->json['inputAttrs'] = '';
		$this->json['labelStyle'] = '';
		foreach ( $this->input_attrs as $attr => $value ) {
			if ( 'style' !== $attr ) {
				$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
			} else {
				$this->json['labelStyle'] = 'style="' . esc_attr( $value ) . '" ';
			}
		}

	}

	protected function content_template() {
		?>
		<label class="customizer-text">
			<# if ( data.label ) { #>
				<span class="customize-control-title">{{{ data.label }}}</span>
			<# } #>
			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>
		</label>
		<div id="input_{{ data.id }}" class="image">
			<# for ( key in data.choices ) { #>
				<input {{{ data.inputAttrs }}} class="image-select" type="radio" value="{{ key }}" name="_customize-radio-{{ data.id }}" id="{{ data.id }}{{ key }}" {{{ data.link }}}<# if ( data.value === key ) { #> checked="checked"<# } #>>
					<label for="{{ data.id }}{{ key }}" {{{ data.labelStyle }}}>
						<img class="wp-ui-highlight" src="{{ data.choices[ key ] }}">
						<span class="image-clickable" title="{{ data.choices_titles[ key ] }}" ></span>
					</label>
				</input>
			<# } #>
		</div>
		<?php
	}
}


/**
 * Image Presets control.
 */
class Oswald_Control_Preset extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'oswald-preset';

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	public function enqueue() {

		$css_uri = OSWALD_THEME_URI . 'inc/customizer/css/';
		$js_uri  = OSWALD_THEME_URI . 'inc/customizer/js/';

		wp_enqueue_script( 'oswald-preset', $js_uri . 'preset.js', array( 'jquery', 'customize-base' ), false, true );
		wp_enqueue_style( 'oswald-preset', $css_uri . 'preset.css', null, false );

	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();

		$this->json['default'] = $this->setting->default;
		if ( isset( $this->default ) ) {
			$this->json['default'] = $this->default;
		}
		$this->json['value'] = $this->value();

		foreach ( $this->choices as $key => $value ) {
			$this->json['choices'][ $key ]        = esc_url( $value['path'] );
			$this->json['choices_titles'][ $key ] = $value['label'];
			$this->json['choices_options'][ $key ] = $value['options'];
		}

		$this->json['id']   = $this->id;
		$this->json['link'] = $this->get_link();
		

		$this->json['inputAttrs'] = '';
		$this->json['labelStyle'] = '';
		foreach ( $this->input_attrs as $attr => $value ) {
			if ( 'style' !== $attr ) {
				$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
			} else {
				$this->json['labelStyle'] = 'style="' . esc_attr( $value ) . '" ';
			}
		}
	}

	protected function content_template() {

		?>
		<label class="customizer-text">
			<# if ( data.label ) { #>
				<span class="customize-control-title">{{{ data.label }}}</span>
			<# } #>
			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>
		</label>
		<div id="input_{{ data.id }}" class="presets-holder">
			<# for ( key in data.choices ) { #>
				<div {{{ data.inputAttrs }}} class="preset-item <# if ( JSON.stringify(data.value) === data.choices_options[ key ] ) { #> active<# } #>" data-value='{{ key }}' data-option='{{ data.choices_options[ key ] }}'>
					<img class="wp-ui-highlight" src="{{ data.choices[ key ] }}">
					<span class="image-clickable" title="{{ data.choices_titles[ key ] }}" ></span>
				</div>
			<# } #>
		</div>
		<?php
	}

	/**
	 * Render the control's content.
	 *
	 * @see WP_Customize_Control::render_content()
	 */
	protected function render_content() {}
}



class Oswald_Control_TinyMCE extends WP_Customize_Control {
	/**
	 * The type of control being rendered
	 */
	public $type = 'tinymce_editor';
	/**
	 * Enqueue our scripts and styles
	 */
	public function enqueue(){
		wp_enqueue_script( 'oswald-custom-editor', OSWALD_THEME_URI . 'inc/customizer/js/tinymce.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_style( 'oswald-custom-editor', OSWALD_THEME_URI . 'inc/customizer/css/tinymce.css', array(), '1.0', 'all' );
		wp_enqueue_editor();
	}
	/**
	 * Pass our TinyMCE toolbar string to JavaScript
	 */
	public function to_json() {
		parent::to_json();

		$this->json['default'] = $this->setting->default;
		if ( isset( $this->default ) ) {
			$this->json['default'] = $this->default;
		}
		$this->json['value'] = $this->value();
		$this->json['id']   = str_replace(array("[", "]"),array('__',''),$this->id);
		$this->json['link'] = $this->get_link();

		$this->json['f_awesome_style_link'] = array(
			get_template_directory_uri() . '/assets/css/font-awesome.min.css',
			get_template_directory_uri() . '/assets/css/tiny_mce.css'
		);

		$this->json['tinymce_button_link'] = get_template_directory_uri() . '/assets/admin/js/tinymce-button.js';		

		$this->json['inputAttrs'] = '';
		$this->json['labelStyle'] = '';
		foreach ( $this->input_attrs as $attr => $value ) {
			if ( 'style' !== $attr ) {
				$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
			} else {
				$this->json['labelStyle'] = 'style="' . esc_attr( $value ) . '" ';
			}
		}

		$this->json['oswaldtinymcetoolbar1'] = isset( $this->input_attrs['toolbar1'] ) ? esc_attr( $this->input_attrs['toolbar1'] ) : 'bold italic bullist numlist alignleft aligncenter alignright link';
		$this->json['oswaldtinymcetoolbar2'] = isset( $this->input_attrs['toolbar2'] ) ? esc_attr( $this->input_attrs['toolbar2'] ) : '';
		$this->json['oswaldtinymceheight'] = isset( $this->input_attrs['height'] ) ? esc_attr( $this->input_attrs['height'] ) : '100';
	}
	/**
	 * Render the control in the customizer
	 */
	public function render_content(){
	?>
		<div class="tinymce-control">
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php if( !empty( $this->description ) ) { ?>
				<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php } ?>
			<textarea id="<?php echo esc_attr( $this->id ); ?>" class="customize-control-tinymce-editor" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
		</div>
	<?php
	}

	protected function content_template() {

		?>
		<div class="tinymce-control">
			<label class="customizer-text">
				<# if ( data.label ) { #>
					<span class="customize-control-title">{{{ data.label }}}</span>
				<# } #>
				<# if ( data.description ) { #>
					<span class="description customize-control-description">{{{ data.description }}}</span>
				<# } #>
			</label>
			<textarea id="{{{ data.id }}}" class="customize-control-tinymce-editor" {{{ data.link }}} data-f_awesome_link="{{{ data.f_awesome_style_link }}}">{{ data.value }}</textarea>
		</div>
		<?php
	}
}






/**
 * Typography
 */
class Oswald_Google_Font_Select_Custom_Control extends WP_Customize_Control {
		public $type = 'google_fonts';
		private $fontList = false;
		private $fontValues = array();

		public function __construct( $manager, $id, $args = array(), $options = array() ) {
			parent::__construct( $manager, $id, $args );
			$this->fontList = $this->getGoogleFonts();
			// Decode the default json font value
			if (is_array($this->value())) {
				$this->fontValues = $this->value();
			}else{
				$this->fontValues = json_decode($this->value(), true);
			}
		}
		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'select2', trailingslashit( get_template_directory_uri() ) . 'assets/js/select2.min.js', array( 'jquery' ), '4.0.6', true );
			wp_enqueue_script( 'oswald-custom-font', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/js/custom-font.js', array( 'select2', 'wp-color-picker' ), '1.0', true );
			wp_enqueue_style( 'oswald-custom-font', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/css/custom-font.css', array(), '1.0', 'all' );
			wp_enqueue_style( 'select2', trailingslashit( get_template_directory_uri() ) . 'assets/css/select2.min.css', array(), '4.0.6', 'all' );
		}
		/**
		 * Export our List of Google Fonts to JavaScript
		 */
		public function to_json() {
			parent::to_json();
			$this->json['oswaldfontslist'] = $this->fontList;
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			$fontCounter = 0;
			$isFontInList = false;
			$fontListStr = '';

			if( !empty($this->fontList) ) {
				?>
				<div class="google_fonts_select_control">
					<?php if( !empty( $this->label ) ) { ?>
						<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php } ?>
					<?php if( !empty( $this->description ) ) { ?>
						<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
					<?php } ?>
					<?php 
					$font_opt = $this->value();
					$this->value(); ?>
					<input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-google-font-selection" <?php $this->link(); ?> />
					<?php if ( isset($this->fontValues['font-family'])) {?>
						<div class="customize-control-description"><?php esc_html_e( 'Font Family', 'oswald' ); ?></div>
						<div class="google-fonts">
							<select class="google-fonts-list" control-name="<?php echo esc_attr( $this->id ); ?>">
								<?php
									$fontListStr .= '<option value="" ' . selected( $this->fontValues['font-family'], '', false ) . '></option>';
									foreach( $this->fontList as $key => $value ) {
										$fontCounter++;
										$fontListStr .= '<option value="' . $key . '" ' . selected( $this->fontValues['font-family'], $key, false ) . '>' . $key . '</option>';
									}
									// Display our list of font options
									echo ($fontListStr);
								?>
							</select>
						</div>
					<?php } 

					if (isset($this->fontValues['font-weight'])) {?>
						<div class="customize-control-description"><?php esc_html_e( 'Font Weight &amp; Style', 'oswald' ); ?></div>
						<div class="weight-style">
							<select class="google-fonts-weight-style">
								<?php
									$all_variants = array();
									if (!empty($this->fontList[$this->fontValues['font-family']]['variants'])) {
										foreach( $this->fontList[$this->fontValues['font-family']]['variants'] as $variant ) {
											echo '<option value="' . $variant['id'] . '" ' . selected( $this->fontValues['font-weight'], $variant['id'], false ) . '>' . $variant['name'] . '</option>';
											$all_variants[] = $variant['id'];
										}
									}else{
										$font_weight_def = array(
											'' => '',
											'100' => esc_html__( 'Ultra-Light 100', 'oswald' ),
											'200' => esc_html__( 'Light 200', 'oswald' ),
											'300' => esc_html__( 'Book 300', 'oswald' ),
											'400' => esc_html__( 'Normal 400', 'oswald' ),
											'500' => esc_html__( 'Medium 500', 'oswald' ),
											'600' => esc_html__( 'Semi-Bold 600', 'oswald' ),
											'700' => esc_html__( 'Bold 700', 'oswald' ),
											'800' => esc_html__( 'Extra-Bold 800', 'oswald' ),
											'900' => esc_html__( 'Ultra-Bold 900', 'oswald' ),
										);
										foreach( $font_weight_def as $font_weight_val => $font_weight_name  ) {
											echo '<option value="' . $font_weight_val . '" ' . selected( $this->fontValues['text-transform'], $font_weight_val, false ) . '>' . ucfirst ($font_weight_name) . '</option>';
										}
									}								
								?>
							</select>
							<input type="hidden" value="<?php echo esc_attr( json_encode( $all_variants ) ); ?>" class="customize-control-google-font-selection-all-style" />
						</div>
					<?php } 
					if (isset($this->fontValues['subsets'])) {?>
						<div class="customize-control-description"><?php esc_html_e( 'Font Subsets', 'oswald' ); ?></div>
						<div class="subsets-style">
							<select class="google-fonts-subsets-style">
								<?php
									if (!empty($this->fontList[$this->fontValues['font-family']]['subsets'])) {
										if (empty($this->fontValues['subsets'])) {
											$this->fontValues['subsets'] = 'latin';
										}
										foreach( $this->fontList[$this->fontValues['font-family']]['subsets'] as $subsets ) {
											echo '<option value="' . $subsets['id'] . '" ' . selected( $this->fontValues['subsets'], $subsets['id'], false ) . '>' . $subsets['name'] . '</option>';
										}
									}								
								?>
							</select>
						</div>
					<?php } 
					if (isset($this->fontValues['text-transform'])) {?>
						<div class="customize-control-description"><?php esc_html_e( 'Text Transform', 'oswald' ); ?></div>
						<div class="text-transform-style">
							<select class="google-fonts-text-transform-style">
								<?php
									$text_transform_variant = array(
										'',
										'none',
										'capitalize',
										'uppercase',
										'lowercase',
										'initial',
										'inherit',
									);
									foreach( $text_transform_variant as $text_transform ) {
										echo '<option value="' . $text_transform . '" ' . selected( $this->fontValues['text-transform'], $text_transform, false ) . '>' . ucfirst ($text_transform) . '</option>';
									}								
								?>
							</select>
						</div>
					<?php } 
					if (isset($this->fontValues['font-size']) || isset($this->fontValues['line-height'])) {?>
					<div class="row">
						<?php if (!empty($this->fontValues['font-size'])) { ?>
							<div class="span6">
								<div class="customize-control-description"><?php esc_html_e( 'Font Size (px)', 'oswald' ); ?></div>
								<div class="font-size-style">					
									<input class="custom-font-size" type="number" value="<?php echo (int)$this->fontValues['font-size']; ?>" name="font_size" min="0" max="200">
								</div>
							</div>
						<?php }
						if (isset($this->fontValues['line-height'])) { ?>
							<div class="span6">
								<div class="customize-control-description"><?php esc_html_e( 'Line Height (px)', 'oswald' ); ?></div>
								<div class="line-height-style">					
									<input class="custom-line-height" type="number" value="<?php echo (int)$this->fontValues['line-height']; ?>" name="line_height" min="0" max="200">
								</div>
							</div>
						<?php } ?>
					</div>
					<?php } 
					if (isset($this->fontValues['color'])) { ?>
						<div class="customize-control-description"><?php esc_html_e( 'Color', 'oswald' ); ?></div>
						<div class="color-style">					
							<input class="custom-font-color" name="custom_font_color" type="text" value="<?php echo esc_attr($this->fontValues['color']); ?>" />
						</div>
					<?php } ?>
				</div>
				<?php
			}
		}


		/**
		 * Return the list of Google Fonts from our json file. Unless otherwise specfied, list will be limited to 30 fonts.
		 */
		public function getGoogleFonts() {			

			$fontFile = trailingslashit( get_template_directory() ) . 'inc/customizer/googlefonts.php';
			if (file_exists($fontFile) ) {
				$content = include $fontFile;
			}else{
				$content = '';
			}

			return $content;

		}
	}