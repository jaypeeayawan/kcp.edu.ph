<?php
/**
 * Options sidebar of theme options.
 */
return array(
	'id'             => 'sidebar',
	'title'          => esc_html__( 'Sidebar', 'edupro' ),
	'settings_pages' => 'theme-options',
	'tab'            => 'sidebar',
	'fields'         => array(
		array(
			'id'   => 'is_sticky_sidebar',
			'name' => esc_html__( 'Fix Sidebar Position On Scroll?', 'edupro' ),
			'type' => 'checkbox',
			'std'  => '1',
		),
		array(
			'id'      => 'sidebar_bg_color',
			'name'    => esc_html__( 'Background Color', 'edupro' ),
			'type'    => 'color',
			'section' => 'colors',
			'tab'     => 'custom-color',
		),
		array(
			'id'   => 'sidebar_heading_title_color',
			'name' => esc_html__( 'Heading Color', 'edupro' ),
			'type' => 'color',
		),
		array(
			'id'   => 'sidebar_line_heading_title_color',
			'name' => esc_html__( 'Heading Bottom Line Color', 'edupro' ),
			'type' => 'color',
		),
		array(
			'id'   => 'sidebar_line_bottom_widget',
			'name' => esc_html__( 'Widget Bottom Line Color', 'edupro' ),
			'type' => 'color',
		),
		array(
			'id'   => 'sidebar_text_color',
			'name' => esc_html__( 'Text Color', 'edupro' ),
			'type' => 'color',
		),
		array(
			'id'   => 'sidebar_link_color',
			'name' => esc_html__( 'Link Color', 'edupro' ),
			'type' => 'color',
		),
		array(
			'id'   => 'sidebar_hover_link_color',
			'name' => esc_html__( 'Link Hover Color', 'edupro' ),
			'type' => 'color',
		),
	),
);
