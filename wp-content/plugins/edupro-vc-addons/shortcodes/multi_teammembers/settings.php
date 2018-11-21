<?php

/**
 * Container shortcode.
 */
class WPBakeryShortCode_EduPro_Multi_Teammembers extends WPBakeryShortCodesContainer {
}

return array(
	'name'        => esc_html__( 'Team members slider wrapper', 'edupro-addons' ),
	'as_parent'   => array( 'except' => 'edupro_multi_teammembers' ),
	'description' => esc_html__( 'Multi Teammembers.', 'edupro-addons' ),
	'js_view'     => 'VcColumnView',
);
