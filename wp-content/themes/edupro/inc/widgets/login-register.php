<?php

/**
 * About widget
 */
class EduPro_Widget_Login_Register extends WP_Widget {
	/**
	 * Holds widget settings defaults, populated in constructor.
	 * @var array
	 */
	protected $defaults;
	protected $global_widget;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->defaults = array(
			'login_label'    => esc_html( 'Login', 'edupro' ),
			'login_link'     => '',
			'register_label' => esc_html( 'Register', 'edupro' ),
			'register_link'  => '',
			'logout_label'   => esc_html( 'Logout', 'edupro' ),
			'profile_label'  => esc_html( 'Profile', 'edupro' ),
			'popup'          => 1,
			'shortcode'      => ''
		);

		parent::__construct(
			'edupro-login-register-widget',
			esc_html__( '.EduPro: Login and Register', 'edupro' ),
			array(
				'classname'   => 'edupro-login-register-widget',
				'description' => esc_html__( 'Display Login and Register Menu.', 'edupro' ),
			)
		);
	}


	/**
	 * Display widget
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args Sidebar configuration
	 * @param array $instance Widget settings
	 */
	public function widget( $args, $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults );

		$this->global_widget = $instance;

		echo $args['before_widget'];

		echo '<div class="edupro-link-login">';
		echo '<ul>';

		if ( is_user_logged_in() ) {

			printf( '<li class="profile"><i class="fa fa-user"></i><a href="%s"> %s</a></li>',
				esc_url( edupro_profile_link( 'user', get_current_user_id() ) ),
				esc_html( $instance['profile_label'] )

			);

			printf( '<li class="logout"><i class="fa fa-sign-out"></i><a href="%s"> %s</a></li>',
				esc_url( wp_logout_url( home_url() ) ),
				esc_html( $instance['logout_label'] )

			);

		} else {

			if ( $instance['popup'] || ! empty( $instance['login_link'] ) ) {
				printf( '<li class="login %s"><i class="fa fa-user"></i><a href="%s"> %s</a></li>',
					$instance['popup'] ? 'login-popup' : '',
					esc_url( $instance['login_link'] ),
					esc_html( $instance['login_label'] )

				);
			}

			if ( $instance['popup'] || ! empty( $instance['register_link'] ) ) {
				printf( '<li class="register %s"><i class="fa fa-pencil"></i><a href="%s"> %s</a></li>',
					$instance['popup'] ? 'register-popup' : '',
					esc_url( $instance['register_link'] ),
					esc_html( $instance['register_label'] )

				);
			}
		}

		echo '</ul>';
		echo '</div>';
		echo $args['after_widget'];

		add_action( 'wp_footer', array( $this, 'login_popup' ) );
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
		$instance                       = $old_instance;
		$instance['login_label']        = strip_tags( $new_instance['login_label'] );
		$instance['register_label']     = strip_tags( $new_instance['register_label'] );
		$instance['logout_label']       = strip_tags( $new_instance['logout_label'] );
		$instance['profile_label']      = strip_tags( $new_instance['profile_label'] );
		$instance['login_label']        = strip_tags( $new_instance['login_label'] );
		$instance['shortcode_position'] = strip_tags( $new_instance['shortcode_position'] );
		$instance['login_link']         = esc_url_raw( $new_instance['login_link'] );
		$instance['register_link']      = esc_url_raw( $new_instance['register_link'] );
		$instance['popup']              = ! empty( $new_instance['popup'] );
		$instance['shortcode']          = wp_kses_post( $new_instance['shortcode'] );

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
		<div class="form-edupro-login-register">
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'login_label' ) ); ?>"><?php esc_html_e( 'Login Label: ', 'edupro' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'login_label' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'login_label' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['login_label'] ); ?>">
			</p>
			<div class="popup-not-active">
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'login_link' ) ); ?>"><?php esc_html_e( 'Login Link: ', 'edupro' ); ?></label>
					<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'register_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'login_link' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['login_link'] ); ?>">
				</p>
			</div>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'register_label' ) ); ?>"><?php esc_html_e( 'Register Label: ', 'edupro' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'register_label' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'register_label' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['register_label'] ); ?>">
			</p>
			<div class="popup-not-active">
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'register_link' ) ); ?>"><?php esc_html_e( 'Register Link: ', 'edupro' ); ?></label>
					<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'register_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'register_link' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['register_link'] ); ?>">
				</p>
			</div>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'logout_label' ) ); ?>"><?php esc_html_e( 'Logout Label: ', 'edupro' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'logout_label' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'logout_label' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['logout_label'] ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'profile_label' ) ); ?>"><?php esc_html_e( 'Profile Label: ', 'edupro' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'profile_label' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'profile_label' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['profile_label'] ); ?>">
			</p>
			<p>
				<input id="<?php echo esc_attr( $this->get_field_id( 'popup' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'popup' ) ); ?>" type="checkbox" value="1" <?php checked( $instance['popup'] ); ?>>
				<label for="<?php echo esc_attr( $this->get_field_id( 'popup' ) ); ?>"><?php esc_html_e( 'Login and Register with Popup', 'edupro' ); ?></label>
			</p>
			<div class="popup-active">
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'shortcode' ) ); ?>"><?php esc_html_e( 'Shortcode: ', 'edupro' ); ?></label>
					<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'shortcode' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'shortcode' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['shortcode'] ); ?>">
				</p>
			</div>
		</div>
		<?php
	}

	/**
	 * Display login form
	 */
	public function login_popup() {
		?>
		<div class="edupro-link-login edupro-login-popup">
		<?php if ( ! is_user_logged_in() ): ?>
			<div id="edupro-popup-login">
				<div class="edupro-login-container">
					<h2 class="title"><?php esc_html_e( 'Login', 'edupro' ); ?></h2>
					<?php if ( ! empty( $this->global_widget['shortcode'] ) && (  defined( 'WORDPRESS_SOCIAL_LOGIN_ABS_PATH' ) || class_exists( 'Miniorange_OpenID_SSO' ) ) ) { ?>
						<?php do_action( 'edupro_login_form', $this->global_widget['shortcode'] ); ?>
						<div class="edupro-or"><span><?php esc_html_e( 'Or', 'edupro' ); ?></span></div>
					<?php } ?>
					<div class="edupro-login">
						<?php wp_login_form( array(
							'redirect'       => ! empty( $_REQUEST['redirect_to'] ) ? esc_url( $_REQUEST['redirect_to'] ) : apply_filters( 'edupro_default_login_redirect', home_url() ),
							'id_username'    => 'edupro_login',
							'id_password'    => 'edupro_pass',
							'label_username' => esc_html__( 'Username or email', 'edupro' ),
							'label_password' => esc_html__( 'Password', 'edupro' ),
							'label_remember' => esc_html__( 'Keep me signed in until I sign out', 'edupro' ),
							'label_log_in'   => esc_html__( 'login to your account', 'edupro' ),
						) ); ?>
						<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Forgot your password?', 'edupro' ); ?></a>
						<?php
						$registration_enabled = get_option( 'users_can_register' );
						if ( $registration_enabled && !empty( $this->global_widget['register_link'] ) ) :
							?>
							<?php echo '<p class="link-bottom">' . esc_html__( 'Not a member yet? ', 'edupro' ) . '<a href="' . esc_url( $this->global_widget['register_link'] ) . '">' . esc_html__( 'Register now', 'edupro' ) . '</a></p>'; ?>
						<?php endif; ?>

					</div>
					<div class="register register-popup">
						<?php esc_html_e( 'Do not have an account ?','edupro' ); ?><a href="#login"><?php  esc_html_e( ' Register here','edupro' ) ?></a>
					</div>
					<a class="close-popup form" href="#"><?php  esc_html_e( 'X','edupro' ) ?></a>
				</div>
			</div>
			<div id="edupro-popup-register">
				<div class="edupro-login-container">
					<h2 class="title"><?php esc_html_e( 'Register', 'edupro' ); ?></h2>
					<?php if ( ! empty( $this->global_widget['shortcode'] ) && (  defined( 'WORDPRESS_SOCIAL_LOGIN_ABS_PATH' ) || class_exists( 'Miniorange_OpenID_SSO' ) ) ) { ?>
						<?php do_action( 'edupro_register_form', $this->global_widget['shortcode'] ); ?>
						<div class="edupro-or"><span><?php esc_html_e( 'Or', 'edupro' ); ?></span></div>
					<?php } ?>
					<div class="edupro-login">
						<form name="form" id="registration" method="post">
							<input type="hidden" name="_wpnonce" value="<?php echo wp_create_nonce( 'register' ); ?>">
							<div class="first-last">
								<div class="register-input">
									<input class="edupro_first_name" name="edupro_first_name" type="text" class="input" placeholder="<?php esc_attr_e( 'First Name', 'edupro' ); ?>"/>
								</div>
								<div class="register-input">
									<input class="edupro_last_name" name="edupro_last_name" type="text" class="input" placeholder="<?php esc_attr_e( 'Last Name', 'edupro' ); ?>"/>
								</div>
							</div>
							<div class="register-input">
								<input class="edupro_user_name" name="edupro_user_name" type="text" class="input" placeholder="<?php esc_attr_e( 'Username', 'edupro' ); ?>"/>
							</div>
							<div class="register-input">
								<input class="edupro_user_email" name="edupro_user_email" type="email" class="input" placeholder="<?php esc_attr_e( 'Email address', 'edupro' ); ?>"/>
							</div>
							<div class="register-input">
								<input class="edupro_user_pass" name="edupro_user_pass" type="password" class="input" placeholder="<?php esc_attr_e( 'Password', 'edupro' ); ?>"/>
							</div>
							<div class="register-input">
								<input class="edupro_user_pass_confirm" name="edupro_user_pass_confirm" type="password" class="input" placeholder="<?php esc_attr_e( 'Confirm Password', 'edupro' ); ?>"/>
							</div>
							<div class="register-input">
								<input type="submit" name="edupro_submit" class="button" value="<?php esc_attr_e( 'Sign up new account', 'edupro' ); ?>"/>
							</div>
							<div class="register-input login login-popup">
								<?php esc_html_e( 'Have an account?','edupro' ); ?><a href="#login"><?php  esc_html_e( ' Login here','edupro' ) ?></a>
							</div>
							<a class="close-popup form" href="#"><?php  esc_html_e( 'X','edupro' ) ?></a>
						</form>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php
	}

}
