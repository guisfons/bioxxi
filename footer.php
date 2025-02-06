</main>
<footer class="footer">
    <div class="footer__container">
        <?php wp_nav_menu( array( 
            'menu' => 'Footer',
            'container' => 'nav',
            'container_class' => 'footer__menu'
        ) ); ?>
        <figure><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/symbol-2.svg" alt="Icone Bioxxi"></figure>
        <div class="footer__contatos">
            <h4>Fale conosco</h4>
            <?php if (have_rows('contatos', 'option')): ?>
                <?php while (have_rows('contatos', 'option')): the_row(); ?>
                    <a href="<?php echo get_sub_field('link'); ?>" target="_blank" title="<?php echo get_sub_field('nome'); ?>"><img src="<?php echo get_sub_field('icone'); ?>" alt="<?php echo get_sub_field('nome'); ?>"><?php echo get_sub_field('label'); ?></a>
                <?php endwhile; ?>
            <?php endif; ?>
            <a href="<?php echo get_field('whatsapp', 'option'); ?>" target="_blank" title="Em caso de dúvidas ou para mais informações, fale conosco no Whastapp">
                <span>Em caso de dúvidas ou para mais informações, fale conosco no Whastapp</span>
                <figure><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/talk-balloon.svg" alt="Icone Whastapp"></figure>
            </a>
        </div>
        <div class="footer__redes">
            <a href="<?php echo get_field('instagram', 'option'); ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/img/icons/instagram.svg" alt="Instagram"></a>
            <a href="<?php echo get_field('facebook', 'option'); ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/img/icons/facebook-t.svg" alt="Facebook"></a>
            <a href="<?php echo get_field('linkedin', 'option'); ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/img/icons/in-t.svg" alt="Linkedin"></a>
            <a href="<?php echo get_field('youtube', 'option'); ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/img/icons/youtube.svg" alt="youtube"></a>
        </div>

        <span>© <?php echo date('Y'); ?> Bioxxi – Excelência em Esterilização LTDA. Todos os direitos reservados.</span>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>