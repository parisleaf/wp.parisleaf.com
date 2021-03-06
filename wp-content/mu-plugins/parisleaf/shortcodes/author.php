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
    <?php
      $avatar_args = array(
        'scheme' => 'https'
      );
      echo get_avatar( get_the_author_meta( 'ID' ), 384, '', 'Image for post author.', $avatar_args);
    ?>
    <h4>About <?php the_author(); ?></h4>
    <p class="Author-content"><?php the_author_meta( 'description' ); ?></p>
  </footer>

<?php

  // Return code itself to shortcode
  return ob_get_clean();
}

add_shortcode('author', 'pl_author');
