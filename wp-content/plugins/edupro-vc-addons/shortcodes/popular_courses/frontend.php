<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$query_args = array(
	'post_type'      => 'sfwd-courses',
	'post_status'    => 'publish',
	'posts_per_page' => 5,
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
$class .= ! empty( $atts['class'] ) ? ' ' . $atts['class'] : '';
?>
<div class="popular_courses_big <?php echo esc_attr( $class ); ?>">
	
<?php  $i = 1; ?>
<div class="popular_courses">
<?php while ( $query->have_posts() ) : $query->the_post(); 

	$class = array();
	$terms = get_the_terms( get_the_ID(), 'course_category' );

	if ( $terms && ! is_wp_error( $terms ) ) {
		foreach ( $terms as $term ) {
			$class[] = $term->slug;
		}
	} ?>

	<?php if ( $i != 2 ) { ?>
		<div class="item item-<?php echo $i ?> popular_courses_s1">
			<?php require( plugin_dir_path( __FILE__  ) . 'popular_courses_s1.php' ); ?>
		</div>
	<?php } else { ?>
	<div class="item item-<?php echo $i ?> popular_courses_s2">
		<?php require( plugin_dir_path( __FILE__  ) . 'popular_courses_s2.php' ); ?>
	</div>
	<?php } ?>

	<?php $i++; ?>

<?php endwhile; ?>
</div>
		

</div>