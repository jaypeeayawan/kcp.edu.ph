<?php
remove_action( 'comment_form_top'              , 'wsl_render_auth_widget_in_comment_form' );
remove_action( 'comment_form_must_log_in_after', 'wsl_render_auth_widget_in_comment_form' );

//Ajax widget login-popup
add_action( 'wp_ajax_nopriv_edupro_login_ajax', 'edupro_login_ajax_callback' );
add_action( 'wp_ajax_edupro_login_ajax', 'edupro_login_ajax_callback' );

function edupro_login_ajax_callback() {
	global $wpdb;

	//We shall SQL prepare all inputs to avoid sql injection.
	$username = $wpdb->prepare( $_REQUEST['username'], array() );
	$password = $_REQUEST['password'];
	$remember = $wpdb->prepare( $_REQUEST['rememberme'], array() );

	if ( $remember ) {
		$remember = 'true';
	} else {
		$remember = 'false';
	}

	$login_data                  = array();
	$login_data['user_login']    = $username;
	$login_data['user_password'] = $password;
	$login_data['remember']      = $remember;
	$user_verify                 = wp_signon( $login_data, false );

	if ( is_wp_error( $user_verify ) ) {

		wp_send_json_error( '<p class="message message-error">' . esc_html__( 'Wrong username or password.', 'edupro' ) . '</p>' );

	}

	wp_send_json_success( '<p class="message message-success">' . esc_html__( 'Login successful, redirecting...', 'edupro' ) . '</p>' );
}


//Ajax widget login-popup
add_action( 'wp_ajax_nopriv_edupro_register_ajax', 'edupro_register_ajax_callback' );
add_action( 'wp_ajax_edupro_register_ajax', 'edupro_register_ajax_callback' );

function edupro_register_ajax_callback() {

	$nonce =  $_POST['_wpnonce'];

	$first_name  = sanitize_text_field( $_POST['fistName'] );
	$last_name   = sanitize_text_field( $_POST['lastName'] );
	$username    = sanitize_text_field( $_POST['username'] );
	$email       = sanitize_text_field( $_POST['email'] );
	$pass        = sanitize_text_field( $_POST['password'] );
	$confirmPass = sanitize_text_field( $_POST['confirmPass'] );

	$error = array();
	if ( ! is_email( $email ) ) {
		$error[] = esc_html__( 'Invalid email.', 'edupro' );
	}

	if ( $confirmPass != $pass ) {
		$error[] = esc_html__( 'Password does not match the confirm password', 'edupro' );

	}

	if ( ! empty( $error ) ) {


		$error = implode( '<br> ', $error );
		wp_send_json_error( '<p class="message message-error">' . $error . '</p>' );
	}

	// Register the user
	$user_register = wp_insert_user( array(
		'first_name' => $first_name,
		'last_name'  => $last_name,
		'user_login' => $username,
		'user_email' => $email,
		'user_pass'  => $pass

	) );

	if ( is_wp_error($user_register) ){
		$error  = $user_register->get_error_codes()	;

		if ( in_array( 'empty_user_login', $error ) ) {

			wp_send_json_error( '<p class="message message-error">' . $user_register->get_error_message( 'empty_user_login' ) . '</p>' );

		} elseif ( in_array( 'existing_user_login', $error ) ) {
			wp_send_json_error( '<p class="message message-error">' . esc_html__('This username is already registered.', 'edupro' ) . '</p>' );

		} elseif ( in_array( 'existing_user_email', $error ) ) {
			wp_send_json_error( '<p class="message message-error">' . esc_html__('This email address is already registered.', 'edupro' ) . '</p>' );
		}
	} else {

		$user_signon = wp_signon( array(
			'user_login'    => $username,
			'user_password' => $pass,
			'remember'      => true
		), false );

		if ( is_wp_error( $user_signon ) ) {
			wp_send_json_error( '<p class="message message-error">' .  esc_html__('Wrong username or password.', 'edupro' ) . '</p>' );
		} else {
			wp_set_current_user( $user_signon->ID );
			wp_send_json_success( '<p class="message message-success">' . esc_html__( 'Registered successful, redirecting...', 'edupro' ) . '</p>' );

		}
	}
}
