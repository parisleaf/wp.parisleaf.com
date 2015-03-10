<?php

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
}
add_action( 'init', 'pl_set_permalinks' );

/**
 * Responsive video embeds
 */
function pl_format_responsive_embeds($html, $url, $attr) {
  return '<div class="ResponsiveEmbed">'.$html.'</div>';
}
add_filter('embed_oembed_html', 'pl_format_responsive_embeds', 10, 3);
