<?php 
?><div class='wpd_header_builder_component wpd_header_builder_menu_component'><nav class='main-menu main_menu_container"<?php echo ($menu_ative_top_line == '1' ? ' menu_line_enable' : '');?>"'><?php

    if ( class_exists( 'wpdaddy_core' ) ) {
        oswald_header_builder_menu($menu_slug);
    }else{
        if (has_nav_menu( 'main_menu' )) {
            oswald_main_menu();
        }
    }?>
    </nav><?php
    if (!empty($menu_mobile_nav) && $menu_mobile_nav == true) {
    ?><div class="mobile-navigation-toggle">
    	<div class="toggle-box"><div class="toggle-inner"></div></div>
    </div><?php } ?>
</div>