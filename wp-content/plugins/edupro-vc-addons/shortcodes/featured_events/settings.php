<?php

/**
 * Featured events shortcode.
 */
class WPBakeryShortCode_EduPro_Featured_Events extends WPBakeryShortCode {
}

// Shortcode settings
return array(
	'name'        => esc_html__( 'Featured Events', 'edupro-addons' ),
	'description' => esc_html__( 'Show featured events.', 'edupro-addons' ),
	'params'      => array(

		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Number of events', 'edupro-addons' ),
			'param_name' => 'number',
			'std'        => 4,
			'admin_label' => true
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Select category', 'edupro-addons' ),
			'value'      => EduPro_Helper::get_terms( 'event_category' ),
			'param_name' => 'cat',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Select tag', 'edupro-addons' ),
			'value'      => EduPro_Helper::get_terms( 'event_tag' ),
			'param_name' => 'tag',
		),
		array(
			'type'       => 'fitwp_image_select',
			'heading'    => esc_html__( 'Style', 'edupro-addons' ),
			'param_name' => 'style',
			'options'    => array(
				'1' => EDUPRO_ADDONS_URL . 'assets/img/featured-events-1.png',
				'2' => EDUPRO_ADDONS_URL . 'assets/img/featured-events-2.png',
				'3' => EDUPRO_ADDONS_URL . 'assets/img/featured-events-3.png',
				'4' => EDUPRO_ADDONS_URL . 'assets/img/featured-events-4.png',
				'5' => EDUPRO_ADDONS_URL . 'assets/img/featured-events-5.png',
			),
			'std'        => 1,
			'admin_label' => true
		)
	)
);