<?php

/**
 * Custom Contact boxes
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'block-contact-boxes-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-contact-boxes';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
$gformId = get_field('form_id');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> container-fluid py-5">
    <div class="container">
        <div class="row contact-row">

            <div class="col-lg-6 form-container order-2 order-lg-1">
                <?php if($gformId): ?>
                    <?php echo do_shortcode('[gravityform id="'.$gformId.'" title="true"]'); ?>
                <?php endif; ?>
            </div>
            <div class="col-lg-6 order-1 order-lg-2">
                <h2 class="">Kontaktuppgifter</h2>
                <div class="contact-box">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M128 0C110.3 0 96 14.3 96 32V384c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H128zM64 32C28.7 32 0 60.7 0 96V448c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H256V384c0 35.3-28.7 64-64 64H128c-35.3 0-64-28.7-64-64V32zm256 96c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32v32c0 17.7-14.3 32-32 32H352c-17.7 0-32-14.3-32-32V128zm32 192a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm160-32a32 32 0 1 1 -64 0 32 32 0 1 1 64 0zM480 448a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm-96-32a32 32 0 1 1 -64 0 32 32 0 1 1 64 0z"/></svg>
                    <div class="content-container">
                        <p class="contact-type"><?php echo pll__('Ring'); ?>:</p>
                        <p><?php the_field('phone'); ?></p>
                    </div>
                </div>
                <div class="contact-box">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                    <div class="content-container">
                        <p class="contact-type"><?php echo pll__('Skicka e-post'); ?>:</p>
                        <p><?php the_field('email'); ?></p>
                    </div>
                </div>
                <div class="contact-box">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M192 512s192-208 192-320C384 86 298 0 192 0S0 86 0 192C0 304 192 512 192 512zm0-384a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                    <div class="content-container">
                        <p class="contact-type"><?php echo pll__('Adress'); ?>:</p>
                        <p><?php the_field('address'); ?></p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>