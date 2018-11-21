<?php

add_filter( 'user_contactmethods', 'user_social_networks_add' );

/**
 * Add social networks to user profile
 *
 * @param array $methods Currently set contact methods.
 *
 * @return array
 */
function user_social_networks_add( $methods ) {
	$methods['googleplus'] = esc_html__( 'Google+', 'user-social-networks' );
	$methods['twitter']    = esc_html__( 'Twitter username (without @)', 'user-social-networks' );
	$methods['facebook']   = esc_html__( 'Facebook profile URL', 'user-social-networks' );
	$methods['linkedin']   = esc_html__( 'Linkedin', 'user-social-networks' );
	$methods['instagram']  = esc_html__( 'Instagram', 'user-social-networks' );
	$methods['dribbble']   = esc_html__( 'Dribbble', 'user-social-networks' );

	return $methods;
}

