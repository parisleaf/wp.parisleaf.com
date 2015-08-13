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
    // $wp_rewrite->flush_rules( false );
    $wp_rewrite->set_permalink_structure( '/blog/%postname%' );// you can change /%postname%/ to any structure
}
add_action( 'init', 'pl_set_permalinks' );

/**
 * Remove inline dimensions from images
 */
add_filter( 'get_image_tag', 'remove_width_and_height_attribute', 10 );
add_filter( 'post_thumbnail_html', 'remove_width_and_height_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_and_height_attribute', 10 );

function remove_width_and_height_attribute( $html ) {
  return preg_replace( '/(height|width)="\d*"\s/', "", $html );
}

/**
 * Responsive video embeds
 */
function pl_format_responsive_embeds($html, $url, $attr) {
  return '<div class="ResponsiveEmbed">'.$html.'</div>';
}
add_filter('embed_oembed_html', 'pl_format_responsive_embeds', 10, 3);

/**
 * Get the avatar image url and replace http with https
 */
function pl_get_avatar_url($get_avatar){
  preg_match("/src=\"(.*?)\"/i", $get_avatar, $matches);
  $url = $matches[1];
  $url = preg_replace("/http:\/\//i", "https://", $url, 1);
  return $url;
}
