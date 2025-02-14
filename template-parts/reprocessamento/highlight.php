<section class="wrapper highlight">
    <?php
    if(!is_page('a-empresa')) :
    ?>
    <figure><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/symbol-highlight.svg" alt="Ícone"></figure>
    <article><?php echo get_field('conteudo_destaque', 'option'); ?></article>
    <figure><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/symbol-highlight.svg" alt="Ícone"></figure>
    <?php else : ?>
        <figure><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/symbol-highlight.svg" alt="Ícone"></figure>
        <article><?php echo get_field('conteudo_destaque'); ?></article>
        <figure><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/symbol-highlight.svg" alt="Ícone"></figure>
    <?php endif; ?>
</section>