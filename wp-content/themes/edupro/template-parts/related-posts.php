<?php
/**
 * Display related posts by categories.
 * To show/hide the related posts, navigate to Customizer > Theme Options > Extra
 *
 * @package TheM
 */

if ( get_theme_mod( 'hide_related_posts' ) ) {
	return;
}
$categories    = get_the_category();
$categories    = wp_list_pluck( $categories, 'term_id' );
$post_related_per_page = edupro_get_setting( 'post_related_per_page' );

$related_posts = new WP_Query( array(
	'post_type'              => 'post',
	'posts_per_page'         => intval( $post_related_per_page ),
	'category__in'           => $categories,
	'post__not_in'           => array( get_the_ID() ),
	'no_found_rows'          => true,
	'update_post_term_cache' => false,
) );
if ( ! $related_posts->have_posts() ) {
	return;
}
?>
<div class="main__content__related-posts main__content__line">
	<div class="related-posts clearfix row">
		<div class="row">
			<h4 class="section-title col-md-12"><span><?php esc_html_e( 'You might also like', 'edupro' ); ?></span></h4>
		</div>
		<div class="section-title__line"><div></div></div>

		<?php while ( $related_posts->have_posts() ) : ?>
			<?php $related_posts->the_post(); ?>
			<div class="related-post col-sm-4">

				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_the_post_thumbnail( $id, 'edupro-col-3' ); ?></a>

				<div class="related-post-title">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</div>
				<div class="related-post-date">
					<i class="fa fa-clock-o"></i>&nbsp&nbsp<?php the_time( get_option( 'date_format' ) ); ?>
				</div>
			</div>
			<?php wp_reset_postdata(); ?>
		<?php endwhile; ?> <!-- end loop -->
	</div>
</div>
