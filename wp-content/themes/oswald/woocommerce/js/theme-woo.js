jQuery(document).ready(function($) {
	oswald_category_accordion ();
	oswald_animate_cart ();
	oswald_spinner_up_down ();
});

jQuery(window).load(function($){
	oswald_single_product_thumbnail();
});

jQuery(window).resize(function($){
	oswald_single_product_thumbnail();
});

function oswald_category_accordion () {
	jQuery('.widget_product_categories').each(function(){
		var elements = jQuery(this).find('.product-categories>li.cat-parent');
		for (var i = 0; i < elements.length; i++) {
			jQuery(elements[i]).append("<span class=\"wpd-button-cat-open\"></span>");
		}
	})
	jQuery(".wpd-button-cat-open").on("click", function () {
		jQuery(this).parent().toggleClass('open');
		if (jQuery(this).parent().hasClass('open')) {
			jQuery(this).parent().children('.children').slideDown();
		} else {
			jQuery(this).parent().children('.children').slideUp();
		}
	})
}

/* Cart Count Icon Animation */
function oswald_animate_cart () {
	jQuery.fn.shake = function(intShakes, intDistance, intDuration) {
		this.each(function() {
			for (var x=1; x<=intShakes; x++) {
				jQuery(this).animate({left:(intDistance*-1)}, (((intDuration/intShakes)/4)))
				.animate({left:intDistance}, ((intDuration/intShakes)/2))
				.animate({left:0}, (((intDuration/intShakes)/4)));
			}
		});
		return this;
	};
	jQuery(document.body).live('added_to_cart', function(el, data, params){
		setTimeout(function(){
			jQuery(".wpd_header_builder_cart_component").addClass("show_cart");
			jQuery(".woo_mini-count").shake(3,1.2,300);
		}, 300);
		setTimeout(function(){
			jQuery(".wpd_header_builder_cart_component").removeClass("show_cart");
		}, 2800);
    });
}

/* Input spinner */
function oswald_spinner_up_down () {
	jQuery('body').on('tap click', '.wpd_qty_spinner .quantity-up', function() {
		var input 	= jQuery(this).parent().find('input[type="number"]'),
		max 		= input.attr('max'),
		oldValue 	= parseFloat(input.val());
		if (oldValue >= max && '' != max) {
			var newVal = oldValue;
		} else {
			var newVal = oldValue + 1;
		}
		input.val(newVal);
		input.trigger("change");
	});
	jQuery('body').on('tap click', '.wpd_qty_spinner .quantity-down, .wpd_qty_spinner .quantity-down', function() {
		var input 	= jQuery(this).parent().find('input[type="number"]'),
		min 		= input.attr('min'),
		oldValue 	= parseFloat(input.val());
		if (oldValue <= min && '' != min) {
			var newVal = oldValue;
		} else {
			var newVal = oldValue - 1;
		}
		input.val(newVal);
		input.trigger("change");
	});
}

/* Single product thumbnail */
function oswald_single_product_thumbnail() {
	if (jQuery('.woocommerce-product-gallery').length) {
		jQuery('.woocommerce-product-gallery .flex-control-thumbs > li').first().addClass('active_thumb_item');
		jQuery('.woocommerce-product-gallery .flex-control-thumbs > li').each(function(){
			jQuery(this).css({'height': jQuery(this).width() + 'px'});
		});
		jQuery('.woocommerce-product-gallery .flex-control-thumbs > li').on('click', function () {
			jQuery(this).siblings().removeClass("active_thumb_item");
			jQuery(this).addClass('active_thumb_item');
		});
	}
}