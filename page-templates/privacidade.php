<?php
    /**
     * Template Name: Privacidade
     * Template Post Type: page
     *
     * @package UAU
     * @since 1.0.0
     */

    get_header();
    get_template_part('template-parts/heading');
?>
<section class="wrapper privacidade__content"><?php the_content(); ?></section>
<section class="wrapper privacidade__detalhe">
    <figure><?php echo wp_get_attachment_image(get_field('icone'), 'full'); ?></figure>
    <article><?php echo get_field('mais_informacoes'); ?></article>
</section>
<?php

    get_footer();