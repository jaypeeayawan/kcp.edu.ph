<?php

class EduPro_Widget_Social_Links extends WP_Widget {
	protected $default;
	protected $socials;

	/**
	 * Constructor
	 *
	 * @return EduPro_Widget_Social_Links
	 */
	function __construct() {
		$this->socials = array(
			'facebook'    => esc_html__( 'Facebook', 'edupro' ),
			'twitter'     => esc_html__( 'Twitter', 'edupro' ),
			'linkedin'    => esc_html__( 'Linkedin', 'edupro' ),
			'google-plus' => esc_html__( 'Google Plus', 'edupro' ),
			'pinterest'   => esc_html__( 'Pinterest', 'edupro' ),
			'tumblr'      => esc_html__( 'Tumblr', 'edupro' ),
			'flickr'      => esc_html__( 'Flickr', 'edupro' ),
			'instagram'   => esc_html__( 'Instagram', 'edupro' ),
			'bitbucket'   => esc_html__( 'Bitbucket', 'edupro' ),
			'youtube'     => esc_html__( 'Youtube', 'edupro' ),
			'github'      => esc_html__( 'Github', 'edupro' ),
			'dribbble'    => esc_html__( 'Dribbble', 'edupro' ),
			'rss'         => esc_html__( 'RSS', 'edupro' ),
			'android'     => esc_html__( 'Android ', 'edupro' ),
			'apple'       => esc_html__( 'Apple', 'edupro' ),
			'windows'     => esc_html__( 'Windows', 'edupro' ),
		);
		$this->default = array(
			'title' => '',
		);
		foreach ( $this->socials as $k => $v ) {
			$this->default["{$k}_title"] = '';
			$this->default["{$k}_url"]   = '';
		}

		parent::__construct(
			'edupro-social-links-widget',
			esc_html__( '.EduPro: Social Links', 'edupro' ),
			array(
				'classname'   => 'edupro-social-links widget__social-link',
				'description' => esc_html__( 'Display links to social media networks.', 'edupro' ),
			),
			array( 'width' => 600, 'height' => 350 )
		);
	}

	/**
	 * Outputs the HTML for this widget.
	 *
	 * @param array $args An array of standard parameters for widgets in this theme
	 * @param array $instance An array of settings for this widget instance
	 *
	 * @return void Echoes it's output
	 */
	function widget( $args, $instance ) {
		$instance = wp_parse_args( $instance, $this->default );

		extract( $args );
		echo $before_widget;

		if ( $title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) ) {
			echo $before_title . $title . $after_title;
		}

		echo '<ul class="social-link">';
		foreach ( $this->socials as $social => $label ) {
			if ( ! empty( $instance[ $social . '_title' ] ) || ! empty( $instance[ $social . '_url' ] ) ) {
				printf( '<li><a href="%s" rel="nofollow" title="%s"><i class="fa fa-%s"></i></a></li>',
					$instance[ $social . '_url' ],
					$instance[ $social . '_title' ],
					$social
				);
			}
		}
		echo '</ul>';

		echo $after_widget;
	}


	/**
	 * Deals with the settings when they are saved by the admin.
	 *
	 * @param array $new_instance
	 * @param array $old_instance
	 *
	 * @return array
	 */
	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	/**
	 * Displays the form for this widget on the Widgets page of the WP Admin area.
	 *
	 * @param array $instance
	 *
	 * @return array
	 */
	function form( $instance ) {
		$instance = wp_parse_args( $instance, $this->default );
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'edupro' ); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>"/>
		</p>
		<?php
		foreach ( $this->socials as $social => $label ) {
			printf(
				'<div style="width: 280px; float: left; margin-right: 10px;">
					<label>%s</label>
					<p><input type="text" class="widefat" name="%s" placeholder="%s" value="%s"></p>
					<p><input type="text" class="widefat" name="%s" placeholder="%s" value="%s"></p>
				</div>',
				$label,
				esc_attr( $this->get_field_name( $social . '_title' ) ),
				esc_html__( 'Title', 'edupro' ),
				esc_attr( $instance[ $social . '_title' ] ),
				esc_attr( $this->get_field_name( $social . '_url' ) ),
				esc_html__( 'URL', 'edupro' ),
				esc_url( $instance[ $social . '_url' ] )
			);
		}
	}
}
