<?php

/**
 * Featured courses shortcode.
 */
class WPBakeryShortCode_EduPro_Video extends WPBakeryShortCode {
}

// Shortcode settings
return array(
	'name'        => esc_html__( 'Video', 'edupro-addons' ),
	'description' => esc_html__( 'Embed Youtube/Vimeo video on the website', 'edupro-addons' ),
	'params'      => array(
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Video Link', 'edupro-addons' ),
			'param_name' => 'link',
		),

		array(
			'type'       => 'attach_image',
			'heading'    => esc_html__( 'Cover Image', 'edupro-addons' ),
			'param_name' => 'cover',
		),

		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Size icon play', 'edupro-addons' ),
			'param_name' => 'font_size_play',
		),

		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Color icon play', 'edupro-addons' ),
			'param_name' => 'color_play_color',
		),

		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Hover color icon play', 'edupro-addons' ),
			'param_name' => 'hover_color_play_color',
		),
	),
);