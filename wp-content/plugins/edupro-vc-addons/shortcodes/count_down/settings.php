<?php

/**
 * Featured courses shortcode.
 */
class WPBakeryShortCode_EduPro_Count_Down extends WPBakeryShortCode {
}

// Shortcode settings
return array(
	'name'        => esc_html__( 'Count Down', 'edupro-addons' ),
	'description' => esc_html__( 'Count down time to event format', 'edupro-addons' ),
	'params'      => array(
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Style', 'edupro-addons' ),
			'param_name' => 'count_down_style',
			'value'      => array(
				esc_html__( 'Style 1', 'edupro-addons' )    => 'style-1',
				esc_html__( 'style 2', 'edupro-addons' )  => 'style-2',
			),
			'std'        => 'style-1',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Posttion', 'edupro-addons' ),
			'param_name' => 'count_down_posttion',
			'value'      => array(
				esc_html__( 'Left', 'edupro-addons' )    => 'style-left',
				esc_html__( 'Center', 'edupro-addons' )  => 'style-center',
				esc_html__( 'Right', 'edupro-addons' )  => 'style-right',
			),
			'std'        => 'style-left',
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Year', 'edupro-addons' ),
			'param_name'  => 'count_year',
			'admin_label' => true,
			'edit_field_class' => 'vc_col-sm-2',
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Month', 'edupro-addons' ),
			'param_name' => 'count_month',
			'admin_label' => true,
			'edit_field_class' => 'vc_col-sm-2',

		),	
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Day', 'edupro-addons' ),
			'param_name' => 'count_day',
			'admin_label' => true,
			'edit_field_class' => 'vc_col-sm-2',

		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Hour', 'edupro-addons' ),
			'param_name' => 'count_hour',
			'admin_label' => true,
			'edit_field_class' => 'vc_col-sm-2',

		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Minus', 'edupro-addons' ),
			'param_name' => 'count_minus',
			'admin_label' => true,
			'edit_field_class' => 'vc_col-sm-2',

		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Sec', 'edupro-addons' ),
			'param_name' => 'count_sec',
			'admin_label' => true,
			'edit_field_class' => 'vc_col-sm-2',
		),													
	),
);