<?php

/**
 * Featured courses shortcode.
 */
class WPBakeryShortCode_EduPro_Team_Members extends WPBakeryShortCode {
}

// Shortcode settings
return array(
	'name'        => esc_html__( 'Single Team Member', 'edupro-addons' ),
	'description' => esc_html__( 'Show a single team member.', 'edupro-addons' ),
	'params'      => array(
		array(
			'type' => 'attach_image',
			'heading' => __( 'Image', 'js_composer' ),
			'param_name' => 'image',
			'value' => '',
			'description' => __( 'Select image from media library.', 'js_composer' ),
			'admin_label' => true
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Name', 'edupro-addons' ),
			'param_name'  => 'name',
			'admin_label' => true,
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
		
		// Name Group
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_html__( 'Color', 'edupro-addons' ),
			'param_name' => 'name_color',
			'group'      => esc_html__( 'Name', 'edupro-addons' ),
		),
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Font Size', 'edupro-addons' ),
			'param_name' => 'name_font_size',
			'group'      => esc_html__( 'Name', 'edupro-addons' ),
		),
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Line Height', 'edupro-addons' ),
			'param_name' => 'name_line_height',
			'group'      => esc_html__( 'Name', 'edupro-addons' ),
		),
		array(
			'type'       => 'fitwp_number',
			'heading'    => esc_html__( 'Letter Spacing', 'edupro-addons' ),
			'param_name' => 'name_letter_spacing',
			'group'      => esc_html__( 'Name', 'edupro-addons' ),
		),
		array(
			'type'       => 'google_fonts',
			'heading'    => esc_html__( 'Google Fonts', 'edupro-addons' ),
			'param_name' => 'name_fonts',
			'value'      => 'font_family:Roboto%20Condensed%3A300%2C300italic%2Cregular%2Citalic%2C700%2C700italic|font_style:700%20bold%20regular%3A700%3Anormal',
			'group'      => esc_html__( 'Name', 'edupro-addons' ),
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
			'type'       => 'fitwp_spacing',
			'heading'    => __( 'Margin', 'edupro-addons' ),
			'param_name' => 'description_padding',
			'mode'       => 'margin',   //  margin/padding
			'unit'       => 'px',      //  [required] px,em,%,all     Default all
			'autofocus'  => '',        // Input autofocus  [required] Top,Right,Bottom,Left
			'positions'  => array(
				__( 'Top', 'orio' )    => '',
				__( 'Right', 'orio' )  => '',
				__( 'Bottom', 'orio' ) => '',
				__( 'Left', 'orio' )   => ''
			),
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
		
		// Social Group
		array(
			'type'       => 'iconpicker',
			'heading'    => esc_html__( 'Icon', 'edupro-addons' ),
			'param_name' => 'icon-facebook',
			'settings'   => array(
				'emptyIcon'    => true,
				'type'         => 'fontawesome',
				'iconsPerPage' => 4000,
			),
			'group'      => esc_html__( 'Social', 'edupro-addons' ),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Facebook', 'edupro-addons' ),
			'param_name'  => 'facebook',
			'group'       => esc_html__( 'Social', 'edupro-addons' )
		),	/*end facebook*/
		array(
			'type'       => 'iconpicker',
			'heading'    => esc_html__( 'Icon', 'edupro-addons' ),
			'param_name' => 'icon-instagram',
			'settings'   => array(
				'emptyIcon'    => true,
				'type'         => 'fontawesome',
				'iconsPerPage' => 4000,
			),
			'group'      => esc_html__( 'Social', 'edupro-addons' ),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Instagram', 'edupro-addons' ),
			'param_name'  => 'instagram',
			'group'       => esc_html__( 'Social', 'edupro-addons' )
		),	/*end Instagram*/
		array(
			'type'       => 'iconpicker',
			'heading'    => esc_html__( 'Icon', 'edupro-addons' ),
			'param_name' => 'icon-google_pls',
			'settings'   => array(
				'emptyIcon'    => true,
				'type'         => 'fontawesome',
				'iconsPerPage' => 4000,
			),
			'group'      => esc_html__( 'Social', 'edupro-addons' ),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Google Plus', 'edupro-addons' ),
			'param_name'  => 'google_pls',
			'group'       => esc_html__( 'Social', 'edupro-addons' )
		),	/*end Google plus*/
		array(
			'type'       => 'iconpicker',
			'heading'    => esc_html__( 'Icon', 'edupro-addons' ),
			'param_name' => 'icon-linkedin',
			'settings'   => array(
				'emptyIcon'    => true,
				'type'         => 'fontawesome',
				'iconsPerPage' => 4000,
			),
			'group'      => esc_html__( 'Social', 'edupro-addons' ),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'LinkedIn', 'edupro-addons' ),
			'param_name'  => 'linkedin',
			'group'       => esc_html__( 'Social', 'edupro-addons' )
		),	/*end LinkedIn*/
		array(
			'type'       => 'iconpicker',
			'heading'    => esc_html__( 'Icon', 'edupro-addons' ),
			'param_name' => 'icon-youtube',
			'settings'   => array(
				'emptyIcon'    => true,
				'type'         => 'fontawesome',
				'iconsPerPage' => 4000,
			),
			'group'      => esc_html__( 'Social', 'edupro-addons' ),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Youtube', 'edupro-addons' ),
			'param_name'  => 'youtube',
			'group'       => esc_html__( 'Social', 'edupro-addons' )
		),	/*end Youtube*/
		array(
			'type'       => 'iconpicker',
			'heading'    => esc_html__( 'Icon', 'edupro-addons' ),
			'param_name' => 'icon-twitter',
			'settings'   => array(
				'emptyIcon'    => true,
				'type'         => 'fontawesome',
				'iconsPerPage' => 4000,
			),
			'group'      => esc_html__( 'Social', 'edupro-addons' ),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Twitter', 'edupro-addons' ),
			'param_name'  => 'twitter',
			'group'       => esc_html__( 'Social', 'edupro-addons' )
		),	/*end Twitter*/
		array(
			'type'       => 'iconpicker',
			'heading'    => esc_html__( 'Icon', 'edupro-addons' ),
			'param_name' => 'icon-flick',
			'settings'   => array(
				'emptyIcon'    => true,
				'type'         => 'fontawesome',
				'iconsPerPage' => 4000,
			),
			'group'      => esc_html__( 'Social', 'edupro-addons' ),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Flick', 'edupro-addons' ),
			'param_name'  => 'flick',
			'group'       => esc_html__( 'Social', 'edupro-addons' )
		),	/*end Flick*/
		array(
			'type'       => 'iconpicker',
			'heading'    => esc_html__( 'Icon', 'edupro-addons' ),
			'param_name' => 'icon-digg',
			'settings'   => array(
				'emptyIcon'    => true,
				'type'         => 'fontawesome',
				'iconsPerPage' => 4000,
			),
			'group'      => esc_html__( 'Social', 'edupro-addons' ),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Digg', 'edupro-addons' ),
			'param_name'  => 'digg',
			'group'       => esc_html__( 'Social', 'edupro-addons' )
		),	/*end Digg*/
	),
);