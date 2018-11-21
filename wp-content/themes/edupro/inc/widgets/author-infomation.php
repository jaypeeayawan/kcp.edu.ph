<?php
/**
 * Author Infomation Widget.
 */
class EduPro_Author_Information extends  WP_Widget {

	protected $default;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->default = array(
			'title' => '',
		);

		$widget_ops = array(
			'classname' 	=> 'widget__author-infomation',
			'description' 	=> esc_html__( 'Display widget infomation author', 'edupro' )
		);

		parent::__construct(
			'edupro-author-infomation', esc_html__( '.Edupro: Author Infomation Widget', 'edupro' ), $widget_ops
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
		$instance = wp_parse_args( $instance, $this->default );
		echo $args ['before_widget'];
		if ( $title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) ) {
			echo $args ['before_title'] . $title . $args ['after_title'];
		}
		?>
		<div class="inline author__infomation">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
			<div class="author__infomation-details">
				<div class="author__infomation-name"><?php the_author(); ?>	</div>
				<div class="instructor__infomation"><?php esc_html_e( 'course instructor', 'edupro' ); ?></div>
				<div class="button button--small"><?php esc_html_e( 'follow','edupro' ); ?>
				<div class="social-icon"><?php edupro_user_social_button( get_the_author_meta( 'ID') ); ?></div>
			</div>
		</div>	<?php
		echo $args ['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ){
		$instance = wp_parse_args( $instance, $this->default );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Widget title', 'edupro' ); ?></label>
			<input class="widefat"
			id="<?php echo esc_attr( $this->get_field_id( 'title' ) ) ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ) ?>" type="text" value="<?php echo esc_attr( $instance['title'] ) ?>" / >
		</p>
		<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ){
		return $new_instance;
	}
}