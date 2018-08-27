<?php
/**
 * The template for displaying all single posts
 */

get_header();
if ( !post_password_required() ) {
    ?>

    <?php
    $layout = oswald_option('blog_single_sidebar_layout');
    $sidebar = oswald_option('blog_single_sidebar_def');
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
    $row_class = ' sidebar_'.$layout;
    ?>

    <div class="container">
        <div class="row<?php echo esc_attr($row_class); ?>">
            <div class="content-container span<?php echo (int)esc_attr($column); ?>">
                <section id='main_content' class="wpd_module_blog">
                    <div class="wpd_blog_list">
                    <?php
                        while (have_posts()) : the_post();

							get_template_part( 'template-parts/post/content', 'single' );

                            // Author Info
                            $author_box = oswald_option('author_box');
                            $author_description = get_the_author_meta('user_description');
                            if ($author_box == '1' && !empty($author_description)) {
                                ?>
                                <div class="author_box">
                                    <div class="author_box__avatar">
                                        <?php
                                            $user = get_the_author_meta('ID');
                                            echo get_avatar($user,100);
                                        ?>
                                    </div>
                                    <h6 class="author_box__name"><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></h6>
                                    <div class="author_box__desc"><?php echo get_the_author_meta('user_description'); ?></div>
                                </div>
                                <?php
                            }

                            // Post Navigation
                            the_post_navigation( array(
								'prev_text' => '<span>' . esc_html__( 'Prev', 'oswald' ) . '</span>',
								'next_text' => '<span>' . esc_html__( 'Next', 'oswald' ) . '</span>',
							));

						endwhile;
                        wp_reset_postdata();

                        // Related Posts
                        if ( oswald_option("related_posts") == "1") {
                            if ($layout == 'none') {
                                $items_per_line = '3';
                            } else {
                                $items_per_line = '2';
                            }
                            echo '<div class="featured_posts"><h3>' . esc_html__('Related Posts', 'oswald') . '</h3><div class="posts_wrapper items_per_line'.$items_per_line.'">';
                            $wpd_wp_query = new WP_Query();

                            // Get Cats_ID
                            if (get_the_category()) $categories = get_the_category();
                            if ($categories) {
                                $post_categ = '';
                                $post_category_compile = '';
                                foreach ($categories as $category) {
                                    $post_categ = $post_categ . $category->cat_ID . ',';
                                }
                                $post_category_compile .= '' . trim($post_categ, ',') . '';
                            }

                            $args = array(
                                'posts_per_page' => ($layout == 'none') ? 3 : 2,
                                'orderby' => 'rand',
                                'ignore_sticky_posts' => 1,
                                'cat' => $post_category_compile
                            );

                            $blog_post_likes = oswald_option('blog_post_likes');                            

                            $wpd_wp_query->query($args);
                            while ($wpd_wp_query->have_posts()) : $wpd_wp_query->the_post();
                                oswald_get_template_part( 'template-parts/post/content', '', array(
                                    'show_author' => '1',
                                    'blog_post_listing_content' => '1',
                                    'symbol_count' => 105,
                                    'show_likes' => $blog_post_likes,
                                    'show_share' => '0',
                                    'show_date' => '0',
                                    'parameters' => array(
                                        'image_proportional' => '4_3'
                                    )
                                ));
                            endwhile;
                            wp_reset_postdata();
                            echo '</div></div>';
                        }

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( (comments_open() || get_comments_number()) && oswald_option('post_comments') == "1" ) :
                            comments_template();
                        endif;
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

} else {
    ?>
    <div class="wrapper_404 height_100percent pp_block">
        <div class="container_vertical_wrapper">
            <div class="container a-center pp_container">
                <h1><?php echo esc_html__('Password Protected', 'oswald'); ?></h1>
                <h2><?php echo esc_html__('This content is password protected. Please enter your password below to continue.', 'oswald'); ?></h2>
                <?php the_content(); ?>
            </div>
        </div>
    </div>
    <?php
}
get_footer(); 
?>
