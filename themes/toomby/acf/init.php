<?php

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'General Settings',
        'menu_title' => 'Settings',
        'menu_slug' => 'theme-general-settings'
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Contact Details',
        'menu_title' => 'Contact Details',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Company Values',
        'menu_title' => 'Values & Missions',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Social Media Settings',
        'menu_title' => 'Social Media',
        'parent_slug' => 'theme-general-settings',
    ));
}

include_once('additional_sections.php');
include_once('contact_details.php');
include_once('course_units.php');
include_once('disclaimer.php');
include_once('frequently_asked_questions.php');
include_once('hero.php');
include_once('social_media_links.php');
include_once('sponsor.php');
include_once('staff.php');
include_once('values.php');

add_filter('acf_the_content', 'wpautop');
