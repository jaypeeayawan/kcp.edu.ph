<?php
/**
 * Category Courses widget
 */
class Edupro_Widget_Category_Courses extends WP_Widget {

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
			'edupro_widget_category_courses',
			esc_html__( '.Edupro: Widget Category Courses', 'edupro' ),
			array(
				'classname'   => 'widget__category-courses',
				'description' => esc_html__( 'Add Category Courses For Site','edupro' ),
			)
		);
	}

	/**
	 * Display widget
	 *
	 * @param array $args     Sidebar configuration
	 * @param array $instance Widget settings
	 */
	public function widget( $args, $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults );

		extract( $args );
		echo $before_widget;

		if ( $title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) ) {
			echo $before_title . $title . $after_title;
		}

			$args = array(
				'taxonomy'	          => 'course_category',
				'show_count'	      => true,
				'hierarchical'        => true,
				'echo'                => 0,
				'title_li'            => '',
				'current_category'    => 1,
				'hide_empty'          => 0,
			);
			?>

			<ul class="list-style">
				<?php echo wp_list_categories( $args ); ?>
			</ul>


		<?php
		echo $after_widget;

	}

	/**
	 * Update widget
	 *
	 * @param array $new_instance New widget settings
	 * @param array $old_instance Old widget settings
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	/**
	 * Display widget settings
	 *
	 * @param array $instance Widget settings
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
