<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'block-image-cta-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-image-cta';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}


$button = get_field('button');
if( $button ) {
    $button_url = $button['url'];
    $button_title = $button['title'];
    $button_target = $button['target'] ? $button['target'] : '_self';
}

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> container-fluid p-0">
    <div style="background-image: url('<?php the_field('image'); ?>')">
        <div class="d-flex justify-content-center align-items-center flex-column py-5">
            <h2 class=""><?php the_field('title'); ?></h2>
            <p class="" style="font-size:24px;"><?php the_field('text'); ?></p>
            <?php if( $button ): ?>
                <a class="btn btn-primary btn-lg" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $button_title ); ?> &raquo;</a>
            <?php endif; ?>
        </div>
    </div>
</div>