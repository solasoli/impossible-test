jQuery(document).ready(function() {
    var navigationForm = jQuery('#update-nav-menu');
    navigationForm.on('change', '[data-item-option]', function() {
        if (jQuery(this).attr('type') == 'checkbox') {
            jQuery(this).parent().find('input[type=hidden]').val(jQuery(this).parent().find('input[type=checkbox]').is(":checked"));
            if (jQuery(this).hasClass('mega-menu-checkbox')) {
                if (jQuery(this).parent().find('input[type=checkbox]').is(":checked")) {
                    jQuery(this).parents('.menu-item ').addClass('menu-item-megamenu-active');
                    $item = jQuery(this).parents('.menu-item ');
                    do{
                        $item = $item.next();
                        if (!$item.hasClass('menu-item-depth-0')) {
                            $item.addClass('menu-item-megamenu_sub-active');
                        }
                    } while(!$item.hasClass('menu-item-depth-0') && $item.next().length != 0)
                }else{
                    jQuery(this).parents('.menu-item ').removeClass('menu-item-megamenu-active');
                    $item = jQuery(this).parents('.menu-item ');
                    do{
                        $item = $item.next();
                        if (!$item.hasClass('menu-item-depth-0')) {
                            $item.removeClass('menu-item-megamenu_sub-active');
                        }
                    } while(!$item.hasClass('menu-item-depth-0') && $item.next().length != 0)
                }
            }
        }
        if (jQuery(this)[0].tagName == 'SELECT') {
            jQuery(this).parent().find('input[type=hidden]').val(jQuery(this)[0].value);
        }
    });
});
// wpdButtonDependency
function oswaldButtonDependency () {
    // Icon Type
    jQuery('div[data-vc-shortcode-param-name="btn_icon_type"]').each(function () {
        var cur_this = jQuery(this);
        if (cur_this.find('.btn_icon_type').val() == 'font') {
            cur_this.parents('.vc_edit_form_elements').find('div[data-vc-shortcode-param-name="btn_icon_color"], div[data-vc-shortcode-param-name="btn_icon_color_hover"]').show();
        }
        cur_this.find('.btn_icon_type').change(function () {
            if (jQuery(this).val() == 'font') {
                cur_this.parents('.vc_edit_form_elements').find('div[data-vc-shortcode-param-name="btn_icon_color"], div[data-vc-shortcode-param-name="btn_icon_color_hover"]').show();
            } else {
                cur_this.parents('.vc_edit_form_elements').find('div[data-vc-shortcode-param-name="btn_icon_color"], div[data-vc-shortcode-param-name="btn_icon_color_hover"]').hide();
            }
        });
    });
    // Border Style
    jQuery('div[data-vc-shortcode-param-name="btn_border_style"]').each(function () {
        var cur_this = jQuery(this);
        if (cur_this.find('.btn_border_style').val() != 'none') {
            cur_this.parents('.vc_edit_form_elements').find('div[data-vc-shortcode-param-name="btn_border_color"], div[data-vc-shortcode-param-name="btn_border_color_hover"]').show();
        }
        cur_this.find('.btn_border_style').change(function () {
            if (jQuery(this).val() != 'none') {
                cur_this.parents('.vc_edit_form_elements').find('div[data-vc-shortcode-param-name="btn_border_color"], div[data-vc-shortcode-param-name="btn_border_color_hover"]').show();
            } else {
                cur_this.parents('.vc_edit_form_elements').find('div[data-vc-shortcode-param-name="btn_border_color"], div[data-vc-shortcode-param-name="btn_border_color_hover"]').hide();
            }
        });
    });
}