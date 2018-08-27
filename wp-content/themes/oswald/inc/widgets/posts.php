<?php

class oswald_posts extends WP_Widget
{

    function __construct() {
        parent::__construct(false, esc_html__('Posts (current theme)', 'oswald'));
    }

    function widget($args, $instance)
    {
        $after_widget = $before_widget = $before_title = $after_title = '';

        extract($args);

        $posts_widget_category = !empty($instance['posts_widget_category']) ? $instance['posts_widget_category'] : '';

        echo  $before_widget;
        echo  $before_title;
        echo esc_html($instance['widget_title']);
        echo  $after_title;

        $postsArgs = array(
            'showposts' => $instance['posts_widget_number'],
            'offset' => 0,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_type' => 'post',
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1,
        );

        if (!empty($posts_widget_category) && is_array($posts_widget_category)) {
            $postsArgs['cat'] = implode(",",array_keys($posts_widget_category));
        }

        $compilepopular = '';

        $wpd_wp_query_posts = new WP_Query();
        $wpd_wp_query_posts->query($postsArgs);
        while ($wpd_wp_query_posts->have_posts()) : $wpd_wp_query_posts->the_post();
            $wpd_theme_featured_image_latest = wp_get_attachment_image_url(get_post_thumbnail_id(get_the_ID()), 'oswald_small_thumb');

            $compilepopular .= '
            <li ' . ((!empty($wpd_theme_featured_image_latest)) ? 'class="with_img"' : '') . '>';
            if (empty($wpd_theme_featured_image_latest)) {
                $widg_img = '';
            } else {
                $widg_img = '<a href="' . esc_url(get_permalink()) . '" class="recent_posts_img"><img src="' . esc_url($wpd_theme_featured_image_latest) . '" alt="' . get_the_title() . '"></a>';
            }

            $widget_class= '';


            if (!empty($instance['posts_widget_content_hide']) && $instance['posts_widget_content_hide'] == 'on') {

                if (has_excerpt()) {
                    $post_excerpt = get_the_excerpt();
                } else {
                    $post_excerpt = get_the_content();
                }

                $post_excerpt = preg_replace( '~\[[^\]]+\]~', '', $post_excerpt);
                $post_excerpt_without_tags = strip_tags($post_excerpt);
                $post_descr = oswald_smarty_modifier_truncate($post_excerpt_without_tags, 50, "...");
            }else{
                $post_descr = '';
                $widget_class .= ' no_content';
            }

            $compilepopular .= '
               ' . $widg_img . '
                <div class="recent_posts_content'.esc_attr($widget_class).'">
                    <div class="recent_post_meta">
                        <span>' . get_the_time(get_option( 'date_format' )) . '</span>
                        <span>' . esc_html__("by", 'oswald') . ' <a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author_meta('display_name')) . '</a></span>
                    </div>
                    <h6 class="post_title"><a href="' . esc_url(get_permalink()) . '">' . get_the_title() . '</a></h6>
                    <div class="recent_post__cont">'.esc_html($post_descr).'</div>
                </div>
            </li>
        ';

        endwhile;
        wp_reset_postdata();

        echo '
            <ul class="recent_posts">
                ' . $compilepopular . '
            </ul>
        ';
        
        #END OUTPUT

        echo  $after_widget;
    }


    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['widget_title'] = sanitize_text_field($new_instance['widget_title']);
        $instance['posts_widget_number'] = absint($new_instance['posts_widget_number']);
        $instance['posts_widget_content_hide'] = $new_instance['posts_widget_content_hide'];

        // sanitize array
        $instance['posts_widget_category'] = $new_instance['posts_widget_category'];
        if (is_array($instance['posts_widget_category'])) {
            foreach ($instance['posts_widget_category'] as &$posts_widget_categor) {
                $posts_widget_categor = esc_attr($posts_widget_categor);
            }
            unset($posts_widget_categor );
        } else {
            $instance['posts_widget_category'] = esc_attr($instance['posts_widget_category']);
        }

        return $instance;
    }

    function form($instance)
    {
        $defaultValues = array(
            'widget_title' => esc_html__( 'Recent Posts', 'oswald' ),
            'posts_widget_number' => '3',
            'posts_widget_content_hide' => '',
            'posts_widget_category' => ''
        );


        $instance = wp_parse_args((array)$instance, $defaultValues);
        $posts_widget_content_hide = isset( $instance['posts_widget_content_hide'] ) ? (bool) $instance['posts_widget_content_hide'] : false;
        $posts_widget_category = $instance['posts_widget_category'];
        ?>
        <table class="fullwidth">
            <tr>
                <td><?php echo esc_html__( 'Title:', 'oswald' ); ?></td>
                <td><input type='text' class="fullwidth" name='<?php echo esc_attr($this->get_field_name('widget_title')); ?>'
                           value='<?php echo esc_attr($instance['widget_title']); ?>'/></td>
            </tr>
            <tr>
                <td><?php echo esc_html__( 'Number:', 'oswald' ); ?></td>
                <td><input type='text' class="fullwidth"
                           name='<?php echo esc_attr($this->get_field_name('posts_widget_number')); ?>'
                           value='<?php echo esc_attr($instance['posts_widget_number']); ?>'/></td>
            </tr>
            <tr>
                <td><?php echo esc_html__( 'Show post content:', 'oswald' ); ?></td>
                <td><input type='checkbox' class="checkbox" id='<?php echo  $this->get_field_id( 'posts_widget_content_hide' ); ?>'
                           name='<?php echo esc_attr($this->get_field_name('posts_widget_content_hide')); ?>'
                         <?php checked( $posts_widget_content_hide ); ?> /></td>
            </tr>
        </table>
        <h4><?php echo esc_html__( 'Choose a category or leave checkboxes fields blank to display all items.', 'oswald' ); ?></h4>
                
            <div>

             <?php 

            $args = array(
                'type'         => 'post',
                'orderby'      => 'name',
                'order'        => 'ASC',
                'hide_empty'   => 1,
                'taxonomy'     => 'category',
            );
             $categories = get_categories( $args );

             
             foreach ($categories as $category) {
                $posts_widget_category_checked = isset( $instance['posts_widget_category'][$category->cat_ID] ) ? (bool) $instance['posts_widget_category'][$category->cat_ID] : false;
                ?><label style="padding:0 5px 5px 0; min-width: calc(50% - 5px); display: inline-block;"><input type='checkbox' class="checkbox" id='<?php echo  $this->get_field_id( 'posts_widget_category' ).'_'.$category->cat_ID; ?>'
                           name='<?php echo esc_attr($this->get_field_name('posts_widget_category')).'['.$category->cat_ID.']'; ?>'
                         <?php checked( 1,$posts_widget_category_checked ); ?> /><?php echo esc_html($category->name); ?></label><?php
             }

             ?></div>
    <?php
    }
}

function oswald_posts_register_widgets()
{
    register_widget('oswald_posts');
}

add_action('widgets_init', 'oswald_posts_register_widgets');