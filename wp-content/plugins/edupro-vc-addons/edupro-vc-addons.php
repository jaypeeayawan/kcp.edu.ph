<?php
/**
 * Plugin Name: EduPro Addons
 * Plugin URI: http://fitwp.com
 * Description: Addons for EduPro theme.
 * Version: 1.0.0
 * Author: FitWP
 * Author URI: http://fitwp.com
 * License: GPL2+
 * Text Domain: edupro-addons
 * Domain Path: /languages/
 */

/**
 * Main plugin class.
 */
class Edupro_Addons {
	/**
	 * Constructor
	 *
	 * Add actions for methods that define constants, load translation and load includes.
	 *
	 * @since 0.1
	 * @access public
	 */
	public function __construct() {
		define( 'EDUPRO_ADDONS_DIR', plugin_dir_path( __FILE__ ) );
		define( 'EDUPRO_ADDONS_URL', plugin_dir_url( __FILE__ ) );

		add_action( 'init', array( $this, 'load_translation' ) );
		add_action( 'vc_before_init', array( $this, 'init' ), 5 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );


		add_action( 'edupro_page_user', array( $this, 'show_shortcode' ), 10, 1 );
		add_action( 'edupro_contact_form_event', array( $this, 'show_shortcode' ), 10, 1 );
		add_action( 'edupro_login_form', array( $this, 'show_shortcode' ), 10, 1 );
		add_action( 'edupro_register_form', array( $this, 'show_shortcode' ), 10, 1 );
		add_action( 'edupro_social_login', array( $this, 'show_shortcode' ), 10, 1 );
		add_action( 'edupro_social_login', array( $this, 'show_shortcode' ), 10, 1 );
		add_action( 'edupro_slider_page', array( $this, 'show_shortcode' ), 10, 1 );

		$this->load_files();
	}


	/**
	 * Show Shortcode
	 */
	function show_shortcode( $shortcode ) {
		echo do_shortcode( $shortcode );
	}


	/**
	 * Load translation
	 */
	public function load_translation() {
		load_plugin_textdomain( 'edupro-addons', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Enqueue style for the admin.
	 *
	 * @param $hook
	 */
	public function admin_scripts( $hook ) {

		if ( $hook != 'post.php' && $hook != 'post-new.php' && $hook != 'visual-composer_page_vc-roles' ) {
			return;
		}
		wp_enqueue_style( 'edupro-addons-admin', plugins_url( 'assets/css/admin.css', __FILE__ ) );
	}

	/**
	 * Enqueue scripts and styles.
	 */
	public function enqueue() {
		// Styles
		wp_enqueue_style( 'edupro-addons', plugins_url( 'assets/css/style.css', __FILE__ ) );

		// Scripts
		wp_register_script( 'google-map', esc_url( 'http://maps.google.com/maps/api/js?key=' . get_theme_mod( 'map_api_key' ) ), array(), '', true );
		wp_register_script( 'slick', plugins_url( 'assets/js/slick.min.js', __FILE__ ), '', '1.6.0', true );
		wp_register_script( 'imagesloaded', plugins_url( 'assets/js/imagesloaded.pkgd.min.js', __FILE__ ), '', '4.1.0', true );
		wp_register_script( 'isotope', plugins_url( 'assets/js/isotope.pkgd.min.js', __FILE__ ), '', '3.0.1', true );
		wp_register_script( 'jquery-inheritance', plugins_url( 'assets/js/jquery.plugin.min.js', __FILE__ ), array( 'jquery' ), '1.0.1', true );
		wp_register_script( 'jquery-countdown', plugins_url( 'assets/js/jquery.countdown.min.js', __FILE__ ), array( 'jquery-inheritance' ), '2.0.2', true );
		wp_register_script( 'magnific-popup', plugins_url( 'assets/js/magnific-popup.min.js', __FILE__ ), array( 'jquery' ), '1.1.0', true );
		wp_register_script( 'waypoints', plugins_url( 'assets/js/waypoints.min.js', __FILE__ ), array(), '2.0.5', true );
		wp_register_script( 'counterup', plugins_url( 'assets/js/jquery.counterup.min.js', __FILE__ ), array( 'waypoints' ), '1.0', true );

		wp_enqueue_script( 'edupro-addons', plugins_url( 'assets/js/script.js', __FILE__ ), array(
			'slick',
			'imagesloaded',
			'isotope', // The latest isotope version. Not use built in version in VC
			'jquery-countdown',
			'magnific-popup',
			'waypoints',
			'counterup',
			'google-map',
		), '1.0.0', true );
	}

	public function load_files() {
		if ( is_admin() ) {
			// Meta box extensions for theme options.
			require_once dirname( __FILE__ ) . '/lib/mb-settings-page/mb-settings-page.php';
			require_once dirname( __FILE__ ) . '/lib/meta-box-group/meta-box-group.php';
			require_once dirname( __FILE__ ) . '/lib/meta-box-tabs/meta-box-tabs.php';
			require_once dirname( __FILE__ ) . '/lib/meta-box-columns/meta-box-columns.php';
			require_once dirname( __FILE__ ) . '/lib/meta-box-conditional-logic/meta-box-conditional-logic.php';
			require_once dirname( __FILE__ ) . '/lib/meta-box-conditional-logic/meta-box-conditional-logic.php';
			require_once dirname( __FILE__ ) . '/lib/mb-term-meta/mb-term-meta.php';
		}

		// Event module
		require_once dirname( __FILE__ ) . '/inc/admin-bar.php';
		require_once dirname( __FILE__ ) . '/inc/event.php';
		require_once dirname( __FILE__ ) . '/inc/user-social.php';
		require_once dirname( __FILE__ ) . '/inc/counter-post.php';
		require_once dirname( __FILE__ ) . '/inc/custom-taxonomy.php';

		if ( ! class_exists( 'RatePlugin' ) ) {
			require_once dirname( __FILE__ ) . '/inc/rate/rate.php';
		}
	}

	/**
	 * Register shortcodes.
	 */
	public function init() {
		// Visual Composer Addons
		if ( ! defined( 'WPB_VC_VERSION' ) ) {
			return;
		}
		require_once dirname( __FILE__ ) . '/inc/helper.php';
		new EduPro_Helper;

		require_once dirname( __FILE__ ) . '/inc/shortcode-settings.php';
		require_once dirname( __FILE__ ) . '/params/params.php';
		$this->load_shortcodes();
	}

	/**
	 * Load all shortcodes.
	 */
	protected function load_shortcodes() {
		$dirs = glob( dirname( __FILE__ ) . '/shortcodes/*', GLOB_ONLYDIR );
		foreach ( $dirs as $dir ) {
			$settings = include "$dir/settings.php";
			new EduPro_Shortcode_Settings( basename( $dir ), $settings );
		}
	}
}

new Edupro_Addons;
