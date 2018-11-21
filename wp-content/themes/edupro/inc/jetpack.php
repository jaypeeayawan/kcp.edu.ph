<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.com/
 *
 * @package EduPro
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/responsive-videos/
 */
function edupro_jetpack_setup() {

	add_theme_support( 'jetpack-portfolio' );
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'edupro_jetpack_setup' );

