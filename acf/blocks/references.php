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
$id = 'block-references-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-references';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> container-fluid bg-grey">
    <div class="container">
        <div class="text-center">
            <h2><?php the_field('title');?></h2>
            <p class="text-white"><?php the_field('text');?></p>
        </div>
        <?php
        $featured_posts = get_field('references');
        if( $featured_posts ): ?>
            <div class="row">
                <?php foreach( $featured_posts as $featured_post ):
                    $permalink = get_permalink( $featured_post->ID );
                    $title = get_the_title( $featured_post->ID );
                    $excerpt = get_the_excerpt( $featured_post->ID );
                    $custom_field = get_field( 'field_name', $featured_post->ID );
                    $thumbnail = get_the_post_thumbnail( $featured_post->ID, 'full' )
                    ?>
                    <div class="col-md-6 col-lg-3 reference-column">
                        <a href="<?php echo esc_url($permalink); ?>">
                            <div class="ratio ratio-1x1 img-fluid">
                                <?php echo $thumbnail; ?>
                            </div>
                            <h3 class="mt-3"><?php echo esc_html($title); ?></h3>
                            <p><?php echo esc_html($excerpt); ?></p>
                            <p class="building-place"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 256c-35.3 0-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64z"/></svg> Helsinki</p>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>