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
            render_blog_card();
        endwhile;
        echo '<button class="blog__more">Ver mais postagens</button>';
        echo '</section>';
    else :
        echo '<p>' . esc_html__('No posts found.', 'your-theme') . '</p>';
    endif;

    wp_reset_postdata();

    get_footer();