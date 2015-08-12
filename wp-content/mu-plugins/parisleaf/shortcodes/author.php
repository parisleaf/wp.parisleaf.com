<?php

// DOCUMENTATION
// Shortcode: [author]
// Example: [author]
// To use: simply enter the shortcode, and the author block will be created

function pl_author() {

  // Begin shortcode output
  ob_start();

  // Begin actual code to be outputted
?>

<footer class='Author'>
  <h5>About <?php the_author(); ?></h5>
  <p><?php get_the_author_meta('description'); ?></p>
</footer>

<?php

  // Return code itself to shortcode
  return ob_get_clean();
}

add_shortcode('author', 'pl_author');
