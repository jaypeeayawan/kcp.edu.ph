<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package EduPro
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses edupro_header_style()
 */
function edupro_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'edupro_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'edupro_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'edupro_custom_header_setup' );

if ( ! function_exists( 'edupro_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see edupro_custom_header_setup().
	 */
	function edupro_header_style() {
		$image = '';

		if( ( function_exists( 'is_shop' ) && is_shop() ) ) {
			$image = edupro_get_setting( 'woo_header_image' );
		}
		elseif ( is_post_type_archive( 'sfwd-courses' ) ) {
			$image = edupro_get_setting( 'courses_header_image' );
		}
		elseif ( is_post_type_archive( 'jetpack-portfolio' ) ) {
			$image = edupro_get_setting( 'portfolio_header_image' );
		}
		elseif ( is_post_type_archive( 'event' ) ) {
			$image = edupro_get_setting( 'event_header_image' );
		}
		elseif (is_tax( )  ) {
			global $wp_query;
			$cat = $wp_query->get_queried_object();
			$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
			$image = wp_get_attachment_url( $thumbnail_id );
		}

		// Set featured image of singular post or page as header image.
		elseif ( has_post_thumbnail( get_the_ID() ) && is_singular() )
		{
			$thumbnail_id = get_post_thumbnail_id();
			list( $image ) = wp_get_attachment_image_src( $thumbnail_id, 'full' );
		}

		if ( empty( $image ) || edupro_get_setting( 'show_header_image_all_page' ) )
		{
			$image  = edupro_get_setting( 'header_image' );
		}

	if ( ! empty( $image ) ) { ?>
		<style type="text/css">
			.page__banner-top {
				background-image: url("<?php echo esc_url( $image ); ?>");
			}
		</style>
		 <?php } else {
		 	return '';
		 }
	}
endif;
