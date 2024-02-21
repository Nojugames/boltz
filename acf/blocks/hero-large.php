<?php

/**
 * Custom Noju hero large
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'block-hero-large-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-hero-large';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}


$backgroundImage = get_field('background_image');
$image = get_field('image');
$size = 'large'; // (thumbnail, medium, large, full or custom size)

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

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> container-fluid">
    <div style="background-image: url('<?php echo esc_url(get_field('background_image')); ?>')">
        <div class="container">
            <div class="row">
                <div class="col-md-6 content-container order-3 order-md-1">
                    <?php if(get_field('top_text')): ?>
                        <p class="hero-top-text"><?php the_field('top_text'); ?></p>
                    <?php endif; ?>
                    <?php if(get_field('heading')): ?>
                        <h1><?php the_field('heading'); ?></h1>
                    <?php else: ?>
                        <h1><?php the_title(); ?></h1>
                    <?php endif; ?>
                    <?php if(get_field('ingress')): ?>
                        <p class="hero-text"><?php the_field('ingress'); ?></p>
                    <?php endif; ?>
                    <div class="d-flex flex-column flex-sm-row mt-4">
                        <?php if( $button ): ?>
                            <a class="btn btn-outline-white text-white btn-lg me-sm-5" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $button_title ); ?> &raquo;</a>
                        <?php endif; ?>
                        <?php if( $button_2 ): ?>
                            <a class="btn mt-5 mt-sm-0 btn-primary btn-lg bg-white text-black" href="<?php echo esc_url( $button_2_url ); ?>" target="<?php echo esc_attr( $button_2_target ); ?>"><?php echo esc_html( $button_2_title ); ?> &raquo;</a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6 img-container order-2">
                    <?php if ($image): ?>
                        <?php echo wp_get_attachment_image($image, $size,'',array('class' => 'hero-img')); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>