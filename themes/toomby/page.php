<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * To generate specific templates for your pages you can use:
 * /mytheme/views/page-mypage.twig
 * (which will still route through this PHP file)
 * OR
 * /mytheme/page-mypage.php
 * (in which case you'll want to duplicate this file and save to the above path)
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

include_once("ToombyPost.php");

$context = Timber::get_context();
$post = new ToombyPost();
$context['post'] = $post;

if ($post->slug == 'about-us' || $post->slug == 'about') {
    $staff_query = array(
        'post_type' => 'staff',
        'orderby' => 'rand'
    );
    $context ['staff'] = Timber::get_posts($staff_query);
}

Timber::render(array('page-' . $post->post_name . '.twig', 'page.twig'), $context);
