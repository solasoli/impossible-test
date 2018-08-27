<?php
// Blog item template 
// 
$show_likes = (!empty($show_likes) || ( isset($show_likes) && $show_likes == '0')) ? $show_likes : oswald_option('blog_post_likes');
$show_categories = (!empty($show_categories) || ( isset($show_categories) && $show_categories == '0')) ? $show_categories : '1';

$show_author = (!empty($show_author) || ( isset($show_author) && $show_author == '0')) ? $show_author : oswald_option('blog_post_author');
$show_comments = oswald_option('post_comments');
$show_comments = oswald_option('post_comments') == '1' ? ((empty($show_comments) || ( isset($show_comments) && $show_comments == '0')) ? $show_comments : oswald_option('blog_post_comment')) : '';
$show_share = (!empty($show_share) || ( isset($show_share) && $show_share == '0')) ? $show_share : oswald_option('blog_post_share');
$show_date = (!empty($show_date) || ( isset($show_date) && $show_date == '0')) ? $show_date : oswald_option('blog_post_date');
$symbol_count = (!empty($symbol_count) || ( isset($symbol_count) && $symbol_count == '0')) ? $symbol_count : '';
$blog_post_listing_content = (!empty($blog_post_listing_content) || ( isset($blog_post_listing_content) && $blog_post_listing_content == '1')) ? $blog_post_listing_content : oswald_option('blog_post_listing_content');
$parameters = !empty($parameters) ? $parameters : '';
if (is_array($parameters)) {
    $parameters['show_categories'] = $show_categories;
}else{
    $parameters = array();
    $parameters['show_categories'] = $show_categories;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
    <div class="wpd_blog_list__post_wrapper">
        <header class="wpd_blog_list__header">
            <?php 
            oswald_get_template_part( 
                'template-parts/post/partials/post-header',
                '', 
                array(
                    'parameters' => $parameters
                )
            );
            ?>
        </header>
        <div class="wpd_blog_list__content">
            <?php
                if (has_excerpt()) {
                    ob_start();
                        the_excerpt();
                    $post_descr = ob_get_clean();
                } else {
                    ob_start();
                        the_content();
                    $post_descr = ob_get_clean();
                }
                if ($blog_post_listing_content == "1") {
                    $symbol_count = !empty($symbol_count) || ( isset($symbol_count) && $symbol_count == '0') ? $symbol_count : '400';
                    $post_descr = oswald_smarty_modifier_truncate($post_descr, $symbol_count, "...");
                }

                echo ''.$post_descr;
            ?>
        </div>
        <?php 
        if($show_author == "1" || $show_likes == "1" || $show_comments == "1" || $show_date == "1") {?>
        <footer class="wpd_blog_list__footer">
            <?php
            if ($show_author == "1") {
                get_template_part( 'template-parts/post/partials/post-author-info');
            }else{
                ?><div class="wpd_blog_list__empty_right_space"></div><?php
            }
            if ($show_share == "1") {
                if (function_exists('oswald_post_share')) {
                    oswald_post_share();
                }
            }
            if ($show_likes == "1") {
                if (function_exists('oswald_post_likes')) {
                    oswald_post_likes();
                }
            }
            if ($show_comments == "1") {
                get_template_part( 'template-parts/post/partials/post-comments-info');
            }
            if ($show_date == "1") {
                get_template_part( 'template-parts/post/partials/post-date-info');
            }
            ?>
        </footer>
        <?php } ?>
    </div>
</article>