<?php

/**
 * Theme functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package itmidia
 * @since 1.0.0
 */

if (in_array(session_status(), [PHP_SESSION_NONE, 1])) {
	session_start();
}

/**
 * Composer autoload
 */
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once (__DIR__ . '/vendor/autoload.php');
}

/**
 * @todo improve to use namespaces and Helpers be a class
 */
require_once (__DIR__ . '/src/Helpers.php');
require_once(__DIR__ . '/inc/post-types.php');
#require_once(__DIR__ . '/inc/shortcodes/galleries.php');
#require_once(__DIR__ . '/inc/shortcodes/special-posts-videos.php');

/**
 * @info Security Tip
 * Remove version info from head and feeds
 */
add_filter('the_generator', 'wp_version_removal');

function wp_version_removal() {
    return false;
}

/**
 * @info Security Tip
 * Disable oEmbed Discovery Links and wp-embed.min.js
 */
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );
remove_action('rest_api_init', 'wp_oembed_register_route');
remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

/**
 * @bugfix Yoast fix wrong canonical url in production
 *
 * Set canonical URLs on non-production sites to the production URL
 */
#add_filter( 'wpseo_canonical', function( $canonical ) {
#	$canonical = preg_replace('#//[^/]*/#U', '//itmorum365.com.br/', trailingslashit( $canonical ) );
#	return $canonical;
#});

/**
 * Filter except length to 35 words.
 *
 * @param integer $length
 * @return integer
 */
function custom_excerpt_length( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
 * Add excerpt support for pages
 */
add_post_type_support( 'page', 'excerpt' );

/**
 * Remove Admin Bar from front-end
 */
add_filter('show_admin_bar', '__return_false');

/**
 * Disables block editor "Gutenberg"
 */
add_filter("use_block_editor_for_post_type", "use_gutenberg_editor");
function use_gutenberg_editor() {
    return false;
}

/**
 * Add support to thumbnails
 */
add_theme_support('post-thumbnails');

/**
 * @info this theme doesn't have custom thumbnails dimensions
 *
 * define the size of thumbnails
 * To enable featured images, the current theme must include
 * add_theme_support( 'post-thumbnails' ) and they will show the metabox 'featured image'
 */
add_image_size('company-size', 162, 81, false );
add_image_size('event-gallery', 490, 568, false );
/*add_image_size('slide-large', 1366, 400, true );
add_image_size('slide-extra-large', 2560, 749, true );*/


/**
 * Páginas Especiais
 */

if( function_exists('acf_add_options_page') ) {

   /* @info disabled by unused*/
    acf_add_options_page(array(
        'page_title' => 'Opções Gerais',
        'menu_title' => 'Opções Gerais',
        'menu_slug'  => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect'   => false,
        'icon_url'   => 'dashicons-admin-settings',
        'position'   => 2

    ));

    acf_add_options_page(array(
        'page_title' => 'Destaques',
        'menu_title' => 'Destaques',
        'menu_slug'  => 'uau-slides',
        'capability' => 'edit_posts',
        'redirect'   => false,
        'icon_url'   => 'dashicons-excerpt-view',
        'position'   => 3
	));

}


/**
 * Registering Locations of Navigation Menus
 */

function navigation_menus(){
    /* this function register a array of locations */
    register_nav_menus(
        array(
			'header-menu' => 'Menu Header',
        )
    );
}

add_action('init', 'navigation_menus');

/**
 * ACF Improvements
 * Order results by descendent date in relational fields
 *
 * @param array $args
 * @param array $field
 * @param integer $post_id
 * @return array
 */
function relational_fields_order( $args, $field, $post_id ) {
    $args['orderby'] = 'date';
	$args['order'] = 'DESC';
	return $args;
}
add_filter('acf/fields/relationship/query', 'relational_fields_order', 10, 3);

/**
 * ACF Improvements
 * Order results by descendent date in post object fields
 *
 * @param array $args
 * @param array $field
 * @param integer $post_id
 * @return array
 */
function post_objects_fields_order( $args, $field, $post_id ) {
    $args['orderby'] = 'date';
	$args['order'] = 'DESC';
	return $args;
}
add_filter('acf/fields/post_object/query', 'post_objects_fields_order', 10, 3);

/**
 * Declaring the JS files for the site
 */

function scripts() {
    wp_deregister_script("jquery");
}
add_action('wp_enqueue_scripts','scripts', 10); // priority 10


/**
 * Applying custom logo at WP login form
 */
function login_logo() {
?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url("<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.svg");
            width:260px;
            height:55px;
            background-size: contain;
            background-repeat: no-repeat;
        }
    </style>
<?php
}
add_action( 'login_enqueue_scripts', 'login_logo' );

function login_logo_url() {
    return home_url();
}

add_filter( 'login_headerurl', 'login_logo_url' );

function login_logo_url_title() {
    return 'IT Mídia';
}

add_filter( 'login_headertext', 'login_logo_url_title' );


/**
 * Declaring the JS files for the site
 */
add_action('wp_enqueue_scripts','scripts', 10); // priority 10

REQUIRE_ONCE('inc/style-scripts.php');


/**
 * Pagination of posts in pages
 */
