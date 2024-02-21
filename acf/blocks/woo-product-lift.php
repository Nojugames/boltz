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
$id = 'block-woo-product-lift-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-woo-product-lift';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

?>

<?php
wp_reset_query();
$liftAmount = 4;
$productCat = '';
if(get_field('lift_amount')) {
    $liftAmount = get_field('lift_amount');
}
if(get_field('product_category')) {
    $productCat = get_field('product_category');
}


$args = array(
    'post_type' => 'product',
    'posts_per_page' => $liftAmount,
    'tax_query' => array(
        array(
            'taxonomy' => 'product_cat',
            'terms' => $productCat,
            'operator' => 'IN',
        )
    )
);
$loop = new WP_Query($args);

?>

<div class="my-5 woocommerce">
    <div class="woocommerce-products-header my-5">
        <h1 class="woocommerce-products-header__title"><span><?php the_field('heading'); ?></span></h1>
    </div>
    <div id="<?php echo esc_attr($id); ?>" class="products products-row row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-xl-4 row-cols-xxl-5 gx-2 columns-5">

        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
            <?php get_template_part('woocommerce/content', 'product'); ?>
        <?php endwhile; ?>
    </div>
</div>
<?php
wp_reset_postdata();
?>
