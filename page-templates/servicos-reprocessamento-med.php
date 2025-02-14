<?php
    /**
     * Template Name: Serviços - Reprocessamento Med
     * Template Post Type: page
     *
     * @package UAU
     * @since 1.0.0
     */

    get_header();
    get_template_part('template-parts/heading');
    get_template_part('template-parts/banner');
    get_template_part('template-parts/reprocessamento');
?>
<?php if (have_rows('processo')): ?>
<section class="wrapper box box--processo">
    <div class="box__title"><article><?= get_field('titulo_processo'); ?></article><figure><?php echo wp_get_attachment_image(get_field('icone_processo'), 'full'); ?></figure></div>
    <div class="box__container">
    <?php
    while (have_rows('processo')): the_row();
        $icone_id = get_sub_field('icone');
        $icone_url = $icone_id ? wp_get_attachment_image_url($icone_id, 'medium') : '';
        $titulo = get_sub_field('titulo');
        $texto = get_sub_field('texto');

        semi_circle($icone_id, $titulo, $texto, '');
    endwhile; ?>
    </div>
    <a href="#contato" title="Link ancora para formulário">Quero Contratar</a>
</section>
<?php endif; ?>
<section style="display: flex;justify-content: center;margin: 17rem 0 0;"><figure><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2025/01/CUSTO-MEDIO-mensal-DE-ESTERILIZACAO-EM-CONSULTORIO-1.webp" alt="" class="w100"></figure></section>
<!-- <?php get_template_part('template-parts/reprocessamento/highlight');?> -->

<?php    
    get_template_part('template-parts/form');
    get_footer();