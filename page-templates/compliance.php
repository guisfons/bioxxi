<?php
    /**
     * Template Name: Compliance
     * Template Post Type: page
     *
     * @package UAU
     * @since 1.0.0
     */

    get_header();
    get_template_part('template-parts/heading');

    $link_denuncia = get_field('link_denuncia');
    $email_denuncia = get_field('email_denuncia');
    $telefone_denuncia = get_field('telefone_denuncia');
    $codigo_de_conduta_etica = get_field('codigo_de_conduta_etica');
    $banner_denuncia = get_field('banner_denuncia');

?>
<section class="wrapper compliance__info">
    <div class="compliance__content">
        <article><?php the_content(); ?></article>
        <div class="compliance__container">
            <div class="compliance__detalhe">
                <figure><img src="<?php echo get_template_directory_uri() ?>/assets/img/symbol-b.webp" alt=""></figure>
                
                <div class="compliance__links">
                    <a href="tel:<?= str_replace(array(' ', '-'), '', $telefone_denuncia); ?>" target="_blank"><figure><img src="<?= get_template_directory_uri(); ?>/assets/img/icons/b-tel.svg"></figure><span><?= $telefone_denuncia; ?></span></a>
                    <a href="<?= $link_denuncia; ?>" target="_blank"><figure><img src="<?= get_template_directory_uri(); ?>/assets/img/icons/b-url.svg"></figure><span><?= $link_denuncia; ?> </span></a>
                    <a href="<?= $email_denuncia; ?>"><figure><img src="<?= get_template_directory_uri(); ?>/assets/img/icons/b-email.svg"></figure><span><?= $email_denuncia; ?></span></a>
                </div>
            </div>
            <div class="compliance__detalhe">
                <figure><img src="<?php echo get_template_directory_uri() ?>/assets/img/symbol-g.webp" alt=""></figure>
                <article><?php echo get_the_excerpt(); ?></article>
            </div>
        </div>
    </div>
    <div class="compliance__aside">
        <figure><?php the_post_thumbnail('full'); ?></figure>
        <a href="<?php echo $link_denuncia; ?>" target="_blank">Quero fazer uma denúncia</a>
    </div>
</section>

<section class="banner-denuncia">
    <div class="wrapper">
        <article>
            <?php echo $banner_denuncia['conteudo']; ?>
            <a href="<?php echo $codigo_de_conduta_etica; ?>" title="Baixe aqui nosso código de conduta ética">
                <img src="<?php echo get_template_directory_uri() ?>/assets/img/icons/codigo-conduta.svg" alt="Código de conduta ética">
                <span>Baixe aqui nosso Código de conduta ética</span>
            </a>
        </article>
        <figure><img src="<?php echo $banner_denuncia['imagem']; ?>" alt="Banner denuncia"></figure>
    </div>
</section>
<?php

    get_footer();