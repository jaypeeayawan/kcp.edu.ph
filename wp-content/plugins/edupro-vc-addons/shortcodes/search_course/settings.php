<?php
class WPBakeryShortCode_EduPro_Search_Course extends WPBakeryShortCode {
}

return array(
	'name'        => esc_html__( 'Search Course', 'edupro-addons' ),
	'description' => esc_html__( 'Search Course Form.', 'edupro-addons' ),
	'params'      => array(
		array(
			'type'       => 'fitwp_image_select',
			'heading'    => esc_html__( 'Style', 'edupro-addons' ),
			'param_name' => 'style',
			'options'    => array(
				'1' => EDUPRO_ADDONS_URL . 'assets/img/search-course-1.png',
				'2' => EDUPRO_ADDONS_URL . 'assets/img/search-course-2.png',
				'3' => EDUPRO_ADDONS_URL . 'assets/img/search-course-3.png',
			),
			'std' => '1',
			'admin_label' => true
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Text button submit color', 'edupro-addons' ),
			'param_name'  => 'txt_btn_submit_color',
			'description' => esc_html__( 'Submit color.', 'edupro-addons' ),
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Hover text button submit color', 'edupro-addons' ),
			'param_name'  => 'hover_txt_btn_submit_color',
			'description' => esc_html__( 'Hover submit color.', 'edupro-addons' ),
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Background button submit color', 'edupro-addons' ),
			'param_name'  => 'bg_btn_submit_color',
			'description' => esc_html__( 'Hover submit color.', 'edupro-addons' ),
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Hover background button submit color', 'edupro-addons' ),
			'param_name'  => 'hover_bg_btn_submit_color',
			'description' => esc_html__( 'Hover submit color.', 'edupro-addons' ),
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Border button submit color', 'edupro-addons' ),
			'param_name'  => 'bdr_btn_submit_color',
			'description' => esc_html__( 'Hover submit color.', 'edupro-addons' ),
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Hover border button submit color', 'edupro-addons' ),
			'param_name'  => 'hover_bdr_btn_submit_color',
			'description' => esc_html__( 'Hover submit color.', 'edupro-addons' ),
		),
	)
);