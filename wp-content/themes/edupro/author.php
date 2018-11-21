<?php
/**
 * The template for displaying author pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EduPro
 */

$profile_type = filter_input( INPUT_GET, 'profile-type' );

// User profile
if ( 'user' === $profile_type ) {
	get_template_part( 'author-user' );
}

// Instructor profile
elseif ( 'instructor' === $profile_type ) {
	get_template_part( 'author-instructor' );
}

// Normal author archive
else {
	get_template_part(  'index' );
}
