<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$class = vc_shortcode_custom_css_class( $atts['css'], ' ' );
$class .= ' edu_countdown ';
$class .= ! empty( $atts['count_down_style']  ) ? $atts['count_down_style']  . ' ' : '';
$class .= ! empty( $atts['count_down_posttion'] ) ? $atts['count_down_posttion'] . ' ' : '';
$class .= !empty( $atts['class'] ) ? $atts['class'] : '';

$id = 'edu_countdown_' . rand( 100, 9999 );

?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>"></div>

<script type="text/javascript">
	jQuery( function ( $ ) {
		'use strict';
		var newDateTime = new Date(<?php echo( ! empty( $atts['count_year'] ) ? $atts['count_year'] : 0 ); ?>,<?php echo( ! empty( $atts['count_month'] ) ? intval( $atts['count_month'] ) - 1 : 0 ); ?>,<?php echo( ! empty( $atts['count_day'] ) ? $atts['count_day'] : 0 ); ?>,<?php echo( ! empty( $atts['count_hour'] ) ? $atts['count_hour'] : 0 ); ?>,<?php echo( ! empty( $atts['count_minus'] ) ? $atts['count_minus'] : 0 ) ?>,<?php echo( ! empty( $atts['count_sec'] ) ? $atts['count_sec'] : 0 ); ?>,0 );

		$( '#<?php echo esc_attr( $id ); ?>' ).countdown( {
			until: newDateTime,
		} );
	} );

</script>