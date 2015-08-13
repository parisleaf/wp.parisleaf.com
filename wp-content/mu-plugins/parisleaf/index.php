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
 * Pre-process excerpt to remove shortcodes
 */
 function pl_custom_excerpt( $text ) {
   // Creates an excerpt if needed; and shortens the manual excerpt as well
   global $post;
  $raw_excerpt = $text;
  if ( '' == $text ) {
    $text = get_the_content('');
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
  }

   $text = strip_tags($text);
   $excerpt_length = apply_filters('excerpt_length', 55);
   $excerpt_more = apply_filters('excerpt_more', '...');
   $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );

   return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
 }
 remove_filter('get_the_excerpt', 'wp_trim_excerpt');
 add_filter('get_the_excerpt', 'pl_custom_excerpt', 999);

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
  preg_match("/src=\"(.*?)\"/", $get_avatar, $matches);
  $url = $matches[1];
  $url = preg_replace("/http:\/\//", "https://", $url);
  return $url;
}
