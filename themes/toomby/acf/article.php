<?php

if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
              'key' => 'group_5912505cd9c40',
              'title' => 'Article',
              'fields' => array(
                  array(
                      'key' => 'field_5912507350da2',
                      'label' => 'Author',
                      'name' => 'author',
                      'type' => 'text',
                      'instructions' => 'The person or business who wrote this article',
                      'required' => 1,
                      'conditional_logic' => 0,
                      'wrapper' => array(
                          'width' => '',
                          'class' => '',
                          'id' => ''
                      ),
                      'default_value' => '',
                      'placeholder' => '',
                      'prepend' => '',
                      'append' => '',
                      'maxlength' => ''
                  ),
                  array(
                      'key' => 'field_591250b950da5',
                      'label' => 'Teaser Text',
                      'name' => 'teaser_text',
                      'type' => 'text',
                      'instructions' => 'A brief teaser about the article to draw the attention of readers.',
                      'required' => 0,
                      'conditional_logic' => 0,
                      'wrapper' => array(
                          'width' => '',
                          'class' => '',
                          'id' => ''
                      ),
                      'default_value' => '',
                      'placeholder' => '',
                      'prepend' => '',
                      'append' => '',
                      'maxlength' => ''
                  )
              ),
              'location' => array(
                  array(
                      array(
                          'param' => 'post_type',
                          'operator' => '==',
                          'value' => 'article'
                      )
                  )
              ),
              'menu_order' => 0,
              'position' => 'normal',
              'style' => 'default',
              'label_placement' => 'top',
              'instruction_placement' => 'label',
              'hide_on_screen' => '',
              'active' => 1,
              'description' => ''
      ));

endif;
