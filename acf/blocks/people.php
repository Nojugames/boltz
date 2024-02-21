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
$id = 'block-people-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-people';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> container-fluid">
    <div class="container">
        <div class="text-center">
            <h2><?php the_field('title'); ?></h2>
            <p><?php the_field('text'); ?></p>
        </div>

        <?php
        $featured_posts = get_field('people');
        if ($featured_posts):
            ?>
            <div class="row">
                <?php foreach ($featured_posts as $featured_post):
                    $permalink = get_permalink($featured_post->ID);
                    $title = get_the_title($featured_post->ID);
                    $jobtitle = get_field('jobtitle', $featured_post->ID);
                    $phone = get_field('phone', $featured_post->ID);
                    $mail = get_field('mail', $featured_post->ID);
                    $thumbnail = get_the_post_thumbnail($featured_post->ID, 'full')
                    ?>
                    <div class="col-md-6 col-lg-3 person-card">
                        <div class="ratio ratio-1x1 img-fluid">
                            <?php echo $thumbnail; ?>
                        </div>
                        <h3><?php echo esc_html($title); ?></h3>
                        <p><?php echo esc_html($jobtitle); ?></p>
                        <p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path style="fill:white;" d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/>
                        </svg>
                        <?php echo esc_html($phone); ?></p>
                        <p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path style="fill:white;" d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/>
                        </svg>
                        <?php echo esc_html($mail); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>


    </div>
</div>
</div>