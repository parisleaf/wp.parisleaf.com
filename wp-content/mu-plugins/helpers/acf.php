<?php

function get_id_by_slug($wpdb, $slug) {
  $id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$slug."'");
  return $id;
}

if(function_exists("register_field_group"))
{
  /**
   * Home page
   */
	register_field_group(array (
		'id' => 'acf_home-page',
		'title' => 'Home Page',
		'fields' => array (
			array (
				'key' => 'field_54b6b76d2c768',
				'label' => 'First Impression Title',
				'name' => 'first_impression_title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54b6b7752c769',
				'label' => 'First Impression Subtitle',
				'name' => 'first_impression_subtitle',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
      array (
				'key' => 'field_54bd1da0b1103',
				'label' => 'First Impression Case Study',
				'name' => 'first_impression_project',
				'type' => 'post_object',
				'instructions' => 'Case study to feature on the home page.',
				'post_type' => array (
					0 => 'project',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => get_id_by_slug($wpdb, 'home'),
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

  /**
   * Projects
   */
  register_field_group(array (
		'id' => 'acf_projects',
		'title' => 'Projects',
		'fields' => array (
      array (
				'key' => 'field_54c10df2ea40d',
				'label' => 'Hero Image',
				'name' => 'hero_image',
				'type' => 'image',
				'instructions' => 'Large, full-width image that displays at the top of individual project pages. Make sure the white Parisleaf logo and menu icon remain visible when placed on top.',
				'required' => 1,
				'save_format' => 'object',
				'preview_size' => 'large',
				'library' => 'all',
			),
			array (
				'key' => 'field_54bd19358a2d9',
				'label' => 'Tagline',
				'name' => 'tagline',
				'type' => 'text',
				'instructions' => 'Brief tagline or teaser describing the project.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'project',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}



?>
