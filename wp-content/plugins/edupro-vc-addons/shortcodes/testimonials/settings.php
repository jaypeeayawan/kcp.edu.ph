<?php

/**
 * Featured posts shortcode.
 */
class WPBakeryShortCode_EduPro_Testimonials extends WPBakeryShortCode {
}

// Shortcode settings
return array(
	'name'        => esc_html__( 'Testimonials', 'edupro-addons' ),
	'description' => esc_html__( 'Show testimonials.', 'edupro-addons' ),
	'params'      => array(
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Number of testimonials', 'edupro-addons' ),
			'param_name' => 'number',
			'std'        => '3',
			'admin_label' =>  true,
		),
		array(
			'type'       => 'fitwp_image_select',
			'heading'    => esc_html__( 'Style', 'edupro-addons' ),
			'param_name' => 'style',
			'options'    => array(
				'1' => EDUPRO_ADDONS_URL . 'assets/img/testimonials-1.png',
				'2' => EDUPRO_ADDONS_URL . 'assets/img/testimonials-2.png',
				'3' => EDUPRO_ADDONS_URL . 'assets/img/testimonials-3.png',
				'4' => EDUPRO_ADDONS_URL . 'assets/img/testimonials-4.png',
			),
			'std' => '1',
			'admin_label' =>  true,
		),

		// Colors
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Background Color', 'edupro-addons' ),
			'param_name' => 'background_color',
			'group'      => esc_html__( 'Colors', 'edupro-addons' ),
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Text Color', 'edupro-addons' ),
			'param_name' => 'text_color',
			'group'      => esc_html__( 'Colors', 'edupro-addons' ),
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Dots Border Color', 'edupro-addons' ),
			'param_name' => 'dots_border_color',
			'group'      => esc_html__( 'Colors', 'edupro-addons' ),
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Dots Active Color', 'edupro-addons' ),
			'param_name' => 'dots_active_color',
			'group'      => esc_html__( 'Colors', 'edupro-addons' ),
		),
	)
);