<?php
if(get_field('banner_avancado')) {
$gradient_class = get_field('gradiente') ? ' banner--gradient' : '';
$reprocessamento_class = (strpos($_SERVER['REQUEST_URI'], 'reprocessamento') !== false) ? ' banner--reprocessamento' : '';
$background_style = !get_field('com_video') ? ' style="background-image: url(\'' . get_field('imagem') . '\');"' : '';
?>
<section class="banner<?php echo $gradient_class . $reprocessamento_class; ?>"<?php echo $background_style; ?>>
    <?php if(get_field('com_video')) { ?>
        <div class="banner__video">
            <video src="<?php echo get_field('video'); ?>" autoplay loop muted poster="<?php echo get_field('imagem'); ?>"></video>
        </div>
        </div>
    <?php } ?>
    <?php if(!is_page('bioxxi-med') && !is_page('bioxxi-odonto') && !is_page('bioxxi-360o') && !is_page('bioxxi-180o')) { ?>
    <div class="wrapper">
        <div class="banner__content"><?php echo get_field('conteudo'); ?></div>
    </div>
    <?php } ?>
</section>
<?php if(is_page('bioxxi-med') || is_page('bioxxi-odonto') || is_page('bioxxi-360o') || is_page('bioxxi-180o')) { ?>
<section class="wrapper descricao">
    <article>
    <?php
    $content = get_field('conteudo');
    if (preg_match('/<h[1-6][^>]*>.*?<\/h[1-6]>/', $content, $heading_match)) {
        $heading = $heading_match[0];
        $remaining_content = str_replace($heading, '', $content);
    
        // if (preg_match('/<p[^>]*>.*?<\/p>/', $remaining_content, $paragraph_match)) {
        //     $first_paragraph = $paragraph_match[0];
        //     $remaining_content = str_replace($first_paragraph, '', $remaining_content);
        // } else {
        //     $first_paragraph = '';
        // }
        ?>
        <div class="descricao__left">
            <?php echo $heading; ?>
            <!-- <?php echo $first_paragraph; ?> -->
        </div>
        <div class="descricao__right">
            <?php echo $remaining_content; ?>
        </div>
        <?php
    } else {
        echo '<div class="descricao__single">' . $content . '</div>';
    }
    ?>
    </article>
</section>
<?php
    }
} ?>