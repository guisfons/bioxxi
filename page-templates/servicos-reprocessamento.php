<?php
    /**
     * Template Name: Serviços - Reprocessamento
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
    $titulo = get_field('titulo_reprocessamento');
    $subtitulo = get_field('subtitulo_reprocessamento');
    if (have_rows('cards_reprocessamento')): ?>
    <section class="wrapper reprocessamento__cards">
        <?php
            if ($subtitulo) {
                echo '<h2 class="title title--subtitle"><span>' . $titulo . '<span>' . $subtitulo . '</span></span></h2>';
            } else {
                echo '<h2 class="title">' . $titulo . '</h2>';
            }
        ?>
        <div class="reprocessamento__container">
        <?php
        while (have_rows('cards_reprocessamento')): the_row();
            $conteudo = get_sub_field('conteudo');
            $icone_id = get_sub_field('icone');
            $cor = get_sub_field('cor');
            $link = get_sub_field('link');

            $icone_url = $icone_id ? wp_get_attachment_image_url($icone_id, 'medium') : '';
        ?>
            <div class="reprocessamento__card"style="background-color: <?php echo $cor; ?>;">
                <?php if ($conteudo): ?>
                    <div class="reprocessamento__card-content"><?php echo $conteudo; ?></div>
                <?php endif; ?>
                <?php if ($icone_url): ?>
                    <img src="<?php echo esc_url($icone_url); ?>" alt="<?php echo esc_attr($titulo); ?>" class="reprocessamento__card-icon" />
                <?php endif; ?>
                <?php if ($link): ?>
                    <a href="<?php echo esc_url($link); ?>" target="_blank" style="color: <?php echo $cor; ?>;">Saiba mais</a>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>

<?php
    $titulo = get_field('titulo_esterilizacao');
    $subtitulo = get_field('subtitulo_esterilizar');
    if (have_rows('metodos')): ?>
    <section class="wrapper box">
        <h2 class="box__title"><?= $titulo; ?></h2>
        <div class="box__container">
        <?php
        while (have_rows('metodos')): the_row();
            $icone_id = get_sub_field('icone');
            $icone_url = $icone_id ? wp_get_attachment_image_url($icone_id, 'medium') : '';
            $titulo = get_sub_field('titulo');
            $mais_procurado = get_sub_field('mais_procurado');

            semi_circle($icone_id, $titulo, '', $mais_procurado);
        endwhile; ?>
        </div>
        <span><?php echo get_field('artigo_esterilizacao'); ?></span>
        <a href="#contato" title="Link ancora para formulário">Quero Contratar</a>
    </section>
<?php endif; ?>

<?php get_template_part('template-parts/reprocessamento/cards'); ?>

<?php get_template_part('template-parts/form'); ?>
<?php
    get_footer();