<?php

if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_591afc7282f4a',
        'title' => 'Course Files',
        'fields' => array(
            array(
                'key' => 'field_591afc4d190d7',
                'label' => 'Files',
                'name' => 'files',
                'type' => 'repeater',
                'instructions' => 'Add attachments to the course',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '',
                'min' => 0,
                'max' => 0,
                'layout' => 'table',
                'button_label' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'field_591afcd9e5b66',
                        'label' => 'File',
                        'name' => 'file',
                        'type' => 'file',
                        'instructions' => 'Provide an attached for the course',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'id',
                        'library' => 'all',
                        'min_size' => '',
                        'max_size' => '',
                        'mime_types' => 'pdf',
                    ),
                ),
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
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

endif;
