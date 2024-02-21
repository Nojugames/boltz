<?php get_header(); ?>
    <main id="content" role="main" class="container mt-5">

            <article id="post-<?php the_ID(); ?>" <?php post_class( 'row' ); ?>>
                <div class="col-12 main-content">
	                <?php if ( have_posts() ) : ?>
                    <header class="header">
                        <h1 class="entry-title"
                            itemprop="name"><?php printf( esc_html__( 'Search Results for: %s', 'noju' ), get_search_query() ); ?></h1>
                    </header>
	                <?php while ( have_posts() ) : the_post(); ?>
		                <?php get_template_part( 'entry' ); ?>
	                <?php endwhile; ?>
	                <?php else : ?>
                        <header class="header">
                            <h1 class="entry-title" itemprop="name"><?php esc_html_e( 'Nothing Found', 'noju' ); ?></h1>
                        </header>
                        <div class="entry-content" itemprop="mainContentOfPage">
                            <p><?php esc_html_e( 'Sorry, nothing matched your search. Please try again.', 'noju' ); ?></p>
			                <?php get_search_form(); ?>
                        </div>
	                <?php endif; ?>
                </div>
            </article>


    </main>
<?php get_footer(); ?>