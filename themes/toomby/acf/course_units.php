<?php

if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_591044022780d',
        'title' => 'Course Units',
        'fields' => array(
            array(
                'key' => 'field_5910440ae3df9',
                'label' => 'Units',
                'name' => 'course_units',
                'type' => 'repeater',
                'instructions' => 'Fill out and order course units as applicable',
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
                'button_label' => 'Add Unit',
                'sub_fields' => array(
                    array(
                        'key' => 'field_59104422e3dfa',
                        'label' => 'Code',
                        'name' => 'code',
                        'type' => 'text',
                        'instructions' => 'Unit Code',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => 'AHCWHS000',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_59104441e3dfb',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'text',
                        'instructions' => 'Unit Description',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => 'Maintain property and structures',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
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
        'menu_order' => 60,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

endif;
