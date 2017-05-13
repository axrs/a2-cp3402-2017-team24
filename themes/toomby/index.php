<?php
include_once("ToombyPost.php");
$post = new ToombyPost();
$context = Timber::get_context();
$context['site_options'] = get_fields('options');
$context['posts'] = Timber::get_posts();
$context['post'] = $post;

$templates = array('index.twig');

if (is_home() || is_front_page()) {
    array_unshift($templates, 'home.twig');
}

Timber::render($templates, $context);
