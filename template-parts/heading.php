<?php
$title = '';
$blog_id = gui_get_page_id_by_title('Blog');

if(is_single()) {
    $title = 'Blog';
} else {
    $title = get_the_title();
}

$parent_id = wp_get_post_parent_id(get_the_ID());

if ($parent_id) {
    $title = get_the_title($parent_id);
}
?>

<section class="heading">
    <div class="wrapper heading__container">
        <figure class="heading__figure">
            <img width="150" height="117.04" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/icons/symbol.svg'); ?>" alt="<?= $title; ?>">
        </figure>
        <div class="heading__text">
            <?php if (is_single()) : ?>
                <span class="heading__title"><?php echo esc_html($title); ?></span>
                <p class="heading__subtitle"><?php echo get_field('subtitulo', $blog_id); ?></p>
            <?php elseif ($parent_id) : ?>
                <p class="heading__title"><?php echo esc_html($title); ?></p>
                <h1 class="heading__subtitle"><?php echo get_field('subtitulo'); ?></h1>
            <?php else : ?>
                <h1 class="heading__title"><?php echo esc_html($title); ?></h1>
                <p class="heading__subtitle"><?php echo get_field('subtitulo'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>