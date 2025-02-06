<section class="wrapper highlight">
    <?php
    if(!is_page('a-empresa')) :
    ?>
    <a href="<?php echo get_field('link_destaque', 'option')?>" target="_blank">
        <figure><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/symbol-highlight.svg" alt="Ícone"></figure>
        <article><?php echo get_field('conteudo_destaque', 'option'); ?></article>
        <figure><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/symbol-highlight.svg" alt="Ícone"></figure>
    </a>
    <?php else : ?>
        <figure><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/symbol-highlight.svg" alt="Ícone"></figure>
        <article><?php echo get_field('conteudo_destaque'); ?></article>
        <figure><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/symbol-highlight.svg" alt="Ícone"></figure>
    <?php endif; ?>
</section>