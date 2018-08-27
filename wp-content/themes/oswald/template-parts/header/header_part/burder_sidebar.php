<div class="wpd_header_builder__burger_sidebar">;
    <div class="wpd_header_builder__burger_sidebar-cover"></div>;
    <div class="wpd_burger_sidebar_container">
        <?php
        if (is_active_sidebar( $sidebar )) {
            ?><aside class='sidebar'><?php
            dynamic_sidebar( $sidebar );
            ?></aside><?php
        }
        ?>
    </div>;
</div>;