<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_5909206e8dc3b',
	'title' => 'Social Media Links',
	'fields' => array (
		array (
			'key' => 'field_59091fdd5afdc',
			'label' => 'Facebook URL',
			'name' => 'facebook_url',
			'type' => 'url',
			'instructions' => 'Facebook Group or Page URL link',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'https://www.facebook.com/groups/<your group id here>',
		),
		array (
			'key' => 'field_59092002f15d0',
			'label' => 'Twitter URL',
			'name' => 'twitter_url',
			'type' => 'url',
			'instructions' => 'Twitter Account URL link',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'https://twitter.com/<your name here>',
		),
		array (
			'key' => 'field_59092021f15d1',
			'label' => 'LinkedIn URL',
			'name' => 'linkedin_url',
			'type' => 'url',
			'instructions' => 'LinkedIn Profile URL',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'https://www.linkedin.com/company/<your company here>',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-social-media',
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
