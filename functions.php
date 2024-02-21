<?php
add_action( 'after_setup_theme', 'noju_setup' );
function noju_setup() {
	load_theme_textdomain( 'noju', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form' ) );
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 1920;
	}
	register_nav_menus( array(
	        'main-menu' => esc_html__( 'Main Menu', 'noju' ),
    ) );
}

//add_action( 'admin_notices', 'noju_admin_notice' );
//function noju_admin_notice() {
//	$user_id = get_current_user_id();
//	if ( ! get_user_meta( $user_id, 'noju_notice_dismissed_3' ) && current_user_can( 'manage_options' ) ) {
//		echo '<div class="notice notice-info"><p>' . __( '<big><strong>Noju</strong>:</big> Livesidan hittas här! <a href="?notice-dismiss" class="alignright">Dismiss</a> <a href="https://noju.fi" class="button-primary" target="_blank">Hsh</a>', 'noju' ) . '</p></div>';
//	}
//}

add_action( 'admin_init', 'noju_notice_dismissed' );
function noju_notice_dismissed() {
	$user_id = get_current_user_id();
	if ( isset( $_GET['notice-dismiss'] ) ) {
		add_user_meta( $user_id, 'noju_notice_dismissed_3', 'true', true );
	}
}
require_once('includes/enqueue.php');

add_action( 'wp_footer', 'noju_footer' );
function noju_footer() {
	?>
    <script>
        jQuery(document).ready(function ($) {
            var deviceAgent = navigator.userAgent.toLowerCase();
            if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
                $("html").addClass("ios");
            }
            if (navigator.userAgent.search("MSIE") >= 0) {
                $("html").addClass("ie");
            } else if (navigator.userAgent.search("Chrome") >= 0) {
                $("html").addClass("chrome");
            } else if (navigator.userAgent.search("Firefox") >= 0) {
                $("html").addClass("firefox");
            } else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
                $("html").addClass("safari");
            } else if (navigator.userAgent.search("Opera") >= 0) {
                $("html").addClass("opera");
            }
        });
    </script>
	<?php
}

add_filter( 'document_title_separator', 'noju_document_title_separator' );
function noju_document_title_separator( $sep ) {
	$sep = '|';

	return $sep;
}

add_filter( 'the_title', 'noju_title' );
function noju_title( $title ) {
	if ( $title == '' ) {
		return '...';
	} else {
		return $title;
	}
}

add_filter( 'nav_menu_link_attributes', 'noju_schema_url', 10 );
function noju_schema_url( $atts ) {
	$atts['itemprop'] = 'url';

	return $atts;
}

if ( ! function_exists( 'noju_wp_body_open' ) ) {
	function noju_wp_body_open() {
		do_action( 'wp_body_open' );
	}
}
add_action( 'wp_body_open', 'noju_skip_link', 5 );
function noju_skip_link() {
	echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__( 'Skip to the content', 'noju' ) . '</a>';
}

add_filter( 'the_content_more_link', 'noju_read_more_link' );
function noju_read_more_link() {
	if ( ! is_admin() ) {
		return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">' . sprintf( __( '...%s', 'noju' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
	}
}

add_filter( 'excerpt_more', 'noju_excerpt_read_more_link' );
function noju_excerpt_read_more_link( $more ) {
	if ( ! is_admin() ) {
		global $post;

		return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">' . sprintf( __( '...%s', 'noju' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
	}
}

add_filter( 'big_image_size_threshold', '__return_false' );
add_filter( 'intermediate_image_sizes_advanced', 'noju_image_insert_override' );
function noju_image_insert_override( $sizes ) {
	unset( $sizes['medium_large'] );
	unset( $sizes['1536x1536'] );
	unset( $sizes['2048x2048'] );

	return $sizes;
}
require_once( 'includes/widget-areas.php' );

add_theme_support( 'custom-logo' );

add_action( 'wp_head', 'noju_pingback_header' );
function noju_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}

add_action( 'comment_form_before', 'noju_enqueue_comment_reply_script' );
function noju_enqueue_comment_reply_script() {
	if ( get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

function noju_custom_pings( $comment ) {
	?>
    <li <?php comment_class(); ?>
            id="li-comment-<?php comment_ID(); ?>"><?php echo esc_url( comment_author_link() ); ?></li>
	<?php
}

add_filter( 'get_comments_number', 'noju_comment_count', 0 );
function noju_comment_count( $count ) {
	if ( ! is_admin() ) {
		global $id;
		$get_comments     = get_comments( 'status=approve&post_id=' . $id );
		$comments_by_type = separate_comments( $get_comments );

		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}

// wp lazy loading is not recognizing above the fold, SG optimizer does. So turning this off.
add_filter( 'wp_lazy_loading_enabled', '__return_false' );
add_theme_support( 'align-wide' );

require_once('acf/options-page.php');
require_once('acf/acf-json.php');
require_once('includes/customizer.php');
require_once('includes/custom-post-types.php');
require_once('includes/bootstrap5-walker.php');
require_once('includes/menu-walkers.php');
require_once('includes/polylang.php');
require_once('includes/post_types.php');

require_once('acf/blocks/register-blocks.php');

/*
function gf_enqueue_required_files() {
    GFCommon::log_debug( __METHOD__ . '(): running.' );
        gravity_form_enqueue_scripts( 1, true ); // Form ID 5 with ajax enabled.
}
add_action( 'get_header', 'gf_enqueue_required_files' );
*/
