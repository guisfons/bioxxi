<section class="wrapper highlight-2">
    <a href="#contato" title="Link ancora formulário de contato">
        <article><?php echo (get_field('conteudo_destaque_2') ? get_field('conteudo_destaque_2') : get_field('conteudo_destaque', 'option')); ?></article>
        <figure><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/symbol.svg" alt="Ícone"></figure>
    </a>
</section>