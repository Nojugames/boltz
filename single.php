<?php get_header(); ?>
<?php
// the query
$args = array(
  'post_type' => 'references',
  'posts_per_page' => 4,
);
$the_query = new WP_Query( $args ); ?>


    <div class="block-hero-subpage container-fluid p-0">
        <div style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url($post->ID)) ?>')">
            <div class="d-flex justify-content-center align-items-center flex-column py-5 hero-info-container">
                    <h1 class="text-white" style="font-size:60px;"><?php the_title(); ?></h1>
                <?php
                if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                }
                ?>
            </div>
        </div>
    </div>
    <main id="content" role="main" class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'full', array( 'itemprop' => 'image', 'class' => 'h-auto mt-5 w-100' ) ); ?>
                <?php endif; ?>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </main>
    <div id="" class="block-referencess container-fluid bg-grey">
        <div class="container">
            <div class="text-center">
                <h2>Andra referenser</h2>
                <p class="text-white"></p>
            </div>
            <?php if ( $the_query->have_posts() ) : ?>
                <div class="row">
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post();
                        $currentPost = get_the_ID();
                        $permalink = get_permalink( $currentPost );
                        $title = get_the_title( $currentPost );
                        $excerpt = get_the_excerpt( $currentPost );
                        $custom_field = get_field( 'field_name', $currentPost );
                        $thumbnail = get_the_post_thumbnail( $currentPost, 'full' )
                        ?>
                        <div class="col-md-6 col-lg-3 reference-column">
                            <a href="<?php echo esc_url($permalink); ?>">
                                <div class="ratio ratio-1x1 img-fluid">
                                    <?php echo $thumbnail; ?>
                                </div>
                                <h3 class="mt-3"><?php echo esc_html($title); ?></h3>
                                <p><?php echo esc_html($excerpt); ?></p>

                            </a>
                        </div>
                        <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php get_footer(); ?>