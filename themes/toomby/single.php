<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$post = Timber::query_post();
$context['post'] = $post;

$related_query = array(
    'post_type' => $post->post_type,
    'post__not_in' => array($post->ID),
    'orderby' => ($post->post_type == 'staff') ? 'rand' : 'desc',
    'posts_per_page' => ($post->post_type == 'staff') ? 4 : 3
);

$context['related_posts'] = Timber::get_posts($related_query);

if (post_password_required($post->ID)) {
    Timber::render('single-password.twig', $context);
} else {
    Timber::render(array('single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig'), $context);
}
