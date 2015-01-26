<?php

require_once('acf.php');
require_once('custom-post-types/project.php');
require_once('taxonomies/project_tag.php');
require_once('shortcodes/copy_container.php');

/**
 * Force set permalink structure
 */
function pl_set_permalinks() {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure( '/blog/%postname%' );// you can change /%postname%/ to any structure
}
add_action( 'init', 'pl_set_permalinks' );
