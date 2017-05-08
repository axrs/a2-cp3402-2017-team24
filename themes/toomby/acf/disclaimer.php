<?php

if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_5910487162256',
        'title' => 'Disclaimer',
        'fields' => array(
            array(
                'key' => 'field_591048751c42d',
                'label' => 'Disclaimer',
                'name' => 'disclaimer',
                'type' => 'wysiwyg',
                'instructions' => 'Provide a disclaimer about the content (if required)',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 0,
                'delay' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'division',
                ),
            ),
        ),
        'menu_order' => 50,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

endif;
