<?php
// $contato_id = gui_get_page_id_by_title('Contato');
?>
<section class="contato__content" id="contato">
    <div class="wrapper">
        <h2><?php echo get_field('titulo_formulario'); ?></h2>
        <h3><?php echo get_field('subtitulo_formulario'); ?></h3>
        <?php
            $form = get_field('formulario');
            echo do_shortcode('[contact-form-7 id="' . $form->ID . '" title="' . $form->post_title . '"]');
        ?>
    </div>
</section>