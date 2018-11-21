<?php
/**
 * The template for displaying instructor profile pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EduPro
 */

get_header();

get_template_part( 'template-parts/banner-top' );
?>

<div class="main container">
	<div class="main__content">
		<div class="author__info">
			<div class="row">
				<div class="col-sm-3">
					<?php echo get_avatar( get_queried_object_id(), 270 ); ?>
				</div>
				<div class="col-sm-9">
					<h4 class="author__name"><?php echo esc_html( edupro_user_name() ); ?></h4>
					<div class="author__description"><?php echo nl2br( get_the_author_meta('description', get_queried_object_id() ) ); ?></div>
					<div class="user-social-icon"><?php edupro_user_social_button( get_queried_object_id() ); ?></div>
				</div>
			</div>
		</div>

		<div class="part-courses">
			<h4 class="featured-courses__title text-center"><span><?php esc_html_e( 'Featured courses', 'edupro' ); ?></span></h4>

			<div class="row">
				<?php
				$args = array(
					'post_type'      => 'sfwd-courses',
					'post_status'    => 'publish',
					'author' => get_queried_object_id()
				);

				$sort = edupro_get_setting( 'sort-course' );
				if ( $sort != 'trendding' ) {
					$args['orderby'] = 'meta_value_num';
					$args['order'] = 'DESC';
					$args['meta_key'] = $sort;
				};

				$query = new WP_Query( $args ); ?>
				<?php
				if ( $query->have_posts() ): ?>

				<?php $count = 0;
			    while ( $query->have_posts() ) : $query->the_post();
					if ( $count % 4 == 0 ) {
						echo '<div class="row">';
					} ?>
					<div class="col-md-3 col-sm-3">
						<div class="featured-course">
							<div class="featured-course__thumb">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php the_post_thumbnail( 'edupro-grid' ); ?>
									<div class="rating-score"><?php echo esc_html( edupro_score_rating( get_the_ID() ) ); ?></div>
								</a>
							</div>
							<div class="featured-course__wrap">
								<div class="featured-course__text">
									<h3>
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
									</h3>
									<?php echo get_avatar( get_the_author_meta( 'email' ) ); ?>
									<div class="featured-course__author"><?php the_author(); ?></div>
									<a class="featured-course__author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php esc_html_e( 'View profile', 'edupro' ); ?></a>
								</div>

								<?php $info = get_post_meta( get_the_ID(), '_sfwd-courses', true ); ?>
								<div class="featured-course__meta clearfix">
									<?php
									$type = 'free';
									if ( isset( $info['sfwd-courses_course_price_type'] ) && ! in_array( $info['sfwd-courses_course_price_type'], array(
											'open',
											'free'
										) )
									) {
										$type = 'paid';
									}
									?>
									<a class="featured-course__type featured-course__type--<?php echo esc_attr( $type ); ?>" href="<?php the_permalink(); ?>">
										<?php
										if ( 'free' == $type ) {
											esc_html_e( 'Free', 'edupro' );
										} else {
											$courses_options = learndash_get_option( 'sfwd-courses' );
											$currency        = empty( $courses_options['paypal_currency'] ) ? 'USD' : $courses_options['paypal_currency'];
											echo EduPro_Helper::get_currency_symbol( $currency ) . esc_html( $info['sfwd-courses_course_price'] );
										}
										?>
									</a>
									<div class="featured-course__info">
										<div class="featured-course__comments">
											<i class="fa fa-comments-o"></i> <?php comments_number( 0, 1, '%' ); ?>
										</div>
										<div class="featured-course__users">
											<i class="fa fa-user"></i> <?php echo isset( $info['sfwd-courses_course_access_list'] ) ? intval( $info['sfwd-courses_course_access_list'] ) : 0; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php
					$count ++;
					if ( $count % 4 == 0 || $count == $query->post_count ) {
						echo '</div>';
					}
				?>
				<?php endwhile; ?>
				<?php endif; ?>

			</div>
		</div>
		<div class="all-courses">
			<h4 class="featured-courses__title text-center"><span><?php esc_html_e( 'All Courses', 'edupro' ); ?></span></h4>

			<div class="row">
				<?php
				$args = array(
					'post_type'      => 'sfwd-courses',
					'post_status'    => 'publish',
					'posts_per_page' => 8
				);

				$query = new WP_Query( $args ); ?>
				<?php
				if ( $query->have_posts() ):
			    while ( $query->have_posts() ) : $query->the_post(); ?>
					<div class="col-md-3 col-sm-3">
						<div class="featured-course">
							<div class="featured-course__thumb">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php the_post_thumbnail( 'edupro-grid' ); ?>
									<div class="rating-score"><?php echo esc_html( edupro_score_rating( get_the_ID() ) ); ?></div>
								</a>
							</div>
							<div class="featured-course__wrap">
								<div class="featured-course__text">
									<h3>
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
									</h3>
									<?php echo get_avatar( get_the_author_meta( 'email' ) ); ?>
									<div class="featured-course__author"><?php the_author(); ?></div>
									<a class="featured-course__author-link" href="<?php echo esc_url( edupro_profile_link( 'instructor' ) ); ?>"><?php esc_html_e( 'View profile', 'edupro' ); ?></a>
								</div>

								<?php $info = get_post_meta( get_the_ID(), '_sfwd-courses', true ); ?>
								<div class="featured-course__meta clearfix">
									<?php
									$type = 'free';
									if ( isset( $info['sfwd-courses_course_price_type'] ) && ! in_array( $info['sfwd-courses_course_price_type'], array(
											'open',
											'free'
										) )
									) {
										$type = 'paid';
									}
									?>
									<a class="featured-course__type featured-course__type--<?php echo esc_attr( $type ); ?>" href="<?php the_permalink(); ?>">
										<?php
										if ( 'free' == $type ) {
											esc_html_e( 'Free', 'edupro' );
										} else {
											$courses_options = learndash_get_option( 'sfwd-courses' );
											$currency        = empty( $courses_options['paypal_currency'] ) ? 'USD' : $courses_options['paypal_currency'];
											echo EduPro_Helper::get_currency_symbol( $currency ) . esc_html( $info['sfwd-courses_course_price'] );
										}
										?>
									</a>
									<div class="featured-course__info">
										<div class="featured-course__comments">
											<i class="fa fa-comments-o"></i> <?php comments_number( 0, 1, '%' ); ?>
										</div>
										<div class="featured-course__users">
											<i class="fa fa-user"></i> <?php echo isset( $info['sfwd-courses_course_access_list'] ) ? intval( $info['sfwd-courses_course_access_list'] ) : 0; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
				<?php endif; ?>

			</div>
		</div>
	</div>
</div>

<?php get_footer();
