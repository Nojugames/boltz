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
$id = 'block-services-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-services';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
$iconPack = array (
    '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><defs><style>.fa-secondary{opacity:.4}</style></defs><path class="fa-primary" d="M32 384c0 28.32 12.49 53.52 32 71.09V496C64 504.8 71.16 512 80 512h32C120.8 512 128 504.8 128 496v-15.1h256V496c0 8.836 7.164 16 16 16h32c8.836 0 16-7.164 16-16v-40.9c19.51-17.57 32-42.77 32-71.09V352H32V384zM496 256h-480C7.164 256 0 263.2 0 272v32C0 312.8 7.164 320 16 320h480c8.836 0 16-7.164 16-16v-32C512 263.2 504.8 256 496 256z"/><path class="fa-secondary" d="M96 256V77.25C95.97 66.45 111 60.23 118.6 67.88L132.4 81.66C123.6 108.6 129.4 134.5 144.2 153.2C137.9 159.5 137.8 169.8 144 176l11.31 11.31c6.248 6.248 16.38 6.248 22.63 0l105.4-105.4c6.248-6.248 6.248-16.38 0-22.63l-11.31-11.31c-6.248-6.248-16.38-6.248-22.63 0C230.7 33.26 204.7 27.55 177.7 36.41L163.9 22.64C149.5 8.25 129.6 0 109.3 0C66.66 0 32 34.66 32 77.25v178.8L96 256z"/></svg>',
    '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><defs><style>.fa-secondary{opacity:.4}</style></defs><path class="fa-primary" d="M88 176h272c4.375 0 8-3.625 8-8V136c0-4.375-3.625-8-8-8H352c0-45-26.88-85.62-68.38-103.2L256 80V16c0-8.875-7.125-16-16-16h-32c-8.875 0-16 7.125-16 16V80L164.4 24.75C122.9 42.38 96 83 96 128H88c-4.375 0-8 3.625-8 8v31.1C80 172.4 83.63 176 88 176zM314.7 352H133.3C59.7 352 0 411.7 0 485.3c0 14.73 11.94 26.67 26.66 26.67H421.3c14.72 0 26.66-11.94 26.66-26.67C448 411.7 388.3 352 314.7 352z"/><path class="fa-secondary" d="M352 192c0 70.69-57.31 128-128 128S96 262.7 96 192c0-5.48 .9453-10.7 1.613-16h252.8C351.1 181.3 352 186.5 352 192z"/></svg>',
    '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><defs><style>.fa-secondary{opacity:.4}</style></defs><path class="fa-primary" d="M384 278.6c-23.16-23.16-57.57-27.57-85.39-13.9L191.1 158L191.1 95.99l-127.1-95.99L0 63.1l96 127.1l62.04 .0077l106.7 106.6c-13.67 27.82-9.251 62.23 13.91 85.39l117 117.1c14.62 14.5 38.21 14.5 52.71-.0016l52.75-52.75c14.5-14.5 14.5-38.08-.0016-52.71L384 278.6z"/><path class="fa-secondary" d="M227.9 307L168.7 247.9l-148.9 148.9c-26.37 26.37-26.37 69.08 0 95.45C32.96 505.4 50.21 512 67.5 512s34.54-6.592 47.72-19.78l119.1-119.1C225.5 352.3 222.6 329.4 227.9 307zM64 472c-13.25 0-24-10.75-24-24c0-13.26 10.75-24 24-24S88 434.7 88 448C88 461.3 77.25 472 64 472zM507.7 109.3c-1.641-6.43-8.184-10.31-14.61-8.67c-2.094 .5352-4.006 1.623-5.533 3.152l-74.45 74.5l-67.96-11.32l-11.32-68.01l74.45-74.45c4.697-4.688 4.707-12.29 .0195-16.99c-1.564-1.568-3.531-2.674-5.686-3.193c-49.09-12.22-100.1 2.191-136.7 37.98C226.2 81.94 215.2 139.5 231.8 189.6L227.7 193.7l70.95 70.97c28.5-14.14 62.84-8.55 85.39 13.9l7.516 7.474c29.64-4.719 57.03-18.67 78.22-39.93C505.6 210.3 519.1 158.4 507.7 109.3z"/></svg>',
    '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><defs><style>.fa-secondary{opacity:.4}</style></defs><path class="fa-primary" d="M.0003 464V277.1C.0003 263.7 5.647 250.8 15.57 241.7L159.6 109.7C177.9 92.91 206.1 92.91 224.4 109.7L368.4 241.7C378.4 250.8 384 263.7 384 277.1V464C384 490.5 362.5 512 336 512H48C21.49 512 0 490.5 0 464H.0003zM168 272C154.7 272 144 282.7 144 296V344C144 357.3 154.7 368 168 368H216C229.3 368 240 357.3 240 344V296C240 282.7 229.3 272 216 272H168z"/><path class="fa-secondary" d="M320 48C320 21.49 341.5 0 368 0H592C618.5 0 640 21.49 640 48V464C640 490.5 618.5 512 592 512H400C410 498.6 416 482 416 464V352H432C440.8 352 448 344.8 448 336V304C448 295.2 440.8 288 432 288H416V277.1C416 269.9 415 262.8 413.2 256H432C440.8 256 448 248.8 448 240V208C448 199.2 440.8 192 432 192H400C391.2 192 384 199.2 384 208V212.6L320 153.9V48zM528 192C519.2 192 512 199.2 512 208V240C512 248.8 519.2 256 528 256H560C568.8 256 576 248.8 576 240V208C576 199.2 568.8 192 560 192H528zM512 336C512 344.8 519.2 352 528 352H560C568.8 352 576 344.8 576 336V304C576 295.2 568.8 288 560 288H528C519.2 288 512 295.2 512 304V336zM384 144C384 152.8 391.2 160 400 160H432C440.8 160 448 152.8 448 144V112C448 103.2 440.8 96 432 96H400C391.2 96 384 103.2 384 112V144zM528 96C519.2 96 512 103.2 512 112V144C512 152.8 519.2 160 528 160H560C568.8 160 576 152.8 576 144V112C576 103.2 568.8 96 560 96H528z"/></svg>',
);

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> container-fluid">
    <div class="container">
        <div class="text-center mb-5">
            <h2><?php the_field('title'); ?></h2>
            <p><?php the_field('text'); ?></p>
        </div>

        <?php
        $addNumb = 0;
        $featured_posts = get_field('pages');
        if( $featured_posts ): ?>
        <div class="row">
                <?php foreach( $featured_posts as $featured_post ):
                    $permalink = get_permalink( $featured_post->ID );
                    $title = get_the_title( $featured_post->ID );
                    $excerpt = get_the_excerpt( $featured_post->ID );
                    $custom_field = get_field( 'field_name', $featured_post->ID );
                    $thumbnail = get_the_post_thumbnail( $featured_post->ID, 'full' )
                    ?>
                    <div class="col-md-6 col-lg-3 service-container">
                        <div class="d-flex service-box">
                            <div class="service-info">
                                <?php echo $iconPack[$addNumb]; ?>
                                <h3><?php echo esc_html($title); ?></h3>
                                <p><?php echo esc_html($excerpt); ?></p>

                                <a class="" href="<?php echo esc_url($permalink); ?>">Läs mer
                                    om <?php echo esc_html($title); ?> &raquo;</a>
                            </div>
                        </div>
                    </div>

                <?php $addNumb++; endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</div>
</div>