<?php

/**
 * Featured courses shortcode.
 */
class WPBakeryShortCode_EduPro_Featured_Courses extends WPBakeryShortCode {
}

// Shortcode settings
return array(
	'name'        => esc_html__( 'Featured Courses', 'edupro-addons' ),
	'description' => esc_html__( 'Show featured courses.', 'edupro-addons' ),
	'params'      => array(
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Number of courses', 'edupro-addons' ),
			'param_name' => 'number',
			'std'        => 4,
			'admin_label' => true
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Select category', 'edupro-addons' ),
			'value'      => EduPro_Helper::edu_list_categories(),
			'param_name' => 'cat',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Select tag', 'edupro-addons' ),
			'value'      => EduPro_Helper::get_terms( 'post_tag' ),
			'param_name' => 'tag',
		),
		array(
			'type'       => 'fitwp_image_select',
			'heading'    => esc_html__( 'Style', 'edupro-addons' ),
			'param_name' => 'style',
			'options'    => array(
				'1' => EDUPRO_ADDONS_URL . 'assets/img/featured-courses-1.png',
				'2' => EDUPRO_ADDONS_URL . 'assets/img/featured-courses-2.png',
				'3' => EDUPRO_ADDONS_URL . 'assets/img/featured-courses-3.png',
				'4' => EDUPRO_ADDONS_URL . 'assets/img/featured-courses-4.png',
				'5' => EDUPRO_ADDONS_URL . 'assets/img/featured-courses-5.png',
				'6' => EDUPRO_ADDONS_URL . 'assets/img/featured-courses-6.png',
			),
			'std'        => 1,
			'admin_label' => true
		),
	)
);