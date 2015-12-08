<?php

require_once('acf.php');
require_once('custom-post-types/project.php');
require_once('taxonomies/project_tag.php');
require_once('shortcodes/shortcodes.php');

/**
 * Customize admin login screen
 */
function pl_set_admin_logo() {
  echo '<style type="text/css">
    h1 a { background-image:url("https://parisleaf.com/img/admin-logo.png") !important; }
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
 * Add editor styles
 */
 function pl_add_editor_styles() {
   // Tell the TinyMCE editor to use a custom stylesheet
   add_editor_style(get_template_directory().'/editor-style.css');
 }
 add_action('after_setup_theme', 'pl_add_editor_styles');

/**
 * Force set permalink structure on admin page load
 */
function pl_set_permalinks() {
  global $wp_rewrite;
  $wp_rewrite->set_permalink_structure( '/blog/%postname%' );// you can change /%postname%/ to any structure
  $wp_rewrite->flush_rules();
}
add_action( 'admin_init', 'pl_set_permalinks' );

/**
 * Remove inline dimensions from images
 */
function remove_width_and_height_attribute( $html ) {
  return preg_replace( '/(height|width)="\d*"\s/', "", $html );
}
add_filter( 'get_image_tag', 'remove_width_and_height_attribute', 10 );
add_filter( 'post_thumbnail_html', 'remove_width_and_height_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_and_height_attribute', 10 );

/**
 * Responsive video embeds
 */
function pl_format_responsive_embeds( $html ) {
  return '<div class="ResponsiveEmbed aligncenter">'.$html.'</div>';
}
add_filter('embed_oembed_html', 'pl_format_responsive_embeds', 10);

/**
 * Fix shortcode auto paragraph bs
 */
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop', 99);
add_filter( 'the_content', 'shortcode_unautop', 100 );
