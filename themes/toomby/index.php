<?php
$context = Timber::get_context();
$context['site_options'] = get_fields('options');
$context['posts'] = Timber::get_posts();

$templates = array('index.twig');

if (is_home()) {
    array_unshift($templates, 'home.twig');
}

Timber::render($templates, $context);
