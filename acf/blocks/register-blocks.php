<?php
add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {
	// Check function exists.
	if( function_exists('acf_register_block_type') ) {
		// register a testimonial block.block-cta-images
		acf_register_block_type(array(
			'name'              => 'woo-product-lift',
			'title'             => __('Woo Product Lift'),
			'description'       => __('A custom product lift block.'),
			'render_template'   => 'acf/blocks/woo-product-lift.php',
			'category'          => 'formatting',
			'icon'              => 'admin-comments',
			'keywords'          => array( 'woo','product','lift','testimonial', 'quote' ),
		));
        acf_register_block_type(array(
            'name'              => 'cta-images',
            'title'             => __('CTA images'),
            'description'       => __('A custom product lift block.'),
            'render_template'   => 'acf/blocks/cta-images.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'cta','image','lift' ),
        ));
        acf_register_block_type(array(
            'name'              => 'service-boxes',
            'title'             => __('Service boxes'),
            'description'       => __('A custom service boxes block.'),
            'render_template'   => 'acf/blocks/service-boxes.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'service','boxes','lift' ),
        ));
        acf_register_block_type(array(
            'name'              => 'recent-posts',
            'title'             => __('Recent posts'),
            'description'       => __('A custom recent posts block.'),
            'render_template'   => 'acf/blocks/recent-posts.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'recent','posts','lift' ),
        ));
        acf_register_block_type(array(
            'name'              => 'reference-posters',
            'title'             => __('Reference posters'),
            'description'       => __('A custom reference posters block.'),
            'render_template'   => 'acf/blocks/reference-posters.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'recent','posts','lift' ),
        ));
        acf_register_block_type(array(
            'name'              => 'hero-carousel',
            'title'             => __('Hero carousel'),
            'description'       => __('A custom carousel hero block.'),
            'render_template'   => 'acf/blocks/hero-carousel.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'hero','image','carousel' ),
        ));
        acf_register_block_type(array(
            'name'              => 'hero-video',
            'title'             => __('Hero video'),
            'description'       => __('A custom video hero block.'),
            'render_template'   => 'acf/blocks/hero-video.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'hero','image' ),
        ));
        acf_register_block_type(array(
            'name'              => 'hero-large',
            'title'             => __('Hero large'),
            'description'       => __('A custom video large block.'),
            'render_template'   => 'acf/blocks/hero-large.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'hero','image', 'large' ),
        ));
        acf_register_block_type(array(
            'name'              => 'hero-subpage',
            'title'             => __('Hero subpage'),
            'description'       => __('A custom subpage hero block.'),
            'render_template'   => 'acf/blocks/hero-subpage.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'hero','image' ),
        ));
        acf_register_block_type(array(
            'name'              => 'image-text',
            'title'             => __('Image and text'),
            'description'       => __('A custom image and text block.'),
            'render_template'   => 'acf/blocks/image-text.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'text','image' ),
        ));
        acf_register_block_type(array(
            'name'              => 'image-text-muffe',
            'title'             => __('Image and text muffe'),
            'description'       => __('A custom image and text block.'),
            'render_template'   => 'acf/blocks/image-text-muffe.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'text','image', 'muffe' ),
        ));
        acf_register_block_type(array(
            'name'              => 'image-cta',
            'title'             => __('Image CTA'),
            'description'       => __('A custom image cta block.'),
            'render_template'   => 'acf/blocks/image-cta.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'text','image','cta' ),
        ));
        acf_register_block_type(array(
            'name'              => 'contact',
            'title'             => __('contact'),
            'description'       => __('A custom contact block.'),
            'render_template'   => 'acf/blocks/contact.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'text','image', 'contact' ),
        ));
        acf_register_block_type(array(
            'name'              => 'cta',
            'title'             => __('cta'),
            'description'       => __('A custom call to action block.'),
            'render_template'   => 'acf/blocks/cta.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'text','cta', 'button' ),
        ));
        acf_register_block_type(array(
            'name'              => 'contact-boxes',
            'title'             => __('contact-boxes'),
            'description'       => __('A custom contact block.'),
            'render_template'   => 'acf/blocks/contact-boxes.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'text','image', 'contact', 'boxes' ),
        ));
        acf_register_block_type(array(
            'name'              => 'form',
            'title'             => __('form'),
            'description'       => __('A custom form block.'),
            'render_template'   => 'acf/blocks/form.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'text','image', 'form' ),
        ));
        acf_register_block_type(array(
            'name'              => 'services',
            'title'             => __('Services lift boxes'),
            'description'       => __('A custom service lift block.'),
            'render_template'   => 'acf/blocks/services.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'text','image', 'service' ),
        ));
        acf_register_block_type(array(
            'name'              => 'references',
            'title'             => __('references lift boxes'),
            'description'       => __('A custom references lift block.'),
            'render_template'   => 'acf/blocks/references.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'text','image', 'references' ),
        ));
        acf_register_block_type(array(
            'name'              => 'people',
            'title'             => __('People lift boxes'),
            'description'       => __('A custom people lift block.'),
            'render_template'   => 'acf/blocks/people.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'text','image', 'persones' ),
        ));
        acf_register_block_type(array(
            'name'              => 'footer-contact',
            'title'             => __('Footer Contact'),
            'description'       => __('A custom contact block.'),
            'render_template'   => 'acf/blocks/footer-contact.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'footer', 'contact' ),
        ));
	}
}