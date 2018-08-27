<?php

if (oswald_option('preloader') == '1' || oswald_option('preloader') == true) {
    $preloader_background = oswald_option('preloader_background');
    $preloader_item_color = oswald_option('preloader_item_color');
    $preloader_logo = oswald_option('preloader_item_logo');
    $preloader_full = oswald_option('preloader_full');
    
    $preloader_logo_url = $preloader_logo['url'];
    $preloader_logo_width = $preloader_logo['width'];

    if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0) {
        $mb_preloader = rwmb_meta('mb_preloader');
        if ($mb_preloader == 'custom') {
            $preloader_background = rwmb_meta('mb_preloader_background');
            $preloader_item_color = rwmb_meta('mb_preloader_item_color');
            $mb_preloader_item_logo = rwmb_meta('mb_preloader_item_logo', 'size=full');
            if (!empty($mb_preloader_item_logo)) {
                $preloader_logo_src = array_values($mb_preloader_item_logo);
                $preloader_logo_url = $preloader_logo_src[0]['full_url'];
                $preloader_logo_width = $preloader_logo_src[0]['width'];
            }else{
                $preloader_logo_url = '';
            }
            $preloader_full = rwmb_meta('mb_preloader_full');
        }
    }

    $preloader_background = !empty($preloader_background) ? $preloader_background : '#2b3258';
    $preloader_item_color = !empty($preloader_item_color) ? $preloader_item_color : '#ffffff';
    ?>
    <div id="loading" class="<?php 
	    echo ($preloader_full == '1' ? 'wpd_preloader_full' : 'wpd_preloader');
	    echo !empty($preloader_logo_url) ? ' wpd_preloader_image_on' : '';
    ?>" style="<?php 
    	echo !empty($preloader_background) ? 'background-color:'.esc_attr($preloader_background).';' : '';
    ?>">
    	<div id="loading-center">
    		<div id="loading-center-absolute">
    			<?php echo !empty($preloader_logo_url) ? '<img style="width:'.esc_attr((int)$preloader_logo_width/2).'px;height: auto;" src="'.esc_url($preloader_logo_url).'" alt="">' : ''; ?>
    			<div class="object" id="object_one"<?php echo !empty($preloader_item_color) ? ' style="color:'.$preloader_item_color.';"' : '' ?>></div>
    		</div>
    	</div>
    </div>
    <?php
}

