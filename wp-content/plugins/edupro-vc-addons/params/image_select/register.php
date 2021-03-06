<?php
/**
 * Callback for new param 'fitwp_image_select'.
 *
 * @param array $settings
 * @param string $value
 *
 * @return string
 */
function fitwp_vc_param_image_select( $settings, $value ) {
	// Hidden input
	$output = sprintf(
		'<input type="hidden" class="wpb_vc_param_value" name="%s" value="%s">',
		esc_attr( $settings['param_name'] ),
		esc_attr( $value )
	);

	// Options
	$output .= '<div class="fitwp-image-select-options">';
	foreach ( $settings['options'] as $key => $url ) {
		$output .= sprintf(
			'<img data-value="%s" class="fitwp-image-select %s" src="%s">',
			esc_attr( $key ),
			$key == $value ? 'fitwp-image-select--active' : '',
			esc_url( $url )
		);
	}
	$output .= '</div>';

	return $output;
}