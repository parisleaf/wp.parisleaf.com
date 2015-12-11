<?php

// SHORTCODE: Cell
//
// input: [cell]content[/cell]

function pl_cell($atts, $content = null) {

  // Clean atts
  $clean_atts = array_map('sanitize_text_field', $atts);

  // Set grid classes
  $classes = [
    'Grid-cell',
  ];

  // Add modifiers
  if ( pl_is_flag( 'top', $clean_atts ) ) {
    $classes[] = 'Grid-cell--top';
  }
  if ( pl_is_flag( 'center', $clean_atts ) ) {
    $classes[] = 'Grid-cell--center';
  }
  if ( pl_is_flag( 'bottom', $clean_atts ) ) {
    $classes[] = 'Grid-cell--bottom';
  }

  // Begin shortcode output
  ob_start();

?>

<div class="<?= implode(' ', $classes); ?>">
  <?= $content; ?>
</div>

<?php

  return ob_get_clean();
}

add_shortcode('cell', 'pl_cell');
