<?php
    /**
     * Template Name: Serviços - Reprocessamento 180/360
     * Template Post Type: page
     *
     * @package UAU
     * @since 1.0.0
     */

    get_header();
    get_template_part('template-parts/heading');
    get_template_part('template-parts/banner');
    get_template_part('template-parts/reprocessamento'); ?>
    <?php
        $titulo = get_field('titulo_box');
        if (have_rows('metodos_box')): ?>
        <section class="wrapper box">
            <h2 class="box__title"><?= $titulo; ?></h2>
            <div class="box__container">
            <?php
            while (have_rows('metodos_box')): the_row();
                $icone_id = get_sub_field('icone');
                $icone_url = $icone_id ? wp_get_attachment_image_url($icone_id, 'medium') : '';
                $titulo = get_sub_field('titulo');
                $conteudo = get_sub_field('conteudo');

                semi_circle($icone_id, $titulo, $conteudo, '');
            endwhile; ?>
            </div>
            <a href="#contato" title="Link ancora para formulário">Quero Contratar</a>
        </section>
    <?php endif; ?>
    <?php
//     get_template_part('template-parts/reprocessamento/highlight');
    
    get_template_part('template-parts/form');
    get_footer();