<?php while ( $query->have_posts() ) : $query->the_post(); ?>
	<div class="featured-event">
		<div class="featured-event__thumb">
			<div class="featured-event__date">
				<i class="fa fa-file-text-o"></i>
				<?php $start = get_post_meta( get_the_ID(), 'start_date', true ); ?>
				<div class="featured-event__month"><?php echo date_i18n("M", strtotime( $start ) ); ?></div>
				<div class="featured-event__day"><?php echo date_i18n("d", strtotime( $start ) ); ?>,</div>
				<div class="featured-event__year"><?php echo date_i18n("Y", strtotime( $start ) ); ?></div>
			</div>
		</div>
		<div class="featured-event__text">
			<h3>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h3>
			<div class="featured-event__info">
				<div class="featured-event__time">
					<i class="fa fa-clock-o"></i>
					<?php edupro_even_time(); ?>
				</div>
				<div class="featured-event__location">
					<i class="fa fa-map-marker"></i> <?php echo esc_html( get_post_meta( get_the_ID(), 'location', true ) ); ?>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; ?>