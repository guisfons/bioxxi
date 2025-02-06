<section class="certificacoes">
    <?php if(is_front_page()) { ?>
        <div class="wrapper certificacoes__heading">
            <h3><?= get_field('titulo_certificacoes', 'option'); ?></h3>
            <p><?= get_field('subtitulo_certificacoes', 'option'); ?></p>
        </div>
    <?php
    }
    if (have_rows('certificacoes', 'option')) : ?>
        <div class="wrapper certificacoes__container">
        <?php while (have_rows('certificacoes', 'option')) : the_row(); ?>
            <div class="certificacoes__item">
                <figure><?php echo wp_get_attachment_image(get_sub_field('icone'), 'full'); ?></figure>
                <article>
                    <h4><?php echo get_sub_field('titulo'); ?></h4>
                    <p><?php echo get_sub_field('descricao'); ?></p>
                </article>
            </div>
        <?php endwhile; ?>
        </div>
    <?php endif; ?>
</section>