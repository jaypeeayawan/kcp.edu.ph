<?php
add_filter( 'rwmb_meta_boxes', 'edupro_register_meta_boxes' );

/**
 * Add custom meta boxes for courses.
 *
 * @param array $meta_boxes
 *
 * @return array
 */
function edupro_register_meta_boxes( $meta_boxes ) {

	$meta_boxes[] = array(
		'id'         => 'infomation_course',
		'title'      => esc_html__( 'Courses Information', 'edupro' ),
		'post_types' => array( 'sfwd-courses' ),
		'fields' => array(
			array(
				'name'  => esc_html__( 'Skill Level', 'edupro' ),
				'id'    => 'skill-lever',
				'type'  => 'text',
				'class' => 'skill_lever',
			),

			array(
				'name'  => esc_html__( 'Language', 'edupro' ),
				'id'    => 'language-course',
				'type'  => 'text',
				'class' => 'language_course',
			),
		),
	);

	$field_page = array(
		array(
			'id'   => 'hide_title_breadcrumb_page',
			'name' => __( 'Hide title and breadcrumb', 'edupro' ),
			'type' => 'checkbox',
			'desc' => __( 'Check on if you want the title and breadcrumb hide for Page.', 'edupro' ),
		),
	);
	// bbPress
	if ( class_exists( 'bbPress' ) ) {
		$field_page[] = array(
			'id'   => 'sidebar_bbpress',
			'name' => __( 'Sidebar bbPress', 'edupro' ),
			'type' => 'checkbox',
			'desc' => __( 'Check on if you want use Sidebar bbPress for Page.', 'edupro' ),
		);
	}

	$meta_boxes[] = array(
		'title'  => __( 'Page Option', 'edupro' ),
		'post_types' => 'page',
		'fields' => $field_page,
	);

	// Top slider for pages.
	if ( class_exists( 'RevSlider' ) ) {
		$meta_boxes[] = array(
			'title'      => esc_html__( 'Top Slider', 'edupro' ),
			'post_types' => 'page',
			'fields'     => array(
				array(
					'id'   => 'homepage_slider',
					'name' => esc_html__( 'Select a Revolution Slider for the top slider', 'edupro' ),
					'type'     => 'select',
					'options'  => edupro_get_list_slider(),
				),
			),
		);
	}

	$taxonomies = array(
		'category',
		'post_tag',
		'event_category',
		'event_tag',
		'jetpack-portfolio-type',
		'jetpack-portfolio-tag',
		'course_category'
	);

	$meta_boxes[] = array(
		'title'      => '',
		'taxonomies' => $taxonomies,
		'fields' => array(
			array(
				'name' => esc_html__( 'Featured Image', 'edupro' ),
				'id'   => 'thumbnail_id',
				'type' => 'image_advanced',
			)
		),
	);

	return $meta_boxes;
}

/**
 * Get list slider
 *
 * @return array
 */
function edupro_get_list_slider() {
	$revsliders = array( '' => esc_html__( '-- None --', 'edupro' ) );

	$slider = new RevSlider();
	if ( $arrSliders = $slider->getArrSliders() ) {
		foreach ( $arrSliders as $slider ) {
			$revsliders[ $slider->getAlias() ] = $slider->getTitle();
		}
	}

	return $revsliders;
}
