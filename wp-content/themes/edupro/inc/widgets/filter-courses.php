<?php
/**
 * Filter Courses widget
 */
class Edupro_Widget_Filter_Courses extends WP_Widget {

	/**
	 * Holds widget settings defaults, populated in constructor.
	 *
	 * @var array
	 */
	protected $defaults;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->defaults = array(
			'title'           => '',
		);

		parent::__construct(
			'edupro_filter_courses',
			esc_html__( '.Edupro: Widget Filter Courses', 'edupro' ),
			array(
				'classname'     => 'widget__filter-courses',
				'description' => esc_html__( 'Add Filter Courses For Site', 'edupro' ),
			)
		);
	}

	/**
	 * Display widget
	 *
	 * @param array   $args     Sidebar configuration
	 * @param array   $instance Widget settings
	 */
	public function widget( $args, $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults );

		$terms =  get_terms('course_category');

		// Get price type item
		$query = new WP_Query( array(
			'post_type'      => 'sfwd-courses',
			'posts_per_page' => -1,
		) );
		$types = array();
		while ( $query->have_posts() ) : $query->the_post();
			$info = get_post_meta( $query->post->ID, '_sfwd-courses', true );
			if ( ! in_array( $info['sfwd-courses_course_price_type'], $types ) ) {
				$types[] = $info['sfwd-courses_course_price_type'];
			}
		endwhile;

		if( ! empty( $terms )  || ! empty( $types ) ) {

			echo $args ['before_widget'];
			if ( $title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) ) {
				echo $args ['before_title'] . $title . $args ['after_title'];
			}


			if ( ! empty( $terms ) ) :
				?>
				<h4 class="widget-subtitle"><?php esc_html_e( 'Categories', 'edupro' ) ?></h4>
				<ul class="list-style">
					<li class="cat-item cat_current" data-slug="all"><a href="#"><?php esc_html_e( 'All', 'edupro' ); ?></a></li>
					<?php
					EduPro_Filter_Courses::list_categories( );
					?>
				</ul>
			<?php endif; ?>
			<?php if ( ! empty( $types ) ): ?>
				<h4 class="widget-subtitle"><?php esc_html_e( 'Course Type', 'edupro' ) ?></h4>
				<ul class="list-style">
					<li class="type-item type_current"><a href="#" data="all"><?php esc_html_e( 'All', 'edupro' ); ?></a></li>
					<?php foreach ( $types as $type ) : ?>
						<?php
						switch ( $type ) {
							case 'free':
								$type_text = esc_html__( 'Free', 'edupro' );
								break;
							case 'open':
								$type_text = esc_html__( 'Open', 'edupro' );
								break;
							case 'closed':
								$type_text = esc_html__( 'Closed', 'edupro' );
								break;
							case 'paynow':
								$type_text = esc_html__( 'Paid', 'edupro' );
								break;
							case 'subscribe':
								$type_text = esc_html__( 'Recurring', 'edupro' );
								break;
						}
						?>
						<li class="type-item"><a href="#" data="<?php echo $type; ?>"><?php echo $type_text; ?></a></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			<?php
			echo $args ['after_widget'];
		}

	}

	/**
	 * Update widget
	 *
	 * @param array   $new_instance New widget settings
	 * @param array   $old_instance Old widget settings
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                    = $old_instance;
		$instance['title']           = strip_tags( $new_instance['title'] );

		return $instance;
	}

	/**
	 * Display widget settings
	 *
	 * @param array   $instance Widget settings
	 * @return void
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults );
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'edupro' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>">
		</p>
		<?php
	}

}
