jQuery( document ).ready(function($) {
	"use strict";

	/**
	 * TinyMCE Custom Control
	 *
	 */
	$('.customize-control-tinymce-editor').each(function(){
		// Get the toolbar strings that were passed from the PHP Class
		var tinyMCEToolbar1String = _wpCustomizeSettings.controls[$(this).attr('data-customize-setting-link')].oswaldtinymcetoolbar1;
		var tinyMCEToolbar2String = _wpCustomizeSettings.controls[$(this).attr('data-customize-setting-link')].oswaldtinymcetoolbar2;
		var tinyMCEHeightString = _wpCustomizeSettings.controls[$(this).attr('data-customize-setting-link')].oswaldtinymceheight;
		var f_awesome_style_link = _wpCustomizeSettings.controls[$(this).attr('data-customize-setting-link')].f_awesome_style_link;
		var tinymce_button_link = _wpCustomizeSettings.controls[$(this).attr('data-customize-setting-link')].tinymce_button_link;

		wp.editor.initialize( $(this).attr('id'), {
			tinymce: {
				wpautop: false,
				plugins:"charmap,hr,media,paste,tabfocus,textcolor,fullscreen,wordpress,wpeditimage,wpgallery,wplink,wpdialogs,wpview",
				toolbar1: tinyMCEToolbar1String,
				toolbar2: tinyMCEToolbar2String,
				height: tinyMCEHeightString,
				tabfocus_elements:":prev,:next",
				content_css : f_awesome_style_link,
				external_plugins: {
				    'oswald_external_tinymce_plugins': tinymce_button_link,
				  }
			},
			quicktags: true,
		});
	});
	$(document).on( 'tinymce-editor-init', function( event, editor ) {
		editor.on('change', function(e) {
			tinyMCE.triggerSave();
			$('#'+editor.id).trigger('change');
		});
	});

});
