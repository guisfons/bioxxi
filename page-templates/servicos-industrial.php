<?php
    /**
     * Template Name: Serviços - Esterilização Industrial
     * Template Post Type: page
     *
     * @package UAU
     * @since 1.0.0
     */

    get_header();
    get_template_part('template-parts/heading');
    get_template_part('template-parts/banner');
?>

<?php
    $titulo = get_field('titulo_esterilizacao');
    $subtitulo = get_field('subtitulo_esterilizar');
    if (have_rows('metodos')): ?>
	<section class="wrapper esterilizar-title">
        <h2 class="title"><?= $titulo; ?></h2>
		<div class="esterilizar__box"><?php echo get_field('destaque_esterilizacao'); ?></div>
    </section>
    <section class="wrapper esterilizar">
        <h3 class="esterilizar__title"><?php echo get_field('titulo_itens'); ?></h3>
		<div class="esterilizar__container">
        <?php
        while (have_rows('metodos')): the_row();
            $icone_id = get_sub_field('icone');
            $icone_url = $icone_id ? wp_get_attachment_image_url($icone_id, 'medium') : '';
            $titulo = get_sub_field('titulo');
            $mais_procurado = get_sub_field('mais_procurado');

            semi_circle($icone_id, $titulo, '', $mais_procurado);
        endwhile; ?>
        </div>
        <a href="#contato" title="Link ancora para formulário">Quero Contratar</a>
    </section>
<?php endif; ?>

<section class="metodo__esterilizacao">
    <div class="wrapper">
        <figure><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/icons/double-symbol.svg" alt="Ornamento"></figure>
        <div class="metodo__esterilizacao-container">
            <h2><?= get_field('titulo_reprocessamento'); ?></h2>
            <?php if (have_rows('metodos_de_esterilizacao')): ?>
                <?php while (have_rows('metodos_de_esterilizacao')): the_row(); ?>
                    <article>
                        <figure><?php echo wp_get_attachment_image(get_sub_field('icone'), 'full'); ?></figure>
                        <span><?php echo get_sub_field('titulo'); ?></span>
                    </article>
                <?php endwhile; ?>
            <?php endif; ?>

            <article><?php echo get_field('saiba_mais'); ?></article>
        </div>
        <figure><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/icons/double-symbol.svg" alt="Ornamento"></figure>
    </div>
</section>

<?php get_template_part('template-parts/reprocessamento/cards'); ?>
<?php get_template_part('template-parts/form'); ?>
<?php
    get_footer();