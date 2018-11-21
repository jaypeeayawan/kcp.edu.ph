<?php
 /**
  * Widget social author
  */
 class EduPro_Social_Author extends WP_Widget {

 	protected $default;

 	/**
 	 * 	Construct function
 	 */
 	public function __construct() {
 		$this->default = array(
 			'title' => ''
 		);

		$widget_ops = array(
			'classname' 	=> 'widget__social-author',
			'description' 	=> esc_html__( 'Display icon link author course', 'edupro' )
		);

 		parent::__construct( 'edupro-social-author', esc_html__( '.Edupro: Social Author Widget', 'edupro' ), $widget_ops	);
 	}
 	/**
 	 * Output content of widget.
 	 * @param $args
 	 * @param $instance
 	 */
 	public function widget( $args, $instance ) {
 		if( ! is_singular( 'sfwd-courses' ) ){
 			return;
 		};
		$instance = wp_parse_args( $instance, $this->default );
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}?>
		<div class="inline social__icon">
			<?php  get_template_part( 'template-parts/social-buttons' ); ?>
		</div> <?php
		echo $args['after_widget'];
 	}

	/**
	 *  Output option form in admin.
	 * @param  $instance
	 */
 	public function form( $instance ) {
 		$instance = wp_parse_args( $instance, $this->default );
 		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'edupro' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>">
		</p>
		<?php
 	}
 	/**
 	 * Update value input.
 	 * @param  $new_instance
 	 * @param  $old_instance
 	 */
 	public function update( $new_instance, $old_instance ){
 		return $new_instance;
 	}
 }