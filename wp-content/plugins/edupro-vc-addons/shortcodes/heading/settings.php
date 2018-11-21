<?php

/**
 * Featured courses shortcode.
 */
class WPBakeryShortCode_EduPro_Heading extends WPBakeryShortCode {
}

// Shortcode settings
return array(
	'name'        => esc_html__( 'Heading', 'edupro-addons' ),
	'description' => esc_html__( 'Style heading for block.', 'edupro-addons' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Title', 'edupro-addons' ),
			'param_name'  => 'title',
			'admin_label' => true,
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Subtitle', 'edupro-addons' ),
			'param_name' => 'subtitle',
		),
		array(
			'type'       => 'textarea_html',
			'heading'    => esc_html__( 'Description', 'edupro-addons' ),
			'param_name' => 'content',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Text alignment', 'edupro-addons' ),
			'param_name' => 'text_align',
			'value'      => array(
				esc_html__( 'Left', 'edupro-addons' )   => 'text-left',
				esc_html__( 'Center', 'edupro-addons' ) => 'text-center',
				esc_html__( 'Right', 'edupro-addons' )  => 'text-right',
			),
			'std'        => 'text-center',
		),

		// Line
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Color', 'edupro-addons' ),
			'param_name' => 'line_color',
			'group'      => esc_html__( 'Line', 'edupro-addons' ),
		),
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Width', 'edupro-addons' ),
			'param_name' => 'line_width',
			'group'      => esc_html__( 'Line', 'edupro-addons' ),
		),
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Height', 'edupro-addons' ),
			'param_name' => 'line_height',
			'group'      => esc_html__( 'Line', 'edupro-addons' ),
		),
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Margin Top', 'edupro-addons' ),
			'param_name' => 'line_margin_top',
			'group'      => esc_html__( 'Line', 'edupro-addons' ),
		),
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Margin Bottom', 'edupro-addons' ),
			'param_name' => 'line_margin_bottom',
			'group'      => esc_html__( 'Line', 'edupro-addons' ),
		),

		// Title Group
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Color', 'edupro-addons' ),
			'param_name' => 'title_color',
			'group'      => esc_html__( 'Title', 'edupro-addons' ),
		),
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Font Size', 'edupro-addons' ),
			'param_name' => 'title_font_size',
			'group'      => esc_html__( 'Title', 'edupro-addons' ),
		),
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Line Height', 'edupro-addons' ),
			'param_name' => 'title_line_height',
			'group'      => esc_html__( 'Title', 'edupro-addons' ),
		),
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Letter Spacing', 'edupro-addons' ),
			'param_name' => 'title_letter_spacing',
			'group'      => esc_html__( 'Title', 'edupro-addons' ),
		),
		array(
			'type'       => 'google_fonts',
			'heading'    => esc_html__( 'Google Fonts', 'edupro-addons' ),
			'param_name' => 'title_fonts',
			'value'      => 'font_family:Roboto%20Condensed%3A300%2C300italic%2Cregular%2Citalic%2C700%2C700italic|font_style:700%20bold%20regular%3A700%3Anormal',
			'group'      => esc_html__( 'Title', 'edupro-addons' ),
		),

		// Subtitle
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Color', 'edupro-addons' ),
			'param_name' => 'subtitle_color',
			'group'      => esc_html__( 'Subtitle', 'edupro-addons' ),
		),
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Font Size', 'edupro-addons' ),
			'param_name' => 'subtitle_font_size',
			'group'      => esc_html__( 'Subtitle', 'edupro-addons' ),
		),
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Line Height', 'edupro-addons' ),
			'param_name' => 'subtitle_line_height',
			'group'      => esc_html__( 'Subtitle', 'edupro-addons' ),
		),
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Letter Spacing', 'edupro-addons' ),
			'param_name' => 'subtitle_letter_spacing',
			'group'      => esc_html__( 'Subtitle', 'edupro-addons' ),
		),
		array(
			'type'       => 'google_fonts',
			'heading'    => esc_html__( 'Google Fonts', 'edupro-addons' ),
			'param_name' => 'subtitle_fonts',
			'value'      => 'font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:400%20regular%3A400%3Anormal',
			'group'      => esc_html__( 'Subtitle', 'edupro-addons' ),
		),

		// Description Group
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Color', 'edupro-addons' ),
			'param_name' => 'description_color',
			'group'      => esc_html__( 'Description', 'edupro-addons' ),
		),
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Font Size', 'edupro-addons' ),
			'param_name' => 'description_font_size',
			'group'      => esc_html__( 'Description', 'edupro-addons' ),
		),
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Line Height', 'edupro-addons' ),
			'param_name' => 'description_line_height',
			'group'      => esc_html__( 'Description', 'edupro-addons' ),
		),
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Letter Spacing', 'edupro-addons' ),
			'param_name' => 'description_letter_spacing',
			'group'      => esc_html__( 'Description', 'edupro-addons' ),
		),
		array(
			'type'        => 'google_fonts',
			'heading'     => esc_html__( 'Google Fonts', 'edupro-addons' ),
			'param_name'  => 'description_fonts',
			'value'       => 'font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:400%20regular%3A400%3Anormal',
			'description' => esc_html__( 'Choose font for Description', 'edupro-addons' ),
			'group'       => esc_html__( 'Description', 'edupro-addons' ),
		),
	),
);