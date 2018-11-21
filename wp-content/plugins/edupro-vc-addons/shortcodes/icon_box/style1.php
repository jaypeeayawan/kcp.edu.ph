<div class="row">

	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
		<div class="featured-course col-md-3 col-sm-4">
			<div class="featured-course__thumb">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail( 'edupro-grid' ); ?>
				</a>
			</div>
			<div class="featured-course__text">
				<h3>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</h3>
				<?php echo get_avatar( get_the_author_meta( 'email' ) ); ?>
				<div class="featured-course__author"><?php the_author(); ?></div>
				<a class="featured-course__author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php esc_html_e( 'View profile', 'edupro-addons' ); ?></a>
			</div>

			<?php
			$info = get_post_meta( get_the_ID(), '_sfwd-courses', true );
			?>
			<div class="featured-course__meta clearfix">
				<?php $type = in_array( $info['sfwd-courses_course_price_type'], array(
					'open',
					'free'
				) ) ? 'free' : 'paid'; ?>
				<a class="featured-course__type featured-course__type--<?php echo esc_attr( $type ); ?>" href="<?php the_permalink(); ?>">
					<?php
					if ( 'free' == $type ) {
						esc_html_e( 'Free', 'edupro-addons' );
					} else {
						$courses_options = learndash_get_option( 'sfwd-courses' );
						$currency        = isset( $courses_options['paypal_currency'] ) ? $courses_options['paypal_currency'] : 'USD';
						echo EduPro_Helper::get_currency_symbol( $courses_options['paypal_currency'] ) . esc_html( $info['sfwd-courses_course_price'] );
					}
					?>
				</a>
				<div class="featured-course__info">
					<div class="featured-course__comments">
						<i class="fa fa-comments-o"></i> <?php comments_number( 0, 1, '%' ); ?>
					</div>
					<div class="featured-course__users">
						<i class="fa fa-user"></i> <?php echo intval( $info['sfwd-courses_course_access_list'] ); ?>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; ?>

</div>

<div class="featured-courses__button">
	<a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>">
		<?php echo esc_html( $link['title'] ); ?>
	</a>
</div>