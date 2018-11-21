<?php

class Edupro_WooCommerce {
	/**
	 * @var string Layout of current page
	 */
	public $layout;

	/**
	 * Store the option of shop viewing: grid or list
	 * @var string
	 */
	private $shop_view;


	/**
	 * Construction
	 */
	public function __construct() {
		// Check if Woocomerce plugin is actived
		if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
			return false;
		}

		// Need an early hook to ajaxify update mini shop cart
		add_filter( 'add_to_cart_fragments', array( $this, 'add_to_cart_fragments' ) );

		add_action( 'template_redirect', array( $this, 'hooks' ) );

		add_action( 'pre_get_posts', array( $this, 'shop_posts' ) );
	}

	/**
	 * Add hooks for the frontend.
	 */
	public function hooks() {

		// Change to 3 columns layout
		add_filter( 'loop_shop_columns', array( $this, 'loop_shop_columns' ) );
		add_filter( 'body_class', array( $this, 'body_class' ) );

		// Hidden sale flash
		$woo_hidden_sale  = edupro_get_setting( 'woo_hidden_sale' );
		if( $woo_hidden_sale ) {
			remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
		}

		// No star rating
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

		// Do not show WooCommerce breadcrumb before page title. We'll call it manually after page title.
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
		add_filter( 'woocommerce_breadcrumb_defaults', array( $this, 'breadcrumb' ) );

		remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
		add_action( 'woocommerce_shop_loop_item_title', array( $this, 'template_loop_product_title' ), 10 );

		/**
		 * Filter shop
		 */
		$hidden_filter = edupro_get_setting( 'woo_hidden_filter' );
		if ( empty( $hidden_filter ) ) {

			add_action( 'woocommerce_before_shop_loop', array( $this, 'open_product_filter' ) );
			add_action( 'woocommerce_before_shop_loop', array( $this, 'close_wrapper' ), 999 );

		} else {

			remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
			remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
		}

		/** Single product **/

		$woo_single_hidden_price       = edupro_get_setting( 'woo_single_hidden_price' );
		$woo_single_hidden_rating      = edupro_get_setting( 'woo_single_hidden_rating' );
		$woo_single_hidden_description = edupro_get_setting( 'woo_single_hidden_description' );
		$woo_single_hidden_share       = edupro_get_setting( 'woo_single_hidden_share' );
		$woo_single_hidden_related     = edupro_get_setting( 'woo_single_hidden_related' );

		// Price
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
		if( empty( $woo_single_hidden_price ) ) {
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 6 );
		}

		// Share product
		remove_action( 'woocommerce_after_single_product_summary','woocommerce_template_single_sharing',20 );
		if( empty( $woo_single_hidden_share ) ) {
			add_action( 'woocommerce_product_meta_end', array( $this, 'social_button' ), 100 );
		}

		// Rating
		if( $woo_single_hidden_rating ) {
			remove_action( 'woocommerce_single_product_summary','woocommerce_template_single_rating',10 );
		}

		// Description product
		if( $woo_single_hidden_description ) {
			remove_action( 'woocommerce_single_product_summary','woocommerce_template_single_excerpt',20 );
		}

		// Related products
		if( $woo_single_hidden_related ) {
			remove_action( 'woocommerce_after_single_product_summary','woocommerce_output_related_products',20 );
		}

		// Upsell
		remove_action( 'woocommerce_after_single_product_summary','woocommerce_upsell_display',20 );

		add_filter( 'woocommerce_product_tabs', array( $this, 'product_tabs') );
	}


	/**
	 * Show the product title in the product loop. By default this is an H3.
	 */
	function template_loop_product_title() {
		echo '<h3>' . get_the_title() . '</h3>';
	}

	/**
	 * Reviews tab - shows comments
	 *
	 * @param $tabs
	 *
	 * @return mixed
	 */
	public function product_tabs( $tabs ) {
		global $product, $post;

		if ( comments_open() ) {
			$tabs['reviews'] = array(
				'title'    => esc_html__( 'Reviews', 'edupro' ) . sprintf( '<span class="count-reviews">(%d)</span>', $product->get_review_count() ),
				'priority' => 30,
				'callback' => 'comments_template'
			);
		}
		return $tabs;
	}
	/**
	 * Change breadcrumb defaults
	 * @param array $defaults
	 * @return array
	 */
	public function breadcrumb( $defaults )
	{
		$defaults['delimiter']   = '<i class="fa fa-angle-right"></i>';
		return $defaults;
	}

	/**
	 * Get social button
	 */
	public function social_button() {

		echo '<div class="social-button-meta">';
		echo '<span class="product-meta-title">' . esc_html__( 'Share:', 'edupro' ) . '</span>';
		get_template_part( 'template-parts/social-buttons' );
		echo '</div>';
	}

	/**
	 * Product filter
	 */
	function open_product_filter() {
		echo '<div class="edupro-product-filter-wrap">';

	}

	/**
	 * Close wrapper for products archive
	 *
	 * @since  1.0
	 * @return void
	 */
	function close_wrapper() {
		echo '</div>';
	}


     /**
	 * Change posts_per_page for shop page.
	 *
	 * @param WP_Query $query Query object
	 */
	public function shop_posts( $query ) {
		if ( ! is_admin() && $query->is_main_query() && $query->is_post_type_archive( 'product' ) ) {
			$query->set( 'posts_per_page', get_theme_mod( 'woocommerce_shop_posts', 9 ) );
		}
	}


	/**
	 * Ajaxify update cart viewer
	 *
	 * @param array $fragments
	 *
	 * @return array
	 */
	public function add_to_cart_fragments( $fragments ) {
		$count = WC()->cart->get_cart_contents_count();

		$fragments['a.cart-contents'] = sprintf(
			'<a href="%s" class="cart-contents cart-icon %s"><i class="fa fa-shopping-bag"></i><span class="wrapper-items-number"><span class="items-number">%s</span></span></a>',
			wc_get_cart_url(),
			esc_attr( $count > 0 ? 'has-item' : '' ),
			esc_html( $count )
		);

		return $fragments;
	}

	/**
	 * Filter function to change product columns
	 *
	 * @since 1.0
	 *
	 * @param int $column
	 *
	 * @return int
	 */
	function loop_shop_columns( $column ) {
		if ( 'full-content' == $this->layout ) {
			return 4;
		} else {
			return 3;
		}

		return $column;
	}

	/**
	 * Add layout class for shop page.
	 *
	 * @param array $class
	 *
	 * @return array
	 */
	public function body_class( $class ) {
		if ( is_post_type_archive( 'product' ) || is_tax( get_object_taxonomies( 'product' ) ) ) {
			$class[] = $this->shop_view ? $this->shop_view : 'columns-3';
		}

		return $class;
	}
}
