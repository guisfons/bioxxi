<?php
global $post;
if(get_field('banner_avancado')) {
$gradient_class = get_field('gradiente') ? ' banner--gradient' : '';
$reprocessamento_class = (strpos($_SERVER['REQUEST_URI'], 'reprocessamento') !== false) ? ' banner--reprocessamento' : '';
$background_style = !get_field('com_video') ? ' style="background-image: url(\'' . get_field('imagem') . '\');"' : '';
?>
<section class="banner<?php echo $gradient_class . $reprocessamento_class; ?>"<?php echo $background_style; ?>>
    <?php if(get_field('com_video')) { ?>
        <div class="banner__video">
            <!-- <video src="<?php echo get_field('video'); ?>" autoplay loop muted poster="<?php echo get_field('imagem'); ?>"></video> -->
            <video src="<?php echo get_field('video'); ?>" autoplay loop muted></video>
        </div>
    <?php } ?>
    <?php if(!is_page('bioxxi-med') && !is_page('bioxxi-odonto') && !is_page('bioxxi-360o') && !is_page('bioxxi-180o') && !is_page('gestao-de-cme')) { ?>
    <div class="wrapper">
        <div class="banner__content"><?php echo get_field('conteudo'); ?></div>
    </div>
    <?php } ?>
</section>
<?php if(is_page('bioxxi-med') || is_page('bioxxi-odonto') || is_page('bioxxi-360o') || is_page('bioxxi-180o')) { ?>
<section class="wrapper descricao">
    <article>
    <?php if(get_field('conteudo_em_duas_colunas')) { ?>
        <div class="descricao__left"><?php echo get_field('conteudo_esquerda') ?></div>
        <div class="descricao__right"><?php echo get_field('conteudo_direita') ?></div>
    <?php } else {
        $content = get_field('conteudo');
        echo '<div class="descricao__single">' . $content . '</div>';
    }
    ?>
    </article>
</section>
<?php } ?>
<?php if(is_page('gestao-de-cme')) { ?>
<section class="banner-intro">
    <div class="wrapper">
        <article><?php echo get_field('conteudo'); ?></article>
        <figure><img src="<?php echo get_template_directory_uri() ?>/assets/img/icons/symbol-3.svg" alt="Ornamento"></figure>
    </div>
</section>
<?php }
} ?>