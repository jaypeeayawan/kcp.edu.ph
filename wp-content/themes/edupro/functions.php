<?php
/**
 * EduPru functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package EduPru
 */

require_once get_template_directory() . '/inc/lms/lms.php';
$lms = EduPro_LMS::instance();
$lms->init();
require_once get_template_directory() . '/inc/media.php';
if ( is_admin() ) {
	require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
	require_once get_template_directory() . '/inc/admin/plugins.php';
	require_once get_template_directory() . '/inc/admin/meta-boxes.php';
	require_once get_template_directory() . '/inc/admin/import-demo.php';

} else {

	require_once get_template_directory() . '/inc/portfolio.php';
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function edupro_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on EduPro, use a find and replace
	 * to change 'edupro' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'edupro', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'edupro-col-12', 770, 513, true );
	add_image_size( 'edupro-col-6', 570, 390, true );
	add_image_size( 'edupro-col-4', 370, 247, true );
	add_image_size( 'edupro-col-3', 270, 180, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Header', 'edupro' ),
		'menu-4' => esc_html__( 'Social menu', 'edupro' ),
		'menu-5' => esc_html__( 'Footer', 'edupro' ),
	) );

	// Editor style
	add_editor_style( array(
		edupro_fonts_url(),
		get_template_directory_uri() . '/css/font-awesome.min.css',
		get_template_directory_uri() . '/css/bootstrap.min.css',
		'css/editor-style.css',
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'edupro_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_theme_support( 'custom-logo' );

	// Enable support for WooCommerce
	add_theme_support( 'woocommerce' );

	add_post_type_support( 'sfwd-courses', 'excerpt' );
	add_post_type_support( 'event', 'excerpt' );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}

add_action( 'after_setup_theme', 'edupro_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function edupro_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'edupro_content_width', 640 );
}

add_action( 'after_setup_theme', 'edupro_content_width', 0 );

/**
 * Register theme sidebars.
 */
function edupro_register_sidebars() {

	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'edupro' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'edupro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Topbar left', 'edupro' ),
		'id'            => 'topbar-left',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Topbar right', 'edupro' ),
		'id'            => 'topbar-right',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Sidebar', 'edupro' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'edupro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Courses Sidebar', 'edupro' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add widgets here.', 'edupro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Portfolio Sidebar', 'edupro' ),
		'id'            => 'sidebar-4',
		'description'   => esc_html__( 'Add widgets here.', 'edupro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Single Courses Sidebar', 'edupro' ),
		'id'            => 'sidebar-5',
		'description'   => esc_html__( 'Add widgets here.', 'edupro' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	$cols = edupro_get_setting( 'footer-columns' );

	$cols = $cols ? intval( $cols ) : 4;

	register_sidebars( $cols, array(
		'name'          => $cols > 1 ? esc_html__( 'Footer %d', 'edupro' ) : esc_html__( 'Footer', 'edupro' ),
		'id'            => 'footer',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	if ( class_exists( 'bbPress' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar bbPress', 'edupro' ),
			'id'            => 'sidebar-bbpress',
			'description'   => esc_html__( 'Add widgets here.', 'edupro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}


}

add_action( 'widgets_init', 'edupro_register_sidebars' );

/**
 * Change number of products to be displayed
 *
 * @param  object $query
 * @return void
 */
function edupro_get_products( $query ) {
	if ( $query->is_main_query() && ( is_shop() || is_product_category() ) ) {
		$number = isset( $_GET['showposts'] ) ? $_GET['showposts'] : 12;
		$number = $number ? $number : 12;
		$query->set( 'posts_per_page', $number );
	}
}
/**
 * Load Metabox.
 */
// Theme option
require get_template_directory() . '/inc/fonts/fonts.php';
require get_template_directory() . '/inc/theme-options/default.php';
require get_template_directory() . '/inc/theme-options/theme-options.php';
new EduPro_Option;

require get_template_directory() . '/inc/woocommerce.php';
new Edupro_WooCommerce;

require get_template_directory() . '/inc/menu-render.php';
require get_template_directory() . '/inc/walker_nav_menu.php';
require get_template_directory() . '/inc/login-popup.php';
require get_template_directory() . '/inc/widgets/widgets.php';


require get_template_directory() . '/inc/max-mega-menu/mega-menu.php';
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load query ajax.
 */
require get_template_directory() . '/inc/filter-courses.php';
new EduPro_Filter_Courses;
require get_template_directory() . '/inc/filter-events.php';
new EduPro_Filter_Events;


/**
 * Load Breadcrumbs.
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Comment Rating
 */
require get_template_directory() . '/inc/reviews-rating.php';

/**
 * @param WP_Query $query
 */
function edupro_search_tag( $query ) {
	if ( $query->is_tag() && $query->is_main_query() ) {
		$query->set( 'post_type', array( 'post', 'sfwd-courses' ) );
	}
}
//add_action( 'pre_get_posts', 'edupro_search_tag' );

/**
 * Color Schemes
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Excerpt
 */
require get_template_directory() . '/inc/excerpt.php';

/**
 * Getting settings value
 *
 * @param $field_id
 *
 * @return string
 */ function edupro_get_setting( $field_id ) {

	return get_theme_mod( $field_id, edupro_get_setting_default( $field_id ) );
}

add_filter('woocommerce_ajax_loader_url', 'woo_custom_cart_loader');
function woo_custom_cart_loader() {
	return get_template_directory_uri().'/images/ajax-loader-2.gif';
}

/**
 * Notice users to buy LearnDash to use the theme.
 */
function edupro_admin_notice() {
	if ( class_exists( 'LearnDash_Custom_Label' ) ) {
		return;
	}

	$allowed_tags = array(
		'a' => array(
			'href'   => array(),
			'target' => array(),
		),
		'b' => array(),
	);
	?>
	<div class="notice notice-warning is-dismissible">
		<p>
			<?php
			echo wp_kses(
				sprintf(
					__( 'This theme requires the <b>LearnDash</b> plugin. Please <a href="%s" target="_blank"><b>click here</b></a> to buy it.', 'edupro' ),
					'http://learndash.com/'
				),
				$allowed_tags
			);
			?>
		</p>
	</div>
	<?php
}

add_action( 'all_admin_notices', 'edupro_admin_notice' );
