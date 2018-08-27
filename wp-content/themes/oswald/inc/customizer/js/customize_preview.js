(function($) { 
"use strict"; 
/**
 * Customizer controls
 */

 	// Custom Colors
	function oswald_custom_color(){
		jQuery('.wpd_custom_color').each(function(){
			var element = jQuery(this);
			var color = element.attr('data-color')
			var hover_color = element.attr('data-hover-color')
			var bg_color = element.attr('data-bg-color')
			var border_color = element.attr('data-border-color')
			var bg_hover_color = element.attr('data-hover-bg-color')
			var border_hover_color = element.attr('data-hover-border-color')

			//set default colors
			if(typeof color !== 'undefined') {
				element.css({'color' : color});
			} else {
				element.css({'color' : ''});
			}
			if (typeof bg_color !== 'undefined') {
				element.css({'background-color' : bg_color});
			}else {
				element.css({'background-color' : ''});
			}

			if (typeof border_color !== 'undefined') {
				element.css({'border-color' : border_color});
			}else {
				element.css({'border-color' : ''});
			}

			//change colors on mouseenter / mouseleave
			element.mouseenter(function(){
				// Button Hover Text Color
				if(typeof hover_color !== 'undefined') {
					element.css({'color' : hover_color});				
				}
				if (typeof bg_hover_color !== 'undefined') {
					element.css({'background-color' : bg_hover_color});
				}
				if (typeof border_hover_color !== 'undefined') {
					element.css({'border-color' : border_hover_color});
				}
			}).mouseleave(function(){
				// Button Default Text Color
				if(typeof color !== 'undefined') {
					element.css({'color' : color});
				} else {
					element.css({'color' : ''});
				}
				if (typeof bg_color !== 'undefined') {
					element.css({'background-color' : bg_color});
				}else {
					element.css({'background-color' : ''});
				}
				if (typeof border_color !== 'undefined') {
					element.css({'border-color' : border_color});
				}else {
					element.css({'border-color' : ''});
				}
			});		
		})
	}

 	wp.customize(
		'blogname', function( value ) {
			value.bind(
				function( to ) {
					$( '.logo_container .site-title' ).text( to );
				}
			);
		}
	);


	wp.customize(
		'blogdescription', function( value ) {
			value.bind(
				function( to ) {
					$( '.logo_container .site-description' ).text( to );
				}
			);
		}
	);


	/* subtitle */
	wp.customize(
		'oswald[about_pre_title]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_about .wpd_secondary_font' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_about .wpd_secondary_font' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_about .wpd_secondary_font' ).html( to );
				}
			);
		}
	);

	/* title */
	wp.customize(
		'oswald[about_title]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_about .wpd_about_title' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_about .wpd_about_title' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_about .wpd_about_title' ).html( to );
				}
			);
		}
	);

	/* text */
	wp.customize(
		'oswald[about_text]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_about .wpd_about_text' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_about .wpd_about_text' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_about .wpd_about_text' ).html( to );
				}
			);
		}
	);

	/* button */
	wp.customize(
		'oswald[about_button_label]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_about .wpd_about_button' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_about .wpd_about_button' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_about .wpd_about_button .wpd_btn_text' ).html( to );
				}
			);
		}
	);

	/* button bg color */
	wp.customize(
		'oswald[about_button_bg_color]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_about .wpd_about_button' ).attr( 'data-bg-color' , to );
						$( '.wpd_section_about .wpd_about_button' ).attr( 'data-border-color' , to );
						
					} else {
						$( '.wpd_section_about .wpd_about_button' ).attr( 'data-bg-color' , 'transparent' );
						$( '.wpd_section_about .wpd_about_button' ).attr( 'data-border-color' , 'transparent' );
					}
					oswald_custom_color();
				}
			);
		}
	);
	/* button color */
	wp.customize(
		'oswald[about_button_color]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_about .wpd_about_button' ).attr( 'data-color' , to );
						
					} else {
						$( '.wpd_section_about .wpd_about_button' ).attr( 'data-color' , 'transparent' );
					}
					oswald_custom_color();
				}
			);
		}
	);

	wp.customize(
		'oswald[about_image]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_about .wpd_about_video_wrapper .wpd_video_image img' ).attr( 'src' , to );
						$( '.wpd_section_about .wpd_about_video_wrapper' ).addClass('.video-popup-wrapper--with_image').removeClass('video-popup-wrapper--without_image')						
					} else {
						$( '.wpd_section_about .wpd_about_video_wrapper .wpd_video_image' ).addClass( 'wpd_empty_img' );
						$( '.wpd_section_about .wpd_about_video_wrapper' ).addClass('video-popup-wrapper--without_image').removeClass('video-popup-wrapper--with_image')
					}
				}
			);
		}
	);


	/* subtitle */
	wp.customize(
		'oswald[services_pre_title]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_services .wpd_secondary_font' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_services .wpd_secondary_font' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_services .wpd_secondary_font' ).html( to );
				}
			);
		}
	);

	/* title */
	wp.customize(
		'oswald[services_title]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_services .wpd_services_title' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_services .wpd_services_title' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_services .wpd_services_title' ).html( to );
				}
			);
		}
	);

	/* text */
	wp.customize(
		'oswald[services_text]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_services .wpd_services_text' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_services .wpd_services_text' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_services .wpd_services_text' ).html( to );
				}
			);
		}
	);

	wp.customize(
		'oswald[service_title_1]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_services .wpd_service_1 .wpd_icon_box__title h3' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_services .wpd_service_1 .wpd_icon_box__title h3' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_services .wpd_service_1 .wpd_icon_box__title h3' ).html( to );
				}
			);
		}
	);

	wp.customize(
		'oswald[service_title_2]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_services .wpd_service_2 .wpd_icon_box__title h3' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_services .wpd_service_2 .wpd_icon_box__title h3' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_services .wpd_service_2 .wpd_icon_box__title h3' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[service_title_3]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_services .wpd_service_3 .wpd_icon_box__title h3' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_services .wpd_service_3 .wpd_icon_box__title h3' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_services .wpd_service_3 .wpd_icon_box__title h3' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[service_title_4]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_services .wpd_service_4 .wpd_icon_box__title h3' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_services .wpd_service_4 .wpd_icon_box__title h3' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_services .wpd_service_4 .wpd_icon_box__title h3' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[service_title_5]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_services .wpd_service_5 .wpd_icon_box__title h3' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_services .wpd_service_5 .wpd_icon_box__title h3' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_services .wpd_service_5 .wpd_icon_box__title h3' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[service_title_6]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_services .wpd_service_6 .wpd_icon_box__title h3' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_services .wpd_service_6 .wpd_icon_box__title h3' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_services .wpd_service_6 .wpd_icon_box__title h3' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[service_text_1]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_services .wpd_service_1 .wpd_icon_box__text' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_services .wpd_service_1 .wpd_icon_box__text' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_services .wpd_service_1 .wpd_icon_box__text' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[service_text_2]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_services .wpd_service_2 .wpd_icon_box__text' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_services .wpd_service_2 .wpd_icon_box__text' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_services .wpd_service_2 .wpd_icon_box__text' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[service_text_3]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_services .wpd_service_3 .wpd_icon_box__text' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_services .wpd_service_3 .wpd_icon_box__text' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_services .wpd_service_3 .wpd_icon_box__text' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[service_text_4]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_services .wpd_service_4 .wpd_icon_box__text' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_services .wpd_service_4 .wpd_icon_box__text' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_services .wpd_service_4 .wpd_icon_box__text' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[service_text_5]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_services .wpd_service_5 .wpd_icon_box__text' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_services .wpd_service_5 .wpd_icon_box__text' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_services .wpd_service_5 .wpd_icon_box__text' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[service_text_6]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_services .wpd_service_6 .wpd_icon_box__text' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_services .wpd_service_6 .wpd_icon_box__text' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_services .wpd_service_6 .wpd_icon_box__text' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[call_to_action_bg_image]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_call_to_action' ).addClass( 'wpd_section_with_image' );
					} else {
						$( '.wpd_section_call_to_action' ).removeClass( 'wpd_section_with_image' );
					}
					$( '.wpd_section_call_to_action' ).css( 'background-image' , "url('"+to+"')" );
				}
			);
		}
	);
	wp.customize(
		'oswald[call_to_action_title]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_call_to_action .wpd_call_to_action_title' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_call_to_action .wpd_call_to_action_title' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_call_to_action .wpd_call_to_action_title' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[call_to_action_text]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_call_to_action .wpd_call_to_action_text' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_call_to_action .wpd_call_to_action_text' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_call_to_action .wpd_call_to_action_text' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[call_to_action_button_label]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_call_to_action .wpd_about_button' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_call_to_action .wpd_about_button' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_call_to_action .wpd_call_to_action_button .wpd_btn_text' ).html( to );
				}
			);
		}
	);
	/* button bg color */
	wp.customize(
		'oswald[call_to_action_button_bg_color]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_call_to_action .wpd_call_to_action_button' ).attr( 'data-bg-color' , to );
						$( '.wpd_section_call_to_action .wpd_call_to_action_button' ).attr( 'data-border-color' , to );
						
					} else {
						$( '.wpd_section_call_to_action .wpd_call_to_action_button' ).attr( 'data-bg-color' , 'transparent' );
						$( '.wpd_section_call_to_action .wpd_call_to_action_button' ).attr( 'data-border-color' , 'transparent' );
					}
					oswald_custom_color();
				}
			);
		}
	);
	/* button color */
	wp.customize(
		'oswald[call_to_action_button_color]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_call_to_action .wpd_call_to_action_button' ).attr( 'data-color' , to );
						
					} else {
						$( '.wpd_section_call_to_action .wpd_call_to_action_button' ).attr( 'data-color' , 'transparent' );
					}
					oswald_custom_color();
				}
			);
		}
	);


	/* team */
	/* subtitle */
	wp.customize(
		'oswald[team_pre_title]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_team .wpd_team_pre_title .wpd_secondary_font' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_team .wpd_team_pre_title .wpd_secondary_font' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_team .wpd_team_pre_title .wpd_secondary_font' ).html( to );
				}
			);
		}
	);

	/* title */
	wp.customize(
		'oswald[team_title]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_team .wpd_team_title' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_team .wpd_team_title' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_team .wpd_team_title' ).html( to );
				}
			);
		}
	);

	/* text */
	wp.customize(
		'oswald[team_text]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_team .wpd_team_text' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_team .wpd_team_text' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_team .wpd_team_text' ).html( to );
				}
			);
		}
	);


	wp.customize(
		'oswald[team_title_1]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_team .wpdaddy_team_list__item--1 .wpdaddy_team_list__title' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_team .wpdaddy_team_list__item--1 .wpdaddy_team_list__title' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_team .wpdaddy_team_list__item--1 .wpdaddy_team_list__title' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[team_title_2]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_team .wpdaddy_team_list__item--2 .wpdaddy_team_list__title' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_team .wpdaddy_team_list__item--2 .wpdaddy_team_list__title' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_team .wpdaddy_team_list__item--2 .wpdaddy_team_list__title' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[team_title_3]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_team .wpdaddy_team_list__item--3 .wpdaddy_team_list__title' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_team .wpdaddy_team_list__item--3 .wpdaddy_team_list__title' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_team .wpdaddy_team_list__item--3 .wpdaddy_team_list__title' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[team_title_4]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_team .wpdaddy_team_list__item--4 .wpdaddy_team_list__title' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_team .wpdaddy_team_list__item--4 .wpdaddy_team_list__title' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_team .wpdaddy_team_list__item--4 .wpdaddy_team_list__title' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[team_title_5]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_team .wpdaddy_team_list__item--5 .wpdaddy_team_list__title' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_team .wpdaddy_team_list__item--5 .wpdaddy_team_list__title' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_team .wpdaddy_team_list__item--5 .wpdaddy_team_list__title' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[team_title_6]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_team .wpdaddy_team_list__item--6 .wpdaddy_team_list__title' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_team .wpdaddy_team_list__item--6 .wpdaddy_team_list__title' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_team .wpdaddy_team_list__item--6 .wpdaddy_team_list__title' ).html( to );
				}
			);
		}
	);

	wp.customize(
		'oswald[team_position_1]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_team .wpdaddy_team_list__item--1 .wpdaddy_team_list__position' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_team .wpdaddy_team_list__item--1 .wpdaddy_team_list__position' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_team .wpdaddy_team_list__item--1 .wpdaddy_team_list__position' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[team_position_2]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_team .wpdaddy_team_list__item--2 .wpdaddy_team_list__position' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_team .wpdaddy_team_list__item--2 .wpdaddy_team_list__position' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_team .wpdaddy_team_list__item--2 .wpdaddy_team_list__position' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[team_position_3]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_team .wpdaddy_team_list__item--3 .wpdaddy_team_list__position' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_team .wpdaddy_team_list__item--3 .wpdaddy_team_list__position' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_team .wpdaddy_team_list__item--3 .wpdaddy_team_list__position' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[team_position_4]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_team .wpdaddy_team_list__item--4 .wpdaddy_team_list__position' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_team .wpdaddy_team_list__item--4 .wpdaddy_team_list__position' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_team .wpdaddy_team_list__item--4 .wpdaddy_team_list__position' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[team_position_5]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_team .wpdaddy_team_list__item--5 .wpdaddy_team_list__position' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_team .wpdaddy_team_list__item--5 .wpdaddy_team_list__position' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_team .wpdaddy_team_list__item--5 .wpdaddy_team_list__position' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[team_position_6]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_team .wpdaddy_team_list__item--6 .wpdaddy_team_list__position' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_team .wpdaddy_team_list__item--6 .wpdaddy_team_list__position' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_team .wpdaddy_team_list__item--6 .wpdaddy_team_list__position' ).html( to );
				}
			);
		}
	);

	wp.customize(
		'oswald[team_social_1]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_team .wpdaddy_team_list__item--1 .wpdaddy_team_list_social' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_team .wpdaddy_team_list__item--1 .wpdaddy_team_list_social' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_team .wpdaddy_team_list__item--1 .wpdaddy_team_list_social' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[team_social_2]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_team .wpdaddy_team_list__item--2 .wpdaddy_team_list_social' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_team .wpdaddy_team_list__item--2 .wpdaddy_team_list_social' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_team .wpdaddy_team_list__item--2 .wpdaddy_team_list_social' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[team_social_3]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_team .wpdaddy_team_list__item--3 .wpdaddy_team_list_social' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_team .wpdaddy_team_list__item--3 .wpdaddy_team_list_social' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_team .wpdaddy_team_list__item--3 .wpdaddy_team_list_social' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[team_social_4]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_team .wpdaddy_team_list__item--4 .wpdaddy_team_list_social' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_team .wpdaddy_team_list__item--4 .wpdaddy_team_list_social' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_team .wpdaddy_team_list__item--4 .wpdaddy_team_list_social' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[team_social_5]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_team .wpdaddy_team_list__item--5 .wpdaddy_team_list_social' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_team .wpdaddy_team_list__item--5 .wpdaddy_team_list_social' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_team .wpdaddy_team_list__item--5 .wpdaddy_team_list_social' ).html( to );
				}
			);
		}
	);
	wp.customize(
		'oswald[team_social_6]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_team .wpdaddy_team_list__item--6 .wpdaddy_team_list_social' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_team .wpdaddy_team_list__item--6 .wpdaddy_team_list_social' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_team .wpdaddy_team_list__item--6 .wpdaddy_team_list_social' ).html( to );
				}
			);
		}
	);


	wp.customize(
		'oswald[testimonial_pre_title]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_testimonial .wpd_testimonial_pre_title .wpd_secondary_font' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_testimonial .wpd_testimonial_pre_title .wpd_secondary_font' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_testimonial .wpd_testimonial_pre_title .wpd_secondary_font' ).html( to );
				}
			);
		}
	);

	wp.customize(
		'oswald[testimonial_title]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_testimonial .wpd_testimonial_title' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_testimonial .wpd_testimonial_title' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_testimonial .wpd_testimonial_title' ).html( to );
				}
			);
		}
	);

	wp.customize(
		'oswald[testimonial_image_1]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_testimonial .testimonials_item_1 .testimonials_photo img' ).attr( 'src' , to );
					}
				}
			);
		}
	);

	wp.customize(
		'oswald[testimonial_name_1]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_testimonial .testimonials_item_1 .testimonials_author_name' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_testimonial .testimonials_item_1 .testimonials_author_name' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_testimonial .testimonials_item_1 .testimonials_author_name' ).html( to );
				}
			);
		}
	);

	wp.customize(
		'oswald[testimonial_text_1]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_testimonial .testimonials_item_1 .testimonials-text' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_testimonial .testimonials_item_1 .testimonials-text' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_testimonial .testimonials_item_1 .testimonials-text' ).html( to );
				}
			);
		}
	);

	wp.customize(
		'oswald[testimonial_position_1]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_testimonial .testimonials_item_1 .testimonials_author_position' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_testimonial .testimonials_item_1 .testimonials_author_position' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_testimonial .testimonials_item_1 .testimonials_author_position' ).html( to );
				}
			);
		}
	);


	wp.customize(
		'oswald[testimonial_image_2]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_testimonial .testimonials_item_2 .testimonials_photo img' ).attr( 'src' , to );
					}
				}
			);
		}
	);

	wp.customize(
		'oswald[testimonial_name_2]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_testimonial .testimonials_item_2 .testimonials_author_name' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_testimonial .testimonials_item_2 .testimonials_author_name' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_testimonial .testimonials_item_2 .testimonials_author_name' ).html( to );
				}
			);
		}
	);

	wp.customize(
		'oswald[testimonial_position_2]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_testimonial .testimonials_item_2 .testimonials_author_position' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_testimonial .testimonials_item_2 .testimonials_author_position' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_testimonial .testimonials_item_2 .testimonials_author_position' ).html( to );
				}
			);
		}
	);

	wp.customize(
		'oswald[testimonial_text_2]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_testimonial .testimonials_item_2 .testimonials-text' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_testimonial .testimonials_item_2 .testimonials-text' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_testimonial .testimonials_item_2 .testimonials-text' ).html( to );
				}
			);
		}
	);


	wp.customize(
		'oswald[homepage_blog_pre_title]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_homepage_blog .wpd_section_homepage_pre_title .wpd_secondary_font' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_homepage_blog .wpd_section_homepage_pre_title .wpd_secondary_font' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_homepage_blog .wpd_section_homepage_pre_title .wpd_secondary_font' ).html( to );
				}
			);
		}
	);

	wp.customize(
		'oswald[homepage_blog_title]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_homepage_blog .wpd_homepage_blog_title' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_homepage_blog .wpd_homepage_blog_title' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_homepage_blog .wpd_homepage_blog_title' ).html( to );
				}
			);
		}
	);

	wp.customize(
		'oswald[homepage_blog_text]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_homepage_blog .wpd_homepage_blog_text' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_homepage_blog .wpd_homepage_blog_text' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_homepage_blog .wpd_homepage_blog_text' ).html( to );
				}
			);
		}
	);  


	wp.customize(
		'oswald[contact_pre_title_left]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_contact .wpd_section_contact_pre_title_left .wpd_secondary_font' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_contact .wpd_section_contact_pre_title_left .wpd_secondary_font' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_contact .wpd_section_contact_pre_title_left .wpd_secondary_font' ).html( to );
				}
			);
		}
	);

	wp.customize(
		'oswald[contact_title_left]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_contact .wpd_contact_title_left' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_contact .wpd_contact_title_left' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_contact .wpd_contact_title_left' ).html( to );
				}
			);
		}
	);

	wp.customize(
		'oswald[contact_text_left]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_contact .wpd_contact_text_left' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_contact .wpd_contact_text_left' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_contact .wpd_contact_text_left' ).html( to );
				}
			);
		}
	);

	wp.customize(
		'oswald[contact_pre_title_right]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_contact .wpd_section_contact_pre_title_right .wpd_secondary_font' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_contact .wpd_section_contact_pre_title_right .wpd_secondary_font' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_contact .wpd_section_contact_pre_title_right .wpd_secondary_font' ).html( to );
				}
			);
		}
	);

	wp.customize(
		'oswald[contact_title_right]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_contact .wpd_contact_title_right' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_contact .wpd_contact_title_right' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_contact .wpd_contact_title_right' ).html( to );
				}
			);
		}
	);

	wp.customize(
		'oswald[contact_text_right]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_contact .wpd_contact_text_right' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_contact .wpd_contact_text_right' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_contact .wpd_contact_text_right' ).html( to );
				}
			);
		}
	);


	/* Homepage Header */

	wp.customize(
		'oswald[homepage_header_pre_title]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_homepage_header .wpd_homepage_header_pre_title .wpd_secondary_font' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_homepage_header .wpd_homepage_header_pre_title .wpd_secondary_font' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_homepage_header .wpd_homepage_header_pre_title .wpd_secondary_font' ).html( to );
				}
			);
		}
	);

	wp.customize(
		'oswald[homepage_header_title]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_homepage_header .wpd_homepage_header_title' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_homepage_header .wpd_homepage_header_title' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_homepage_header .wpd_homepage_header_title' ).html( to );
				}
			);
		}
	);

	/* text */
	wp.customize(
		'oswald[homepage_header_text]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_homepage_header .wpd_homepage_header_text' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_homepage_header .wpd_homepage_header_text' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_homepage_header .wpd_homepage_header_text' ).html( to );
				}
			);
		}
	);


	/* button */
	wp.customize(
		'oswald[homepage_header_button_label_1]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_homepage_header .wpd_homepage_header_button_1' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_homepage_header .wpd_homepage_header_button_1' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_homepage_header .wpd_homepage_header_button_1 .wpd_btn_text' ).html( to );
				}
			);
		}
	);

	/* button bg color */
	wp.customize(
		'oswald[homepage_header_button_bg_color_1]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_homepage_header .wpd_homepage_header_button_1' ).attr( 'data-bg-color' , to );
						$( '.wpd_section_homepage_header .wpd_homepage_header_button_1' ).attr( 'data-border-color' , to );
						
					} else {
						$( '.wpd_section_homepage_header .wpd_homepage_header_button_1' ).attr( 'data-bg-color' , 'transparent' );
						$( '.wpd_section_homepage_header .wpd_homepage_header_button_1' ).attr( 'data-border-color' , 'transparent' );
					}
					oswald_custom_color();
				}
			);
		}
	);
	/* button color */
	wp.customize(
		'oswald[homepage_header_button_color_1]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_homepage_header .wpd_homepage_header_button_1' ).attr( 'data-color' , to );
						
					} else {
						$( '.wpd_section_homepage_header .wpd_homepage_header_button_1' ).attr( 'data-color' , 'transparent' );
					}
					oswald_custom_color();
				}
			);
		}
	);

	wp.customize(
		'oswald[homepage_header_button_label_2]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_homepage_header .wpd_homepage_header_button_2' ).removeClass( 'oswald_hidden_if_empty' );
					} else {
						$( '.wpd_section_homepage_header .wpd_homepage_header_button_2' ).addClass( 'oswald_hidden_if_empty' );
					}
					$( '.wpd_section_homepage_header .wpd_homepage_header_button_2 .wpd_btn_text' ).html( to );
				}
			);
		}
	);
	/* button bg color */
	wp.customize(
		'oswald[homepage_header_button_bg_color_2]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_homepage_header .wpd_homepage_header_button_2' ).attr( 'data-bg-color' , to );
						$( '.wpd_section_homepage_header .wpd_homepage_header_button_2' ).attr( 'data-border-color' , to );
						
					} else {
						$( '.wpd_section_homepage_header .wpd_homepage_header_button_2' ).attr( 'data-bg-color' , 'transparent' );
						$( '.wpd_section_homepage_header .wpd_homepage_header_button_2' ).attr( 'data-border-color' , 'transparent' );
					}
					oswald_custom_color();
				}
			);
		}
	);
	/* button color */
	wp.customize(
		'oswald[homepage_header_button_color_2]', function( value ) {
			value.bind(
				function( to ) {
					if ( to !== '' ) {
						$( '.wpd_section_homepage_header .wpd_homepage_header_button_2' ).attr( 'data-color' , to );
						
					} else {
						$( '.wpd_section_homepage_header .wpd_homepage_header_button_2' ).attr( 'data-color' , 'transparent' );
					}
					oswald_custom_color();
				}
			);
		}
	);

})(jQuery);