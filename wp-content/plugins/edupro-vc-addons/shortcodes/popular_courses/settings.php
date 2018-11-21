<?php
/**
 * Featured courses shortcode.
 */
class WPBakeryShortCode_EduPro_Popular_Courses extends WPBakeryShortCode {
}


// Shortcode settings
return array(
	'name'        => esc_html__( 'Popular Courses', 'edupro-addons' ),
	'description' => esc_html__( 'Show featured courses.', 'edupro-addons' ),
	'params'      => array(
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Select category', 'edupro-addons' ),
			'value'      => EduPro_Helper::get_terms( 'course_category' ),
			'param_name' => 'cat',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Select tag', 'edupro-addons' ),
			'value'      => EduPro_Helper::get_terms( 'post_tag' ),
			'param_name' => 'tag',
		),
	)
);