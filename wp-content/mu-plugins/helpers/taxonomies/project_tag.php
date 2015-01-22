<?php

add_action( 'init', 'create_project_taxonomies', 0 );

function create_project_taxonomies() {

	$tag_labels = array(
		'name'                       => _x( 'Project Tags', 'taxonomy general name' ),
		'singular_name'              => _x( 'Project Tag', 'taxonomy singular name' ),
		'search_items'               => __( 'Search Project Tags' ),
		'popular_items'              => __( 'Popular Project Tags' ),
		'all_items'                  => __( 'All Project Tags' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Project Tag' ),
		'update_item'                => __( 'Update Project Tag' ),
		'add_new_item'               => __( 'Add New Project Tag' ),
		'new_item_name'              => __( 'New Project Tag' ),
		'separate_items_with_commas' => __( 'Separate tags with commas' ),
		'add_or_remove_items'        => __( 'Add or remove tags' ),
		'choose_from_most_used'      => __( 'Choose from the most used tags' ),
		'not_found'                  => __( 'No tags found.' ),
		'menu_name'                  => __( 'Project Tags' ),
	);

	$tag_args = array(
		'hierarchical'          => false,
		'labels'                => $tag_labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => false,
	);

	register_taxonomy( 'project_tag', 'project', $tag_args );

	$service_labels = array(
		'name'                       => _x( 'Services', 'taxonomy general name' ),
		'singular_name'              => _x( 'Service', 'taxonomy singular name' ),
		'search_items'               => __( 'Search Services' ),
		'popular_items'              => __( 'Popular Services' ),
		'all_items'                  => __( 'All Services' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Service' ),
		'update_item'                => __( 'Update Service' ),
		'add_new_item'               => __( 'Add New Service' ),
		'new_item_name'              => __( 'New Service' ),
		'separate_items_with_commas' => __( 'Separate services with commas' ),
		'add_or_remove_items'        => __( 'Add or remove services' ),
		'choose_from_most_used'      => __( 'Choose from the most used services' ),
		'not_found'                  => __( 'No services found.' ),
		'menu_name'                  => __( 'Services' ),
	);

	$service_args = array(
		'hierarchical'          => false,
		'labels'                => $service_labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => false,
	);

	register_taxonomy( 'project_service', 'project', $service_args );
}
