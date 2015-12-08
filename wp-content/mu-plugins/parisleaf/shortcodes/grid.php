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
    'Grid--center',
  ];

  // Add modifiers
  if ( pl_is_flag( 'gutters', $clean_atts ) ) {
    $classes[] = 'Grid--gutters';
  }

  // Begin shortcode output
  ob_start();

?>

<div class="aligncenter">
  <div class="<?= implode(' ', $classes); ?>">
    <?= do_shortcode($content); ?>
  </div>
</div>

<?php

  return ob_get_clean();
}

add_shortcode('grid', 'pl_grid');
