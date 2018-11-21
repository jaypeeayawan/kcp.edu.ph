<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package EduPro
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
function edupro_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}

add_filter( 'body_class', 'edupro_body_classes' );


function edupro_user_name() {
	global $wp_query;
	$author = $wp_query->get_queried_object();

	return $user_course = $author->data->display_name;
}


/**
 * Get size information for all currently-registered image sizes.
 *
 * @param $_size
 *
 * @return array
 */
function edupro_get_image_sizes( $_size ) {
	global $_wp_additional_image_sizes;

	$info = array(
		'width'  => '',
		'height' => '',
	);
	if ( in_array( $_size, array( 'thumbnail', 'medium', 'medium_large', 'large' ) ) ) {
		$info['width']  = get_option( "{$_size}_size_w" );
		$info['height'] = get_option( "{$_size}_size_h" );
	} elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
		$info = array(
			'width'  => $_wp_additional_image_sizes[ $_size ]['width'],
			'height' => $_wp_additional_image_sizes[ $_size ]['height'],
		);
	}

	return $info;
}

/**
 * Convert hex color to RGB
 *
 * @param $color
 * @param int $opacity
 *
 * @return string
 */
function edupro_convert_hex_rgb( $color, $opacity = 1 ) {

	if ( empty( $color ) ) {
		$color = '#000000';
	}

	list( $r, $g, $b ) = sscanf( $color, "#%02x%02x%02x" );

	return sprintf( 'rgba(%s, %s, %s, %s)', $r, $g, $b, $opacity );
}


/**
 * Retrieves the next posts page link.
 *
 *
 * @global int $paged
 * @global WP_Query $wp_query
 *
 * @param string $label Content for link text.
 * @param int $max_page Optional. Max pages. Default 0.
 *
 * @return string|void HTML-formatted next posts page link.
 */
function edupro_get_next_posts_link( $label = null, $max_page = 0 ) {
	global $paged, $wp_query;

	if ( ! $max_page ) {
		$max_page = $wp_query->max_num_pages;
	}

	if ( ! $paged ) {
		$paged = 1;
	}

	$nextpage = intval( $paged ) + 1;

	if ( null === $label ) {
		$label = esc_html__( 'Next Page &raquo;', 'edupro' );
	}

	$class = '';

	//Filters the anchor tag attributes for the next posts page link.
	$attr = apply_filters( 'next_posts_link_attributes', 'data-mes="' . esc_html__( 'Sorry, No more posts', 'edupro' ) . '"' );

	if ( $nextpage <= $max_page ) {

		$link = next_posts( $max_page, false );

		if ( isset( $_GET['post_style'] ) ) {
			$link = add_query_arg( 'post_style', $_GET['post_style'], $link );
		}

		if ( isset( $_GET['post_layout'] ) ) {
			$link = add_query_arg( 'post_layout', $_GET['post_layout'], $link );
		}
	} else {
		$link  = '#';
		$class = 'no_post';
	}

	return '<a  class="' . esc_attr( $class ) . '" href="' . esc_url( $link ) . "\" $attr><i class='fa fa-refresh'></i><span class='ajax-more-text'>" . preg_replace( '/&([^#])(?![a-z]{1,8};)/i', '&#038;$1', $label ) . '</span></a>';
}

/**
 * Fallback when menu location is not checked
 * Callback function in wp_nav_menu() on header.php
 *
 * @since 1.0
 */
function edupro_menu_fallback() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_page_menu();
	} else {
		echo '<ul class="menu"><li class="menu-item-first"><a href="' . esc_url( home_url( '/' ) ) . 'wp-admin/nav-menus.php?action=locations">Create or select a menu</a></li></ul>';
	}
}

/**
 * Get categories array
 *
 * @since 1.0
 * @return array $categories
 */
function edupro_list_categories() {
	$categories = get_categories( array(
		'hide_empty' => 0
	) );

	$return = array();
	foreach ( $categories as $cat ) {
		$return[ $cat->cat_name ] = $cat->term_id;
	}

	return $return;
}

function edupro_html_tag_schema() {
	$schema = 'http://schema.org/';
	// Is single post
	if(is_single()) {
		$type = "Article";
	}
	// Is author page
	elseif( is_author() ) {
		$type = 'ProfilePage';
	}

	// Is search results page
	elseif( is_search() ) {
		$type = 'SearchResultsPage';
	}
	else {
		$type = 'WebPage';
	}
	echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
}
