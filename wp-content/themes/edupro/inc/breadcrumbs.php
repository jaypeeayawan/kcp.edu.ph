<?php
/**
 * Display breadcrumbs for posts, pages, archive page with the microdata that search engines understand
 *
 * @see http://support.google.com/webmasters/bin/answer.py?hl=en&answer=185417
 *
 * @param array|string $args
 */
function edupro_breadcrumbs( $args = '' )
{
	if ( is_front_page() )
		return;

	$args = wp_parse_args( $args, array(
		'separator'         => '&rsaquo;',
		'home_label'        => esc_html__( 'Home', 'edupro' ),
		'home_class'        => 'home',
		'before'            => '',
		'before_item'       => '',
		'after_item'        => '',
		'taxonomy'          => 'category',
		'display_last_item' => true,
	) );

	$args = apply_filters( 'edupro_breadcrumbs_args', $args );


	$items = array();

	// HTML template for each item
	$item_tpl      = $args['before_item'] . '
		<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
			<a href="%s" itemprop="url"><span itemprop="title">%s</span></a>
		</span>
	' . $args['after_item'];
	$item_text_tpl = $args['before_item'] . '
		<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
			<span itemprop="title">%s</span>
		</span>
	' . $args['after_item'];

	// Home
	if ( ! $args['home_class'] )
	{
		$items[] = sprintf( $item_tpl, esc_url( home_url( '/' ) ), $args['home_label'] );
	}
	else
	{
		$items[] = $args['before_item'] . sprintf(
				'<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
				<a class="%s" href="%s" itemprop="url"><span itemprop="title">%s</span></a>
			</span>' . $args['after_item'],
				esc_attr( $args['home_class'] ),
				esc_url( home_url( '/' ) ),
				$args['home_label']
			);
	}

	// Blog page, not Homepage
	if ( is_home() && ! is_front_page() )
	{
		$page = get_option( 'page_for_posts' );
		if ( $args['display_last_item'] )
		{
			$items[] = sprintf( $item_text_tpl, get_the_title( $page ) );
		}
	}
	elseif ( is_post_type_archive( 'jetpack-portfolio' ) )
	{
		$items[] = sprintf(
			$item_text_tpl,
			sprintf( esc_html__( 'Portfolio', 'edupro' ) )
		);
	}
	elseif ( is_post_type_archive( 'event' ) )
	{
		$items[] = sprintf(
			$item_text_tpl,
			sprintf( esc_html__( 'Event', 'edupro' ) )
		);
	}
	elseif ( is_post_type_archive( 'forum' ) )
	{
		$items[] = sprintf(
			$item_text_tpl,
			sprintf( esc_html__( 'Forum', 'edupro' ) )
		);
	}
	elseif ( is_post_type_archive( 'topic' ) )
	{
		$items[] = sprintf(
			$item_text_tpl,
			sprintf( esc_html__( 'Topic', 'edupro' ) )
		);
	}
	elseif ( is_post_type_archive( 'reply' ) )
	{
		$items[] = sprintf(
			$item_text_tpl,
			sprintf( esc_html__( 'Reply', 'edupro' ) )
		);
	}
	elseif ( is_post_type_archive( 'sfwd-courses' ) )
	{
		global $wp_query;
		if ( ! is_wp_error( $wp_query->posts ) && ! empty( $wp_query->posts ) ){
			$items[] = sprintf(
				$item_text_tpl,
				sprintf( esc_html__( 'Courses', 'edupro' ) )
			);
		}else{
			$items[] = sprintf(
				$item_text_tpl,
				sprintf( esc_html__( 'Search', 'edupro' ) )
			);
		}
	}
	elseif ( is_single() )
	{
		// Terms
		$terms = get_the_terms( get_the_ID(), $args['taxonomy'] );

		if ( ! is_wp_error( $terms ) && ! empty( $terms ) )
		{
			$term    = current( $terms );
			$terms   = them_get_term_parents( $term->term_id, $args['taxonomy'] );
			$terms[] = $term->term_id;
			foreach ( $terms as $term_id )
			{
				$term = get_term( $term_id, $args['taxonomy'] );
				if ( ! is_wp_error( $term ) && ! empty( $term ) )
				{
					$items[] = sprintf( $item_tpl, get_term_link( $term, $args['taxonomy'] ), $term->name );
				}
			}
			if ( $args['display_last_item'] )
				$items[] = sprintf( $item_text_tpl, get_the_title() );
		} elseif ( $args['display_last_item'] &&
		           ( is_singular( 'sfwd-topic' ) || is_singular( 'sfwd-quiz' ) || is_singular( 'sfwd-certificates' ) ||
		             is_singular( 'sfwd-assignment' ) ) ) {
			$items[] = sprintf( $item_text_tpl, get_the_title() );
		}

	}
	elseif ( is_page() )
	{
		$pages = them_get_post_parents( get_queried_object_id() );
		foreach ( $pages as $page )
		{
			$items[] = sprintf( $item_tpl, get_permalink( $page ), get_the_title( $page ) );
		}
		if ( $args['display_last_item'] )
			$items[] = sprintf( $item_text_tpl, get_the_title() );
	}
	elseif ( is_tax() || is_category() || is_tag() )
	{
		$current_term = get_queried_object();
		$terms        = them_get_term_parents( get_queried_object_id(), $current_term->taxonomy );
		foreach ( $terms as $term_id )
		{
			$term    = get_term( $term_id, $current_term->taxonomy );
			$items[] = sprintf( $item_tpl, get_category_link( $term_id ), $term->name );
		}
		if ( $args['display_last_item'] )
			$items[] = sprintf( $item_text_tpl, $current_term->name );
	}
	elseif ( is_search() )
	{
		$items[] = sprintf( $item_text_tpl, sprintf( esc_html__( 'Search results for &quot;%s&quot;', 'edupro' ), get_search_query() ) );
	}
	elseif ( is_404() )
	{
		$items[] = sprintf( $item_text_tpl, esc_html__( 'Not Found', 'edupro' ) );
	}
	elseif ( is_author() )
	{
		if ( filter_input( INPUT_GET, 'profile-type' ) == 'user' ){
			$items[] = sprintf(
			$item_text_tpl,
			esc_html__( 'Student Profile', 'edupro' )
			);
		}
		elseif ( filter_input( INPUT_GET, 'profile-type' ) == 'instructor' ){
			$items[] = sprintf(
				$item_text_tpl,
				esc_html__( 'Instructor Profile', 'edupro' )
			);
		}
		else {
				$items[] = sprintf(
				$item_text_tpl,
				esc_html__( 'Author Posts', 'edupro' )
			);
		}
	}
	elseif ( is_day() )
	{
		$items[] = sprintf(
			$item_text_tpl,
			sprintf( esc_html__( 'Daily Archives: %s', 'edupro' ), get_the_date() )
		);
	}
	elseif ( is_month() )
	{
		$items[] = sprintf(
			$item_text_tpl,
			sprintf( esc_html__( 'Monthly Archives: %s', 'edupro' ), get_the_date( 'F Y' ) )
		);
	}
	elseif ( is_year() )
	{
		$items[] = sprintf(
			$item_text_tpl,
			sprintf( esc_html__( 'Yearly Archives: %s', 'edupro' ), get_the_date( 'Y' ) )
		);
	}
	else
	{
		$items[] = sprintf(
			$item_text_tpl,
			sprintf( esc_html__( 'Archives', 'edupro' ) )
		);
	}
	$items = apply_filters( 'edupro_breadcrumbs_items', $items, $item_tpl, $item_text_tpl );
	echo $args['before'] . implode( $args['separator'], $items );
}

