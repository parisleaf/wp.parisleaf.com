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
