<?php
/**
 * Display related project by categories.
 *
 */

$categories              = get_the_terms( get_the_ID(), 'jetpack-portfolio-type' );
$portfolio_related_count = edupro_get_setting( 'portfolio_related_per_page' );

$categories = wp_list_pluck( $categories, 'term_id' );
if ( is_array( $categories ) ) :
	$category_first = reset( $categories );
endif;

$related_posts = new WP_Query( array(
	'post_type'              => 'jetpack-portfolio',
	'posts_per_page'         => intval( $portfolio_related_count ),
	'post__not_in'           => array( get_the_ID() ),
	'no_found_rows'          => true,
	'update_post_term_cache' => false,
	'tax_query'              => array(
		array(
			'taxonomy' => 'jetpack-portfolio-type',
			'field'    => 'term_id',
			'terms'    => $categories,
		),
	),
) );

if ( ! $related_posts->have_posts() ) {
	return;
}
$portfolio_style         = edupro_get_setting( 'portfolio_style' );
$portfolio_title_related = edupro_get_setting( 'portfolio_title_related' );
?>
<div class="portfolio__related">
	<h2 class="portfolio__related-title"><?php echo esc_html( $portfolio_title_related ); ?></h2>
	<div class="row projects <?php echo esc_attr( $portfolio_style ); ?>">
	<?php
	while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
		<?php get_template_part( 'template-parts/content-portfolio' ); ?>
		<?php
	endwhile;
	wp_reset_postdata();
	?>
	</div>
</div>
