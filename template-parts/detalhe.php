<section class="wrapper detalhe">
    <div class="detalhe__card">
        <figure><?php echo wp_get_attachment_image(get_field('1_detalhe_icone'), 'full'); ?></figure>
        <article><?php echo get_field('1_detalhe_texto'); ?></article>
    </div>
    <div class="detalhe__card">
        <figure><?php echo wp_get_attachment_image(get_field('2_detalhe_icone'), 'full'); ?></figure>
        <article><?php echo get_field('2_detalhe_texto'); ?></article>
    </div>
</section>