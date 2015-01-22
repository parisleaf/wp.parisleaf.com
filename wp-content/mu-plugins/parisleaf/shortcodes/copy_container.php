<?php

use Mexitek\PHPColors\Color;

function pl_copy_container( $atts, $content = null ) {
	$a = shortcode_atts( array(
      'background_color' => null,
      'text_color' => null,
  ), $atts );

	if (is_null($a['text_color']) && !is_null($a['background_color'])) {
		$background_color = new Color($a['background_color']);
		$a['text_color'] = $background_color->isDark() ? '#e2eaf2' : '#343844';
	}

	$style = [];
	$classes = ['CopyContainer'];

	if (in_array('primary', $atts)) $classes[] = 'CopyContainer--primary';
	if (in_array('secondary', $atts)) $classes[] = 'CopyContainer--secondary';

	if ($a['background_color']) {
		$style[] = 'background-color: '.$a['background_color'].';';
	}

	if ($a['text_color']) {
		$style[] = 'color: '.$a['text_color'].';';
	}

	// Begin shortcode output
	ob_start();
?>
<div class="<?php echo implode($classes, ' ') ?>" <?php echo count($style) ? 'style="'.implode($style).'"' : ''?>>
	<div class="SiteContainer">
		<?php echo $content; ?>
	</div>
</div>
<?php
	return ob_get_clean();
}

add_shortcode( 'copy_container', 'pl_copy_container' );
