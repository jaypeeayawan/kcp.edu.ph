<?php
/**
 * Options color schemes of theme option.
 */
return array(
	'id'             => 'colorschemes',
	'title'          => esc_html__( 'Color schemes', 'edupro' ),
	'settings_pages' => 'theme-options',
	'tab'            => 'colorschemes',
	'tabs'           => array(
		'theme-color'  => array(
			'label' => esc_html__( 'Set Main Color', 'edupro' ),
			'icon'  => 'dashicons-email', // Dashicon
		),
		'custom-color' => array(
			'label' => esc_html__( 'Custom Color', 'edupro' ),
			'icon'  => 'dashicons-email', // Dashicon
		),
	),
	'fields'         => array(
		// COLOR SCHEMES
		array(
			'name'    => esc_html__( 'Main Color', 'edupro' ),
			'id'      => 'main_color',
			'type'    => 'image_select',
			'options' => array(
				'default' => get_template_directory_uri() . '/img/color/default.png',
				'red'     => get_template_directory_uri() . '/img/color/red.png',
				'blue'    => get_template_directory_uri() . '/img/color/blue.png',
				'orange'  => get_template_directory_uri() . '/img/color/orange.png',
			),
			'tab'     => 'theme-color',
			'std'     => 'default',
		),
		array(
			'id'      => 'theme_color',
			'name'    => esc_html__( 'Theme Color', 'edupro' ),
			'type'    => 'color',
			'section' => 'colors',
			'tab'     => 'custom-color',
		),
		array(
			'id'      => 'hover_color',
			'name'    => esc_html__( 'Hover Color', 'edupro' ),
			'type'    => 'color',
			'section' => 'colors',
			'tab'     => 'custom-color',
		),
	),
);
