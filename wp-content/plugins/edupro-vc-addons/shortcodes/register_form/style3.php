<div class="alar-registration-form register__form__3 <?php echo esc_attr( $class ); ?>">
	<div class="title__register__form">
		<h3><?php echo ( ! empty( $atts['title_form'] ) ? esc_html( $atts['title_form'] ) : esc_html__( 'Create your free account', 'edupro-addons' ) ); ?></h3>
	</div>
</div>
<div class="edupro-register register__form__3">
	<div class="edupro-login-container">
		<?php
		if ( ! empty( $atts['check_shortcode'] ) && ! empty( $atts['shortcode'] ) && 'top' == $atts['shortcode_pos'] ) {
			echo do_shortcode( $atts['shortcode'] );
			echo '<div class="edupro-or"><span>' . esc_html__( 'Or', 'edupro-addons' ) .'</span></div>';
		}
		?>
		<div class="edupro-login">
			<form name="form" id="registration" method="post">
				<input type="hidden" name="_wpnonce" value="<?php echo wp_create_nonce( 'register' ); ?>">
				<input class="edupro_first_name" name="edupro_first_name" type="hidden" class="input" placeholder="<?php esc_attr_e( 'First Name', 'edupro-addons' ); ?>"/>
				<input class="edupro_last_name" name="edupro_last_name" type="hidden" class="input" placeholder="<?php esc_attr_e( 'Last Name', 'edupro-addons' ); ?>"/>
				<div class="register-input">
					<input class="edupro_user_name" name="edupro_user_name" type="text" class="input" placeholder="<?php esc_attr_e( 'Username', 'edupro-addons' ); ?>" />
				</div>
				<div class="register-input">
					<input class="edupro_user_email" name="edupro_user_email" type="email" class="input" placeholder="<?php esc_attr_e( 'Email address', 'edupro-addons' ); ?>" />
				</div>
				<div class="register-input">
					<input class="edupro_user_pass" name="edupro_user_pass" type="password" class="input" placeholder="<?php esc_attr_e( 'Password', 'edupro-addons' ); ?>" />
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
		if ( ! empty( $atts['check_shortcode'] ) && ! empty( $atts['shortcode'] ) && 'bottom' == $atts['shortcode_pos'] && ! is_user_logged_in() ) {
			echo '<div class="edupro-or"><span>' . esc_html__( 'Or', 'edupro-addons' ) .'</span></div>';
			echo do_shortcode( $atts['shortcode'] );
		}
		?>
	</div>
</div>