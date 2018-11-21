<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$class = vc_shortcode_custom_css_class( $atts['css'], ' ' );
$class .= ' ' . $atts['class'];

printf( '<div class="%s">%s</div>', esc_attr( $class ), do_shortcode( $content ) );