<?php

/**
 * Featured courses shortcode.
 */
class WPBakeryShortCode_EduPro_Counter_Icon extends WPBakeryShortCode {
}

// Shortcode settings
return array(
	'name'        => esc_html__( 'Counter Icon', 'edupro-addons' ),
	'description' => esc_html__( 'Counter Icon', 'edupro-addons' ),
	'params'      => array(
		array(
			'type'       => 'iconpicker',
			'heading'    => esc_html__( 'Icon', 'edupro-addons' ),
			'param_name' => 'icon-1',
			'settings'   => array(
				'emptyIcon'    => true,
				'type'         => 'fontawesome',
				'iconsPerPage' => 4000,
			),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Number 1', 'edupro-addons' ),
			'param_name'  => 'cu_number_1',
			'admin_label' => true,
		),		
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Text 1', 'edupro-addons' ),
			'param_name' => 'cu_text_1',

		),
		array(
			'type'       => 'iconpicker',
			'heading'    => esc_html__( 'Icon', 'edupro-addons' ),
			'param_name' => 'icon-2',
			'settings'   => array(
				'emptyIcon'    => true,
				'type'         => 'fontawesome',
				'iconsPerPage' => 4000,
			),
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Number 2', 'edupro-addons' ),
			'param_name' => 'cu_number_2',

		),			
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Text 2', 'edupro-addons' ),
			'param_name' => 'cu_text_2',

		),
		array(
			'type'       => 'iconpicker',
			'heading'    => esc_html__( 'Icon', 'edupro-addons' ),
			'param_name' => 'icon-3',
			'settings'   => array(
				'emptyIcon'    => true,
				'type'         => 'fontawesome',
				'iconsPerPage' => 4000,
			),
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Number 3', 'edupro-addons' ),
			'param_name' => 'cu_number_3',

		),		
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Text 3', 'edupro-addons' ),
			'param_name' => 'cu_text_3',

		),
		array(
			'type'       => 'iconpicker',
			'heading'    => esc_html__( 'Icon', 'edupro-addons' ),
			'param_name' => 'icon-4',
			'settings'   => array(
				'emptyIcon'    => true,
				'type'         => 'fontawesome',
				'iconsPerPage' => 4000,
			),
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Number 4', 'edupro-addons' ),
			'param_name' => 'cu_number_4',

		),		
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Text 4', 'edupro-addons' ),
			'param_name' => 'cu_text_4',

		),
	),
);