<?php

// DOCUMENTATION
// Shortcode: [color_block]
// Example: [color_block]#f00,#0f0,#00f[/color_block]
// To use: Enter hexcodes as CSV within the shortcode opening/closing tags

function pl_color_block($atts, $content = null) {

    $colors = str_getcsv($content); // hex codes are now in an array
    
    // Begin shortcode output
    ob_start();
    
    // Begin actual code to be outputted
    
    echo "<div class='color_block'>";
    foreach($colors as $color) {
        echo "<div class='color_block-color' style='background-color:".$color.";'></div>";
    }
    echo "</div>";
    
    // Return code itself to shortcode
    return ob_get_clean();
}

add_shortcode('color_block', 'pl_color_block');