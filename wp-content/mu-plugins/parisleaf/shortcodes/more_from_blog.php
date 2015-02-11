<?php

function pl_more_from_blog($atts, $content = null) {

    ob_start();

    if(count($atts) == 2) {
?>
        <div class="more_from_blog" data-blog_1="<?php echo $atts['blog_1']; ?>" data-blog_2="<?php echo $atts['blog_2']; ?>">Hello world </div>
<?php
    }
    return ob_get_clean();
}

add_shortcode('more_from_blog', 'pl_more_from_blog');
