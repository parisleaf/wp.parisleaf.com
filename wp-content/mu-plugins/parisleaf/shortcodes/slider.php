<?php

// DOCUMENTATION
// Shortcode: [slider]
// Example: [slider]image.png,image1.png,image2.png[/slider]

function pl_slider($atts, $content=null) {
    
    $images = str_getcsv($content);

    // Begin shortcode output
    ob_start();
    
    // Begin actual code to be outputted
    echo '<div class="Slider">';
    foreach($images as $image) {
        echo '<img src="'.$image.'"/>';
    }
    echo '</div>';

    return ob_get_clean();
}

add_shortcode('slider', 'pl_slider');