<?php

/**
 * Featured courses shortcode.
 */
class WPBakeryShortCode_EduPro_Icon_Box extends WPBakeryShortCode {
}

// Shortcode settings
return array(
	'name'        => esc_html__( 'Icon Box', 'edupro-addons' ),
	'description' => esc_html__( 'Show highlight content in an icon box.', 'edupro-addons' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Title', 'edupro-addons' ),
			'param_name'  => 'title',
			'admin_label' => true,
		),
		array(
			'type'       => 'textarea',
			'heading'    => esc_html__( 'Text', 'edupro-addons' ),
			'param_name' => 'text',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Icon type', 'edupro-addons' ),
			'param_name' => 'icon_type',
			'value'      => array(
				esc_html__( 'Icon', 'edupro-addons' )  => 'icon',
				esc_html__( 'Image', 'edupro-addons' ) => 'image',
			),
		),
		array(
			'type'       => 'iconpicker',
			'heading'    => esc_html__( 'Icon', 'edupro-addons' ),
			'param_name' => 'icon',
			'settings'   => array(
				'emptyIcon'    => false,
				'type'         => 'fontawesome',
				'iconsPerPage' => 4000,
			),
			'dependency' => array(
				'element' => 'icon_type',
				'value'   => 'icon',
			),
		),
		array(
			'type'       => 'attach_image',
			'heading'    => esc_html__( 'Image', 'edupro-addons' ),
			'param_name' => 'image',
			'dependency' => array(
				'element' => 'icon_type',
				'value'   => 'image',
			),
		),
		array(
			'type'       => 'attach_image',
			'heading'    => esc_html__( 'Image hover', 'edupro-addons' ),
			'param_name' => 'image_hover',
			'dependency' => array(
				'element' => 'icon_type',
				'value'   => 'image',
			),
		),		
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Icon color', 'edupro-addons' ),
			'param_name' => 'icon_color',
			'dependency' => array(
				'element' => 'icon_type',
				'value'   => 'icon',
			),
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Icon background color', 'edupro-addons' ),
			'param_name'  => 'icon_bg_color',
			'description' => esc_html__( 'Set transparent to disable background.', 'edupro-addons' ),
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Icon border color', 'edupro-addons' ),
			'param_name'  => 'icon_border_color',
			'description' => esc_html__( 'Set transparent to disable border.', 'edupro-addons' ),
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Icon hover color', 'edupro-addons' ),
			'param_name' => 'icon_hover_color',
			'dependency' => array(
				'element' => 'icon_type',
				'value'   => 'icon',
			),
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Icon hover background color', 'edupro-addons' ),
			'param_name'  => 'icon_hover_bg_color',
			'description' => esc_html__( 'Set transparent to disable background.', 'edupro-addons' ),
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Icon hover border color', 'edupro-addons' ),
			'param_name'  => 'icon_hover_border_color',
			'description' => esc_html__( 'Set transparent to disable border.', 'edupro-addons' ),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Icon position', 'edupro-addons' ),
			'param_name' => 'icon_position',
			'value'      => array(
				esc_html__( 'Top left', 'edupro-addons' )    => 'top-left',
				esc_html__( 'Top center', 'edupro-addons' )  => 'top-center',
				esc_html__( 'Top right', 'edupro-addons' )   => 'top-right',
				esc_html__( 'Float left', 'edupro-addons' )  => 'float-left',
				esc_html__( 'Float right', 'edupro-addons' ) => 'float-right',
				esc_html__( 'Icon left', 'edupro-addons' )    => 'icon-left',
				esc_html__( 'Icon right', 'edupro-addons' )    => 'icon-right',
			),
			'std'        => 'top-left',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Text alignment', 'edupro-addons' ),
			'param_name' => 'text_align',
			'value'      => array(
				esc_html__( 'Left', 'edupro-addons' )   => 'left',
				esc_html__( 'Center', 'edupro-addons' ) => 'center',
				esc_html__( 'Right', 'edupro-addons' )  => 'right',
			),
			'std'        => 'left',
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Title color', 'edupro-addons' ),
			'param_name' => 'title_color',
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Text color', 'edupro-addons' ),
			'param_name' => 'text_color',
		),
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Font Size Title', 'edupro-addons' ),
			'param_name' => 'font_size_title',
		),
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Font Size Content', 'edupro-addons' ),
			'param_name' => 'font_size_content',
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

	)
);