<?php
/**
 * Display related courses by categories.
 *
 * @package EduPro
 */

$categories = get_the_terms( get_the_ID(), 'course_category' );

if ( ! is_array( $categories ) || empty( $categories ) ) {
	return;
}

$categories = wp_list_pluck( $categories, 'term_id' );


$args  = array(
	'post_type'              => 'sfwd-courses',
	'posts_per_page'         => intval( edupro_get_setting( 'courses_related_per_page' ) ),
	'tax_query'              => array(
		array(
			'taxonomy' => 'course_category',
			'field'    => 'term_id',
			'terms'    => $categories,
		),
	),
	'post__not_in'           => array( get_the_ID() ),
	'no_found_rows'          => true,
	'update_post_term_cache' => false,
);
$query = new WP_Query( $args );

if ( ! $query->have_posts() ) {
	return;
}
?>
<div class="related-post archive">
	<div class="row">
		<h4 class="section-title col-md-12"><span><?php echo esc_html( edupro_get_setting( 'courses_title_related' ) ); ?></span></h4>
	</div>
	<div class="section-title__line">
		<div></div>
	</div>

	<?php while ( $query->have_posts() ) : ?>
		<?php $query->the_post(); ?>
		<?php get_template_part( 'template-parts/content-course' ); ?>
		<?php wp_reset_postdata(); ?>
	<?php endwhile; ?> <!-- end loop -->
</div>
