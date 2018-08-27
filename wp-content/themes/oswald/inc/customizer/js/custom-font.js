/**
 * Custom Font
 */
jQuery( document ).ready(function($) {
	"use strict";

	$('input.custom-font-color').wpColorPicker({
		change: function() {
			var element = $(this);
			setTimeout( function() {
				oswaldGetAllSelects(element.parents('.google_fonts_select_control'));
			}, 100 );
		},

	    clear: function (event)
	    {
	    	oswaldGetAllSelects($(this).parents('.google_fonts_select_control'));
	    }
	});

	$('.google-fonts-list, .google-fonts-weight-style, .google-fonts-subsets-style').select2();

	$('.select_test').select2();

	$('.google-fonts-list').on('change', function() {
		var elementFontWeight = $(this).parent().parent().find('.google-fonts-weight-style');
		var elementSubsets = $(this).parent().parent().find('.google-fonts-subsets-style');
		var elementAllStyles = $(this).parent().parent().find('.customize-control-google-font-selection-all-style');
		var selectedFont = $(this).val();
		var customizerControlName = $(this).attr('control-name');
		var all_style_array = [];
		
		var bodyfontcontrol = _wpCustomizeSettings.controls[customizerControlName];
		if (elementFontWeight.length) {
			var elementFontWeightVal = elementFontWeight.val();
			elementFontWeight.empty();

			$.each(bodyfontcontrol.oswaldfontslist[selectedFont].variants, function(val, text) {
				if (text['id'] == elementFontWeightVal) {
					elementFontWeight.append($('<option selected="selected"></option>').val(text['id']).html(text['name']));
				}else{
					elementFontWeight.append($('<option></option>').val(text['id']).html(text['name']));
				}
				all_style_array.push(text['id']);
			});
		}
		
		if (elementSubsets.length) {
			elementSubsets.empty();
			$.each(bodyfontcontrol.oswaldfontslist[selectedFont].subsets, function(val, text) {
				if (text['id'] == 'latin') {
					elementSubsets.append($('<option selected="selected"></option>').val(text['id']).html(text['name']));
				}else{
					elementSubsets.append($('<option></option>').val(text['id']).html(text['name']));
				}
			});
		}

		if (elementAllStyles.length) {
			elementAllStyles.val(JSON.stringify(all_style_array));
		}

		oswaldGetAllSelects($(this).parent().parent());
	});

	$('.google_fonts_select_control select, .google_fonts_select_control .custom-font-size, .google_fonts_select_control .custom-line-height, .google_fonts_select_control .custom-font-color').on('change', function() {
		oswaldGetAllSelects($(this).parents('.google_fonts_select_control'));
	});

	function oswaldGetAllSelects($element) {
		var selectedFont = {};
		if ($element.find('.google-fonts-list').length) {
			selectedFont['font-family'] = $element.find('.google-fonts-list').val();
		}
		if ($element.find('.google-fonts-weight-style').length) {
			selectedFont['font-weight'] = $element.find('.google-fonts-weight-style').val();
		}
		if ($element.find('.google-fonts-subsets-style').length) {
			selectedFont['subsets'] = $element.find('.google-fonts-subsets-style').val();
		}
		if ($element.find('.google-fonts-text-transform-style').length) {
			selectedFont['text-transform'] = $element.find('.google-fonts-text-transform-style').val();
		}
		if ($element.find('.custom-font-size').length) {
			selectedFont['font-size'] = $element.find('.custom-font-size').val() + 'px';
		}
		if ($element.find('.custom-line-height').length) {
			selectedFont['line-height'] = $element.find('.custom-line-height').val() + 'px';
		}
		if ($element.find('.custom-font-color').length) {
			selectedFont['color'] = $element.find('.custom-font-color').val();
		}
		if ($element.find('.customize-control-google-font-selection-all-style').length) {
			selectedFont['all-style'] = $element.find('.customize-control-google-font-selection-all-style').val();
		}
		// Important! Make sure to trigger change event so Customizer knows it has to save the field
		$element.find('.customize-control-google-font-selection').val(JSON.stringify(selectedFont)).trigger('change');
	}
});