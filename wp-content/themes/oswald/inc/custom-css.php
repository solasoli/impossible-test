<?php 
// custom css styles

function oswald_custom_styles() {
	$custom_css = '';

	// THEME COLOR
	$theme_color = esc_attr(oswald_option("theme-custom-color"));
	$theme_color2 = esc_attr(oswald_option("theme-custom-color2"));
	$theme_adding_color = esc_attr(oswald_option("theme-adding-text-color"));
	// END THEME COLOR

	// BODY BACKGROUND
	$bg_body = esc_attr(oswald_option('body-background-color'));
	// END BODY BACKGROUND

	// BODY TYPOGRAPHY
	$main_font = oswald_option('main-font');
	if (!empty($main_font)) {
		if (!is_array($main_font)) {
			$main_font = json_decode( $main_font, true );
		}
		$content_font_family = esc_attr($main_font['font-family']);
		$content_line_height = esc_attr($main_font['line-height']);
		$content_font_size = esc_attr($main_font['font-size']);
		$content_font_weight = esc_attr($main_font['font-weight']);
		$content_font_weight = esc_attr( str_replace('italic','',$main_font['font-weight']) );
		if (empty($main_font['font-style']) && !empty($main_font['font-weight']) && strpos($main_font['font-weight'], 'italic')) {
			$content_font_style = 'italic';
		}
		$content_color = esc_attr($main_font['color']);
		$bullet_top_position = ((int)$content_line_height - 5)/2;
	}else{
		$content_font_family = '';
		$content_line_height = '';
		$content_font_size = '';
		$content_font_weight = '';
		$content_color = '';
		$bullet_top_position = '';
		$content_font_style = '';
	}

	$secondary_font = oswald_option('secondary-font');
	if (!empty($secondary_font)) {
		if (!is_array($secondary_font)) {
			$secondary_font = json_decode( $secondary_font, true );
		}
		$secondary_font_family = esc_attr($secondary_font['font-family']);
		$secondary_font_weight = esc_attr( str_replace('italic','',$secondary_font['font-weight']) );
		$secondary_font_style = !empty($secondary_font['font-style']) ? esc_attr($secondary_font['font-style']) : '';
		if (empty($secondary_font['font-style']) && !empty($secondary_font['font-weight']) && strpos($secondary_font['font-weight'], 'italic')) {
			$secondary_font_style = 'italic';
		}
	}

	// END BODY TYPOGRAPHY

	// HEADER TYPOGRAPHY
	$header_font = oswald_option('header-font');
	if (!empty($header_font)) {
		if (!is_array($header_font)) {
			$header_font = json_decode( $header_font, true );
		}
		$header_font_family = esc_attr($header_font['font-family']);
		$header_font_weight = esc_attr($header_font['font-weight']);
		$header_font_color = esc_attr($header_font['color']);
	}else{
		$header_font_family = '';
		$header_font_weight = '';
		$header_font_color = '';
	}
	
	$h1_font = oswald_option('h1-font');
	if (!empty($h1_font)) {
		if (!is_array($h1_font)) {
			$h1_font = json_decode( $h1_font, true );
		}
		$H1_font_family = !empty($h1_font['font-family']) ? esc_attr($h1_font['font-family']) : '';
		$H1_font_weight = !empty($h1_font['font-weight']) ? esc_attr($h1_font['font-weight']) : '';
		$H1_font_line_height = !empty($h1_font['line-height']) ? esc_attr($h1_font['line-height']) : '';
		$H1_font_size = !empty($h1_font['font-size']) ? esc_attr($h1_font['font-size']) : '';
	}else{
		$H1_font_family = '';
		$H1_font_weight = '';
		$H1_font_line_height = '';
		$H1_font_size = '';
	}
	
	$h2_font = oswald_option('h2-font');
	if (!empty($h2_font)) {
		if (!is_array($h2_font)) {
			$h2_font = json_decode( $h2_font, true );
		}
		$H2_font_family = !empty($h2_font['font-family']) ? esc_attr($h2_font['font-family']) : '';
		$H2_font_weight = !empty($h2_font['font-weight']) ? esc_attr($h2_font['font-weight']) : '';
		$H2_font_line_height = !empty($h2_font['line-height']) ? esc_attr($h2_font['line-height']) : '';
		$H2_font_size = !empty($h2_font['font-size']) ? esc_attr($h2_font['font-size']) : '';
	}else{
		$H2_font_family = '';
		$H2_font_weight = '';
		$H2_font_line_height = '';
		$H2_font_size = '';
	}

	$h3_font = oswald_option('h3-font');
	if (!empty($h3_font)) {
		if (!is_array($h3_font)) {
			$h3_font = json_decode( $h3_font, true );
		}
		$H3_font_family = !empty($h3_font['font-family']) ? esc_attr($h3_font['font-family']) : '';
		$H3_font_weight = !empty($h3_font['font-weight']) ? esc_attr($h3_font['font-weight']) : '';
		$H3_font_line_height = !empty($h3_font['line-height']) ? esc_attr($h3_font['line-height']) : '';
		$H3_font_size = !empty($h3_font['font-size']) ? esc_attr($h3_font['font-size']) : '';
	}else{
		$H3_font_family = '';
		$H3_font_weight = '';
		$H3_font_line_height = '';
		$H3_font_size = '';
	}
	
	$h4_font = oswald_option('h4-font');
	if (!empty($h4_font)) {
		if (!is_array($h4_font)) {
			$h4_font = json_decode( $h4_font, true );
		}
		$H4_font_family = !empty($h4_font['font-family']) ? esc_attr($h4_font['font-family']) : '';
		$H4_font_weight = !empty($h4_font['font-weight']) ? esc_attr($h4_font['font-weight']) : '';
		$H4_font_line_height = !empty($h4_font['line-height']) ? esc_attr($h4_font['line-height']) : '';
		$H4_font_size = !empty($h4_font['font-size']) ? esc_attr($h4_font['font-size']) : '';
	}else{
		$H4_font_family = '';
		$H4_font_weight = '';
		$H4_font_line_height = '';
		$H4_font_size = '';
	}

	$h5_font = oswald_option('h5-font');
	if (!empty($h5_font)) {
		if (!is_array($h5_font)) {
			$h5_font = json_decode( $h5_font, true );
		}
		$H5_font_family = !empty($h5_font['font-family']) ? esc_attr($h5_font['font-family']) : '';
		$H5_font_weight = !empty($h5_font['font-weight']) ? esc_attr($h5_font['font-weight']) : '';
		$H5_font_line_height = !empty($h5_font['line-height']) ? esc_attr($h5_font['line-height']) : '';
		$H5_font_size = !empty($h5_font['font-size']) ? esc_attr($h5_font['font-size']) : '';
	}else{
		$H5_font_family = '';
		$H5_font_weight = '';
		$H5_font_line_height = '';
		$H5_font_size = '';
	}

	$h6_font = oswald_option('h6-font');
	if (!empty($h6_font)) {
		if (!is_array($h6_font)) {
			$h6_font = json_decode( $h6_font, true );
		}
		$H6_font_family = !empty($h6_font['font-family']) ? esc_attr($h6_font['font-family']) : '';
		$H6_font_weight = !empty($h6_font['font-weight']) ? esc_attr($h6_font['font-weight']) : '';
		$H6_font_line_height = !empty($h6_font['line-height']) ? esc_attr($h6_font['line-height']) : '';
		$H6_font_size = !empty($h6_font['font-size']) ? esc_attr($h6_font['font-size']) : '';
	}else{
		$H6_font_family = '';
		$H6_font_weight = '';
		$H6_font_line_height = '';
		$H6_font_size = '';
	}

	$menu_font = oswald_option('menu-font');
	if (!empty($menu_font)) {
		if (!is_array($menu_font)) {
			$menu_font = json_decode( $menu_font, true );
		}
		$menu_font_family = !empty($menu_font['font-family']) ? esc_attr($menu_font['font-family']) : '';
		$menu_font_weight = !empty($menu_font['font-weight']) ? esc_attr($menu_font['font-weight']) : '';
		$menu_font_line_height = !empty($menu_font['line-height']) ? esc_attr($menu_font['line-height']) : '';
		$menu_font_size = !empty($menu_font['font-size']) ? esc_attr($menu_font['font-size']) : '';
		$menu_text_transform = !empty($menu_font['text-transform']) ? esc_attr($menu_font['text-transform']) : '';
	}else{
		$menu_font_family = '';
		$menu_font_weight = '';
		$menu_font_line_height = '';
		$menu_font_size = '';
		$menu_text_transform = '';
	}

	$sub_menu_bg = oswald_option('sub_menu_background');
	$sub_menu_color = oswald_option('sub_menu_color');
	$sub_menu_color_hover = oswald_option('sub_menu_color_hover');


	/* WPD Header Builder */
	$side_top_background = oswald_option('side_top_background');
	$side_top_background = $side_top_background['rgba'];
	$side_top_color = oswald_option('side_top_color');
	$side_top_color_hover = oswald_option('side_top_color_hover');
	$side_top_height = oswald_option('side_top_height');
	$side_top_height = $side_top_height['height'];

	$side_middle_background = oswald_option('side_middle_background');
	$side_middle_background = $side_middle_background['rgba'];
	$side_middle_color = oswald_option('side_middle_color');
	$side_middle_color_hover = oswald_option('side_middle_color_hover');
	$side_middle_height = oswald_option('side_middle_height');
	$side_middle_height = $side_middle_height['height'];

	$side_bottom_background = oswald_option('side_bottom_background');
	$side_bottom_background = $side_bottom_background['rgba'];
	$side_bottom_color = oswald_option('side_bottom_color');
	$side_bottom_color_hover = oswald_option('side_bottom_color_hover');
	$side_bottom_height = oswald_option('side_bottom_height');
	$side_bottom_height = $side_bottom_height['height'];

	$side_top_border = (bool)oswald_option("side_top_border");
	$side_top_border_color = oswald_option("side_top_border_color");

	$side_middle_border = (bool)oswald_option("side_middle_border");
	$side_middle_border_color = oswald_option("side_middle_border_color");
    
    $side_bottom_border = (bool)oswald_option("side_bottom_border");
    $side_bottom_border_color = oswald_option("side_bottom_border_color");

    $header_sticky = oswald_option("header_sticky");
    $side_top_sticky = oswald_option('side_top_sticky');
	$side_top_background_sticky = oswald_option('side_top_background_sticky');
	$side_top_color_sticky = oswald_option('side_top_color_sticky');
	$side_top_color_hover_sticky = oswald_option('side_top_color_hover_sticky');
	$side_top_height_sticky = oswald_option('side_top_height_sticky');

	$side_middle_sticky = oswald_option('side_middle_sticky');
	$side_middle_background_sticky = oswald_option('side_middle_background_sticky');
	$side_middle_color_sticky = oswald_option('side_middle_color_sticky');
	$side_middle_color_hover_sticky = oswald_option('side_middle_color_hover_sticky');
	$side_middle_height_sticky = oswald_option('side_middle_height_sticky');

	$side_bottom_sticky = oswald_option('side_bottom_sticky');
	$side_bottom_background_sticky = oswald_option('side_bottom_background_sticky');
	$side_bottom_color_sticky = oswald_option('side_bottom_color_sticky');
	$side_bottom_color_hover_sticky = oswald_option('side_bottom_color_hover_sticky');
	$side_bottom_height_sticky = oswald_option('side_bottom_height_sticky');

	/* End WPD Header Builder */


	// END HEADER TYPOGRAPHY


	$custom_css = '
    /* Custom CSS */
    *{
	}
	
	body,
	.team_title__text,
	.team_title__text > a,
	body .widget .yit-wcan-select-open,
	body .widget-hotspot {
		font-family:' . $content_font_family . ';
	}
	body {
		'.(!empty($bg_body) ? 'background:'.$bg_body.';' : '').'
		font-size:'.$content_font_size.';
		line-height:'.$content_line_height.';
		font-weight:'.$content_font_weight.';
		color: '.$content_color.';
		'.(!empty($content_font_style) ? 'font-style:'.$content_font_style.';' : '').'
	}
	.wpcf7-form label .wpcf7-form-control-wrap,
	.wpd_blog_list__post_likes:hover,
	.wpdaddy_portfolio__like_and_comments .wpd_blog_list__post_likes.already_liked:hover,
	.wpdaddy_portfolio__like_and_comments .wpd_blog_list__comments_link:hover,
	a:hover,
	.post-navigation a,
	.site_wrapper .pagerblock a,
	input[type="submit"]:hover,
	button:hover,
	.wpd_blog_list .post.single_post .wpd_blog_list__footer .wpd_blog_list_tag a,
	#comments .stand_comment .thiscommentbody .comment_info > .comment-reply-link:hover,
	.tagcloud a,
	.main_footer .tagcloud a,
	.main_footer .copyright .tagcloud a,
	.woocommerce .widget_price_filter .price_slider_wrapper .price_label span {
		color: '.$content_color.';
	}

	/* Custom Fonts */
	.module_team .team_info,
	h1,
	h2,
	h3,
	h4,
	h5,
	h6,
	body.wpb-js-composer .vc_tta.vc_general .vc_tta-tab,
	.wpdaddy_portfolio_list__filter a,
	.wpdaddy_team_list__filter a,
	.wpdaddy_team_list_social .wpdaddy_team_list_social__item,
	.wpdaddy_team_list_social a,
	.wpd_module_button a:hover,
	.widget h3.widget-title,
	body.wpb-js-composer .vc_tta.vc_general.vc_tta-tabs .vc_tta-tab>a,
	.price_item_number,
	.single-product.woocommerce div.product .product_meta {
		color: '.$header_font_color.';
	}
	.mc_form_inside #mc_signup_submit,
	.dropcap,
	.wpd_icon_box__icon--number,
	.strip_template .strip-item a span,
	.column1 .item_title a,
	.index_number,
	.price_item_btn a,
	.shortcode_tab_item_title,
	.wpd_twitter .twitt_title,
	body.wpb-js-composer .vc_tta.vc_general.vc_tta-tabs .vc_tta-tab>a,
	.price_item_number,
	.wpd-countdown{
		font-family: ' . $header_font_family . ';
		font-weight: ' . $header_font_weight . '
	}
	h1,
	h2,
	h3,
	h4,
	h5,
	h6,
	.widget h3.widget-title,
	.wpd_module_button a,
	input[type="submit"], 
	button,
	body.wpb-js-composer .vc_pie_chart .vc_pie_chart_value{
		font-family: ' . $header_font_family . ';	
	}
	h1{
		'.(!empty($H1_font_family) ? 'font-family:'.$H1_font_family.';' : '' ).'
		'.(!empty($H1_font_weight) ? 'font-weight:'.$H1_font_weight.';' : '' ).'
		'.(!empty($H1_font_size) ? 'font-size:'.$H1_font_size.';' : '' ).'
		'.(!empty($H1_font_line_height) ? 'line-height:'.$H1_font_line_height.';' : '' ).'
	}
	h2,
	.lwa-modal h3{
		'.(!empty($H2_font_family) ? 'font-family:'.$H2_font_family.';' : '' ).'
		'.(!empty($H2_font_weight) ? 'font-weight:'.$H2_font_weight.';' : '' ).'
		'.(!empty($H2_font_size) ? 'font-size:'.$H2_font_size.';' : '' ).'
		'.(!empty($H2_font_line_height) ? 'line-height:'.$H2_font_line_height.';' : '' ).'
	}
	h3,
	.wpdaddy_team_title h2,
	.sidepanel .title,
	.wpd_blog_list_wrapper.items2 .wpd_blog_list__title,
	.wpd_blog_list_wrapper.blog_type2 .wpd_blog_list__title{
		'.(!empty($H3_font_family) ? 'font-family:'.$H3_font_family.';' : '' ).'
		'.(!empty($H3_font_weight) ? 'font-weight:'.$H3_font_weight.';' : '' ).'
		'.(!empty($H3_font_size) ? 'font-size:'.$H3_font_size.';' : '' ).'
		'.(!empty($H3_font_line_height) ? 'line-height:'.$H3_font_line_height.';' : '' ).'
	}
	h4,
	.wpd_blog_list_wrapper.items3 .wpd_blog_list__title,
	.wpd_blog_list_wrapper.items4 .wpd_blog_list__title{
		'.(!empty($H4_font_family) ? 'font-family:'.$H4_font_family.';' : '' ).'
		'.(!empty($H4_font_weight) ? 'font-weight:'.$H4_font_weight.';' : '' ).'
		'.(!empty($H4_font_size) ? 'font-size:'.$H4_font_size.';' : '' ).'
		'.(!empty($H4_font_line_height) ? 'line-height:'.$H4_font_line_height.';' : '' ).'
	}
	h5{
		'.(!empty($H5_font_family) ? 'font-family:'.$H5_font_family.';' : '' ).'
		'.(!empty($H5_font_weight) ? 'font-weight:'.$H5_font_weight.';' : '' ).'
		'.(!empty($H5_font_size) ? 'font-size:'.$H5_font_size.';' : '' ).'
		'.(!empty($H5_font_line_height) ? 'line-height:'.$H5_font_line_height.';' : '' ).'
	}
	blockquote,
	.wpd_secondary_font,
	.testimonials_author_position,
	.wpd_blog_list__media .wpd_qoute__wrapper .wpd_qoute__text,
	.wpd_blog_list__media .wpd_qoute__wrapper:after,
	.wpd_blog_list__media .wpd_link__wrapper .wpd_link__text{
		'.(!empty($secondary_font_family) ? 'font-family:'.$secondary_font_family.';' : '' ).'
		'.(!empty($secondary_font_weight) ? 'font-weight:'.$secondary_font_weight.';' : '' ).'
		'.(!empty($secondary_font_style) ? 'font-style:'.$secondary_font_style.';' : '' ).'
	}
	h6,
	.widget h3.widget-title {
		'.(!empty($H6_font_family) ? 'font-family:'.$H6_font_family.';' : '' ).'
		'.(!empty($H6_font_weight) ? 'font-weight:'.$H6_font_weight.';' : '' ).'
		'.(!empty($H6_font_size) ? 'font-size:'.$H6_font_size.';' : '' ).'
		'.(!empty($H6_font_line_height) ? 'line-height:'.$H6_font_line_height.';' : '' ).'
	}

	.wpd_module_counter .stat_count {
		'.(!empty($H2_font_weight) ? 'font-weight:'.$H2_font_weight.';' : '' ).'
	}

	.diagram_item .chart,
	.item_title a ,
	.contentarea ul,
	#customer_login form .form-row label,
	.widget_posts .post_title a {
		color:'. $header_font_color .';
	}
    body.wpb-js-composer .vc_row .vc_progress_bar:not(.vc_progress-bar-color-custom) .vc_single_bar .vc_label:not([style*="color"]) .vc_label_units{
    	color: '. $header_font_color .' !important;
    }

	/* Theme color */
	blockquote:before,
	a,
	#back_to_top:hover,
	.top_footer a:hover,
	.wpd_practice_list__image-holder i,
	.copyright a:hover,
	.module_testimonial.type2 .testimonials-text:before,
	.price_item .items_text ul li:before,
	.wpd_practice_list__title a:hover,
	.pre_footer input[type="submit"]:hover,
	.team-icons .member-icon:hover,
	.wpdaddy_portfolio_list__filter a:hover,
	.wpdaddy_portfolio_list__filter a.active,
	.wpdaddy_team_list__filter a:hover,
	.wpdaddy_team_list__filter a.active,
	.wpdaddy_portfolio_info .wpdaddy_portfolio_info__item_adding a:hover,
	.wpdaddy_portfolio_info .wpdaddy_portfolio_info__item_category_wrapper a:hover,
	.wpdaddy_team_list_social .wpdaddy_team_list_social__item:hover,
	.wpdaddy_single_team_info__item a:hover{
		color: '.$theme_color.';
	}

	.widget_product_categories ul li:before,
	.widget_nav_menu ul li:before,
	.widget_archive ul li:before,
	.widget_pages ul li:before,
	.widget_categories ul li:before,
	.widget_recent_entries ul li:before,
	.widget_meta ul li:before,
	.widget_recent_comments ul li:before {
		top: '.esc_attr($bullet_top_position).'px;
  		background: '.$theme_adding_color.';
	}

	.wpdaddy_portfolio__footer .wpdaddy_portfolio_info__item_tag_wrapper a:hover,
	input[type="checkbox"]:before{
		background: '.$theme_color.';
	}

	.calendar_wrap table thead th,
	.widget_rss ul li .rss-date,
	.woocommerce ul.product_list_widget li .wpd-widget-product-wrapper .amount,
	.woocommerce ul.product_list_widget li .wpd-widget-product-wrapper del,
	#yith-quick-view-modal .woocommerce div.product p.price del,
	.single-product.woocommerce div.product p.price del {
		color: '.$theme_adding_color.';
	}

	.widget_product_categories ul li.active_list_item > a,
	.widget_nav_menu ul li.active_list_item > a,
	.widget_archive ul li.active_list_item > a,
	.widget_pages ul li.active_list_item > a,
	.widget_categories ul li.active_list_item > a,
	.widget_recent_entries ul li.active_list_item > a,
	.widget_meta ul li.active_list_item > a,
	.widget_recent_comments ul li.active_list_item > a,
	.about_info p > a,
	.about_info p > a:hover {
		color: '.$theme_color.';
	}

	.widget_product_categories a,
	.widget_nav_menu a,
	.widget_archive a,
	.widget_pages a,
	.widget_categories a,
	.widget_recent_entries a,
	.widget_meta a,
	.widget_recent_comments a {
	  	color: '.$content_color.';
	}

	.widget_product_categories a:hover,
	.widget_nav_menu a:hover,
	.widget_nav_menu li.current-menu-item a,
	.widget_archive a:hover,
	.widget_pages a:hover,
	.widget_categories a:hover,
	.widget_recent_entries a:hover,
	.widget_meta a:hover,
	.widget_recent_comments a:hover,
	.widget_posts .post_title a:hover {
		color: '.$theme_color.';
	}
	.post-navigation a:hover,
	.price_item .item_cost_wrapper .bg-color,
	.main_menu_container .menu_item_line,
	.wpd_practice_list__link:before,
	.content-container .vc_progress_bar .vc_single_bar .vc_bar,
	input[type="submit"],
	button,
	.pre_footer input[type="submit"],
	.wpd_blog_list__categories .category a{
		background-color: '.$theme_color.';
	}
	.wpd_module_button a,
	.slick-arrow:hover{
		border-color: '.$theme_color.';
		background: '.$theme_color.';
	}
	.wpd_header_builder_cart_component .button:hover {
		color:'.$theme_color.';
	}
	.nivo-directionNav .nivo-prevNav:hover:after,
	.nivo-directionNav .nivo-nextNav:hover:after,
	input[type="submit"],
	button,
	input[type=checkbox]:checked{
		border-color: '.$theme_color.';
	}

	.isotope-filter a:hover,
	.isotope-filter a.active,
	.wpd_practice_list__filter a:hover, 
	.wpd_practice_list__filter a.active {
		border-bottom-color: '.$theme_color.';
	}

	.wpd_blog_list__content p a:hover {
		color: '.$theme_color.';
	}

	.wpd_icon_box__link a:before,
	.stripe_item-divider,
	.module_team .view_all_link:before {
		background-color: '.$theme_color.';
	}
	.single-member-page .member-icon:hover,
	.single-member-page .team-link:hover,
	.module_team .view_all_link,
	.site_wrapper .pagerblock a:hover {
		color: '.$theme_color.';
	}

	.module_team .view_all_link:after {
		border-color: '.$theme_color.';
	}

	/* adding color */
	.wpd_blog_list__footer,
	.site_wrapper ol > li:before,
	blockquote cite,
	.wpd_blog_list__media .wpd_qoute__wrapper .wpd_qoute__author_wrapper .wpd_qoute__author_name,
	.wpd_blog_list__media .wpd_qoute__wrapper:after,
	.wpd_blog_list__media .wpd_link__wrapper:after,
	.wpd_blog_list .author_box__name,
	.site_wrapper .pagerblock a.current,
	#comments .stand_comment .thiscommentbody .comment_info > .comment_meta,
	#comments .stand_comment .thiscommentbody .comment_info > .comment-reply-link,
	.single_post .wpd_blog_list__meta,
	.wpdaddy_portfolio__like_and_comments,
	.recent_post_meta,
	.price_item-cost .price_item_suffix,
	.price_item-cost .price_item_prefix,
	.price_item_description,
	.wpd_secondary_font,
	#comments #respond form#commentform label,
	.wpcf7-form label,
	.woocommerce.single-product #respond #commentform label,
	.woocommerce.single-product #respond #commentform .comment-form-rating label,
	.woocommerce form.woocommerce-form-login .form-row label,
	.woocommerce form .form-row label {
		color: '.$theme_adding_color.' ;
	}

	/* menu fonts */
	.main-menu>ul,
	.main-menu>div>ul,
	.wpd_header_builder__burger_sidebar .widget_nav_menu > div > ul{
		font-family:'.esc_attr($menu_font_family).';
		font-weight:'.esc_attr($menu_font_weight).';
		line-height:'.esc_attr($menu_font_line_height).';
		font-size:'.esc_attr($menu_font_size).';
		text-transform:'.esc_attr($menu_text_transform).';
	}

	/* sub menu styles */
	.main-menu ul li ul.sub-menu,
	.wpd_currency_switcher ul,
	.mobile_menu_container,
	.wpd_header_builder_cart_component__cart-container{
		background-color: ' .(!empty($sub_menu_bg['rgba']) ? esc_attr( $sub_menu_bg['rgba'] ) : "transparent" ).' ;
		color: '.esc_attr( $sub_menu_color ).' ;
	}
	.wpd_header_builder .main-menu ul li ul.sub-menu .menu-item:hover > a,
	.wpd_header_builder .main-menu ul li ul .menu-item.current-menu-item > a,
	.wpd_header_builder .main-menu ul li ul .menu-item.current-menu-ancestor > a,
	.wpd_header_builder .main-menu ul li ul .menu-item.current-menu-item:after,
	.wpd_header_builder .main-menu ul li ul .menu-item.current-menu-ancestor:after,
	.wpd_currency_switcher ul a:hover,
	.main-menu ul li ul li.menu-item-has-children:hover:after, 
	.wpd_header_builder .mobile_menu_container .menu-item:hover > a{
		color: '.esc_attr( $sub_menu_color_hover ).' ;
	}
	.main_header .header_search .header_search__inner:after,
	.main-menu > ul > li > ul:before,
	.wpd_megamenu_triangle:before,
	.wpd_currency_switcher ul:before{
		border-bottom-color: ' .(!empty($sub_menu_bg['rgba']) ? esc_attr( $sub_menu_bg['rgba'] ) : "transparent" ).' ;
	}
	.main-menu > ul > li > ul:before,
	.wpd_megamenu_triangle:before,
	.wpd_currency_switcher ul:before {
	    -webkit-box-shadow: 0px 1px 0px 0px ' .(!empty($sub_menu_bg['rgba']) ? esc_attr( $sub_menu_bg['rgba'] ) : "transparent" ).';
	    -moz-box-shadow: 0px 1px 0px 0px ' .(!empty($sub_menu_bg['rgba']) ? esc_attr( $sub_menu_bg['rgba'] ) : "transparent" ).';
	    box-shadow: 0px 1px 0px 0px ' .(!empty($sub_menu_bg['rgba']) ? esc_attr( $sub_menu_bg['rgba'] ) : "transparent" ).';
	}

	/* blog */
	.team-icons .member-icon,
	body.wpb-js-composer .vc_tta.vc_general.vc_tta-tabs .vc_tta-tab>a,
	.wpd_module_featured_posts .listing_meta,
	.wpd_module_featured_posts .listing_meta a,
	.search_form .search-submit,
	.calendar_wrap table tbody td a,
	.calendar_wrap table tfoot td a {
		color: '.$content_color.';
	}
	.blogpost_title a:hover,
	.wpd_module_featured_posts .listing_meta a:hover,
	.calendar_wrap table tfoot td a:hover {
		color: '.$theme_color.';
	}
	.blogpost_title i {
		color: '.$theme_color.';
	}
	.learn_more:hover,
	.module_team .view_all_link:hover,
	#comments .stand_comment .thiscommentbody .comment_info > .comment_author_says {color: '.$header_font_color.';
	}
	.module_team .view_all_link:hover:before {
		background-color: '.$header_font_color.';
	}
	.module_team .view_all_link:hover:after {
		border-color: '.$header_font_color.';
	}

	.learn_more span,
	.wpd_module_title .carousel_arrows a:hover span,
	.stripe_item:after,
	.packery-item .packery_overlay {background: '.$theme_color.';
	}
	.learn_more span:before,
	.wpd_module_title .carousel_arrows a:hover span:before {border-color: '.$theme_color.';
	}
	.learn_more:hover span,
	.wpd_module_title .carousel_arrows a span {background: '.$header_font_color.';
	}
	.learn_more:hover span:before,
	.wpd_module_title .carousel_arrows a span:before {border-color: '.$header_font_color.';
	}
	.isotope-filter a:hover,
	.isotope-filter a.active{
		color: '.$theme_color.';
	}
	.post_media_info,
	.wpd_practice_list__filter,
	.isotope-filter {
		color: '.$header_font_color.';
	}

	.post_media_info:before{
		background: '.$header_font_color.';
	}

	.wpd_module_title .external_link .learn_more {
		line-height:'.$content_line_height.';
	}

	.blog_type1 .blog_post_preview:before,
	.lwa-modal-close:before,
	.lwa-modal-close:after,
	.wpd_header_builder__login-modal-close:before,
	.wpd_header_builder__login-modal-close:after{
		background: '.$header_font_color.';
	}

	.post_share > a:before,
	.share_wrap a span {
		font-size:'.$content_font_size.';
	}

	ol.commentlist:after {
		'.(!empty($bg_body) ? 'background:'.$bg_body.';' : '').'
	}

	.blog_post_media__link_text a:hover,
	h3#reply-title a,
	#comments .stand_comment .thiscommentbody .comment_info > .comment_author_says a:hover,
	.dropcap,
	.wpd_custom_text a,
	.wpd_custom_button i {
		color: '.$theme_color.';
	}
	.single .post_tags > span,
	h3#reply-title a:hover {
		color: '.$header_font_color.';
	}
	.blog_post_media--link .blog_post_media__link_text a,
	.post_share > a:before,
	.post_share:hover > a:before,
	.post_share:hover > a,
	.likes_block .icon,
	.listing_meta,
	.comment-reply-link,
	.comment-reply-link:hover,
	body.wpb-js-composer .vc_row .vc_tta.vc_tta-accordion.vc_tta-style-classic .vc_tta-controls-icon,
	.main_wrapper ul li:before,
	.main_footer ul li:before,
	.wpd_twitter a{
		color: '.$theme_color2.';
	}

	.calendar_wrap table tbody td a:hover:before,
	.calendar_wrap table tbody td#today:before,
	.calendar_wrap table tbody td#today a:before{
		border-color: '.$theme_color.';
		background: '.$theme_color.';
	}
	.mc_form_inside #mc_signup_submit,
	.wrapper_404 .wpd_module_button a,
	.blog_post_media--quote,
	.blog_post_media--link,
	body.wpb-js-composer .vc_row .vc_toggle_classic .vc_toggle_icon,
	body.wpb-js-composer .vc_row .vc_tta.vc_tta-style-accordion_alternative .vc_tta-controls-icon.vc_tta-controls-icon-plus::before,
	body.wpb-js-composer .vc_row .vc_tta.vc_tta-style-accordion_alternative .vc_tta-controls-icon.vc_tta-controls-icon-plus::after,
	body.wpb-js-composer .vc_row .vc_tta.vc_tta-accordion.vc_tta-style-accordion_solid .vc_tta-controls-icon:before,
	body.wpb-js-composer .vc_row .vc_tta.vc_tta-accordion.vc_tta-style-accordion_solid .vc_tta-controls-icon:after,
	body.wpb-js-composer .vc_row .vc_tta.vc_tta-accordion.vc_tta-style-accordion_bordered .vc_tta-controls-icon:before,
	body.wpb-js-composer .vc_row .vc_tta.vc_tta-accordion.vc_tta-style-accordion_bordered .vc_tta-controls-icon:after,
	body.wpb-js-composer .vc_row .vc_toggle_accordion_alternative .vc_toggle_icon:before,
	body.wpb-js-composer .vc_row .vc_toggle_accordion_alternative .vc_toggle_icon:after,
	body.wpb-js-composer .vc_row .vc_toggle_accordion_solid .vc_toggle_icon:before,
	body.wpb-js-composer .vc_row .vc_toggle_accordion_solid .vc_toggle_icon:after,
	body.wpb-js-composer .vc_row .vc_toggle_accordion_bordered .vc_toggle_icon:before,
	body.wpb-js-composer .vc_row .vc_toggle_accordion_bordered .vc_toggle_icon:after,
	body.wpb-js-composer .vc_row .vc_tta.vc_tta-accordion.vc_tta-style-accordion_bordered .vc_tta-controls-icon:before,
	body.wpb-js-composer .vc_row .vc_tta.vc_tta-accordion.vc_tta-style-accordion_bordered .vc_tta-controls-icon:after,
	.wpd_module_button .wpdaddy_portfolio_load_more,
	.wpd_module_button .wpdaddy_blog_load_more,
	.lwa-submit-wrapper button,
	.wpd_header_builder__login-modal_container .wpd_woo_login_button .woocommerce-Button{
		border-color: '.$theme_color2.';
	}
	.mc_form_inside #mc_signup_submit,
	.wrapper_404 .wpd_module_button a,
	body.wpb-js-composer .vc_tta.vc_general.vc_tta-tabs .vc_tta-tab.vc_active:before,	
	body.wpb-js-composer .vc_row .vc_toggle_accordion_bordered.vc_toggle_active .vc_toggle_title:before,
	body.wpb-js-composer .vc_row .vc_toggle_accordion_solid.vc_toggle_active .vc_toggle_title,
	body.wpb-js-composer .vc_row .vc_tta.vc_tta-style-accordion_solid .vc_active .vc_tta-panel-title>a,
	body.wpb-js-composer .vc_row .vc_tta.vc_tta-style-accordion_bordered .vc_tta-panel.vc_active .vc_tta-panel-title>a:before,
	.listing_meta span:after,
	.woo_mini-count > span:not(:empty),
	.icon-box_number,
	.wpd_module_button .wpdaddy_portfolio_load_more,
	.wpd_module_button .wpdaddy_blog_load_more,
	.lwa-submit-wrapper button,
	.wpd_header_builder__login-modal_container .wpd_woo_login_button .woocommerce-Button{
		background-color: '.$theme_color2.';
	}

	blockquote cite{
    	font-family:' . $content_font_family . ';
    }

    .wpd_social_links .wpd_social_icon span{
		color: '.$theme_color.';
	}

	.wpd_services_box_content {
    	background: '.$theme_color.';
    	font-size:'.$content_font_size.';
		line-height:'.$content_line_height.';
		font-family:' . $content_font_family . ';
		font-weight:'.$content_font_weight.';
    }
    .wpd_services_img_bg {
    	background-color: '.$theme_color.';
    }

    .current-cat-parent > a,
	.current-cat > a {
		color: '.$theme_color.' !important;
	}
	.cart_list.product_list_widget a.remove {
		color: '.$theme_color2.' !important;
	}
	.cart_list.product_list_widget a.remove:hover{
		color: '.$theme_color.' !important;
	}

    ';

    //sticky header logo 
    $header_sticky_height = oswald_option('header_sticky_height');
    $custom_css .='
    .wpd_practice_list__overlay:before,
    .wpd_blog_list .post.single_post .wpd_blog_list__footer .wpd_blog_list_tag a:hover,
    .tagcloud a:hover {
    	background-color: '.$theme_color.';
    }';


    // footer styles
    $footer_text_color = oswald_option_compare('footer_text_color','mb_footer_switch','yes');
    $footer_heading_color = oswald_option_compare('footer_heading_color','mb_footer_switch','yes');
    $custom_css .= '
    .top_footer .widget-title,
    .top_footer .widget h3.widget-title,
    .top_footer strong,
    .top_footer a:hover,
    .top_footer .widget_nav_menu ul li a:hover,
    .top_footer .widget_product_categories a, 
    .top_footer .widget_nav_menu a, 
    .top_footer .widget_archive a, 
    .top_footer .widget_pages a, 
    .top_footer .widget_categories a, 
    .top_footer .widget_recent_entries a, 
    .top_footer .widget_meta a, 
    .top_footer .widget_recent_comments a,
    .top_footer .widget_product_categories ul li.active_list_item > a, 
    .top_footer .widget_nav_menu ul li.active_list_item > a, 
    .top_footer .widget_archive ul li.active_list_item > a, 
    .top_footer .widget_pages ul li.active_list_item > a, 
    .top_footer .widget_categories ul li.active_list_item > a, 
    .top_footer .widget_recent_entries ul li.active_list_item > a, 
    .top_footer .widget_meta ul li.active_list_item > a, 
    .top_footer .widget_recent_comments ul li.active_list_item > a, 
    .top_footer .widget_product_categories ul li.active_list_item , 
    .top_footer .widget_archive ul li.active_list_item, 
    .top_footer .widget_pages ul li.active_list_item, 
    .top_footer .widget_categories ul li.active_list_item, 
    .top_footer .widget_recent_entries ul li.active_list_item, 
    .top_footer .widget_meta ul li.active_list_item, 
    .top_footer .widget_recent_comments ul li.active_list_item,
    .top_footer .about_info p > a, 
    .top_footer .about_info p > a:hover,
    .top_footer .calendar_wrap table tfoot td a:hover,
    .top_footer .calendar_wrap caption,
    .top_footer .main_footer .calendar_wrap table thead th,
    .top_footer .widget_rss ul li .rsswidget
    {
    	color: '.esc_attr($footer_heading_color).' ;
    }
    .top_footer,
    .top_footer .calendar_wrap table tfoot td a,
    .top_footer .main_footer .widget_nav_menu ul li a{
    	color: '.esc_attr($footer_text_color).';
    }';

    $copyright_text_color = oswald_option_compare('copyright_text_color','mb_footer_switch','yes');
    $custom_css .= '.main_footer .copyright{
    	color: '.esc_attr($copyright_text_color).';
    }';

    $copyright_heading_color = oswald_option_compare('copyright_heading_color','mb_footer_switch','yes');
    $custom_css .= '
    .main_footer .copyright .widget-title,
    .main_footer .copyright a,
    .copyright .widget-title,
    .copyright .widget h3.widget-title,
    .copyright strong,
    .copyright a:hover,
    .copyright .widget_nav_menu ul li a:hover{
    	color: '.esc_attr($copyright_heading_color).';
    }';

    $header_on_bg = '';



    if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0) {

	    if (rwmb_meta('mb_header_on_bg') == '1') {
	    	$header_on_bg = rwmb_meta('mb_header_on_bg');    	
	    	
	    	if ($header_on_bg == '1') {

    		/////////////////////////
	    	$side_top_background_mobile = $side_middle_background_mobile = $side_bottom_background_mobile = $side_top_color_mobile = $side_middle_color_mobile = $side_bottom_color_mobile = '';

	        $mb_customize_top_header_layout_mobile = rwmb_meta('mb_customize_top_header_layout_mobile'); 
	        $mb_customize_middle_header_layout_mobile = rwmb_meta('mb_customize_middle_header_layout_mobile'); 
	        $mb_customize_bottom_header_layout_mobile = rwmb_meta('mb_customize_bottom_header_layout_mobile'); 



	        if ($mb_customize_top_header_layout_mobile == 'custom') {
	        	//top
				$mb_top_header_background_mobile = rwmb_meta('mb_top_header_background_mobile');
	            $mb_top_header_background_opacity_mobile = rwmb_meta('mb_top_header_background_opacity_mobile');
	            $side_top_color_mobile = rwmb_meta('mb_top_header_color_mobile');
            
	            if (!empty($mb_top_header_background_mobile)) {
	                $side_top_background_mobile = 'rgba('.(oswald_HexToRGB($mb_top_header_background_mobile)).','.$mb_top_header_background_opacity_mobile.')';
	            }else{
	                $side_top_background_mobile = '';
	            }
	        }

	        if ($mb_customize_middle_header_layout_mobile == 'custom') {
	        	//middle
				$mb_middle_header_background_mobile = rwmb_meta('mb_middle_header_background_mobile');
	            $mb_middle_header_background_opacity_mobile = rwmb_meta('mb_middle_header_background_opacity_mobile');
	            $side_middle_color_mobile = rwmb_meta('mb_middle_header_color_mobile');
          
	            if (!empty($mb_middle_header_background_mobile)) {
	                $side_middle_background_mobile = 'rgba('.(oswald_HexToRGB($mb_middle_header_background_mobile)).','.$mb_middle_header_background_opacity_mobile.')';
	            }else{
	                $side_middle_background_mobile = '';
	            }
	        }

	        if ($mb_customize_bottom_header_layout_mobile == 'custom') {
	        	//bottom
				$mb_bottom_header_background_mobile = rwmb_meta('mb_bottom_header_background_mobile');
	            $mb_bottom_header_background_opacity_mobile = rwmb_meta('mb_bottom_header_background_opacity_mobile');
	            $side_bottom_color_mobile = rwmb_meta('mb_bottom_header_color_mobile');
          
	            if (!empty($mb_bottom_header_background_mobile)) {
	                $side_bottom_background_mobile = 'rgba('.(oswald_HexToRGB($mb_bottom_header_background_mobile)).','.$mb_bottom_header_background_opacity_mobile.')';
	            }else{
	                $side_bottom_background_mobile = '';
	            }
	        }

	    	}

	    }
	}

	$logo_limit_on_mobile = oswald_option("logo_limit_on_mobile");

	if ($logo_limit_on_mobile == '1') {
		$logo_mobile_width = oswald_option("logo_mobile_width");
		if (!empty($logo_mobile_width['width'])) {
			$custom_css .= '@media only screen and (max-width: 767px){
				.header_side_container .logo_container:not(.logo_mobile_not_limited){
					max-width: '.(int)$logo_mobile_width['width'].'px;
				}
			}';
		}
	}

    if ($header_on_bg == '1') {

    	$custom_css .= '@media only screen and (max-width: 767px){
    		.wpd_header_builder__section--top{
    			background-color: '.esc_attr($side_top_background_mobile).' !important;
		    	color: '.esc_attr($side_top_color_mobile).' !important;
    		}
    		.wpd_header_builder__section--middle{
    			background-color: '.esc_attr($side_middle_background_mobile).' !important;
		    	color: '.esc_attr($side_middle_color_mobile).' !important;
    		}
    		.wpd_header_builder__section--bottom{
    			background-color: '.esc_attr($side_bottom_background_mobile).' !important;
		    	color: '.esc_attr($side_bottom_color_mobile).' !important;
    		}
		}
	    ';
    }

    if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0) {
        $mb_header_presets = rwmb_meta('mb_header_presets');            
        if ($mb_header_presets != 'default' && !empty($mb_header_presets) ) {
            $presets = oswald_header_presets ();
            $preset = json_decode($presets[$mb_header_presets],true); 
            $side_top_background = oswald_option_presets($preset,'side_top_background');
			$side_top_background = $side_top_background['rgba'];
			$side_top_color = oswald_option_presets($preset,'side_top_color');
			$side_top_height = oswald_option_presets($preset,'side_top_height');
			$side_top_height = $side_top_height['height'];

			$side_middle_background = oswald_option_presets($preset,'side_middle_background');
			$side_middle_background = $side_middle_background['rgba'];
			$side_middle_color = oswald_option_presets($preset,'side_middle_color');
			$side_middle_height = oswald_option_presets($preset,'side_middle_height');
			$side_middle_height = $side_middle_height['height'];

			$side_bottom_background = oswald_option_presets($preset,'side_bottom_background');
			$side_bottom_background = $side_bottom_background['rgba'];
			$side_bottom_color = oswald_option_presets($preset,'side_bottom_color');
			$side_bottom_height = oswald_option_presets($preset,'side_bottom_height');
			$side_bottom_height = $side_bottom_height['height'];    

			$side_top_border = (bool)oswald_option_presets($preset,"side_top_border");
			$side_top_border_color = oswald_option_presets($preset,"side_top_border_color");
			$side_middle_border = (bool)oswald_option_presets($preset,"side_middle_border");
			$side_middle_border_color = oswald_option_presets($preset,"side_middle_border_color");		    
		    $side_bottom_border = (bool)oswald_option_presets($preset,"side_bottom_border");
		    $side_bottom_border_color = oswald_option_presets($preset,"side_bottom_border_color");

		    $header_sticky = oswald_option_presets($preset,"header_sticky");
		    $side_top_sticky = oswald_option_presets($preset,'side_top_sticky');
			$side_top_background_sticky = oswald_option_presets($preset,'side_top_background_sticky');
			$side_top_color_sticky = oswald_option_presets($preset,'side_top_color_sticky');
			$side_top_height_sticky = oswald_option_presets($preset,'side_top_height_sticky');

			$side_middle_sticky = oswald_option_presets($preset,'side_middle_sticky');
			$side_middle_background_sticky = oswald_option_presets($preset,'side_middle_background_sticky');
			$side_middle_color_sticky = oswald_option_presets($preset,'side_middle_color_sticky');
			$side_middle_height_sticky = oswald_option_presets($preset,'side_middle_height_sticky');

			$side_bottom_sticky = oswald_option_presets($preset,'side_bottom_sticky');
			$side_bottom_background_sticky = oswald_option_presets($preset,'side_bottom_background_sticky');
			$side_bottom_color_sticky = oswald_option_presets($preset,'side_bottom_color_sticky');
			$side_bottom_height_sticky = oswald_option_presets($preset,'side_bottom_height_sticky');
        }

        $mb_customize_header_layout = rwmb_meta('mb_customize_header_layout'); 
        if ($mb_customize_header_layout == 'custom') {
	        $mb_customize_top_header_layout = rwmb_meta('mb_customize_top_header_layout'); 
	        $mb_customize_middle_header_layout = rwmb_meta('mb_customize_middle_header_layout'); 
	        $mb_customize_bottom_header_layout = rwmb_meta('mb_customize_bottom_header_layout'); 

	        if ($mb_customize_top_header_layout == 'custom') {
	        	//top
				$mb_top_header_background = rwmb_meta('mb_top_header_background');
	            $mb_top_header_background_opacity = rwmb_meta('mb_top_header_background_opacity');
	            $side_top_color = rwmb_meta('mb_top_header_color');
	            $side_top_color_hover = rwmb_meta('mb_top_header_color_hover');
	            $side_top_border = rwmb_meta('mb_top_header_bottom_border');
	            $mb_header_top_bottom_border_color = rwmb_meta('mb_header_top_bottom_border_color');
	            $mb_header_top_bottom_border_color_opacity = rwmb_meta('mb_header_top_bottom_border_color_opacity');

	            if (!empty($mb_header_top_bottom_border_color)) {
	                $side_top_border_color['rgba'] = 'rgba('.(oswald_HexToRGB($mb_header_top_bottom_border_color)).','.$mb_header_top_bottom_border_color_opacity.')';
	            }else{
	                $side_top_border_color['rgba'] = '';
	            }            
	            if (!empty($mb_top_header_background)) {
	                $side_top_background = 'rgba('.(oswald_HexToRGB($mb_top_header_background)).','.$mb_top_header_background_opacity.')';
	            }else{
	                $side_top_background = '';
	            }
	        }

	        if ($mb_customize_middle_header_layout == 'custom') {
	        	//middle
				$mb_middle_header_background = rwmb_meta('mb_middle_header_background');
	            $mb_middle_header_background_opacity = rwmb_meta('mb_middle_header_background_opacity');
	            $side_middle_color = rwmb_meta('mb_middle_header_color');
	            $side_middle_color_hover = rwmb_meta('mb_middle_header_color_hover');
	            $side_middle_border = rwmb_meta('mb_middle_header_bottom_border');
	            $mb_header_middle_bottom_border_color = rwmb_meta('mb_header_middle_bottom_border_color');
	            $mb_header_middle_bottom_border_color_opacity = rwmb_meta('mb_header_middle_bottom_border_color_opacity');

	            if (!empty($mb_header_middle_bottom_border_color)) {
	                $side_middle_border_color['rgba'] = 'rgba('.(oswald_HexToRGB($mb_header_middle_bottom_border_color)).','.$mb_header_middle_bottom_border_color_opacity.')';
	            }else{
	                $side_middle_border_color['rgba'] = '';
	            }            
	            if (!empty($mb_middle_header_background)) {
	                $side_middle_background = 'rgba('.(oswald_HexToRGB($mb_middle_header_background)).','.$mb_middle_header_background_opacity.')';
	            }else{
	                $side_middle_background = '';
	            }
	        }

	        if ($mb_customize_bottom_header_layout == 'custom') {
	        	//bottom
				$mb_bottom_header_background = rwmb_meta('mb_bottom_header_background');
	            $mb_bottom_header_background_opacity = rwmb_meta('mb_bottom_header_background_opacity');
	            $side_bottom_color = rwmb_meta('mb_bottom_header_color');
	            $side_bottom_color_hover = rwmb_meta('mb_side_bottom_color_hover');
	            $side_bottom_border = rwmb_meta('mb_bottom_header_bottom_border');
	            $mb_header_bottom_bottom_border_color = rwmb_meta('mb_header_bottom_bottom_border_color');
	            $mb_header_bottom_bottom_border_color_opacity = rwmb_meta('mb_header_bottom_bottom_border_color_opacity');

	            if (!empty($mb_header_bottom_bottom_border_color)) {
	                $side_bottom_border_color['rgba'] = 'rgba('.(oswald_HexToRGB($mb_header_bottom_bottom_border_color)).','.$mb_header_bottom_bottom_border_color_opacity.')';
	            }else{
	                $side_bottom_border_color['rgba'] = '';
	            }            
	            if (!empty($mb_bottom_header_background)) {
	                $side_bottom_background = 'rgba('.(oswald_HexToRGB($mb_bottom_header_background)).','.$mb_bottom_header_background_opacity.')';
	            }else{
	                $side_bottom_background = '';
	            }
	        }
	    }


    }
    $custom_css .= '
    .wpd_header_builder__section--top{
    	background-color:'.esc_attr($side_top_background).';
    	color:'.esc_attr($side_top_color).';
    	height:'.(int)$side_top_height.'px;
    }
    .wpd_header_builder__section--top .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown .wpml-ls-sub-menu, 
    .wpd_header_builder__section--top .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown-click .wpml-ls-sub-menu{
    	background-color:'.esc_attr($side_top_background).';
    }
    .wpd_header_builder__section--top .wpd_header_builder_button_component a,
    .wpd_header_builder__section--top .wpd_header_builder_button_component a .wpd_btn_icon{
    	color:'.esc_attr($side_top_color).' !important;
    }
    .wpd_header_builder__section--top a:hover,
    .wpd_header_builder__section--top .current-menu-item a,
    .wpd_header_builder__section--top .current-menu-ancestor > a,
    .wpd_header_builder__section--top .main-menu ul li ul .menu-item.current-menu-item > a,
    .wpd_header_builder__section--top .main-menu ul li ul .menu-item.current-menu-ancestor > a,
    .wpd_header_builder__section--top .main-menu ul li ul .menu-item > a:hover,
    .wpd_header_builder__section--top .main-menu .menu-item:hover > a,
    .wpd_header_builder__section--top .wpd_header_builder_login_component:hover .wpd_login__user_name,
    .wpd_header_builder__section--top .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown a:hover, 
    .wpd_header_builder__section--top .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown a:focus, 
    .wpd_header_builder__section--top .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown .wpml-ls-current-language:hover > a, 
    .wpd_header_builder__section--top .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown-click a:hover, 
    .wpd_header_builder__section--top .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown-click a:focus, 
    .wpd_header_builder__section--top .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown-click .wpml-ls-current-language:hover > a{
    	color:'.esc_attr($side_top_color_hover).';
    }
    .wpd_header_builder__section--top .wpd_header_builder_button_component a{
    	border-color:'.esc_attr($side_top_color_hover).';
    }
    .wpd_header_builder__section--top .wpd_header_builder_button_component a:hover{
    	background-color:'.esc_attr($side_top_color_hover).' !important;
    }
    .wpd_header_builder__section--top .wpd_header_builder__section-container{
    	height:'.(int)$side_top_height.'px;
    }
    .wpd_header_builder__section--middle{
    	background-color:'.esc_attr($side_middle_background).';
    	color:'.esc_attr($side_middle_color).';
    }
    .wpd_header_builder__section--middle .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown .wpml-ls-sub-menu, 
    .wpd_header_builder__section--middle .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown-click .wpml-ls-sub-menu{
    	background-color:'.esc_attr($side_middle_background).';
    }
    .wpd_header_builder__section--middle .wpd_header_builder_button_component a,
    .wpd_header_builder__section--middle .wpd_header_builder_button_component a .wpd_btn_icon{
    	color:'.esc_attr($side_middle_color).' !important;
    }
    .wpd_header_builder__section--middle a:hover,
    .wpd_header_builder__section--middle .menu-item.active_item > a,
    .wpd_header_builder__section--middle .current-menu-item a,
    .wpd_header_builder__section--middle .current-menu-ancestor > a,
    .wpd_header_builder__section--middle .wpd_header_builder_login_component:hover .wpd_login__user_name,
    .wpd_header_builder__section--middle .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown a:hover, 
    .wpd_header_builder__section--middle .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown a:focus, 
    .wpd_header_builder__section--middle .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown .wpml-ls-current-language:hover > a, 
    .wpd_header_builder__section--middle .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown-click a:hover, 
    .wpd_header_builder__section--middle .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown-click a:focus, 
    .wpd_header_builder__section--middle .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown-click .wpml-ls-current-language:hover > a{
    	color:'.esc_attr($side_middle_color_hover).';
    }
    .wpd_header_builder__section--middle .wpd_header_builder_button_component a{
    	border-color:'.esc_attr($side_middle_color_hover).';
    }
    .wpd_header_builder__section--middle .wpd_header_builder_button_component a:hover{
    	background-color:'.esc_attr($side_middle_color_hover).' !important;
    }
    .wpd_header_builder__section--middle .wpd_header_builder__section-container{
    	height:'.(int)$side_middle_height.'px;
    }
    .wpd_header_builder__section--bottom{
    	background-color:'.esc_attr($side_bottom_background).';
    	color:'.esc_attr($side_bottom_color).';
    }
    .wpd_header_builder__section--bottom .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown .wpml-ls-sub-menu, 
    .wpd_header_builder__section--bottom .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown-click .wpml-ls-sub-menu{
    	background-color:'.esc_attr($side_bottom_background).';
    }
    .wpd_header_builder__section--bottom .wpd_header_builder_button_component a,
    .wpd_header_builder__section--bottom .wpd_header_builder_button_component a .wpd_btn_icon{
    	color:'.esc_attr($side_bottom_color).' !important;
    }
    .wpd_header_builder__section--bottom a:hover,
    .wpd_header_builder__section--bottom .current-menu-item a,
    .wpd_header_builder__section--bottom .current-menu-ancestor > a,
    .wpd_header_builder__section--bottom .main-menu ul li ul .menu-item.current-menu-item > a,
    .wpd_header_builder__section--bottom .main-menu ul li ul .menu-item.current-menu-ancestor > a,
    .wpd_header_builder__section--bottom .main-menu ul li ul .menu-item > a:hover,
    .wpd_header_builder__section--bottom .main-menu .menu-item:hover > a,
    .wpd_header_builder__section--bottom .wpd_header_builder_login_component:hover .wpd_login__user_name,
    .wpd_header_builder__section--bottom .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown a:hover, 
    .wpd_header_builder__section--bottom .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown a:focus, 
    .wpd_header_builder__section--bottom .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown .wpml-ls-current-language:hover > a, 
    .wpd_header_builder__section--bottom .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown-click a:hover, 
    .wpd_header_builder__section--bottom .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown-click a:focus, 
    .wpd_header_builder__section--bottom .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown-click .wpml-ls-current-language:hover > a{
    	color:'.esc_attr($side_bottom_color_hover).';
    }
    .wpd_header_builder__section--bottom .wpd_header_builder_button_component a{
    	border-color:'.esc_attr($side_bottom_color_hover).';
    }
    .wpd_header_builder__section--bottom .wpd_header_builder_button_component a:hover{
    	background-color:'.esc_attr($side_bottom_color_hover).' !important;
    }
    .wpd_header_builder__section--bottom .wpd_header_builder__section-container{
    	height:'.(int)$side_bottom_height.'px;
    }
    ';

    if ($side_top_border) {
    	if (!empty($side_top_border_color['rgba'])) {
    		$custom_css .= '
		    .wpd_header_builder__section--top{
		    	border-bottom: 1px solid '.esc_attr($side_top_border_color['rgba']).';
		    }';
    	}
    }

    if ($side_middle_border) {
    	if (!empty($side_middle_border_color['rgba'])) {
    		$custom_css .= '
		    .wpd_header_builder__section--middle{
		    	border-bottom: 1px solid '.esc_attr($side_middle_border_color['rgba']).';
		    }';
    	}
    }

    if ($side_bottom_border) {
    	if (!empty($side_bottom_border_color['rgba'])) {
    		$custom_css .= '
		    .wpd_header_builder__section--bottom{
		    	border-bottom: 1px solid '.esc_attr($side_bottom_border_color['rgba']).';
		    }';
    	}
    }

    if ((bool)$header_sticky) {

    	if ((bool)$side_top_sticky) {
			$side_top_background_sticky = $side_top_background_sticky['rgba'];
			$side_top_height_sticky = $side_top_height_sticky['height'];
			$custom_css .= '
		    .sticky_header .wpd_header_builder__section--top{
		    	background-color:'.esc_attr($side_top_background_sticky).';
		    	color:'.esc_attr($side_top_color_sticky).';
		    }
		    .sticky_header .wpd_header_builder__section--top .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown .wpml-ls-sub-menu, 
		    .sticky_header .wpd_header_builder__section--top .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown-click .wpml-ls-sub-menu{
		    	background-color:'.esc_attr($side_top_background_sticky).';
		    }
		    .sticky_header .wpd_header_builder__section--top .wpd_header_builder__section-container{
		    	height:'.(int)$side_top_height_sticky.'px;
		    }';
    	}
    	
    	if ((bool)$side_middle_sticky) {
			$side_middle_background_sticky = $side_middle_background_sticky['rgba'];
			$side_middle_height_sticky = $side_middle_height_sticky['height'];
			$custom_css .= '
		    .sticky_header .wpd_header_builder__section--middle{
		    	background-color:'.esc_attr($side_middle_background_sticky).';
		    	color:'.esc_attr($side_middle_color_sticky).';
		    }
		    .sticky_header .wpd_header_builder__section--middle .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown .wpml-ls-sub-menu, 
		    .sticky_header .wpd_header_builder__section--middle .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown-click .wpml-ls-sub-menu{
		    	background-color:'.esc_attr($side_middle_background_sticky).';
		    }
		    .sticky_header .wpd_header_builder__section--middle .wpd_header_builder__section-container{
		    	height:'.(int)$side_middle_height_sticky.'px;
		    }';
    	}		

    	if ((bool)$side_bottom_sticky) {
			$side_bottom_background_sticky = $side_bottom_background_sticky['rgba'];
			$side_bottom_height_sticky = $side_bottom_height_sticky['height'];
			$custom_css .= '
		    .sticky_header .wpd_header_builder__section--bottom{
		    	background-color:'.esc_attr($side_bottom_background_sticky).';
		    	color:'.esc_attr($side_bottom_color_sticky).';
		    }
		    .sticky_header .wpd_header_builder__section--bottom .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown .wpml-ls-sub-menu, 
		    .sticky_header .wpd_header_builder__section--bottom .wpd_header_builder_wpml_component .wpml-ls-legacy-dropdown-click .wpml-ls-sub-menu{
		    	background-color:'.esc_attr($side_bottom_background_sticky).';
		    }
		    .sticky_header .wpd_header_builder__section--bottom .wpd_header_builder__section-container{
		    	height:'.(int)$side_bottom_height_sticky.'px;
		    }';
    	}
    }

	/* Woocommerce */
	$custom_css .= '
	.woocommerce ul.products li.product h3,
	.woocommerce form .qty,
	.woocommerce form .variations select {
		font-family:' . $content_font_family . ';
	}
	.woocommerce .wishlist_table td.product-add-to-cart a {
		border-color: '.$theme_color.';
		background: '.$theme_color.';
	}
	.woocommerce .wishlist_table td.product-add-to-cart a:hover,
	.woocommerce .widget_shopping_cart .buttons a:hover,
	.woocommerce.widget_shopping_cart .buttons a:hover,
	.wpd_header_builder_cart_component .button:hover,
	.wpd_woo_login_switcher__link{
		color:'.$theme_color.';
	}
	.woocommerce ul.products li.product .price del .amount,
	.woocommerce ul.products li.product .price del,
	.widget.woocommerce ul.yith-wcan-list.yith-wcan li .count,
	.woocommerce .woocommerce-widget-layered-nav-list li.woocommerce-widget-layered-nav-list__item .count {
		color:'.$theme_adding_color.';
	}
	.woocommerce .widget_shopping_cart .total,
	.woocommerce.widget_shopping_cart .total {
		color: '.$header_font_color.';
	}
	.wpd_header_builder_cart_component.woocommerce .woo_icon .woo_mini-count span {
		background-color: '.$theme_color2.';
	}
	ul.pagerblock li a:hover,
    .woocommerce nav.woocommerce-pagination ul li a:focus,
    .woocommerce nav.woocommerce-pagination ul li a:hover,
    .woocommerce-Tabs-panel h2,
    .woocommerce-Tabs-panel h2 span,
    .woocommerce ul.product_list_widget li .wpd-widget-product-wrapper .product-title,
    .woocommerce-cart .cart_totals h2,
    .woocommerce-checkout h3,
    .woocommerce-checkout h3 span,
    .wpd-shop-product .wpd-product-title,
    fieldset legend {
    	font-family:' . $content_font_family . ' !important;
    }
    .easyzoom-flyout {
    	background:' . $bg_body . ';
    }
    .wpd-category-item__title,
    .woocommerce ul.products li.product .onsale,
    .wpd-template_div_product_links_wrap a,
    .woocommerce span.onsale {
    	font-family: ' . $header_font_family . ';
    }
    .yith-wcwl-add-button .add_to_wishlist,
    .woocommerce-cart .cart_totals table.shop_table .shipping-calculator-button,
    .main_wrapper .image_size_popup_button,
    .woocommerce .widget_layered_nav ul li.chosen a,
  	body public-modal .public-hotspot-info-holder .public-hotspot-info .public-hotspot-info__btn-buy.snpt-cta-btn:hover>span,
	.product_share > a {
    	color: '.$theme_color2.';
    }
    .widget.widget_product_categories ul li > a:hover,
    .widget.widget_product_categories ul li.current-cat > a,
    .widget.widget_product_categories ul.children li>a:hover {
    	color: '.$theme_color.';
    }
    .woocommerce #reviews .comment-reply-title,
    .woocommerce ul.product_list_widget li .wpd-widget-product-wrapper .product-title,
    .woocommerce ul.product_list_widget li .wpd-widget-product-wrapper ins,
    .widget.widget_product_categories ul li:before,
    .woocommerce table.shop_table thead th,
    .woocommerce table.shop_table td,
    .woocommerce-cart .cart_totals h2,
    .woocommerce-checkout h3,
    .woocommerce-checkout h3 span,
    .woocommerce table.woocommerce-checkout-review-order-table tfoot th,
    #add_payment_method #payment label,
	.woocommerce-cart #payment label,
	.woocommerce-checkout #payment label,
    .woocommerce div.product .wpd-product_info-wrapper span.price ins {
    	color: '.$header_font_color.';
    }
    .widget.widget_product_categories ul li > a,
    .woocommerce ul.product_list_widget li .wpd-widget-product-wrapper ins .woocommerce-Price-amount,
    .woocommerce div.product p.price,
    .woocommerce ul.products li.product .price,
    #yith-quick-view-content .product_meta a,
	#yith-quick-view-content .product_meta .sku,
	.single-product.woocommerce div.product .product_meta a,
	.single-product.woocommerce div.product .product_meta .sku,
	.product .tawcvs-swatches .swatch.swatch-label {
    	color: '.$content_color.';
    }
    .wpd-category-item__title {
    	color: '.$header_font_color.' !important;
    }
    .woocommerce #reviews a.button,
	.woocommerce #reviews button.button,
	.woocommerce #reviews input.button,
	body.woocommerce a.button,
	#yith-quick-view-close:after,
	#yith-quick-view-close:before,
	#yith-quick-view-content .slick-prev,
	#yith-quick-view-content .slick-next,
	.image_size_popup .close:hover:before,
	.image_size_popup .close:hover:after,
	.cross-sells .slick-prev,
	.cross-sells .slick-next,
	.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
	.woocommerce #respond input#submit.alt:hover,
	.woocommerce button.button.alt:hover,
	.woocommerce input.button.alt:hover,
	.woocommerce-info,
	.woocommerce-message {
		background-color: '.$theme_color.';
	}
	.single-product.woocommerce div.product .product_meta a:hover {
		color: '.$theme_color.';
	}
	.woocommerce a.button,
	.woocommerce #respond input#submit.alt,
	.woocommerce button.button.alt,
	.woocommerce input.button.alt,
	.woocommerce #respond input#submit,
	.woocommerce button.button,
	.woocommerce input.button,
	.woocommerce .widget_layered_nav ul.yith-wcan-label li a:hover,
	.woocommerce-page .widget_layered_nav ul.yith-wcan-label li a:hover,
	.woocommerce .widget_layered_nav ul.yith-wcan-label li.chosen a,
	.woocommerce-page .widget_layered_nav ul.yith-wcan-label li.chosen a{
		background-color: '.$theme_color.';
		border-color: '.$theme_color.';
	}
	.woocommerce a.button:hover,
	.woocommerce .widget_price_filter .price_slider_amount .button:hover,
	.wpd-woo-filter .product-filter.active,
	.wpd-woo-filter .product-filter:hover,
	#yith-quick-view-modal .woocommerce div.product p.price ins,
	.woocommerce div.product .wpd-product_info-wrapper span.price ins,
	#yith-quick-view-content .product_meta,
	.woocommerce div.product .wpd-single-product-sticky .woocommerce-tabs ul.tabs li.active a,
	.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
	.woocommerce #respond input#submit:hover,
	.woocommerce #respond input#submit.alt,
	.widget_product_search .woocommerce-product-search:before,
	body div[id*="ajaxsearchlitesettings"].searchsettings .label,
	.woocommerce .widget_layered_nav ul.yith-wcan-label li a,
	.woocommerce-page .widget_layered_nav ul.yith-wcan-label li a,
	.woocommerce .widget_layered_nav ul.yith-wcan-label li span,
	.woocommerce-page .widget_layered_nav ul.yith-wcan-label li span,
	.wpd_social_links .wpd_social_icon span,
	.woocommerce ul.product_list_widget li .wpd-widget-product-wrapper a:hover .product-title {
		color: '.$theme_color.';
	}
	.woocommerce .widget_price_filter .ui-slider .ui-slider-handle {
		'.(!empty($bg_body) ? 'background-color:'.$bg_body.';' : '').'
	}
	.woocommerce button.button.alt.disabled,
	.woocommerce button.button.alt.disabled:hover,
	.yith-wcwl-add-button:hover,
	body public-modal .public-hotspot-info-holder .public-hotspot-info .public-hotspot-info__btn-buy.snpt-cta-btn,
	.no-touch body .snpt-pict-item:hover .widget-hotspot,
	.no-touch body .snptwdgt__item:hover .widget-hotspot {
		background-color: '.$theme_color2.';
	}
	.woocommerce ul.products li.product .onsale,
	#yith-quick-view-content .onsale,
	.woocommerce span.onsale {
		background-color: '.$theme_color2.';
	}
	.woocommerce ul.products li.product .onsale.new-product,
	#yith-quick-view-content .onsale.new-product,
	.woocommerce span.onsale.new-product,
	.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
	.woocommerce-cart table.cart td.actions>.button:hover {
		background-color: '.$theme_color.';
	}
	.woocommerce-cart table.cart td.actions>.button:hover {
		border-color: '.$theme_color.';
	}
	.woocommerce div.product form.cart .button,
	.yith-wcwl-add-button:hover .add_to_wishlist {
		background-color: '.$theme_color.';
		border-color: '.$theme_color.';
		font-family: ' . $header_font_family . ';
	}
	.woocommerce div.product .woocommerce-tabs ul.tabs li a,
	.woocommerce button.button,
	.woocommerce #respond input#submit,
	.woocommerce button.button,
	.woocommerce input.button,
	.woocommerce .widget_shopping_cart .buttons a,
	.woocommerce.widget_shopping_cart .buttons a,
	.wpd_header_builder_cart_component .buttons .button,
	.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
	.return-to-shop a {
		font-family: ' . $header_font_family . ' !important;
	}
	.woocommerce div.product form.cart .button:hover,
	.yith-wcwl-add-button .add_to_wishlist {
		color: '.$content_color.';
		font-family: ' . $header_font_family . ';
	}
	.yith-wcwl-add-button:hover,
	body public-modal .public-hotspot-info-holder .public-hotspot-info .public-hotspot-info__btn-buy.snpt-cta-btn {
		border-color: '.$theme_color2.';
	}
	body div[id*="ajaxsearchlitesettings"].searchsettings .option label:after{
		-webkit-box-shadow: inset 0px 0px 0px 1px #e4e5de, inset 0px 0px 0px 8px #fff, inset 0px 0px 0px 5px '.$theme_color2.';
		box-shadow: inset 0px 0px 0px 1px #e4e5de, inset 0px 0px 0px 8px #fff, inset 0px 0px 0px 5px '.$theme_color2.';
	}
	body div[id*="ajaxsearchlitesettings"].searchsettings .option input[type=checkbox]:checked + label:after{
		-webkit-box-shadow: inset 0px 0px 0px 1px #e4e5de, inset 0px 0px 0px 5px #fff, inset 0px 0px 0px 8px '.$theme_color2.';
		box-shadow: inset 0px 0px 0px 1px #e4e5de, inset 0px 0px 0px 5px #fff, inset 0px 0px 0px 8px '.$theme_color2.';
	}
	body div[id*="ajaxsearchlitesettings"].searchsettings .option label:hover:after {
		-webkit-box-shadow: inset 0px 0px 0px 1px '.$theme_color2.', inset 0px 0px 0px 8px #fff, inset 0px 0px 0px 8px '.$theme_color2.';
		box-shadow: inset 0px 0px 0px 1px '.$theme_color2.', inset 0px 0px 0px 8px #fff, inset 0px 0px 0px 8px '.$theme_color2.';
	}
	body div[id*="ajaxsearchlitesettings"].searchsettings .option input[type=checkbox]:checked:hover + label:after {
		-webkit-box-shadow: inset 0px 0px 0px 1px #a00, inset 0px 0px 0px 8px #fff, inset 0px 0px 0px 8px '.$theme_color2.';
		box-shadow: inset 0px 0px 0px 1px #a00, inset 0px 0px 0px 8px #fff, inset 0px 0px 0px 8px '.$theme_color2.';
	}
	.yit-wcan-select-open::after{
		border-color: '.$theme_color.' transparent transparent transparent;
	}
	body #ajaxsearchlite1 .probox,
	body div[id*="ajaxsearchlite"] .probox{
		border: 1px solid '.$theme_color2.' !important;
	}
	body div[id*="ajaxsearchlite"] .probox div.prosettings,
	body div[id*="ajaxsearchlite"] .probox .promagnifier,
	body div[id*="ajaxsearchliteres"].vertical{
		background-color: '.$theme_color2.' !important;
	}
	body div[id*="ajaxsearchlite"] .probox div.asl_simple-circle{
		border: 3px solid '.$theme_color2.' !important;
	}
	body div[id*="ajaxsearchlite"] .probox .proclose svg{
		fill: '.$theme_color.' !important;
	}
	.woocommerce a.button[class*="product_type_"],
	.woocommerce a.button.add_to_cart_button {
		background-color: '.$theme_color.';
	}
	.woocommerce-loop-product__link:hover .wpd-product-title,
	.wpd-template_div_product_links_wrap a:hover:after {
		color: '.$theme_color.';
	}
	.woocommerce nav.woocommerce-pagination ul li .current.page-numbers,
	.woocommerce .widget_price_filter .price_slider_wrapper .price_label,
	.product-categories>li.cat-parent .wpd-button-cat-open:before,
	.widget.widget_product_categories ul.children li > a,
	.yith-wcan-select-wrapper ul.yith-wcan-select.yith-wcan li a,
	.woocommerce-page .widget_layered_nav .yith-wcan-select-wrapper ul li a,
	.woocommerce div.product span.price,
	.woocommerce div.product form.cart .variations td,
	.wpd-product-title_quantity,
	.woocommerce div.product form.cart .reset_variations,
	 .wpd_header_builder_cart_component ul.cart_list li .quantity {
		color: '.$theme_adding_color.' ;
	}
	.woocommerce nav.woocommerce-pagination ul li .page-numbers,
	.woocommerce div.product>.woocommerce-tabs .panel table th {
		color: '.$header_font_color.' ;
	}
	.woocommerce nav.woocommerce-pagination ul li a:focus,
	.woocommerce nav.woocommerce-pagination ul li a:hover,
	.yith-wcan-select-wrapper ul.yith-wcan-select.yith-wcan li:hover a,
	.woocommerce-page .widget_layered_nav .yith-wcan-select-wrapper ul li.chosen a {
		color: '.$theme_color.';
	}
	.wpd-products_list_buttons a {
		'.(!empty($bg_body) ? 'background:'.$bg_body.';' : '').'
		color: '.$content_color.';
	}
	.wpd-products_list_buttons a:hover,
	.wpd-products_list_buttons a.button {
		background: '.$theme_color.';
		border-color: '.$theme_color.';
	}
	.wpd-products_list_buttons a.button:hover,
	.woocommerce .widget_price_filter .price_slider_amount .button:hover,
	.woocommerce-error a.button,
	.woocommerce-info a.button,
	.woocommerce-message a.button {
		'.(!empty($bg_body) ? 'background:'.$bg_body.' !important;' : '').'
		color: '.$content_color.' !important;
	}
	.wpd_add_to_wishlist a:hover:after {
		color: '.$theme_color2.';
	}
	body .widget.woocommerce .yith-wcan-label li a,
	body .widget .yit-wcan-select-open,
	.woocommerce .woocommerce-widget-layered-nav-list li a,
	.widget.woocommerce ul.yith-wcan-list.yith-wcan li a,
	.woocommerce .woocommerce-widget-layered-nav-list li.chosen a,
	.widget.woocommerce ul.yith-wcan-list.yith-wcan li.chosen a,
	.woocommerce .widget_layered_nav ul li.chosen a,
	.single-product.woocommerce div.product p.price ins,
	.woocommerce div.product span.price ins,
	.woocommerce div.product form.cart .qty,
	.woocommerce div.product .woocommerce-tabs ul.tabs li a,
	.woocommerce div.product>.woocommerce-tabs ul.tabs li.active a,
	.woocommerce div.product>.woocommerce-tabs ul.tabs li.active a:hover,
	.woocommerce-cart table.cart td.actions > .button,
	.woocommerce-cart .shipping-calculator-form .button {
		color: '.$content_color.' !important;
	}
	.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
	.woocommerce-cart-form .product-name a:hover,
	.woocommerce-MyAccount-navigation ul li a:hover {
		color: '.$theme_color.' !important;
	}
	.woocommerce .widget_layered_nav ul li a:hover:before,
	.woocommerce .widget_layered_nav_filters ul li a:hover:before,
	.woocommerce .widget_layered_nav ul li.chosen a:before,
	.woocommerce .widget_layered_nav_filters ul li.chosen a:before,
	.widget.woocommerce ul.yith-wcan-list.yith-wcan li a:hover:before,
	.widget.woocommerce ul.yith-wcan-list.yith-wcan li.chosen a:before,
	.woocommerce .widget_shopping_cart .buttons a,
	.woocommerce.widget_shopping_cart .buttons a,
	.wpd_header_builder_cart_component .buttons .button,
	.woocommerce-cart .shipping-calculator-form .button:hover {
		background: '.$theme_color.';
		border-color: '.$theme_color.';
	}
	.woocommerce #respond input#submit:hover,
	.woocommerce button.button:hover,
	.woocommerce input.button:hover,
	.woocommerce #reviews #comments ol.commentlist li .comment-text p.meta .woocommerce-review__author,
	.woocommerce-cart-form .product-name a,
	.woocommerce-MyAccount-navigation ul li a,
	.tparrows.custom:hover:after {
		color: '.$content_color.';
	}

	.wpd_header_builder_cart_component .button:hover,
	.wpd_header_builder_cart_component .buttons .button.checkout,
	.woocommerce-cart .cart_totals table.shop_table tr th,
	.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,
	.return-to-shop a:hover {
		color: '.$content_color.' !important;
	}

	.wpd_header_builder_cart_component .buttons .button.checkout:hover {
		background: '.$theme_color.' !important;
		border-color: '.$theme_color.' !important;
	}

	';
	/* ! Woocommerce */

    $custom_user_css = oswald_option("custom_css");
    $custom_css .= isset($custom_user_css) ? '/* Custom Css */'.$custom_user_css : '';

	$custom_css = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $custom_css);
	wp_add_inline_style( 'oswald_theme_css', $custom_css );
}
