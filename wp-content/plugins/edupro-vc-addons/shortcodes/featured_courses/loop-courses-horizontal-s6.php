<?php
$class = array( 'featured-courses__item' );
$terms = get_the_terms( get_the_ID(), 'course_category' );

if ( $terms && ! is_wp_error( $terms ) ) {
	foreach ( $terms as $term ) {
		$class[] = $term->slug;
	}
}
?>

<div class="col-sm-6 <?php echo esc_attr( implode( ' ', $class ) ); ?>">
	<div class="featured-course">
		<div class="row">
			<div class="featured-course__thumb col-sm-6">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php edupro_post_thumbnail( array( 'post' => get_the_ID(), 'size' => 'edupro-col-3', ) ); ?>
				</a>
			</div>
			<div class="featured-course__wrap col-sm-6">
				<div class="featured-course__text">
					<h3>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					</h3>
					<?php echo get_avatar( get_the_author_meta( 'email' ) ); ?>
					<div class="featured-course__author"><?php the_author(); ?></div>
					<a class="featured-course__author-link" href="<?php echo esc_url( edupro_profile_link( 'instructor' ) ); ?>"><?php esc_html_e( 'View profile', 'edupro-addons' ); ?></a>
				</div>

			</div>
		</div>
	</div>
</div>