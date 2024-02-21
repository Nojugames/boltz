<?php

/**
 * Create Footer Logo Setting and Upload Control
 */
function noju_footer_logo_customizer_settings( $wp_customize ) {
// add a setting for the site logo
	$wp_customize->add_setting( 'noju_footer_logo' );
// Add a control to upload the logo
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'noju_footer_logo',
		array(
			'label'    => 'Footer Logo',
			'section'  => 'title_tagline',
			'settings' => 'noju_footer_logo',
		) ) );
}

add_action( 'customize_register', 'noju_footer_logo_customizer_settings');