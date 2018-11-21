<div class="row">
	<?php if ( $query->have_posts() ): ?>
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
		<div class="col-md-4 col-sm-4">
			<div class="featured-course">
				<div class="featured-course__thumb">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php edupro_post_thumbnail( array( 'post' => get_the_ID(), 'size' => 'edupro-col-4', ) ); ?>
						<div class="mask"></div>
					</a>
				</div>
				<div class="featured-course__wrap">
					<div class="featured-course__text">
						<h3>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h3>
					</div>

					<?php $info = get_post_meta( get_the_ID(), '_sfwd-courses', true ); ?>
					<div class="featured-course__meta">
						<div class="featured-course__rating">
							<?php if( function_exists( 'rate_calculate' ) ){ echo rate_calculate(); }?>
						</div>
						<?php
						$info = get_post_meta( get_the_ID(), '_sfwd-courses', true );
						$access_list = $info['sfwd-courses_course_access_list'];
						$access_list = array_filter( array_map( 'absint', explode( ',', $access_list . ',' ) ) );
						?>
						<div class="featured-course__info">
							<div class="featured-course__comments">
								<a href="<?php get_comments_link( get_the_ID() ); ?>"><i class="fa fa-comments-o"></i> <?php comments_number( 0, 1, '%' ); ?></a>
							</div>
							<div class="featured-course__users">
								<a href="<?php get_comments_link( get_the_ID() ); ?>"><i class="fa fa-user"></i> <?php echo isset( $info['sfwd-courses_course_access_list'] ) ? intval( count( $access_list ) ): 0; ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
	<?php endif; ?>
</div>