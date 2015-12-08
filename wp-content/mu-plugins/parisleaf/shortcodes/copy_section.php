<?php
// SHORTCODE: Copy Section
// input: [section modifiers]content[/section]
// output:
// <div class="CopySection">
//   <div class="CopySection-inner">
//     $content
//   </div>
//  </div>

function pl_is_flag( $flag, $atts ) {
  foreach ( $atts as $key => $value )
    if ( $value === $flag && is_int( $key ) ) return true;
  return false;
}

function pl_copy_section( $atts, $content = null ) {
	// Clean atts
  $clean_atts = array_map('sanitize_text_field', $atts);

	// Set section classes
	$classes = ['CopySection'];
	if ( pl_is_flag( 'full', $clean_atts ) ) {
		$classes[] = 'CopySection--full';
	} else {
		$classes[] = 'CopySection--contain';
	}
	
	if ( pl_is_flag( 'spaced', $clean_atts ) ) {
		$classes[] = 'CopySection--spaced';
	}

	// Begin shortcode output
	ob_start();

?>

<div class="<?php echo implode($classes, ' '); ?>">
  <?php echo do_shortcode($content); ?>
</div>

<?php

	return ob_get_clean();
}

add_shortcode( 'section', 'pl_copy_section' );
