<?php

class EduPro_Category_Infomation extends WP_Widget {

	protected $default;

	public function __construct() {

		$this->default = array(
			'title' => ''
		);

		$widget_ops = array(
			'classname'   => '',
			'description' => 'Show Category Courses'
		);

		parent:: __construct(
			'edupro-category-infomation', esc_html__( '.EduPro: Category Infomation Widget', 'edupro' ), $widget_ops
		);

	}

	public function widget( $args, $instance ) {
		$instance = wp_parse_args( $instance, $this->default );
		echo $args['before_widget'];
		?>
		<div class="inline category__infomation">
			<h4 class="sidebar-single__title"><?php if ( $title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) ) { echo $args ['before_title'] . $title . $args ['after_title'];
			} ?></h4>
			<?php
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