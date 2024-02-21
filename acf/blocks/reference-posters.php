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
$id = 'reference-posters-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-reference-posters';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$featured_posts = get_field('references');

$link = get_field('link');
    if( $link ) {
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
    }
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4 text-center">
                <p><?php the_field('top_heading');?></p>
                <h2 class="mb-3"><?php the_field('heading');?></h2>
                <p><?php the_field('text');?></p>
            </div>

        </div>
        <?php if ($featured_posts): ?>
        <div class="row mt-5">
            <?php foreach( $featured_posts as $featured_post ):
            $permalink = get_permalink( $featured_post->ID );
            $outlink = get_field( 'website_link', $featured_post->ID );
            $title = get_the_title( $featured_post->ID );
            $excerpt = get_the_excerpt( $featured_post->ID );
            $custom_field = get_field( 'field_name', $featured_post->ID );
            $thumbnail = get_the_post_thumbnail_url( $featured_post->ID, 'full' )
            ?>
            <div class="col-lg-4 pb-5">
                <a href="<?php echo esc_url($outlink);?>" target="_blank">

                    <h3 class="mt-3"><?php echo esc_html($title); ?> </h3>
                    <div class="ratio ratio-16x9">
                        <img class="" src="<?php echo $thumbnail; ?>" />
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <?php if( $link ): ?>
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center align-items-center">
                <a class="btn bg-white btn-lg fw-bold" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?> &raquo;</a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>