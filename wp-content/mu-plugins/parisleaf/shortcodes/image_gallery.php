<?php

// DOCUMENTATION
// A two column image gallery with 0% gutters.  Stacks on mobile.
// To use: Enter urls as CSV within the shortcode opening/closing tags

function pl_image_gallery($atts, $content = null) {

    $links = str_getcsv($content); // Urls to images are now strings in array
    
    // Begin shortcode output
    ob_start();
    
    // Begin actual code to be outputted
    
    echo "<div class='image_gallery'>";
    foreach($links as $link) {
        echo "<div class='image_gallery-image'><img src='".$link."'></div>";
    }
    echo "</div>";
    
    // Return code itself to shortcode
    return ob_get_clean();
}

add_shortcode('image_gallery', 'pl_image_gallery');