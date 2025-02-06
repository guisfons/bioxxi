<?php
    /**
     * Template Name: Sobre Nós - A empresa
     * Template Post Type: page
     *
     * @package UAU
     * @since 1.0.0
     */

    get_header();
    get_template_part('template-parts/heading');
    // get_template_part('template-parts/banner');
?>
<section class="wrapper nossa-historia">
    <h2 class="title title--left">Nossa história</h2>
    <article class="nossa-historia__content"><?php echo get_field('conteudo'); ?></article>
</section>

<?php get_template_part('template-parts/reprocessamento/highlight'); ?>

<section class="nossos-valores">
    <h2 class="wrapper title"><?php echo get_field('titulo_valores'); ?></h2>
    <?php if (have_rows('valores')): ?>
        <div class="wrapper nossos-valores__container">
            <?php while (have_rows('valores')): the_row();
                semi_circle(get_sub_field('icone'), get_sub_field('titulo'), get_sub_field('texto'), '');
            endwhile; ?>
        </div>
    <?php endif; ?>
</section>



<section class="sobre-nos__linha">
    <h2 class="wrapper title title--left"><span><?php echo get_field('titulo_linha_do_tempo'); ?><span><?php echo get_field('sub_titulo_linha_do_tempo'); ?></span></span></h2>
    <figure><img src="<?php echo get_field('imagem_linha_do_tempo'); ?>" alt="Linha do tempo"></figure>
</section>

<section class="wrapper video">
    <figure><?php echo get_field('video'); ?></figure>
</section>
<?php
    get_footer();