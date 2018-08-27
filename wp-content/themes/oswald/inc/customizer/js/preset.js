/**
 * Radio-image
 */
	wp.customize.controlConstructor['oswald-preset'] = wp.customize.Control.extend({

		ready: function() {

			'use strict';

			var control = this;
			this.container.find('.preset-item').on( 'click', function() {
				jQuery( this ).addClass('active').siblings().removeClass('active')
				control.setting.set( jQuery( this ).data( 'option' ));
			});

		}

	});
