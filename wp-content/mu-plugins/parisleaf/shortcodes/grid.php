<?php

// SHORTCODE: Grid
//
// input: [grid modifiers]content[/grid]

function pl_grid($atts, $content = null) {
  // Clean atts
  $clean_atts = array_map('sanitize_text_field', $atts);

  // Set grid classes
  $classes = [
    'Grid',
    'Grid--full',
    'Grid--lgFit',
  ];

  // Add modifiers
  if ( pl_is_flag( 'top', $clean_atts ) ) {
    $classes[] = 'Grid--top';
  }
  if ( pl_is_flag( 'center', $clean_atts ) ) {
    $classes[] = 'Grid--center';
  }
  if ( pl_is_flag( 'bottom', $clean_atts ) ) {
    $classes[] = 'Grid--bottom';
  }
  if ( pl_is_flag( 'gutters', $clean_atts ) ) {
    $classes[] = 'Grid--gutters';
  }
  if ( pl_is_flag( 'space', $clean_atts ) ) {
    $classes[] = 'Grid--space';
  }
  if ( pl_is_flag( 'extend', $clean_atts ) ) {
    $classes[] = 'Grid--extend';
  }

  // Begin shortcode output
  ob_start();

?>

<div class="<?= implode(' ', $classes); ?>">
  <?= do_shortcode($content); ?>
</div>

<?php

  return ob_get_clean();
}

add_shortcode('grid', 'pl_grid');
