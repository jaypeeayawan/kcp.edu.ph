<?php

/**
 * Featured courses shortcode.
 */
class WPBakeryShortCode_EduPro_Map extends WPBakeryShortCode {
}

return array(
	'name'        => __( 'Map', 'edupro-addons' ),
	'icon'        => 'icon-wpb-images-stack',
	'description' => __( 'Map block', 'edupro-addons' ),
	'params' => array(
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Insert Map Using', 'edupro-addons' ),
			'param_name' => 'map_using',
			'value'      => array(
				esc_html__( 'Address', 'edupro-addons' )     => 'address',
				esc_html__( 'Coordinates', 'edupro-addons' ) => 'coordinates',
			)
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Address', 'edupro-addons' ),
			'param_name'  => 'address',
			'admin_label' => true,
			'dependency'  => array(
				'element' => 'map_using',
				'value'   => 'address'
			)
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Latitude', 'edupro-addons' ),
			'param_name'  => 'latitude',
			'admin_label' => true,
			'dependency'  => array(
				'element' => 'map_using',
				'value'   => 'coordinates'
			)
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Longtitude', 'edupro-addons' ),
			'param_name'  => 'longtitude',
			'admin_label' => true,
			'dependency'  => array(
				'element' => 'map_using',
				'value'   => 'coordinates'
			)
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Map type', 'edupro-addons' ),
			'param_name' => 'map_type',
			'value'      => array(
				esc_html__( 'Road', 'edupro-addons' )      => 'road',
				esc_html__( 'Satellite', 'edupro-addons' ) => 'satellite',
				esc_html__( 'Hybrid', 'edupro-addons' )    => 'hybrid',
				esc_html__( 'Terrain', 'edupro-addons' )   => 'terrain',
				esc_html__( 'Custom', 'edupro-addons' )    => 'custom',
			)
		),
		array(
			'type'             => 'fitwp_number',
			'heading'          => esc_html__( 'Width', 'edupro-addons' ),
			'param_name'       => 'map_width',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'type'             => 'fitwp_number',
			'heading'          => esc_html__( 'Height', 'edupro-addons' ),
			'param_name'       => 'map_height',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'type'       => 'attach_image',
			'heading'    => esc_html__( 'Marker Image', 'edupro-addons' ),
			'param_name' => 'marker_img',
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Marker Title', 'edupro-addons' ),
			'param_name'  => 'marker_title',
			'admin_label' => true,
		),
		array(
			'type'        => 'exploded_textarea_safe',
			'heading'     => esc_html__( 'Info Window', 'edupro-addons' ),
			'param_name'  => 'info_window',
			'description' => ''
		),
		array(
			'type'             => 'checkbox',
			'heading'          => esc_html__( 'Zoom', 'edupro-addons' ),
			'param_name'       => 'map_is_zoom',
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'             => 'checkbox',
			'heading'          => esc_html__( 'Pan', 'edupro-addons' ),
			'param_name'       => 'map_pan',
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'             => 'checkbox',
			'heading'          => esc_html__( 'Map scale', 'edupro-addons' ),
			'param_name'       => 'map_scale',
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'             => 'checkbox',
			'heading'          => esc_html__( 'Street view', 'edupro-addons' ),
			'param_name'       => 'map_street_view',
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'             => 'checkbox',
			'heading'          => esc_html__( 'Rotate', 'edupro-addons' ),
			'param_name'       => 'map_rotate',
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'             => 'checkbox',
			'heading'          => esc_html__( 'Overview map', 'edupro-addons' ),
			'param_name'       => 'map_overview',
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Zoom', 'edupro-addons' ),
			'param_name' => 'map_zoom',
			'value'      => array(
				6  => 6,
				7  => 7,
				8  => 8,
				9  => 9,
				10 => 10,
				11 => 11,
				12 => 12,
				13 => 13,
				14 => 14,
				15 => 15,
				16 => 16,
			),
			'std' => '8',
		),
		array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Scrollwheel', 'edupro-addons' ),
			'param_name' => 'map_scrollwheel',
		),
	)
);