<?php
// Blog item template 
// 
$blog_post_listing_content = oswald_option('blog_post_listing_content');
$show_share = oswald_option('blog_post_share');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single_post'); ?>>
    <header class="wpd_blog_list__header">
        <?php get_template_part( 'template-parts/post/partials/post-header','single');?>
    </header>
    <div class="wpd_blog_list__content">
        <?php
            the_content();
        ?>
    </div>
    <?php if ($show_share == "1") { ?>
    <footer class="wpd_blog_list__footer">
        <div class="wpd_blog_list_tag">
            <?php the_tags("", ' ', ''); ?>
        </div>
        <?php 
        if (function_exists('oswald_post_share')) {
            oswald_post_share();
        }?>
        <div class="clear"></div>
    </footer>
    <?php } ?>
</article>