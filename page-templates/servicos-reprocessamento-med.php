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
<section style="display: flex;justify-content: center;margin: 17rem 0;"><a href="#contato"><figure><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2025/01/med1.png" alt=""></figure></a></section>
<section style="display: flex;justify-content: center;margin: 17rem 0;"><figure><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2025/01/CUSTO-MEDIO-mensal-DE-ESTERILIZACAO-EM-CONSULTORIO-1.webp" alt="" class="w100"></figure></section>
<?php get_template_part('template-parts/reprocessamento/highlight');?>
<?php get_template_part('template-parts/reprocessamento/highlight-2');?>
<?php    
    get_template_part('template-parts/form');
    get_footer();