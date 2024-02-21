<?php


function use_editor_styles() {
    add_theme_support( 'editor-styles' );
    add_editor_style( get_stylesheet_directory_uri() . '/dist/css/theme.css' );
}
add_action( 'after_setup_theme', 'use_editor_styles' );


function noju_enqueue() {
	// Using purged files atm, change if necessary.

	//wp_register_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;700&display=swap', '1.0.0' );
	wp_register_style( 'noju-style', get_stylesheet_directory_uri() . '/dist/css/theme.css', array(), '2.0.10' );
	//wp_register_style( 'noju-style', get_stylesheet_directory_uri() . '/dist/css/theme.css', array(), '2.0.2' );

	wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/dist/js/bootstrap.min.js', array('jquery'), '5.0.3', true );
	//wp_enqueue_style( 'google-fonts' );
	wp_enqueue_style( 'noju-style' );
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'bootstrap-js' );
}

add_action( 'wp_enqueue_scripts', 'noju_enqueue' );

function wpdocs_theme_add_editor_styles() {
    add_editor_style( get_stylesheet_directory_uri() . '/dist/css/theme.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );