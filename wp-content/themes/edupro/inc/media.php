<?php
/**
 * Enqueue scripts and styles.
 */
function edupro_scripts() {
	// Stylesheets.
	// Customized bootstrap for the theme.
	wp_enqueue_style( 'edupro-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', '', '3.3.7' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', '', '4.5.0' );
	wp_enqueue_style( 'edupro-fonts', edupro_fonts_url() );
	wp_enqueue_style( 'edupro-style', get_stylesheet_uri() );

	// Scripts.
	//wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '', true );
	wp_register_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'edupro-courses', get_template_directory_uri() . '/js/courses.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'edupro-login-popup', get_template_directory_uri() . '/js/login-popup.js', array( 'jquery' ), '', true );

	// Superfish for menu.
	wp_register_script( 'hoverintent', get_template_directory_uri() . '/js/hoverIntent.js', array( 'jquery' ), '', true );
	wp_register_script( 'superfish', get_template_directory_uri() . '/js/superfish.min.js', array( 'hoverintent' ), '1.7.9', true );
	wp_register_script( 'supersubs', get_template_directory_uri() . '/js/supersubs.js', array( 'superfish' ), '', true );

	wp_register_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/js/theia-sticky-sidebar.js', array( 'jquery' ), '', true );

	// Sticky for menu.
	wp_register_script( 'sticky-kit', get_template_directory_uri() . '/js/jquery.sticky.js', array( 'jquery' ), '', true );

	// Nice scroll
	if ( edupro_get_setting( 'smooth_scroll' ) ) {
		//wp_enqueue_script( 'ScrollToPlugin', get_template_directory_uri() . '/js/ScrollToPlugin.min.js', array( 'jquery' ), '1.8.0', true );
		//wp_enqueue_script( 'TweenLite', get_template_directory_uri() . '/js/TweenLite.min.js', array( 'jquery' ), '1.19.0', true );
		wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/js/smoothscroll.js', array( 'jquery' ), '', true );
	}

	wp_enqueue_script( 'edupro', get_template_directory_uri() . '/js/script.js', array(
		//'bootstrap-js',
		'slick-js',
		'edupro-courses',
		'edupro-login-popup',
		'sticky-kit',
		'supersubs',
		'imagesloaded',
		'theia-sticky-sidebar',
		'isotope',
	), '1.0' );

	$localize_script = array(
		'errorMsg'     => esc_html__( 'Something wrong happened. Please try again.', 'edupro' ),
		'ajaxUrl'      => admin_url( 'admin-ajax.php' ),
		'nonce_course' => wp_create_nonce( 'nonce-courses' ),
		'nonce_event'  => wp_create_nonce( 'nonce-events' ),
		'login'        => esc_attr__( 'Email Address', 'edupro' ),
		'password'     => esc_attr__( 'Password', 'edupro' ),
		'errorPass'    => '<p class="message message-error">' . esc_html__( 'Password does not match the confirm password.', 'edupro' ) . '</p>',

	);

	wp_localize_script( 'edupro', 'EduPro', $localize_script );
	wp_localize_script( 'edupro-login-popup', 'EduPro', $localize_script );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'edupro_scripts' );

/**
 * Get Google fonts URL for the theme.
 *
 * @return string Google fonts URL for the theme.
 */
function edupro_fonts_url() {
	$fonts   = array();
	$subsets = 'latin,latin-ext';

	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'edupro' ) ) {
		$fonts[] = 'Roboto:400,400italic,500,700,700italic';
	}
	if ( 'off' !== _x( 'on', 'Roboto Condensed font: on or off', 'edupro' ) ) {
		$fonts[] = 'Roboto Condensed:400,700';
	}

	$fonts_url = add_query_arg( array(
		'family' => urlencode( implode( '|', $fonts ) ),
		'subset' => urlencode( $subsets ),
	), 'https://fonts.googleapis.com/css' );

	return $fonts_url;
}

/**
 * Get infomation course session topic for the theme.
 *
 * @return string for the theme.
 */
function edupro_time_second( $time ) {
	$second = 0;
	if ( preg_match( '/^(?:(?<hours>\d+)h\s*)?(?:(?<minutes>\d+)m\s*)?(?:(?<seconds>\d+)s\s*)?$/', $time, $matches ) ) {
		$second = ( ! empty( $matches['hours'] ) ? $matches['hours'] * 3600 : '00' );
		$second += ( ! empty( $matches['minutes'] ) ? $matches['minutes'] * 60 : '00' );
		$second += ( ! empty( $matches['seconds'] ) ? $matches['seconds'] : '00' );
	}
	if ( preg_match( '/^(?:(?<hours>\d+)hr\s*)?(?:(?<minutes>\d+)min\s*)?(?:(?<seconds>\d+)sec\s*)?$/', $time, $matches ) ) {
		$second = ( ! empty( $matches['hours'] ) ? $matches['hours'] * 3600 : '00' );
		$second += ( ! empty( $matches['minutes'] ) ? $matches['minutes'] * 60 : '00' );
		$second += ( ! empty( $matches['seconds'] ) ? $matches['seconds'] : '00' );
	}

	return $second;
}

function edupro_duration_course( $course_id ) {
	$total_second = 0;
	$course       = get_post( $course_id );
	$lessons      = learndash_get_course_lessons_list( $course );
	if ( is_array( $lessons ) || is_object( $lessons ) ) :
		foreach ( $lessons as $lesson ) :
			$lesson_topics[ $lesson['post']->ID ] = learndash_topic_dots( $lesson['post']->ID, false, 'array' );
			$topics                               = @$lesson_topics[ $lesson['post']->ID ];
			if ( is_array( $topics ) || is_object( $topics ) ) :
				foreach ( (array) $topics as $key => $topic ) :
					$meta = get_post_meta( $topic->ID, '_' . $topic->post_type );
					if ( $meta[0][ $topic->post_type . '_forced_lesson_time' ] ) :
						$time = $meta[0][ $topic->post_type . '_forced_lesson_time' ];
						$total_second += edupro_time_second( $time );
					endif;
				endforeach;
			endif;
		endforeach;
	endif;
	$total_time = number_format( $total_second / 3600, 1 );

	return $total_time;
}

function edupro_number_topics( $course_id ) {
	$course       = get_post( $course_id );
	$total_topics = 0;
	$lessons      = learndash_get_course_lessons_list( $course );
	if ( is_array( $lessons ) || is_object( $lessons ) ) :
		foreach ( $lessons as $lesson ) :
			$lesson_topics[ $lesson['post']->ID ] = learndash_topic_dots( $lesson['post']->ID, false, 'array' );
			$topics                               = @$lesson_topics[ $lesson['post']->ID ];
			$number_topics                        = count( $topics );
			$total_topics += $number_topics;
		endforeach;
	endif;

	return $total_topics;
}

function edupro_number_student( $course_id ) {
	$meta = get_post_meta( $course_id, '_sfwd-courses', true );
	if ( $meta['sfwd-courses_course_access_list'] ) {
		$access_list = $meta['sfwd-courses_course_access_list'];
		$lists       = explode( ',', $access_list );
		$student     = count( $lists );
	} else {
		$student = 0;
	}

	return $student;
}

function edupro_get_video( $course_id ) {
	$user_id        = get_the_author_meta( 'ID' );
	$has_access     = sfwd_lms_has_access( $course_id, $user_id );
	$course         = get_post( $course_id );
	$lessons        = learndash_get_course_lessons_list( $course );
	if ( is_array( $lessons ) || is_object( $lessons ) ) :
		foreach ( $lessons as $lesson ) :
			$lesson_topics[ $lesson['post']->ID ] = learndash_topic_dots( $lesson['post']->ID, false, 'array' );
			$topics = @$lesson_topics[ $lesson['post']->ID ];
			if ( is_array( $topics ) || is_object( $topics ) ) :
				?>
				<?php foreach ( $topics as $topic ) : ?>
				<?php
				$content = get_post_field( 'post_content', $topic->ID );
				$content = get_extended( $content );

				$trailers = $content['extended']; ?>
				<?php if ( strpos( $trailers, '</iframe>' ) !== false ) : ?>
					<div class='single__video-list trailer'>
						<div class="thumb-video row">
							<div class="col-sm-5">
								<?php echo $trailers; ?>
							</div>
							<div class="col-sm-7">
								<div class="topic__title"><a href="#"><?php echo $topic->post_title; ?></a>
								</div>
								<?php $meta = get_post_meta( $topic->ID, '_' . $topic->post_type ); ?>
								<?php $time = $meta[0][ $topic->post_type . '_forced_lesson_time' ]; ?>
								<span class="topic__time"><i class="fa fa-clock-o"></i>
									<?php echo gmdate( 'H:i:s', edupro_time_second( $time ) ); ?></span>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<?php
			endforeach;
			endif; ?>
		<?php endforeach;
	endif;
}

function edupro_user_social_button( $id ) {
	$socials     = array( 'googleplus', 'twitter', 'facebook', 'linkedin', 'instagram', 'dribbble' );
	$output = '';

	foreach ( $socials as $social ) {
		$social_value = get_the_author_meta( $social, $id  );

		if ( empty( $social_value ) ) {
			continue;
		}

		$output .= sprintf( '<li><a href="%s"><i class="fa fa-%s"></i></a></li>',
			esc_url( $social_value ),
			esc_html( 'googleplus' == $social ? 'google' : $social )
		);
	}

	if( empty( $output ) ) {
		return '';
	}

	echo '<ul class="social-user">' . wp_kses_post( $output ) . '</ul>';
}

/**
 * searchfilter description
 *
 * @param  $query
 *
 * @return $query
 */
if ( ! function_exists( 'edupro_search_filter' ) ) {
	function edupro_search_filter( $query ) {
		$arg_taxonomy = array(
			'taxonomy' => 'course_category',
			'field'    => 'slug',
			'terms'    => filter_input( INPUT_GET, 'terms' ),
		);

		$arg_price_type = array(
			'key'     => '_sfwd-courses',
			'value'   => serialize( strval( filter_input( INPUT_GET, 'course_price_types' ) ) ),
			'compare' => 'LIKE',
		);

		if ( $query->is_search && ! is_admin() && $query->is_main_query() ) {
			$query->set( 'post_type', array( 'sfwd-courses' ) );

			if ( filter_input( INPUT_GET, 'terms' ) ) {
				$query->set( 'tax_query', array( $arg_taxonomy ) );
			}
			if ( filter_input( INPUT_GET, 'course_price_types' ) ) {
				$query->set( 'meta_query', array( $arg_price_type ) );
			}
		}

		return $query;
	}
}
if ( filter_input( INPUT_GET, 'post_type' ) == 'sfwd-courses' ) {
	add_filter( 'pre_get_posts', 'edupro_search_filter' );
}

/**
 * Display post thumbnail. Use featured image first and fallback to first image in the post content
 *
 * @param array $args
 *
 * @return bool
 */
function edupro_post_thumbnail( $args = array() ) {
	$args = wp_parse_args( $args, array(
		'post'   => null,
		'size'   => 'thumbnail',
		'before' => '',
		'after'  => '',
		'scan'   => true,
		'echo'   => true,
	) );

	$url   = '';
	$image = '';

	// Get post thumbnail
	if ( has_post_thumbnail( $args['post'] ) ) {
		$url   = get_the_post_thumbnail_url( $args['post'], $args['size'] );
		$image = get_the_post_thumbnail( $args['post'], $args['size'] );
	} // Get the first image in the post content
	elseif ( $args['scan'] && preg_match( '|<img.*?src=[\'"](.*?)[\'"].*?>|i', get_post_field( 'post_content', $args['post'] ), $matches ) ) {
		$url   = $matches[1];
		$image = $matches[0];
	}

	if ( empty( $image ) ) {
		$image_size_info = edupro_get_image_sizes( $args['size'] );

		$image = '<img width="' . $image_size_info['width'] . '" height="' . $image_size_info['height'] . '" src="' . get_template_directory_uri() . '/img/thumb-default.png" alt="image default"/>';
	}

	if ( ! $args['echo'] ) {
		return $url;
	}

	echo $args['before'] . $image . $args['after'];
}