function pagination($pages = '', $range = 4) {
   $showitems = ($range * 2) + 1;

   global $paged;
   if (empty($paged)) $paged = 1;

   if ($pages == '') {
      global $wp_query;
      $pages = $wp_query->max_num_pages;
      if (!$pages) {
         $pages = 1;
      }
   }

   if (1 != $pages) {
      echo "<div class=\"pagination__arrow\">";
      if ($paged > 1 && $showitems < $pages) echo "<a href='" . get_pagenum_link($paged - 1) . "'><svg width=\"10\" height=\"17\"><use xlink:href=\"" . get_template_directory_uri() . "/assets/img/SVG/sprite.svg#p-arrow-left\"></use></svg>Anterior</a>";
      echo "</div>";

      echo '<div class="pagination__numbers">';
      for ($i = 1; $i <= $pages; $i++) {
         if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
            echo ($paged == $i) ? "<a href=\"\" class=\"active\">" . $i . "</a>" : "<a href='" . get_pagenum_link($i) . "'>" . $i . "</a>";
         } elseif ($i == $paged) {
            echo '<a href=\"\" class=\"active\">' . $i . '</a>';
         }
      }
      echo '</div>';

      echo "<div class=\"pagination__arrow pagination__arrow--right\">";         
      if ($paged < $pages && $showitems < $pages) echo "<a href='" . get_pagenum_link($paged + 1) . "'>Próxima<svg width=\"10\" height=\"17\"><use xlink:href=\"" . get_template_directory_uri() .  "/assets/img/SVG/sprite.svg#p-arrow-right\"></use></svg></a>";
      echo "</div>";
   }
}

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
        return $data;
    }

    $filetype = wp_check_filetype( $filename, $mimes );
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4 );
  
function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );
  
function fix_svg() {
    echo '<style type="text/css">
            .attachment-266x266, .thumbnail img {
                width: 100% !important;
                height: auto !important;
            }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );

function gui_get_page_id_by_title($title) {
    $args = array(
        'post_type'   => 'page',
        'post_status' => 'publish',
        'title'       => $title,
        'posts_per_page' => 1,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $query->the_post();
        $page_id = get_the_ID();
        wp_reset_postdata();
        return $page_id;
    }

    wp_reset_postdata();
    return null;
}

function calculate_reading_time($content) {
    $reading_speed = 1000;
    $char_count = strlen(strip_tags($content));
    $reading_time = ceil($char_count / $reading_speed);
    return $reading_time;
}

function display_related_posts() {
    global $post;

    // Get the current post ID
    $current_post_id = $post->ID;

    // Get categories of the current post
    $categories = wp_get_post_categories($current_post_id);

    if ($categories) {
        // WP_Query arguments
        $args = array(
            'category__in' => $categories, // Match any of the current post's categories
            'post__not_in' => array($current_post_id), // Exclude the current post
            'posts_per_page' => 3,
            'orderby' => 'rand',
        );

        // Custom query
        $related_query = new WP_Query($args);

        // Check if there are related posts
        if ($related_query->have_posts()) {
            echo '<section class="wrapper leia-tambem">
                <h3 class="leia-tambem__title"><img src="'. esc_url(get_template_directory_uri() . '/assets/img/icons/symbol.svg') . '" alt="Leia também">Leia também</h3>';

            while ($related_query->have_posts()) : $related_query->the_post(); ?>
                    <div class="leia-tambem__card">
                        <figure>
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('full'); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/image.png'); ?>" alt="Placeholder">
                            <?php endif; ?>
                        </figure>
                        <h4><?php the_title(); ?></h4>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            Continue Lendo
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/arrow-right.svg" alt="Seta">
                        </a>
                    </div>
            <?php endwhile;

            echo '</section>';

            wp_reset_postdata();
        }
    }
}

function semi_circle($image_id, $title, $text, $mais_procurado) { ?>
    <article class="semi-circle <?php echo ($mais_procurado ? 'semi-circle--mais-procurado' : ''); ?>">
        <?php
        if($image_id) {
            echo '<figure><hr/><img src="' . wp_get_attachment_image_url($image_id, "full") . '" alt="' . $title . '"></figure>';
        }
        if ($title) {
            echo '<h4>' . $title . '</h4>';
        }
        if ($text) {
            echo '<p>' . $text . '</p>';
        }
        ?>
    </article>
<?php
}

function load_more_posts() {
    $paged = $_POST['page'] + 1;
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 6,
        'paged' => $paged
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()): $query->the_post();
            render_blog_card();
        endwhile;
    else :
        echo ''; // No more posts
    endif;

    wp_die(); // Don't forget to call this to properly end the AJAX request
}
add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');

function filter_blog_posts() {
    $assunto = isset($_POST['assunto']) ? sanitize_text_field($_POST['assunto']) : '';
    $search = isset($_POST['s']) ? sanitize_text_field($_POST['s']) : '';

    $args = [
        'post_type'      => 'post',
        'posts_per_page' => 10,
        's'              => $search,
    ];

    if (!empty($assunto)) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'category', // Change if using tags
                'field'    => 'slug',
                'terms'    => $assunto,
            ],
        ];
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            render_blog_card();
        }
    } else {
        echo "<p>Nenhum post encontrado.</p>";
    }

    wp_die(); // Important for AJAX calls
}
add_action("wp_ajax_filter_blog_posts", "filter_blog_posts");
add_action("wp_ajax_nopriv_filter_blog_posts", "filter_blog_posts"); // Allow non-logged-in users

function render_blog_card() {
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
            <a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><h2><?php echo get_the_title(); ?></h2></a>
            <p><?php echo wp_trim_words(get_the_content(), 100, '...'); ?></p>
            <a href="<?php echo get_permalink(); ?>" class="blog__card-link" title="<?php echo get_the_title(); ?>">Continue lendo <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/arrow-right.svg" alt="Seta"></a>
        </article>
    </div>
<?php
}