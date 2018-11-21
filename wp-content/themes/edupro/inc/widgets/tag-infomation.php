<?php
class EduPro_Tag_Infomation extends WP_Widget{

	protected $default;

	public function __construct() {
		$this->default = array (
			'title' => esc_html__( 'Tag Courses', 'edupro' )
		);
		$widget_ops = array(
			'classname' 	 => 'widget__tag-infomation',
			'description'	 => 'Show tag courses'
		);
		parent::__construct( 'edupro-tag-courses', esc_html__( '.EduPro: Tag Courses', 'edupro' ) , $widget_ops  );
	}

	public function widget( $args, $instance ) {
		$instance = wp_parse_args( $instance, $this->default );
		echo $args['before_widget'];
		?>
			<div class="inline tag__infomation">
				<h4 class="sidebar-single__title"><?php if ( $title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) ) { echo $args ['before_title'] . $title . $args ['after_title'];
			} ?></h4>
				<div class="single__tag">
					<?php echo get_the_term_list( get_the_ID(), 'post_tag' );?>
				</div>
			</div>
		<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$instance = wp_parse_args( $instance, $this->default );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Widget title', 'edupro' ); ?></label>
			<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ) ?>" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ) ?>" class="widefat" value="<?php echo esc_attr( $instance['title'] ) ?>" >
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}
}
