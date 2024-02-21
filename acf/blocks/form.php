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
$id = 'block-form-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-form';
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
            <div class="col-md-6 d-flex justify-content-start align-items-start flex-column py-5">
                <h2>Ta kontakt via formulär</h2>
                <p>Har du myky på hjärta? Hör av dig via detta formulär så får du de svar du söker. Eller ring eller någo sånt.</p>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-start flex-column py-5">
                <?php gravity_form(1); ?>
            </div>
        </div>
    </div>
</div>