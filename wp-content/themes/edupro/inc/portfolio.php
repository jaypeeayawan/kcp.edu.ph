<?php
add_action( 'pre_get_posts', 'edupro_portfolio_posts', 100 );

/**
 * Change posts_per_page for courses page.
 *
 * @param WP_Query $query Query object
 */
function edupro_portfolio_posts( $query ) {
	if ( ! is_admin() && $query->is_main_query() && $query->is_post_type_archive( 'jetpack-portfolio' ) ) {
		$query->set( 'posts_per_page', edupro_get_setting( 'portfolio_per_page' ) );
	}
}
