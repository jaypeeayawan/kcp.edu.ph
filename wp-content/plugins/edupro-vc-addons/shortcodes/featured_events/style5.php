<div class="row">

	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
		<div class="featured-event col-sm-3">
			<div class="featured-event__thumb">
				<div class="featured-event__date">
					<?php $start = get_post_meta( get_the_ID(), 'start_date', true ); ?>
					<div class="featured-event__day"><?php echo date_i18n("d", strtotime( $start ) ); ?></div>
					<div class="featured-event__month"><?php echo date_i18n("M", strtotime( $start ) ); ?></div>
				</div>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php edupro_post_thumbnail( array( 'post' => get_the_ID(), 'size' => 'edupro-col-6', ) ); ?>
				</a>
				<div class="featured-event__text">
					<h3>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					</h3>
				</div>
			</div>
		</div>
	<?php endwhile; ?>

</div>
