<?php
/**
 * The main template file.
 */
get_header();
if ( !post_password_required() ) {
    ?>

    <?php
    $layout = oswald_option('page_sidebar_layout');
    $sidebar = oswald_option('page_sidebar_def');
    $column = 12;

    if ( $layout == 'left' || $layout == 'right' ) {
        $column = 9;
    }else{
        $sidebar = '';
    }
    $row_class = ' sidebar_'.$layout;
    $show_on_front = get_option( 'show_on_front' );

    if ($show_on_front == 'custom') {
        do_action( 'oswald_extend_front_page');
        /*?>
        <div class="container-full-width">
            <div class="row sidebar_none">
                <div class="content-container span12">
                    <section id='main_content'><?php
                        get_template_part( 'template-parts/frontpage/header/header' );
                        get_template_part( 'template-parts/frontpage/about/about' );
                        get_template_part( 'template-parts/frontpage/services/services' );
                        get_template_part( 'template-parts/frontpage/call_to_action/call_to_action' );
                        get_template_part( 'template-parts/frontpage/team/team' );
                        get_template_part( 'template-parts/frontpage/testimonial/testimonial' ); 
                        get_template_part( 'template-parts/frontpage/blog/blog' );   
                        get_template_part( 'template-parts/frontpage/partners/partners' );    
                        get_template_part( 'template-parts/frontpage/contact/contact' );                   
                    ?></section>
                </div>
            </div>
        </div>
        <?php */
    }else{
    ?><div class="container">
        <div class="row<?php echo esc_attr($row_class); ?>">
            <div class="content-container span<?php echo (int)esc_attr($column); ?>">
                <section id='main_content' class="wpd_module_blog">
                    <div class="wpd_blog_list">
                    <?php
                        while (have_posts()) : the_post();
                            get_template_part( 'template-parts/post/content' );
                        endwhile;
                        wp_reset_postdata();
                        echo oswald_get_theme_pagination();
                    ?>
                    </div>
                </section>
            </div>
            <?php
            if ($layout == 'left' || $layout == 'right') {
                ?><div class="sidebar-container span<?php echo (12 - (int)esc_attr($column)); ?>"><?php
                if (is_active_sidebar( $sidebar )) {
                    ?><aside class='sidebar'><?php
                    dynamic_sidebar( $sidebar );
                    ?></aside><?php
                }
                ?></div><?php // end sidebar-container
            }
            ?>
        </div>
    </div>
    <?php
    }
} else {
    ?>
    <div class="wrapper_404 height_100percent pp_block">
        <div class="container_vertical_wrapper">
            <div class="container a-center pp_container">
                <h1><?php echo esc_html__('Password Protected', 'oswald'); ?></h1>
                <h2><?php echo esc_html__('This content is password protected. Please enter your password below to continue.', 'oswald'); ?></h2>
                <?php the_content();?>
            </div>
        </div>
    </div>
    <?php
}
get_footer(); 
?>