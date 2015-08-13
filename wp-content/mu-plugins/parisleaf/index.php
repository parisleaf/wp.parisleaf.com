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
 function pl_custom_excerpt($excerpt = '') {
  $raw_excerpt = $excerpt;
  if ( $excerpt == '' ) {
    $excerpt = get_the_content('');
    $excerpt = strip_shortcodes( $excerpt );
    // $excerpt = do_shortcode( $excerpt );
    $excerpt = apply_filters( 'the_content', $excerpt );
    $excerpt_length = apply_filters( 'excerpt_length', 55 );
    $excerpt_more = apply_filters( 'excerpt_more', '...' );
    $excerpt = wp_trim_words( $excerpt, $excerpt_length, $excerpt_more );
  }
  return apply_filters('wp_trim_excerpt', $excerpt, $raw_excerpt);
 }
 remove_filter( 'get_the_excerpt', 'wp_trim_excerpt', 10 );
 add_filter( 'get_the_excerpt', 'pl_custom_excerpt', 10 );

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
