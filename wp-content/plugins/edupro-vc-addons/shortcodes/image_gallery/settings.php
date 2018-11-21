<?php

/**
 * Featured courses shortcode.
 */
class WPBakeryShortCode_EduPro_Image_Gallery extends WPBakeryShortCode {
}

return array(
	'name'        => __( 'Image Gallery', 'edupro-addons' ),
	'icon'        => 'icon-wpb-images-stack',
	'description' => __( 'Responsive image gallery', 'edupro-addons' ),
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => __( 'Image source', 'edupro-addons' ),
			'param_name' => 'source',
			'value' => array(
				__( 'Media library', 'edupro-addons' ) => 'media_library',
				__( 'External links', 'edupro-addons' ) => 'external_link',
			),
			'std' => 'media_library',
			'description' => __( 'Select image source.', 'edupro-addons' ),
		),
		array(
			'type' => 'attach_images',
			'heading' => __( 'Images', 'edupro-addons' ),
			'param_name' => 'images',
			'value' => '',
			'description' => __( 'Select images from media library.', 'edupro-addons' ),
			'dependency' => array(
				'element' => 'source',
				'value' => 'media_library',
			),
		),
		array(
			'type' => 'exploded_textarea_safe',
			'heading' => __( 'External links', 'edupro-addons' ),
			'param_name' => 'custom_srcs',
			'description' => __( 'Enter external link for each gallery image (Note: divide links with linebreaks (Enter)).', 'edupro-addons' ),
			'dependency' => array(
				'element' => 'source',
				'value' => 'external_link',
			),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Image size', 'edupro-addons' ),
			'param_name' => 'img_size',
			'value' => 'thumbnail',
			'description' => __( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'edupro-addons' ),
			'dependency' => array(
				'element' => 'source',
				'value' => 'media_library',
			),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Image size', 'edupro-addons' ),
			'param_name' => 'external_img_size',
			'value' => '',
			'description' => __( 'Enter image size in pixels. Example: 200x100 (Width x Height).', 'edupro-addons' ),
			'dependency' => array(
				'element' => 'source',
				'value' => 'external_link',
			),
		)
	),
);