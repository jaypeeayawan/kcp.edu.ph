<?php

/**
 * Social Link widget
 */
class Edupro_Widget_Latest_Events extends WP_Widget {
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
			'title'  => '',
			'number' => 3,
		);

		parent::__construct(
			'edupro_widget_latest_events',
			esc_html__( '.Edupro: Widget Latest Events', 'edupro' ),
			array(
				'classname'   => 'edupro_widget_latest_events',
				'description' => esc_html__( 'Add Latest Events For Site', 'edupro' ),
			)
		);
	}

	/**
	 * Display widget
	 *
	 * @param array $args Sidebar configuration
	 * @param array $instance Widget settings
	 */
	public function widget( $args, $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults );


		$wp_query = new WP_Query(  array(
			'post_type'      => 'event',
			'post_status'    => 'publish',
			'posts_per_page' => $instance['number'],
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
		?>
		<?php
		while ( $wp_query->have_posts() ) :  $wp_query->the_post(); ?>
			<div class="courses-content">
				<div class="row">
					<div class="col-sm-4 widget__latest_events_date">
						<?php $start = get_post_meta( get_the_ID(), 'start_date', true ); ?>
						<strong class="widget__latest_date_day"><?php echo date("d", strtotime( $start ) ); ?></strong>
						<strong class="widget__latest_date_month"><?php echo date("M", strtotime( $start ) ); ?></strong>
					</div>
					<div class="widget__latest_events col-sm-8">
						<h4 class="widget__latest_title_events"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					</div>
				</div>
			</div>
		<?php
		endwhile;
		wp_reset_postdata();
		echo $args ['after_widget'];
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
		$instance           = $old_instance;
		$instance['title']  = strip_tags( $new_instance['title'] );
		$instance['number'] = strip_tags( $new_instance['number'] );

		return $instance;
	}

	/**
	 * Display widget settings
	 *
	 * @param array $instance Widget settings
	 *
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
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"> <?php esc_html_e( 'Number Item display', 'edupro' ) ?> </label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" value="<?php echo esc_html( $instance['number'] ) ?>" / >
		</p>

		<?php
	}

}
