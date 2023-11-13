<?php

// Get CSS from Parent Theme
function enqueue_styles(){
    $parenthandle = 'parent-style';
    $theme = wp_get_theme();
    wp_enqueue_style(
        $parenthandle,
        get_template_directory_uri() . '/style.css',
        array(),
        $theme->parent()->get('Version')
    );
    wp_enqueue_style(
        'child-style',
        get_stylesheet_uri(),
        array($parenthandle),
        $theme->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

// Initialize vendor libraries
require_once __DIR__ . '/vendor/autoload.php';

// Enqueue Vendor Scripts
// Bootstrap
wp_enqueue_style('bootstrap', get_template_directory_uri() . '-child/vendor/twbs/bootstrap/dist/css/bootstrap.min.css', array(), '' );
wp_enqueue_script('bootstrap', get_template_directory_uri() . '-child/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js', array( 'jquery' ), '', true );
wp_enqueue_script('bootstrap', get_template_directory_uri() . '-child/vendor/twbs/bootstrap/dist/js/bootstrap.min.js', array( 'jquery' ), '', true );