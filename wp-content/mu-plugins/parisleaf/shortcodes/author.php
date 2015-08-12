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
  <?php echo get_avatar( get_the_author_meta( 'ID' ), 256); ?>
  <h5>About <?php the_author(); ?></h5>
  <p><?php the_author_meta( 'description' ); ?></p>
</footer>

<?php

  // Return code itself to shortcode
  return ob_get_clean();
}

add_shortcode('author', 'pl_author');
