<?php

function custom_theme_setup() {
	add_theme_support( 'menus' );
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );
