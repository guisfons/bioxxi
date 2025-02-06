<?php
    /**
     * Template Name: Termos de Uso
     * Template Post Type: page
     *
     * @package UAU
     * @since 1.0.0
     */

    get_header();
    get_template_part('template-parts/heading');
?>
<section class="wrapper termos__content"><?php the_content(); ?></section>
<section class="wrapper termos__detalhe">
    <div class="termos__detalhe-card">
        <figure><?php echo wp_get_attachment_image(get_field('modificacoes_icone'), 'full'); ?></figure>
        <article><?php echo get_field('modificacoes_texto'); ?></article>
    </div>
    <div class="termos__detalhe-card">
        <figure><?php echo wp_get_attachment_image(get_field('lei_aplicavel_icone'), 'full'); ?></figure>
        <article><?php echo get_field('lei_aplicavel_texto'); ?></article>
    </div>
</section>
<?php

    get_footer();