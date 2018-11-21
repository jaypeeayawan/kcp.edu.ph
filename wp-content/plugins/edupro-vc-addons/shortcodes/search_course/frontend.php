<?php
$atts  = vc_map_get_attributes( $this->getShortcode(), $atts );
$class = vc_shortcode_custom_css_class( $atts['css'], ' ' );
$class .= empty( $atts['class'] ) ? '' : ' ' . $atts['class'];

$style = ! empty( $atts['style'] ) ? $atts['style'] : 1;
?>
 
<?php include dirname( __FILE__ ) . "/style{$style}.php"; ?>
