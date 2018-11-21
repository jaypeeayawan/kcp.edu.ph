<?php
/**
 * Footer options.
 */
return array(
	'id'             => 'footer',
	'title'          => esc_html__( 'Footer', 'edupro' ),
	'settings_pages' => 'theme-options',
	'tab'            => 'footer',
	'fields'         => array(
		// HEADER STYLE DEFAULT
		array(
			'name'    => esc_html__( 'Columns', 'edupro' ),
			'id'      => 'footer-columns',
			'type'    => 'image_select',
			'options' => array(
				'1' => get_template_directory_uri() . '/img/footer/one-column.png',
				'2' => get_template_directory_uri() . '/img/footer/two-columns.png',
				'3' => get_template_directory_uri() . '/img/footer/three-columns.png',
				'4' => get_template_directory_uri() . '/img/footer/four-columns.png',
			),
			'std'     => '4',
			'class'   => 'footer-columns auto-height',
		),
		array(
			'id'   => 'footer_text',
			'name' => esc_html__( 'Copyright Text', 'edupro' ),
			'type' => 'textarea',
		),
		array(
			'id'   => 'go_to_top',
			'name' => esc_html__( 'Show Go To Top Button?', 'edupro' ),
			'type' => 'checkbox',
		),
		array(
			'name' => esc_html__( 'Color', 'edupro' ),
			'type' => 'heading',
		),
		array(
			'id'   => 'footer_bg_color',
			'name' => esc_html__( 'Background Color', 'edupro' ),
			'type' => 'color',
		),
		array(
			'id'   => 'footer_heading_title_color',
			'name' => esc_html__( 'Heading Color', 'edupro' ),
			'type' => 'color',
		),
		array(
			'id'   => 'footer_line_heading_title_color',
			'name' => esc_html__( 'Heading Bottom Line Color', 'edupro' ),
			'type' => 'color',
		),
		array(
			'id'   => 'footer_text_color',
			'name' => esc_html__( 'Text Color', 'edupro' ),
			'type' => 'color',
		),
		array(
			'id'   => 'footer_link_color',
			'name' => esc_html__( 'Link Color', 'edupro' ),
			'type' => 'color',
		),
		array(
			'id'   => 'footer_hover_link_color',
			'name' => esc_html__( 'Link Hover Color', 'edupro' ),
			'type' => 'color',
		),
		array(
			'id'   => 'footer_social_color',
			'name' => esc_html__( 'Social Icon Color', 'edupro' ),
			'type' => 'color',
		),
		array(
			'id'   => 'footer_hover_social_color',
			'name' => esc_html__( 'Social Icon Hover Color', 'edupro' ),
			'type' => 'color',
		),
		array(
			'id'   => 'footer_line_color',
			'name' => esc_html__( 'Footer Line Background Color', 'edupro' ),
			'type' => 'color',
		),
		array(
			'name' => esc_html__( 'Color', 'edupro' ),
			'id'   => "copyright_divider_color",
			'type' => 'divider',
		),
		array(
			'id'   => 'footer_copyright_background_color',
			'name' => esc_html__( 'Copyright Background Color', 'edupro' ),
			'type' => 'color',
		),
		array(
			'id'   => 'footer_copyright_text_color',
			'name' => esc_html__( 'Copyright Text Color', 'edupro' ),
			'type' => 'color',
		),
		array(
			'id'   => 'footer_copyright_link_color',
			'name' => esc_html__( 'Copyright Link Color', 'edupro' ),
			'type' => 'color',
		),
		array(
			'id'   => 'footer_copyright_link_color_hover',
			'name' => esc_html__( 'Copyright Link Hover Color', 'edupro' ),
			'type' => 'color',
		),
	),
);
