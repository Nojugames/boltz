<?php
add_action( 'plugins_loaded', 'my_plugin_override' );

if(function_exists('pll_register_string')) {
    pll_register_string( 'Adress', 'Adress' );
    pll_register_string( 'Ring', 'Ring' );
    pll_register_string( 'Telefon', 'Telefon' );
    pll_register_string( 'E-post', 'E-post' );
    pll_register_string( 'Skicka e-post', 'Skicka e-post' );
}

function my_plugin_override() {
    if (!function_exists('pll__')) {
        function pll__($string) {
            return strip_tags(strval($string));
        }
    }
}

