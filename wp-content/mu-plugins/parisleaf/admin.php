<?php

/**
 * Customize admin login screen
 */
function pl_set_admin_logo() {
  echo '<style type="text/css">
    h1 a { background-image:url(https://parisleaf.com/img/admin-logo.png) !important; }
  </style>';
}
add_action( 'login_head', 'pl_set_admin_logo' );

function pl_set_admin_logo_url() {
  return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'pl_set_admin_logo_url' );

function pl_set_admin_logo_url_title() {
  return 'Parisleaf';
}
add_filter( 'login_headertitle', 'pl_set_admin_logo_url_title' );

/**
 * Show except meta box for posts
 */
function pl_change_default_hidden( $hidden, $screen ) {
  $post_type = $screen->post_type;
  if ( $post_type == 'post' ) {
    $hidden = array_flip($hidden);
    unset($hidden['postexcerpt']); //show excerpt box
    $hidden = array_flip($hidden);
    // $hidden[] = 'pageparentdiv'; //hide page attributes
    return $hidden;
  }
  return $hidden;
}
add_filter( 'default_hidden_meta_boxes', 'pl_change_default_hidden', 10, 2 );
