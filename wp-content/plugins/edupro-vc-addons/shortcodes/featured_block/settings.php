<?php

/**
 * Featured block shortcode.
 */
class WPBakeryShortCode_EduPro_Featured_Block extends WPBakeryShortCode {

}

return array(
	'name'        => __( 'Featured Block', 'edupro-addons' ),
	'description' => __( 'Create featured block', 'edupro-addons' ),
	'params'      => array(
		array(
			'type'       => 'vc_link',
			'heading'    => __( 'Button link and text', 'edupro-addons' ),
			'param_name' => 'link',
		),
		array(
			'type'       => 'iconpicker',
			'heading'    => __( 'Icon', 'edupro-addons' ),
			'param_name' => 'icon',
			'settings'   => array(
				'emptyIcon'    => true,
				'type'         => 'fontawesome',
				'iconsPerPage' => 4000,
			),
		),				
		array(
			'type'       => 'fitwp_image_select',
			'heading'    => __( 'Style', 'edupro-addons' ),
			'param_name' => 'style',
			'options'    => array(
				'1' => EDUPRO_ADDONS_URL . 'assets/img/featured-block-1.png',
				'2' => EDUPRO_ADDONS_URL . 'assets/img/featured-block-2.png',
				'3' => EDUPRO_ADDONS_URL . 'assets/img/featured-block-3.png',
			),
		),
			
		array(
			'type'       => 'fitwp_number',
			'heading'    => __( 'Image Height', 'edupro-addons' ),
			'param_name' => 'featured_height',
		),			
		array(
			'type'       => 'textfield',
			'heading'    => __( 'Number Item', 'edupro-addons' ),
			'param_name' => 'featured_number',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => __( 'Size Box', 'edupro-addons' ),
			'param_name' => 'size_box',
			'value'      => array(
				__('Small Box','edupro-addons')  => 'small-around',
				__('Medium Box','edupro-addons') =>  'medium-around',
			),
		),						
	)
);