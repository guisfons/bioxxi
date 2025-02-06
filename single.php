<?php

/**
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package UAU
 * @since 1.0.0
 */

get_header();
get_template_part('template-parts/heading');
$content = get_the_content();
$reading_time = calculate_reading_time($content);
?>
<section class="wrapper single">
    <a href="javascript:history.back()" class="single__goback"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/arrow-right.svg" alt="Voltar">Voltar</a>
    <div class="single__header">
        <figure class="single__image">
        <?php
        if (has_post_thumbnail()) {
            the_post_thumbnail('medium');
        } else {
            echo '<img src="' . get_template_directory_uri() . '/assets/img/image.png" alt="Placeholder image">';
        }
        ?>
        </figure>
        <div class="single__heading">
            <span class="single__info"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/calendar.svg" alt="Data">Postado em <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('d \d\e F \d\e Y'); ?></time></span>
            <span class="single__info"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/clock.svg" alt="Tempo de leitura"><?php echo $reading_time; ?> minutos de leitura</span>

            <h1 class="single__title"><?php echo get_the_title(); ?></h1>
            <div class="single__categories">
                <?php
                $categories = get_the_category();
                if ($categories) {
                    foreach ($categories as $category) {
                        echo '<span>' . esc_html($category->name) . '</span> ';
                    }
                }
                ?>
            </div>
            <span class="single__authors">Por <?php echo get_the_author(); ?></span>
        </div>
    </div>
    <article class="single__content">
        <?php the_content($content); ?>
    </article>

    <div class="single__share">
        <span>Gostou? Compartilhe!</span>
        <?php
            $post_url = urlencode(get_permalink());
            $post_title = rawurlencode(get_the_title());

            $facebook_link = "https://www.facebook.com/sharer/sharer.php?u={$post_url}";
            $email_link = "mailto:?subject={$post_title}&body=" . rawurlencode("Check out this post: ") . $post_url;
            $whatsapp_link = "https://wa.me/?text=" . rawurlencode($post_title . ' ' . get_permalink());
            $linkedin_link = "https://www.linkedin.com/shareArticle?mini=true&url={$post_url}&title={$post_title}";
            $x_link = "https://twitter.com/intent/tweet?text={$post_title}&url={$post_url}";
        ?>
        <a href="<?php echo $facebook_link; ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/facebook.svg" alt="Facebook"></a>
        <a href="<?php echo $email_link; ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/email.svg" alt="Email"></a>
        <a href="<?php echo $whatsapp_link; ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/whatsapp.svg" alt="WhatsApp"></a>
        <a href="<?php echo $linkedin_link; ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/in.svg" alt="LinkedIn"></a>
        <a href="<?php echo $x_link; ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/x.svg" alt="X"></a>
    </div>
</section>

<?php display_related_posts(); ?>

<?php get_footer();
