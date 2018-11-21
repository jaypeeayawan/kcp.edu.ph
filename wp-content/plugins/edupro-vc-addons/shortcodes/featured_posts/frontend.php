<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$query_args = array(
	'post_type'           => 'post',
	'post_status'         => 'publish',
	'posts_per_page'      => ! empty( $atts['number'] ) ? intval( $atts['number'] ) : 3,
	'tax_query'           => array(),
	'ignore_sticky_posts' => true,
);
if ( !empty( $atts['cat'] ) ) {
	$query_args['tax_query'][] = array(
		'taxonomy' => 'category',
		'field'    => 'term_id',
		'terms'    => $atts['cat'],
	);
}
if ( !empty( $atts['tag'] ) ) {
	$query_args['tax_query'][] = array(
		'taxonomy' => 'post_tag',
		'field'    => 'term_id',
		'terms'    => $atts['tag'],
	);
}

$query = new WP_Query( $query_args );
if ( ! $query->have_posts() ) {
	return;
}

$style = ! empty( $atts['style'] ) ? $atts['style'] : '1';
$col   = ! empty( $atts['number_column'] ) ? $atts['number_column'] : '3';

$class = vc_shortcode_custom_css_class( $atts['css'], ' ' );
$class .= ' ' . $atts['class'];
$class .= " featured-posts--s{$style}";
?>
<div class="featured-posts<?php echo esc_attr( $class ); ?>">
	<?php include dirname( __FILE__ ) . "/style{$style}.php"; ?>
</div>