<?php
    /**
     * Template Name: Trabalhe Conosco
     * Template Post Type: page
     *
     * @package UAU
     * @since 1.0.0
     */

    get_header();
    get_template_part('template-parts/heading');
    get_template_part('template-parts/intro');
?>
<section class="wrapper vagas">
    <h2><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/symbol.svg" alt="Icone"><?= get_field('titulo'); ?><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/symbol.svg" alt="Icone"></h2>

    <?php if (have_rows('tipos_de_vaga')) :
        while (have_rows('tipos_de_vaga')) : the_row();
            $link = get_sub_field('link');
            $link_url = esc_url($link['url']);
            $link_target = esc_attr($link['target']);
            $link_title = esc_html($link['title']);
        ?>
            <div class="vagas__card">
                <?php
                    $string = get_sub_field('titulo');
                    $words = explode(' ', $string);
                    $first_line = array_shift($words);
                    $second_line = '<strong>' . implode(' ', $words) . '</strong>';
                ?>
                <h3><?php echo $first_line; ?><br><?php echo $second_line; ?></h3>
                <figure><?php echo wp_get_attachment_image(get_sub_field('imagem'), 'full'); ?></figure>
                <?php if (!empty($link_url) && !empty($link_title)) { ?>
                    <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>" rel="noopener noreferrer"><?php echo $link_title; ?></a>
                <?php } ?>
            </div>
        <?php endwhile;
    endif; ?>
</section>

<section class="wrapper vagas__detalhe">
    <div class="vagas__detalhe-card">
        <figure><?php echo wp_get_attachment_image(get_field('1_detalhe_icone'), 'full'); ?></figure>
        <article><?php echo get_field('1_detalhe_texto'); ?></article>
    </div>
    <div class="vagas__detalhe-card">
        <figure><?php echo wp_get_attachment_image(get_field('2_detalhe_icone'), 'full'); ?></figure>
        <article><?php echo get_field('2_detalhe_texto'); ?></article>
    </div>
</section>
<?php

    get_footer();