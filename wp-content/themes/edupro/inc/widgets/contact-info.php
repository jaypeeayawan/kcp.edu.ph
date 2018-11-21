<?php
/**
 * Contact_Info widget: Displays infomation of your company.
 *
 * @package Edupro
 */

/**
 * Posts widget class.
 *
 * @package Edupro
 */
class Edupro_Widget_Contact_Info extends WP_Widget {

	protected $defaults;

	/**
	 * Class constructor
	 */
	public function __construct() {
		$this->defaults = array(
			'url'          => '',
			'intro'        => '',
			'phone'        => '',
			'mail'         => '',
			'address'      => '',
			'link_phone'   => '',
			'link_mail'    => '',
			'link_address' => '',
		);
		$widget_ops     = array(
			'classname'   => 'widget__contact-info',
			'description' => esc_html__( 'Display infomation of your company', 'edupro' ),
		);
		parent::__construct( 'edupro_contact_info_widget', esc_html__( '.Edupro: Contact Info', 'edupro' ), $widget_ops );
	}


	/**
	 * Display front end widget
	 *
	 * @param array $args Sidebar arguments
	 * @param array $instance Widget instance parameters
	 */
	public function widget( $args, $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults );

		echo $args ['before_widget'];
		?>
		<?php if ( ! empty( $instance['url'] ) ): ?>
			<div class="logo-footer">
				<img src="<?php echo esc_url( $instance['url'] ); ?>" alt="logo">
			</div>
		<?php endif; ?>
		<?php if ( ! empty( $instance['intro'] ) ): ?>
			<p class="intro">
				<?php echo $instance['intro']; ?>
			</p>
		<?php endif; ?>
		<?php
		if ( ! empty( $instance['phone'] ) ){
			printf( '<p class="phone">%s<i class="fa fa-phone"></i>%s %s</p>',
				! empty( $instance['link_phone'] ) ? '<a href="' . $instance['link_phone'] . '">' : '',
				$instance['phone'],
				! empty( $instance['link_phone'] ) ? '</a>' : ''
				);
		}

		if ( ! empty( $instance['mail'] ) ){
			printf( '<p class="phone">%s<i class="fa fa-envelope"></i>%s %s</p>',
				! empty( $instance['link_mail'] ) ? '<a href="' . $instance['link_mail'] . '">' : '',
				$instance['mail'],
				! empty( $instance['link_mail'] ) ? '</a>' : ''
				);
		}

		if ( ! empty( $instance['address'] ) ){
			printf( '<p class="phone">%s<i class="fa fa-map-marker"></i>%s %s</p>',
				! empty( $instance['link_address'] ) ? '<a href="' . $instance['link_address'] . '">' : '',
				$instance['address'],
				! empty( $instance['link_address'] ) ? '</a>' : ''
				);
		}
		?>
		<?php
		echo $args ['after_widget'];
	}

	/**
	 * Update widget parameters
	 *
	 * @param array $new_instance
	 * @param array $old_instance
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                 = $old_instance;
		$instance['url']          = esc_url( $new_instance['url'] );
		$instance['intro']        = strip_tags( $new_instance['intro'] );
		$instance['phone']        = strip_tags( $new_instance['phone'] );
		$instance['mail']         = strip_tags( $new_instance['mail'] );
		$instance['address']      = strip_tags( $new_instance['address'] );
		$instance['link_phone']   = esc_url( $new_instance['link_phone'] );
		$instance['link_mail']    = esc_url( $new_instance['link_mail'] );
		$instance['link_address'] = esc_url( $new_instance['link_address'] );

		return $instance;
	}

	/**
	 * Display backend widget form in the admin
	 *
	 * @param array $instance Widget instance parameter
	 *
	 * @return void
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'url' ) ); ?>"><?php esc_html_e( 'Logo link', 'edupro' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'url' ) ); ?>" class="widefat" type="text" name="<?php echo esc_attr( $this->get_field_name( 'url' ) ); ?>" value="<?php echo esc_url( $instance['url'] ) ?>" / >
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'intro' ) ); ?>"><?php esc_html_e( 'Intro', 'edupro' ); ?></label>
			<textarea id="<?php echo esc_attr( $this->get_field_id( 'intro' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'intro' ) ); ?>"><?php echo esc_textarea( $instance['intro'] ) ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>"><?php esc_html_e( 'Phone', 'edupro' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>" class="widefat" type="text" name="<?php echo esc_attr( $this->get_field_name( 'phone' ) ); ?>" value="<?php echo esc_html( $instance['phone'] ) ?>" / >
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'link_phone' ) ); ?>"><?php esc_html_e( 'Link Phone', 'edupro' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'link_phone' ) ); ?>" class="widefat" type="text" name="<?php echo esc_attr( $this->get_field_name( 'link_phone' ) ); ?>" value="<?php echo esc_html( $instance['link_phone'] ) ?>" / >
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'mail' ) ); ?>"><?php esc_html_e( 'Mail', 'edupro' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'mail' ) ); ?>" class="widefat" type="text" name="<?php echo esc_attr( $this->get_field_name( 'mail' ) ); ?>" value="<?php echo esc_html( $instance['mail'] ) ?>" / >
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'link_mail' ) ); ?>"><?php esc_html_e( 'Link mail', 'edupro' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'link_mail' ) ); ?>" class="widefat" type="text" name="<?php echo esc_attr( $this->get_field_name( 'link_mail' ) ); ?>" value="<?php echo esc_html( $instance['link_mail'] ) ?>" / >
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"><?php esc_html_e( 'Address', 'edupro' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>" class="widefat" type="text" name="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>" value="<?php echo esc_html( $instance['address'] ) ?>" / >
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'link_address' ) ); ?>"><?php esc_html_e( 'Link Address', 'edupro' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'link_address' ) ); ?>" class="widefat" type="text" name="<?php echo esc_attr( $this->get_field_name( 'link_address' ) ); ?>" value="<?php echo esc_html( $instance['link_address'] ) ?>" / >
		</p>
		<?php
	}
}

