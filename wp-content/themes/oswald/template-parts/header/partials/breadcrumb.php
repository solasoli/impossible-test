<?php

$delimiter = ' <i class="fa fa-angle-right"></i> ';
$home = esc_html__('Home', 'oswald');
$showCurrent = 1;
$before = '<span class="current">';
$after = '</span>';
global $post;
$homeLink = esc_url(home_url('/'));
if (is_home() || is_front_page()) { 
    ?><div class="breadcrumbs"><span><?php echo esc_html($home); ?></span></div><?php
} 
elseif (get_post_type() == 'product') {
    ?><div class="breadcrumbs"><?php woocommerce_breadcrumb(); ?></div><?php
}else {
    ?><div class="breadcrumbs"><a href="<?php echo esc_url($homeLink); ?>"><?php echo esc_html($home); ?></a><?php echo ''.$delimiter;
    if (is_category()) {
        $thisCat = get_category(get_query_var('cat'), false);
        if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
        echo ''.$before . esc_html__('Archive','oswald').' "' . single_cat_title('', false) . '"' . $after;
    }
    elseif (is_single() && get_post_type() == 'portfolio') {
        $post_type = get_post_type_object(get_post_type());       
        echo '<a href="' . esc_url(get_post_type_archive_link(get_post_type())) . '">' . esc_html($post_type->labels->singular_name) . '</a> ' . $delimiter . ' ';
        echo ''.$before . get_the_title() . $after;
    }
    elseif(is_archive()){
        $post_type = get_post_type_object(get_post_type());
        if (is_tax()) {
            echo ''.$before . esc_html(get_the_archive_title()) . $after;
        }else{
            if (!empty($post_type)) {
                echo ''.$before . esc_html($post_type->labels->singular_name) . $after;
            }
        }
        
    } elseif (is_search()) {
        echo ''.$before . esc_html__('Search for','oswald').' "' . get_search_query() . '"' . $after;

    } elseif (is_day()) {
        echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo '<a href="' . esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
        echo ''.$before . get_the_time('d') . $after;

    } elseif (is_month()) {
        echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo ''.$before . get_the_time('F') . $after;

    } elseif (is_year()) {
        echo ''.$before . get_the_time('Y') . $after;

    } elseif (is_single() && !is_attachment()) {
        if (get_post_type() != 'post') {

            $parent_id = $post->post_parent;
            if ($parent_id > 0) {
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    $breadcrumbs[] = '<a href="' . esc_url(get_permalink($page->ID)) . '">' . get_the_title($page->ID) . '</a>';
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i++) {
                    echo ''.$breadcrumbs[$i];
                    if ($i != count($breadcrumbs) - 1) echo ' ' . $delimiter . ' ';
                }
                if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            } else {
                echo ''.$before . get_the_title() . $after;
            }

        } else {
            $cat = get_the_category();
            $cat = $cat[0];
            $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
            echo ''.$cats;
            if ($showCurrent == 1) echo ''.$before . get_the_title() . $after;
        }

    } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
        $post_type = get_post_type_object(get_post_type());
        echo ''.$before . esc_html($post_type->labels->singular_name) . $after;

    } elseif (is_attachment()) {
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

    } elseif (is_page() && !$post->post_parent) {
        if ($showCurrent == 1) echo ''.$before . get_the_title() . $after;

    } elseif (is_page() && $post->post_parent) {
        $parent_id = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<a href="' . esc_url(get_permalink($page->ID)) . '">' . get_the_title($page->ID) . '</a>';
            $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        for ($i = 0; $i < count($breadcrumbs); $i++) {
            echo ''.$breadcrumbs[$i];
            if ($i != count($breadcrumbs) - 1) echo ' ' . $delimiter . ' ';
        }
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

    } elseif (is_tag()) {
        echo ''.$before . esc_html__('Tag','oswald').' "' . single_tag_title('', false) . '"' . $after;

    } elseif (is_author()) {
        global $author;
        $userdata = get_userdata($author);
        echo ''.$before . esc_html__('Author','oswald').' ' . ewc_html($userdata->display_name) . $after;

    } elseif (is_404()) {
        echo ''.$before . esc_html__('Error 404','oswald') . $after;
    }

    ?></div><?php

}