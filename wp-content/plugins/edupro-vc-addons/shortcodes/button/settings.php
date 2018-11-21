<?php

/**
 * Featured courses shortcode.
 */
class WPBakeryShortCode_EduPro_Button extends WPBakeryShortCode {
}

// Shortcode settings
return array(
	'name'   => esc_html__( 'Button', 'edupro-addons' ),
	'params' => array(
		// General
		array(
			'type'       => 'vc_link',
			'heading'    => esc_html__( 'Button Link', 'edupro-addons' ),
			'param_name' => 'link',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Size', 'edupro-addons' ),
			'param_name' => 'size',
			'value'      => array(
				esc_html__( 'Normal', 'edupro-addons' )     => '',
				esc_html__( 'Mini', 'edupro-addons' )       => 'mini',
				esc_html__( 'Small', 'edupro-addons' )      => 'small',
				esc_html__( 'Large', 'edupro-addons' )      => 'large',
				esc_html__( 'Full width', 'edupro-addons' ) => 'block',
				esc_html__( 'Custom', 'edupro-addons' )     => 'custom',
			),
		),
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Padding Left / Right', 'edupro-addons' ),
			'param_name' => 'padding_left',
			'dependency' => array(
				'element' => 'size',
				'value'   => 'custom'
			),
		),
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Padding Top / Bottom', 'edupro-addons' ),
			'param_name' => 'padding_top',
			'dependency' => array(
				'element' => 'size',
				'value'   => 'custom'
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Alignment', 'edupro-addons' ),
			'param_name' => 'align',
			'value'      => array(
				esc_html__( 'None', 'edupro-addons' )   => '',
				esc_html__( 'Left', 'edupro-addons' )   => 'left',
				esc_html__( 'Center', 'edupro-addons' ) => 'center',
				esc_html__( 'Right', 'edupro-addons' )  => 'right',
			),
			'std'        => 'center',
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Rel Attribute', 'edupro-addons' ),
			'param_name' => 'rel',
		),		
		array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'No use link for text', 'edupro-addons' ),
			'param_name' => 'no_link',
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
			'heading'    => esc_html__( 'Background Hover Color', 'edupro-addons' ),
			'param_name' => 'background_hover_color',
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
			'heading'    => esc_html__( 'Text Hover Color', 'edupro-addons' ),
			'param_name' => 'text_color_hover',
			'group'      => esc_html__( 'Colors', 'edupro-addons' ),
		),

		// Icon
		array(
			'type'       => 'iconpicker',
			'heading'    => esc_html__( 'Icon', 'edupro-addons' ),
			'param_name' => 'icon',
			'settings'   => array(
				'emptyIcon'    => true,
				'type'         => 'fontawesome',
				'iconsPerPage' => 4000,
			),
			'group'      => esc_html__( 'Icon', 'edupro-addons' ),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Icon Position', 'edupro-addons' ),
			'param_name' => 'icon_position',
			'value'      => array(
				esc_html__( 'Left', 'edupro-addons' )  => 'left',
				esc_html__( 'Right', 'edupro-addons' ) => 'right',
			),
			'group'      => esc_html__( 'Icon', 'edupro-addons' ),
		),
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Icon Size', 'edupro-addons' ),
			'param_name' => 'icon_size',
			'group'      => esc_html__( 'Icon', 'edupro-addons' ),
		),
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Icon Space Left', 'edupro-addons' ),
			'param_name' => 'icon_space_left',
			'group'      => esc_html__( 'Icon', 'edupro-addons' ),
		),
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Icon Space Right', 'edupro-addons' ),
			'param_name' => 'icon_space_right',
			'group'      => esc_html__( 'Icon', 'edupro-addons' ),
		),

		// Border
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Border Style', 'edupro-addons' ),
			'param_name' => 'border_style',
			'value'      => array(
				esc_html__( 'None', 'edupro-addons' )   => '',
				esc_html__( 'Solid', 'edupro-addons' )  => 'solid',
				esc_html__( 'Dashed', 'edupro-addons' ) => 'dashed',
				esc_html__( 'Dotted', 'edupro-addons' ) => 'dotted',
				esc_html__( 'Double', 'edupro-addons' ) => 'double',
				esc_html__( 'Inset', 'edupro-addons' )  => 'inset',
				esc_html__( 'Outset', 'edupro-addons' ) => 'outset',
			),
			'std'        => 'solid',
			'group'      => esc_html__( 'Border', 'edupro-addons' ),
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Border Color', 'edupro-addons' ),
			'param_name' => 'border_color',
			'group'      => esc_html__( 'Border', 'edupro-addons' ),
			'dependency' => array(
				'element'   => 'border_style',
				'not_empty' => true,
			),
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Border Hover Color', 'edupro-addons' ),
			'param_name' => 'border_hover_color',
			'dependency' => array(
				'element'   => 'border_style',
				'not_empty' => true,
			),
			'group'      => esc_html__( 'Border', 'edupro-addons' ),
		),
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Border Width', 'edupro-addons' ),
			'param_name' => 'border_width',
			'std'      => '2px',
			'dependency' => array(
				'element'   => 'border_style',
				'not_empty' => true,
			),
			'group'      => esc_html__( 'Border', 'edupro-addons' ),
		),
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Border Radius', 'edupro-addons' ),
			'param_name' => 'border_radius',
			'dependency' => array(
				'element'   => 'border_style',
				'not_empty' => true,
			),
			'group'      => esc_html__( 'Border', 'edupro-addons' ),
		),

		// Typography
		array(
			'type'       => 'google_fonts',
			'heading'    => esc_html__( 'Google Fonts', 'edupro-addons' ),
			'param_name' => 'font',
			'value'      => 'font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:500%20bold%20regular%3A500%3Anormal',
			'group'      => esc_html__( 'Typography', 'edupro-addons' ),
		),
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Font Size', 'edupro-addons' ),
			'param_name' => 'font_size',
			'group'      => esc_html__( 'Typography', 'edupro-addons' ),
		),
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Line Height', 'edupro-addons' ),
			'param_name' => 'line_height',
			'group'      => esc_html__( 'Typography', 'edupro-addons' ),
		),
		array(
			'type'        => 'fitwp_number',
			'heading'     => esc_html__( 'Letter Spacing', 'edupro-addons' ),
			'param_name'  => 'letter_spacing',
			'description' => esc_html__( 'Enter letter spacing', 'edupro-addons' ),
			'group'       => esc_html__( 'Typography', 'edupro-addons' ),
		),	
	),
);