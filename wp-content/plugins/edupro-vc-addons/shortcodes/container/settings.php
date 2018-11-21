<?php

/**
 * Container shortcode.
 */
class WPBakeryShortCode_EduPro_Container extends WPBakeryShortCodesContainer {
}

return array(
	'name'        => esc_html__( 'Container', 'edupro-addons' ),
	'as_parent'   => array( 'except' => 'edupro_container' ),
	'description' => esc_html__( 'Create container.', 'edupro-addons' ),
	'js_view'     => 'VcColumnView',
);
