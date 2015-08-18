<?php

// DOCUMENTATION
// Shortcode: [video]
// Example: [video url="/path/to/htmlcompatibleivdeo.ogv"]

function pl_video($atts, $content=null) {


    // Begin shortcode output
    ob_start();

    // Begin actual code to be outputted
    echo '<div class="video-shortcode aligncenter" data-content="'.$content.'" data-src="'.$atts['src'].'"><video src="'.$atts['src'].'">';
    echo $content;
    echo '</video></div>';

    return ob_get_clean();
}

add_shortcode('video', 'pl_video');
