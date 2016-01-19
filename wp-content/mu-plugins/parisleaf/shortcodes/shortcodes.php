<?php

function pl_is_flag( $flag, $atts ) {
  foreach ( $atts as $key => $value )
    if ( $value === $flag && is_int( $key ) ) return true;
  return false;
}

require_once('accordion_slice.php');
require_once('accordion.php');
require_once('author.php');
require_once('blockquote.php');
require_once('color_block.php');
require_once('copy_section.php');
require_once('grid_cell.php');
require_once('grid.php');
require_once('image_gallery.php');
require_once('more_from_blog.php');
require_once('slider.php');
require_once('video.php');
