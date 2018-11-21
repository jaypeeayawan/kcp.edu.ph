<div class="testimonials__wrapper">
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
		<div class="testimonial row">
			<div class="col-sm-4 testimonial__thumb">
				<?php the_post_thumbnail( 'full' ); ?>
			</div>
			<div class="col-sm-8 testimonial__text">
				<div class="testimonial__author"><?php the_title(); ?></div>
				<div class="testimonial__content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	<?php endwhile; ?>

</div>
