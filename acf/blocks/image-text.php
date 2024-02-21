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
$id = 'block-image-text-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-image-text';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
if (get_field('background_color')) {
    $className .= ' background-' . get_field('background_color');
}

$image = get_field('image');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
$button = get_field('button');
if ($button) {
    $button_url = $button['url'];
    $button_title = $button['title'];
    $button_target = $button['target'] ? $button['target'] : '_self';
}
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> container-fluid">
    <div class="container">
        <div class="row">
            <div class="order-2 col-md-6 col-lg-5 offset-lg-1">
                <div class="img-cont">
                    <?php if ($image): ?>
                        <?php echo wp_get_attachment_image($image, $size); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="order-1 order-md-3 col-md-6 col-lg-5 d-flex justify-content-start align-items-start flex-column">
                <p class="mb-4"><?php the_field('top_title'); ?></p>
                <h2 class="mb-4"><?php the_field('title'); ?></h2>
                <?php the_field('text'); ?>
                <?php if (have_rows('list_info')): while (have_rows('list_info')) : the_row(); ?>
                    <div class="mt-4 thing-list d-flex">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
                            </svg>
                        </div>
                        <div>
                            <h3><?php the_sub_field('heading'); ?></h3>
                            <p><?php the_sub_field('text'); ?></p>
                        </div>
                    </div>
                <?php endwhile; endif; ?>

                <?php if ($button): ?>
                    <a class="btn btn-primary btn-lg" href="<?php echo esc_url($button_url); ?>"
                       target="<?php echo esc_attr($button_target); ?>"><?php echo esc_html($button_title); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>