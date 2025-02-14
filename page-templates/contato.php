<?php
    /**
     * Template Name: Contato
     * Template Post Type: page
     *
     * @package UAU
     * @since 1.0.0
     */

    get_header();
    get_template_part('template-parts/heading');
    get_template_part('template-parts/intro');
    get_template_part('template-parts/form');
?>
<section class="wrapper escritorios">
    <div class="escritorios__intro">
        <article>
            <h2>Onde ficam <br/> <strong>nossos escritórios</strong></h2>
            <p>Converse com um especialista e veja como começar a economizar custos e ajudar o meio ambiente.</p>
        </article>
        <figure><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/symbol.svg" alt="Ornamento"></figure>
    </div>
    <div class="escritorios__cards">
    <?php
    if (have_rows('escritorios', 'option')):
        while (have_rows('escritorios', 'option')): the_row();
            $escritorio = get_sub_field('escritorio');
            echo '<article class="escritorios__card">'.$escritorio.'</article>';
        endwhile;
    endif;
    ?>
    </div>
</section>
<?php
    get_footer();