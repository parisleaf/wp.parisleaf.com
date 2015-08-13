<?php

// DOCUMENTATION
// Shortcode: [author]
// Example: [author]
// To use: simply enter the shortcode, and the author block will be created

function pl_author($atts) {

  // Begin shortcode output
  ob_start();

  // Begin actual code to be outputted
?>

<footer class='Author'>
  <img alt="Image for <?php the_author(); ?>" src="<?php echo pl_get_avatar_url(get_avatar( get_the_author_meta( 'ID' ), 384)); ?>" class="avatar" height="384" width="384">
  <h5>About <?php the_author(); ?></h5>
  <p class="Author-content"><?php the_author_meta( 'description' ); ?></p>
</footer>

<?php

  // Return code itself to shortcode
  return ob_get_clean();
}

add_shortcode('author', 'pl_author');
