<aside id="sidebar" role="complementary">
    <?php if (get_field('sidebar_banner', 'options')): ?>
	    <?php
	    $image = get_field( 'sidebar_banner', 'options' );
	    $size  = 'full'; // (thumbnail, medium, large, full or custom size)
	    echo wp_get_attachment_image( $image, $size,false, array( 'class' => 'img-fluid w-100' ) );
	    ?>
    <?php endif; ?>
</aside>