<?php

function my_theme_enqueue_styles() {

    $parent_style = 'zerif-lite-style'; 
    
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css?2510171240',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function dequeue_parent_styles() {
    wp_dequeue_style( 'zerif_style' );
    wp_deregister_style( 'zerif_style' );
}
add_action( 'wp_print_styles', 'dequeue_parent_styles' );
