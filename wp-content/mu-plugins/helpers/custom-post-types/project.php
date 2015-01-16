<?php

function cpt_project() {
  $labels = array(
    'name'               => _x( 'Projects', 'post type general name' ),
    'singular_name'      => _x( 'Project', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'project' ),
    'add_new_item'       => __( 'Add New Project' ),
    'edit_item'          => __( 'Edit Project' ),
    'new_item'           => __( 'New Project' ),
    'all_items'          => __( 'All Projects' ),
    'view_item'          => __( 'View Project' ),
    'search_items'       => __( 'Search Projects' ),
    'not_found'          => __( 'No projects found' ),
    'not_found_in_trash' => __( 'No projects found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Projects'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Projects and case studies',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => false,
  );
  register_post_type( 'project', $args ); 
}
add_action( 'init', 'cpt_project' );

?>