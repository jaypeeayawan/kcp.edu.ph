<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

if( empty( $content ) ) {
	return;
}

$class = vc_shortcode_custom_css_class( $atts['css'], ' ' );
$class .= empty( $atts['class'] ) ? '' : ' ' . $atts['class'];

printf( '<div class="container multi-teammembers %s">%s</div>', esc_attr( $class ), do_shortcode( $content ) );