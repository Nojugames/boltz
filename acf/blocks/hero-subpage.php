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
$id = 'block-hero-subpage-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-hero-subpage';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center content-container">
                <p class="hero-top-text"><?php the_field('top_text'); ?></p>
                <h1><?php if(get_field('heading')): the_field('heading'); else: the_title(); endif; ?></h1>
                <p class="hero-text"><?php the_field('text'); ?></p>
            </div>
        </div>
    </div>
</div>