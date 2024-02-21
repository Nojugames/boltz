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
$id = 'block-image-text-muffe' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-image-text-muffe';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> container-fluid my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="ratio ratio-1x1">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/faija.jpg" alt="">
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-start flex-column py-5">
                <p>Vem e muffe?</p>
                <h1 style="font-size:60px;">Jag e muffe.</h1>
                <p style="font-size:28px;">Jag finns där för dig när du behöver nybyggnader, tillbyggnader eller renoveringar.</p>
                <a class="btn btn-primary btn-lg" href="#">Åt dig</a>
            </div>
        </div>
    </div>
</div>