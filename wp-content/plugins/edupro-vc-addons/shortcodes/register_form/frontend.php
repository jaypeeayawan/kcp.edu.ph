<?php

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$class = vc_shortcode_custom_css_class( $atts['css'], ' ' );
$class .= ! empty( $atts['class'] ) ? ' ' . $atts['class'] : '';

$atts = array_merge( array(
	'style'           => 1,
	'text_submit'     => esc_html__( 'Submit', 'edupro-addons' ),
	'check_shortcode' => false,
	'shortcode_pos'   => 'top'
), $atts
);
$style =  ! empty( $atts['style'] ) ? $atts['style'] : 1;
//Include style register
include dirname( __FILE__ ) . "/style{$style}.php";

