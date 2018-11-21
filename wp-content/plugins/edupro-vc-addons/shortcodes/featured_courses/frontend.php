<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$query_args = array(
	'post_type'      => 'sfwd-courses',
	'post_status'    => 'publish',
	'posts_per_page' => ! empty( $atts['number'] ) ? $atts['number'] : '4',
	'tax_query'      => array(),
);
if ( ! empty( $atts['cat'] ) ) {
	$query_args['tax_query'][] = array(
		'taxonomy' => 'course_category',
		'terms'    => $atts['cat'],
	);
}
if ( ! empty( $atts['tag'] ) ) {
	$query_args['tax_query'][] = array(
		'taxonomy' => 'post_tag',
		'terms'    => $atts['tag'],
	);
}


$query = new WP_Query( $query_args );
if ( ! $query->have_posts() ) {
	return;
}

$class = vc_shortcode_custom_css_class( $atts['css'], ' ' );
$class .= ' ' . $atts['class'];
$class .= " featured-courses--s{$atts['style']}";

$style_courses = ! empty( $atts['style'] ) ? $atts['style'] : '1';
?>
<div class="featured-courses<?php echo esc_attr( $class ); ?>">
	<?php include dirname( __FILE__ ) . "/style{$style_courses}.php"; ?>
</div>