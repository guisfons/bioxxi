<?php
    /**
     * Template Name: Template Page
     * Template Post Type: page
     *
     * @package UAU
     * @since 1.0.0
     */

    get_header();

    while ( have_posts() ) : the_post();
        $post->post_content = apply_filters( 'the_content', $post->post_content );
    endwhile;

    wp_reset_postdata();
?>

<?php

    get_footer();