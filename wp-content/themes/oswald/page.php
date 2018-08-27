<?php
get_header();
if ( !post_password_required() ) {
	the_post();
?>
	
    <?php
    $layout = oswald_option('page_sidebar_layout');
    $sidebar = oswald_option('page_sidebar_def');
    if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0) {
        $mb_layout = rwmb_meta('mb_page_sidebar_layout');
        if (!empty($mb_layout) && $mb_layout != 'default') {
            $layout = $mb_layout;
            $sidebar = rwmb_meta('mb_page_sidebar_def');
        }
    }
    $column = 12;
    if ( $layout == 'left' || $layout == 'right' ) {
        $column = 9;
    }else{
        $sidebar = '';
    }
    $row_class = ' sidebar_'.esc_attr($layout);
    ?>

    <div class="container">
        <div class="row<?php echo esc_attr($row_class); ?>">
            <div class="content-container span<?php echo (int)$column; ?>">
                <section id='main_content'>
                <?php
                    the_content(esc_html__('Read more!', 'oswald'));
                    wp_link_pages(array('before' => '<div class="page-link">' . esc_html__('Pages', 'oswald') . ': ', 'after' => '</div>'));
                if (oswald_option("page_comments") == "1") { ?>
                    <div class="clear"></div>
                    <?php comments_template(); ?>         
                <?php } ?>
                </section>
            </div>
            <?php
            if ($layout == 'left' || $layout == 'right') {
                ?><div class="sidebar-container span<?php echo (12 - (int)$column); ?>"><?php
                    if (is_active_sidebar( $sidebar )) {
                        ?><aside class='sidebar'><?php
                        dynamic_sidebar( $sidebar );
                        ?></aside><?php
                    }
                ?></div><?php
            }
            ?>           
        </div>
     
    </div><?php
} else {
?>
	<div class="wrapper_404 height_100percent pp_block">
        <div class="container_vertical_wrapper">
            <div class="container a-center pp_container">
                <h1><?php esc_html_e('Password Protected', 'oswald'); ?></h1>
                <h2><?php esc_html_e('This content is password protected. Please enter your password below to continue.', 'oswald'); ?></h2>
                <?php the_content(); ?>
            </div>
        </div>
	</div>
<?php 
	
}
get_footer();