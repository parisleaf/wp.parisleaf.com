<?php

// DOCUMENTATION
// Shortcode: [blockquote]
// Example: [blockquote speaker="Joseph Furlott"]Lorem ipsum quote content goes here[/blockquote]
// To use: enter speaker as parameter, and quote text inbetween tags

function pl_blockquote($atts, $content = null) {

  // Begin shortcode output
  ob_start();

?>

<blockquote class='Blockquote'>
  <div class='Blockquote-content'><svg name="quote" class="Blockquote-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#quote"></use></svg><?php echo $content; ?></div>
<?php if(array_key_exists('speaker', $atts)) { ?>
  <footer class="Blockquote-footer"><?php echo $atts['speaker'];  ?></footer>
<?php } ?>
</blockquote>

<?php

  // Return code itself to shortcode
  return ob_get_clean();
}

add_shortcode('blockquote', 'pl_blockquote');
