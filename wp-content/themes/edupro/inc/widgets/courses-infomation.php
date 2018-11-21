<?php

	class EduPro_Courses_Infomation extends WP_Widget {

		protected $default;

		public function __construct(){
			$this->default = array(
				'title' => ''
			);
			$widget_ops = array(
				'classname'     => 'widget__courses-infomation',
				'description'	=> 'Show infomation a course'
			);
			parent::__construct( 'edupro-course-infomation', esc_html__( 'Display widget Courses Infomation', 'edupro' ) );
		}

		public function widget( $args, $instance ) {
			if( ! is_singular( 'sfwd-courses' ) ) {
				return;
			};
			$instance = wp_parse_args( $instance, $this->default );
			echo $args['before_widget'];
			?>
			<div class="inline course__infomation">

				<?php if ( ! empty( $instance['title'] ) ) { echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];	} ?>
				<div>
					<i class="fa fa-file-text"></i><span class="social-text"><?php esc_html_e( 'Lectures', 'edupro' ); ?></span>
					<span><?php echo edupro_number_topics( get_the_ID() ); ?></span>
				</div>
				<div>
					<i class="fa fa-clock-o"></i><span class="social-text"><?php esc_html_e( 'Duration', 'edupro' ); ?></span>
					<span><?php echo edupro_duration_course( get_the_ID() ); ?></span>
				</div>
				<div>
					<i class="fa fa-level-up"></i><span class="social-text"><?php esc_html_e( 'Skill Level', 'edupro' ); ?></span>
					<span>
						<?php
							$skill_lever = get_post_meta( get_the_ID(), 'skill-lever', true );

							if( $skill_lever ) {
								echo esc_html( $skill_lever );
							}else {
								esc_html_e( 'No', 'edupro' );
							}
						?>
					</span>
				</div>
				<div>
					<i class="fa fa-globe"></i><span class="social-text"><?php esc_html_e( 'Language', 'edupro' ); ?></span>
					<span>
						<?php
						$language_course = get_post_meta( get_the_ID(), 'language-course', true );

						if( $language_course ) {
							echo esc_html( $language_course );
						}else {
							esc_html_e( 'No', 'edupro' );
						}
						?>
					</span>
				</div>
				<div>
					<i class="fa fa-shield"></i><span class="social-text"><?php esc_html_e( 'Certificate', 'edupro' ); ?></span>
					<span><?php $meta = get_post_meta( get_the_ID(), '_sfwd-courses', true );
						if ( $meta['sfwd-courses_certificate'] != 0 ) {
							esc_html_e( 'Yes', 'edupro' );
						} else {
							esc_html_e( 'No', 'edupro' );
						}
						?></span>
				</div>
			</div>
			<?php
			echo $args['after_widget'];
		}

		public function form( $instance ) {
			$instance = wp_parse_args( $instance, $this->default ); ?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Widget title', 'edupro' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title') ) ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ) ?>" type="text" value="<?php echo esc_attr( $instance['title'] ) ?>" />
			</p>
			<?php
		}

		public function update( $new_instance, $old_instance ) {
			return $new_instance;
		}
	}
?>