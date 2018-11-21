
<?php
/**
 * Template Name: Register
 * Description: Display projects.
 *
 * @package Edupro
 */

get_header();
?>

<div class="login__form container">
	<?php if ( ! is_user_logged_in() ) { // Display WordPress login form: ?>
	<div id="edupro-popup-register">
		<div class="edupro-login-container">
			<h2 class="title"><?php esc_html_e( 'Register', 'edupro' ); ?></h2>
			<?php do_action('edupro_social_login','[wordpress_social_login]'); ?>
				<div class="edupro-or"><span><?php esc_html_e( 'Or', 'edupro' ); ?></span></div>
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
						<?php esc_html_e( 'Have an account?','edupro' ); ?><a href="#login"><?php  esc_html_e( ' LOGIN NOW','edupro' ) ?></a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php } else {
		// If logged in:
		echo '<p class="message">' . esc_html__( 'You already logged in.', 'edupro' ) . '</p>';
		wp_loginout( home_url() ); // Display "Log Out" link.
		echo ' | ';
		printf( '<a href="%s"> %s</a>',
			esc_url( edupro_profile_link( 'user', get_current_user_id() ) ),
			esc_html__( 'View profile', 'edupro' )
		);
	}
	?>
</div>

<?php
get_footer();
