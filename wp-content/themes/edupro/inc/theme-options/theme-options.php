<?php
class EduPro_Option {
	/**
	 * Constructor.
	 */
	public function __construct() {
		add_filter( 'mb_settings_pages', array( $this, 'settings_pages' ) );

		// Register meta boxes and fields for settings page
		add_filter( 'rwmb_meta_boxes', array( $this, 'register_options' ) );

		// Add class to the body
		add_filter( 'body_class', array( $this, 'add_body_class' ) );

		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );

		// Add hooks
		add_action( 'load-appearance_page_theme-options', array( $this, 'reset' ) );

		add_action( 'mb_settings_page_submit_buttons', array( $this, 'add_button_reset' ) );
	}

	public function add_button_reset() {
		submit_button( esc_html__( 'Reset Settings', 'eduproe' ), 'delete', 'edupro-reset-settings', false );
	}

	/**
	 * Enqueue style theme
	 */
	public function admin_enqueue_scripts() {
		wp_enqueue_style( 'edupro-theme-options', get_template_directory_uri() . '/css/admin.css', '', '1.0.0' );
	}

	/**
	 *
	 * Add setting page
	 *
	 * @param $settings_pages
	 *
	 * @return array
	 */
	public function settings_pages( $settings_pages ) {
		$settings_pages[] = array(
			'id'            => 'theme-options',
			'option_name'   => 'theme_mods_' . get_template(),
			'menu_title'    => esc_html__( 'Theme Options', 'edupro' ),
			'parent'        => 'themes.php',
			'icon_url'      => 'dashicons-images-alt',
			'submenu_title' => esc_html__( 'Settings', 'edupro' ),
			'style'         => 'no-boxes',
			'columns'       => 1,
			'tabs'          => array(
				'general'      => esc_html__( 'General', 'edupro' ),
				'topbar'       => esc_html__( 'Top bar', 'edupro' ),
				'header'       => esc_html__( 'Header', 'edupro' ),
				'colorschemes' => esc_html__( 'Color Schemes', 'edupro' ),
				'page'         => esc_html__( 'Page Header', 'edupro' ),
				'blog'         => esc_html__( 'Blog', 'edupro' ),
				'page-author'  => esc_html__( 'Author', 'edupro' ),
				'woo'          => esc_html__( 'WooCommerce', 'edupro' ),
				'portfolio'    => esc_html__( 'Portfolio', 'edupro' ),
				'event'        => esc_html__( 'Events', 'edupro' ),
				'courses'      => esc_html__( 'Courses', 'edupro' ),
				'sidebar'      => esc_html__( 'Sidebar', 'edupro' ),
				'footer'       => esc_html__( 'Footer', 'edupro' ),
			),
			'position'      => 68,
		);

		return $settings_pages;
	}

	/**
	 * Add option
	 *
	 * @param $meta_boxes
	 *
	 * @return array
	 */
	public function register_options( $meta_boxes ) {
		$pattern = get_template_directory() . '/inc/theme-options/*.php';
		$files = array_map( 'basename', glob( $pattern ) );
		$files = array_diff( $files, array( 'default.php', 'theme-options.php' ) );
		foreach ( $files as $file ) {
			$meta_boxes[] = include $file;
		}

		return $meta_boxes;
	}

	/**
	 * Add class to body
	 *
	 * @param $classes
	 *
	 * @return mixed
	 */
	public function add_body_class( $classes ) {
		$classes[] = edupro_get_setting( 'is_sticky' ) ? 'is-sticky' : '';
		$classes[] = edupro_get_setting( 'is_sticky_sidebar' ) ? 'is-sticky-sidebar' : '';

		// Header
		$header_style = edupro_get_setting( 'header_style' );

		$classes[] = 'header_style' . $header_style;

		// Portfolio
		if ( is_post_type_archive( 'jetpack-portfolio' ) || is_singular( 'jetpack-portfolio' ) ) {
			$classes[] = edupro_get_setting( 'portfolio_layout' );
			$classes[] = edupro_get_setting( 'portfolio_column' );
		} // Product
		else if ( is_post_type_archive( 'product' ) || ( function_exists( 'WC' ) && is_product_category() ) ) {
			$classes[] = edupro_get_setting( 'woo_layout' );
		} else if ( is_singular( 'product' ) ) {
			$classes[] = edupro_get_setting( 'woo_single_layout' );
		} // Blog Archive
		else if ( is_archive() || is_home() ) {
			$classes[] = edupro_get_setting( 'post_layout' );
		} else if ( is_single() ) {
			$classes[] = edupro_get_setting( 'post_single_layout' );
		}

		return $classes;
	}

	/**
	 * Get list font size
	 * @return array
	 */
	public static function list_font_size() {
		
		$font_size = range(0, 48);
		foreach ($font_size as $k => $v ) {

			$font_size[$k] = $v . ' px';
		}
		
		return $font_size;
	}

	/**
	 * Get numbers courses
	 * @return array
	 */
	public static function get_list_filter_numbers_courses() {

		$list_number = array();

		$courses       = get_posts( 'post_type=sfwd-courses&posts_per_page=-1' );
		$count_courses = count( $courses );

		if( empty( $count_courses ) )  {
			return $list_number;
		}
		for ($i = 1 ; $i <= $count_courses ; $i ++ ) {
			$list_number[$i] = $i;
		}

		return $list_number;
	}

	function reset() {
		if ( empty( $_POST['edupro-reset-settings'] ) ) {
			return;
		}

		edupro_get_setting_default( '', true );
	}
}

