<?php

/**
 * Featured courses shortcode.
 */
class WPBakeryShortCode_EduPro_Counter_Up extends WPBakeryShortCode {
}

// Shortcode settings
return array(
	'name'        => esc_html__( 'Counter Up', 'edupro-addons' ),
	'description' => esc_html__( 'Counter Up', 'edupro-addons' ),
	'params'      => array(
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
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Number 4', 'edupro-addons' ),
			'param_name' => 'cu_number_4',

		),		
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Text 4', 'edupro-addons' ),
			'param_name' => 'cu_text_4',

		),

		/*setting*/
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Color Background 1', 'edupro-addons' ),
			'param_name' => 'background_1',
			'group'      => esc_html__( 'Setting Counter', 'edupro-addons' ),
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Color Border 1', 'edupro-addons' ),
			'param_name' => 'border_1',
			'group'      => esc_html__( 'Setting Counter', 'edupro-addons' ),
		),/*end setting counter 1*/
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Color Background 2', 'edupro-addons' ),
			'param_name' => 'background_2',
			'group'      => esc_html__( 'Setting Counter', 'edupro-addons' ),
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Color Border 2', 'edupro-addons' ),
			'param_name' => 'border_2',
			'group'      => esc_html__( 'Setting Counter', 'edupro-addons' ),
		),/*end setting counter 2*/
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Color Background 3', 'edupro-addons' ),
			'param_name' => 'background_3',
			'group'      => esc_html__( 'Setting Counter', 'edupro-addons' ),
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Color Border 3', 'edupro-addons' ),
			'param_name' => 'border_3',
			'group'      => esc_html__( 'Setting Counter', 'edupro-addons' ),
		),/*end setting counter 3*/
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Color Background 4', 'edupro-addons' ),
			'param_name' => 'background_4',
			'group'      => esc_html__( 'Setting Counter', 'edupro-addons' ),
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Color Border 4', 'edupro-addons' ),
			'param_name' => 'border_4',
			'group'      => esc_html__( 'Setting Counter', 'edupro-addons' ),
		),/*end setting counter 4*/
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Font Size', 'edupro-addons' ),
			'param_name' => 'cu_font_size',
			'group'      => esc_html__( 'Typography', 'edupro-addons' ),
		),
		array(
			'type'       => 'google_fonts',
			'heading'    => '',
			'param_name' => 'cu_title_fonts',
			'value'      => 'font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:500%20bold%20regular%3A500%3Anormal',
			'group'      => esc_html__( 'Typography', 'edupro-addons' ),
		),
	),
);