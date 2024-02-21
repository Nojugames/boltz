<?php get_header(); ?>
    <main id="content" role="main" class="woocommerce container mt-5">
        <article id="post-0" class="post not-found row">
            <div class="col-lg-4 col-xl-3 side-bar-container">
				<?php get_sidebar(); ?>
            </div>
            <div class="col-lg-8 col-xl-9 main-content">
                <h1 class="text-center entry-title" itemprop="name"><?php esc_html_e( 'Sivua ei löytynyt', 'noju' ); ?></h1>
	            <p class="text-center "><?php esc_html_e( 'Kokeile haku?', 'noju' ); ?></p>
	            <?php echo do_shortcode( '[fibosearch]' ); ?>
                <h2 class="text-center my-5">Ehkä joku näistä tuotteista kiinnostaisi?</h2>
                <div class="products products-row row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-xl-4 row-cols-xxl-5 gx-2 columns-5">
					<?php
					$args = array(
						'post_type'      => 'product',
						'posts_per_page' => 10,
						'orderby'        => 'date',
						'order'          => 'ASC',
					);

					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
						wc_get_template_part( 'content', 'product' ); endwhile;
					?>
                </div>
            </div>
        </article>
    </main>
    <main id="content" role="main" class="container">

    </main>
<?php get_footer(); ?>