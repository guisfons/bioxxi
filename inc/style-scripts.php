<?php
define('ASSETS_VERSION','1');

/**
 * Enqueue scripts and styles that are used on every page
 * Dequeue unused scripts and styles
 */
function themeFiles() {

    wp_deregister_script('jquery');
    wp_dequeue_style('wp-block-library');
    
    wp_register_style('style', get_stylesheet_directory_uri() . '/assets/css/main.min.css', array(), ASSETS_VERSION, 'screen');
    wp_enqueue_style('style');

    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', array(), '3.7.1', true);
    wp_enqueue_script('jquery');

    wp_register_script('javascript', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), ASSETS_VERSION, true);
    wp_enqueue_script('javascript');
    
    enqueueTargetAssets(getTargetType());
}
add_action('wp_enqueue_scripts', 'themeFiles');

/**
 * Define pages that don't have template slug
 */
function getTargetType() {
    if ( is_front_page() ) {
        return "home";
    }

    if ( is_page('blog') ) {
        return "blog";
    }

    if ( is_page('privacidade') ) {
        return "privacidade";
    }

    if ( is_page('termos-de-uso') ) {
        return "termos-de-uso";
    }

    if ( is_page('trabalhe-conosco') ) {
        return "trabalhe-conosco";
    }

    if ( is_page('bioxxi-180o') ) {
        return "servicos-reprocessamento-180";
    }

    if ( is_page('bioxxi-360o') ) {
        return "servicos-reprocessamento-360";
    }

    if ( is_page('bioxxi-odonto') ) {
        return "servicos-reprocessamento-odonto";
    }

    if ( is_page('bioxxi-med') ) {
        return "servicos-reprocessamento-med";
    }

    if ( is_page('reprocessamento') ) {
        return "servicos-reprocessamento";
    }

    if ( is_page('gestao-de-cme') ) {
        return "servicos-gestao-cme";
    }

    if ( is_page('esterilizacao-industrial-2') || is_page('esterilizacao-industrial') ) {
        return "servicos-industrial";
    }

    if ( is_page('qualidade-e-certificacoes') ) {
        return "sobre-nos-qualidade-certificacoes";
    }


    if ( is_page('a-empresa') ) {
        return "sobre-nos-a-empresa";
    }

    if ( is_single() ) {
        return "single";
    }

    return str_replace(".php", "", basename(get_page_template_slug()));
}

/**
 * Set array of files (CSS & JS) that are used on pages
 */
function enqueueTargetAssets($page) {
    $pageAssetsConfig = (object) array(
        "home" => ["javascripts" => [""], "css" => ["home.min.css"], "type" => "page", "concat" => true],
        "blog" => ["javascripts" => ["blog.js"], "css" => ["blog.min.css"], "type" => "page", "concat" => true],
        "single" => ["javascripts" => [], "css" => ["single.min.css"], "type" => "page", "concat" => true],
        "privacidade" => ["javascripts" => [], "css" => ["privacidade.min.css"], "type" => "page", "concat" => true],
        "termos-de-uso" => ["javascripts" => [], "css" => ["termos-de-uso.min.css"], "type" => "page", "concat" => true],
        "trabalhe-conosco" => ["javascripts" => [], "css" => ["trabalhe-conosco.min.css"], "type" => "page", "concat" => true],
        "contato" => ["javascripts" => [], "css" => ["contato.min.css"], "type" => "page", "concat" => true],
        "servicos-reprocessamento-180" => ["javascripts" => [], "css" => ["servicos-reprocessamento-180.min.css"], "type" => "page", "concat" => true],
        "servicos-reprocessamento-360" => ["javascripts" => [], "css" => ["servicos-reprocessamento-360.min.css"], "type" => "page", "concat" => true],
        "servicos-reprocessamento-odonto" => ["javascripts" => [], "css" => ["servicos-reprocessamento-odonto.min.css"], "type" => "page", "concat" => true],
        "servicos-reprocessamento-med" => ["javascripts" => [], "css" => ["servicos-reprocessamento-med.min.css"], "type" => "page", "concat" => true],
        "servicos-gestao-cme" => ["javascripts" => [], "css" => ["servicos-gestao-cme.min.css"], "type" => "page", "concat" => true],
        "servicos-industrial" => ["javascripts" => [], "css" => ["servicos-industrial.min.css"], "type" => "page", "concat" => true],
        "servicos-reprocessamento" => ["javascripts" => [], "css" => ["servicos-reprocessamento.min.css"], "type" => "page", "concat" => true],
        "compliance" => ["javascripts" => [], "css" => ["compliance.min.css"], "type" => "page", "concat" => true],
        "sobre-nos-qualidade-certificacoes" => ["javascripts" => [], "css" => ["sobre-nos-qualidade-certificacoes.min.css"], "type" => "page", "concat" => true],
        "sobre-nos-a-empresa" => ["javascripts" => [], "css" => ["sobre-nos-a-empresa.min.css"], "type" => "page", "concat" => true],
    );

    if (property_exists($pageAssetsConfig, $page)) {
        $config = (object) $pageAssetsConfig->{$page};

        for ($i = 0; $i < count($config->javascripts); $i++) {
            $handle = "pl-js-{$page}-$i";
            wp_register_script($handle, get_stylesheet_directory_uri() . "/assets/js/pages/{$config->javascripts[$i]}", array('jquery'), ASSETS_VERSION, true);
            wp_enqueue_script($handle);

            if ($page === 'blog') {
                wp_localize_script($handle, "ajax_object", [
                    "ajax_url" => admin_url("admin-ajax.php"),
                ]);
            }
            
            if ($config->concat === false) {
                add_filter('js_do_concat', function ($do_concat, $handle) {
                if ($config->concat === false) {
                    return false;
                }
                return $do_concat;
                }, 10, 2);
            }
        }

        for ($i = 0; $i < count($config->css); $i++) {
            $handle = "pl-css-{$page}-$i";
            wp_register_style($handle, get_stylesheet_directory_uri() . "/assets/css/{$config->css[$i]}", array(), ASSETS_VERSION, "screen");
            wp_enqueue_style($handle);
            if ($config->concat === false) {
                add_filter('css_do_concat', function () {
                    return false;
                });
            }
        }
    }
}

function deleteJsAndCssEnqueueTargetAssetFromConcatenatedBundle($handle) {
    return false;
}

/**
 * Functions that call the files that the modules depend on
 */

function loadLibsScriptsForTemplate($file) {
    wp_register_script($file, get_stylesheet_directory_uri() . '/assets/lib/' . $file, array(), ASSETS_VERSION, true);
    wp_enqueue_script($file);
}

function loadModulesScriptsForTemplate($file) {
    wp_register_script($file, get_stylesheet_directory_uri() . '/assets/js/page-modules/' . $file, array(), ASSETS_VERSION, true);
    wp_enqueue_script($file);
}

function loadModulesCssForTemplate($file) {
    wp_register_style($file, get_stylesheet_directory_uri() . "/assets/css/" . $file, array(), ASSETS_VERSION, "screen");
    wp_enqueue_style($file);
}