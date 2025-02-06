<?php
    /**
     * Template Name: Sobre Nós - Qualidade e Certificações
     * Template Post Type: page
     *
     * @package UAU
     * @since 1.0.0
     */

    get_header();
    get_template_part('template-parts/heading');

?>
<section class="wrapper qualidade-certificacoes__info">
    <article><?php the_content(); ?></article>
    <figure><?php the_post_thumbnail('full'); ?></figure>
</section>


<?php
    get_template_part('template-parts/detalhe');
    get_template_part('template-parts/certificacoes');
    get_template_part('template-parts/reprocessamento/cards');
    get_footer();