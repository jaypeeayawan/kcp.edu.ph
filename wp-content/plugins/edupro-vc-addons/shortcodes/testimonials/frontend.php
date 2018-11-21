<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$query_args = array(
	'post_type'      => 'jetpack-testimonial',
	'post_status'    => 'publish',
	'posts_per_page' => empty( $atts['number'] ) ? 3 : intval( $atts['number'] ),
);
$query      = new WP_Query( $query_args );
if ( ! $query->have_posts() ) {
	return;
}

$unique_class = 'button--' . uniqid();
$class        = vc_shortcode_custom_css_class( $atts['css'], ' ' );

if ( empty( $atts['class'] ) ) {
	$class .= ' ' . $atts['class'];
}

$style = !empty( $atts['style'] ) ? $atts['style'] : 1;

$class .= " testimonials--s{$style}";
$class .= " $unique_class";
$class = trim( $class );
?>
<div class="testimonials <?php echo esc_attr( $class ); ?>">
	<?php include dirname( __FILE__ ) . "/style{$style}.php"; ?>
</div>