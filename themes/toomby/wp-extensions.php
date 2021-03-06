<?php

function my_acf_settings_dir($dir)
{
    $dir = get_stylesheet_directory_uri() . '/plugins/advanced-custom-fields-pro/';
    return $dir;
}

add_filter('acf/settings/dir', 'my_acf_settings_dir');

include_once('plugins/advanced-custom-fields-pro/acf.php');
include_once('acf/init.php');

/**
 * Registers menus with the WordPress administration interface for user population
 */
function register_my_menus()
{
    register_nav_menus(
        array(
            'main_menu' => __('Main Menu'),
            'footer_left_menu' => __('Footer Left'),
            'footer_middle_menu' => __('Footer Middle'),
            'footer_right_menu' => __('Footer Right')
        )
    );
}

add_action('init', 'register_my_menus');

/**
 * Registers new post types with WordPress for improved content separation
 */
function create_post_types()
{
    register_post_type('sponsor',
        array(
            'labels' => array(
                'name' => __('Sponsors'),
                'singular_name' => __('Sponsor')
            ),
            'public' => true,
            'has_archive' => false,
        )
    );
    register_post_type('division',
        array(
            'labels' => array(
                'name' => __('Divisions'),
                'singular_name' => __('Division')
            ),
            'public' => true,
            'has_archive' => false,
        )
    );
    register_post_type('clinic',
        array(
            'labels' => array(
                'name' => __('Clinics'),
                'singular_name' => __('Clinic')
            ),
            'public' => true,
            'has_archive' => false,
        )
    );
    register_post_type('staff',
        array(
            'labels' => array(
                'name' => __('Staff'),
                'singular_name' => __('Staff')
            ),
            'public' => true,
            'has_archive' => false,
        )
    );
}

add_action('init', 'create_post_types');
