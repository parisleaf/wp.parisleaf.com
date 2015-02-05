<?php
// Shortcode copy_container
// pass img through for img half width image like [shortcode img="/path/to/img"]


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
	$classes = ['HTMLContentArea'];
    if(is_array($atts)) {
	  if (in_array('primary', $atts)) $classes[] = 'HTMLContentArea--primary';
	  if (in_array('secondary', $atts)) $classes[] = 'HTMLContentArea--secondary';
    }
	if ($a['background_color']) {
		$style[] = 'background-color: '.$a['background_color'].';';
	}
	if ($a['text_color']) {
		$style[] = 'color: '.$a['text_color'].';';
	}
	// Begin shortcode output
	ob_start();
?>
<div class="<?php echo implode($classes, ' '); ?>" <?php echo count($style) ? 'style="'.implode($style).'"' : ''?>>
<?php
    if((is_array($atts))) {
      if((array_key_exists('img', $atts))) { //no image
?>
        <div class="copy_container">
          <div class="copy_container-content">
            <?php echo do_shortcode($content); ?>
          </div>
          <div class='copy_container-img'>
            <img src="<?php echo $atts['img'] ?>">
          </div>
        </div>
<?php
       } else {
?>
         <div class="SiteContainer">
           <?php echo do_shortcode($content); ?>
         </div>
<?php
       }
     } else { //there is not an image, so site container 
?>
	  <div class="SiteContainer">
        <?php echo do_shortcode($content); ?>
 	  </div>
<?php
      } 
    
?>
</div>
<?php
	return ob_get_clean();
}
add_shortcode( 'copy_container', 'pl_copy_container' );
