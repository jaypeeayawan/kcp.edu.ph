<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

extract( $atts );

$class .= ' edupro-map ' . vc_shortcode_custom_css_class( $css, ' ' );

$unique_id = 'map--' . uniqid();
$width     = intval( $map_width ) ? $map_width : '100%';
$height    = intval( $map_height ) ? $map_height : '400px';

$atts['map_zoom']   = intval( $map_zoom ? $map_zoom : 8 );
$atts['marker_img'] = wp_get_attachment_url( $marker_img );

$option = htmlentities( json_encode( $atts ), ENT_QUOTES, "UTF-8" );

printf( '<div style="width:%s;height:%s" id="edupro-map-%s" class="google-map %s" data-map_options="%s"></div>',
	$width, $height, $unique_id, $class, $option );
