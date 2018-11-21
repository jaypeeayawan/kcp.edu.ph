<?php
/**
 * Learning Machine System module.
 */

/**
 * Main class.
 */
class EduPro_LMS {
	/**
	 * The reference to singleton instance of this class
	 *
	 * @var object
	 */
	private static $instance;

	/**
	 * Returns the singleton instance of this class.
	 *
	 * @return object The singleton instance.
	 */
	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Initialize the plugin
	 */
	public function init() {
		if ( ! $this->plugin_support() ) {
			return;
		}
		add_action( 'pre_get_posts', array( $this, 'filter_posts' ) );
	}

	/**
	 * Change posts_per_page for courses page.
	 *
	 * @param WP_Query $query Query object
	 */
	public function filter_posts( $query ) {
		if ( is_admin() || ! $query->is_main_query() ) {
			return;
		}

		if ( $query->is_tax( 'course_category' ) ) {
			$query->set( 'post_type', 'sfwd-courses' );
		}
		if ( $query->is_post_type_archive( 'sfwd-courses' ) ) {
			$per_page = self::get_courses_per_page();
			$query->set( 'posts_per_page', $per_page );

			$sort = edupro_get_setting( 'sort_courses_default' );
			if ( in_array( $sort, array( 'trendding', 'rating' ) ) ) {
				$query->set( 'orderby', 'meta_value_num' );
				$query->set( 'order', 'DESC' );
				$query->set( 'meta_key', $sort == 'trendding' ? 'post_views_count' : 'post_rating_count' );
			};
			return;
		}
		if ( $query->is_post_type_archive( 'event' ) ) {
			$sort = edupro_get_setting( 'event_archive_sort' );

			if ( $sort == 'happening' ) {
				$query->set( 'meta_query', array(
					'relation' => 'AND',
					array(
						'key'     => 'start_date',
						'value'   => date( "Y-m-d H:i:s" ),
						'compare' => '<=',
					),
					array(
						'key'     => 'end_date',
						'value'   => date( "Y-m-d H:i:s" ),
						'compare' => '>=',
					),
				) );
			};

			if ( $sort == 'upcoming' ) {
				$query->set( 'meta_key', 'start_date' );
				$query->set( 'meta_value', date( "Y-m-d H:i:s" ) ); // change to how "event date" is stored
				$query->set( 'meta_compare', '>' );
			};

			if ( $sort == 'expired' ) {
				$query->set( 'meta_key', 'end_date' );
				$query->set( 'meta_value', date( "Y-m-d H:i:s" ) ); // change to how "event date" is stored
				$query->set( 'meta_compare', '<' );
			};
		}
	}

	/**
	 * Get plugin constants (dir and url).
	 *
	 * @param $name
	 *
	 * @return string
	 */
	public function __get( $name ) {
		switch ( $name ) {
			case 'dir':
				return get_template_directory() . '/inc/lms';
			case 'url':
				return get_template_directory_uri() . '/inc/lms';
			default:
				return '';
		}
	}

	/**
	 * Check if required plugin (LearnDash) is installed.
	 *
	 * @return bool
	 */
	protected function plugin_support() {
		return defined( 'LEARNDASH_VERSION' );
	}
	/**
	 * Get courses per page
	 *
	 * @param bool $count_post
	 *
	 * @return mixed|string
	 */
	public static function get_courses_per_page( $count_post = false ) {
		$courses       = get_posts( 'post_type=sfwd-courses&posts_per_page=-1' );
		$count_courses = count( $courses );
		$courses_per_page = intval( edupro_get_setting( 'courses_per_page' ) );

		if ( $count_post ) {
			return $count_courses;
		}

		return $courses_per_page;
	}
}