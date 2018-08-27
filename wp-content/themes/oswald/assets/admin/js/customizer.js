(function($) { 
"use strict"; 
/**
 * Customizer controls
 */

 	wp.customize(
		'blogname', function( value ) {
			value.bind(
				function( to ) {
					console.log(jQuery( '#customize-preview' ).find())
					$( '.logo_container .site-title' ).text( to );
				}
			);
		}
	);


	/* subtitle */
	wp.customize(
		'oswald[about_pre_title]', function( value ) {
			value.bind(
				function( to ) {
					console.log(to)
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

( function( api ) {
    api.sectionConstructor['oswald-pro'] = api.Section.extend( {
        // No events for this type of section.
        attachEvents: function () {},
        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );
} )( wp.customize );

( function( $, api ) {
    api( 'blogname', function( setting ) {
        setting.bind( function( value ) {
            $( '.site-title a' ).text( value );
        } );
    } );
} ( jQuery, wp.customize ) );

})(jQuery);