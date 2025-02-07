<?php
	get_header();
	get_template_part('template-parts/banner');
?>

<!-- 1 seção -->
<?php
if (have_rows('1_secao')) {
    while (have_rows('1_secao')) {
        the_row();
?>
<section class="wrapper intro">
	<article><?php echo get_sub_field('conteudo'); ?></article>
	
	<div class="intro__highlights">
		<?php
		if (have_rows('destaques')) :
			while (have_rows('destaques')) : the_row(); ?>
			<div class="intro__highlight">
				<h3 style="color: <?php echo get_sub_field('cor_destaque')?>"><?php echo get_sub_field('titulo'); ?></h3>
				<p><?php echo get_sub_field('subtitulo'); ?></p>
			</div>
		<?php
			endwhile;
		endif;
		?>
	</div>
	<?php
	if (have_rows('informacoes')) {
		echo '<div class="informacoes">';
		while (have_rows('informacoes')) {
			the_row();
			$icone = get_sub_field('icone');
			$texto = get_sub_field('texto');

			echo '<div class="informacoes__item">';
			if ($icone) {
				echo '<figure><img src="' . esc_url($icone['url']) . '" alt="' . esc_attr($icone['alt']) . '"></figure>';
			}
			if ($texto) {
				echo '<div class="informacoes__texto">';
				echo apply_filters('the_content', $texto);
				echo '</div>';
			}
			echo '</div>';
		}
		echo '</div>';
	}
	?>
</section>
<?php }
} ?>

<!-- 2 seção -->
<?php $secao2 = get_field('2_secao');
if ($secao2): ?>
	<section class="wrapper servicos">
		<?php if (!empty($secao2['titulo'])): ?>
			<h2 class="title"><?php echo esc_html($secao2['titulo']); ?></h2>
		<?php endif; ?>

		<?php if (!empty($secao2['servico'])): ?>
			<div class="servicos__container">
				<?php foreach ($secao2['servico'] as $servico): ?>
					<div class="servico__item" style="border-color: <?php echo esc_attr($servico['cor']); ?>;">
						<h3 style="color: <?php echo esc_attr($servico['cor']); ?>;"><?php echo esc_html($servico['titulo']); ?></h3>
						<?php if (!empty($servico['icone'])): ?>
							<img src="<?php echo wp_get_attachment_url($servico['icone']); ?>" alt="Ícone do serviço">
						<?php endif; ?>
						<div class="servico__conteudo">
							<?php echo $servico['conteudo']; ?>
						</div>
						<?php if (!empty($servico['link'])): ?>
							<a href="<?php echo esc_url($servico['link']); ?>" style="background-color: <?php echo esc_attr($servico['cor']); ?>">Quero conhecer</a>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</section>
<?php endif; ?>

<!-- Certificações -->
<?php get_template_part('template-parts/certificacoes'); ?>

<!-- Blog -->

<section class="blog">
	<div class="wrapper blog__heading">
		<h2 class="title title--left"><span>Blog <span>Tudo que você precisa saber sobre esterilização</span></span></h2>
		<a href="<?php echo get_permalink( get_page_by_path( 'blog' ) ); ?>">Ver mais</a>
	</div>
	<div class="blog__container">
		<?php
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 3,
			'orderby' => 'date',
			'order' => 'DESC',
		);
		$query = new WP_Query($args);
		if ($query->have_posts()):
			while ($query->have_posts()):
				$query->the_post();
				?>
				<div class="blog__item">
					<figure class="blog__imagem">
						<?php if (has_post_thumbnail()) : ?>
							<?php the_post_thumbnail('medium'); ?>
						<?php else : ?>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/image.png" alt="<?php the_title(); ?>">
						<?php endif; ?>
					</figure>
					<div class="blog__conteudo">
						<h3><?php the_title(); ?></h3>
						<span><?php the_date(); ?></span>
						<a href="<?php the_permalink(); ?>">Leia mais <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/arrow-right.svg" alt="Seta"></a>
					</div>
				</div>
			<?php endwhile;
			wp_reset_postdata();
		endif;
		?>
	</div>
</section>

<?php
    get_footer();