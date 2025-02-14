<?php
    /**
     * Template Name: Serviços - CME
     * Template Post Type: page
     *
     * @package UAU
     * @since 1.0.0
     */

    get_header();
    get_template_part('template-parts/heading');
    get_template_part('template-parts/banner');
?>
<?php get_template_part('template-parts/detalhe'); ?>
<?php if (have_rows('contratacoes')): ?>
<section class="wrapper contratacao">
    <h2 class="title"><?php echo get_field('titulo_modelos'); ?></h2>
    <span><?php echo get_field('subtitulo_modelos'); ?></span>
    <?php
    while (have_rows('contratacoes')): the_row();
        $icone_id = get_sub_field('icone');
        ?>
        <div class="contratacao__card" style="background-color: <?php echo esc_attr(get_sub_field('cor')); ?>">
            <h3>
                <figure><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/icons/symbol-w.svg" alt="ïcone"></figure>
                <?php echo get_sub_field('titulo'); ?>
            </h3>
            <article><?php echo get_sub_field('descricao'); ?></article>

            <?php if(!empty(get_sub_field('mensalidade'))): ?>
            <span>Mensalidade a partir de <strong>R$<?php echo get_sub_field('mensalidade'); ?></strong></span>
            <?php endif; ?>

            <a href="<?php echo get_sub_field('link_de_contratacao'); ?>" title="Contratar" style="color: <?php echo esc_attr(get_sub_field('cor')); ?>">Quero Contratar</a>
        </div>
    <?php endwhile; ?>
</section>
<?php endif; ?>

<section class="cuidado" style="background-image: url(<?php echo get_field('banner_cuidado'); ?>);">
    <article><?php echo get_field('titulo_cuidado'); ?></article>
    <div class="cuidado__container">
        <?php if (have_rows('itens_cuidado')): ?>
            <?php while (have_rows('itens_cuidado')): the_row(); ?>
                <div class="cuidado__item">
                    <?php
                        $icone_id = get_sub_field('icone');
                        $texto = get_sub_field('conteudo');
                    ?>
                    <figure><?php echo wp_get_attachment_image($icone_id, 'full'); ?></figure>
                    <article><?php echo $texto; ?></article>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>

<section class="area-qualidade">
    <div class="wrapper">
        <h2 class="title title--right"><?php echo get_field('titulo_area_qualidade'); ?></h2>

        <div class="area-qualidade__container">
            <?php if (have_rows('itens_area_qualidade')): ?>
                <?php while (have_rows('itens_area_qualidade')): the_row(); ?>
                    <article class="area-qualidade__item">
                        <?php
                            $icone_id = get_sub_field('icone');
                            $titulo = get_sub_field('titulo');
                            $texto = get_sub_field('texto');
            
                            semi_circle($icone_id, $titulo, $texto, '');
                        ?>
                    </article>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <a href="#contato" title="Link ancora para formulário">Quero Contratar</a>
    </div>
</section>

<?php get_template_part('template-parts/form'); ?>
<?php
    get_footer();