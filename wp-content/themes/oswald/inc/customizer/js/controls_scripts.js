(function($) { 
"use strict"; 
/**
 * Customizer controls
 */

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

})(jQuery);