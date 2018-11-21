<?php
/**
 * Take This Course Widget.
 */
class EduPro_Take_This_Courses extends WP_Widget {

	protected $default;

	/**
	 * Constructor
	 */
	public function __construct() {

		$this->defaults = array(
			'title'	=>	'',
		);

		$widget_ops = array(
			'classname' 	=> 'widget__take-this-courses',
			'description' 	=> esc_html__( 'Display button take this courses', 'edupro' )
		);

		parent::__construct(
			'edupro_take_this_courses', esc_html__( '.Edupro: Widget Take This Courses', 'edupro' ), $widget_ops
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		if( ! is_singular( 'sfwd-courses' ) ) {
			return;
		};
		echo $args['before_widget'];
		$instance = wp_parse_args( $instance, $this->defaults );
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}?>


			<div class="inline">
				<?php $info = get_post_meta( get_the_ID(), '_sfwd-courses', true ); ?>
				<div class="featured-course__meta clearfix">
					<?php
					$type = 'free';
					if ( isset( $info['sfwd-courses_course_price_type'] ) && ! in_array( $info['sfwd-courses_course_price_type'], array(
						'open',
						'free',
						) )
						) {
						$type = 'paid';
				}
				?>
				<a class="featured-course__type featured-course__type--<?php echo esc_attr( $type ); ?>" href="<?php the_permalink(); ?>">
					<?php
					if ( 'free' == $type ) {
						esc_html_e( 'Free', 'edupro' );
					} else {
						$courses_options = learndash_get_option( 'sfwd-courses' );
						$currency        = empty( $courses_options['paypal_currency'] ) ? 'USD' : $courses_options['paypal_currency'];
						echo EduPro_Helper::get_currency_symbol( $currency ) . esc_html( $info['sfwd-courses_course_price'] );
					}
					?>
				</a>
			</div>

			<?php $has_access = sfwd_lms_has_access( get_the_ID() ); ?>
			<?php if ( ! $has_access ) : ?>
				<?php echo learndash_payment_buttons( get_the_ID() ); ?>
			<?php endif; ?>

			<?php
			echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
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

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance                    = $old_instance;
		$instance['title']           = strip_tags( $new_instance['title'] );

		return $instance;
	}

}