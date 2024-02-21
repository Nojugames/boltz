<?php

/**
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'block-hero-carousel-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-hero-carousel';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

?>


<div id="<?php echo esc_attr( $id ); ?>" class="block-hero-carousel">
    <div class="container p-0">
		<?php if ( have_rows( 'images' ) ): $slideCount = 0; ?>
            <div id="carouselExampleCaptions" class="hero-carousel carousel slide"
                 data-bs-ride="carousel">
                <div class="carousel-indicators">
					<?php while ( have_rows( 'images' ) ) : the_row(); ?>
                        <button type="button" data-bs-target="#carouselExampleCaptions"
                                data-bs-slide-to="<?php echo $slideCount; ?>"
						        <?php if ( $slideCount == 0 ): ?>class="active" aria-current="true"
						        <?php endif; ?>aria-label="Slide"></button>
						<?php $slideCount ++; endwhile; ?>
                </div>
                <div class="carousel-inner">
					<?php $slideCount = 0;
					while ( have_rows( 'images' ) ) : the_row(); ?>
                        <div class="carousel-item<?php if ( $slideCount == 0 ): ?> active<?php endif; ?>">
							<?php $image = get_sub_field( 'image' );
							$size        = 'full'; // (thumbnail, medium, large, full or custom size)
							if ( $image ) {
								echo wp_get_attachment_image( $image, $size, false, array( 'class' => 'img-fluid w-100' ) );
							}

							?>
                            <div class="carousel-caption d-none d-md-block">
                                <h2><?php the_sub_field( 'title' ); ?></h2>
                                <p><?php the_sub_field( 'text' ); ?></p>
                                <button type="button" class="btn btn-outline-primary btn-lg">Primary</button>
                                <button type="button" class="btn btn-outline-secondary btn-lg">Secondary</button>
                            </div>
                        </div>
						<?php $slideCount ++; endwhile; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
		<?php endif; ?>
    </div>
</div>
