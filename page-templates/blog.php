<?php
    /**
     * Template Name: Blog
     * Template Post Type: page
     *
     * @package UAU
     * @since 1.0.0
     */

    get_header();

	get_template_part('template-parts/heading');
?>

<section class="wrapper filtro">
    <label>
        <select name="assunto" id="assunto">
            <option value="" selected>Filtrar por assunto</option>
            <?php
            $categories = get_categories();
            foreach ($categories as $category) {
                echo '<option value="' . $category->slug . '">' . $category->name . '</option>';
            }
            ?>
        </select>
    </label>
    <label>
        <input type="search" id="search" name="s" placeholder="O que você procura?" />
        <button class="filtro__buscar">Buscar</button>
    </label>
</section>

<?php
    $args = array(
        'post_type' => 'post',
        'order' => 'DESC',
        'posts_per_page' => 6,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        echo '<section class="wrapper blog__container">';
        while ($query->have_posts()) : $query->the_post();
        ?>
        <div class="blog__card">
            <figure class="blog__card-image">
                <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail('medium');
                } else {
                    echo '<img src="' . get_template_directory_uri() . '/assets/img/image.png" alt="Placeholder image">';
                }
                ?>
            </figure>
            <article class="blog__card-content">
                <span class="blog__card-date"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/calendar.svg" alt="Data">Postado em <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('d \d\e F \d\e Y'); ?></time></span>
                <hr>
                <div class="blog__card-categories">
                    <?php
                    $categories = get_the_category();
                    if ($categories) {
                        foreach ($categories as $category) {
                            echo '<span>' . esc_html($category->name) . '</span> ';
                        }
                    }
                    ?>
                </div>
                <h2><?php echo get_the_title(); ?></h2>
                <p><?php echo wp_trim_words(get_the_content(), 100, '...'); ?></p>
                <a href="<?php echo get_permalink(); ?>" class="blog__card-link">Continue lendo <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/arrow-right.svg" alt="Seta"></a>
            </article>
        </div>
        <?php
        endwhile;
        echo '<button class="blog__more">Ver mais postagens</button>';
        echo '</section>';
    else :
        echo '<p>' . esc_html__('No posts found.', 'your-theme') . '</p>';
    endif;

    wp_reset_postdata();

    get_footer();