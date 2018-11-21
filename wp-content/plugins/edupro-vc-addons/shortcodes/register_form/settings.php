<?php

class WPBakeryShortCode_EduPro_Register_Form extends WPBakeryShortCode {
}

return array(
	'name'        => esc_html__( 'Registration Form', 'edupro-addons' ),
	'description' => esc_html__( 'Registration Form.', 'edupro-addons' ),
	'params'      => array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Style', 'edupro-addons' ),
			'value'       => array(
				__( 'Style 1', 'edupro-addons' ) => '1',
				__( 'Style 2', 'edupro-addons' ) => '2',
				__( 'Style 3', 'edupro-addons' ) => '3',
				__( 'Style 4', 'edupro-addons' ) => '4',
			),
			'param_name'  => 'style',
			'std'         => '1',
			'admin_label' => true,
			'description' => esc_html__( 'Select style form login', 'edupro-addons' ),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Title form', 'edupro-addons' ),
			'param_name'  => 'title_form',
			'admin_label' => true,
			'dependency'  => array( 'element' => 'style', 'value' => '3' ),
			'std'         => esc_html__( 'Create your free account', 'edupro-addons' ),

		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Text button submit', 'edupro-addons' ),
			'param_name'  => 'text_submit',
			'admin_label' => true,
			'std'         => esc_html__( 'Submit', 'edupro-addons' ),

		),
		array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Custom Instruction Message', 'edupro-addons' ),
			'param_name' => 'check_shortcode',
			'value'      => array( __( 'Yes', 'thej' ) => true ),
			'std'        => 0,
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Message:', 'edupro-addons' ),
			'param_name'  => 'shortcode',
			'admin_label' => true,
			'description' => esc_html__( 'You can paste the shortcode of social login plugin here to display other login options OR use this to show an instruction to users', 'edupro-addons' ),
			"dependency"  => array( 'element' => 'check_shortcode', 'not_empty' => true ),

		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Message position', 'edupro-addons' ),
			'value'      => array(
				esc_html__( 'Top', 'edupro-addons' )    => 'top',
				esc_html__( 'Bottom', 'edupro-addons' ) => 'bottom',
			),
			'param_name' => 'shortcode_pos',
			"dependency" => array( 'element' => 'check_shortcode', 'not_empty' => true ),
			'std'        => 'top',
		),
	)
);