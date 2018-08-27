<?php
/**
 * The template for displaying search results pages
 *
 */

get_header(); 
    $layout = oswald_option('page_sidebar_layout');
    $sidebar = oswald_option('page_sidebar_def');
    $column = 12;

    if ( $layout == 'left' || $layout == 'right' ) {
        $column = 9;
    }else{
        $sidebar = '';
    }
    $row_class = ' sidebar_'.$layout;
    ?>

<div class="container">
	<div class="row<?php echo esc_attr($row_class); ?>">
		<div class="content-container span<?php echo (int)esc_attr($column); ?>">
			<section id='main_content' class="wpd_module_blog">
                <div class="wpd_blog_list">
					<?php
					if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/post/content', 'excerpt' );

						endwhile; // End of the loop.

						wp_reset_postdata();
                        echo oswald_get_theme_pagination();

					else : ?>
					<div class="wrapper_404 height_100percent">
						<div class="container_vertical_wrapper">
							<div class="container a-center">
								<h2><?php esc_html_e('Not Found', 'oswald'); ?></h2>
								<p><?php echo esc_html__('Sorry, but nothing matched your search terms. Please try again with some different keywords', 'oswald'); ?></p>
								<div class="wpd_404_search">
									<?php get_search_form(); ?>
								</div>
								<div class="wpd_module_button  button_alignment_inline">
									<a class="button_size_normal text-uppercase" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Take me home', 'oswald'); ?></a>
								</div>				
							</div>
						</div>
					</div>	
					<?php endif;
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

<?php get_footer();
