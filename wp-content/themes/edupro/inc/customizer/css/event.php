<?php
/**
 * Add inline style css of courses with option
 *
 * @return string
 */
function edupro_customizer_css_event() {
	$css = '';

	// Courses archive
	if ( is_post_type_archive( 'event' ) ) {

		$join_now_align = edupro_get_setting( 'event_join_now_align' );

		if( 'right' == $join_now_align ) {
			$css .= '.archive .content__event .content__event__container .content__event__wrap .content__event__wrap__joinnow{ float:right; }';
		}
	}

	if ( is_singular( 'event' ) ) {
		$event_layout = edupro_get_setting( 'event_single_layout' );

		if( 'sidebar-left' == $event_layout ) {
			$css .= '.single-event .main .main__content{ float:right;padding-right: 15px;padding-left: 0px; }
			.single-event .main .ctf7__sidebar { padding-left: 15px; }
			.single-event .ctf7__sidebar { float:left; }
			';
		}
	}

	return $css;
}