<?php
/**
 * Option page of theme options.
 */
return array(
	'id'             => 'page',
	'title'          => esc_html__( 'Page Header', 'edupro' ),
	'settings_pages' => 'theme-options',
	'tab'            => 'page',
	'fields'         => array(
		array(
			'id'   => 'show_header_image_all_page',
			'name' => esc_html__( 'Use The Same Header Image On All Pages', 'edupro' ),
			'type' => 'checkbox',
		),
		array(
			'name' => esc_html__( 'Header Image', 'edupro' ),
			'id'   => 'header_image',
			'type' => 'file_input',
		),
		array(
			'name'     => esc_html__( 'Page Title Position', 'edupro' ),
			'id'       => 'page_title',
			'type'     => 'select',
			'options'  => array(
				'left'   => esc_html__( 'Left', 'edupro' ),
				'center' => esc_html__( 'Center', 'edupro' ),
				'right'  => esc_html__( 'Right', 'edupro' ),
			),
			'multiple' => false,
			'std'      => 'left',
		),
		array(
			'name' => esc_html__( 'Color', 'edupro' ),
			'id'   => 'page_color',
			'type' => 'divider',
		),
		array(
			'name' => esc_html__( 'Background', 'edupro' ),
			'id'   => 'bg_banner_top',
			'type' => 'color',
		),
		array(
			'name' => esc_html__( 'Title Color', 'edupro' ),
			'id'   => 'page_title_color',
			'type' => 'color',
		),
		array(
			'name' => esc_html__( 'Line Color', 'edupro' ),
			'id'   => 'page_line_color',
			'type' => 'color',
		),
		array(
			'name' => esc_html__( 'Breadcrumbs Color', 'edupro' ),
			'id'   => 'page_breadcrumbs_color',
			'type' => 'color',
		),
	),
);
