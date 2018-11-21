<?php
/**
 * Add inline style css of courses with option
 *
 * @return string
 */
function edupro_customizer_css_courses() {
	$css = '';

	// Courses archive
	if ( is_post_type_archive( 'sfwd-courses' )  || is_singular( 'sfwd-courses' ) ) {

		$courses_paging_align = edupro_get_setting( 'courses_paging_align' );

		$course_title_color             = edupro_get_setting( 'course_title_color' );
		$course_hover_title_color       = edupro_get_setting( 'course_hover_title_color' );
		$course_author_color            = edupro_get_setting( 'course_author_color' );
		$course_author_link_color       = edupro_get_setting( 'course_author_link_color' );
		$course_hover_author_link_color = edupro_get_setting( 'course_hover_author_link_color' );
		$course_meta_color              = edupro_get_setting( 'course_meta_color' );
		$course_free_color              = edupro_get_setting( 'course_free_color' );
		$hover_course_free_color              = edupro_get_setting( 'hover_course_free_color' );
		$course_price_color             = edupro_get_setting( 'course_price_color' );
		$hover_course_price_color             = edupro_get_setting( 'hover_course_price_color' );
		$txt_btn_course_color             = edupro_get_setting( 'txt_btn_course_color' );

		$css = sprintf(
			'.post-type-archive-sfwd-courses .pagination{ text-align:%s; }
			.archive .featured-course .featured-course__text h3 a { color: %s; }
			.archive .featured-course .featured-course__text h3 a:hover { color: %s; }
			.archive .featured-course .featured-course__author{ color: %s; }
			.archive .featured-course .featured-course__author-link{ color: %s; }
			.archive .featured-course .featured-course__author-link:hover { color: %s; }
			.archive .featured-course .featured-course__info { color: %s; }
			.archive .featured-course .featured-course__type--paid{ background-color: %s; }
			.archive .featured-course .featured-course__type--paid:hover{ background-color: %s; }
			.archive .featured-course .featured-course__type{ color: %s; }
			',
			$courses_paging_align,
			$course_title_color,
			$course_hover_title_color,
			$course_author_color,
			$course_author_link_color,
			$course_hover_author_link_color,
			$course_meta_color,
			$course_price_color,
			$hover_course_price_color,
			$txt_btn_course_color
		);

		if ( $hover_course_free_color ) {
			$css .= '
			.archive .featured-course .featured-course__type.featured-course__type--free,
			.archive .featured-course .featured-course__type.featured-course__type--open { background-color:' . esc_attr( $course_free_color ) . '; }' ;
		}

		if ( $hover_course_free_color ) {
			$css .= '
			.archive .featured-course .featured-course__type.featured-course__type--free:hover,
			.archive .featured-course .featured-course__type.featured-course__type--open:hover { background-color:' . esc_attr( $hover_course_free_color ) . '; }' ;
		}
	}

	return $css;
}