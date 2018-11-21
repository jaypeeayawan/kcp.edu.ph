<?php
/**
 * Pricing table shortcode.
 */
class WPBakeryShortCode_EduPro_Pricing_Table extends WPBakeryShortCodesContainer {
}

return array(
	'name'        => esc_html__( 'Pricing Table','edupro-addons' ),
	'description' => esc_html__( 'Pricing Tables for Visual Composer','edupro-addons' ),
	'as_parent'   => array( 'except' => 'edupro_container' ),
	'js_view'     => 'VcColumnView',
	'params' => array(
		array(
			'type'     =>'textfield',
			'heading'  => esc_html__( 'Package', 'edupro-addons'),
			'param_name' =>'pricing_package',
			),		
		array(
			'type'     =>'textfield',
			'heading'  => esc_html__( 'Price', 'edupro-addons'),
			'param_name' =>'pricing_price',
			),		
		array(
			'type'     =>'textfield',
			'heading'  => esc_html__( 'Period', 'edupro-addons'),
			'param_name' =>'pricing_period',
			),		
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Package', 'edupro-addons' ),
			'param_name' => 'package_color',
			'group'      => esc_html__( 'Color', 'edupro-addons' ),
		),			
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Package', 'edupro-addons' ),
			'param_name' => 'package_background_color',
			'group'      => esc_html__( 'Heading background color', 'edupro-addons' ),
		),		
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Price', 'edupro-addons' ),
			'param_name' => 'price_color',
			'group'      => esc_html__( 'Color', 'edupro-addons' ),
		),		
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Period', 'edupro-addons' ),
			'param_name' => 'period_color',
			'group'      => esc_html__( 'Color', 'edupro-addons' ),
		),			
	),
);
