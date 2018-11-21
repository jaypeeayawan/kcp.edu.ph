<?php

/**
 * Container shortcode.
 */
class WPBakeryShortCode_EduPro_Box extends WPBakeryShortCodesContainer {
}

return array(
	'name'        => esc_html__( 'Box', 'edupro-addons' ),
	'as_parent'   => array( 'except' => 'edupro_container' ),
	'description' => esc_html__( 'Create box.', 'edupro-addons' ),
	'js_view'     => 'VcColumnView',
);
