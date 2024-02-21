<?php
/*
  * Template Name: Filter products
  */
get_header();
?>
    <script>
        jQuery(document).ready(function($) {

        $('.cat-list_item').on('click', function() {
            $('.cat-list_item').removeClass('active');
            $(this).addClass('active');

            $.ajax({
                type: 'POST',
                url: '/wp-admin/admin-ajax.php',
                dataType: 'html',
                data: {
                    action: 'filter_products',
                    category: 'prodiscus',
                },
                success: function(res) {
                    console.log('new search');
                    $('.project-tiles').html(res);
                }
            })
        });

        });

    </script>
    <main id="content" role="main" class="container mt-5">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
                <div class="col-lg-4 col-xl-3 side-bar-container">
	                <?php $categories = get_terms('product_cat'); ?>
                    <ul class="cat-list">
		                <?php foreach($categories as $category) : ?>
                            <li>
                                <a class="cat-list_item" href="#!" data-slug="<?= $category->slug; ?>">
					                <?= $category->name; ?>
                                </a>
                            </li>
		                <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-lg-8 col-xl-9 main-content">
                    <header class="header">
                        <h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
                    </header>
                    <div class="entry-content" itemprop="mainContentOfPage">
                        <h1>THIS FILTER IS YES</h1>
	                    <?php
	                    $projects = new WP_Query([
		                    'post_type' => 'product',
		                    'posts_per_page' => -1,
		                    'order_by' => 'date',
		                    'order' => 'desc',
	                    ]);
	                    ?>

	                    <?php if($projects->have_posts()): ?>
                            <ul class="project-tiles">
			                    <?php
			                    while($projects->have_posts()) : $projects->the_post(); ?>
                                <li>
	                                <?php the_title(); ?>
                                </li>

			                    <?php endwhile;
			                    ?>
                            </ul>
		                    <?php wp_reset_postdata(); ?>
	                    <?php endif; ?>


		                <?php the_content(); ?>
                        <div class="entry-links"><?php wp_link_pages(); ?></div>
                    </div>
                </div>
            </article>
			<?php if ( comments_open() && ! post_password_required() ) {
				comments_template( '', true );
			} ?>
		<?php endwhile; endif; ?>
    </main>
<?php get_footer(); ?>