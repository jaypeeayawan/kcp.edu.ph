<?php

/**
 * Class EduPro_Filter_Courses
 */
class EduPro_Filter_Courses {

	/**
	 * EduPro_Filter_Courses constructor.
	 */
	public function __construct() {

		add_action( 'wp_ajax_get_courses', array( $this, 'get_courses' ) );
		add_action( 'wp_ajax_nopriv_get_courses', array( $this, 'get_courses' ) );
	}

	/**
	 *  Get courses list categories
	 *
	 * @param string $args
	 *
	 * @return string
	 */
	public static function list_categories( $args = '' ) {
		$defaults = array(
			'echo' => 1,
		);

		$r = wp_parse_args( $args, $defaults );

		$categories = get_terms( 'course_category' );

		if ( empty( $categories ) ) {
			return '';
		}

		$output = '';
		foreach ( $categories as $category ) {
			$category_id = ! empty( $category->term_id ) ? $category->term_id : '';
			$output .= sprintf( '<li class="cat-item cat-item-%s" data-slug="%s"><a href="%s">%s</a></li>',
				$category_id,
				! empty( $category->slug ) ? $category->slug : '',
				get_term_link( $category_id, 'course_category' ),
				! empty( $category->name ) ? $category->name : ''
			);
		}

		if ( $r['echo'] ) {
			echo $output;
		} else {
			return $output;
		}
	}

	/**
	 * Get  courses by ajax
	 */
	public function get_courses() {
		check_ajax_referer( 'nonce-courses' );
		$this->query();
		wp_die();
	}

	/**
	 * Get item courses
	 */
	protected function query() {

		$arg_taxonomy = array(
			'taxonomy' => 'course_category',
			'field'    => 'slug',
			'terms'    => filter_input( INPUT_GET, 'category' ),
		);

		$args = array(
			'post_type'      => 'sfwd-courses',
			'post_status'    => 'publish',
			'posts_per_page' => filter_input( INPUT_GET, 'posts_per_page' ),
			'paged'          => filter_input( INPUT_GET, 'paged' ),
		);

		// Sort
		$sort = filter_input( INPUT_GET, 'sort' );
		if ( in_array( $sort, array( 'trendding', 'rating' ) ) ) {
			$args['orderby']  = 'meta_value_num';
			$args['order']    = 'DESC';
			$args['meta_key'] = $sort == 'trendding' ? 'post_views_count' : 'post_rating_count';
		};

		if ( filter_input( INPUT_GET, 'category' ) && filter_input( INPUT_GET, 'category' ) != 'all' ) {
			$args['tax_query'] = array( $arg_taxonomy );
		}

		if ( filter_input( INPUT_GET, 'category' ) == 'all' ) {
			$args['tax_query'] = array();
		}

		if ( filter_input( INPUT_GET, 'type' ) && filter_input( INPUT_GET, 'type' ) != 'all' ) {
			$args['meta_query'] = array(
				array(
					'key'     => '_sfwd-courses',
					'value'   => serialize( strval( filter_input( INPUT_GET, 'type' ) ) ),
					'compare' => 'LIKE',
				),
			);
		}

		$query = new WP_Query( $args );

		// List or grid
		$style = filter_input( INPUT_GET, 'style' );

		if ( $query->have_posts() ) :
			echo '<div class="row">';
			while ( $query->have_posts() ) : $query->the_post();
				get_template_part( 'template-parts/content-course', $style );

			endwhile;
			echo '</div>';
			?>
			<div class="edupro__pagination pagination">
			<?php
			$args = array(
				'current'   => max( 1, filter_input( INPUT_GET, 'paged' ) ),
				'total'     => $query->max_num_pages,
				'prev_text' => '<i class="fa fa-angle-left"></i>',
				'next_text' => '<i class="fa fa-angle-right"></i>',
			);
			?>
			<div class="nav-links">
			<?php echo paginate_links( $args ); ?>
			<div>
				<?php wp_reset_postdata(); ?>
			</div>
			<?php
		endif;

	}
}
