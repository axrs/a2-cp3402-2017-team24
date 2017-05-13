<?php

include_once('wp-extensions.php');

function my_acf_google_map_api( $api )
{
    $api['key'] = 'AIzaSyAAFdy6HjA3FwsSAniy2Znro161tBK2t2M';
    return $api;
};

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

if (!class_exists('Timber')) {
    add_action('admin_notices', function () {
        echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url(admin_url('plugins.php#timber')) . '">' . esc_url(admin_url('plugins.php')) . '</a></p></div>';
    });

    add_filter('template_include', function ($template) {
        return get_stylesheet_directory() . '/static/no-timber.html';
    });

    return;

}

Timber::$dirname = array('templates', 'views');

class StarterSite extends TimberSite
{
    function __construct()
    {
        add_theme_support('post-formats');
        add_theme_support('post-thumbnails');
        add_theme_support('menus');
        add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
        add_filter('timber_context', array($this, 'add_to_context'));
        add_filter('get_twig', array($this, 'add_to_twig'));
        add_action('init', array($this, 'register_post_types'));
        add_action('init', array($this, 'register_taxonomies'));
        parent::__construct();
    }

    function register_post_types()
    {
        //this is where you can register custom post types
    }

    function register_taxonomies()
    {
        //this is where you can register custom taxonomies
    }

    function add_to_context($context)
    {
        $context['menu'] = new TimberMenu();
        $context['site_options'] = get_fields('options');
        // Other menu items
        $locations = get_nav_menu_locations();
        $menus = array('footer_right_menu', 'footer_middle_menu', 'footer_left_menu');
        foreach ($menus as $m) {
            if ($locations[$m]) {
                $context[$m] = new TimberMenu($m);
            }
        }
        $context['site'] = $this;
        return $context;
    }

    function add_to_twig($twig)
    {
        /* this is where you can add your own functions to twig */
        $twig->addExtension(new Twig_Extension_StringLoader());
        return $twig;
    }

}

new StarterSite();
