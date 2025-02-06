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
		<div class="esterilizar__box">
			<span>Pequenos fabricantes a grandes indústrias que produzem EPIs, como jalecos, capotes, mascaras de TNT, protetores faciais, etc.</span>
			<span>Fabricantes nacionais e internacionais que produzem dispositivos médicos como próteses de silicone, válvulas, cateteres, materiais ventilatórios, etc.</span>
		</div>
    </section>
    <section class="wrapper esterilizar">
        <h3 class="esterilizar__title">Itens a serem esterilizados</h3>
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

<section class="metodo_esterilizacao">
    <figure><img src="<?php echo esc_url(get_home_url(get_template_directory_uri())); ?>/assets/img/icons/double-arrow.svg" alt="Ornamento"></figure>
    <article></article>
    <figure><img src="<?php echo esc_url(get_home_url(get_template_directory_uri())); ?>/assets/img/icons/double-arrow.svg" alt="Ornamento"></figure>
</section>

<?php get_template_part('template-parts/reprocessamento/cards'); ?>

<?php get_template_part('template-parts/form'); ?>
<?php
    get_footer();