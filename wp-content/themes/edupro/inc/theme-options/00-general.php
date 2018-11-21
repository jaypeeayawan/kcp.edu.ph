<?php
/**
 * General options.
 */
return array(
	'id'             => 'general',
	'title'          => esc_html__( 'General', 'edupro' ),
	'settings_pages' => 'theme-options',
	'tab'            => 'general',
	'tab_style'      => 'box',
	'tab_wrapper'    => true,
	'fields'         => array(
		array(
			'name' => esc_html__( 'Google Map API KEY', 'edupro' ),
			'id'   => 'map_api_key',
			'type' => 'text',
			'size' => 100,
		),
		array(
			'id'   => 'smooth_scroll',
			'name' => esc_html__( 'Enable / Disable smooth scrolling.', 'edupro' ),
			'type' => 'checkbox',
		),
		array(
			'name'     => esc_html__( 'Font for Title', 'edupro' ),
			'id'       => "edupro_font_for_title",
			'type'     => 'select',
			'options'  => edupro_all_fonts(),
			'multiple' => false,
			'std'      => 'Roboto Condensed, 300:300italic:regular:italic:700:700italic, sans-serif',
			'desc'     => esc_html__( 'Default font is "Roboto Condensed"', 'edupro' ),
		),
		array(
			'name'     => esc_html__( 'Font Weight For Title', 'edupro' ),
			'id'       => "edupro_font_weight_title",
			'type'     => 'select',
			'options'  => array(
				'normal'  => 'Normal',
				'bold'    => 'Bold',
				'bolder'  => 'Bolder',
				'lighter' => 'Lighter',
				'100'     => '100',
				'200'     => '200',
				'300'     => '300',
				'400'     => '400',
				'500'     => '500',
				'600'     => '600',
				'700'     => '700',
				'800'     => '800',
				'900'     => '900'
			),
			'multiple' => false,
			'std'      => 'normal',
		),
		array(
			'name'     => esc_html__( 'Font For Body Text', 'edupro' ),
			'id'       => "edupro_font_for_body",
			'type'     => 'select',
			'options'  => edupro_all_fonts(),
			'multiple' => false,
			'std'      => 'Roboto, 100:100italic:300:300italic:regular:italic:500:500italic:700:700italic:900:900italic, sans-serif',
			'desc'     => 'Default font is "Roboto"',
		),
		array(
			'name' => esc_html__( 'Custom Size Of Fonts in Posts', 'edupro' ),
			'id'   => 'edupro_font_for_size_body',
			'type' => 'text',
			'std'  => '15',
			'size' => 10,
			'desc'     => esc_html__( 'Numeric value only, unit is pixel', 'edupro' ),
		),
	),
);

