<?php
/**
 * Functions related to post excerpt.
 *
 * @package edupro
 */

add_filter( 'excerpt_more', 'edupro_excerpt_more' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a 'Continue reading' link.
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function edupro_excerpt_more() {
	return '&hellip; ' . edupro_more_link();
}

add_filter( 'the_content_more_link', 'edupro_more_link' );

/**
 * Auto add more links when using the_content() function.
 *
 * @return string 'Continue reading' link
 */
function edupro_more_link() {
	return sprintf(
		'<p class="parent-more-link"><a href="%s" class="blog__content__readmore more-link">%s</a></p>',
		esc_url( get_permalink() ),
		esc_html(  edupro_get_setting( 'post_more' ) )
	);
}

add_filter( 'excerpt_length', 'edupro_excerpt_length' );

/**
 * Change excerpt length
 *
 * @return int
 */

function edupro_excerpt_length() {

	return  edupro_get_setting( 'post_content_limit' );
}

/**
 * Display limited post content
 *
 * Strips out tags and shortcodes, limits the content to `$num_words` words and appends more link to the end.
 *
 * @param integer $num_words The maximum number of words
 * @param string  $more More link. Default is "...". Optional.
 * @param bool    $echo Echo or return output
 * @param string  $class
 *
 * @return string Limited content.
 */

function edupro_content_limit( $num_words, $more = '...', $echo = true, $class = '' ) {

	$content = get_the_excerpt( get_the_ID() );

	// Truncate $content to $max_char
	$content = wp_trim_words( $content, $num_words );

	$output = '<p>' . $content . '</p>';
	if ( $more ) {
		$output .= sprintf(
			'<p class="parent-more-link"><a href="%s" class="blog__content__readmore more-link%s">%s</a></p>',
			esc_url( get_permalink() ),
			$class ? ' ' . esc_attr( $class ) : '',
			$more
		);
	}

	if ( $echo ) {
		echo $output;
	}

	return $output;

}

/**
 * Display entry content or summary.
 */

function edupro_entry_content() {

	$display = edupro_get_setting( 'post_display' );

	// Excerpt
	if ( 'excerpt' == $display ) {
		the_excerpt();

		// If excerpt isn't auto generated, there is no read more link, so we have to add manually
		$post = get_post();
		if ( $post->post_excerpt ) {
			echo edupro_more_link();
		}
	} elseif ( 'more' == $display ) {
		the_content();

	} else {
		edupro_content_limit( edupro_excerpt_length(), edupro_get_setting( 'post_more' ) );
	}
}

/**
 * Display even time.
 */
function edupro_even_time( $status = '' ) {

	$start = get_post_meta( get_the_ID(), 'start_date', true );
	if ( $start ) {
		list ( $day_start, $time_start ) = explode( ' ', $start . ' ' );
		if ( 'start_day' == $status ) {
			$start = date_i18n( "F d, Y", strtotime( $day_start ) );
		} else {
			$start = date_i18n( "g:i A", strtotime( $time_start ) );
		}
	} else {
		$start = 'N/A';
	}
	$end = get_post_meta( get_the_ID(), 'end_date', true );
	if ( $end ) {
		list ( $day_end, $time_end ) = explode( ' ', $end . ' ' );
		if ( 'end_day' == $status ) {
			$end = date_i18n( "F d, Y", strtotime( $day_end ) );
		} else {
			$end = date_i18n( "g:i A", strtotime( $time_end ) );
		}
	} else {
		$end = 'N/A';
	}

	if ( 'start_hour' == $status || 'start_day' == $status ) {
		echo esc_html( $start );
	} elseif ( 'end_hour' == $status || 'end_day' == $status ) {
		echo esc_html( $end );
	} else {
		echo esc_html( "$start - $end" );
	}
}

/**
 * Display content type price
 */
function edupro_price_type( $class = '' ){

	$info = get_post_meta( get_the_ID(), '_sfwd-courses', true );
	$type = isset($info['sfwd-courses_course_price_type']) ? $info['sfwd-courses_course_price_type'] : '' ;

	if( ! in_array( $type, array('open','free') ) ){

		$type = 'paid';

		if ( $class == 'class' ){
			return $type;
		}

		$courses_options = learndash_get_option( 'sfwd-courses' );
		$currency        = isset( $courses_options['paypal_currency'] ) ? $courses_options['paypal_currency'] : '';

		$price_courses = isset($info['sfwd-courses_course_price']) ? $info['sfwd-courses_course_price'] : '';

		echo EduPro_Helper::get_currency_symbol( $currency ) . esc_html( $price_courses );
	}else{
		echo $type;
	}
}

/**
 * Check if course is a video course.
 *
 * @param  int|null $course_id Course ID. Omit to use current post ID.
 *
 * @return bool
 */
function edupro_is_video_course( $course_id = null ) {
	$lessons = learndash_get_lesson_list( $course_id );
	if ( ! is_array( $lessons ) || empty( $lessons ) ) {
		return false;
	}
	foreach ( $lessons as $lesson ) {
		$topics = learndash_get_topic_list( $lesson->ID );
		if ( ! is_array( $topics ) || empty( $topics ) ) {
			return false;
		}
		foreach ( $topics as $topic ) {
			$content = get_post_field( 'post_content', $topic->ID );
			$content = get_extended( $content );
			if ( ! empty( $content['extended'] ) && strpos( $content['extended'], '</iframe>' ) !== false ) {
				return true;
			}
		}
	}

	return false;
}

/**
 * Excerpt max charlength
 *
 * @param $charlength
 */
function edupro_the_excerpt_max_charlength( $charlength ) {
	$excerpt = get_the_excerpt( get_the_ID() );

	$charlength ++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex   = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut   = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '...';
	} else {
		echo $excerpt;
	}
}