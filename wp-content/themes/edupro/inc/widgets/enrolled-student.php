<?php

class EduPro_Enrolled_Student extends WP_Widget {

	protected $default;

	public function __construct(){
		$this->default = array(
			'title' => ''
		);
		$widget_ops = array(
			'classname'   => 'widget__enrolled-student',
			'description' => esc_html__( 'Display avatar student enrolled courses', 'edupro' )
		);
		parent:: __construct( 'edupro-enrolled-student', esc_html__( '.EduPro: Enrolled Student Widget', 'edupro' ), $widget_ops );
	}

	public function widget( $args, $instance ) {
		if( ! is_singular( 'sfwd-courses' ) ) {
			return;
		};
		$instance = wp_parse_args( $instance, $this->default );
		$meta = get_post_meta( get_the_ID(), '_sfwd-courses', true );
		if ( $meta['sfwd-courses_course_access_list'] ) :
		echo $args['before_widget'];
		?>
			<div class="enrolled-student">
					<div class="inline student__infomation">
						<?php if ( $title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) ) { echo $args ['before_title'] . $title . $args ['after_title']; } ?>
						<div class="student-avatar">
							<?php
							$access_list = $meta['sfwd-courses_course_access_list'];
							$access_list = array_filter( array_map( 'absint', explode( ',', $access_list . ',' ) ) );
							foreach ( $access_list as $user_id ) {
								echo get_avatar( $user_id, 60 );
							}
							?>
						</div>
					</div>
			</div>
		<?php endif; ?>
		<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$instance = wp_parse_args( $instance, $this->default ); ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Widget title', 'edupro' ); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ) ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ) ?>" value="<?php echo esc_attr( $instance['title'] ) ?>" >
		</p>
	<?php }

	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

}