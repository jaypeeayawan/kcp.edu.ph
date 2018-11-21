<div class="edupro-register register-form__1 <?php echo esc_attr( $class ); ?>">
	<div class="edupro-login-container">
		<?php
		if ( ! empty( $atts['check_shortcode'] ) && ! empty( $atts['shortcode'] ) && 'top' == $atts['shortcode_pos'] ) {
			echo do_shortcode( $atts['shortcode'] );
			echo '<div class="edupro-or"><span>' . esc_html__( 'Or', 'edupro-addons' ) . '</span></div>';
		}
		?>
		<div class="edupro-login">
			<form name="form" id="registration" method="post">
				<input type="hidden" name="_wpnonce" value="<?php echo wp_create_nonce( 'register' ); ?>">
				<div class="first-last">
					<div class="register-input">
						<input class="edupro_first_name" name="edupro_first_name" type="text" class="input" placeholder="<?php esc_attr_e( 'First Name', 'edupro-addons' ); ?>"/>
					</div>
					<div class="register-input">
						<input class="edupro_last_name" name="edupro_last_name" type="text" class="input" placeholder="<?php esc_attr_e( 'Last Name', 'edupro-addons' ); ?>"/>
					</div>
				</div>
				<div class="register-input">
					<input class="edupro_user_name" name="edupro_user_name" type="text" class="input" placeholder="<?php esc_attr_e( 'Username', 'edupro-addons' ); ?>"/>
				</div>
				<div class="register-input">
					<input class="edupro_user_email" name="edupro_user_email" type="email" class="input" placeholder="<?php esc_attr_e( 'Email address', 'edupro-addons' ); ?>"/>
				</div>
				<div class="register-input">
					<input class="edupro_user_pass" name="edupro_user_pass" type="password" class="input" placeholder="<?php esc_attr_e( 'Password', 'edupro-addons' ); ?>"/>
				</div>
				<div class="register-input">
					<input class="edupro_user_pass_confirm" name="edupro_user_pass_confirm" type="password" class="input" placeholder="<?php esc_attr_e( 'Confirm Password', 'edupro-addons' ); ?>"/>
				</div>
				<div class="register-input">
					<input type="submit" name="edupro_submit" class="button" value="<?php echo esc_attr( $atts['text_submit'] ); ?>"/>
				</div>
			</form>
		</div>
		<?php
		if ( $atts['check_shortcode'] && ! empty( $atts['shortcode'] ) && 'bottom' == $atts['shortcode_pos'] ) {
			echo '<div class="edupro-or"><span>' . esc_html__( 'Or', 'edupro-addons' ) . '</span></div>';
			echo do_shortcode( $atts['shortcode'] );
		}
		?>
	</div
</div>
