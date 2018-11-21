<?php

class Edupro_Widget_Recent_Courses extends WP_Widget {

	protected $defaults;

	public function __construct() {
		$this->defaults = array(
			'title'  => '',
			'number' => 3,
		);
		$widget_ops = array(
			'classname'   => 'edupro_widget_recent_courses',
			'description' => esc_html__( 'Add Recent Courses For Site', 'edupro' ),
		);
		parent::__construct( 'edupro_widget_recent_courses', esc_html__( '.Edupro: Widget Recent Courses', 'edupro' ), $widget_ops );
	}

	public function widget( $args, $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults );

		$wp_query = new WP_Query(  array(
			'post_type'      => 'sfwd-courses',
			'post_status'    => 'publish',
			'posts_per_page' => $instance['number']
		) );

		// Don't output anything if no portfolios are created.
		if ( ! $wp_query->have_posts() )
		{
			return;
		}
		echo $args ['before_widget'];

		if ( $title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) ) {
			echo $args ['before_title'] . $title . $args ['after_title'];
		}

		while ( $wp_query->have_posts() ) : $wp_query->the_post();
			?>
			<div class="courses-content">
				<div class="row">
					<div class="col-sm-4 widget__recent_courses_img">
						<a href="<?php the_permalink(); ?>"><?php edupro_post_thumbnail( array( 'size' => 'edupro-col-3' ) ); ?></a>
					</div>
					<div class="widget__recent_courses col-sm-8">
						<h4 class="widget__recent_title_courses"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					</div>
				</div>
			</div>
			<?php
		endwhile;
		wp_reset_postdata();
		echo $args ['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {
		$instance           = $old_instance;
		$instance['title']  = strip_tags( $new_instance['title'] );
		$instance['number'] = strip_tags( $new_instance['number'] );

		return $instance;
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
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Widget title', 'edupro' ); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ) ?>" value="<?php echo esc_html( $instance['title'] ) ?>" / >
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"> <?php esc_html_e( 'Number Item display','edupro' ) ?> </label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" value="<?php echo esc_html( $instance['number'] ) ?>" / >
		</p>

		<?php
	}
}

?>
