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
$id = 'block-footer-contact-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-footer-contact';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> d-flex flex-column flex-md-row justify-content-between align-items-center align-items-md-start mt-5 mt-md-0">
            <p class="d-flex justify-content-start align-items-center flex-column">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M240 16C240 7.164 247.2 0 256 0C264.8 0 272 7.164 272 16V32H440.3C445.2 32 449.8 34.21 452.8 38L504 102C508.7 107.8 508.7 116.2 504 121.1L452.8 185.1C449.8 189.8 445.2 192 440.3 192H272V224H448C465.7 224 480 238.3 480 256V352C480 369.7 465.7 384 448 384H272V496C272 504.8 264.8 512 256 512C247.2 512 240 504.8 240 496V384H71.69C66.83 384 62.23 381.8 59.2 377.1L7.996 313.1C3.322 308.2 3.322 299.8 7.996 294L59.2 230C62.23 226.2 66.83 224 71.69 224H240V192H64C46.33 192 32 177.7 32 160V64C32 46.33 46.33 32 64 32H240V16zM432.6 64H64V160H432.6L471 112L432.6 64zM40.98 304L79.38 352H448V256H79.38L40.98 304z"/></svg>
                <span><?php the_field('address'); ?></span>
            </p>
            <p class="d-flex justify-content-start align-items-center flex-column">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M363.1 131.2l-44.19-10.25c-17.52-3.984-35.44 5-42.58 21.52L255.8 190.3c-6.562 15.34-2.312 32.78 10.55 43.41l8.266 6.781C265.5 253.9 253.9 265.5 240.4 274.7L233.7 266.5C223.4 253.9 205.6 249.4 190.4 255.8L142.5 276.3c-.0156 .0156 .0313-.0156 0 0c-16.47 7.172-25.55 25.06-21.54 42.56l10.2 44.28C135.1 380.1 150 392 167.5 392C291.3 392 392 291.3 392 167.5C392 149.1 380.1 135.1 363.1 131.2zM167.5 360c-2.5 0-4.562-1.625-5.125-4.062L152.1 311.7c-.5625-2.438 .7187-4.969 3.047-6l47.66-20.44C204.9 284.4 207.5 285 208.9 286.7l15.58 19.02c4.859 5.906 13.25 7.594 20.03 3.906c27.59-15.03 50.13-37.55 65.13-65.13c3.672-6.75 2.031-15.16-3.906-20.03l-18.98-15.56c-1.844-1.516-2.406-3.875-1.453-6.109l20.44-47.7C306.5 153.2 308.5 152 310.5 152c.375 0 .75 .0469 1.125 .1406l44.25 10.27C358.4 162.1 360 165 360 167.5C360 273.6 273.6 360 167.5 360zM256 0c-141.4 0-256 114.6-256 256c0 141.4 114.6 256 256 256s256-114.6 256-256C512 114.6 397.4 0 256 0zM256 480c-123.5 0-224-100.5-224-224s100.5-224 224-224s224 100.5 224 224S379.5 480 256 480z"/></svg>
                <span><?php the_field('phone'); ?></span>
            </p>
    <p class="d-flex justify-content-start align-items-center flex-column">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M384 32H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h320c35.35 0 64-28.65 64-64V96C448 60.65 419.3 32 384 32zM416 416c0 17.64-14.36 32-32 32H64c-17.64 0-32-14.36-32-32V96c0-17.64 14.36-32 32-32h320c17.64 0 32 14.36 32 32V416zM320 128H128C92.65 128 64 156.7 64 192v128c0 35.35 28.65 64 64 64h192c35.35 0 64-28.65 64-64V192C384 156.7 355.3 128 320 128zM352 320c0 17.64-14.36 32-32 32H128c-17.64 0-32-14.36-32-32V241.9L188.2 288C199.4 293.6 211.7 296.4 224 296.4S248.6 293.6 259.8 288L352 241.9V320zM352 206.1l-106.5 53.27c-13.44 6.719-29.5 6.719-42.94 0L96 206.1V192c0-17.64 14.36-32 32-32h192c17.64 0 32 14.36 32 32V206.1z"/></svg>
                <span><?php the_field('email'); ?></span>
            </p>

</div>