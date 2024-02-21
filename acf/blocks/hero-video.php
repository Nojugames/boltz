<?php

/**
 * Custom NojuCommerce Product list block
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'block-hero-video-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-hero-video';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$image = get_field('logo');
$size = 'full'; // (thumbnail, medium, large, full or custom size)

$button = get_field('button');
if( $button ) {
    $button_url = $button['url'];
    $button_title = $button['title'];
    $button_target = $button['target'] ? $button['target'] : '_self';
}

$button_2 = get_field('button_2');
if( $button_2 ) {
    $button_2_url = $button_2['url'];
    $button_2_title = $button_2['title'];
    $button_2_target = $button_2['target'] ? $button_2['target'] : '_self';
}

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> container-fluid p-0">
    <div class="row">
        <div class="col-md-6">
            <div class="d-flex justify-content-center align-items-center flex-column">

                <p class="text-center top-text">Lång erfarenhet av hemsidor o sånt</p>
                <h1 class="text-white the-title text-center mb-4" style=""><?php echo esc_html(get_field('title')); ?></h1>
                <p class="text-white text-center the-paragraph"><?php echo esc_html(get_field('text')); ?></p>
                <div class="d-flex mt-4">
                    <?php if( $button ): ?>
                        <a class="btn btn-outline-white btn-lg me-5" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $button_title ); ?></a>
                    <?php endif; ?>
                    <?php if( $button_2 ): ?>
                        <a class="btn btn-primary btn-lg" href="<?php echo esc_url( $button_2_url ); ?>" target="<?php echo esc_attr( $button_2_target ); ?>"><?php echo esc_html( $button_2_title ); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <?php if( $image ): ?>
                <?php echo wp_get_attachment_image( $image, $size ); ?>
            <?php endif; ?>
        </div>


    </div>
</div>