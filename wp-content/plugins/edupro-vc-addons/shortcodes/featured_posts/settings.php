<?php

/**
 * Featured posts shortcode.
 */
class WPBakeryShortCode_EduPro_Featured_Posts extends WPBakeryShortCode {
}

// Shortcode settings
return array(
	'name'        => esc_html__( 'Featured Posts', 'edupro-addons' ),
	'description' => esc_html__( 'Show featured posts.', 'edupro-addons' ),
	'params'      => array(
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Number of posts', 'edupro-addons' ),
			'param_name' => 'number',
			'std'        => '3',
			'admin_label' => true
		),		
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Number of column', 'edupro-addons' ),
			'param_name' => 'number_column',
			'value'      => array(
				__('1 Columns') => '12',
				__('2 Columns') => '6',
				__('3 Columns') => '4',
				__('4 Columns') => '3',
				__('6 Columns') => '2',
			),
			'std'        => '4'
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Select category', 'edupro-addons' ),
			'value'      => EduPro_Helper::get_terms( 'category' ),
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
				'1' => EDUPRO_ADDONS_URL . 'assets/img/featured-post-1.png',
				'2' => EDUPRO_ADDONS_URL . 'assets/img/featured-post-2.png',
				'4' => EDUPRO_ADDONS_URL . 'assets/img/featured-post-4.png',
			),
			'std'        => '1',
			'admin_label' => true
		),
	)
);