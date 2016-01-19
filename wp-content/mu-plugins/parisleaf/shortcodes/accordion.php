<?php

// SHORTCODE: Accordion
//
// input: [accordion][slice][/accordion]
// description: Generates the parent wrapper for video accordions

function pl_accordion($atts, $content=null) {

    // Begin shortcode output
    ob_start();

    // Begin actual code to be outputted
    echo '<div class="Accordion">';

    echo do_shortcode($content);

    echo '</div>';

    return ob_get_clean();
}

add_shortcode('accordion', 'pl_accordion');
