
<?php $k = 0; while ( $query->have_posts() ) : $query->the_post();  ?>
	<?php if ( $k % 2 == 0 ): ?>
	<div class="row">
	<?php endif; ?>
		<div class="col-md-6 col-sm-6">
			<div class="featured-course">
				<div class="featured-course__thumb">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php edupro_post_thumbnail( array( 'post' => get_the_ID(), 'size' => 'edupro-col-6', ) ); ?>
						<div class="mask"></div>
					</a>
				</div>
				<div class="featured-course__wrap">
					<div class="featured-course__category">
					<?php
					$terms = get_the_terms( get_the_ID(),'course_category' );
					if ( $terms && ! is_wp_error( $terms ) ) : ?>
						<?php foreach ($terms as $term): ?>
							<a href="<?php echo get_term_link( $term, 'course_category' ) ?>" class="category__name"><?php esc_html_e( $term->name ); ?></a>
						<?php endforeach; ?>
					<?php endif; ?>

					</div>
					<div class="featured-course__text">
						<h3>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h3>
					</div>
				</div>
			</div>
		</div>
<?php $k++;if ( $k % 2 == 0 ): ?>
	</div>
<?php  endif; ?>
<?php  endwhile; ?>
