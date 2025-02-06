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

<section class="cme__intro">
    <div class="wrapper cme__container">
        <article>
            <?php the_content(); ?>
        </article>
        <figure><img src="<?php echo get_template_directory_uri() ?>/assets/img/icons/symbol-3.svg" alt="Ornamento"></figure>
    </div>
</section>

<?php get_template_part('template-parts/detalhe'); ?>
<?php get_template_part('template-parts/form'); ?>
<?php
    get_footer();