/**
 * Searches for term parents' IDs of hierarchical taxonomies, including current term.
 * This function is similar to the WordPress function get_category_parents() but handles any type of taxonomy.
 * Modified from Hybrid Framework
 *
 * @param int|string    $term_id  The term ID
 * @param object|string $taxonomy The taxonomy of the term whose parents we want.
 *
 * @return array Array of parent terms' IDs.
 */
function them_get_term_parents( $term_id = '', $taxonomy = 'category' )
{
	// Set up some default arrays.
	$list = array();

	// If no term ID or taxonomy is given, return an empty array.
	if ( empty( $term_id ) || empty( $taxonomy ) )
		return $list;

	do
	{
		$list[] = $term_id;

		// Get next parent term
		$term    = get_term( $term_id, $taxonomy );
		$term_id = $term->parent;
	} while ( $term_id );

	// Reverse the array to put them in the proper order for the trail.
	$list = array_reverse( $list );
	array_pop( $list );

	return $list;
}

/**
 * Gets parent posts' IDs of any post type, include current post
 * Modified from Hybrid Framework
 *
 * @param int|string $post_id ID of the post whose parents we want.
 *
 * @return array Array of parent posts' IDs.
 */
function them_get_post_parents( $post_id = '' )
{
	// Set up some default array.
	$list = array();

	// If no post ID is given, return an empty array.
	if ( empty( $post_id ) )
		return $list;

	do
	{
		$list[] = $post_id;

		// Get next parent post
		$post    = get_post( $post_id );
		$post_id = $post->post_parent;
	} while ( $post_id );

	// Reverse the array to put them in the proper order for the trail.
	$list = array_reverse( $list );
	array_pop( $list );

	return $list;
}
