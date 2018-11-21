<?php
/**
 * Template part for displaying the top slider for pages.
 *
 * @package EduPro
 */

if ( ! is_page() || ! class_exists( 'RevSlider' ) ) {
	return;
}
if ( $slider = get_post_meta( get_the_ID(), 'homepage_slider', true ) ) {
	do_action( 'edupro_slider_page', '[rev_slider alias="' . esc_html( $slider ) . '"]' );
}