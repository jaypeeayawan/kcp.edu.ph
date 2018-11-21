<?php
$class = array();
$terms = get_the_terms( get_the_ID(), 'course_category' );

if ( $terms && ! is_wp_error( $terms ) ) {
	foreach ( $terms as $term ) {
		$class[] = $term->slug;
	}
}

?>
<div class="featured-course-item col-md-3 col-sm-3 <?php echo esc_attr( implode( ' ', $class ) ); ?>">
	<div class="featured-course">
		<div class="featured-course__thumb">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php edupro_post_thumbnail( array( 'post' => get_the_ID(), 'size' => 'edupro-col-3', ) ); ?>
				<?php if( edupro_score_rating( get_the_ID() ) !== '0.0' ): ?>
					<div class="rating-score"><?php esc_html_e( edupro_score_rating( get_the_ID() ) ); ?></div>
				<?php endif; ?>
			</a>
		</div>
		<div class="featured-course__wrap">
			<div class="featured-course__text">
				<h3>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</h3>
				<?php echo get_avatar( get_the_author_meta( 'email' ) ); ?>
				<div class="featured-course__author"><?php the_author(); ?></div>
				<a class="featured-course__author-link" href="<?php echo esc_url( edupro_profile_link( 'instructor' ) ); ?>"><?php esc_html_e( 'View profile', 'edupro-addons' ); ?></a>
			</div>
			<div class="featured-course__meta clearfix">
				<a class="featured-course__type featured-course__type--<?php echo esc_attr( edupro_price_type('class') ); ?>" href="<?php the_permalink(); ?>">
					<?php edupro_price_type(); ?>
				</a>
				<?php
				$info = get_post_meta( get_the_ID(), '_sfwd-courses', true );
				$access_list = $info['sfwd-courses_course_access_list'];
				$access_list = array_filter( array_map( 'absint', explode( ',', $access_list . ',' ) ) );
				?>
				<div class="featured-course__info">
					<div class="featured-course__comments">
						<a href="<?php echo get_comments_link( get_the_ID() ); ?>"><i class="fa fa-comments-o"></i> <?php comments_number( 0, 1, '%' ); ?></a>
					</div>
					<div class="featured-course__users">
						<a href="<?php echo get_the_permalink( get_the_ID() ); ?>"><i class="fa fa-user"></i> <?php echo isset( $info['sfwd-courses_course_access_list'] ) ? intval( count( $access_list ) ): 0; ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>