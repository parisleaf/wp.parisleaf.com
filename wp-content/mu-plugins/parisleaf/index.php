<?php

require_once('admin.php');
require_once('acf.php');
require_once('custom-post-types/project.php');
require_once('taxonomies/project_tag.php');
require_once('shortcodes/shortcodes.php');

/**
 * Force set permalink structure
 */
function pl_set_permalinks() {
  global $wp_rewrite;
  $wp_rewrite->set_permalink_structure( '/blog/%postname%' );// you can change /%postname%/ to any structure
  $wp_rewrite->flush_rules();
}
add_action('after_switch_theme', 'pl_set_permalinks');

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
function pl_format_responsive_embeds($html, $url, $attr) {
  return '<div class="ResponsiveEmbed">'.$html.'</div>';
}
add_filter('embed_oembed_html', 'pl_format_responsive_embeds', 10, 3);
